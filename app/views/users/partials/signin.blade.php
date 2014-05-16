      {{ Form::open(array('action'=>array('signin'),'class'=>'signin'))}}
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign in</h4>
      </div>
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