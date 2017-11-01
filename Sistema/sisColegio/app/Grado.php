<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
  protected $table='grado';
  protected $primaryKey='idGrado';

  public $timestamps =false;

  protected $fillable = [
   'nombre_grado',
   'seccion',
   'idNivelAcademico',
   'idJornada'

  ];

  protected $guarded = [

  ];
}
