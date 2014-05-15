<?php $count_errors= count($errors->all()); ?>
@if($count_errors > 0)
<div class="alert alert-notify">
	<strong>There were {{$count_errors}} errors. Please correct them below.</strong><br>
	<ul>
	@foreach($errors->all() as $val_error)
		<li>{{$val_error}}</li>
	@endforeach
	</ul>
</div>
@endif
