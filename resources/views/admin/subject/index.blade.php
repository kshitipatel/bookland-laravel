@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Subject</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@if($subjects->count() > 0)
					@foreach($subjects as $subject)
						<tr>
							<td>
								{{ $subject->subject_name }}
							</td>
							@if(Auth::user()->admin)
							<td>
								<a href="{{ route('subject.edit' , ['id' => $subject->id ]) }}" class="btn btn-info">Edit</a>
							</td>
							<td>
								<a href="{{ route('subject.delete', ['id' => $subject->id ]) }}" class="btn btn-danger">Delete</a>
							</td>
							@endif
						</tr>
					@endforeach
				@else
					<tr>
						<th colspan="3" class="text-center">No Subjects Available</th>
					</tr>
				@endif
			</tbody>
		</table>
    </div>
</div>

@stop