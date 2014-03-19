/Users/rrrhys/projects/towing/app/views/users/create.blade.php<br>
<style>
code {
	background-color: #eee;
	border: 1px solid #ccc;
	border-radius: 5px;
	padding: 10px;
	display: block;
	font-family: Consolas;
	margin: 10px;
}
h3 {
	margin-top: 0;
}
.hidden {
	overflow: hidden;
	height: 30px;
}
code.incomplete {
	background-color: #ff6666;
}
.small {
	display: block;
	font-size: 8pt;

}
table {
	font-size: 9pt;
}
td {
	border-left: 1px solid #eee;
	padding: 2px;
}
code ul {
	margin-bottom: 0;
}
url {
	font-weight: bold;
}
arguments, success, failure, test, results {
	display: block;
	padding: 10px 5px 0px 5px;
}
success {
	color: #006600;
}
failure {
	color: #993300;
}
results {
	background-color: #fff;

}
.is_admin, .is_tower, .is_lister, .is_corporate {
	color: #0000ff;
}
</style>

<h1>Public</h1>
<h2>Users</h2>
<code class="hidden">
	<h3>Login:</h3>
	<url>/signin (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>email</li>
			<li>password</li>
		</ul>
	</arguments>
	<success>Success fields:
		<ul><li>{Object}:<br>
			<ul>
				<li>email</li>
				<li>token</li>
				<li>is_admin</li>
			</ul>
		</li></ul>
	</success>

	<failure>
		Failure fields:
	<ul><li>401 unauthorised</li></ul>
	
	
	</failure>
	<test>
		Test login:
		{{Form::model($user)}}
		{{Form::email('email', $user->email, ['id'=>'email'])}}
		{{Form::password('password', ['id'=>'password'])}}
		<span id="login_validation"></span>

		{{Form::submit('ok',['id'=>'login'])}}

		{{Form::close()}}
		<results>
			Token: <span id="token"></span>
		</results>
	</test>


</code>




<code class="hidden">
<h3>List Tokens:</h3>
	<url>/users/tokens (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>token</li>
		</ul>
	</arguments>
	<success>Success fields:
		<ul><li>{Object}:<br>
			<ul>
				<li>email</li>
				<li>token</li>
			</ul>
		</li></ul>
	</success>

	<failure>
		Failure fields:
	<ul><li>401 unauthorised</li></ul>
	
	
	</failure>
	<test>
		Test:
		<span id="listTokens_validation"></span>

		{{Form::button('ok',['id'=>'listTokens'])}}
		<results>
			Tokens:<br>
			 <span id="tokens"></span>
		</results>
	</test>


</code>

<code class="hidden">
<h3>Deactivate a token:</h3>
	<url>/users/deactivate_token (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>token</li>
			<li>deactivate_token</li>
		</ul>
	</arguments>
	<success>Success fields:
		<small>(Silent success)</small>
	</success>

	<failure>
		Failure fields:
	<ul><li>401 unauthorised</li></ul>
	
	
	</failure>
	<test>
		Test:
		Use the tokens table and click deactivate.
	</test>


</code>
<h4>Corporate Only</h4>
<code class="hidden">
	<h3>Add child users:</h3>
	<url>/users/add_child (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>token</li>
			<li>child_email</li>
			<li>child_password</li>
		</ul>
	</arguments>
	<success>Success fields:
		<ul><li>{Object}:<br>
			<ul>
				<li>user_id</li>
				<li>email</li>
				<li>etc...</li>
			</ul>
		</li></ul>
	</success>

	<failure>
		Failure fields:
	<ul>
		<li>401 unauthorised</li>
		<li>401 not corporate</li>
	</ul>
	
	
	</failure>
	<test>
		Test create child:
		{{Form::email('child_email', $user->email, ['id'=>'child_email'])}}
		{{Form::password('child_password', ['id'=>'child_password'])}}
		<span id="createChild_validation"></span>

		{{Form::submit('ok',['id'=>'create_child'])}}
		<results>
			Child ID: <span id="child_id"></span>
		</results>
	</test>


</code>


<code class="hidden">
	<h3>List child users:</h3>
	<url>/users/list (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>token (must tie to an admin)</li>
		</ul>
	</arguments>
	<success>Success fields:
		<ul><li>Array:<br>
			<ul>
				<li>{User Object}</li>
			</ul>
		</li></ul>
	</success>

	<failure>
		Failure fields:
	<ul><li>401 unauthorised</li></ul>
	
	
	</failure>
	<test>
		Test:
		<span id="listChildUsers_validation"></span>

		{{Form::button('ok',['id'=>'listChildUsers'])}}
		<results>
			Users:<br>
			 <span id="child_users"></span>
		</results>
	</test>


</code>
<h2>Jobs</h2>
<code class="hidden incomplete">
	<h3>Create</h3>
</code>
<code class="hidden">
	<h3>List</h3>
	<url>/jobs/my (Get)</url>
	<span id="my-jobs"></span>
</code>
<code class="hidden">
	<h3>List Corporate</h3>
	<url>/jobs/myCorporate (Get)</url>
	<span id="my-corporate-jobs"></span>
</code>
<code class="hidden incomplete">
	<h3>Edit</h3>
</code>
<code class="hidden incomplete">
	<h3>Delete</h3>
</code>

<h1>Admin</h1>


<code class="hidden">
	<h3>List users:</h3>
	<url>/admin/users/list (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>token (must tie to an admin)</li>
		</ul>
	</arguments>
	<success>Success fields:
		<ul><li>Array:<br>
			<ul>
				<li>{User Object}</li>
			</ul>
		</li></ul>
	</success>

	<failure>
		Failure fields:
	<ul><li>401 unauthorised</li></ul>
	
	
	</failure>
	<test>
		Test:
		<span id="listUsers_validation"></span>

		{{Form::button('ok',['id'=>'listUsers'])}}
		<results>
			Users:<br>
			 <span id="users"></span>
		</results>
	</test>


</code>

<code class="hidden">
	<h3>Set as corporate/admin/tower/lister:</h3>
	<url>/admin/users/set_property (Post)</url>
	<arguments>Input fields:
		<ul>
			<li>token (must tie to an admin)</li>
			<li>users</li>
			<li>property_name</li>
			<li>property_value (0,1)</li>
		</ul>
	</arguments>
	<success>Success fields:
		<small>(Silent success)</small>
	</success>

	<failure>
		Failure fields:
	<ul><li>401 unauthorised</li></ul>
	
	
	</failure>
	<test>
		Test:
		Use the users table and click a property
	</test>
</code>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
var state = {};
var events = {};
var login_done;
	var set_property = function(context, property){
		var row = $(context).parent(); //tr.
		var td = $(context);
		var user_id = row.children("td.id").text();
		var original_value = td.text();
		var token = $("#token").text();
		//assume success.
		$(context).text(original_value == "1" ? 0 : 1);
		$.post("/admin/users/set_property",
			{
				property_name: 'is_' + property,
				property_value: original_value == "1" ? 0 : 1,
				token: token,
				user: user_id
			}).done(function(){
				//silently succeed.
			}).fail(function(){
				validation_message("alert","Could not be set to " + property + ".");
				td.text(original_value);
			});
	}


	raise_event = function(event,args, callback){
		event(args);
	}
	events.token_received = function(token){
		state.token = token;
		$("#token").text(token);
		login_done.resolve();
	}
	validation_reset = function(field){
		$("#" + field + "_validation").text("");
	}
	validation_message = function(field,error_text){
		if(field == "alert"){
			alert(error_text);
		}
		$("#" + field + "_validation").text(error_text);
	}
	tabulate_array = function(array, destination_selector, actions_html){
		/* actions_html sample: <a href='edit/{id}'>Edit</a> ID will be replaced with object ID.*/
	
		var html = "<table>";	
		if(array.length > 0){
			var header_obj = array[0];
			html += "<tr>";
			for(var key in header_obj){
				html += "<td>" + key + "</td>";
			}
			html += "</tr>";
			for(var i = 0; i < array.length; i++){
				html += "<tr>";
				var obj = array[i];
				for(var key in obj){
					var val = obj[key];
					html += "<td class='" + key + "'>" + val + "</td>";
					if(actions_html != undefined){
						actions_html = actions_html.replace("{" + key + "}", val);
					}

				}
				if(actions_html != undefined){
					html += "<td>" + actions_html + "</td>";
				}
				html += "</tr>";
			}

		}
		else{
			html = "<tr><td>There are no items in the result set.</td></tr>";
		}
		html += "</table>"
		$(destination_selector).html(html);
	}

$(function(){
	login_done = $.Deferred();

	$("body").on('click','code h3',function(){
		var el = $(this).parent();
		if(el.hasClass('hidden')){
			el.removeClass('hidden');
		}
		else{
			el.addClass('hidden');
		}
	});
	$("body").on('click','#create_child',function(e){
		validation_reset("createChild");
		var email = $("#child_email").val();
		var pass = $("#child_password").val();
		var token = $("#token").text();
		$.post("/users/add_child",
			{
				email: email,
				password: pass,
				token: token
			}).done(function(){

			}).fail(function(){

			});
		e.preventDefault();
	});


	$("body").on('click','#listChildUsers',function(e){
		validation_reset("listChildUsers")
		var token = $("#token").text();
		$.post("/users/list",
		{
			token: token
		}).done(function(data){
			$("#child_users").text("");
			var obj = $.parseJSON(data);
			tabulate_array(obj, "#child_users");

		}).fail(function(){
			validation_message("listChildUsers","List failed.");
		});
		e.preventDefault();
	});

	$("body").on('click','#login',function(e){
		validation_reset("login")
		var email = $("#email").val();
		var pass = $("#password").val();
		$.post("/signin",
		{
			email: email,
			password: pass
		}).done(function(data){
			var obj = $.parseJSON(data);
			console.log(obj);
			raise_event(events.token_received, obj.token);
		}).fail(function(){
			validation_message("login","Login failed.");
		});
		e.preventDefault();
	});
	$("body").on('click','#listTokens',function(e){
		validation_reset("listTokens");
		var token = $("#token").text();
		$.post("/users/tokens",{
			token: token
		}).done(function(data){
			$("#tokens").text("");
			var obj = $.parseJSON(data);
			tabulate_array(obj, "#tokens","<a class='deactivate_token' href='#' data-id='{token}'>Deactivate token</a>");
		}).fail(function(){
			validation_message("listTokens","List failed.");
		});
		e.preventDefault();	
	});

	$("body").on('click','.is_admin',function(e){
		set_property(this,"admin");
	});

	$("body").on('click','.is_corporate',function(e){
		set_property(this,"corporate");
	});

	$("body").on('click','.is_tower',function(e){
		set_property(this,"tower");
	});

	$("body").on('click','.is_lister',function(e){
		set_property(this,"lister");
	});
	$("body").on('click','.deactivate_token',function(e){
		var row = $(this).parent().parent(); //TR.
		var deactivate_token = $(this).attr('data-id');
		row.hide();
		var token = $("#token").text();
		$.post("/users/deactivate_token",{
			
			token: token,
			deactivate_token: deactivate_token
		}).done(function(data){
			//silently succeed.
		}).fail(function(data){
			row.show();
			validation_message("alert","Row could not be removed.");
		});
		e.preventDefault();
	})

	$("body").on('click','#listUsers',function(e){
		validation_reset("listUsers")
		var token = $("#token").text();
		$.post("/admin/users/list",
		{
			token: token
		}).done(function(data){
			$("#users").text("");
			var obj = $.parseJSON(data);
			tabulate_array(obj, "#users");

		}).fail(function(){
			validation_message("listUsers","List failed.");
		});
		e.preventDefault();
	});

	//init stuff.

	var post_login_stuff = function(){
		$("#listUsers").click();
		$("#listTokens").click();
	}
	login_done
	.done(post_login_stuff)
	.done(function(){
		$.get("/jobs/my",{}).done(function(data){
			$("#my-jobs").text("");
			var obj = $.parseJSON(data);
			tabulate_array(obj, "#my-jobs");
		});
	})
	.done(function(){
		$.get("/jobs/my_corporate",{}).done(function(data){
			$("#my-corporate-jobs").text("");
			var obj = $.parseJSON(data);
			tabulate_array(obj, "#my-corporate-jobs");
		});
	});	

	$("#email").val("rrrhys@gmail.com");
	$("#password").val("insecure_pass");
	$("#login").click()

});</script>