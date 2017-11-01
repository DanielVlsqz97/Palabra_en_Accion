<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $table='estudiante';
  protected $primaryKey='idEstudiante';

  public $timestamps =false;

  protected $fillable = [
   'nombre',
   'apellido',
   'fecha_nac',
   'anterior_establecimiento',
   'tipo_sangre',
   'enfermedades',
   'descripcion_enfermedades',
   'medicamentos',
   'alergico',
   'descripcion_alergia',
   'idGrado',
   'certificado_nac',
   'repitiendo',
   'becado',
   'idEncargado',
   'Padres_idPadres',
   'estado'
  ];

  public function contrato()
    {
        return $this->hasMany('\sisColegio\contratos');
    }
}
