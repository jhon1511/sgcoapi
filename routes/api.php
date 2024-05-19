<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\InstructorController;
use App\Http\Controllers\api\EstudianteController;
use App\Http\Controllers\api\EvaluacionController;
use App\Http\Controllers\api\CursoController;
use App\Http\Controllers\api\MatriculacionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/instructores', [InstructorController::class, 'index'])->name('instructores');
Route::post('/instructores', [InstructorController::class, 'store'])->name('instructores.store'); 
Route::delete('/instructores/{instructor}', [InstructorController::class, 'destroy'])->name('instructores.destroy');
Route::put('/instructores/{instructor}', [InstructorController::class, 'update'])->name('instructores.update');
Route::get('/instructores/{instructor}', [InstructorController::class , 'show'])->name('instructores.show');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store'); 
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
Route::get('/estudiantes/{estudiante}', [EstudianteController::class , 'show'])->name('estudiantes.show');

Route::get('/evaluaciones', [EvaluacionController::class, 'index'])->name('evaluaciones');
Route::post('/evaluaciones', [EvaluacionController::class, 'store'])->name('evaluaciones.store'); 
Route::delete('/evaluaciones/{evaluacion}', [EvaluacionController::class, 'destroy'])->name('evaluaciones.destroy');
Route::put('/evaluaciones/{evaluacion}', [EvaluacionController::class, 'update'])->name('evaluaciones.update');
Route::get('/evaluaciones/{evaluacion}', [EvaluacionController::class , 'show'])->name('evaluaciones.show');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store'); 
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
Route::get('/cursos/{curso}', [CursoController::class , 'show'])->name('cursos.show');

Route::get('/matriculaciones', [MatriculacionController::class, 'index'])->name('matriculaciones');
Route::post('/matriculaciones', [MatriculacionController::class, 'store'])->name('matriculaciones.store'); 
Route::delete('/matriculaciones/{matriculacion}', [MatriculacionController::class, 'destroy'])->name('matriculaciones.destroy');
Route::put('/matriculaciones/{matriculacion}', [MatriculacionController::class, 'update'])->name('matriculaciones.update');
Route::get('/matriculaciones/{matriculacion}', [MatriculacionController::class , 'show'])->name('matriculaciones.show');





