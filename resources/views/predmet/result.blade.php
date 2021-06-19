@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" style="height: 500px">
        <h4 style="text-align: center">Результат</h4>
        <div style="margin-left: 10%">
            <table class="table" style="width: 500px">
                <tr>
                    <th>Имя:</th>
                    <td><h5>{{ $result->user->name}}</td>
                </tr>
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
                

            </table>
            


        </div>
    </div>
@endsection