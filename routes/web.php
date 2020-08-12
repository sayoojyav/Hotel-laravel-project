<?php
// Route::get('/', function () {
//        return view('Customers.Auth.register');
//     });
//Admin
    Route::group(['prefix' => 'admin','as' => 'admin::','namespace' => 'Admin','middleware' => 'throttle:60,1'], function() {
    Route::get('/',['as'=>'main','uses'=> 'MainController@index']);
   
    // Login
    Route::get('login', ['as' => 'get_login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'post_login', 'uses' => 'Auth\LoginController@login']);
    //Reset Password setting
    Route::get('password/reset',['as' =>'password_reset','uses' =>'Auth\ForgotController@showLinkRequestForm']);
    Route::post('password/email',['as' =>'password_email','uses' =>'Auth\ForgotController@sendResetLinkEmail']);

    
    Route::group(['middleware' => ['auth:admins']], function() {
   
        //Logout
        Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

        //Dashboard
        Route::get('dashboard',['as'=>'dashboard','uses'=> 'DashboardController@index']);

        //Addcategory
        
        Route::get('addcategory', ['as' => 'addcategory', 'uses' => 'MainController@main']);
        
        Route::post('addcategory',['as' =>'post_addcategory','uses' =>'MainController@store']);
        //Subcategory

        Route::get('subcategory', ['as' => 'subcategory', 'uses' => 'MainController@mainindex']);
        
        Route::post('subcategory',['as' =>'post_subcategory','uses' =>'MainController@substore']);

        //ProductEntry
        Route::get('product', ['as' => 'product', 'uses' => 'ProductController@index']);
        
        Route::post('product',['as' =>'post_product','uses' =>'ProductController@store']);
        Route::post('productjs',['as' =>'productjs','uses' =>'ProductController@onclick']);
        Route::get('productshow',['as' => 'show_product','uses' =>'ProductController@view']);
        



  });


});
    // User
    Route::group(['prefix'=>'hotel','as' =>'hotel::','namespace' => 'Customers','middleware'=>'throttle:60,1'],function(){
        Route::get('/',['as' =>'main','uses'=>'MainController@index']);

        Route::get('login',['as'=>'get_login','uses' =>'Auth\LoginController@showLoginForm']);
        //Login
        Route::post('login',['as' => 'post_login', 'uses' =>'Auth\LoginController@login']);
        //Register
        Route::get('register',['as' =>'get_register','uses' =>'Auth\RegisterController@registerform']);
        Route::post('register',['as' =>'post_register','uses' =>'Auth\RegisterController@register']);
        Route::group(['middleware' => ['auth:web']], function() {
   
        //Logout
        Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

        });


        
    });
        

