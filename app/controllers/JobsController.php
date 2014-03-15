<?php
use Carbon\Carbon;
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
		$job = Job::where('id','=',$id)->first();

		if($job){
			return View::Make('bids.list')->with('job',$job);
		}
	}
	public function my($sort_column="finishes_at", $sort_direction="asc"){
		//return this users jobs.
		$user = Auth::User();
		if(Request::ajax()){
			return $user->jobs->orderBy($sort_column,$sort_direction)->toJson();
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
		$job = new Job();
		
		

		return View::make('jobs.create')->with('job',$job);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		$finishes_hours_from_now = $input['finishes_at'];
		$input['finishes_at'] = Carbon::now()->addHours($finishes_hours_from_now);
		$input['started_at'] = Carbon::now();
		if($input['pickup_at'] == ""){unset($input['pickup_at']);}
		if($input['dropoff_at'] == ""){unset($input['dropoff_at']);}
		$input['pickup_at'] = Carbon::createFromFormat('d/m/Y',($input['pickup_at']));
		Log::debug($input);
		//$job = Job::create($input);
		$job = new Job($input);
		$job->user_id = Auth::User()->id;
		$job->top_user_id = Auth::User()->parent->id;
		$job->save();

		return Redirect::to('jobs.my');

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