@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	<div class="panel-heading">
		Add User
	</div>
	<div class="panel-body">
		<form action="{{ route('user.store') }}" method="get">
			{{ csrf_field() }}
			<label for="name">User name :</label>
			<input type="text" name="name" class="form-control">
			<br>
			<label for="email">E-mail :</label>
			<input type="text" name="email" class="form-control">
			<br>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Add
					</button>	
				</div>
			</div>
		</form>
	</div>
	

</div>

@stop