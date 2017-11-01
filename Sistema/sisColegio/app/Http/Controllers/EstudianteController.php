<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Estudiante;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\EstudianteFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class EstudianteController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
			$query= trim($request->get('searchText'));
			$estudiantes=DB::table('estudiante as est')
			->join('padres as pad', 'est.Padres_idPadres','=','pad.idPadres')
			->join('encargado as enc','est.idEncargado','=','enc.idEncargado')
      ->join('grado as gra','est.idGrado','=','gra.idGrado')
			->select('est.idEstudiante','est.nombre', 'est.apellido','est.fecha_nac','gra.idGrado','gra.nombre_grado','pad.nombre_padre','pad.apellido_padre','pad.nombre_madre','pad.apellido_madre','enc.nombre_encargado','enc.apellidos_encargado')
			->where('est.nombre','LIKE','%'.$query.'%')
			->orderBy('est.idEstudiante','asc')
			->groupBy('est.idEstudiante','est.nombre', 'est.apellido','est.fecha_nac','gra.idGrado','gra.nombre_grado','pad.nombre_padre','pad.apellido_padre','pad.nombre_madre','pad.apellido_madre','enc.nombre_encargado','enc.apellidos_encargado')
			->paginate(7);

			return view('estudiantes.alumnos.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
		}

  }

  public function create(){
    $padres=DB::table('padres')->get();
    $encargado=DB::table('encargado')->get();
    $grado=DB::table('grado')->get();
    return view("estudiantes.alumnos.create",["padres"=>$padres,"encargado"=>$encargado,"grado"=>$grado]);
  }

public function store(/*EstudianteFormRequest $request*/ Request $request){
  $this->validate($request, [
    'idEstudiante' => 'unique:estudiante',
    'nombre' => 'string|max:170',
    'apellido'=>'string|max:135',
    'anterior_establecimiento' =>'string|max:250',
    'tipo_sangre'=>'string|max:5',
    'enfermedades',
    'descripcion_enfermedades'=>'string',
    'medicamentos'=>'string',
    'alergico',
    'descripcion_alergia'=>'string',
    'idGrado',
    'certificado_nac',
    'repitiendo',
    'becado',
    'idEncargado',
    'Padres_idPadres'
  ]);

    $estudiante= new Estudiante;
    $estudiante->idEstudiante = $request->get('idEstudiante');
    $estudiante->nombre = $request->get('nombre');
    $estudiante->apellido = $request->get('apellido');
    $estudiante->fecha_nac = $request->get('fecha_nac');
    $estudiante->anterior_establecimiento = $request->get('anterior_establecimiento');
    $estudiante->tipo_sangre = $request->get('tipo_sangre');
    $estudiante->enfermedades = $request->get('enfermedades');
    $estudiante->descripcion_enfermedades = $request->get('descripcion_enfermedades');
    $estudiante->medicamentos = $request->get('medicamentos');
    $estudiante->alergico = $request->get('alergico');
    $estudiante->descripcion_alergia = $request->get('descripcion_alergia');
    $estudiante->idGrado = $request->get('idGrado');
    $estudiante->Padres_idPadres = $request->get('Padres_idPadres');
    $estudiante->idEncargado = $request->get('idEncargado');
    $estudiante->repitiendo = $request->get('repitiendo');
    $estudiante->becado = $request->get('becado');
    $estudiante->estado = 'Activo';

    if(Input::hasFile('certificado_nac')){
			$file = Input::file('certificado_nac');
			$file->move(public_path().'/imagenes/certificados_nac/',$file->getClientOriginalName());
			$articulo->imagen=$file->getClientOriginalName();
		}

    $estudiante->save();
    return Redirect::to('estudiantes/alumnos');
  }

  public function show($id){
    return view("estudiantes.alumnos.show",["estudiante"=>Estudiante::findOrFail($id)]);
  }

  public function edit($id){
    return view("estudiantes.alumnos.edit",["estudiante"=>Estudiante::findOrFail($id)]);
  }

  public function update(/*EstudianteFormRequest*/Request $request, $id){
    $this->validate($request, [
      'idEstudiante' => 'unique:estudiante',
      'nombre' => 'string|max:170',
      'apellido'=>'string|max:135',
      'anterior_establecimiento' =>'string|max:250',
      'tipo_sangre'=>'string|max:5',
      'enfermedades',
      'descripcion_enfermedades'=>'string',
      'medicamentos'=>'string',
      'alergico',
      'descripcion_alergia'=>'string',
      'idGrado',
      'certificado_nac',
      'repitiendo',
      'becado',
      'idEncargado',
      'Padres_idPadres'
    ]);

      $estudiante= Estudiante::findOrFail($id);
      $estudiante->nombre = $request->get('nombre');
      $estudiante->apellido = $request->get('apellido');
      $estudiante->fecha_nac = $request->get('fecha_nac');
      $estudiante->anterior_establecimiento = $request->get('anterior_establecimiento');
      $estudiante->tipo_sangre = $request->get('tipo_sangre');
      $estudiante->enfermedades = $request->get('enfermedades');
      $estudiante->descripcion_enfermedades = $request->get('descripcion_enfermedades');
      $estudiante->medicamentos = $request->get('medicamentos');
      $estudiante->alergico = $request->get('alergico');
      $estudiante->descripcion_alergia = $request->get('descripcion_alergia');
      
      $estudiante->estado = 'Activo';

      if(Input::hasFile('certificado_nac')){
  			$file = Input::file('certificado_nac');
  			$file->move(public_path().'/imagenes/certificados_nac/',$file->getClientOriginalName());
  			$estudiante->certificado_nac=$file->getClientOriginalName();
  		}

      $estudiante->update();
      return Redirect::to('estudiantes/alumnos');
  }

  public function destroy($id){
    $usuario = DB::table('estudiante')->where('idEstudiante', '=',$id)->delete();
    return Redirect::to('estudiantes/alumnos');
  }
}
