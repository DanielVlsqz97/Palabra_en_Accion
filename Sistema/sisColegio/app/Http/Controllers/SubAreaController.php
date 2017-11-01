<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\SubArea;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\SubAreaFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class SubAreaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
			$query= trim($request->get('searchText'));
			$subareas=DB::table('subarea as sub')
			->join('curso as cur', 'sub.Curso_idCurso','=','cur.idCurso')
			->select('sub.idSubArea','sub.nombre_subarea','cur.nombre_curso')
			->where('sub.nombre_subarea','LIKE','%'.$query.'%')
			->orderBy('sub.idSubArea','asc')
			->groupBy('sub.idSubArea','sub.nombre_subarea','cur.nombre_curso')
			->paginate(7);

			return view('colegio.subareas.index',["subareas"=>$subareas,"searchText"=>$query]);
		}
  }

  public function create(){
    $cursos=DB::table('curso')->get();
    return view("colegio.subareas.create", ["cursos"=>$cursos]);
  }

  public function store(/*EstudianteFormRequest $request*/Request $request){
      $this->validate($request, [
        'idSubArea'=>'unique:subarea',
        'nombre_subarea'=>'string',
        'Curso_idCurso'
      ]);

      $subarea= new SubArea;
  		$subarea->idSubArea = $request->get('idSubArea');
  		$subarea->nombre_subarea = $request->get('nombre_subarea');
  		$subarea->Curso_idCurso = $request->get('Curso_idCurso');
  		$subarea->save();
  		return Redirect::to('colegio/subareas');
    }

    public function show($id){
  		return view("colegio.subareas.show",["subarea"=>SubArea::findOrFail($id)]);
  	}

    public function edit($id){
      return view("colegio.subareas.edit",["subarea"=>SubArea::findOrFail($id)]);
    }

    public function update(/*EstudianteFormRequest*/Request $request, $id){
      $this->validate($request, [
        'idSubArea'=>'unique:subarea',
        'nombre_subarea'=>'string',
        'Curso_idCurso'
      ]);

      $subarea= SubArea::findOrFail($id);
      $subarea->nombre_subarea = $request->get('nombre_subarea');
      $subarea->update();

      return Redirect::to('colegio/subareas');
    }

    public function destroy($id){
      $subarea = DB::table('subarea')->where('idSubArea', '=',$id)->delete();
      return Redirect::to('colegio/subareas');
    }
}
