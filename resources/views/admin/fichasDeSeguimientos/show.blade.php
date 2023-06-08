@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fichasDeSeguimiento.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fichas-de-seguimientos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasDeSeguimiento.fields.id') }}
                        </th>
                        <td>
                            {{ $fichasDeSeguimiento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasDeSeguimiento.fields.usuarie') }}
                        </th>
                        <td>
                            {{ $fichasDeSeguimiento->usuarie->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasDeSeguimiento.fields.profesional') }}
                        </th>
                        <td>
                            {{ $fichasDeSeguimiento->profesional->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasDeSeguimiento.fields.fecha_y_hora') }}
                        </th>
                        <td>
                            {{ $fichasDeSeguimiento->fecha_y_hora }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichasDeSeguimiento.fields.comentarios_seguimiento') }}
                        </th>
                        <td>
                            {!! $fichasDeSeguimiento->comentarios_seguimiento !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fichas-de-seguimientos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection