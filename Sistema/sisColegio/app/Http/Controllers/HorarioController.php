<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Horario;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\HorarioFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class HorarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
			$query= trim($request->get('searchText'));
			$horarios=DB::table('horario as hor')
			->join('curso as cur', 'hor.idCurso','=','cur.idCurso')
			->join('docente as doc','hor.idDocente','=','doc.idDocente')
      ->join('subarea as sub', 'hor.idSubArea','=','sub.idSubArea')
			->join('grado as gra','hor.idGrado','=','gra.idGrado')
			->select('hor.idHorario','hor.dia','hor.hora_inicio','hor.hora_fin','doc.nombres','doc.apellidos','cur.nombre_curso','sub.nombre_subarea','gra.nombre_grado')
			->where('gra.nombre_grado','LIKE','%'.$query.'%')
			->orderBy('gra.nombre_grado','asc')
			->groupBy('hor.idHorario','hor.dia','hor.hora_inicio','hor.hora_fin','doc.nombres','doc.apellidos','cur.nombre_curso','sub.nombre_subarea','gra.nombre_grado')
			->paginate(7);

			return view('colegio.horarios.index',["horarios"=>$horarios,"searchText"=>$query]);
		}
  }

  public function create(){
    $cursos=DB::table('curso')->get();
    $subareas=DB::table('subarea')->get();
    $docentes=DB::table('docente')->get();
    $grados=DB::table('grado')->get();
    return view("colegio.horarios.create", ["cursos"=>$cursos, "subareas"=>$subareas,"docentes"=>$docentes, "grados"=>$grados]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idHorario'=>'unique:horario',
        'dia',
        'hora_inicio',
        'hora_fin',
        'idCurso',
        'idSubArea',
        'idDocente',
        'idGrado'
      ]);

      $horario= new Horario;
  		$horario->idGrado = $request->get('idHorario');
      $horario->dia = $request->get('dia');
  		$horario->hora_inicio = $request->get('hora_inicio');
  		$horario->hora_fin = $request->get('hora_fin');
    	$horario->idCurso= $request->get('idCurso');
    	$horario->idSubArea = $request->get('idSubArea');
  		$horario->idDocente = $request->get('idDocente');
      $horario->idGrado = $request->get('idGrado');
  		$horario->save();
  		return Redirect::to('colegio/horarios');
    }

    public function show($id){
  		return view("colegio.horarios.show",["horario"=>Horario::findOrFail($id)]);
  	}

    public function edit($id){
      $cursos=DB::table('curso')->get();
      $subareas=DB::table('subarea')->get();
      $docentes=DB::table('docente')->get();
      $grados=DB::table('grado')->get();
      return view("colegio.horarios.edit",["horario"=>Horario::findOrFail($id), "cursos"=>$cursos, "subareas"=>$subareas,"docentes"=>$docentes, "grados"=>$grados]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idHorario'=>'unique:horario',
        'dia',
        'hora_inicio',
        'hora_fin',
        'idCurso',
        'idSubArea',
        'idDocente',
        'idGrado'
      ]);

      $horario= Horario::findOrFail($id);
      $horario->dia = $request->get('dia');
      $horario->hora_inicio = $request->get('hora_inicio');
      $horario->hora_fin = $request->get('hora_fin');
      $horario->idCurso= $request->get('idCurso');
      $horario->idSubArea = $request->get('idSubArea');
      $horario->idDocente = $request->get('idDocente');
      $horario->idGrado = $request->get('idGrado');
      $horario->update();

      return Redirect::to('colegio/horarios');
    }

    public function destroy($id){
      $horarios = DB::table('horario')->where('idHorario', '=',$id)->delete();
      return Redirect::to('colegio/horarios');
    }
}
