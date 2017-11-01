<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
  protected $table='padres';
  protected $primaryKey='idPadres';

  public $timestamps =false;

  protected $fillable = [
   'nombre_padre',
   'apellido_padre',
   'telefono_padre',
   'nombre_madre',
   'apellido_madre',
   'telefono_madre',
   'no_hijos',
   'no_hijos_hombre',
   'no_hijos_mujeres',
   'estado_convivencia',
   'estado'
  ];

  protected $guarded = [

  ];
}
