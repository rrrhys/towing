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

	// The user who listed this job can approve it to go ahead.
	public function approved($id){
		$user = Auth::user();
		$job = $user->jobs()->where('id',$id)->first();
		if(!$job){
			return Response::make("You are not authorised to approve this job.",404);
		}
		if(!$job->finished){
			return Response::make("This job is not finished - you cannot approve it yet.",404);
		}

		$job->AwardToLowestBidder();

		Session::flash('success','The job has been awarded.');
		return Redirect::route('job',array('id'=>$job->id));
	}
	// The user who listed this job can relist it if it finished with no bids.
	public function relist($id){
		$user = Auth::user();
		$job = $user->jobs()->where('id',$id)->first();
		if(!$job){
			return Response::make("You are not authorised to relist this job.",404);
		}
		if(!$job->finished){
			return Response::make("This job is not finished - you cannot relist it yet.",404);
		}
		echo "TODO.";
		echo $job->finished;
	}
	public function view($id){
		$job = Job::where('id','=',$id)->first();
		$bid = new Bid();
		$terms = View::make('terms.createBidTermsAndConditions');
		if($job){
			return View::Make('jobs.view')->with(array('job'=>$job, 'bid'=>$bid, 'terms'=>$terms,'user'=>Auth::User()));
		}else{
			return Response::make("Couldn't find that job.",404);
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

	public function browse($sort_column="finishes_at", $sort_direction="asc"){
		$jobs = Job::running()->orderBy($sort_column)->get();
		if(Request::ajax()){
			return $jobs->orderBy($sort_column, $sort_direction)->toJson();
		}else{
			return View::make('jobs.browse')->with(array('jobs'=>$jobs,'user'=>Auth::User()));
		}
	}
	public function store_bid($id){
		$job = Job::where('id',$id)->first();
		if($job){
		//work on saving bid.
			$amount = Input::get('amount');
			if(!is_numeric($amount)){
				Session::flash('error', 'Please enter a number!');
				return Redirect::route('job',array('id'=>$job->id));
			}
			else
			{
				$amount = (float)$amount;
				$user = Auth::user();
				$bidResult = $job->addBid($amount, $user);
				if($bidResult['result'] == 'true'){
					Session::flash('success', $bidResult['messages'][0]);
				}
				else{
					Session::flash('error', $bidResult['messages'][0]);
				}
				
				return Redirect::route('job',array('id'=>$job->id));		
			}

		}else{
			return Response::make("Couldn't find that job.",404);
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

		$user = Auth::user();

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
		$job->user_id = $user->id;

		if($user->parent){
			$job->top_user_id = $user->parent->id;
		}
		
		$job->save();

		return Redirect::route('jobs.my');

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