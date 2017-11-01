<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Calificaciones;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\CalificacionesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CalificacionesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $calificaciones=DB::table('calificacion as cal')
			->join('curso as cur', 'cal.Curso_idCurso','=','cur.idCurso')
			->join('bimestre as bim','cal.Bimestre_idBimestre','=','bim.idBimestre')
      ->join('estudiante as est','cal.Estudiante_idEstudiante','=','est.idEstudiante')
			->select('cal.idCalificacion','bim.nombre_bimestre','cal.total','est.nombre','est.apellido','cur.nombre_curso')
			->where('est.nombre','LIKE','%'.$query.'%')
			->orderBy('cur.nombre_curso','asc')
			->groupBy('cal.idCalificacion','bim.nombre_bimestre','cal.total','est.nombre','est.apellido','cur.nombre_curso')
			->paginate(7);
      return view('colegio.notas.index', ["calificaciones"=>$calificaciones,"searchText"=>$query]);
    }
  }

  public function create(){
    $cursos=DB::table('curso')->get();
    $bimestres=DB::table('bimestre')->get();
    $estudiantes=DB::table('estudiante')->get();
    return view("colegio.notas.create", ["cursos"=>$cursos, "bimestres"=>$bimestres, "estudiantes"=>$estudiantes]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idCalificacion'=>'unique:calificacion',
        'actitudinal',
        'Porsidemental',
        'declarativo',
        'total',
        'Curso_idCurso',
        'Bimestre_idBimestre',
        'Estudiante_idEstudiante',
        'primer_reporte_fecha',
        'primer_reporte',
        'segundo_reporte_fecha',
        'segundo_reporte',
        'tercer_reporte_fecha',
        'tercer_reporte',
        'primera_llamadaAnt_fecha',
        'primera_llamadaAnt',
        'segunda_llamadaAnt_fecha',
        'segunda_llamadaAnt',
        'tercera_llamadaAnt_fecha',
        'tercera_llamadaAnt'
      ]);

      $calificacion= new Calificaciones;
      $calificacion->idCalificacion= $request->get('idCalificacion');
      $calificacion->actitudinal = $request->get('actitudinal');
      $calificacion->Prosidemental = $request->get('Prosidemental');
      $calificacion->declarativo = $request->get('declarativo');
      $calificacion->Curso_idCurso = $request->get('Curso_idCurso');
      $calificacion->Bimestre_idBimestre = $request->get('Bimestre_idBimestre');
      $calificacion->Estudiante_idEstudiante = $request->get('Estudiante_idEstudiante');
      $calificacion->primer_reporte_fecha = $request->get('primer_reporte_fecha');
      $calificacion->primer_reporte = $request->get('primer_reporte');
      $calificacion->segundo_reporte_fecha = $request->get('segundo_reporte_fecha');
      $calificacion->segundo_reporte = $request->get('segundo_reporte');
      $calificacion->tercer_reporte_fecha = $request->get('tercer_reporte_fecha');
      $calificacion->tercer_reporte = $request->get('tercer_reporte');
      $calificacion->primera_llamadaAnt_fecha = $request->get('primera_llamadaAnt_fecha');
      $calificacion->primera_llamadaAnt = $request->get('primera_llamadaAnt');
      $calificacion->segunda_llamadaAnt_fecha = $request->get('segunda_llamadaAnt_fecha');
      $calificacion->segunda_llamadaAnt = $request->get('segunda_llamadaAnt');
      $calificacion->tercera_llamadaAnt_fecha = $request->get('tercera_llamadaAnt_fecha');
      $calificacion->tercera_llamadaAnt = $request->get('tercera_llamadaAnt');
      $calificacion->save();
      return Redirect::to('colegio/notas');
    }

    public function show($id){
      return view("colegio.notas.show",["calificacion"=>Calificaciones::findOrFail($id)]);
    }

    public function edit($id){
      return view("colegio.notas.edit",["calificacion"=>Calificaciones::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idCalificacion'=>'unique:calificacion',
        'actitudinal',
        'Porsidemental',
        'declarativo',
        'total',
        'Curso_idCurso',
        'Bimestre_idBimestre',
        'Estudiante_idEstudiante',
        'primer_reporte_fecha',
        'primer_reporte',
        'segundo_reporte_fecha',
        'segundo_reporte',
        'tercer_reporte_fecha',
        'tercer_reporte',
        'primera_llamadaAnt_fecha',
        'primera_llamadaAnt',
        'segunda_llamadaAnt_fecha',
        'segunda_llamadaAnt',
        'tercera_llamadaAnt_fecha',
        'tercera_llamadaAnt'
      ]);

      $calificacion = Calificaiones::findOrFail($id);
      $calificacion->actitudinal = $request->get('actitudinal');
      $calificacion->Prosidemental = $request->get('Prosidemental');
      $calificacion->declarativo = $request->get('declarativo');
      $calificacion->Curso_idCurso = $request->get('Curso_idCurso');
      $calificacion->Bimestre_idBimestre = $request->get('Bimestre_idBimestre');
      $calificacion->Estudiante_idEstudiante = $request->get('Estudiante_idEstudiante');
      $calificacion->primer_reporte_fecha = $request->get('primer_reporte_fecha');
      $calificacion->primer_reporte = $request->get('primer_reporte');
      $calificacion->segundo_reporte_fecha = $request->get('segundo_reporte_fecha');
      $calificacion->segundo_reporte = $request->get('segundo_reporte');
      $calificacion->tercer_reporte_fecha = $request->get('tercer_reporte_fecha');
      $calificacion->tercer_reporte = $request->get('tercer_reporte');
      $calificacion->primera_llamadaAnt_fecha = $request->get('primera_llamadaAnt_fecha');
      $calificacion->primera_llamadaAnt = $request->get('primera_llamadaAnt');
      $calificacion->segunda_llamadaAnt_fecha = $request->get('segunda_llamadaAnt_fecha');
      $calificacion->segunda_llamadaAnt = $request->get('segunda_llamadaAnt');
      $calificacion->tercera_llamadaAnt_fecha = $request->get('tercera_llamadaAnt_fecha');
      $calificacion->tercera_llamadaAnt = $request->get('tercera_llamadaAnt');
      $calificacion->update();

      return Redirect::to('colegio/notas');
    }

    public function destroy($id){
      $calificaciones= DB::table('calificaion')->where('idCalificacion', '=',$id)->delete();
      return Redirect::to('colegio/notas');
    }
}
