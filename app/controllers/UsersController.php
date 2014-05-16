<?php

class UsersController extends \BaseController {
public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
}
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
	public function createTower(){
		$user = new User();
		$user->is_tower = true;
		$user->user_details = new UserDetail();
		$terms = View::make('terms.towerTermsAndConditions');
		return View::make('users.create-tower')->with('user',$user)->with('terms',$terms);
	}
	public function createLister(){
		$user = new User();
		$user->is_lister = true;
		$user->user_details = new UserDetail();
		$terms = View::make('terms.listerTermsAndConditions');
		return View::make('users.create-lister')->with('user',$user)->with('terms',$terms);
	
	}
	public function verifyEmail($token){
		$user = User::where('email_verify_token','=',$token)->first();

		if($user){
			$user->email_verified = true;
			$user->save();
			Session::flash('success', "Email address was verified! Please sign in.");
			return Redirect::route('signin');
		}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$messages = array(
		    'required' => "':attribute' is required",
		);
		$validatorUser = Validator::make(Input::get('user'), User::$rules,$messages);
		$validatorUserDetails =  Validator::make(Input::get('user_details'), UserDetail::$rules,$messages);
		if(!$validatorUser->passes() || !$validatorUserDetails->passes()){
			$errors = array_merge_recursive(
                                    $validatorUser->messages()->toArray(), 
                                    $validatorUserDetails->messages()->toArray()
                            );
			if(Input::get('account_type') == 'tower'){
				return Redirect::route('join-tower')->with('message','Validation errors occurred!')->withErrors($errors)->withInput();
			}
			else{
				return Redirect::route('join-lister')->with('message','Validation errors occurred!')->withErrors($errors)->withInput();
			}
		}

		$user_form = Input::get('user');
		$user_form['password'] = Hash::make($user_form['password']);
		$user = User::create($user_form);

		if(Input::get('account_type') == 'tower'){
			$user->is_tower = true;
		}
		else{
			$user->is_lister = true;
		}

			$user->save();
		if(Input::has('user_details')){
			$arr = Input::get('user_details');
			$userDetails = new UserDetail($arr);
			$userDetails->user()->associate($user);
			$userDetails->save();
		}
		$user->save();
		
		     Queue::push('SendEmail',array(
            'recipient_id'=>$user->id,
            'email'=>'emails.WelcomePleaseVerifyEmail'));

		return $user->toJson();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{

		//
		$user = User::where('username',$username)->first();
		$jobs = $user->jobs_bid_on();
		$logged_in_user = Auth::user()->load('user_details');

		if($user){
			return View::make('users.view')->with(array('user'=>$user, 'logged_in_user'=>$logged_in_user,'jobs'=>$jobs));
		}
		else{
			return Response::make('Could not find that user.', 404);
		}

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