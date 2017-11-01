<?php

namespace sisColegio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecadosFromRequest extends FormRequest
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
          'idEstudiante' => 'unique:estudiante',
          'nombre' => 'string|max:170',
          'apellido'=>'string|max:135',
          'anterior_establecimiento' =>'string|max:250',
          'tipo_sangre'=>'string|max:5',
          'enfermedades',
          'descripcion_enfermedades'=>'string',
          'medicamentos'=>'string',
          'alergico',
          'descripcion_alergia'=>'string',
          'idGrado',
          'certificado_nac',
          'repitiendo',
          'becado',
          'idEncargado',
          'Padres_idPadres'
        ];
    }
}
