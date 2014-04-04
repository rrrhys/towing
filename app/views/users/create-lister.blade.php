@extends('layout')
@section('title')
Create new Listing account
@stop
@section('content')
<p>This page creates a new account for users who will be listing jobs for others to bid on. If you wish to instead bid on items to win work, <a href="{{URL::route('join-tower')}}">create an account here</a> instead.
{{Form::model($user,array('route'=>'user.store'))}}

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		@include('users.partials.registration_login_details')
		@include('users.partials.company_details')
		@include('users.partials.contact_details')
		
		{{Form::hidden('account_type','lister')}}
		<h4>Terms and Conditions</h4>
		<fieldset class="well">
			<textarea class="col-xs-12 form-control">{{$terms}}</textarea>
			<label style="display:block" class="col-xs-12">
				{{Form::checkbox('agree')}} I agree to the terms and conditions
			</label>

			{{Form::submit('Create new user account',array('class'=>'btn btn-default'))}}
		</fieldset>


	</div>
</div>
@stop