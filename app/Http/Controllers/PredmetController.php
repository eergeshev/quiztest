<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predmet;
use App\Models\Question;
use App\Models\Quizresult;
use Illuminate\Support\Facades\DB;

class PredmetController extends Controller
{
    public function index(){
        $predmets = Predmet::all();
        return view('predmet.index', compact('predmets'));
    }

    public function store(Request $request){
        $predmet = new Predmet();
        $predmet->name = $request->input('name');
        $predmet->save();

        return redirect()->back();
    }

    public function show($id){
        $predmet = Predmet::with(['questions'])->findOrFail($id);
        $question = DB::table('questions')->where('predmet_id', $id)->inRandomOrder()->limit(3)->get()->toArray();
        
        return view('predmet.show', compact('predmet', 'question'));
    }

    public function edit($id){
        $predmet = Predmet::findOrFail($id);

        return view('predmet.edit', compact('predmet'));
    }

    public function update(Request $request, $id){
        $q = request()->input('name');
        $predmet = Predmet::findOrFail($id);
        $predmet->update(['name'=>$q]);

        return redirect()->route('predmet-index');

    }

    public function delete($id){
        $predmet = Predmet::findOrFail($id);
        $predmet->delete();

        return redirect()->back();
    }

    public function test(Request $request, $id){
        
        $answers = request()->input('answer');
        $answer_keys = array_keys($answers);
        dd($answer_keys);

        $right = [];
        $wrong = [];
        for($i=0; $i<count($answer_keys); $i++){
            $key = $answer_keys[$i];

            $question = Question::findOrFail($key);
            
            if((int)$question->answer == (int)$answers[$key]){
                $right[$key] = $answers[$key];
            }else{
                $wrong[$key] = $answers[$key];
            }
        }
        
        $user_id = auth()->user()->id;
        
        $result = new Quizresult();
        $result->user_id = $user_id;
        $result->predmet_id = $id;
        $result->right_answers = count($right)*5;
        $result->wrong_answers = count($wrong);
        $result->save();
        

        return redirect()->route('predmet-result', [$result->id]);
    }

    public function quizresult($id){
        $result = Quizresult::findOrFail($id);
        return view('predmet.result', compact('result'));
    }

    public function resultdelete($id){
        $quizresult = Quizresult::findOrFail($id);
        $quizresult->delete();

        return redirect()->back();
    }
}
