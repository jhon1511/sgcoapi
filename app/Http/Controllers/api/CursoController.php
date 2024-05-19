<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = DB::table('cursos')
        ->join('instructores', 'instructores.id', '=', 'cursos.instructor_id') 
        ->select('cursos.*',  'instructores.nombre as instructores')
        ->get();
        return json_encode(['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'titulo' => ['required', 'max:30']
        ]);
        $curso = new Curso();
        $curso->id = $request->id;
        $curso->titulo = $request->titulo;
        $curso->descripcion = $request->descripcion;
        $curso->instructor_id = $request->instructor_id;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->fecha_fin = $request->fecha_fin;
        $curso->save();
        return json_encode(['curso' => $curso]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso= Curso::find($id);
        $instructores = Instructor::all();
        if(is_null($curso)){
            return abort(404);
        }
        return json_encode(['curso' => $curso, 'instructores' => $instructores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = Curso::find($id);
        $curso->id = $request->id;
        $curso->titulo = $request->titulo;
        $curso->descripcion = $request->descripcion;
        $curso->instructor_id = $request->instructor_id;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->fecha_fin = $request->fecha_fin;
        $curso->save();
        return json_encode(['curso' => $curso]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        $cursos = DB::table('cursos')
        ->join('instructores', 'instructores.id', '=', 'cursos.instructor_id') 
        ->select('cursos.*',  'instructores.nombre as instructores')
        ->get();
        return json_encode(['cursos' => $cursos, 'success' => true]);
    }
}
