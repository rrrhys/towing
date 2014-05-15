		<fieldset class="well">
		<div class="row">
			<div class="col-xs-12">
{{Form::label('user[email]','Email Address')}}
{{ $errors->first('email',Form::validationWrapper())}}
			{{Form::text('user[email]',$user->email,array('class'=>'form-control '. ($errors->has('username') ? "validation_error" : "")))}}	
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
			{{Form::label('user_details[contact_first_name]','First Name')}}
			{{ $errors->first('contact_first_name',Form::validationWrapper())}}
			{{Form::text('user_details[contact_first_name]', $user->user_details->contact_first_name,array('class'=>'form-control '. ($errors->has('contact_surname') ? "validation_error" : "")))}}	
			</div>
			<div class="col-xs-6">
			{{Form::label('user_details[contact_surname]','Surname')}}
			{{ $errors->first('contact_surname',Form::validationWrapper())}}
			{{Form::text('user_details[contact_surname]', $user->user_details->contact_surname,array('class'=>'form-control '. ($errors->has('contact_surname') ? "validation_error" : "")))}}	
			</div>
		</div>
		{{Form::label('user_details[address_line_1]','Address Line 1')}}
		{{ $errors->first('address_line_1',Form::validationWrapper())}}
		{{Form::text('user_details[address_line_1]', $user->user_details->address_line_1,array('class'=>'form-control '. ($errors->has('address_line_1') ? "validation_error" : "")))}}	
		{{Form::label('user_details[address_line_2]','Address Line 2')}}
		{{ $errors->first('address_line_2',Form::validationWrapper())}}
		{{Form::text('user_details[address_line_2]', $user->user_details->address_line_2,array('class'=>'form-control '. ($errors->has('address_line_2') ? "validation_error" : "")))}}	
		<div class="row">
			<div class="col-xs-4">
			{{Form::label('user_details[suburb]','Suburb')}}
			{{ $errors->first('suburb',Form::validationWrapper())}}
			{{Form::text('user_details[suburb]', $user->user_details->suburb,array('class'=>'form-control '. ($errors->has('suburb') ? "validation_error" : "")))}}	
			</div>
			<div class="col-xs-4">
			{{Form::label('user_details[state]','State')}}
			{{ $errors->first('state',Form::validationWrapper())}}
			{{Form::text('user_details[state]', $user->user_details->state,array('class'=>'form-control '. ($errors->has('state') ? "validation_error" : "")))}}	
			</div>
			<div class="col-xs-4">
				{{Form::label('user_details[postcode]','Postcode')}}
			{{ $errors->first('postcode',Form::validationWrapper())}}
				{{Form::text('user_details[postcode]', $user->user_details->postcode,array('class'=>'form-control '. ($errors->has('postcode') ? "validation_error" : "")))}}	
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6">
			{{Form::label('user_details[contact_number_1]','Contact Phone')}}
			{{ $errors->first('contact_number_1',Form::validationWrapper())}}
			{{Form::text('user_details[contact_number_1]', $user->user_details->contact_number_1,array('class'=>'form-control '. ($errors->has('contact_number_1') ? "validation_error" : "")))}}	
			</div>
			<div class="col-xs-6">
			{{Form::label('user_details[contact_number_2]','Contact Mobile')}}
			{{ $errors->first('contact_number_2',Form::validationWrapper())}}
			{{Form::text('user_details[contact_number_2]', $user->user_details->contact_number_2,array('class'=>'form-control '. ($errors->has('contact_number_2') ? "validation_error" : "")))}}	
			</div>
		</div>

		</fieldset>