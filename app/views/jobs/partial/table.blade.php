@foreach($jobs as $job)
	<tr class='clickableRow' href='{{URL::route('job',array($job->id))}}'>
		<td>{{$job->present()->timeRemaining}}</td>
		<td title="View Bids">
			<a href="{{URL::route('job', array($job->id))}}">{{$job->current_bid}}</a>
			
		</td>
		<td>{{$job->vehicle_make}}</td>
		<td>{{$job->vehicle_model}}</td>
		<td>{{$job->pickup_postcode}}</td>
		<td>{{$job->dropoff_postcode}}</td>
		<td>{{$job->owner->clickable_email}}</td>
		<td>
			@if(isset($user) && $user->is_lister == false)
				<a href="{{URL::route('job',array($job->id))}}">Place bid</a>
			@endif
				</td>
	</tr>
@endforeach