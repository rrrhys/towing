@foreach($jobs as $job)
	<tr class='clickableRow' href='{{URL::route('job',array($job->id))}}'>
		<td>{{$job->time_remaining}}</td>
		<td>{{$job->vehicle_make}} {{$job->vehicle_model}}</td>
		<td>{{$job->pickup_postcode}} to {{$job->dropoff_postcode}}</td>
		<td title="View Bids">
			${{$job->current_bid}}
			
		</td>
	</tr>
@endforeach