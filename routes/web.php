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

//Admin panel
Route::group(['middleware'=>'roles', 'roles'=>'admin'], function(){

	//Roles
	  Route::get('/admin', 'Dashboard\RolesController@showPanel');
	  Route::get('/users', 'Dashboard\RolesController@showUsers');
	  Route::post('/add-roles', 'Dashboard\RolesController@addRole');

	 //Users
	  Route::get('/admin/all-users', 'Dashboard\UsersController@index');
	  Route::get('/admin/user_edit/{id}', 'Dashboard\UsersController@edit');
	  Route::patch('/admin/user_update/{id}', 'Dashboard\UsersController@update');

	//site info
	  Route::get('/admin/site_settings', 'Dashboard\SiteSettingController@index');
	  Route::get('/admin/edit_info/{id}', 'Dashboard\SiteSettingController@edit');
	  Route::patch('/admin/updateSiteInfo/{id}', 'Dashboard\SiteSettingController@update');

	//Services
	  Route::get('/admin/service', 'Dashboard\ServiceController@index');
	  Route::get('/admin/service_edit/{id}', 'Dashboard\ServiceController@edit');
	  Route::get('/admin/service_create', 'Dashboard\ServiceController@create');
	  Route::post('/admin/service_store', 'Dashboard\ServiceController@store');
	  Route::patch('/admin/update_service/{id}', 'Dashboard\ServiceController@update');

	//Cars
	  Route::get('/admin/car', 'Dashboard\CarController@index');
	  Route::get('/admin/car_edit/{id}', 'Dashboard\CarController@edit');
	  Route::get('/admin/car_create', 'Dashboard\CarController@create');
	  Route::post('/admin/car_store', 'Dashboard\CarController@store');
	  Route::patch('/admin/car_update/{id}', 'Dashboard\CarController@update');

});

//Editor panel
Route::group(['middleware'=>'roles', 'roles'=>['admin', 'editor']], function(){


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
