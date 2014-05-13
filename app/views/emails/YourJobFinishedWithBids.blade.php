@extends('email')
@section('content')
Dear {{$recipient->username}},<br><br>
<h4>Your job finished with bids.</h4>

The job you listed, <strong>{{$job->vehicle_make}} {{$job->vehicle_model}}</strong> towed from <strong>{{$job->pickup_postcode}} to {{$job->dropoff_postcode}}</strong> finished with bids - the winning bidder was {{$winner->username}} with a bid of ${{$lowest_bid->amount}}

<br><br>
<strong>Here's what you need to do:</strong><br><br>
Click <a href="{{Config::get('baseurl.url')}}/jobs/{{$job->id}}">this link</a> to award the job to {{$winner->username}} and commit to paying them <strong>{{$lowest_bid->amount}}</strong> on completion of the job.
@stop