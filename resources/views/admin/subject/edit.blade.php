@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	<div class="panel-heading">
		Update Subject : {{ $subject->subject_name }}
	</div>
	<div class="panel-body">
		<form action="{{ route('subject.update' , ['id' => $subject->id ]) }}" method="get">
			{{ csrf_field() }}
			<label for="subject_name">Subject :</label>
			<input type="text" name="subject_name" name="{{$subject->subject_name}}" class="form-control">
			<br>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Update Subject
					</button>	
				</div>
			</div>
		</form>
	</div>
	

</div>

@stop