@extends('layout')
@section('title')
My Jobs 
@stop
@section('page_title')My Jobs
@stop
@section('content')
 <div class="row">
 	<div class="col-md-2">
	 	<div class="list-group">
	 	<a href="#" class='list-group-item heading'>Listing</a>
		  <a href="#" class='list-group-item active'>My Active listings</a>
		  <a href="#" class='list-group-item'>Jobs to approve</a>
		  <a href="#contact-details" class='list-group-item' data-toggle='tab'>Jobs to relist</a>
		  <a href="#" class='list-group-item'>Jobs in progress</a>
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
		<h4>Active <a href="{{URL::route('jobs.create')}}" class='btn btn-suncorp pull-right'>List a new job</a></h4>
		<?php $jobs = $user->jobs()->running()->with('owner')->get(); ?>
		<table class="table table-bordered table-striped">
		@include('jobs.partial.tableheader')
		@include('jobs.partial.table')
		@if($jobs->count() == 0)
			<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
		@endif
		</table>

		<h4></h4>
		<?php $jobs = $user->jobs()->finished()->with('owner')->get(); ?>
		<table class="table table-bordered table-striped">
		@include('jobs.partial.tableheader')
		@include('jobs.partial.table')
		@if($jobs->count() == 0)
			<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
		@endif
		</table>
	</div><!--col-md-10-->
</div>
@stop