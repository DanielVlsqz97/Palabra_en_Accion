<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;


use sisColegio\User;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')->orderBy('id','asc')->paginate(7);
      return view('seguridad.usuarios.index', ["usuarios"=>$usuarios,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("seguridad.usuarios.create");
  }

  public function store(UsuarioFormRequest $request){
    $usuario = new User;
    $usuario->name=$request->get('name');
    $usuario->email=$request->get('email');
    $usuario->rol=$request->get('rol');
    $usuario->password=bcrypt($request->get('password'));
    $usuario->save();
    return Redirect::to('seguridad/usuarios');
  }

  public function edit($id){
    return view("seguridad.usuarios.edit",["usuario"=>User::findOrFail($id)]);
  }

  public function update(UsuarioFormRequest $request, $id){
    $usuario=User::findOrFail($id);
    $usuario->name=$request->get('name');
    $usuario->email=$request->get('email');
    $usuario->rol=$request->get('rol');
    $usuario->password=bcrypt($request->get('password'));
    $usuario->update();
    return Redirect::to('seguridad/usuarios');
  }

  public function destroy($id){
    $usuario = DB::table('users')->where('id', '=',$id)->delete();
    return Redirect::to('seguridad/usuarios');
  }
}
