@extends('layout')
@section('title')
Create new account
@stop
@section('content')
<p>This page creates a new account for users who will be bidding on jobs. If you wish to instead list jobs for bidding, please <a href="{{URL::route('join-lister')}}">create an account here</a> instead.
{{Form::model($user,array('route'=>'user.store'))}}

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h4>Login details</h4>
		<fieldset class="well">
			{{Form::hidden('user_type','Tower')}}
			{{Form::label('user[email]','Email Address')}}
			{{Form::text('user[email]',$user->email,array('class'=>'form-control'))}}
			<div class="control-group">
				{{Form::label('user[password]','Password')}}
				{{Form::password('user[password]',array('class'=>'form-control col-xs-12'))}}
			</div>

			{{Form::label('user[password_confirmation]','Password Confirmation')}}
			{{Form::password('user[password_confirmation]',array('class'=>'form-control'))}}
		</fieldset>
		<h4>Company Details</h4>
		<fieldset class="well">

		{{Form::label('company_trading_name', 'Company Trading Name')}}
		{{Form::text('company_trading_name', $user->tower_details->company_trading_name,array('class'=>'form-control'))}}

		{{Form::label('tower_details.abn','Company ABN')}}
		{{Form::text('tower_details.abn', $user->tower_details->abn,array('class'=>'form-control'))}}
		</fieldset>

		<h4>Contact Details</h4>
		<fieldset class="well">
		<div class="row">
			<div class="col-xs-6">
			{{Form::label('tower_details[contact_first_name]','First Name')}}
			{{Form::text('tower_details[contact_first_name]', $user->tower_details->contact_first_name,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-6">
			{{Form::label('tower_details[contact_surname]','Surname')}}
			{{Form::text('tower_details[contact_surname]', $user->tower_details->contact_surname,array('class'=>'form-control'))}}
			</div>
		</div>
		{{Form::label('tower_details[address_line_1]','Address Line 1')}}
		{{Form::text('tower_details[address_line_1]', $user->tower_details->address_line_1,array('class'=>'form-control'))}}
		{{Form::label('tower_details[address_line_2]','Address Line 2')}}
		{{Form::text('tower_details[address_line_2]', $user->tower_details->address_line_2,array('class'=>'form-control'))}}
		<div class="row">
			<div class="col-xs-4">
			{{Form::label('tower_details[suburb]','Suburb')}}
			{{Form::text('tower_details[suburb]', $user->tower_details->suburb,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-4">
			{{Form::label('tower_details[state]','State')}}
			{{Form::text('tower_details[state]', $user->tower_details->state,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-4">
				{{Form::label('tower_details[postcode]','Postcode')}}
				{{Form::text('tower_details[postcode]', $user->tower_details->postcode,array('class'=>'form-control'))}}
			</div>
		</div>

		</fieldset>
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