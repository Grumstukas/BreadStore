<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('', 'FrontController@home')->name('home');

Route::get('/admin', 'AdminController@hello')->name('hello');//++
Route::get('/login', 'AdminController@login')->name('login');//+
Route::get('/home', 'AdminController@home')->name('home');//+

Route::name('admin.')->prefix('admin')->group(function(){

    Route::name('bun.')->prefix('bun')->group(function(){
        Route::get('', 'AdminController@bunIndex')->name('index'); //admin.bun.index... po @ metodo pavadinimas
        Route::get('create', 'AdminController@bunCreate')->name('create');
        Route::post('store', 'AdminController@bunStore')->name('store');
        Route::get('edit/{bun}', 'AdminController@bunEdit')->name('edit');
        Route::post('update/{bun}', 'AdminController@bunUpdate')->name('update');
        Route::post('delete/{bun}', 'AdminController@bunDestroy')->name('destroy');
        Route::get('show/{bun}', 'AdminController@bunShow')->name('show');
    });

    Route::name('tag.')->prefix('tag')->group(function(){
        Route::get('', 'AdminController@tagIndex')->name('index'); //admin.tag.index... po @ metodo pavadinimas
        Route::get('create', 'AdminController@tagCreate')->name('create');
        Route::post('store', 'AdminController@tagStore')->name('store');
        Route::get('edit/{tag}', 'AdminController@tagEdit')->name('edit');
        Route::post('update/{tag}', 'AdminController@tagUpdate')->name('update');
        Route::post('delete/{tag}', 'AdminController@tagDestroy')->name('destroy');
    });

    Route::name('client.')->prefix('client')->group(function(){
        Route::get('', 'AdminController@clientIndex')->name('index');
        Route::post('processing', 'PayseraController@payment')->name('processing');
        Route::get('edit/{client}', 'AdminController@clientEdit')->name('edit');
        Route::post('update/{client}', 'AdminController@clientUpdate')->name('update');
    });

    Route::name('order_list.')->prefix('order_list')->group(function(){
       Route::get('','AdminController@orderListIndex')->name('index');
    });

    Route::name('order.')->prefix('order')->group(function(){
       Route::get('','AdminController@orderIndex')->name('index');
    });
});

Route::name('front-end.')->prefix('front-end')->group(function(){

    Route::name('home.')->prefix('home')->group(function(){
        Route::get('', 'FrontController@home')->name('index');
        Route::post('refresh', 'FrontController@refreshCart')->name('refresh');
    });

    Route::name('warehouse.')->prefix('warehouse')->group(function(){
        Route::get('/{tag?}', 'FrontController@showWarehouse')->name('index');
        Route::post('bun_pop', 'FrontController@enlargeBunForBuying')->name('bun_pop');
        Route::post('add', 'FrontController@addToCart')->name('add');
        Route::post('refresh', 'FrontController@refreshCart')->name('refresh');
    });

    Route::name('shopping_basket.')->prefix('shopping_basket')->group(function(){
        Route::get('', 'FrontController@shopping_basketIndex')->name('index');
        Route::post('change', 'FrontController@amountAdjust')->name('change');
    });

    Route::name('complete.')->prefix('complete')->group(function(){
        Route::get('', 'PayseraController@buy')->name('index');
        Route::post('update', 'PayseraController@update_price')->name('update');
    });

});

Route::name('paysera.')->prefix('paysera')->group(function(){
    Route::name('return.')->prefix('return')->group(function () {
        Route::match(['GET', 'POST'], 'accept', 'PayseraController@accept')->name('accept');
        Route::match(['GET', 'POST'], 'cancel','PayseraController@cancel')->name('cancel');
        Route::match(['GET', 'POST'], 'callback','PayseraController@callback')->name('callback');

        Route::get('pdf/{order_id}', 'PayseraController@pdf')->name('your_order.pdf');
    });
});


























