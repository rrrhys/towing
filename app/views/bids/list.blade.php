@extends('layout')
@section('title')
Bids on job to postcode {{$job->dropoff_postcode}} <small><a href="{{URL::route('jobs.my')}}">Back to jobs</a></small>
@stop
@section('content')
<h4>Bids placed</h4>
<table class="table table-bordered table-striped">
	<tr>
		<th>User</th>
		<th>Amount</th>
		<th>Winning</th>
		<th>Placed</th>
	</tr>
@foreach($job->bids as $bid)
	<tr>
		<td>{{$bid->owner->email}}</td>
		<td>{{$bid->amount}}</td>
		<td>{{$bid->id == $job->lowest_bid->id ? "*" : ""}}</td>
		<td>{{$bid->created_at}}</td>
	</tr>
@endforeach
@if($job->bids->count() == 0)
	<tr><td colspan="6">You have no bids!</td></tr>
@endif
</table>
@stop