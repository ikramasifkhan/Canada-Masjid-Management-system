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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['as'=>'admin.','prefix'=>'admin'], function (){
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/login/process', 'Admin\LoginController@processLogin')->name('process_login');

    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Admin\RegisterController@register')->name('post_register');
});
