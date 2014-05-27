@extends('layout')
@section('title')
@stop
@section('content')

<div class="panel panel-default">
 			<div class="panel-heading">
 				Create a job
 			</div>
 			<div class="panel-body">
				{{Form::model($job, array('route' => array('jobs.store')))}}

				{{Form::hidden('user_id',$job->user_id)}}
				{{Form::hidden('top_user_id', $job->top_user_id)}}

				{{Form::label('job_number')}}
				{{Form::text('job_number', $job->job_number,array('class'=>'form-control '. ($errors->has('job_number') ? "validation_error" : "")))}}	
				<br/>
				{{Form::label('job_type_id','Job Type')}}
				{{Form::select('job_type_id',array(1=>'Under 4T'))}}
				<br/>
				{{Form::label('vehicle_make')}}
				{{Form::text('vehicle_make', $job->vehicle_make,array('class'=>'form-control '. ($errors->has('vehicle_make') ? "validation_error" : "")))}}	

				{{Form::label('vehicle_model')}}
				{{Form::text('vehicle_model', $job->vehicle_model,array('class'=>'form-control '. ($errors->has('vehicle_model') ? "validation_error" : "")))}}
				<br/>
				{{Form::label('pickup_postcode')}}
				{{Form::text('pickup_postcode', $job->pickup_postcode)}}

				{{Form::label('dropoff_postcode')}}
				{{Form::text('dropoff_postcode', $job->dropoff_postcode)}}

				<br>
				<div class="row">
					<div class="col-xs-6">

					</div>
					<div class="col-xs-6">
						GMAP
					</div>
				</div>
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
 			</div>
 		</div>
@stop