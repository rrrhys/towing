@extends('layout')
@section('title')
@stop
@section('content')

<div class="jumbotron">
  <h1>Hello, world!</h1>
  <h4>How it works</h4>
  <p>One line explanation about how the reverse auction works <a href="#more">Read more...</a></p>
  
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">Create an account</div>
			<div class="panel-body">
			<p>Create an account for free to list jobs, or view and start bidding on active jobs.
			  <p style="text-align: center; padding-top: 24px;"><a class="btn btn-primary btn-lgr btn-center" role="button" href="/join-tower">I tow vehicles, and need jobs</a><br><br>
			  <a class="btn btn-warning btn-lgr" role="button" href="/join-lister">I need vehicles towed</a></p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">Sign in</div>
			<div class="panel-body">
				<span class="login_validation_error"></span>
					{{Form::open()}}
					{{Form::label('email')}}
					{{Form::email('email', '',['id'=>'front_email', 'placeholder'=>'Email Address','class'=>'form-control'])}}
					{{Form::label('password')}}
					{{Form::password('password', ['id'=>'front_password', 'placeholder'=>'Password','class'=>'form-control'])}}
<p style='text-align: center; padding-top: 10px;'>

					<a class="btn btn-lgr btn-min-size btn-default" id='front_page_login_box' role="button">Sign in</a>
					{{Form::close()}}
			</div>
		</div>
	</div>
 </div>
@stop