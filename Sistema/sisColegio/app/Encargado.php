<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
  protected $table='encargado';
  protected $primaryKey='idEncargado';

  public $timestamps =false;

  protected $fillable = [
   'nombre_encargado',
   'apellidos_encargado',
   'trabajo',
   'observaciones',
   'fecha_nac',
   'estado_civil',
   'nacionalidad',
   'profesion',
   'dpi',
   'domicilio',
   'estado'
  ];

  protected $guarded = [

  ];
}
