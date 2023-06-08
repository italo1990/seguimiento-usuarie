<?php

namespace App\Http\Requests;

use App\Models\Area;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAreaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('area_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'min:1',
                'required',
                'unique:areas,nombre,' . request()->route('area')->id,
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'array',
            ],
        ];
    }
}
