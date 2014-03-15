@extends('layout')
@section('title')
My Jobs <small><a href="{{URL::route('jobs.create')}}">List a new job</a></small>
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
	</tr>
@foreach($user->jobs as $job)
	<tr>
		<td>{{$job->finished ? "Finished at " . $job->finishes_at : $job->finishes_at}} </td>
		<td title="View Bids">
			<a href="{{URL::route('bids.list', array($job->id))}}">{{$job->current_bid}}</a>
			
		</td>
		<td>{{$job->vehicle_make}}</td>
		<td>{{$job->vehicle_model}}</td>
		<td>{{$job->pickup_postcode}}</td>
		<td>{{$job->dropoff_postcode}}</td>
	</tr>
@endforeach
@if($user->jobs->count() == 0)
	<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
@endif
</table>
@stop