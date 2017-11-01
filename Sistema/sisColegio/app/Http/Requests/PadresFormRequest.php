<?php

namespace sisColegio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PadresFormRequest extends FormRequest
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
          'idPadres' => 'unique:padres',
          'nombre_padre'=>'string|max:45',
          'apellido_padre'=>'string|max:45',
          'telefono_padre' =>'string|max:10',
          'nombre_madre' =>'string|max:45',
          'apellido_madre' => 'string|max:45',
          'telefono_madre' =>'string|max:10',
          'no_hijos'=> 'integer',
          'no_hijos_hombre' => 'integer',
          'no_hijos_mujeres' =>'integer',
          'estado_convivencia'=>'string|max:250'
        ];
    }
}
