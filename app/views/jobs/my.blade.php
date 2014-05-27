@extends('layout')
@section('title')
My Jobs 
@stop
@section('page_title')My Jobs
@stop
@section('content')

 <div class="row">
 	@include('jobs.partial.sidebar')->with(array('active'=>$active,'job_counts'=>$job_counts))
 	<div class='col-md-9'>
 		<div class='tab-content'>
 			<div class='white_out spinner' style='display:none;'><img src='/img/spin.gif'></div>
		 	<div class='tab-pane active' id='my-active'>
				<div class="panel panel-default">
		 			<div class="panel-heading">
		 				{{$job_heading}}
		 			</div>
		 			<div class="panel-body">
						<table class="table table-bordered table-striped">
						@include('jobs.partial.tableheader')->with('jobs',$jobs)
						@include('jobs.partial.table')->with('jobs',$jobs)
						
						@if($jobs->count() == 0)
							<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
						@endif
						</table>
						{{$jobs->links();}}
					</div>
		 		</div>
		 	</div>
		 </div>
		 <div class='spinner' style='height: 300px; width: 300px; '>

		 </div>
	</div><!--col-md-10-->
</div>
@stop