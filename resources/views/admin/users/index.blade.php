@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Name</th>
				<th>Permissions</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@if($users->count() > 0)
					@foreach($users as $user)
						<tr>
							<td>
								{{ $user->name }}
							</td>
							<td>
								@if($user->admin)
									@if(Auth::id() !== $user->id)
									<a href="{{ route('user.not.admin', ['id' => $user->id ]) }}" class="btn btn-danger">Remove Admin</a>
									@else
									You are Admin.
									@endif
								@else
									<a href="{{ route('user.admin', ['id' => $user->id ]) }}" class="btn btn-success">Make Admin</a>
								@endif
							</td>
							<td>
								@if(Auth::id() !== $user->id)
									<a href="{{ route('user.delete', ['id' => $user->id ]) }}" class="btn btn-danger">Delete</a>
								@endif
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<th colspan="3" class="text-center">No Users</th>
					</tr>
				@endif
			</tbody>
		</table>
    </div>
</div>

@stop