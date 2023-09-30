<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::where('type_user', 3)->paginate();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_acadmi' => 'required|integer',
            'type_user' => 'required|integer',
        ]);

        User::create($data);

        return redirect('/students');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('students.edit', compact('user'));
    }
    public function show(){

    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'num_acadmi' => 'required|integer',
        ]);

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect('/students');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/students');
    }

    public function profile($id){
        $student = User::find($id);

        return view('students/profile',compact('student'));
    }
}
