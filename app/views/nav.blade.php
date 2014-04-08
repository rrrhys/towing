<div class="navbar navbar-default navbar-fixed-top">
	<div class='container'>
		<a class="navbar-brand" href="/">TOWING JOBS</a>
		<ul class="nav navbar-nav">
		<li><a href="{{URL::route('api')}}">API Reference</a></li>
			@if (Auth::check())

				<li class='dropdown'>
					<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
						Signed in as {{Auth::user()->email}} <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						@if (Auth::user()->is_lister)
						<li><a href="{{URL::route('jobs.my')}}">My Jobs</a></li>
						@endif
						<li><a href="{{URL::route('signout')}}">Logout</a></li>
					</ul>
				</li>

				<li><a href="{{URL::route('jobs.browse')}}">Browse Jobs</a></li>

			@else
				<!--li>{{link_to_action('UsersController@create','Sign in')}}</li-->
				<li>
					<a href="#signinModal" data-toggle="modal">Sign in</a>

				</li>
				<li class='dropdown'>
					<a class='dropdown-toggle' data-toggle='dropdown'>
						Create Account
					</a>

					<ul class="dropdown-menu">
						<li><a href="{{URL::route('join-tower')}}">I tow vehicles, and need jobs</a></li>
			  			<li><a href="{{URL::route('join-lister')}}">I need vehicles towed</a></li>
					</ul>

				</li>
				<li>{{link_to_action('UsersController@create','To Dos')}}</li>
			@endif
			
		</ul>
	</div>
</div>
<div class="modal fade" id='signinModal'>
  <div class="modal-dialog">
    <div class="modal-content">
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
    </div>
  </div>
</div>


	<script>
	$(function(){
		$(".signin_popup").on('click',function(){
			$(".signin-menu").popover();
		});
	})
	</script>
