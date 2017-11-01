<?php

namespace sisColegio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefonosFromRequest extends FormRequest
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
          return [
            'idTelefono'=>'unique:telefono',
            'numero',
            'tipo_telefono',
            'encargado',
            'Docente_idDocente'
          ];
        ];
    }
}
