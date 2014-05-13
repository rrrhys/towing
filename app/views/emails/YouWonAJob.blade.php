@extends('email')
@section('content')
Dear {{$recipient->username}},<br><br>
<strong>You won a job listed by {{$poster->username}}.</strong>
<h4>Here's what you need to know:</h4>
A <strong>{{$job->vehicle_make}} {{$job->vehicle_model}}</strong> needs to be towed from <strong>{{$job->pickup_postcode}} to {{$job->dropoff_postcode}}</strong> (a distance of approx. {{$job->distance_approx}} km)<br>
{{$poster->username}} has requested you to 
<strong>{{$job->pickup_at != null ? "Pick up" : "Drop off"}} the vehicle at {{$job->pickup_at}}{{$job->dropoff_at}}</strong>.
<br><br>You can get in touch with {{$poster->username}} using the following details:
Contact number 1: {{$posterDetails->contact_number_1}}
<br>
@stop