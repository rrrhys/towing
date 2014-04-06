@extends('layout')
@section('title')
Place a bid on job from {{$job->pickup_postcode}} to {{$job->dropoff_postcode}}
@stop
@section('page_title')Bid on job: {{$job->pickup_postcode}} to {{$job->dropoff_postcode}}
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

@stop