<?php

//Login
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Admin
Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function(){

	//Dashboard
	Route::get('/', array('as' => 'dashboard', 'uses' => 'Admin\DashboardController@index'));

	//Users
	Route::resource('users', 'Admin\UsersController');
	Route::post('users/delete', array('as' => 'admin.users.delete', 'uses' => 'Admin\UsersController@delete'));

});