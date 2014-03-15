<div class="navbar navbar-default navbar-static-top">
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
					</ul>
				</li>

			@else
				<!--li>{{link_to_action('UserController@create','Sign in')}}</li-->
				<li class='dropdown'>
					<a class='signin_popup' data-toggle='dropdown'>
						Sign in
					</a>

	<div class="dropdown-menu" style='padding: 20px;'>
		{{ Form::open(array('action'=>array('SessionController@create'),'class'=>'signin'))}}
{{Form::label('email')}}
{{Form::text('email','',array('class'=>'signin'))}}

<br>
{{Form::label('password')}}
{{Form::password('password',array('class'=>'signin'))}}
{{Form::submit('Sign in',array('class'=>'btn btn-primary'))}}
		{{Form::close()}}
	</div>

				</li>
				<li>{{link_to_action('UserController@create','Create Account')}}</li>
				<li>{{link_to_action('UserController@create','To Dos')}}</li>
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
