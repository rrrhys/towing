<div class="navbar navbar-default navbar-fixed-top">
		<a class="navbar-brand" href="/">aa</a>
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

			@else
				<!--li>{{link_to_action('UsersController@create','Sign in')}}</li-->
				<li class='dropdown'>
					<a class='dropdown-toggle' data-toggle='dropdown'>
						Sign in
					</a>

					<div class="dropdown-menu" style='padding: 20px;'>
						{{ Form::open(array('action'=>array('signin'),'class'=>'signin'))}}
				{{Form::label('email')}}
				{{Form::text('email','',array('class'=>'signin'))}}

				<br>
				{{Form::label('password')}}
				{{Form::password('password',array('class'=>'signin'))}}
				{{Form::submit('Sign in',array('class'=>'btn btn-primary'))}}
						{{Form::close()}}
					</div>

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

	<script>
	$(function(){
		$(".signin_popup").on('click',function(){
			$(".signin-menu").popover();
		});
	})
	</script>
