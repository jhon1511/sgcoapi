<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = Instructor::all();
        return json_encode(['instructores' => $instructores]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nombre' => ['required', 'max:30']
        ]);
        $instructor = new Instructor();
        $instructor->id = $request->id;
        $instructor->nombre = $request->nombre;
        $instructor->apellido = $request->apellido;
        $instructor->especialidad = $request->especialidad;
        $instructor->save();
        return json_encode(['instructor' => $instructor]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instructor= Instructor::find($id);
        if(is_null($instructor)){
            return abort(404);
        }
        return json_encode(['instructor' => $instructor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $instructor = Instructor::find($id);
        $instructor->id = $request->id;
        $instructor->nombre = $request->nombre;
        $instructor->apellido = $request->apellido;
        $instructor->especialidad = $request->especialidad;
        $instructor->save();
        return json_encode(['instructor' => $instructor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::find($id);
        $instructor->delete();
        $instructores = Instructor::all();
        return json_encode(['instructores' => $instructores, 'success' => true]);
    }
}
