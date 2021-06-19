@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" >
        <h4 style="text-align: center">Все предметы и вопросы</h4>
        <div class="accordion" id="accordionExample">
            @foreach($predmets as $predmet)
                <div class="card">
                    <div class="card-header" id="headingOne{{$predmet->id}}">
                        <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{$predmet->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $predmet->name }}
                        </button>

                        <a  style="float: right" href="{{ route('predmet-delete', [$predmet->id])}}" type="button" class="btn btn-outline-danger btn-sm" onClick="return confirm('Вы действительно хотите удалить?')">Удалить</a>
                        </h2>
                    </div>
            
                    <div   id="collapseOne{{$predmet->id}}" class="collapse" aria-labelledby="headingOne{{$predmet->id}}" data-parent="#accordionExample">
                        <div style="margin-left: 50px" class="card-body">
                            @foreach($predmet->questions as $question)
                                <p>{{ $question->question}} 
                                    <span style="margin-left: 100px"><a href="{{ route('question-edit', [$question->id])}}">Обновить</a></span >
                                    <span style="margin-left:10px; " ><a style="color: red" href="{{ route('question-delete', [$question->id])}}" onClick="return confirm('Вы действительно хотите удалить?')">Удалить</a></span>
                                </p> 
                                <ul>
                                    <li>{{ $question->option0 }}</li>
                                    <li>{{ $question->option1 }}</li>
                                    <li>{{ $question->option2 }}</li>
                                    <li>{{ $question->option3 }}</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
    