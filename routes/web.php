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
Route::get('/chat','ChatController@chat');
Route::get('/test','ChatController@test');
Route::post('/send','ChatController@send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
