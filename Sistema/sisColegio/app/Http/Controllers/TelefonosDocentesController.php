<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\TelefonosDocentes;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\TelefonosDocentesFormRequest;
use DB;

class TelefonosDocentesController extends Controller
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
      ->select('tel.idTelefono','tel.numero','doc.nombres','doc.apellidos','tip.telefono')
      ->where('doc.nombres','LIKE','%'.$query.'%')
      ->orderBy('tel.idTelefono','asc')
      ->groupBy('tel.idTelefono','tel.numero','doc.nombres','doc.apellidos','tip.telefono')
      ->paginate(7);

      return view('telefonos.telefonos_docentes.index',["telefonos"=>$telefonos,"searchText"=>$query]);
    }
  }

  public function create(){
    $tipo_telefonos=DB::table('tipo telefono')->get();
    $docentes =DB::table('docentes')->get();
    return view("telefonos.telefonos_docentes.create", ["tipo_telefonos"=>$tipo_telefonos,"docentes"=>$docentes]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idTelefono'=>'unique:telefono',
        'numero',
        'tipo_telefono',
        'Docente_idDocente'
      ]);

      $telefono= new TelefonosEncargados;
      $telefono->idTelefono = $request->get('idTelefono');
      $telefono->numero = $request->get('numero');
      $telefono->tipo_telefono = $request->get('tipo_telefono');
      $telefono->Docente_idDocente= $request->get('Docente_idDocente');
      $telefono->save();
      return Redirect::to('telefonos/telefonos_docentes');
    }

    public function show($id){
      return view("telefonos.telefonos_docentes.show",["telefono"=>TelefonosDocentes::findOrFail($id)]);
    }

    public function edit($id){
      return view("telefonos.telefonos_docentes.edit",["telefono"=>TelefonosDocentes::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idTelefono'=>'unique:telefono',
        'numero',
        'tipo_telefono',
        'Docente_idDocente'
      ]);

      $telefono= TelefonosDocentes::findOrFail($id);
      $telefono->numero = $request->get('numero');
      $telefono->tipo_telefono = $request->get('tipo_telefono');
      $telefono->Docente_idDocente = $request->get('Docente_idDocente');
      $Telefono->update();
      return Redirect::to('telefonos/telefonos_docentes');
    }

    public function destroy($id){
      $usuario = DB::table('telefono')->where('idTelefono', '=',$id)->delete();
      return Redirect::to('telefonos/telefonos_docentes');
    }
}
