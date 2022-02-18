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
Route::get('/test/', "RateController@index");
Route::view('/pages/single', 'frontend.single')->name('pages/single');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/preview', 'HomeController@preview')->name('preview');

Route::group(['prefix' => 'Users', 'middleware' => 'auth'], function () {
    Route::get('/profile/{user}', 'UserController@profile')->name('users.profile');
    Route::get('/edit/{user}', 'UserController@edit')->name('users.edit')->middleware('permission:Manage User');
    Route::patch('/profile/{user}/update', 'UserController@update')->name('users.update');
    Route::get('/users', 'UserController@index')->name('users.all')->middleware('permission:Manage User');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/delete_user/{user}', 'UserController@delete')->name('users.delete')->middleware('permission:Manage User');
    Route::post('/store', 'UserController@store')->name('users.store');
    Route::get('/reservations/pending', 'UserController@reservations_pending')->name('user.reservations.pending');
    Route::post('/reservations/pending/key', 'UserController@reservations_pending_mark')->name('user.reservations.pending.mark');
    Route::get('/reservations/completed', 'UserController@reservations_completed')->name('user.reservations.completed');
    Route::post('/reservations/completed/key', 'UserController@reservations_completed_mark')->name('user.reservations.completed.mark');
    Route::get('/reservations/rejected', 'UserController@reservations_rejected')->name('user.reservations.rejected');
    Route::post('/reservations/rejected/key', 'UserController@reservations_rejected_mark')->name('user.reservations.rejected.mark');
    Route::get('/reservations/view/{booking}', 'UserController@reservations_view')->name('reservations.view');
    Route::get('/reports/provider', 'UserController@provider_reports')->name('reports.provider');
});
Route::group(['prefix' => 'Roles', 'middleware' => ['auth', 'permission:Manage Role']], function () {
    Route::get('roles', 'RoleController@index')->name('roles.index');
    Route::get('edit/{role}', 'RoleController@edit')->name('roles.edit');
    Route::patch('update/{role}', 'RoleController@update')->name('roles.update');
    Route::get('create', 'RoleController@create')->name('roles.create');
    Route::post('store', 'RoleController@store')->name('roles.store');
    Route::delete('delete/{id}', 'RoleController@destroy')->name('roles.delete');
});
Route::group(['prefix' => 'Permissions', 'middleware' => ['auth', 'permission:Manage Permission']], function () {
    Route::get('permissions', 'PermissionController@index')->name('permissions.index');
    Route::get('edit/{permission}', 'PermissionController@edit')->name('permissions.edit');
    Route::patch('update/{permission}', 'PermissionController@update')->name('permissions.update');
    Route::get('create', 'PermissionController@create')->name('permissions.create');
    Route::post('store', 'PermissionController@store')->name('permissions.store');
    Route::delete('delete/{id}', 'PermissionController@destroy')->name('permissions.delete');

});
Route::group(['prefix' => 'Language', 'middleware' => 'auth'], function () {
    Route::post('change/{locale}', 'LanguageController@changeLanguage');
    Route::get('languages', 'LanguageController@index')->name('languages.index');
    Route::get('/translate/{language}', 'LanguageController@translate')->name('languages.translate');
    Route::post('/translate/{language}', 'LanguageController@update')->name('languages.translate.store');
});

Route::resources([
    'configurations' => ConfigurationController::class,
    'settings' => SettingController::class,
    'category' => CategoryController::class,
    'model' => UserModelController::class,
    'services' => ServiceController::class,
    'customer' => CustomerController::class,
    'rate' => RateController::class,
    'custom_fields' => CustomFieldController::class,
    'age_group_discount' => AgeGroupDiscountController::class,
    'cancel_policy' => CancelPolicyController::class,
    'arguments' => ArgumentController::class,
]);


Route::get('/category/duplicate/{category}', 'CategoryController@duplicate')->name('category.duplicate');
Route::post('/category/getModels/', 'CategoryController@getModels')->name('category.getModels');
Route::get('/model/duplicate/{userModel}', 'UserModelController@duplicate')->name('model.duplicate');
Route::get('/services/duplicate/{service}', 'ServiceController@duplicate')->name('services.duplicate');
Route::get('/customer/{customer}/reservations', 'CustomerController@reservations')->name('customer.reservations');
Route::post('/services/TimeSchemaCreator', 'ServiceController@TimeSchemaCreator');
Route::post('/services/update/{service}', 'ServiceController@update')->name('services.update1');
Route::get('/services/rates/{service}', 'ServiceController@Rates')->name('services.rates');
Route::get('/services/getDates/{service}', 'ServiceController@getDates');
Route::get('/services/getModels/{id}', 'ServiceController@getModels');
Route::get('/services/getTimes/{service}/{date}', 'ServiceController@getTimes');
Route::get('models/getServices/{UserModel}', 'UserModelController@getServices');


// Provider Screen
Route::get('/provider/{username}', 'HomeController@provider')->name('provider');
Route::get('/provider/{username}/search/', 'HomeController@search')->name('provider.search');
Route::post('/provider/{username}/reservation', 'HomeController@reservation')->name('customer.reservation');
Route::get('/provider/{username}/{category}', 'HomeController@ProviderCategory')->name('ProviderCategory');
Route::get('/provider/{username}/{model}/Services/', 'HomeController@ProviderServices')->name('ProviderServices');
Route::post('/provider/{provider}/{service}/finish', 'HomeController@reservation_form')->name('reservation_form');
Route::post('/services/price_calculate/{service}', 'ServiceController@price_calculate');

Route::get('/arguments/provider/{username}', 'ArgumentController@provider_arguments')->name('provider.provider_arguments');
Route::get('/customer/provider/{username}/form', 'CustomerController@reservation_form')->name('customer_front.reservation_form');
Route::get('/customer/provider/{username}', 'CustomerController@reservation')->name('customer_front.reservation');
Route::get('/customer/provider/{username}/cancel', 'CustomerController@reservation_cancel')->name('customer_front.reservation_cancel');
Route::post('/customer/provider/{username}/cancel', 'CustomerController@reservation_cancel_process')->name('customer_front.reservation_cancel_process');

Route::post('/category_image/{categoryImage}', 'CategoryImageController@delete')->name('category_image.destroy');
Route::post('/service_image/{serviceImage}', 'ServiceImageController@delete')->name('service_image.destroy');
Route::post('/model_image/{userModelImage}', 'UserModelImageController@delete')->name('model_image.destroy');
Route::get('Rate/Service/Customer/{id}/{customer}', 'RateController@rate')->name('rate.customer');

Route::get('/test/mail', 'HomeController@mailTest');
Route::get('/mind', 'HomeController@mind');
