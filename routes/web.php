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

Route::get('/',[
    'as'=>'/',
    'uses'=>'WelcomeController@index'
]);

Route::get('productImage/{id}',[
    'uses'=>'WelcomeController@productImage',
    'as'=>'productImage'
]);

Route::get('add-to-cart/{id}',[
    'uses'=>'WelcomeController@getAddToCart',
    'as'=>'add-to-cart'
]);

Route::get('removeCart',[
    'uses'=>'WelcomeController@removeCart',
    'as'=>'removeCart'
]);

Route::post('orderCart',[
    'uses'=>'WelcomeController@orderCart',
    'as'=>'orderCart'
]);






Route::get('decItemCart/{id}',[
    'uses'=>'WelcomeController@decItemCart',
    'as'=>'decItemCart'
]);

Route::get('incItemCart/{id}',[
    'uses'=>'WelcomeController@incItemCart',
    'as'=>'incItemCart'
]);

Route::get('removeItemCart/{id}',[
    'uses'=>'WelcomeController@removeItemCart',
    'as'=>'removeItemCart'
]);


Route::get('login',function (){
    return view('auth/login');
});

Route::get('register',function (){
    return view('auth/register');
});

Route::post('register',[
    'uses'=>'AuthController@signUp',
    'as'=>'register'
]);

Route::post('login',[
    'uses'=>'AuthController@login',
    'as'=>'login'
]);

Route::group(['middleware'=>'auth'],function (){

    Route::get('home',['as'=>'home',function (){
        return view('home');
    }]);

    Route::get('logout',[
        'uses'=>'HomeController@logout',
        'as'=>'logout'
    ]);

    Route::get('viewProduct',[
        'uses'=>'ProductController@viewProduct',
        'as'=>'viewProduct'
    ]);

    Route::get('productCover/{id}',[
        'uses'=>'ProductController@productCover',
        'as'=>'productCover'
    ]);



    Route::get('newProduct',[
        'uses'=>'ProductController@getNewProduct',
        'as'=>'newProduct'
    ]);

    Route::post('newProduct',[
        'uses'=>'ProductController@postNewProduct',
        'as'=>'newProduct'
    ]);

    Route::post('deleteProduct',[
        'uses'=>'ProductController@deleteProduct',
            'as'=>'deleteProduct'
        ]);


    Route::get('order',[
        'uses'=>'OrderController@order',
        'as'=>'order'
    ]);

    Route::get('printOrder/{id}',[
        'uses'=>'OrderController@printOrder',
        'as'=>'printOrder'
    ]);





});

