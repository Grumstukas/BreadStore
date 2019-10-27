<?php

namespace App\Http\Controllers;

use App\Bun;
use App\Cart;
use App\Client;
use App\Delivery_Bank;
use App\Order;
use App\Order_list;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Validator;
use Session;
use PDF;
use App\WebToPay as Paysera;

class PayseraController extends Controller
{

    private static $settings = [
        'paysera_id' => '153454',
        'secret' => 'fe1d29cf02c128bc7f714c4fab1fe7dd',
        'test' => 1
    ];

    public function buy()
    {
        $delivery = new Delivery_Bank;
        $cart = Cart::get();
        $totalCartSum = $cart->totalCartSum();
        return view('front-end.complete.index', [
            'delivery_info' => $delivery->getDeliveryInfo(),
            'bank_info' => $delivery->getBankInfo(),
            'totalCartSum'=> $totalCartSum]);
    }

    public function update_price(Request $request)
    {

        $method = $request->way;
        Session::put('delivery',$method);

        $delivery = new Delivery_Bank;
        $delivery_price = $delivery->getDeliveryPrice($method);

        $cart = Cart::get();
        $totalCartSum = $cart->totalCartSum() + $delivery_price;

        $part = View::make('front-end.complete.total-price')->with([
            'totalCartSum' => $totalCartSum,
        ])->render();

        return Response::json([
            'html' => $part
        ], 200);//responso kodas
    }

    public function storeClient($request)
    {
        $client = new Client;
        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->email = $request->client_email;
        $client->city = $request->client_city;
        $client->street = $request->client_street;
        $client->post_code = $request->client_post_code;
        $client->phone = $request->client_phone;

        $client->save();

        return $client->id;
    }

    public function storeOrder($client_id)
    {
        $order = new Order;
        $order->state = 0;
        $order->client_id = $client_id;
        $order->delivery = Session::pull('delivery');


        $order->save();

        return $order->id;
    }

    public function storeOrderList($order_id)
    {
        $cart = Cart::get();

        foreach ($cart->data as $bun_id => $count) {
            $order_list = new Order_list;

            $order_list->order_id = $order_id;
            $order_list->bun_id = $bun_id;
            $order_list->count = $count;

            if (Bun::where('id', $bun_id)->first()->price_discount !== null) {
                $order_list->price = (Bun::where('id', $bun_id)->first()->price_discount) * $count;
            } else {
                $order_list->price = (Bun::where('id', $bun_id)->first()->price) * $count;
            }
            $order_list->save();
            unset($order_list);

        }
    }

    public function getInfo($order_id, $data)
    {
        $order = Order::where('id', $order_id)->first();
        $order_status = $order->status;
        $client_id = $order->client_id;
        $client = Client::where('id', $client_id)->first();
        $client_email = $client->email;
        $client_name = $client->name;
        $client_surname = $client->surname;
        $payment_info = [];

        $delivery = new Delivery_Bank;
        $total_price = $delivery->getDeliveryPrice($data->delivery);

        $cart_content = Order_list::where('order_id', $order_id)->get();
        foreach ($cart_content as $item) {
            $total_price += $item->price;
        }


        $payment_info['order_id'] = $order_id;
        $payment_info['$order_status'] = $order_status;
        $payment_info['client_email'] = $client_email;
        $payment_info['client_name'] = $client_name;
        $payment_info['client_surname'] = $client_surname;
        $payment_info['total_price'] = $total_price;

        return $payment_info;


    }

    public function payment(Request $request)
    {
        $cart = Cart::get();

        $client_id = $this->storeClient($request);
        $order_id = $this->storeOrder($client_id);
        $this->storeOrderList($order_id);
        $info = $this->getInfo($order_id, $request);

        $cart->delete();

        $parameters =
        [
            'prebuild'      => true,
            'order'         => $info['order_id'],
            'amount'        => intval(number_format($info['total_price'], 2, '', '')),
            'currency'      => 'EUR',
            'country'       => 'LT',
            'payment'       => '',
            'firstname'     => $info['client_name'],
            'lastname'      => $info['client_surname'],
            'email'         => $info['client_email'],
            'street'        => '',
            'city'          => '',
            'state'         => '',
            'zip'           => '',
            'countrycode'   => 'LT',
            'lang'          => 'LIT'
        ];
        if ($parameters['prebuild']) {
            $parameters = self::buildParameters($parameters);
        }
        try {
            $request = Paysera::redirectToPayment($parameters, true);
        }
        catch (App\WebToPayException $e) {
            die('klaidele...');

        }

    }

    public function cancel()
    {
        Session::put('paysera_data', ['error' => 'Vartotojas nutraukė mokėjimą.']);
        return redirect()->route('paysera.error');
    }

