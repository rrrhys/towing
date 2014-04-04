@extends('layout')
@section('title')
My Jobs <small><a href="{{URL::route('jobs.create')}}">List a new job</a></small>
@stop
@section('page_title')Browse Jobs
@stop
@section('content')
<table class="table table-bordered table-striped">
	<tr>
		<th>Finish Time</th>
		<th>Current Bid</th>
		<th>Vehicle Make</th>
		<th>Vehicle Model</th>
		<th>Pickup at</th>
		<th>Dropoff at</th>
		<th>Actions</th>
	</tr>
@include('jobs.partial.table')
@if($jobs->count() == 0)
	<tr><td colspan="6">There are no jobs matching your criteria.
		@if($user->is_lister):
			<a href="{{URL::route('jobs.create')}}">List one</a>
		@endif
		</td></tr>
@endif
</table>
@stop