<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class TelefonosDocentes extends Model
{
  protected $table='telefono';
  protected $primaryKey='idTelefono';

  public $timestamps =false;

  protected $fillable = [
   'numero',
   'tipo_telefono',
   'encargado',
   'Docente_idDocente'

  ];

  protected $guarded = [

  ];
}
