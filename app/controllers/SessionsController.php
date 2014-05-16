<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * Mapped to /authenticate
	 *
	 * @return Response
	 */
	public function store()
	{
		$email = Input::get('email');
		$token = str_random(40);
		Log::info('Email supplied was ' . $email . ", token will be " . $token);
		if(Auth::attempt(array(
			'email'=>$email, 
			'password'=>Input::get('password')))){
			$user = Auth::user();
				$session = new TokenSession();
				$session->email = $email;
				$session->token = $token;
				$session->user_id = $user->id;
				$session->save();
				$session->is_admin = $user->is_admin;
				return Redirect::route('jobs.my');
		}
		else{
			Session::flash('error','Could not log you in. Please check your email and password.');
			return Redirect::route('signin');
		}

	}
	public function destroy(){
		Auth::logout();
		Session::flash('success', 'You have been logged out successfully.');
		return Redirect::to("/");
	}

}