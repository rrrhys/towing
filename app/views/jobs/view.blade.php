@extends('layout')
@section('title')
Job to postcode {{$job->dropoff_postcode}} <small><a href="{{URL::route('jobs.my')}}">Back to jobs</a></small>
@stop
@section('content')
<h4>Job information</h4>
<ul><li>
This job has been listed by {{$job->owner->clickable_email}}.</li>
<li>A {{$job->vehicle_make}} {{$job->vehicle_model}} needs to be towed from {{$job->pickup_postcode}} to {{$job->dropoff_postcode}} (a distance of approx. {{$job->distance_approx}} km)</li>
</ul>
<h4>Time remaining</h4>
@if(!$job->finished)
This job will close <span class='timeago' title="{{$job->utc}}"></span> ({{$job->finishes_at}})
@else
This job has finished.
@endif
<h4>Current Status</h4>
@if($job->lowest_bid)
	@if($job->finished)
	User {{$job->lowest_bid->owner->clickable_email}} had the lowest bid for this job. You should <a href="{{URL::route('job.approve')->with('id',$job->id)}}">approve the job</a>.
	@else
	The current lowest bid is ${{$job->lowest_bid->amount}} by user {{$job->lowest_bid->owner->clickable_email}}
	@endif


@else
	@if($job->finished)
		@if($user && $user->id == $job->owner->id)
			This job finished with no bids. You can [Relist] it.
		@else
			There were no bids on this job.
		@endif
	@else
		There are currently no bids on this job.
	@endif


@endif

@if(!$job->finished)
<h4>Place Bid</h4>
{{Form::model($bid, array('route'=>array('bids.store',$job->id)))}}

<fieldset class='well'>
@if(!Auth::check())
	<div class='grayed_out' style='padding-top: 80px;'>You need to be signed in to place a bid. <a href="{{URL::route('signin')}}">Sign in</a></div>
@endif
{{Form::label('amount')}}
{{Form::text('amount',$bid->amount,array('class'=>'form-control'))}}
{{Form::label('termsOfBid','Terms of Bid')}}
	<textarea class="col-xs-12 form-control terms-and-conditions">{{$terms}}</textarea>
<br>
			{{Form::submit('Place bid',array('class'=>'btn btn-default'))}}
</fieldset>

{{Form::close()}}
@endif

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

@if($user && $user->is_tower)
	<a href="{{URL::route('bids.create',array($job->id))}}" class='btn btn-primary'>Place Bid</a>
@endif
@if(!$user)
	You need to be logged in to place a bid.
@endif
@stop