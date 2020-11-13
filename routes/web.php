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

Route::view('/', 'home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'Users','middleware'=>'auth'],function(){
Route::get('/profile/{user}','UserController@profile')->name('users.profile');
Route::get('/edit/{user}','UserController@edit')->name('users.edit')->middleware('permission:Manage User');
Route::patch('/profile/{user}/update','UserController@update')->name('users.update');
Route::get('/users','UserController@index')->name('users.all')->middleware('permission:Manage User');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/delete_user/{user}','UserController@delete')->name('users.delete')->middleware('permission:Manage User');
Route::post('/store','UserController@store')->name('users.store');
});
Route::group(['prefix'=>'Roles','middleware'=>['auth','permission:Manage Role']],function(){
Route::get('roles','RoleController@index')->name('roles.index');
Route::get('edit/{role}','RoleController@edit')->name('roles.edit');
Route::patch('update/{role}','RoleController@update')->name('roles.update');
Route::get('create','RoleController@create')->name('roles.create');
Route::post('store','RoleController@store')->name('roles.store');
Route::delete('delete/{id}','RoleController@destroy')->name('roles.delete');
});
Route::group(['prefix'=>'Permissions','middleware'=>['auth','permission:Manage Permission']],function(){
    Route::get('permissions','PermissionController@index')->name('permissions.index');
    Route::get('edit/{permission}','PermissionController@edit')->name('permissions.edit');
    Route::patch('update/{permission}','PermissionController@update')->name('permissions.update');
    Route::get('create','PermissionController@create')->name('permissions.create');
    Route::post('store','PermissionController@store')->name('permissions.store');
    Route::delete('delete/{id}','PermissionController@destroy')->name('permissions.delete');

    });
Route::group(['prefix'=>'Language','middleware'=>'auth'],function ()
{
    Route::post('change/{locale}','LanguageController@changeLanguage');
    Route::get('languages','LanguageController@index')->name('languages.index');
    Route::get('/translate/{language}','LanguageController@translate')->name('languages.translate');
    Route::post('/translate/{language}','LanguageController@update')->name('languages.translate.store');
});
// Route::resources([
//     'photos' => PhotoController::class,
//     'posts' => PostController::class,
// ]);
Route::resources([
    'configurations' => ConfigurationController::class,
    'settings' => SettingController::class,
    'category' => CategoryController::class,
    'model' => UserModelController::class,
    'services' => ServiceController::class,
]);
Route::post('/services/TimeSchemaCreator','ServiceController@TimeSchemaCreator');
Route::get('/services/getDates/{service}','ServiceController@getDates');
Route::get('/services/getModels/{id}','ServiceController@getModels');
Route::get('/services/getTimes/{service}/{date}','ServiceController@getTimes');
Route::get('models/getServices/{UserModel}','UserModelController@getServices');
Route::get('/provider/{username}','HomeController@provider')->name('provider');
Route::post('/provider/{username}/reservation','HomeController@reservation')->name('customer.reservation');
