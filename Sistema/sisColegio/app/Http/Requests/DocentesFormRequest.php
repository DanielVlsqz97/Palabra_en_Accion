<?php

namespace sisColegio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocentesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'idDocente'=>'unique:docente',
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
}
