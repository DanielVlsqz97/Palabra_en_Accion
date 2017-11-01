<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Padres;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\PadresFormRequest;
use DB;

class PadresController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $padres=DB::table('padres')->where('nombre_padre','LIKE','%'.$query.'%')

            ->orderBy('idPadres','asc')
            ->paginate(7);
      return view('responsables.padres.index', ["padres"=>$padres,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("responsables.padres.create");
  }

public function store(/*EstudianteFormRequest $request*/Request $request){
  $this->validate($request, [
    'idPadres' => 'unique:padres',
    'nombre_padre'=>'string|max:45',
    'apellido_padre'=>'string|max:45',
    'telefono_padre' =>'string|max:10',
    'nombre_madre' =>'string|max:45',
    'apellido_madre' => 'string|max:45',
    'telefono_madre' =>'string|max:10',
    'no_hijos'=> 'integer',
    'no_hijos_hombre' => 'integer',
    'no_hijos_mujeres' =>'integer',
    'estado_convivencia'=>'string|max:250'
  ]);

    $padre= new Padres;
    $padre->idPadres = $request->get('idPadres');
    $padre->nombre_padre = $request->get('nombre_padre');
    $padre->apellido_padre = $request->get('apellido_padre');
    $padre->telefono_padre = $request->get('telefono_padre');
    $padre->nombre_madre = $request->get('nombre_madre');
    $padre->apellido_madre = $request->get('apellido_madre');
    $padre->telefono_madre = $request->get('telefono_madre');
    $padre->no_hijos = $request->get('no_hijos');
    $padre->no_hijos_hombre = $request->get('no_hijos_hombre');
    $padre->no_hijos_mujeres = $request->get('no_hijos_mujeres');
    $padre->estado_convivencia = $request->get('estado_convivencia');
    $padre->estado = 'Activo';
    $padre->save();
    return Redirect::to('responsables/padres');
  }

  public function show($id){
    return view("responsables.padres.show",["padre"=>Padres::findOrFail($id)]);
  }

  public function edit($id){
    return view("responsables.padres.edit",["padre"=>Padres::findOrFail($id)]);
  }

  public function update(PadresFormRequest $request, $id){
    $this->validate($request, [
      'idPadres' => 'unique:padres',
      'nombre_padre'=>'string|max:45',
      'apellido_padre'=>'string|max:45',
      'telefono_padre' =>'string|max:10',
      'nombre_madre' =>'string|max:45',
      'apellido_madre' => 'string|max:45',
      'telefono_madre' =>'string|max:10',
      'no_hijos'=> 'integer',
      'no_hijos_hombre' => 'integer',
      'no_hijos_mujeres' =>'integer',
      'estado_convivencia'=>'string|max:250'
    ]);

    $padre=Padres::findOrFail($id);
    $padre->nombre_padre = $request->get('nombre_padre');
    $padre->apellido_padre = $request->get('apellido_padre');
    $padre->telefono_padre = $request->get('telefono_padre');
    $padre->nombre_madre = $request->get('nombre_madre');
    $padre->apellido_madre = $request->get('apellido_madre');
    $padre->telefono_madre = $request->get('telefono_madre');
    $padre->no_hijos = $request->get('no_hijos');
    $padre->no_hijos_hombre = $request->get('no_hijos_padre');
    $padre->no_hijos_mujeres = $request->get('no_hijos_mujeres');
    $padre->estado_convivencia = $request->get('estado_convivencia');
    $padre->estado = 'Activo';
    $padre->update();

    return Redirect::to('responsables/padres');
  }

  public function destroy($id){
    $usuario = DB::table('padres')->where('idPadres', '=',$id)->delete();
    return Redirect::to('responsables/padres');
  }
}
