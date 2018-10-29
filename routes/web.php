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

Route::get('/','LoginController@index');
Route::post('/login',[
	'uses'=>'LoginController@authenticate',
	'as'=>'login'
]);



Route::post('/store',[
  'uses'=>'LoginController@store',
  'as'=>'store'
]);

Route::get('/dataentry',function(){
	return view('dataEntryTest');
});