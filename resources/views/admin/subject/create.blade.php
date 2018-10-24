@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	<div class="panel-heading">
		Add Subject
	</div>
	<div class="panel-body">
		<form action="{{ route('subject.store') }}" method="get">
			{{ csrf_field() }}
			<label for="subject_name">Subject :</label>
			<input type="text" name="subject_name" class="form-control">
			<br>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Add Subject
					</button>	
				</div>
			</div>
		</form>
	</div>
	

</div>

@stop