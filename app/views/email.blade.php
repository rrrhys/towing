<!DOCTYPE html>
<html>
<head>

</head>

<style>
*{
  margin: 0px;
  padding: 0px;
}
body {
	font-family: Arial;
	margin: 0;
	padding: 0;
}
html {
	padding: 0;
	margin: 0;
}
h2 {
	color: #006f66;	
}
.header {
	background-color: #fefefe;
	font-family: 'Arial Narrow';
	font-weight: bold;
	font-size: 18pt;
	color: #777777;
}
.gray {
	background-color: #fefefe;

}
</style>
<body>
	<table style="width: 100%;" cellpadding=0 cellspacing=0>

<tr class="header gray">
	<td style="width: 10%;height:40px;"></td>
	<td style="width: 600px;">{{Config::get('user.app_name')}}</td>
	<td style="width: 10%;"></td>
</tr>
<tr>
	<td style="width: 10%;height:100%;" class="gray"></td>
	<td style="width: 600px;margin-top: 40px; margin-bottom: 40px;margin-left: 20px;border: 1px solid #cccccc"> @yield('content')</td>
	<td style="width: 10%;" class="gray"></td>
</tr>
<tr class="gray">
	<td style="width: 10%;"></td>
	<td style="width: 600px;font-size: 8pt; margin-top: 20px;">You are receiving this email because you are a member of {{Config::get('user.app_friendly_url')}}</td>
	<td style="width: 10%;"></td>
</tr>

	</table>
</body>
</html>
