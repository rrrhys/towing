@extends('layout')
@section('title')
User information: {{$user->username}}

@stop
@section('page_title')Browse Jobs
@stop
@section('content')
 <div class="row">
 	<div class="col-md-2">
	 	<div class="list-group">
		  <a href="#" class='list-group-item active'>Public Profile</a>
		  <a href="#" class='list-group-item'>Statistics</a>
		  <a href="#contact-details" class='list-group-item' data-toggle='tab'>Contact Details</a>
		  <a href="#user-information" class='list-group-item' data-toggle='tab'>User Information</a>
		</div>
	</div>

 	@if($logged_in_user && $user->id == $logged_in_user->id)
 	<div class='col-md-10'>
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				Change my details
 			</div>
 			<div class="panel-body">
 					<ul>
						<li>Change password</li>
						<li>Change other stuff</li>
					</ul>
 			</div>
 		</div>

 		<div class='tab-content'>
	 		<div class='tab-pane' id='contact-details'>
		 		<div class="panel panel-default">
		 			<div class="panel-heading">
		 				Contact Details
		 			</div>
		 			<div class="panel-body">
						@include('users.partials.contact_details', array('user' => $logged_in_user))
		 			</div>
		 		</div>
		 	</div>
		 	<div class='tab-pane' id='user-information'>
				<div class="panel panel-default">
		 			<div class="panel-heading">
		 				User information
		 			</div>
		 			<div class="panel-body">
						<ul>
							<li>This user has bid on {{count($jobs)}} jobs.</li>
							<li>This user has successfully placed {{$user->bids->count()}} bids.</li>
							<li>This user has listed {{$user->jobs->count()}} jobs.</li>
							<li>This user has {{$user->jobs()->running()->count()}} active jobs.</li>
						</ul>
					</div>
		 		</div>
		 	</div>
		 </div>



	@if($logged_in_user && $user->id == $logged_in_user->id)
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				Statistics
 			</div>
 			<div class="panel-body">

		<h5>Jobs you have bid on:</h5>

		<table class="table table-striped table-hover">
		@include('jobs.partial.tableheader')
		@include('jobs.partial.table')
		@if(is_array($jobs) && count($jobs) == 0 || !is_array($jobs) && $jobs->count() == 0)
			<tr><td colspan="10">This user has not bid on any jobs.
				</td></tr>
		@endif
		</table>


			</div>
 		</div>
		
	@endif

	<h4></h4>





	</div>
	@endif

</div>
@stop