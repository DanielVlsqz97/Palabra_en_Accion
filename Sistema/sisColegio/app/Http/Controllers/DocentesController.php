<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Docentes;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\DocentesFormRequest;
use Carbon\Carbon;
use DB;

class DocentesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $docentes=DB::table('docente as doc')
      ->join('registro escalafonario as reg', 'doc.idRegistroEscalafonario','=','reg.idRegistroEscalafonario')
      ->select('doc.idDocente','doc.nombres','doc.apellidos','doc.ceduladocente','doc.experiencia_laboral','doc.inicio_labores','reg.clase')
      ->where('doc.nombres','LIKE','%'.$query.'%')
      ->orderBy('doc.idDocente','asc')
      ->groupBy('doc.idDocente','doc.nombres','doc.apellidos','doc.ceduladocente','doc.experiencia_laboral','doc.inicio_labores','reg.clase')
      ->paginate(7);

      return view('personal.docentes.index',["docentes"=>$docentes,"searchText"=>$query]);
    }
  }

  public function create(){
    $registros=DB::table('registro escalafonario')->get();
    return view("personal.docentes.create", ["registros"=>$registros]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idDocente'=>'unique:docente',
        'nombres',
        'apellidos',
        'direccion',
        'dpi',
        'ceduladocente',
        'email',
        'grado_academico',
        'experiencia_laboral',
        'inicio_labores',
        'idRegistroEscalafonario'
      ]);

      $docente= new Docentes;
      $docente->idDocente = $request->get('idDocente');
      $docente->nombres = $request->get('nombres');
      $docente->apellidos = $request->get('apellidos');
      $docente->direccion = $request->get('direccion');
      $docente->dpi = $request->get('dpi');
      $docente->ceduladocente = $request->get('ceduladocente');
      $docente->email = $request->get('email');
      $docente->grado_academico = $request->get('grado_academico');
      $docente->experiencia_laboral = $request->get('experiencia_laboral');
      $docente->inicio_labores = $request->get('inicio_labores');
      $docente->idRegistroEscalafonario = $request->get('idRegistroEscalafonario');
      $docente->save();
      return Redirect::to('personal/docentes');
    }

    public function show($id){
      return view("personal.docentes.show",["docente"=>Docentes::findOrFail($id)]);
    }

    public function edit($id){
      return view("personal.docentes.edit",["docente"=>Docentes::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idDocente'=>'unique:docente',
        'nombres',
        'apellidos',
        'direccion',
        'dpi',
        'ceduladocente',
        'email',
        'grado_academico',
        'experiencia_laboral',
        'inicio_labores',
        'idRegistroEscalafonario'
      ]);

      $docente= Docentes::findOrFail($id);
      $docente->nombres = $request->get('nombres');
      $docente->apellidos = $request->get('apellidos');
      $docente->direccion = $request->get('direccion');
      $docente->dpi = $request->get('dpi');
      $docente->ceduladocente = $request->get('ceduladocente');
      $docente->email = $request->get('email');
      $docente->grado_academico = $request->get('grado_academico');
      $docente->experiencia_laboral = $request->get('experiencia_laboral');
      $docente->inicio_labores = $request->get('inicio_labores');
      $docente->update();

      return Redirect::to('personal/docentes');
    }

    public function destroy($id){
      $usuario = DB::table('docente')->where('idDocente', '=',$id)->delete();
      return Redirect::to('personal/docentes');
    }
}
