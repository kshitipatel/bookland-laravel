@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Book</th>
				<th>Author</th>
				<th>Price</th>
				<th>Contact to Buy</th>
			</thead>
			<tbody>
				@if($books->count() > 0)
					@foreach($books as $book)
						<tr>
							<td>
								{{ $book->book_name }}
							</td>
							<td>
								{{ $book->author }}
							</td>
							<td>
								{{ $book->price }}
							</td>
							<td>
								<a href="{{ route('user.show', ['id' => $book->id ]) }}" class="btn btn-success">Contact</a>	
							</td>
							@if(Auth::user()->admin)
							<td>
								<a href="{{ route('book.edit' , ['id' => $book->id ]) }}" class="btn btn-success">Edit</a>
							</td>
							<td>
								<a href="{{ route('book.delete', ['id' => $book->id ]) }}" class="btn btn-info">Move to Trash</a>
							</td>
							<td>
								<a href="{{ route('book.kill', ['id' => $book->id ]) }}" class="btn btn-danger">Delete Permanantly</a>
							</td>
							@endif
						</tr>
					@endforeach
				@else
					<tr>
						<th colspan="3" class="text-center">No Books Available</th>
					</tr>
				@endif
			</tbody>
		</table>
    </div>
</div>

@stop