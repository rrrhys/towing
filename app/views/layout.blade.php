<!DOCTYPE html>
<html>
<head>
	<title>{{Config::get('user.app_name')}} | @yield('page_title')</title>
	{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}
	{{HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js')}}
	{{HTML::script('js/bootstrap-datepicker.js')}}
	{{HTML::script('js/jquery.timeago.js')}}
	{{HTML::script('js/site.js')}}
<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
	{{HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css')}}

	{{HTML::style('css/site.css')}}
	{{HTML::style('css/datepicker.css')}}
</head>
<body>
 @include('nav')
 <div style='padding-top: 60px;'>&nbsp;</div>
 @yield('popout')
<div class="container content">
@include('flash_messages')
@include('validation_errors')
<h3>@yield('title')</h3>
 @yield('content')
</div>



<script type="text/javascript">
    var queries = {{ json_encode(DB::getQueryLog()) }};
    console.log('/****************************** Database Queries ******************************/');
    console.log(' ');
    $.each(queries, function(id, query) {
        console.log('   ' + query.time + ' | ' + query.query + ' | ' + query.bindings[0]);
    });
    console.log(' ');
    console.log('/****************************** End Queries ***********************************/');
</script>


</body>
</html>
