@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Contact Me</div>

                <div class="panel-body">
                    <h4>Seller's Name : {{ $user->student_name }}</h4><br>
                    <h4>Student ID : {{ $user->student_id }}</h4><br>
                    <h4>Semester : {{ $user->semester }}</h4><br>
                    <h4>Contact no. : {{ $user->contact }}</h4><br>
                    <a href="{{ route('book.buy', ['id' => $user->id ]) }}" class="btn btn-success">Book my Book</a>
                </div>
            </div>
       
@endsection
