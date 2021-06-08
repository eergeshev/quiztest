@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" style="height: 500px">
        <h4 style="text-align: center">Все предметы</h4>
        <div style="margin-left: 10%">
            <form action="{{ route('predmet-store')}}" method="POST">
                @csrf
    
                <div style="display: flex">
                    <input type="text" class="form control" placeholder="Добавить предмет" name="name">
                    <button class="btn btn-outline-primary btn-sm">Сохранить</button>
                </div>
            </form>
        </div>

        <div class="row" style="margin-left: 10%; margin-top: 30px">
            <table class="table table-hover" style="width: 400px ">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Редактировать</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($predmets as $predmet)
                        <tr>
                            <td>{{ $predmet->name}}</td>
                            <td style="text-align: right; width: 50px">
                                <a href="{{ route('predmet-edit', [$predmet->id])}}" type="button" class="btn btn-outline-warning btn-sm">Обн.</a>
                                <a href="{{ route('predmet-delete', [$predmet->id])}}" type="button" class="btn btn-outline-danger btn-sm" onClick="return confirm('Вы действительно хотите удалить?')">Удал.</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        


    </div>
@endsection