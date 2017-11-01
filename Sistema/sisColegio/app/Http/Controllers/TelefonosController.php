<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Telefonos;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\TelefonosFormRequest;
use DB;

class TelefonosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $telefonos=DB::table('telefono as tel')
      ->join('tipo telefono as tip', 'tel.tipo_telefono','=','tip.idTipoTelefono')
      ->join('docente as doc', 'tel.Docente_idDocente','=','doc.idDocente')
      ->join('encargado as enc', 'tel.encargado','=','enc.idEncargado')
      ->select('tel.idTelefono','tel.numero','doc.nombres','doc.apellidos','enc.nombre_encargado','enc.apellidos_encargado','tip.telefono')
      ->where('tel.numero','LIKE','%'.$query.'%')
      ->orderBy('tel.idTelefono','asc')
      ->groupBy('tel.idTelefono','tel.numero','doc.nombres','doc.apellidos','enc.nombre_encargado','enc.apellidos_encargado','tip.telefono')
      ->paginate(7);

      return view('telefonos.num_telefonos.index',["telefonos"=>$telefonos,"searchText"=>$query]);
    }
  }

  public function create(){
    $tipo_telefonos=DB::table('tipo telefono')->get();
    $docentes=DB::table('docente')->get();
    $encargados =DB::table('encargado')->get();
    return view("telefonos.num_telefonos.create", ["tipo_telefonos"=>$tipo_telefonos, "docentes"=>$docentes,"encargados"=>$encargados]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idTelefono'=>'unique:telefono',
        'numero',
        'tipo_telefono',
        'encargado',
        'Docente_idDocente'
      ]);

      $telefono= new Telefonos;
      $telefono->idTelefono = $request->get('idTelefono');
      $telefono->numero = $request->get('numero');
      $telefono->tipo_telefono = $request->get('tipo_telefono');
      $telefono->encargado = $request->get('encargado');
      $telefono->Docente_idDocente = $request->get('Docente_idDocente');
      $telefono->save();
      return Redirect::to('telefonos/num_telefonos');
    }

    public function show($id){
      return view("telefonos.num_telefonos.show",["telefono"=>Telefonos::findOrFail($id)]);
    }

    public function edit($id){
      return view("telefonos.num_telefonos.edit",["telefono"=>Telefonos::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idTelefono'=>'unique:telefono',
        'numero',
        'tipo_telefono',
        'encargado',
        'Docente_idDocente'
      ]);

      $telefono= Telefonos::findOrFail($id);
      $telefono->numero = $request->get('numero');
      $telefono->tipo_telefono = $request->get('tipo_telefono');
      $telefono->encargado = $request->get('encargado');
      $telefono->Docente_idDocente = $request->get('Docente_idDocente');
      $Telefono->update();

      return Redirect::to('telefonos/num_telefonos');
    }

    public function destroy($id){
      $usuario = DB::table('telefono')->where('idTelefono', '=',$id)->delete();
      return Redirect::to('telefonos/num_telefonos');
    }
}
