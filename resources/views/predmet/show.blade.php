@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded">
        <h4 style="text-align: center">{{ $predmet->name }}</h4>
        <h4 style="margin-left:250px">Вопросы</h4>
        <div style="margin-left: 100px">
        <form action="{{ route('predmet-test', [$predmet->id])}}" method="POST">
            @csrf
            @for($i=0; $i<count($question); $i++)
                <h5>{{$i+1}})<span style="margin-left: 5px">{{ $question[$i]->question}}</span></h5>

                <div style="margin-left: 50px; margin-top: 10px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer[{{$question[$i]->id}}]" id="answer0" value="0">
                    <label for="answer0">{{ $question[$i]->option0}}</label>
                </div>

                <div style="margin-left: 50px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer[{{$question[$i]->id}}]" id="answer1" value="1">
                    <label for="answer1">{{ $question[$i]->option1}}</label>
                </div>

                <div style="margin-left: 50px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer[{{$question[$i]->id}}]" id="answer2" value="2">
                    <label for="answer2">{{ $question[$i]->option2}}</label>
                </div>

                <div style="margin-left: 50px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer[{{$question[$i]->id}}]" id="answer3" value="3">
                    <label for="answer3">{{ $question[$i]->option3}}</label>
                </div>

               <br>
            @endfor
            <div class="row" style="margin-top: 20px; display: flex">
                <a href="{{ route('home')}}" type="button" class="btn btn btn-outline-warning" style="margin-left: 47%">Отменить</a>
                <button class="btn btn-outline-primary" style="margin-left: 2%" >Сохранить</button>
            </div>
        </form>
        </div>
    </div>
@endsection
    