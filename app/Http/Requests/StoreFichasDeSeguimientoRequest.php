<?php

namespace App\Http\Requests;

use App\Models\FichasDeSeguimiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFichasDeSeguimientoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fichas_de_seguimiento_create');
    }

    public function rules()
    {
        return [
            'fecha_y_hora' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
