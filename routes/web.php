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
Route::post('subscriber','SubscriberController@store')->name('subscriber.store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// for Admin Route Group
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');


    Route::get('pending/post','Postcontroller@pending')->name('post.pending');
    Route::put('/post/{id}/approved','Postcontroller@approvel')->name('post.approvel');

    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');


});

// for Author Route Group
Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'Author','middleware'=>['auth','user']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');
});
