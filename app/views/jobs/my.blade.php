@extends('layout')
@section('title')
My Jobs 
@stop
@section('page_title')My Jobs
@stop
@section('content')

<?php $active_jobs = $user->jobs()->running()->with('owner')->get(); ?>
<?php $finished_jobs = $user->jobs()->finished()->notawarded()->with('owner')->get(); ?>
<?php $to_approve_jobs = $finished_jobs->filter(function($job){
	return $job->lowest_bid != null;
}); ?>
<?php $to_relist_jobs = $finished_jobs->filter(function($job){
	return $job->lowest_bid == null;
}); ?>
<?php $jobs_in_progress = $user->jobs()->finished()->awarded()->with('owner')->get(); ?>

 <div class="row">
 	<div class="col-md-2">
	 	<div class="list-group">
	 	<a href="#" class='list-group-item heading'>Listing</a>
		  <a href="#my-active" class='list-group-item active' data-toggle='tab'>My Active listings <span class='badge'>{{count($active_jobs) == 0 ? "": count($active_jobs)}}</span></a>
		  <a href="#my-to-approve" class='list-group-item ' data-toggle='tab'>Jobs to approve <span class='badge badge-important'>{{count($to_approve_jobs) == 0 ? "": count($to_approve_jobs)}}</span></a>
		  <a href="#my-relist" class='list-group-item' data-toggle='tab'>Jobs to relist <span class='badge'>{{count($to_relist_jobs) == 0 ? "": count($to_relist_jobs)}}</a>
		  <a href="#my-in-progress" class='list-group-item' data-toggle='tab'>Jobs in progress<span class='badge'>{{count($jobs_in_progress) == 0 ? "": count($jobs_in_progress)}}</span></a>
		</div>
	 	<div class="list-group">
	 		<a href="#" class='list-group-item heading'>Bidding</a>
		  <a href="#" class='list-group-item'>Bidding</a>
		  <a href="#" class='list-group-item'>Won</a>
		  <a href="#contact-details" class='list-group-item' data-toggle='tab'>Lost</a>
		  <a href="#" class='list-group-item'>Jobs in progress</a>
		</div>
	</div>
 	<div class='col-md-10'>
 		<div class='tab-content'>
		 	<div class='tab-pane active' id='my-active'>
				<div class="panel panel-default">
		 			<div class="panel-heading">
		 				My Active Jobs
		 			</div>
		 			<div class="panel-body">
						<?php $jobs = $active_jobs; ?>
						<table class="table table-bordered table-striped">
						@include('jobs.partial.tableheader')
						@include('jobs.partial.table')
						@if($jobs->count() == 0)
							<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
						@endif
						</table>
					</div>
		 		</div>
		 	</div>

		 	<div class='tab-pane' id='my-to-approve'>
				<div class="panel panel-default">
		 			<div class="panel-heading">
		 				Jobs to approve
		 			</div>
		 			<div class="panel-body">
						<?php $jobs = $to_approve_jobs; ?>
						<table class="table table-bordered table-striped">
						@include('jobs.partial.tableheader')
						@include('jobs.partial.table')
						@if($jobs->count() == 0)
							<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
						@endif
						</table>
					</div>
		 		</div>
		 	</div>

		 	<div class='tab-pane' id='my-relist'>
				<div class="panel panel-default">
		 			<div class="panel-heading">
		 				Jobs to relist
		 			</div>
		 			<div class="panel-body">
						<?php $jobs = $to_relist_jobs; ?>
						<table class="table table-bordered table-striped">
						@include('jobs.partial.tableheader')
						@include('jobs.partial.table')
						@if($jobs->count() == 0)
							<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
						@endif
						</table>
					</div>
		 		</div>
		 	</div>

		 	<div class='tab-pane' id='my-in-progress'>
				<div class="panel panel-default">
		 			<div class="panel-heading">
		 				Jobs in progress
		 			</div>
		 			<div class="panel-body">
						<?php $jobs = $jobs_in_progress; ?>
						<table class="table table-bordered table-striped">
						@include('jobs.partial.tableheader')
						@include('jobs.partial.table')
						@if($jobs->count() == 0)
							<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
						@endif
						</table>
					</div>
		 		</div>
		 	</div>
		 </div>
	</div><!--col-md-10-->
</div>
@stop