    private function process()
    {
        $response = Paysera::validateAndParseData($_GET,
            self::$settings['paysera_id'],
            self::$settings['secret']
        );

        if (!$response || !isset($response['orderid']) || !$response['orderid']) {
            return [1]; // critical error. cant read response
        }

        $order = Order::where('id', $response['orderid'])->first();
        if(!$order) {
            return [2]; // invalid bill id
        }

        if ($order->status != 0) {
            return [9, $order]; //order already paid (as callback comes BEFORE user redirect)
        }

        $order = Order::where('id', $response['orderid'])->first();
        $order_price = Order::DELIVERY_INFO[$order->delivery]['price'];
        $order_list = Order_list::where('order_id', $response['orderid'])->get();

        foreach ($order_list as $item) {
            $order_price += $item->price;
        }

        if (intval($response['amount']) == intval(number_format($order_price, 2, '', '')) &&
            $response['currency'] == 'EUR' &&
            $response['status'] == 1) {

            $order->state = 1;
            $order->save();
            return [11, $response['orderid']]; //payment is ok
        }
        else {
            return [12]; //payment not confirmed
        }
    }

    public function accept()
    {
        $result = $this->process();
        if ($result[0] == 11) {
//            return 'payser apmokėjimas sėkmingas';
            return view('front-end.complete.response',
                ['text' => 'Apmokėjimas - sėkmingas!', 'img'=>'berniukas.png', 'order_id'=> $result[1]]);
        }
        if ($result[0] == 9) {
//            return 'jau sumokėta';
            return view('front-end.complete.response',
                ['text' => 'Apmokėjimas jau įvykdytas', 'img'=>'berniukas.png']);

        }
        if ($result[0] == 12) {
//            return 'mokėjimas nepatvirtintas';
            return view('front-end.complete.response',
                ['text' => 'Mokėjimas - nepatvirtintas, gal neužtenka pinigėlio ?', 'img'=>'berniukas.png']);
        }
        if ($result[0] == 1) {
//            return 'LABAI BLOGAI';
            return view('front-end.complete.response',
                ['text' => 'Nutiko kažkas negero....', 'img'=>'berniukas.png']);
        }
        if ($result[0] == 2) {
//            return 'LABAI BLOGAI 2';
            return view('front-end.complete.response',
                ['text' => 'Nutiko kažkas laaaaaabai negero....', 'img'=>'berniukas.png']);
        }
//        return 'neaišku kas...';
        return view('front-end.complete.response',
            ['text' => 'Pala pala, nutiko kažkas keisto...', 'img'=>'berniukas.png']);
    }

    public function callback()
    {
        $this->process();
        return 'OK';
    }

    private static function buildParameters($parameters)
    {
        return
        [
            'projectid'     => self::limitLenght(self::$settings['paysera_id'] ?? 0, 11),
            'sign_password' => self::limitLenght(self::$settings['secret'] ?? 0),
            'orderid'       => self::limitLenght($parameters['order'], 40),
            'amount'        => self::limitLenght($parameters['amount'], 11),
            'currency'      => self::limitLenght($parameters['currency'], 3),
            'country'       => self::limitLenght($parameters['country'], 2),
            'accepturl'     => self::limitLenght(route('paysera.return.accept')),
            'cancelurl'     => self::limitLenght(route('paysera.return.cancel')),
            'callbackurl'   => self::limitLenght(route('paysera.return.callback')),
            'p_firstname'   => self::limitLenght($parameters['firstname']),
            'p_lastname'    => self::limitLenght($parameters['lastname']),
            'p_email'       => self::limitLenght($parameters['email']),
            'p_street'      => self::limitLenght($parameters['street']),
            'p_countrycode' => self::limitLenght($parameters['country'], 2),
            'p_city'        => self::limitLenght($parameters['city']),
            'p_state'       => self::limitLenght($parameters['state'], 20),
            'payment'       => self::limitLenght($parameters['payment'], 20),
            'p_zip'         => self::limitLenght($parameters['zip'], 20),
            'lang'          => self::limitLenght($parameters['lang'], 3),
            'test'          => self::limitLenght((int)self::$settings['test'], 1)
        ];
    }

    private static  function limitLenght($string, $limit = 255) {
        if (strlen($string) > $limit) {
            $string = substr($string, 0, $limit);
        }
        return $string;
    }


    public function pdf($order_id)
    {

        $items = Order_list::where('order_id', $order_id)->get();

        $buns = collect();
        foreach ($items as $item)
        {
            $bun = Bun::where('id',$item->bun_id)->first();
            $bun->count = $item->count;
            $bun->final_price = $item->price;

            $buns->add($bun);
        }
//        dd($buns);


        $pdf = PDF::loadView('front-end.complete.pdf', ['buns'=>$buns]);
        return $pdf->download('your_order.pdf');
    }
}
