<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Contratos;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\ContratosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class ContratosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $contratos=DB::table('contrato as con')
      ->join('estudiante as est','con.idEstudiante','=','est.idEstudiante')
      ->join('encargado as enc', 'est.idEncargado','=','enc.idEncargado')
      ->join('grado as gra','est.idGrado','=','gra.idGrado')
      ->select('con.idContrato','con.fecha','est.nombre','est.apellido','gra.nombre_grado','enc.nombre_encargado','enc.apellidos_encargado','enc.trabajo','enc.domicilio','enc.profesion','enc.nacionalidad')
      ->where('est.nombre','LIKE','%'.$query.'%')
      ->orderBy('con.fecha','asc')
      ->groupBy('con.idContrato','con.fecha','est.nombre','est.apellido','gra.nombre_grado','enc.nombre_encargado','enc.apellidos_encargado','enc.trabajo','enc.domicilio','enc.profesion','enc.nacionalidad')
      ->paginate(7);
      return view('colegio.contratos.index', ["contratos"=>$contratos,"searchText"=>$query]);
    }
  }

  public function create(){
    $estudiantes=DB::table('estudiante')->get();
    return view("colegio.contratos.create", ["estudiantes"=>$estudiantes]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idContrato'=>'unique:contrato',
        'fecha',
        'idEstudiante'
      ]);

      $contrato= new Contratos;
      $contrato->idContrato = $request->get('idContrato');
      $contrato->fecha = $request->get('fecha');
      $contrato->idEstudiante = $request->get('idEstudiante');
      $contrato->save();
      return Redirect::to('colegio/contratos');
    }

    public function show(Request $request, $id){
      // $contrato = Contratos::find($id);
      $contrato = DB::table('contrato as con')
      ->join('estudiante as est','con.idEstudiante','=','est.idEstudiante')
      ->join('encargado as enc', 'est.idEncargado','=','enc.idEncargado')
      ->join('grado as gra','est.idGrado','=','gra.idGrado')
      ->join('nivel academico as niv_a', 'gra.idNivelAcademico','=','niv_a.idNivelAcademico')
      ->join('jornada as jor','gra.idJornada','=','jor.idJornada')
      ->select('con.idContrato','con.fecha','est.nombre','est.apellido','gra.nombre_grado','enc.nombre_encargado','enc.apellidos_encargado','enc.trabajo','enc.domicilio','enc.profesion','enc.nacionalidad','enc.estado_civil','enc.dpi','enc.fecha_nac','niv_a.nombre_nivel','jor.nombre_jornada')->where('con.idContrato','=',$id)->first();

      $pdf = PDF::loadView('colegio.contratos.show', compact('contrato'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('contrato.pdf');
      return $pdf->stream('Contrato.pdf');
    }

    public function edit($id){
      return view("colegio.contratos.edit",["calificacion"=>Calificaciones::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idContrato'=>'unique:contrato',
        'fecha',
        'idEstudiante'
      ]);

      $contrato = Contratos::findOrFail($id);
      $contrato->fecha = $request->get('fecha');
      $contrato->idEstudiante = $request->get('idEstudiante');
      $contrato->update();

      return Redirect::to('colegio/contratos');
    }

    public function destroy($id){
      $contrato= DB::table('contrato')->where('idContrato', '=',$id)->delete();
      return Redirect::to('colegio/contratos');
    }
}
