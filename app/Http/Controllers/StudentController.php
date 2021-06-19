<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    public function index(){
        $students = User::where('role_id', 2)->get();

        return view('students.index', compact('students'));
    } 

    public function create(){
        $roles = Role::all();

        return view('students.create', compact('roles'));
    } 

    public function store(Request $request){
        // $q = request()->all();
        // dd($q);

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' =>'required',
        ]);

        $newuser = new User();
        $newuser->name = $data['name']; 
        $newuser->email = $data['email']; 
        $newuser->password = Hash::make($data['password']);
        $newuser->role_id = $data['role_id'];
        $newuser->save();

        return redirect()->route('student-index');
    } 

    public function show($id){
        $student = User::with('quizresults')->findOrFail($id);
        
        return view('students.show', compact('student'));
    }

    public function edit($id){
        $student = User::findOrFail($id);
        $roles = Role::all();
        return view('students.edit', compact('student', 'roles'));
    }

    public function update(Request $request, $id){
        $student = User::findOrFail($id);
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => '',
            'role_id' =>'required',
        ]);
   
        $student->name = $data['name']; 
        $student->email = $data['email']; 
        if($data['password']){
            $student->password = Hash::make($data['password']);

        }
        $student->role_id = $data['role_id'];
        $student->update();
       
        return redirect()->route('student-show', [$student->id]);
    }

    public function studentresult(){

        return view('students.resultat');
    }

}
