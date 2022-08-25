<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index ()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Firstname' => 'required',
            'lastname' => 'required',
            'pseudopassword' => 'required'
        ]);
        $student = Student::create([
            'Firstname' => $request->Firstname,
            'lastname' => $request->lastname,
            'pseudopassword' => $request->pseudopassword
        ]);

        return response()->json($student, 201);

    }


    public function show( Request $request, $id) {

        $student = Student::find ($id);

        return response()->json($student,201);

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'First name' => 'required',
            'last name' => 'required',
            'pseudo password' => 'required'

        ]);

        Student::whereId($id)->update($validatedData);


        return response()->json($validatedData,201);

    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return response()->json('Classroom is successfully deleted');
    }

}
