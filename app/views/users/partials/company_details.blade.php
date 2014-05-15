

<div class='col-md-12'>
	<div class="panel panel-default">
		<div class="panel-heading">
			Company Details
		</div>
		<div class="panel-body">
			<fieldset class="well">

				{{Form::label('user_details[company_trading_name]', 'Company Trading Name')}} 
				{{ $errors->first('company_trading_name',Form::validationWrapper())}}
				{{Form::text('user_details[company_trading_name]', $user->user_details->company_trading_name,array('class'=>'form-control '. ($errors->has('username') ? "validation_error" : "")))}}		
<small>Enter your full name if you do not have a company name.</small><br>
				
				{{Form::label('user_details[abn]','Company ABN')}} 
				{{ $errors->first('abn',Form::validationWrapper())}}
				{{Form::text('user_details[abn]', $user->user_details->abn,array('class'=>'form-control '. ($errors->has('username') ? "validation_error" : "")))}}	
			</fieldset>
		</div>
	</div>
</div>