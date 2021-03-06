<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;

class coursesController extends Controller
{
    function getCourseCatalog(){
      $users = User::all();
      foreach( $courses as $course ) {
          echo $course->nombre;
      }
    }

public function store(Request $request)
{
    $course = new Courses;
    $course->nombre = $request->nombre;
    $course->duracion = $request->duracion;
    $course->fecha_inicio = $request->fecha_inicio;
    $course->fecha_final = $request->fecha_final;
    $course->estado =1;
    /*enviar semana, primero añadir campo en la base de datos OJOOOOOOOO*/
    $course->save();

}


public function showAll(){
  $courses = Courses::orderBy('ID_CURSO')->get();
 return view('content.courses.catalog', compact('courses'));
}


public function showCourse($id){
  $course = Courses::find($id);
  return view('content.courses.modifyCourse', compact('usuario'));
}



public function updateCourse(Request $request)
{
    $course = Courses::find($request->ID_CURSO);
    $course->NOMBRE = $request->NOMBRE;
    $course->DURACION = $request->DURACION;
    $course->FECHA_INICIO = $request->FECHA_INICIO;
    $course->FECHA_FIN = $request->FECHA_FIN;
    $course->ESTADO = $request->ESTADO;
    $course->save();
}


}
