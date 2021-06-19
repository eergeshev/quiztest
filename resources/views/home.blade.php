@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded">
        <div class="row justify-content-center">
            <div class="col-md-8" style="text-align: center">
                @foreach($predmets as $predmet)
                <a type="button" href="{{ route('predmet-show', [$predmet->id])}}" class="btn btn-outline-primary">{{ $predmet->name }}</a>
                <br>
                <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
