<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
  protected $table='subarea';
  protected $primaryKey='idSubArea';

  public $timestamps =false;

  protected $fillable = [
   'nombre_subarea',
   'Curso_idCurso'
  ];
}
