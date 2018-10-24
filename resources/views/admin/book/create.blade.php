@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	<div class="panel-heading">
		Add Your Book To The Store
	</div>
	<div class="panel-body">
		<form action="{{ route('book.store') }}" method="post" encrypt="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="student_name">Name :</label>
				<input type="text" name="student_name" class="form-control">	
			</div>
			<div class="form-group">
				<label for="student_id">ID no :</label>
				<input type="text" name="student_id" class="form-control">
			</div>
			<div class="form-group">
				<label for="semester">Semester :</label>
				<input type="text" name="semester" class="form-control">
			</div>
			<div class="form-group">
				<label for="subject">Subject :</label>
				<select class="form-control" name="subject_id" id="subject">
					@foreach($subjects as $subject)
					 <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="bookname">Book Name :</label>
				<input type="text" name="book_name" class="form-control">
			</div>
			<div class="form-group">
				<label for="author">Author :</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
				<label for="price">Price :</label>
				<input type="text" name="price" class="form-control">
			</div>
			<div class="form-group">
				<label for="contact">Contact :</label>
				<input type="text" name="contact" class="form-control">
			</div>
			
			<br>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Add Book to the store
					</button>	
				</div>
			</div>
		</form>
	</div>
	
	

</div>

@stop