<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
  protected $table='contrato';
  protected $primaryKey='idContrato';

  public $timestamps =false;

  protected $fillable = [
   'fecha',
   'idEstudiante',
   'idEncargado',
   'idGrado'

  ];


  public function estudiante()
    {
        return $this->belongsTo('\sisColegio\estudiante');
    }
}
