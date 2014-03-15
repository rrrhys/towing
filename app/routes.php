<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::post('authenticate', array('as'=>'authenticate', 'uses' => 'SessionsController@store'));

//is user authentication
Route::post('/users/tokens', 			array('before'=>'auth.is_user','uses'=>'UsersController@listTokens'));
Route::post('/users/deactivate_token', 	array('before'=>'auth.is_user','uses'=>'UsersController@deactivateToken'));


//is corporate authentication
Route::post('/users/add_child', 		array('before'=>'auth.is_corporate','uses'=>'UsersController@corpAddChildUser'));
Route::post('/users/list',				array('before'=>'auth.is_corporate','uses'=>'UsersController@corpListChildUsers'));

Route::resource('users', 'UsersController');

//must be an admin.
Route::post('/admin/users/set_property', 	array('before'=>'auth.admin','uses'=>'AdminController@setProperty'));
Route::post('/admin/users/list', 			array('before'=>'auth.admin','uses'=>'AdminController@listUsers'));


Route::get('/jobs/my', array('as'=>'jobs.my','before'=>'auth.is_lister', 'uses'=>'JobsController@my'));
Route::get('/jobs/my_corporate', array('before'=>'auth.is_lister', 'uses'=>'JobsController@myCorporate'));

Route::get('/jobs/create', array('as'=>'jobs.create', 'uses'=>'JobsController@create'));
Route::get('/jobs/{id}/bids', array('as'=>'bids.list', 'uses'=>'JobsController@bids'));

Route::get('/api_reference', array('as'=>'api','uses'=>'UsersController@api'));