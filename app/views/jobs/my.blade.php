@extends('layout')
@section('title')
My Jobs 
@stop
@section('page_title')My Jobs
@stop
@section('content')

 	<div class='col-md-10'>
		<h4>Active <a href="{{URL::route('jobs.create')}}" class='btn btn-suncorp pull-right'>List a new job</a></h4>
		<?php $jobs = $user->jobs()->running()->with('owner')->get(); ?>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Finish Time</th>
				<th>Current Bid</th>
				<th>Vehicle Make</th>
				<th>Vehicle Model</th>
				<th>Pickup at</th>
				<th>Dropoff at</th>
			</tr>
		@include('jobs.partial.table')
		@if($jobs->count() == 0)
			<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
		@endif
		</table>

		<h4></h4>
		<?php $jobs = $user->jobs()->finished()->with('owner')->get(); ?>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Finish Time</th>
				<th>Current Bid</th>
				<th>Vehicle Make</th>
				<th>Vehicle Model</th>
				<th>Pickup at</th>
				<th>Dropoff at</th>
			</tr>
		@include('jobs.partial.table')
		@if($jobs->count() == 0)
			<tr><td colspan="6">You have no jobs! <a href="{{URL::route('jobs.create')}}">List one</a></td></tr>
		@endif
		</table>
</div><!--col-md-10-->
@stop