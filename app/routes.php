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

Route::get('/', 'HomeController@showWelcome');

Route::post('signin', array('as'=>'signin', 'uses' => 'SessionsController@store'));
Route::post('signout', array('as'=>'signout', 'uses' => 'SessionsController@destroy'));
Route::get('signout', array('as'=>'signout', 'uses' => 'SessionsController@destroy'));

//is user authentication
Route::post('/users/tokens', 			array('before'=>'auth.is_user','uses'=>'UsersController@listTokens'));
Route::post('/users/deactivate_token', 	array('before'=>'auth.is_user','uses'=>'UsersController@deactivateToken'));


//is corporate authentication
Route::post('/users/add_child', 		array('before'=>'auth.is_corporate','uses'=>'UsersController@corpAddChildUser'));
Route::post('/users/list',				array('before'=>'auth.is_corporate','uses'=>'UsersController@corpListChildUsers'));

Route::resource('users', 'UsersController');

Route::get('/join-tower',array('as'=>'join-tower','uses'=>'UsersController@createTower'));
Route::get('/join-lister',array('as'=>'join-lister','uses'=>'UsersController@createLister'));
Route::post('/user/store',array('as'=>'user.store','uses'=>'UsersController@store'));

Route::get('/user/show/{username}',array('as'=>'user.show','uses'=>'UsersController@show'));
//must be an admin.
Route::post('/admin/users/set_property', 	array('before'=>'auth.admin','uses'=>'AdminController@setProperty'));
Route::post('/admin/users/list', 			array('before'=>'auth.admin','uses'=>'AdminController@listUsers'));


//for listers or towers.
Route::get('/jobs/browse', array('as'=>'jobs.browse', 'uses'=>'JobsController@browse'));


//for listers only.
Route::get('/jobs/my', array('as'=>'jobs.my','before'=>'auth.is_lister', 'uses'=>'JobsController@my'));
Route::get('/jobs/my_corporate', array('before'=>'auth.is_lister', 'uses'=>'JobsController@myCorporate'));

Route::get('/jobs/create', array('before'=>'auth.is_lister', 'as'=>'jobs.create', 'uses'=>'JobsController@create'));
Route::post('/jobs/create', array('before'=>'auth.is_lister','as'=>'jobs.store', 'uses'=>'JobsController@store'));
Route::get('/jobs/{id}/view_details', array('as'=>'bids.create', 'uses'=>'JobsController@job_details'));
Route::post('/jobs/{id}/store_bid', array('as'=>'bids.store', 'uses'=>'JobsController@store_bid'));
Route::get('/jobs/{id}/', array('as'=>'job', 'uses'=>'JobsController@view'));


Route::get('/api_reference', array('as'=>'api','uses'=>'UsersController@api'));