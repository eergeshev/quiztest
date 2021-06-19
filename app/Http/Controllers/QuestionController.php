<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predmet;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(){
        $predmets = Predmet::with(['questions'])->get();
       
        return view('question.index', compact('predmets'));

    }

    public function create(){
        $predmets = Predmet::all();

        return view('question.create', compact('predmets'));
    }

    public function store(Request $request){
        $data = request()->validate([
            'question'=>'required',
            'predmet_id'=>'required',
            'answer'=>'required',
        ]);
        
        $options = request()->input('options');
   
        $question = new Question();
        $question->question= $data['question'];
        $question->predmet_id = $data['predmet_id'];
        $question->answer = $data['answer'];
        $question->option0 = $options[0];
        $question->option1 = $options[1];
        if($options[2] != null){
            $question->option2 = $options[2];
        }
        if($options[3] != null){
        $question->option3 = $options[3];
        }
        $question->save();

        
        return redirect()->route('home');
    }

    public function edit($id){
        $question= Question::findOrFail($id);
        $predmets = Predmet::all();
        return view('question.edit', compact('question', 'predmets'));
    }

    public function update(Request $request, $id){
        $data = request()->validate([
            'question'=>'required',
            'predmet_id'=>'required',
            'answer'=>'required',
        ]);
        
        $options = request()->input('options');
   
        $question = Question::findOrFail($id);
        $question->question= $data['question'];
        $question->predmet_id = $data['predmet_id'];
        $question->answer = $data['answer'];
        $question->option0 = $options[0];
        $question->option1 = $options[1];
        if($options[2] != null){
            $question->option2 = $options[2];
        }
        if($options[3] != null){
        $question->option3 = $options[3];
        }
        $question->update();

        
        return redirect()->route('question-index');
    }

    public function delete($id){
        $question= Question::findOrFail($id);
        $question->delete();

        return redirect()->back();
    }
}
