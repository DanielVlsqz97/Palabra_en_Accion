<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Estudiante;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\EstudianteFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class BecadosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
			$query= trim($request->get('searchText'));
			$becados=DB::table('estudiante as est')
			->join('padres as pad', 'est.Padres_idPadres','=','pad.idPadres')
			->join('encargado as enc','est.idEncargado','=','enc.idEncargado')
      ->join('grado as gra','est.idGrado','=','gra.idGrado')
			->select('est.idEstudiante','est.nombre', 'est.apellido','est.fecha_nac','gra.idGrado','gra.nombre_grado','pad.nombre_padre','pad.apellido_padre','pad.nombre_madre','pad.apellido_madre','enc.nombre_encargado','enc.apellidos_encargado')
			->where('est.nombre','LIKE','%'.$query.'%')
      ->where ('est.becado','=','1')
			->orderBy('est.idEstudiante','asc')
			->groupBy('est.idEstudiante','est.nombre', 'est.apellido','est.fecha_nac','gra.idGrado','gra.nombre_grado','pad.nombre_padre','pad.apellido_padre','pad.nombre_madre','pad.apellido_madre','enc.nombre_encargado','enc.apellidos_encargado')
			->paginate(7);

			return view('estudiantes.becados.index',["becados"=>$becados,"searchText"=>$query]);
		}

  }

  public function show($id){
    return view("estudiantes.becados.show",["estudiante"=>Becados::findOrFail($id)]);
  }
}
