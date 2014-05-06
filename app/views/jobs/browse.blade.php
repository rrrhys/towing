@extends('layout')
@section('title')
Browse Jobs 
<?php $user = Auth::user() ?>
@if($user && $user->is_lister)
<small></small>
@endif
@stop
@section('page_title')Browse Jobs
@stop
@section('content')
 <div class="row">
 	<div class='col-md-2'><h4>Filter results</h4>
 		<input type="checkbox" id="finished_only" name="finished_only"> Finished only<br/>
 		 <input type="checkbox" id="jobs_within_x_only" name="jobs_within_x_only"> Jobs within 
 		 	<select id='kms_select'>
 		 		<option value='10'>10</option>
 		 		<option value='20'>20</option>
 		 		<option value='50'>50</option>
 		 		<option value='100'>100</option>
 		 		<option value='200'>200</option>
 		 	</select>
 		  kms of <input type="text" id='base_postcode' name='base_postcode' style='float:none;padding: 0;width: 40px;'> only
 	</div>
 	<div class='col-md-10'>

 		<h4>Available jobs 	<a href="{{URL::route('jobs.create')}}" class='btn btn-suncorp pull-right'>List a new job</a></h4> 
<table class="table table-striped table-hover">
@include('jobs.partial.tableheader')
@include('jobs.partial.table')
@if($jobs->count() == 0)
	<tr><td colspan="10">There are no jobs matching your criteria.
		@if($user && $user->is_lister):
			<a href="{{URL::route('jobs.create')}}">List one</a>
		@endif
		</td></tr>
@endif
</table>
</div><!--col-md-12-->
</div>
@stop