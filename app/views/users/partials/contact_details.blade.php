		<fieldset class="well">
		<div class="row">
			<div class="col-xs-6">
{{Form::label('user[email]','Email Address')}}
			{{Form::text('user[email]',$user->email,array('class'=>'form-control'))}}
				
			{{Form::label('user_details[contact_first_name]','First Name')}}
			{{Form::text('user_details[contact_first_name]', $user->user_details->contact_first_name,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-6">
			{{Form::label('user_details[contact_surname]','Surname')}}
			{{Form::text('user_details[contact_surname]', $user->user_details->contact_surname,array('class'=>'form-control'))}}
			</div>
		</div>
		{{Form::label('user_details[address_line_1]','Address Line 1')}}
		{{Form::text('user_details[address_line_1]', $user->user_details->address_line_1,array('class'=>'form-control'))}}
		{{Form::label('user_details[address_line_2]','Address Line 2')}}
		{{Form::text('user_details[address_line_2]', $user->user_details->address_line_2,array('class'=>'form-control'))}}
		<div class="row">
			<div class="col-xs-4">
			{{Form::label('user_details[suburb]','Suburb')}}
			{{Form::text('user_details[suburb]', $user->user_details->suburb,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-4">
			{{Form::label('user_details[state]','State')}}
			{{Form::text('user_details[state]', $user->user_details->state,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-4">
				{{Form::label('user_details[postcode]','Postcode')}}
				{{Form::text('user_details[postcode]', $user->user_details->postcode,array('class'=>'form-control'))}}
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6">
			{{Form::label('user_details[contact_number_1]','Contact Phone')}}
			{{Form::text('user_details[contact_number_1]', $user->user_details->contact_number_1,array('class'=>'form-control'))}}
			</div>
			<div class="col-xs-6">
			{{Form::label('user_details[contact_number_2]','Contact Mobile')}}
			{{Form::text('user_details[contact_number_2]', $user->user_details->contact_number_2,array('class'=>'form-control'))}}
			</div>
		</div>

		</fieldset>