<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\RegistroEscalafonario;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\RegistroEscalafonarioFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class RegistroEscalafonarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $registros=DB::table('registro escalafonario')->where('clase','LIKE','%'.$query.'%')

            ->orderBy('idRegistroEscalafonario','asc')
            ->paginate(7);
      return view('personal.registro_escalafonario.index', ["registros"=>$registros,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("personal.registro_escalafonario.create");
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idRegistroEscalafonario'=>'unique:registro escalafonario',
        'clase'=>'string|max:2'
      ]);

      $registro= new RegistroEscalafonario;
  		$registro->idRegistroEscalafonario = $request->get('idRegistroEscalafonario');
  		$registro->clase = $request->get('clase');
  		$registro->save();
  		return Redirect::to('personal/registro_escalafonario');
    }

    public function show($id){
  		return view("personal.registro_escalafonario.show",["registro"=>RegistroEscalafonario::findOrFail($id)]);
  	}

    public function edit($id){
      return view("personal.registro_escalafonario.edit",["registro"=>RegistroEscalafonario::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idRegistroEscalafonario'=>'unique:registro escalafonario',
        'clase'=>'string|max:2'
      ]);

      $registro= RegistroEscalafonario::findOrFail($id);
      $registro->clase = $request->get('clase');
      $registro->update();

      return Redirect::to('personal/registro_escalafonario');
    }

    public function destroy($id){
      $registro = DB::table('registro escalafonario')->where('idRegistroEscalafonario', '=',$id)->delete();
      return Redirect::to('personal/registro_escalafonario');
    }
}
