@extends('layout')
@section('title')
User information: {{$user->username}}

@stop
@section('page_title')Browse Jobs
@stop
@section('content')
 <div class="row">

 	@if($logged_in_user && $user->id == $logged_in_user->id)
 	<div class='col-md-12'><h4>Change my details</h4>
	<ul>
		<li>Change password</li>
		<li>Change other stuff</li>
	</ul>
	</div>
	@endif

 	<div class='col-md-12'><h4>User information</h4>
zzz
</div><!--col-md-12-->
</div>
@stop