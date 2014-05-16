@extends('layout')
@section('title')
@stop
@section('popout')
<div class="jumbotron">
	<div class='container'>
  <h1>FIND TOWING JOBS</h1>
  <h4>How it works</h4>
  <p>Find and bid on towing jobs in your area <a href="{{URL::route('jobs.browse')}}">Browse jobs...</a></p>
  </div>
</div>
@stop
@section('content')


<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info suncorp">
			<div class="panel-heading">Create an account</div>
			<div class="panel-body">
			<p>Create an account for free to list jobs, or view and start bidding on active jobs.
			  <p style="text-align: right; padding-top: 24px;"><a class="btn btn-suncorp btn-center btn-fixed" role="button" href="/join-tower">I tow vehicles, and need jobs</a><br><br>
			  <a class="btn btn-suncorp btn-fixed" role="button" href="/join-lister">I need a vehicle towed</a></p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info suncorp">
			<div class="panel-heading">Sign in</div>
			<div class="panel-body">
				<span class="login_validation_error"></span>
					@include('users.partials.signin')
			</div>
		</div>
	</div>
 </div>
 <div class="row">
 	<div class='col-md-12'>
	 	<div class='panel panel-info suncorp'>
	 		<div class='panel-heading'>Browse Listings</div>
	 		<div class='panel-body'>
				<table class="table table-striped table-hover">
				@include('jobs.partial.tableheader')
				@include('jobs.partial.table')
				@if($jobs->count() == 0)
					<tr><td colspan="10">There are no jobs matching your criteria.
						@if(isset($user) && $user->is_lister):
							<a href="{{URL::route('jobs.create')}}">List one</a>
						@endif
						</td></tr>
				@endif
				</table>
				<a href="{{URL::route('jobs.browse')}}">Browse more listings</a>
			</div>
		</div>
	</div>
 </div>
@stop