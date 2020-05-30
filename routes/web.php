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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/click/chat', 'ChatController@makeChatRoom')->name('click.chat')->middleware('auth');
Route::post('/{id}/postMessage', 'ChatController@makeChatMessage')->name('message.send')->middleware('auth');
Route::resource('/chat', 'ChatController')->middleware('auth');
Route::resource('/sales-posts', 'SalePostController')->middleware('auth');
