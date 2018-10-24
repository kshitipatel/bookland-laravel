@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Subject</th>
				<th>View Related books</th>
				
			</thead>
			<tbody>
				@if($subjects->count() > 0 )
					@foreach($subjects as $subject)
						<tr>
							<td>
								{{ $subject->subject_name }}
							</td>
							<td>
								<a href="{{ route('book.show' , ['id' => $subject->id ]) }}" class="btn btn-info">View Available Books</a>
							</td>
							
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