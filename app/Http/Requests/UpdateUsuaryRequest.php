<?php

namespace App\Http\Requests;

use App\Models\Usuary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUsuaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('usuary_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'apellidos' => [
                'string',
                'required',
            ],
            'telefono' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'otro_documentacion' => [
                'string',
                'nullable',
            ],
            'fecha_nacimiento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'genero' => [
                'required',
            ],
            'otro_genero' => [
                'string',
                'nullable',
            ],
            'lugar_residencia' => [
                'required',
            ],
            'area_asignada' => [
                'required',
            ],
            'psicologa_asignadas.*' => [
                'integer',
            ],
            'psicologa_asignadas' => [
                'required',
                'array',
            ],
            'fecha_registro' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nacionalidad' => [
                'string',
                'nullable',
            ],
            'direccion_domicilio' => [
                'string',
                'nullable',
            ],
            'otros_como_nos_conocio' => [
                'string',
                'nullable',
            ],
            'otros_derivacion_realizada_por' => [
                'string',
                'nullable',
            ],
            'otros_diagnostico_salud' => [
                'string',
                'nullable',
            ],
            'otros_toma_psicofarmacos' => [
                'string',
                'nullable',
            ],
            'otros_discapacidad' => [
                'string',
                'nullable',
            ],
            'otros_problemas_salud_fisica' => [
                'string',
                'nullable',
            ],
            'otros_relacion_covid_19' => [
                'string',
                'nullable',
            ],
            'otros_estado_civil' => [
                'string',
                'nullable',
            ],
            'si_vinculacion_con_otros_recursos' => [
                'string',
                'nullable',
            ],
            'fecha_de_lanzamiento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'otro_tipo_de_domicilio' => [
                'string',
                'nullable',
            ],
            'riesgo_conducta_suicida_ultima_fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'si_planificacion' => [
                'string',
                'nullable',
            ],
            'si_recibe_o_ha_recibido_atencion_psicosocial' => [
                'string',
                'nullable',
            ],
            'si_otros_tipos_de_violencia' => [
                'string',
                'nullable',
            ],
            'fecha_alta' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'otros_derivacion_a' => [
                'string',
                'nullable',
            ],
            'documentacion_anexa' => [
                'array',
            ],
        ];
    }
}
