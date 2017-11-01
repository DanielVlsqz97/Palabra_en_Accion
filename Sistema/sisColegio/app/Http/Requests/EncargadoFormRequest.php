<?php

namespace sisColegio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EncargadoFormRequest extends FormRequest
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
          'idEncargado' => 'unique:encargado'
          'nombre_engardo'=>'string|max:45',
          'apellidos_encargado'=>'string|max:45',
          'trabajo' =>'string|max:300',
          'observaciones' =>'string|max:250',
          'estado_civil' => 'string|max:45',
          'nacionalidad' =>'string|max:45',
          'profesion'=> 'string|max:400',
          'dpi' => 'max:20',
          'domicilio' =>'string|max:250'
        ];
    }
}
