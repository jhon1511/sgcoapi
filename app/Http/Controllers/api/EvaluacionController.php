<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluaciones = DB::table('evaluaciones')
        ->join('cursos', 'cursos.id', '=', 'evaluaciones.curso_id') 
        ->join('estudiantes', 'estudiantes.id', '=', 'evaluaciones.estudiante_id') 
        ->select('cursos.*',  'cursos.titulo as curso', 'estudiantes.nombre as estudiante')
        ->get();
        return json_encode(['evaluaciones' => $evaluaciones]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'titulo' => ['required', 'max:30']
        ]);
        $evaluacion = new Evaluacion();
        $evaluacion->id = $request->id;
        $evaluacion->curso_id = $request->curso_id;
        $evaluacion->estudiante_id = $request->estudiante_id;
        $evaluacion->nota = $request->nota;
        $evaluacion->comentarios = $request->comentarios;
        $evaluacion->save();
        return json_encode(['evaluacion' => $evaluacion]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evaluacion= Evaluacion::find($id);
        if(is_null($evaluacion)){
            return abort(404);
        }
        return json_encode(['evaluacion' => $evaluacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluacion= Evaluacion::find($id);
        $evaluacion->id = $request->id;
        $evaluacion->curso_id = $request->curso_id;
        $evaluacion->estudiante_id = $request->estudiante_id;
        $evaluacion->nota = $request->nota;
        $evaluacion->comentarios = $request->comentarios;
        $evaluacion->save();
        return json_encode(['evaluacion' => $evaluacion]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evaluacion= Evaluacion::find($id);
        $evaluacion->delete();

        $evaluaciones = DB::table('evaluaciones')
        ->join('cursos', 'cursos.id', '=', 'evaluaciones.curso_id') 
        ->join('estudiantes', 'estudiantes.id', '=', 'evaluaciones.estudiante_id') 
        ->select('cursos.*',  'cursos.titulo as curso', 'estudiantes.nombre as estudiante')
        ->get();
        return json_encode(['evaluaciones' => $evaluaciones]);
    }
}
