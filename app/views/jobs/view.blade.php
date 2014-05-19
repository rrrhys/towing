@extends('layout')
@section('title')
Job to postcode {{$job->dropoff_postcode}} <small><a href="{{URL::route('jobs.my')}}">Back to jobs</a></small>
@stop
@section('content')

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBscBtAvr786h6pIw-7W2Kh7VftgoDyEcM&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<h4>Job information</h4>
		@if($job->owner == Auth::user() && $job->finished)
			@if($job->awarded)
				<div class='alert alert-success alert-dismissable'>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					This job was awarded to {{$job->lowest_bid->owner->clickable_email}}.
				</div>
			@else
				@if($job->lowest_bid)
					<div class='alert alert-info alert-dismissable'>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						You should <a href="#approveModal" data-toggle='modal'>approve this job</a> so the winner can prepare to pick up your vehicle.
					</div>
				@else
					<div class='alert alert-info alert-dismissable'>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						This job ended with no bids. You can <a href="{{URL::route('job.relist',array($job->id))}}">relist this job</a> if you'd like to try again.
					</div>				
				@endif
			@endif
		@endif
<ul><li>
This job has been listed by {{$job->owner->clickable_email}}.</li>
<li>A <strong>{{$job->vehicle_make}} {{$job->vehicle_model}}</strong> needs to be towed from <strong>{{$job->pickup_postcode}} to {{$job->dropoff_postcode}}</strong> (a distance of approx. {{$job->distance_approx}} km)</li>
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
	User {{$job->lowest_bid->owner->clickable_email}} had the lowest bid for this job. 
		@if($job->owner == Auth::user() && !$job->awarded)
		You should <a href="" data-toggle='modal'>approve the job</a>.
		@endif
	@else
	The current lowest bid is ${{$job->lowest_bid->amount}} by {{$job->lowest_bid->owner->clickable_email}} <span class='timeago' title="{{$job->lowest_bid->utc}}"></span>
	@endif


@else
	@if($job->finished)
		@if($user && $user->id == $job->owner->id)
			This job finished with no bids. You should <a href="{{URL::route('job.relist',array($job->id))}}">relist the job</a>.
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
@if(!Auth::user()->email_verified)
	<div class='grayed_out' style='padding-top: 80px;'>You need to verify your email to place a bid. <a href="{{URL::route('user.resend_verify')}}">Resend verify email</a></div>
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

<div class="modal fade" id='approveModal'>
  <div class="modal-dialog">
    <div class="modal-content">
	     <div class="modal-header">
	       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Approve job</h4>
	     </div>
	     @if($job->lowest_bid)
	     <div class='modal-body'>
	      		<fieldset class="well">	
	      		{{Form::open(array('route'=>array('job.approved',$job->id),'id'=>'approveJob'))}}
				<p>Clicking 'Approve' below indicates you agree to pay <strong>${{$job->lowest_bid->amount}}</strong> to {{$job->lowest_bid->owner->clickable_email}} on completion of the job.<h3>Do you agree?</h3>
				  <p style="text-align: right; padding-top: 24px;"><a class="btn btn-primary btn-center btn-fixed" role="button" href="#" onClick="document.getElementById('approveJob').submit();">YES, approve job</a><br><br>
				  <a href="#"  data-dismiss="modal">No, cancel</a></p>
				{{Form::close()}}
				</fieldset>		
		</div>
		@endif
    </div>
  </div>
</div>

<div id="map-canvas"/>
@stop