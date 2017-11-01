<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Encargado;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\EstudianteFormRequest;
use DB;

class EncargadoController extends Controller
{
  public function __construct(){

    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $encargados=DB::table('encargado')->where('nombre_encargado','LIKE','%'.$query.'%')

            ->orderBy('idEncargado','asc')
            ->paginate(7);
      return view('responsables.encargado.index', ["encargados"=>$encargados,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("responsables.encargado.create");
  }

public function store(/*EstudianteFormRequest $request*/Request $request){
    $this->validate($request, [
      'idEncargado' => 'unique:encargado',
      'nombre_encargado'=>'string|max:45',
      'apellido_encargado'=>'string|max:45',
      'trabajo' =>'string|max:300',
      'observaciones' =>'string|max:250',
      'estado_civil' => 'string|max:45',
      'nacionalidad' =>'string|max:45',
      'profesion'=> 'string|max:400',
      'dpi' => 'max:20',
      'domicilio' =>'string|max:250'
    ]);

    $encargado= new Encargado;
		$encargado->idEncargado = $request->get('idEncargado');
		$encargado->nombre_encargado = $request->get('nombre_encargado');
		$encargado->apellidos_encargado = $request->get('apellidos_encargado');
		$encargado->trabajo = $request->get('trabajo');
		$encargado->observaciones = $request->get('observaciones');
    $encargado->fecha_nac = $request->get('fecha_nac');
		$encargado->estado_civil = $request->get('estado_civil');
    $encargado->nacionalidad = $request->get('nacionalidad');
		$encargado->profesion = $request->get('profesion');
    $encargado->dpi = $request->get('dpi');
		$encargado->domicilio = $request->get('domicilio');
		$encargado->estado = 'Activo';
    $encargado->save();
		return Redirect::to('responsables/encargado');
  }

  public function show($id){
		return view("responsables.encargado.show",["encargado"=>Encargado::findOrFail($id)]);
	}

  public function edit($id){
    return view("responsables.encargado.edit",["encargado"=>Encargado::findOrFail($id)]);
  }

  public function update(EstudianteFormRequest $request, $id){
    $this->validate($request, [
      'idEncargado' => 'unique:encargado',
      'nombre_encargado'=>'string|max:45',
      'apellidos_encargado'=>'string|max:45',
      'trabajo' =>'string|max:300',
      'observaciones' =>'string|max:250',
      'estado_civil' => 'string|max:45',
      'nacionalidad' =>'string|max:45',
      'profesion'=> 'string|max:400',
      'dpi' => 'max:20',
      'domicilio' =>'string|max:250'
    ]);

    $encargado=Encargado::findOrFail($id);
    $encargado->nombre_encargado = $request->get('nombre_encargado');
		$encargado->apellidos_encargado = $request->get('apellidos_encargado');
		$encargado->trabajo = $request->get('trabajo');
		$encargado->observaciones = $request->get('observaciones');
    $encargado->fecha_nac = $request->get('fecha_nac');
		$encargado->estado_civil = $request->get('estado_civil');
    $encargado->nacionalidad = $request->get('nacionalidad');
		$encargado->profesion = $request->get('profesion');
    $encargado->dpi = $request->get('dpi');
		$encargado->domicilio = $request->get('domicilio');
		$encargado->estado = 'Activo';
    $encargado->update();

    return Redirect::to('responsables/encargado');
  }

  public function destroy($id){
    $usuario = DB::table('encargado')->where('idEncargado', '=',$id)->delete();
    return Redirect::to('responsables/encargado');
  }
}
