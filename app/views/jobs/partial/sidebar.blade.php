 	<div class="col-md-2">
	 	<div class="list-group">
	 	<a href="#" class='list-group-item heading'>Listing</a>	
		  <a href="{{URL::route('jobs.my')}}" class='list-group-item {{$active == 'my' ? "active" : ""}}'>My Active listings <span class='badge'>{{$job_counts->active == 0 ? "": $job_counts->active}}</span></a>
		  <a href="{{URL::route('jobs.toApprove')}}" class='list-group-item {{$active == 'toApprove' ? "active" : ""}}'>Jobs to approve <span class='badge badge-important'>{{$job_counts->toApprove == 0 ? "": $job_counts->toApprove}}</span></a>
		  <a href="{{URL::route('jobs.toRelist')}}" class='list-group-item {{$active == 'toRelist' ? "active" : ""}}'>Jobs to relist <span class='badge'>{{$job_counts->toRelist == 0 ? "": $job_counts->toRelist}}</a>
		  <a href="{{URL::route('jobs.inProgress')}}" class='list-group-item {{$active == 'inProgress' ? "active" : ""}}'>Jobs in progress<span class='badge'>{{$job_counts->inProgress == 0 ? "": $job_counts->inProgress}}</span></a>
		</div>
	 	<div class="list-group">
	 		<a href="#" class='list-group-item heading'>Bidding</a>
		  <a href="{{URL::route('jobs.bidding')}}" class='list-group-item'>Bidding</a>
		  <a href="{{URL::route('jobs.won')}}" class='list-group-item'>Won</a>
		  <a href="{{URL::route('jobs.lost')}}" class='list-group-item' data-toggle='tab'>Lost</a>
		  <a href="{{URL::route('jobs.wonInProgress')}}" class='list-group-item'>Jobs in progress</a>
		</div>
	</div>