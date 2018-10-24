@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	<div class="panel-heading">
		Edit Your User
	</div>
	<div class="panel-body">
		<form action="{{ route('user.profile.update',['id' => $user->id ]) }}" method="get" enctype="multipart/form-data">
			{{ csrf_field() }}
			<label for="name">User name :</label>
			<input type="text" name="name" class="form-control" value="{{$user->name}}">
			<label for="email">E-mail :</label>
			<input type="text" name="email" class="form-control" value="{{$user->email}}">
			<label for="password">New Password :</label>
			<input type="text" name="password" class="form-control">
			<label for="about">About you :</label>
			<textarea name="about" id="about" cols="6" rows="6" class="form-control"></textarea>
			
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Update Profile
					</button>	
				</div>
			</div>
		</form>
	</div>
	

</div>

@stop