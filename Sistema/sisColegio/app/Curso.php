<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table='curso';
  protected $primaryKey='idCurso';

  public $timestamps =false;

  protected $fillable = [
   'nombre_curso'
  ];
}
