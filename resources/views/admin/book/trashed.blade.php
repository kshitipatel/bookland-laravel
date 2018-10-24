@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Book</th>
				<th>Restore</th>
				<th>Permanant Delete</th>
			</thead>
			<tbody>
				@if($books->count() > 0)
					@foreach($books as $book)
						<tr>
							<td>
								{{ $book->book_name }}
							</td>
							<td>
								<a href="{{ route('book.restore', ['id' => $book->id ]) }}" class="btn btn-success">Restore</a>
							</td>
							<td>
								<a href="{{ route('book.kill', ['id' => $book->id ]) }}" class="btn btn-danger">Destroy</a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<th colspan="3" class="text-center">No trashed Books</th>
					</tr>
				@endif
			</tbody>
		</table>
    </div>
</div>

@stop