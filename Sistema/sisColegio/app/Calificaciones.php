<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
  protected $table='calificacion';
  protected $primaryKey='idCalificacion';

  public $timestamps =false;

  protected $fillable = [
   'actitudinal',
   'Porsidemental',
   'declarativo',
   'total',
   'Curso_idCurso',
   'Bimestre_idBimestre',
   'Estudiante_idEstudiante',
   'primer_reporte_fecha',
   'primer_reporte',
   'segundo_reporte_fecha',
   'segundo_reporte',
   'tercer_reporte_fecha',
   'tercer_reporte',
   'primera_llamadaAnt_fecha',
   'primera_llamadaAnt',
   'segunda_llamadaAnt_fecha',
   'segunda_llamadaAnt',
   'tercera_llamadaAnt_fecha',
   'tercera_llamadaAnt'
  ];
}
