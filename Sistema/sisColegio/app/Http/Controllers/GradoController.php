<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Grado;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\GradoFormRequest;
use DB;

class GradoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
			$query= trim($request->get('searchText'));
			$grados=DB::table('grado as gra')
			->join('jornada as jor', 'gra.idJornada','=','jor.idJornada')
			->join('nivel academico as niv_a','gra.idNivelAcademico','=','niv_a.idNivelAcademico')
			->select('gra.idGrado','gra.nombre_grado','gra.seccion','niv_a.nombre_nivel','jor.nombre_jornada')
			->where('gra.nombre_grado','LIKE','%'.$query.'%')
			->orderBy('gra.idGrado','asc')
			->groupBy('gra.idGrado','gra.nombre_grado','gra.seccion','niv_a.nombre_nivel','jor.nombre_jornada')
			->paginate(7);

			return view('colegio.grados.index',["grados"=>$grados,"searchText"=>$query]);
		}
  }

  public function create(){
    $niveles=DB::table('nivel academico')->get();
    $jornadas=DB::table('jornada')->get();
    return view("colegio.grados.create", ["niveles"=>$niveles, "jornadas"=>$jornadas]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idGrado'=>'unique:grado',
        'nombre_grado'=>'string',
        'seccion'=>'string',
        'idNivelAcademico',
        'idJornada'
      ]);

      $grado= new Grado;
  		$grado->idGrado = $request->get('idGrado');
  		$grado->nombre_grado = $request->get('nombre_grado');
  		$grado->seccion = $request->get('seccion');
  		$grado->idNivelAcademico = $request->get('idNivelAcademico');
      $grado->idJornada = $request->get('idJornada');
  		$grado->save();
  		return Redirect::to('colegio/grados');
    }

    public function show($id){
  		return view("colegio.grados.show",["grado"=>Grado::findOrFail($id)]);
  	}

    public function edit($id){
      return view("colegio.grados.edit",["grado"=>Grado::findOrFail($id)]);
    }

    public function update(EstudianteFormRequest $request, $id){
      $this->validate($request, [
        'idGrado' =>'unique:grado',
        'nombre_grado'=>'string',
        'seccion'=>'string',
        'idNivelAcademico',
        'idJornada'
      ]);

      $grado= Grado::findOrFail($id);
      $grado->nombre_grado = $request->get('nombre_grado');
      $grado->seccion = $request->get('seccion');
      $grado->idNivelAcademico = $request->get('idNivelAcademico');
      $grado->idJornada = $request->get('idJornada');
      $grado->update();

      return Redirect::to('colegio/grados');
    }

    public function destroy($id){
      $usuario = DB::table('grado')->where('idGrado', '=',$id)->delete();
      return Redirect::to('colegio/grados');
    }

}
