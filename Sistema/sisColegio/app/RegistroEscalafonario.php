<?php

namespace sisColegio;

use Illuminate\Database\Eloquent\Model;

class RegistroEscalafonario extends Model
{
  protected $table='registro escalafonario';
  protected $primaryKey='idRegistroEscalafonario';

  public $timestamps =false;

  protected $fillable = [
   'clase',

  ];

  protected $guarded = [

  ];
}
