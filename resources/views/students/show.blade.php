@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" style="height: 500px">
        <div class="row">
            <div class="col-6">
                <h4 style="text-align: right">{{ $student->name}} <span></span></h4>

            </div>
            <div class="col-6">
                <a type="button" class="btn btn-outline-warning btn-sm" href="{{ route('student-edit', [$student->id])}}"> Редактировать</a>
                <a type="button" class="btn btn-outline-danger btn-sm" href="{{ route('student-edit', [$student->id])}}"> Удалить</a>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            @foreach($student->quizresults as $result)
                <div class="card">
                    <div class="card-header" id="headingOne{{$result->id}}">
                        <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{$result->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $result->predmet->name }}
                        </button>

                        <a  style="float: right" href="{{ route('result-delete', [$result->id])}}" type="button" class="btn btn-outline-danger btn-sm" onClick="return confirm('Вы действительно хотите удалить?')">Удалить</a>
                        </h2>
                    </div>
            
                    <div id="collapseOne{{$result->id}}" class="collapse" aria-labelledby="headingOne{{$result->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table" style="width: 500px">
                                <tr>
                                    <th>Предмет:</th>
                                    <td>{{ $result->predmet->name }}</td>
                                </tr>
                                <tr>
                                    <th>Правилных ответов:</th>
                                    <td>{{ $result->right_answers }}</td>
                                </tr>
                                <tr>
                                    <th>НЕ правилных ответов:</th>
                                    <td>{{ $result->wrong_answers}}</td>
                                </tr>
                                <tr>
                                    <th>Дата:</th>
                                    <td>{{ date('d-m-Y', strtotime($result->created_at))}}</td>
                                </tr>
                                
                
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
     
    </div>
@endsection