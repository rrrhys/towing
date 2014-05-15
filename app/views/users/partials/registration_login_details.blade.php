			<div class='col-md-12'>
				<div class="panel panel-default">
					<div class="panel-heading">
						Login details
					</div>
					<div class="panel-body">
			<fieldset class="well">
				{{Form::hidden('user_type','Tower')}}
				{{Form::label('user[username]','User Name')}} {{ $errors->first('username',Form::validationWrapper())}}</span>
				{{Form::text('user[username]', $user->username, array('class'=>'form-control col-xs-12 '. ($errors->has('username') ? "validation_error" : "")))}}			
				<div class="control-group">
					{{Form::label('user[password]','Password')}} {{ $errors->first('password',Form::validationWrapper())}}
					{{Form::password('user[password]',array('class'=>'form-control col-xs-12 '. ($errors->has('username') ? "validation_error" : "")))}}
				</div>

				{{Form::label('user[password_confirmation]','Password Confirmation')}} {{ $errors->first('password_confirmation',Form::validationWrapper())}}
				{{Form::password('user[password_confirmation]',array('class'=>'form-control col-xs-12 '. ($errors->has('username') ? "validation_error" : "")))}}
			</fieldset>
					</div>
				</div>
			</div>