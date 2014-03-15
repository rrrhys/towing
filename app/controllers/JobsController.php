<?php

class JobsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
	public function myCorporate(){
		//return all jobs belonging to this users company.
		$user = Auth::User();
		$company = $user->parent;
		if($company){
			return $company->jobs->toJson();
		}
		else{
			return View::make('jobs.mycorporate');
			//return Response::make("You need to belong to a corporate account to do that.",401);
		}
	}
	public function bids($id){
		return "Bids for $id";
	}
	public function my(){
		//return this users jobs.
		$user = Auth::User();
		if(Request::ajax()){
			return $user->jobs->toJson();
		}
		else{
			return View::make('jobs.my')->with('user',$user);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "Create job";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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