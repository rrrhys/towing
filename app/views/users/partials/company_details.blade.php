		<h4>Company Details</h4>
		<fieldset class="well">

		{{Form::label('user_details[company_trading_name]', 'Company Trading Name')}}
		{{Form::text('user_details[company_trading_name]', $user->user_details->company_trading_name,array('class'=>'form-control'))}}

		{{Form::label('user_details[abn]','Company ABN')}}
		{{Form::text('user_details[abn]', $user->user_details->abn,array('class'=>'form-control'))}}
		</fieldset>