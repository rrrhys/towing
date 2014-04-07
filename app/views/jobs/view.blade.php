@extends('layout')
@section('title')
Bids on job to postcode {{$job->dropoff_postcode}} <small><a href="{{URL::route('jobs.my')}}">Back to jobs</a></small>
@stop
@section('content')

<h4>Time remaining</h4>
@if(!$job->finished)
This job will close <span class='timeago' title="{{$job->utc}}"></span> ({{$job->finishes_at}})
@else
This job has finished.
@endif
<h4>Current Status</h4>
@if($job->lowest_bid)
The current lowest bid is ${{$job->lowest_bid->amount}} by user {{$job->lowest_bid->owner->clickable_email}}
@else
There is currently no lowest bid.

@endif


<h4>Place Bid</h4>
{{Form::model($bid, array('route'=>array('bids.store',$job->id)))}}

<fieldset class='well'>

{{Form::label('amount')}}
{{Form::text('amount',$bid->amount,array('class'=>'form-control'))}}
{{Form::label('termsOfBid','Terms of Bid')}}
	<textarea class="col-xs-12 form-control">{{$terms}}</textarea>
<br>
			{{Form::submit('Place bid',array('class'=>'btn btn-default'))}}
</fieldset>

{{Form::close()}}

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
		<td>{{$bid->owner->clickable_email}}</td>
		<td>{{$bid->amount}}</td>
		<td>{{$bid->id == $job->lowest_bid->id ? "*" : ""}}</td>
		<td>{{$bid->created_at}}</td>
	</tr>
@endforeach
@if($job->bids->count() == 0)
	<tr><td colspan="6">There are no bids!</td></tr>
@endif
</table>
<?php $user = Auth::user() ?>
@if($user && $user->is_tower)
	<a href="{{URL::route('bids.create',array($job->id))}}" class='btn btn-primary'>Place Bid</a>
@endif
@if(!$user)
	You need to be logged in to place a bid.
@endif
@stop