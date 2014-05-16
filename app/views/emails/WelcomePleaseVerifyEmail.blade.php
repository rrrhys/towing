@extends('email')
@section('content')
Hi {{$recipient->username}},<br><br>
<h4>Please verify your email address.</h4>

Your account has been successfully created. To make sure we have the right address, please click the link below to confirm your email.

<a href="{{Config::get('baseurl.url')}}/users/verify_email/{{$verifyToken}}">Verify my email</a>
@stop