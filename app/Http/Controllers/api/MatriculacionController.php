<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matriculacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculaciones = DB::table('matriculaciones')
        ->join('cursos', 'cursos.id', '=', 'matriculaciones.curso_id') 
        ->join('estudiantes', 'estudiantes.id', '=', 'matriculaciones.estudiante_id') 
        ->select('matriculaciones.*',  'cursos.titulo as curso', 'estudiantes.nombre as estudiante')
        ->get();
        return json_encode(['matriculaciones' => $matriculaciones]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matriculacion = new Matriculacion();
        $matriculacion->id = $request->id;
        $matriculacion->curso_id = $request->curso_id;
        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->fecha_matriculacion = $request->fecha_matriculacion; 
        $matriculacion->save();
        return json_encode(['matriculacion' => $matriculacion]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matriculacion= Matriculacion::find($id);
        if(is_null($matriculacion)){
            return abort(404);
        }
        return json_encode(['matriculacion' => $matriculacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matriculacion= Matriculacion::find($id);
        $matriculacion->id = $request->id;
        $matriculacion->curso_id = $request->curso_id;
        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->fecha_matriculacion = $request->fecha_matriculacion; 
        $matriculacion->save();
        return json_encode(['matriculacion' => $matriculacion]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matriculacion= Matriculacion::find($id);
        $matriculacion->delete();

        $matriculaciones = DB::table('matriculaciones')
        ->join('cursos', 'cursos.id', '=', 'matriculaciones.curso_id') 
        ->join('estudiantes', 'estudiantes.id', '=', 'matriculaciones.estudiante_id') 
        ->select('matriculaciones.*',  'cursos.titulo as curso', 'estudiantes.nombre as estudiante')
        ->get();
        return json_encode(['matriculaciones' => $matriculaciones]);
    }
}
