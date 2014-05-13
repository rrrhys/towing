@extends('email')
@section('content')
Dear {{$poster->username}},<br><br>
<h4>Your job finished with NO bids.</h4>

The job you listed, <strong>{{$job->vehicle_make}} {{$job->vehicle_model}}</strong> towed from <strong>{{$job->pickup_postcode}} to {{$job->dropoff_postcode}}</strong> finished with no bids.

<br><br>
<strong>Would you like to relist the job?</strong><br><br>
Click <a href="{{Config::get('baseurl.url')}}/jobs/{{$job->id}}">this link</a> to visit the job page where you can choose to relist the job.
@stop