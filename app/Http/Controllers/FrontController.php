<?php


namespace App\Http\Controllers;

use App\Bun;
use App\Delivery_Bank;
use App\Product_tag;
use App\Tag;
use DateTime;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    /**
     * refreshes home page (deal of the day section)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function home()
    {
        $buns = Bun::all();
        $tags = Tag::all();
        $product_tags = Product_tag::all();
        $today = new DateTime("now");

        return view('front-end.home.index',
            ['buns' => $buns,
                'product_tags' => $product_tags,
                'tags' => $tags,
                'today' => $today]);
    }

//********************************************************************************************************

    /**
     * @param Request $request provides info about price filter values
     * @param Tag $tag provides tag for filtering by feature
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function showWarehouse(Request $request, Tag $tag)
    {
        $buns = collect(); //sarasas sukurinkti atfiltruotoms bandelėms

        $tag->tagProducts->each(function ($bun_tag) use ($buns) { //per tarpusavio ryšį gauna tik tas bandeles kurios turi pasirinktą tagą
            $buns->add($bun_tag->bun); //Čia jau visos bandelės
        });

        if ($buns->count() == 0) //jeigu yra nors viena, tai jas ir atiduosime į blade
        {
            $buns = Bun::all();
        }

        $filter_from = $request->get('filter_from', '');

        $filter_to = $request->get('filter_to', '');

        if (($filter_from !== '') && ($filter_to))
        {
//
//********************************************* filtravimas pagal kainą I **********************************************
//        $buns->map(function ($bun){
//            if($bun->price_discount === null)
//            {
//                $bun->total = $bun->price;
//            }
//            else
//            {
//                $bun->total = $bun->price_discount;
//            }
//        });
//        $buns = $buns ->where('total', '>', 0 )->where('total', '<=',2);

//********************************************* filtravimas pagal kainą II *********************************************
            $buns = $buns->filter(function ($bun) use ($filter_from, $filter_to) {
                if (($bun->price_discount == null) && (($bun->price < $filter_from) || ($bun->price >= $filter_to)))
                {
                    return false;
                }
                else if (($bun->price_discount != null) && (($bun->price_discount < $filter_from) || ($bun->price_discount >= $filter_to)))
                {
                    return false;
                }
                else
                {
                    return true;
                }

            });
        }
        $tags = Tag::all();
        $product_tags = Product_tag::all();
        $today = new DateTime("now");

        return view('front-end.warehouse.index', [
            'buns' => $buns,
            'product_tags' => $product_tags,
            'tags' => $tags,
            'today' => $today]);
    }

    /**
     * enlarges bun picture and provides all info for buying
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function enlargeBunForBuying(Request $request)
    {
        $tags = collect();
        $bun = Bun::where('id', $request->id)->first();

        $bun->bunTags->each(function ($bun_tag) use ($tags) {
            $tags->add($bun_tag->tag);
        });

        $part = View::make('front-end.warehouse.bun_pop')->with([
            'bun' => $bun,
            'tags' => $tags
        ])->render();

        return Response::json([
            'html' => $part
        ], 200);
    }

//********************************************************************************************************

    /**
     * puts bun in cart
     * @param Request $request provides info about selected bun id and amount
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request)
    {

        $cart = Cart::get();
        if($request->count >= 0)
        {
            $result = $cart->add($request->id, $request->count); //true/false
        }

//        var_dump($result);
//        die;

        if(!$result)
        {
            return Response::json([
                'message' => 'bandyk dar kartą'
            ], 400);//responso kodas
        }

        $part = View::make('front-end.common_blades.little_cart')->with([
            'count' => $cart->count(),
        ])->render();

        return Response::json([
            'html' => $part
        ], 200);//responso kodas
    }

    /**
     * provides little cart blade info
     * @return string
     */
    public function renderLittleCartBladeInfo()
    {
        $cart = Cart::get();
        $part = View::make('front-end.common_blades.little_cart')->with([
            'count' => $cart->count(),
        ])->render();

        return $part;
    }

    /**
     * refreshes little cart of cart content
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshCart()
    {
        return Response::json([
            'html' => $this->renderLittleCartBladeInfo()
        ], 200);//responso kodas

    }

    //-----------------------------------------------

    /**
     * provides cart table blade info
     * @return array
     */
    public function renderCartTableInfo()
    {
        $cart = Cart::get();
        $totalCartSum = $cart->totalCartSum();
        $pvm = round((($totalCartSum / 100) * 21),2);
        $totalCartSumWithoutPVM = $totalCartSum - $pvm;

        $wholeCart = [];
        $cartItem = [];

        foreach ($cart->data as $id => $value)
        {
            $bun = Bun::where('id', $id)->first();
            $cartItem['id'] = $bun->id;
            $cartItem['name'] = $bun->name;
            $cartItem['file'] = $bun->file;
            $cartItem['description'] = $bun->description;
            $cartItem['unit_price'] = ($bun->price_discount == null) ? $bun->price : $bun->price_discount;
            $cartItem['price'] = number_format(((($bun->price_discount == null) ? $bun->price : $bun->price_discount) * $value),2);
            $cartItem['amount'] = $value;
            $wholeCart[$id] = $cartItem;
        }

        return
            ['wholeCart'=>$wholeCart,
                'totalCartSum'=>number_format($totalCartSum, 2),
                'pvm'=>number_format($pvm, 2),
                'totalCartSumWithoutPVM'=>number_format($totalCartSumWithoutPVM,2)
            ];
    }

    /**
     * forms cart table, counts prices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shopping_basketIndex()
    {
        return view('front-end.shopping_basket.index',$this->renderCartTableInfo());
    }

    /**
     * refresh cart good list after adjusting quantities or deletion of bun
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amountAdjust(Request $request)
    {
        $operation = $request->key;
        $bunID = $request->id;
        $cart = Cart::get();

        if($operation == 'add')
        {
            $cart->add($bunID, 1);

        }
        else if($operation == 'reduce')
        {
            if($cart->data[$bunID] > 1)
            {
                $cart->add($bunID, -1);
            }
        }
        else if($operation == 'delete')
        {
            $cart->remove($bunID);
        }

        $part = $this->renderLittleCartBladeInfo();
        $part2 = View::make('front-end.shopping_basket.body')->with($this->renderCartTableInfo())->render();

        return Response::json([
            'html' => $part,
            'html2' => $part2
        ], 200);


    }

//********************************************************************************************************

//    public function update_price(Request $request)
//    {
//
//        $method = $request->way;
//
//        $delivery = new Delivery_Bank;
//        $delivery_price = $delivery->getDeliveryPrice($method);
//
//        $cart = Cart::get();
//        $totalCartSum = $cart->totalCartSum() + $delivery_price;
//
//        $part = View::make('front-end.complete.total-price')->with([
//            'totalCartSum' => $totalCartSum,
//        ])->render();
//
//        return Response::json([
//            'html' => $part
//        ], 200);//responso kodas
//    }


    /**
     * generates blade for payment info collecting
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment()
    {
        $delivery = new Delivery_Bank;
        $cart = Cart::get();
        $totalCartSum = $cart->totalCartSum();
        return view('front-end.complete.index', [
            'delivery_info' => $delivery->getDeliveryInfo(),
            'bank_info' => $delivery->getBankInfo(),
            'totalCartSum'=> $totalCartSum]);
    }
}




//        Session::put('bla bla', 12);
//        Session::get('bla bla', 'DEFAULT');
//        Session::forget('bla bla');
///
//        Session::pull('bla bla');

