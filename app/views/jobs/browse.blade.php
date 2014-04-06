@extends('layout')
@section('title')
Browse Jobs 
@if(Auth::user()->is_lister)
<small><a href="{{URL::route('jobs.create')}}">List a new job</a></small>
@endif
@stop
@section('page_title')Browse Jobs
@stop
@section('content')
<table class="table table-bordered table-striped">
@include('jobs.partial.tableheader')
@include('jobs.partial.table')
@if($jobs->count() == 0)
	<tr><td colspan="10">There are no jobs matching your criteria.
		@if($user->is_lister):
			<a href="{{URL::route('jobs.create')}}">List one</a>
		@endif
		</td></tr>
@endif
</table>
@stop