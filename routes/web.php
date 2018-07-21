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

	//site info
	  Route::get('/admin/site_settings', 'Dashboard\SiteSettingController@index');
	  Route::get('/admin/edit_info/{id}', 'Dashboard\SiteSettingController@edit');
	  Route::patch('/admin/updateSiteInfo/{id}', 'Dashboard\SiteSettingController@update');

});

//Editor panel
Route::group(['middleware'=>'roles', 'roles'=>['admin', 'editor']], function(){


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
