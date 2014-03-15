<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});
Route::filter('auth.is_user',function(){

	$token = Input::get('token');
	$tokenSession = TokenSession::where('token','=',$token)->first();
	if(!$tokenSession){
		$user = Auth::user();
		if(!$user){
			return Response::make('You need to be a user to do this.',401);
		}
	}
	else{
		$user = $tokenSession->user;		
	}

		if(!$user){
			return Response::make('You need to be a user to do this.',401);
		}
		else{
			if(!Auth::check()){
				Auth::login($user);
			}
		}
});
Route::filter('auth.is_corporate',function(){
	$token = Input::get('token');
	$tokenSession = TokenSession::where('token','=',$token)->first();
	if(!$tokenSession){
		$user = Auth::user();
		if(!$user){
			return Response::make('You need to be a corporate user to do this.',401);
		}
	}
	else{
		$user = $tokenSession->user;
	}
		if(!$user->is_corporate){
			return Response::make('You need to be a corporate user to do this.',401);
		}
		else{
			if(!Auth::check()){
				Auth::login($user);
			}
		}
});
Route::filter('auth.admin',function(){
	$token = Input::get('token');
	$tokenSession = TokenSession::where('token','=',$token)->first();
	if(!$tokenSession){
		$user = Auth::user();
		if(!$user){
			return Response::make('You need to be an administrator to do this.',401);
		}
	}
	else{
		$user = $tokenSession->user;
	}
		if(!$user->is_admin){
			return Response::make('You need to be an administrator to do this.',401);
		}
		else{
			if(!Auth::check()){
				Auth::login($user);
			}
		}
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});