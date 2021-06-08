<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predmet;

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
}
