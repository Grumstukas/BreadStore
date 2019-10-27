<?php


namespace App\Http\Controllers;

use App\Cart;
use App\Client;
use App\Delivery_Bank;
use App\Order;
use App\Order_list;
use Illuminate\Http\Request;
use Validator;
use App\Bun;
use App\Tag;
use App\Product_tag;

class AdminController extends Controller
{
    public function hello()
    {
        return view('welcome');
    }
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.register');
    }


    //**************************************** B U N S   C O N T R O L L I N G *****************************************
    public function bunIndex(Request $request)
    {
        $sort = $request->get('sort', '');
        $tags = Tag::all();
        $product_tags = Product_tag::all();
        if ($sort == 'a-z') {
            $buns = Bun::orderBy('name')->paginate(3);
        } else if ($sort == 'z-a') {
            $buns = Bun::orderBy('name', 'desc')->paginate(3);
        } else {
            $buns = Bun::paginate(3);
        }
        return view('admin.bun.index', ['buns' => $buns, 'product_tags' => $product_tags,
            'tags' => $tags, 'sort' => $sort]);

    }
    public function bunCreate()
    {
        $tags = Tag::all();
        return view('admin.bun.create', ['tags' => $tags]);
    }
    public function bunStore(Request $request)
    {
        $tags = Tag::all();
        $validator = Validator::make($request->all(),
            [
                'bun_name' => ['required', 'min:3', 'max:100'],
                'bun_photo' => ['required'],
                'bun_description' => ['required', 'min:3', 'max:500'],
                'bun_price' => ['required']
            ],
            [
                'bun_name.required' => 'Reikalingas bandelės pavadinimas',
                'bun_name.min' => 'Pavadinimas per trumpas',
                'bun_name.max' => 'Pavadinimas per ilgas',

                'bun_photo.required' => 'Reikalingas bandelės paveikslėlis',

                'bun_description.required' => 'Reikalingas bandelės aprašymas',
                'bun_description.min' => 'Aprašymas per trumpas',
                'bun_description.max' => 'Aprašymas per ilgas',

                'bun_price.required' => 'Reikalinga bandelės kaina'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $bun = new Bun;

        $file = $request->file('bun_photo') ?? false;
        $photo = basename($file->getClientOriginalName()); //file vardas
        $file->move(public_path('/img'), $photo);

        $bun->name = $request->bun_name;
        $bun->file = $photo;
        $bun->description = $request->bun_description;
        $bun->price = $request->bun_price;
        $bun->price_discount = $request->bun_price_discount;
        $bun->save();

        $thisBunTagsId = $request->input('tag'); //tag array

        foreach ($thisBunTagsId as $thisBunTagId) {
            $product_tag = new Product_tag;
            $product_tag->tag_id = $thisBunTagId;
            $product_tag->bun_id = $bun->id;
            $product_tag->save();
            unset($product_tag);
        }

        return redirect()->route('admin.bun.index')->with('success_message', 'Sekmingai įrašytas.');
    }
    public function bunEdit(Bun $bun)
    {
        $tags = Tag::all();
        $product_tags = Product_tag::all();

        $oldTagsID = [];

        foreach ($product_tags as $product_tag) {
            if ($product_tag->bun_id == $bun->id) {
                $oldTagsID[] = $product_tag->tag_id;
            }
        }

        return view('admin.bun.edit', ['bun' => $bun, 'oldTagsID' => $oldTagsID, 'tags' => $tags]);
    }
    public function bunUpdate(Request $request, Bun $bun)
    {
        $tags = Tag::all();
        $product_tags = Product_tag::all();
        $file = $request->file('bun_photo') ?? false;
        $validator = Validator::make($request->all(),
            [
                'bun_name' => ['required', 'min:3', 'max:100'],
                'bun_description' => ['required', 'min:3', 'max:500'],
                'bun_price' => ['required']
            ],
            [
                'bun_name.required' => 'Reikalingas bandelės pavadinimas',
                'bun_name.min' => 'Pavadinimas per trumpas',
                'bun_name.max' => 'Pavadinimas per ilgas',

                'bun_description.required' => 'Reikalingas bandelės aprašymas',
                'bun_description.min' => 'Aprašymas per trumpas',
                'bun_description.max' => 'Aprašymas per ilgas',

                'bun_price.required' => 'Reikalinga bandelės kaina'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        if ($file) {
            $photo = basename($file->getClientOriginalName()); //file vardas
            $file->move(public_path('/img'), $photo);
            unlink(public_path('img/' . $bun->file)); //ištrina seną pav.
            $bun->file = $photo;
        }

        $bun->name = $request->bun_name;
        $bun->description = $request->bun_description;
        $bun->price = $request->bun_price;
        $bun->price_discount = $request->bun_price_discount;
        $bun->save();

        $newTagsID = $request->input('tag');
        $oldTagsID = [];
        $oldProduct_tagsID = [];

        foreach ($product_tags as $product_tag) {
            if ($product_tag->bun_id == $bun->id) {
                $oldTagsID[] = $product_tag->tag_id;
                $oldProduct_tagsID[$product_tag->tag_id] = $product_tag->id;
            }
        }

        foreach ($tags as $tag) {
            if ((in_array($tag->id, $oldTagsID)) && (in_array($tag->id, $newTagsID))) {
                continue;
            } elseif ((in_array($tag->id, $oldTagsID)) && (!in_array($tag->id, $newTagsID))) {
                Product_tag::where('id', $oldProduct_tagsID[$tag->id])->delete();
            } elseif ((!in_array($tag->id, $oldTagsID)) && (in_array($tag->id, $newTagsID))) {
                $product_tag = new Product_tag;
                $product_tag->tag_id = $tag->id;
                $product_tag->bun_id = $bun->id;
                $product_tag->save();
                unset($product_tag);
            }
        }
        return redirect()->route('admin.bun.index')->with('success_message', 'Sekmingai pakeistas.');
    }
    public function bunDestroy(Bun $bun)
    {
        $thisBunTags = $bun->bunTags; //tarpines lenteles irasai

        foreach ($thisBunTags as $thisBunTag) {
            $thisBunTag->delete();
        }
        $bun->delete();
        return redirect()->route('admin.bun.index')->with('success_message', 'Sekmingai ištrintas.');
    }
    public function bunShow()
    {
    }


    //**************************************** T A G S   C O N T R O L L I N G *****************************************
    public function tagIndex()
    {
        $tags = Tag::all();
        return view('admin.tag.index', ['tags' => $tags]);
    }
    public function tagCreate()
    {
        return view('admin.tag.create');
    }
    public function tagStore(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'tag_title' => ['required', 'min:3', 'max:55'],
                'tag_description' => ['required', 'min:3', 'max:500']
            ],
            [
                'tag_title.required' => 'Reikalingas bandelės pavadinimas',
                'tag_title.min' => 'Pavadinimas per trumpas',
                'tag_title.max' => 'Pavadinimas per ilgas',

                'tag_description.required' => 'Reikalingas bandelės aprašymas',
                'tag_description.min' => 'Aprašymas per trumpas',
                'tag_description.max' => 'Aprašymas per ilgas'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $tag = new Tag;
        $tag->title = $request->tag_title;
        $tag->destription = $request->tag_description;
        $tag->save();

        return redirect()->route('admin.tag.index')->with('success_message', 'Sekmingai įrašytas.');
    }
    public function tagEdit(Tag $tag)
    {
        return view('admin.tag.edit', ['tag' => $tag]);
    }
    public function tagUpdate(Request $request, Tag $tag)
    {
        $validator = Validator::make($request->all(),
            [
                'tag_title' => ['required', 'min:3', 'max:55'],
                'tag_description' => ['required', 'min:3', 'max:500']
            ],
            [
                'tag_title.required' => 'Reikalingas bandelės pavadinimas',
                'tag_title.min' => 'Pavadinimas per trumpas',
                'tag_title.max' => 'Pavadinimas per ilgas',

                'tag_description.required' => 'Reikalingas bandelės aprašymas',
                'tag_description.min' => 'Aprašymas per trumpas',
                'tag_description.max' => 'Aprašymas per ilgas'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $tag->title = $request->tag_title;
        $tag->destription = $request->tag_description;
        $tag->save();

        return redirect()->route('admin.tag.index')->with('success_message', 'Sekmingai pakeistas.');
    }
    public function tagDestroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index')->with('success_message', 'Sekmingai ištrintas.');
    }

    //************************************* C L I E N T S   C O N T R O L L I N G **************************************
    public function clientIndex()
    {
        $clients = Client::all();
        return view('admin.client.index', ['clients' => $clients]);
    }
    public function clientEdit(Client $client)
    {
        return view('admin.client.edit', ['client' => $client]);
    }
    public function clientUpdate(Request $request, Client $client){
        $validator = Validator::make($request->all(),
            [
                'client_name' => ['required', 'min:2', 'max:55'],
                'client_surname' => ['required', 'min:2', 'max:70'],
                'client_email' => ['required'],
                'client_city' => ['required'],
                'client_street' => ['required'],
                'client_post_code' => ['required', 'min:5', 'max:5'],
                'client_phone' => ['required', 'min:9', 'max:9']
            ],
            [
                'client_name.required' => 'Kliento vardas negali būti ištrintas',
                'client_name.min' => 'Per trumpas kliento vardas',
                'client_name.max' => 'Per ilgas kliento vardas',

                'client_surname.required' => 'Kliento pavardė negali būti ištrinta',
                'client_surname.min' => 'Per trumpa kliento pavardė',
                'client_surname.max' => 'Per ilga kliento pavardė',

                'client_email.required' => 'Kliento elektroninio pašto adresas negali būti ištrintas',
                'client_email.min' => 'Per trumpas elektroninio pašto adresas',
                'client_email.max' => 'Per ilgas elektroninio pašto adresas',

                'client_city.required' => 'Kliento gyvenamasis miestas negali būti ištrintas',
                'client_street.required' => 'Kliento gyvenamoji gatvė negali būti ištrinta',
                'client_post_code.required' => 'Kliento gyvenamosios vietos pašto kodas negali būti ištrintas',

                'client_phone.required' => 'Kliento telefono numeris negali būti ištrintas',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->email = $request->client_email;
        $client->city = $request->client_city;
        $client->street = $request->client_street;
        $client->post_code = $request->client_post_code;
        $client->phone = $request->client_phone;
        $client->save();

        return redirect()->route('admin.client.index')->with('success_message', 'Kliento informacija sėkmingai atnaujinta.');
    }

    //*************************************** O R D E R S  C O N T R O L L I N G ***************************************
    public function orderIndex()
    {
        $orders = Order::all();
        return view('admin.order.index', ['orders' => $orders]);
    }

    //********************************** O R D E R - L I S T   C O N T R O L L I N G ***********************************
    public function orderListIndex()
    {
        $order_lists = Order_list::all();

        foreach ($order_lists as $order_list)
        {
            $order = Order::where('id',$order_list->order_id)->first();
            $client = Client::where('id',$order->client_id)->first();
            $order_list->client_id = $client->id;
            $order_list->order_status = $order->state;
        }


        return view('admin.order_list.index', ['order_lists' => $order_lists]);
    }
}

