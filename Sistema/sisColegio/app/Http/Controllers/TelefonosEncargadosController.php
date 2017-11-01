<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\TelefonosEncargados;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\TelefonosEncargadosFormRequest;
use DB;

class TelefonosEncargadosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $telefonos=DB::table('telefono as tel')
      ->join('tipo telefono as tip', 'tel.tipo_telefono','=','tip.idTipoTelefono')
      ->join('encargado as enc', 'tel.encargado','=','enc.idEncargado')
      ->select('tel.idTelefono','tel.numero','enc.nombre_encargado','enc.apellidos_encargado','tip.telefono')
      ->where('enc.nombre_encargado','LIKE','%'.$query.'%')
      ->orderBy('tel.idTelefono','asc')
      ->groupBy('tel.idTelefono','tel.numero','enc.nombre_encargado','enc.apellidos_encargado','tip.telefono')
      ->paginate(7);

      return view('telefonos.telefonos_encargados.index',["telefonos"=>$telefonos,"searchText"=>$query]);
    }
  }

  public function create(){
    $tipo_telefonos=DB::table('tipo telefono')->get();
    $encargados =DB::table('encargado')->get();
    return view("telefonos.telefonos_encargados.create", ["tipo_telefonos"=>$tipo_telefonos,"encargados"=>$encargados]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idTelefono'=>'unique:telefono',
        'numero',
        'tipo_telefono',
        'encargado',
      ]);

      $telefono= new TelefonosEncargados;
      $telefono->idTelefono = $request->get('idTelefono');
      $telefono->numero = $request->get('numero');
      $telefono->tipo_telefono = $request->get('tipo_telefono');
      $telefono->encargado = $request->get('encargado');
      $telefono->save();
      return Redirect::to('telefonos/telefonos_encargados');
    }

    public function show($id){
      return view("telefonos.telefonos_encargados.show",["telefono"=>TelefonosEncargados::findOrFail($id)]);
    }

    public function edit($id){
      return view("telefonos.telefonos_encargados.edit",["telefono"=>TelefonosEncargados::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idTelefono'=>'unique:telefono',
        'numero',
        'tipo_telefono',
        'encargado',
      ]);

      $telefono= TelefonosEncargados::findOrFail($id);
      $telefono->numero = $request->get('numero');
      $telefono->tipo_telefono = $request->get('tipo_telefono');
      $telefono->encargado = $request->get('encargado');
      $Telefono->update();

      return Redirect::to('telefonos/telefonos_encargados');
    }

    public function destroy($id){
      $usuario = DB::table('telefono')->where('idTelefono', '=',$id)->delete();
      return Redirect::to('telefonos/telefonos_encargados');
    }
}
