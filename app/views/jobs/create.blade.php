@extends('layout')
@section('title')
Create a Job <small><a href="{{URL::route('jobs.my')}}">Back to jobs</a></small>
@stop
@section('content')
{{Form::model($job, array('route' => array('jobs.store')))}}

{{Form::hidden('user_id',$job->user_id)}}
{{Form::hidden('top_user_id', $job->top_user_id)}}

{{Form::label('job_number')}}
{{Form::text('job_number', $job->job_number)}}
<br/>
{{Form::label('job_type_id')}}
{{Form::select('job_type_id',array(1=>'Under 4T'))}}
<br/>
{{Form::label('vehicle_make')}}
{{Form::text('vehicle_make', $job->vehicle_make)}}

{{Form::label('vehicle_model')}}
{{Form::text('vehicle_model', $job->vehicle_model)}}
<br/>
{{Form::label('pickup_postcode')}}
{{Form::text('pickup_postcode', $job->pickup_postcode)}}

{{Form::label('dropoff_postcode')}}
{{Form::text('dropoff_postcode', $job->dropoff_postcode)}}

<br>
(Pickup address / dropoff address to be entered here)
<br>
{{Form::label('finishes_at','Finishes in')}}
{{Form::select('finishes_at',array('1'=>'1 Hour','2'=>'2 Hours','3'=>'3 Hours'))}}
<br/>
<br/>
{{Form::label('pickup_at','Pick up at')}}
{{Form::text('pickup_at', $job->pickup_at,array('class'=>'datepicker', 'data-date-format'=>'dd/mm/yyyy'))}}<br/>
OR<br/>

{{Form::label('dropoff_at','Drop off at')}}
{{Form::text('dropoff_at', $job->dropoff_at,array('class'=>'datepicker', 'data-date-format'=>'dd/mm/yyyy'))}}
{{Form::submit()}}
{{Form::close()}}
</table>
@stop