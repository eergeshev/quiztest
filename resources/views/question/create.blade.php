@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5 bg-white rounded" style="height: 500px">
        <h4 style="text-align: center">Доюавить вопрос</h4>
        <div style="margin-left: 10%">
            <form action="{{ route('question-store')}}" method="POST">
                @csrf
                <div class="row" style="margin-top: 40px">
                    <div class="col-2">
                        <label>Выбрать предмет</label>
                    </div>
                    <div class="col">
                        <select name="predmet_id" id="predmet_id" style="width: 200px" class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Выберите предмет</option>
                            @foreach($predmets as $predmet)
                                <option value="{{$predmet->id}}">{{$predmet->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="question">Вопрос</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-sm" name="question">
                    </div>
                </div>
                
                <div style="margin-left: 150px; margin-top: 10px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answer1" value="0">
                    <input type="text" class="form-control form-control-sm" name="options[]" style="width: 500px">
                </div>

                <div style="margin-left: 150px; margin-top: 10px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answer2" value="1">
                    <input type="text" class="form-control form-control-sm" name="options[]" style="width: 500px">
                </div>

                <div style="margin-left: 150px; margin-top: 10px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answer3" value="2">
                    <input type="text" class="form-control form-control-sm" name="options[]" style="width: 500px">
                </div>

                <div style="margin-left: 150px; margin-top: 10px" class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answer4" value="3">
                    <input type="text" class="form-control form-control-sm" name="options[]" style="width: 500px">
                </div>

                <div class="row" style="margin-top: 20px; display: flex">
                    <a href="" type="button" class="btn btn btn-outline-warning" style="margin-left: 47%">Отменить</a>
                    <button class="btn btn-outline-primary" style="margin-left: 2%" >Сохранить</button>
                </div>

            </form>
        </div>
    </div>
@endsection
    