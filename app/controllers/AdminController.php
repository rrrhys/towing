<?php

class AdminController extends \BaseController {

//protected by admin filter.
	public function setProperty(){
		$property = Input::get('property_name');
		$property_value = (int)Input::get('property_value');
		$user_id = (int)Input::get('user');

		$user = User::find($user_id);
		Log::info("Property $property will be set to $property_value on user $user_id");

		$user->$property = $property_value;
		$user->save();
	}
	public function listUsers(){
		$users = User::all();
			return $users->toJson();


	}

}