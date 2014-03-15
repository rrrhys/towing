<?php

class UsersController extends \BaseController {

	public function corpAddChildUser(){
		$user = Auth::user();


		$email = Input::get('email');
		$password = Input::get('password');

		$new_user = new User();
		$new_user->parent_id = $user->id;
		$new_user->email = $email;
		$new_user->password = $password;
		$new_user->save();
		return $new_user->toJson();

	}

	public function corpListChildUsers(){
		$user = Auth::user();
		$users = $user->children;
		return $users->toJson();

	}
	public function listTokens(){
		$user = Auth::user();
		$tokens = $user->tokens;
		Log::info($tokens);
		return $tokens->toJson();
	}
	public function deactivateToken(){
		$deactivate_token = Input::get('deactivate_token');
		$user = Auth::user();
		$deactivate_token = $user->tokens()->where('token','=',$deactivate_token)->first();
		if($deactivate_token){
			$deactivate_token->delete();
		}
		else{
			return Response::make('Invalid token supplied for deactivation.', 401);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return View::make('index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function api()
	{
		//
		$user = new User;
		return View::make('users.api')->with('user',$user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$user = User::create(Input::all());
		$user->save();
		return $user->toJson();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}