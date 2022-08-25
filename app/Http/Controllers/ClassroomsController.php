<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomsController extends Controller
{

    public function index ()
    {
        $classrooms = Classroom::all();
        return response()->json($classrooms);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'degree' => 'required'
        ]);
        $classroom = Classroom::create([
            'Name' => $request->Name,
            'degree' => $request->degree
        ]);

        return response()->json($classroom, 201);

    }


    public function show(Classroom $classroom){

        $countStudent =  $classroom->students()->count();
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Name' => 'required',
            'degree' => 'required',

        ]);

        Classroom::whereId($id)->update($validatedData);


        return response()->json($validatedData,201);

    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return response()->json('Classroom is successfully deleted');
    }


}
