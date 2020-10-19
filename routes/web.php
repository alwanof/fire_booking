<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'Users','middleware'=>'auth'],function(){
Route::get('/profile/{user}','UserController@profile')->name('users.profile');
Route::get('/edit/{user}','UserController@edit')->name('users.edit');
Route::patch('/profile/{user}/update','UserController@update')->name('users.update');
Route::get('/users','UserController@index')->name('users.all');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/delete_user/{user}','UserController@delete')->name('users.delete');
Route::post('/store','UserController@store')->name('users.store');
});