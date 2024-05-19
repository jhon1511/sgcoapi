<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return json_encode(['estudiantes' => $estudiantes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nombre' => ['required', 'max:30']
        ]);
        $estudiante = new Estudiante();
        $estudiante->id = $request->id;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->email = $request->email;
        $estudiante->save();
        return json_encode(['estudiante' => $estudiante]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudiante= Estudiante::find($id);
        if(is_null($estudiante)){
            return abort(404);
        }
        return json_encode(['estudiante' => $estudiante]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->id = $request->id;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->email = $request->email;
        $estudiante->save();
        return json_encode(['estudiante' => $estudiante]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Instructor::find($id);
        $estudiante->delete();
        
        $estudiantes = Estudiante::all();
        return json_encode(['estudiantes' => $estudiantes]);
    }
}
