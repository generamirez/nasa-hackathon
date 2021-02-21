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


Route::get('setlocale/{locale}',function($lang){
    \Session::put('locale',$lang);
    return redirect()->back();
});
Route::get('/', 'HomeController@test');
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    // Auth::routes();
//     Route::get('/home', 'HomeController@index')->name('home');
//     Route::post('/change-locale', 'HomeController@changeLocale')->name('locale.change');
//     Route::get('/', 'HomeController@index')->name('home');


    Route::get('/home', 'HomeController@index')->name('home');

//     Route::get('/my-listings', 'SalePostController@myListings')->name('my.listings')->middleware('auth');
//     Route::post('/sold', 'SalePostController@sell')->name('mark.sold')->middleware('auth');
//     Route::get('/click/chat', 'ChatController@makeChatRoom')->name('click.chat')->middleware('auth');
//     Route::post('/{id}/postMessage', 'ChatController@makeChatMessage')->name('message.send')->middleware('auth');
//     Route::resource('/chat', 'ChatController')->middleware('auth');
//     Route::resource('/sales-posts', 'SalePostController')->middleware('auth');
//     Route::resource('/plants','PlantController')->middleware('auth');

});
