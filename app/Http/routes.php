<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/srvencrypt/{string}', ['uses' => 'RegisterSshController@srvencrypt']);
Route::auth();
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => '\App\Http\Middleware\LoginMiddleware'], function() {
  Route::get('/', 'CheckController@check');
  Route::get('/buy', 'BuyController@index');
  Route::get('/server', 'ServerViewController@index');
  Route::get('/accounts', 'AccountsController@index');
  Route::post('/accounts', 'AccountsController@store');
  Route::get('/topup', function() {
    return View::make('topup');
  });
  Route::get('buy/{server}', ['uses' => 'RegisterSshController@index']);
  Route::post('/buy/finish', 'RegisterSshController@store');
});

Route::group(['middleware' => '\App\Http\Middleware\AdminMiddleware'], function() {
  Route::get('/setting', 'SettingController@index');
  Route::get('/setting/ssh', 'SshController@index');
  Route::post('/setting/ssh', 'SshController@store');
  Route::get('/setting/price', function() {
    return View::make('price');
  });
  Route::post('/setting/price', 'PriceController@store');
  Route::get('/add', 'AddResellerController@index');
  Route::post('/add', 'AddResellerController@store');
  Route::get('/usertopup', 'UserTopupController@index');
  Route::get('/usertopup/{id}',['uses' => 'UserTopupController@topup']);
  Route::post('/usertopup/finish', 'UserTopupController@store');
  Route::get('/addserver', function() {
    return View::make('addserver');
  });
  Route::post('/addserver', 'AddServerController@store');
  Route::get('/reseller', 'ResellerController@index');
  Route::get('/delete/reseller/{id}', ['uses' => 'ResellerController@del']);
  Route::get('/setting/delete/ssh/{id}', ['uses' => 'RegisterSshController@del']);
});
