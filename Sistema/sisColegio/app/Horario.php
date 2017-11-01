<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
  protected $table='horario';
  protected $primaryKey='idHorario';

  public $timestamps =false;

  protected $fillable = [
   'dia',
   'hora_inicio',
   'hora_fin',
   'idCurso',
   'idSubArea',
   'idDocente',
   'idGrado'
  ];
}
