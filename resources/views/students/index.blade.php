@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" style="height: 500px">
        <h4 style="text-align: center">Все студенты</h4>
        <ul>
            @foreach($students as $student)
                <li><a href="{{ route('student-show', [$student->id])}}"><h4>{{$student->name}}</h4></a></li>
            @endforeach
        </ul>
        
    </div>
@endsection