<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
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
				$session = new TokenSession();
				$session->email = $email;
				$session->token = $token;
				$session->save();
				return $session->toJson();
		}
		else{
			return Response::make('', 401);
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	}

}