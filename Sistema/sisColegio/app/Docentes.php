<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
  protected $table='docente';
  protected $primaryKey='idDocente';

  public $timestamps =false;

  protected $fillable = [
   'nombres',
   'apellidos',
   'direccion',
   'dpi',
   'ceduladocente',
   'email',
   'grado_academico',
   'experiencia_laboral',
   'inicio_labores',
   'idRegistroEscalafonario'

  ];
}
