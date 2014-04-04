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