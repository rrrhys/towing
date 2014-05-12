@extends('email')
@section('content')
Dear {{$recipient_name}},<br><br>
<strong>You won a job listed by {{$sender_name}}.</strong>
Here's what you need to know:
A <strong>{{$vehicle_make}} {{$vehicle_model}}</strong> needs to be towed from <strong>{{$pickup_postcode}} to {{$dropoff_postcode}}</strong> (a distance of approx. {{$distance_approx}} km)<br><br>
{{$sender_name}} has requested you to {{$pickup_at != null ? "Pick up" : "Drop off"}} the vehicle at {{$pickup_at}}{{$dropoff_at}}.
You can get in touch with {{$sender_name}} using the following details:
Contact number 1: {{$user_details->contact_number_1}}

<br>
@stop