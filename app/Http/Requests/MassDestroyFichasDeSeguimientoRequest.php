<?php

namespace App\Http\Requests;

use App\Models\FichasDeSeguimiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFichasDeSeguimientoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fichas_de_seguimiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fichas_de_seguimientos,id',
        ];
    }
}
