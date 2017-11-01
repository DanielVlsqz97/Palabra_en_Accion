<?php

namespace sisColegio\Http\Controllers;

use Illuminate\Http\Request;

use sisColegio\HorarioVer;
use Illuminate\Support\Facades\Redirect;
use sisColegio\Http\Requests\HorarioVerFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class HorarioVerController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $horarios=DB::table('horario as hor')
      ->join('curso as cur', 'hor.idCurso','=','cur.idCurso')
      ->join('docente as doc','hor.idDocente','=','doc.idDocente')
      ->join('subarea as sub', 'hor.idSubArea','=','sub.idSubArea')
      ->join('grado as gra','hor.idGrado','=','gra.idGrado')
      ->select('hor.idHorario','hor.hora_inicio','hor.hora_fin','doc.nombres','doc.apellidos','cur.nombre_curso','sub.nombre_subarea','gra.nombre_grado')
      ->where('gra.nombre_grado','LIKE','%'.$query.'%')
      ->orderBy('gra.nombre_grado','asc')
      ->groupBy('hor.idHorario','hor.hora_inicio','hor.hora_fin','doc.nombres','doc.apellidos','cur.nombre_curso','sub.nombre_subarea','gra.nombre_grado')
      ->paginate(7);

      return view('colegio.horariosver.index',["horarios"=>$horarios,"searchText"=>$query]);
    }
  }

  public function show($id){
    return view("colegio.horariosver.show",["horario"=>Horario::findOrFail($id)]);
  }
}
