/Users/rrrhys/projects/towing/app/views/users/create.blade.php

{{Form::model($user)}}
Login:
{{Form::email('email', $user->email, ['id'=>'email'])}}
{{Form::password('password', ['id'=>'password'])}}
{{Form::submit('ok',['id'=>'login'])}}

{{Form::close()}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
var state = {};
$(function(){
	$("body").on('click','#login',function(e){
		var email = $("#email").val();
		var pass = $("#password").val();
		$.post("/sessions",
		{
			email: email,
			password: pass
		},function(data){
			var obj = $.parseJSON(data);
			state.token = obj.token
		});
		e.preventDefault();
	});
});</script>