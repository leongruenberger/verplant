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

Route::get('/easteregg', function (){
    return "Was machst du denn hier?";
});

Auth::routes();

Route::resource('/events','EventController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'DemoController@userDemo')->name('user');
Route::get('/admin', 'DemoController@adminDemo')->name('admin');
Route::get('/overview', 'OverviewController@overview');


