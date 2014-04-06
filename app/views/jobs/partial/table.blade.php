@foreach($jobs as $job)
	<tr>
		<td>{{$job->finished ? "Finished at " . $job->finishes_at : $job->finishes_at}} </td>
		<td title="View Bids">
			<a href="{{URL::route('bids.list', array($job->id))}}">{{$job->current_bid}}</a>
			
		</td>
		<td>{{$job->vehicle_make}}</td>
		<td>{{$job->vehicle_model}}</td>
		<td>{{$job->pickup_postcode}}</td>
		<td>{{$job->dropoff_postcode}}</td>
		<td>{{$job->owner->clickable_email}}</td>
		<td>
			@if($user->is_tower)
				<a href="{{URL::route('bids.create',array($job->id))}}">Place bid</a>
			@endif
				</td>
	</tr>
@endforeach