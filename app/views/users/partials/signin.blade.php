
      
      <div class="modal-header">
        <h4 class="modal-title">Sign in</h4>
      </div>
      	@if(Auth::user())
      	<div class='modal-body'>
      		You are signed in as {{Auth::user()->email}}. 

<p style="text-align: right; padding-top: 24px;"><a class="btn btn-suncorp btn-center btn-fixed" role="button" href="{{URL::route('signout')}}">Sign out</a></p>
		</div>
		@else
      	{{ Form::open(array('action'=>array('signin'),'class'=>'signin'))}}
      <div class='modal-body'>
      		<fieldset class="well">	
      			<div class='control-group'>
					{{Form::label('email')}}
					{{Form::text('email','',array('class'=>'form-control col-xs-12'))}}
				</div>

      			<div class='control-group'>
					{{Form::label('password')}}
					{{Form::password('password',array('class'=>'form-control col-xs-12'))}}
				</div>
			</fieldset>		
		</div>
		<div class='modal-footer'>
				{{Form::submit('Sign in',array('class'=>'btn btn-primary'))}}

		</div>

		{{Form::close()}}
@endif