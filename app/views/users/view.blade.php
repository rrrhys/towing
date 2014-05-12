@extends('layout')
@section('title')
User information: {{$user->username}}

@stop
@section('page_title')Browse Jobs
@stop
@section('content')
 <div class="row">

 	@if($logged_in_user && $user->id == $logged_in_user->id)
 	<div class='col-md-12'><h4>Change my details</h4>
	<ul>
		<li>Change password</li>
		<li>Change other stuff</li>
	</ul>

		@include('users.partials.contact_details', array('user' => $logged_in_user))

	</div>
	@endif

 	<div class='col-md-12'><h4>User information</h4>


@if($logged_in_user && $user->id == $logged_in_user->id)
	<h5>Jobs you have bid on:</h5>

	<table class="table table-striped table-hover">
	@include('jobs.partial.tableheader')
	@include('jobs.partial.table')
	@if(is_array($jobs) && count($jobs) == 0 || !is_array($jobs) && $jobs->count() == 0)
		<tr><td colspan="10">This user has not bid on any jobs.
			</td></tr>
	@endif
	</table>
@else
<ul>
	<li>This user has bid on {{count($jobs)}} jobs.</li>
	<li>This user has successfully placed {{$user->bids->count()}} bids.</li>
	<li>This user has listed {{$user->jobs->count()}} jobs.</li>
	<li>This user has {{$user->jobs()->running()->count()}} active jobs.</li>
</ul>
@endif

</div><!--col-md-12-->
</div>
@stop