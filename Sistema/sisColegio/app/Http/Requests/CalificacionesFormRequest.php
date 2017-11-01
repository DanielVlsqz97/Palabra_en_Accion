<?php

namespace sisColegio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalificacionesFormRequest extends FormRequest
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
          'idCalificacion'=>'unique:calificacion',
          'actitudinal',
          'Porsidemental',
          'declarativo',
          'total',
          'Curso_idCurso',
          'Bimestre_idBimestre',
          'Estudiante_idEstudiante',
          'primer_reporte_fecha',
          'primer_reporte',
          'segundo_reporte_fecha',
          'segundo_reporte',
          'tercer_reporte_fecha',
          'tercer_reporte',
          'primera_llamadaAnt_fecha',
          'primera_llamadaAnt',
          'segunda_llamadaAnt_fecha',
          'segunda_llamadaAnt',
          'tercera_llamadaAnt_fecha',
          'tercera_llamadaAnt'
        ];
    }
}
