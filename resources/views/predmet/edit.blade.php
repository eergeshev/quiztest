@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" style="height: 500px">
        <h4 style="text-align: center">Все предметы</h4>
        <div style="margin-left: 10%">
            <form action="{{ route('predmet-update', [$predmet->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div style="display: flex">
                    <input type="text" class="form control" value="{{ $predmet->name}}" name="name">
                    <button class="btn btn-outline-primary btn-sm">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endsection