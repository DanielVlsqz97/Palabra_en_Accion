<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\Curso;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\CursoFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CursoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query=trim($request->get('searchText'));
      $cursos=DB::table('curso')->where('nombre_curso','LIKE','%'.$query.'%')

            ->orderBy('idCurso','asc')
            ->paginate(7);
      return view('colegio.cursos.index', ["cursos"=>$cursos,"searchText"=>$query]);
    }
  }

  public function create(){
    return view("colegio.cursos.create");
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idCurso'=>'unique:curso',
        'nombre_curso'=>'string|max:45'
      ]);

      $curso= new Curso;
      $curso->idCurso = $request->get('idCurso');
      $curso->nombre = $request->get('nombre_curso');
      $curso->save();
      return Redirect::to('colegio/cursos');
    }

    public function show($id){
      return view("colegio.cursos.show",["curso"=>Curso::findOrFail($id)]);
    }

    public function edit($id){
      return view("colegio.cursos.edit",["curso"=>Curso::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idCurso'=>'unique:curso',
        'nombre_curso'=>'string|max:45'
      ]);

      $curso= Curso::findOrFail($id);
      $curso->nombre = $request->get('nombre_curso');
      $curso->update();

      return Redirect::to('colegio/cursos');
    }

    public function destroy($id){
      $curso= DB::table('colegio')->where('idColegio', '=',$id)->delete();
      return Redirect::to('colegio/cursos');
    }
}
