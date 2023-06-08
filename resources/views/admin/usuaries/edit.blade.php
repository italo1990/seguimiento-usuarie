@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.usuary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.usuaries.update", [$usuary->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.usuary.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuary->nombre) }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="apellidos">{{ trans('cruds.usuary.fields.apellidos') }}</label>
                <input class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}" type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $usuary->apellidos) }}" required>
                @if($errors->has('apellidos'))
                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.apellidos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono">{{ trans('cruds.usuary.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', $usuary->telefono) }}" required>
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.usuary.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $usuary->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.documentacion') }}</label>
                @foreach(App\Models\Usuary::DOCUMENTACION_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('documentacion') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="documentacion_{{ $key }}" name="documentacion" value="{{ $key }}" {{ old('documentacion', $usuary->documentacion) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="documentacion_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('documentacion'))
                    <span class="text-danger">{{ $errors->first('documentacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.documentacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otro_documentacion">{{ trans('cruds.usuary.fields.otro_documentacion') }}</label>
                <input class="form-control {{ $errors->has('otro_documentacion') ? 'is-invalid' : '' }}" type="text" name="otro_documentacion" id="otro_documentacion" value="{{ old('otro_documentacion', $usuary->otro_documentacion) }}">
                @if($errors->has('otro_documentacion'))
                    <span class="text-danger">{{ $errors->first('otro_documentacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otro_documentacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_nacimiento">{{ trans('cruds.usuary.fields.fecha_nacimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $usuary->fecha_nacimiento) }}" required>
                @if($errors->has('fecha_nacimiento'))
                    <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.fecha_nacimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.usuary.fields.genero') }}</label>
                @foreach(App\Models\Usuary::GENERO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('genero') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="genero_{{ $key }}" name="genero" value="{{ $key }}" {{ old('genero', $usuary->genero) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genero_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('genero'))
                    <span class="text-danger">{{ $errors->first('genero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.genero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otro_genero">{{ trans('cruds.usuary.fields.otro_genero') }}</label>
                <input class="form-control {{ $errors->has('otro_genero') ? 'is-invalid' : '' }}" type="text" name="otro_genero" id="otro_genero" value="{{ old('otro_genero', $usuary->otro_genero) }}">
                @if($errors->has('otro_genero'))
                    <span class="text-danger">{{ $errors->first('otro_genero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otro_genero_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.usuary.fields.lugar_residencia') }}</label>
                <select class="form-control {{ $errors->has('lugar_residencia') ? 'is-invalid' : '' }}" name="lugar_residencia" id="lugar_residencia" required>
                    <option value disabled {{ old('lugar_residencia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::LUGAR_RESIDENCIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('lugar_residencia', $usuary->lugar_residencia) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('lugar_residencia'))
                    <span class="text-danger">{{ $errors->first('lugar_residencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.lugar_residencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.usuary.fields.area_asignada') }}</label>
                {{-- <select class="form-control {{ $errors->has('area_asignada') ? 'is-invalid' : '' }}" name="area_asignada" id="area_asignada" required>
                    <option value disabled {{ old('area_asignada', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::AREA_ASIGNADA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('area_asignada', $usuary->area_asignada) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
                <select class="form-control select2 {{ $errors->has('area_asignada') ? 'is-invalid' : '' }}" name="area_asignada[]" id="area_asignada" multiple required>
                    @foreach($area_asignadas as $id => $area_asignada)
                        <option value="{{ $id }}" {{ (in_array($id, old('area_asignadas', [])) || $usuary->area_asignadas->contains($id)) ? 'selected' : '' }}>{{ $area_asignada }}</option>
                    @endforeach
                </select>
                @if($errors->has('area_asignada'))
                    <span class="text-danger">{{ $errors->first('area_asignada') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.area_asignada_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="psicologa_asignadas">{{ trans('cruds.usuary.fields.psicologa_asignada') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('psicologa_asignadas') ? 'is-invalid' : '' }}" name="psicologa_asignadas[]" id="psicologa_asignadas" multiple required>
                    @foreach($psicologa_asignadas as $id => $psicologa_asignada)
                        <option value="{{ $id }}" {{ (in_array($id, old('psicologa_asignadas', [])) || $usuary->psicologa_asignadas->contains($id)) ? 'selected' : '' }}>{{ $psicologa_asignada }}</option>
                    @endforeach
                </select>
                @if($errors->has('psicologa_asignadas'))
                    <span class="text-danger">{{ $errors->first('psicologa_asignadas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.psicologa_asignada_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="motivo_consulta">{{ trans('cruds.usuary.fields.motivo_consulta') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('motivo_consulta') ? 'is-invalid' : '' }}" name="motivo_consulta" id="motivo_consulta">{!! old('motivo_consulta', $usuary->motivo_consulta) !!}</textarea>
                @if($errors->has('motivo_consulta'))
                    <span class="text-danger">{{ $errors->first('motivo_consulta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.motivo_consulta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_registro">{{ trans('cruds.usuary.fields.fecha_registro') }}</label>
                <input class="form-control date {{ $errors->has('fecha_registro') ? 'is-invalid' : '' }}" type="text" name="fecha_registro" id="fecha_registro" value="{{ old('fecha_registro', $usuary->fecha_registro) }}">
                @if($errors->has('fecha_registro'))
                    <span class="text-danger">{{ $errors->first('fecha_registro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.fecha_registro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nacionalidad">{{ trans('cruds.usuary.fields.nacionalidad') }}</label>
                <input class="form-control {{ $errors->has('nacionalidad') ? 'is-invalid' : '' }}" type="text" name="nacionalidad" id="nacionalidad" value="{{ old('nacionalidad', $usuary->nacionalidad) }}">
                @if($errors->has('nacionalidad'))
                    <span class="text-danger">{{ $errors->first('nacionalidad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.nacionalidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direccion_domicilio">{{ trans('cruds.usuary.fields.direccion_domicilio') }}</label>
                <input class="form-control {{ $errors->has('direccion_domicilio') ? 'is-invalid' : '' }}" type="text" name="direccion_domicilio" id="direccion_domicilio" value="{{ old('direccion_domicilio', $usuary->direccion_domicilio) }}">
                @if($errors->has('direccion_domicilio'))
                    <span class="text-danger">{{ $errors->first('direccion_domicilio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.direccion_domicilio_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.provincia_residencia') }}</label>
                <select class="form-control {{ $errors->has('provincia_residencia') ? 'is-invalid' : '' }}" name="provincia_residencia" id="provincia_residencia">
                    <option value disabled {{ old('provincia_residencia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::PROVINCIA_RESIDENCIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('provincia_residencia', $usuary->provincia_residencia) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia_residencia'))
                    <span class="text-danger">{{ $errors->first('provincia_residencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.provincia_residencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.es_de_la_fuensanta') }}</label>
                @foreach(App\Models\Usuary::ES_DE_LA_FUENSANTA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('es_de_la_fuensanta') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="es_de_la_fuensanta_{{ $key }}" name="es_de_la_fuensanta" value="{{ $key }}" {{ old('es_de_la_fuensanta', $usuary->es_de_la_fuensanta) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="es_de_la_fuensanta_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('es_de_la_fuensanta'))
                    <span class="text-danger">{{ $errors->first('es_de_la_fuensanta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.es_de_la_fuensanta_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.permiso_residencia') }}</label>
                @foreach(App\Models\Usuary::PERMISO_RESIDENCIA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('permiso_residencia') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="permiso_residencia_{{ $key }}" name="permiso_residencia" value="{{ $key }}" {{ old('permiso_residencia', $usuary->permiso_residencia) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="permiso_residencia_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('permiso_residencia'))
                    <span class="text-danger">{{ $errors->first('permiso_residencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.permiso_residencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.permiso_trabajo') }}</label>
                <select class="form-control {{ $errors->has('permiso_trabajo') ? 'is-invalid' : '' }}" name="permiso_trabajo" id="permiso_trabajo">
                    <option value disabled {{ old('permiso_trabajo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::PERMISO_TRABAJO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('permiso_trabajo', $usuary->permiso_trabajo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('permiso_trabajo'))
                    <span class="text-danger">{{ $errors->first('permiso_trabajo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.permiso_trabajo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.como_nos_conocio') }}</label>
                <select class="form-control {{ $errors->has('como_nos_conocio') ? 'is-invalid' : '' }}" name="como_nos_conocio" id="como_nos_conocio">
                    <option value disabled {{ old('como_nos_conocio', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::COMO_NOS_CONOCIO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('como_nos_conocio', $usuary->como_nos_conocio) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('como_nos_conocio'))
                    <span class="text-danger">{{ $errors->first('como_nos_conocio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.como_nos_conocio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_como_nos_conocio">{{ trans('cruds.usuary.fields.otros_como_nos_conocio') }}</label>
                <input class="form-control {{ $errors->has('otros_como_nos_conocio') ? 'is-invalid' : '' }}" type="text" name="otros_como_nos_conocio" id="otros_como_nos_conocio" value="{{ old('otros_como_nos_conocio', $usuary->otros_como_nos_conocio) }}">
                @if($errors->has('otros_como_nos_conocio'))
                    <span class="text-danger">{{ $errors->first('otros_como_nos_conocio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_como_nos_conocio_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.derivacion_realizada_por') }}</label>
                <select class="form-control {{ $errors->has('derivacion_realizada_por') ? 'is-invalid' : '' }}" name="derivacion_realizada_por" id="derivacion_realizada_por">
                    <option value disabled {{ old('derivacion_realizada_por', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::DERIVACION_REALIZADA_POR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('derivacion_realizada_por', $usuary->derivacion_realizada_por) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('derivacion_realizada_por'))
                    <span class="text-danger">{{ $errors->first('derivacion_realizada_por') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.derivacion_realizada_por_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_derivacion_realizada_por">{{ trans('cruds.usuary.fields.otros_derivacion_realizada_por') }}</label>
                <input class="form-control {{ $errors->has('otros_derivacion_realizada_por') ? 'is-invalid' : '' }}" type="text" name="otros_derivacion_realizada_por" id="otros_derivacion_realizada_por" value="{{ old('otros_derivacion_realizada_por', $usuary->otros_derivacion_realizada_por) }}">
                @if($errors->has('otros_derivacion_realizada_por'))
                    <span class="text-danger">{{ $errors->first('otros_derivacion_realizada_por') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_derivacion_realizada_por_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.situacion_laboral') }}</label>
                @foreach(App\Models\Usuary::SITUACION_LABORAL_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('situacion_laboral') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="situacion_laboral_{{ $key }}" name="situacion_laboral" value="{{ $key }}" {{ old('situacion_laboral', $usuary->situacion_laboral) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="situacion_laboral_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('situacion_laboral'))
                    <span class="text-danger">{{ $errors->first('situacion_laboral') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.situacion_laboral_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.prestaciones') }}</label>
                {{-- <select class="form-control {{ $errors->has('prestaciones') ? 'is-invalid' : '' }}" name="prestaciones" id="prestaciones">
                    <option value disabled {{ old('prestaciones', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::PRESTACIONES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('prestaciones', $usuary->prestaciones) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
                <select class="form-control select2 {{ $errors->has('prestaciones') ? 'is-invalid' : '' }}" name="prestaciones[]" id="prestaciones" multiple>
                    @foreach(App\Models\Usuary::PRESTACIONES_SELECT as $id => $prestacion)
                        <option value="{{ $id }}" {{ in_array($id ,$usuary->prestaciones) ? 'selected' : '' }}>{{ $prestacion }}</option>
                    @endforeach
                </select>
                @if($errors->has('prestaciones'))
                    <span class="text-danger">{{ $errors->first('prestaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.prestaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.dificultades_economicas') }}</label>
                @foreach(App\Models\Usuary::DIFICULTADES_ECONOMICAS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('dificultades_economicas') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="dificultades_economicas_{{ $key }}" name="dificultades_economicas" value="{{ $key }}" {{ old('dificultades_economicas', $usuary->dificultades_economicas) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="dificultades_economicas_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dificultades_economicas'))
                    <span class="text-danger">{{ $errors->first('dificultades_economicas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.dificultades_economicas_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dificultad_economica_si">{{ trans('cruds.usuary.fields.dificultad_economica_si') }}</label>
                <input class="form-control {{ $errors->has('dificultad_economica_si') ? 'is-invalid' : '' }}" type="text" name="dificultad_economica_si" id="dificultad_economica_si" value="{{ old('dificultad_economica_si', $usuary->dificultad_economica_si) }}">
                @if($errors->has('dificultad_economica_si'))
                    <span class="text-danger">{{ $errors->first('dificultad_economica_si') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.dificultad_economica_si_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.diagnostico_salud_mental') }}</label>
                @foreach(App\Models\Usuary::DIAGNOSTICO_SALUD_MENTAL_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('diagnostico_salud_mental') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="diagnostico_salud_mental_{{ $key }}" name="diagnostico_salud_mental" value="{{ $key }}" {{ old('diagnostico_salud_mental', $usuary->diagnostico_salud_mental) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="diagnostico_salud_mental_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('diagnostico_salud_mental'))
                    <span class="text-danger">{{ $errors->first('diagnostico_salud_mental') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.diagnostico_salud_mental_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_diagnostico_salud">{{ trans('cruds.usuary.fields.otros_diagnostico_salud') }}</label>
                <input class="form-control {{ $errors->has('otros_diagnostico_salud') ? 'is-invalid' : '' }}" type="text" name="otros_diagnostico_salud" id="otros_diagnostico_salud" value="{{ old('otros_diagnostico_salud', $usuary->otros_diagnostico_salud) }}">
                @if($errors->has('otros_diagnostico_salud'))
                    <span class="text-danger">{{ $errors->first('otros_diagnostico_salud') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_diagnostico_salud_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.toma_psicofarmacos') }}</label>
                @foreach(App\Models\Usuary::TOMA_PSICOFARMACOS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('toma_psicofarmacos') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="toma_psicofarmacos_{{ $key }}" name="toma_psicofarmacos" value="{{ $key }}" {{ old('toma_psicofarmacos', $usuary->toma_psicofarmacos) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="toma_psicofarmacos_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('toma_psicofarmacos'))
                    <span class="text-danger">{{ $errors->first('toma_psicofarmacos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.toma_psicofarmacos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_toma_psicofarmacos">{{ trans('cruds.usuary.fields.otros_toma_psicofarmacos') }}</label>
                <input class="form-control {{ $errors->has('otros_toma_psicofarmacos') ? 'is-invalid' : '' }}" type="text" name="otros_toma_psicofarmacos" id="otros_toma_psicofarmacos" value="{{ old('otros_toma_psicofarmacos', $usuary->otros_toma_psicofarmacos) }}">
                @if($errors->has('otros_toma_psicofarmacos'))
                    <span class="text-danger">{{ $errors->first('otros_toma_psicofarmacos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_toma_psicofarmacos_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.discapacidad') }}</label>
                @foreach(App\Models\Usuary::DISCAPACIDAD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('discapacidad') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="discapacidad_{{ $key }}" name="discapacidad" value="{{ $key }}" {{ old('discapacidad', $usuary->discapacidad) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="discapacidad_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('discapacidad'))
                    <span class="text-danger">{{ $errors->first('discapacidad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.discapacidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_discapacidad">{{ trans('cruds.usuary.fields.otros_discapacidad') }}</label>
                <input class="form-control {{ $errors->has('otros_discapacidad') ? 'is-invalid' : '' }}" type="text" name="otros_discapacidad" id="otros_discapacidad" value="{{ old('otros_discapacidad', $usuary->otros_discapacidad) }}">
                @if($errors->has('otros_discapacidad'))
                    <span class="text-danger">{{ $errors->first('otros_discapacidad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_discapacidad_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.problemas_salud_fisica') }}</label>
                @foreach(App\Models\Usuary::PROBLEMAS_SALUD_FISICA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('problemas_salud_fisica') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="problemas_salud_fisica_{{ $key }}" name="problemas_salud_fisica" value="{{ $key }}" {{ old('problemas_salud_fisica', $usuary->problemas_salud_fisica) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="problemas_salud_fisica_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('problemas_salud_fisica'))
                    <span class="text-danger">{{ $errors->first('problemas_salud_fisica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.problemas_salud_fisica_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_problemas_salud_fisica">{{ trans('cruds.usuary.fields.otros_problemas_salud_fisica') }}</label>
                <input class="form-control {{ $errors->has('otros_problemas_salud_fisica') ? 'is-invalid' : '' }}" type="text" name="otros_problemas_salud_fisica" id="otros_problemas_salud_fisica" value="{{ old('otros_problemas_salud_fisica', $usuary->otros_problemas_salud_fisica) }}">
                @if($errors->has('otros_problemas_salud_fisica'))
                    <span class="text-danger">{{ $errors->first('otros_problemas_salud_fisica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_problemas_salud_fisica_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.relacion_covid_19') }}</label>
                @foreach(App\Models\Usuary::RELACION_COVID_19_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('relacion_covid_19') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="relacion_covid_19_{{ $key }}" name="relacion_covid_19" value="{{ $key }}" {{ old('relacion_covid_19', $usuary->relacion_covid_19) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="relacion_covid_19_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('relacion_covid_19'))
                    <span class="text-danger">{{ $errors->first('relacion_covid_19') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.relacion_covid_19_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_relacion_covid_19">{{ trans('cruds.usuary.fields.otros_relacion_covid_19') }}</label>
                <input class="form-control {{ $errors->has('otros_relacion_covid_19') ? 'is-invalid' : '' }}" type="text" name="otros_relacion_covid_19" id="otros_relacion_covid_19" value="{{ old('otros_relacion_covid_19', $usuary->otros_relacion_covid_19) }}">
                @if($errors->has('otros_relacion_covid_19'))
                    <span class="text-danger">{{ $errors->first('otros_relacion_covid_19') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_relacion_covid_19_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.estado_civil') }}</label>
                <select class="form-control {{ $errors->has('estado_civil') ? 'is-invalid' : '' }}" name="estado_civil" id="estado_civil">
                    <option value disabled {{ old('estado_civil', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::ESTADO_CIVIL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado_civil', $usuary->estado_civil) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado_civil'))
                    <span class="text-danger">{{ $errors->first('estado_civil') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.estado_civil_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_estado_civil">{{ trans('cruds.usuary.fields.otros_estado_civil') }}</label>
                <input class="form-control {{ $errors->has('otros_estado_civil') ? 'is-invalid' : '' }}" type="text" name="otros_estado_civil" id="otros_estado_civil" value="{{ old('otros_estado_civil', $usuary->otros_estado_civil) }}">
                @if($errors->has('otros_estado_civil'))
                    <span class="text-danger">{{ $errors->first('otros_estado_civil') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_estado_civil_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.convive_con') }}</label>
                <select class="form-control {{ $errors->has('convive_con') ? 'is-invalid' : '' }}" name="convive_con" id="convive_con">
                    <option value disabled {{ old('convive_con', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::CONVIVE_CON_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('convive_con', $usuary->convive_con) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('convive_con'))
                    <span class="text-danger">{{ $errors->first('convive_con') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.convive_con_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.vinculacion_con_otros_recursos') }}</label>
                @foreach(App\Models\Usuary::VINCULACION_CON_OTROS_RECURSOS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('vinculacion_con_otros_recursos') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="vinculacion_con_otros_recursos_{{ $key }}" name="vinculacion_con_otros_recursos" value="{{ $key }}" {{ old('vinculacion_con_otros_recursos', $usuary->vinculacion_con_otros_recursos) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="vinculacion_con_otros_recursos_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('vinculacion_con_otros_recursos'))
                    <span class="text-danger">{{ $errors->first('vinculacion_con_otros_recursos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.vinculacion_con_otros_recursos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="si_vinculacion_con_otros_recursos">{{ trans('cruds.usuary.fields.si_vinculacion_con_otros_recursos') }}</label>
                <input class="form-control {{ $errors->has('si_vinculacion_con_otros_recursos') ? 'is-invalid' : '' }}" type="text" name="si_vinculacion_con_otros_recursos" id="si_vinculacion_con_otros_recursos" value="{{ old('si_vinculacion_con_otros_recursos', $usuary->si_vinculacion_con_otros_recursos) }}">
                @if($errors->has('si_vinculacion_con_otros_recursos'))
                    <span class="text-danger">{{ $errors->first('si_vinculacion_con_otros_recursos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.si_vinculacion_con_otros_recursos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.usuary.fields.observaciones') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" name="observaciones" id="observaciones">{!! old('observaciones', $usuary->observaciones) !!}</textarea>
                @if($errors->has('observaciones'))
                    <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.en_situacion_de_desahucio') }}</label>
                @foreach(App\Models\Usuary::EN_SITUACION_DE_DESAHUCIO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('en_situacion_de_desahucio') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="en_situacion_de_desahucio_{{ $key }}" name="en_situacion_de_desahucio" value="{{ $key }}" {{ old('en_situacion_de_desahucio', $usuary->en_situacion_de_desahucio) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="en_situacion_de_desahucio_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('en_situacion_de_desahucio'))
                    <span class="text-danger">{{ $errors->first('en_situacion_de_desahucio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.en_situacion_de_desahucio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_de_lanzamiento">{{ trans('cruds.usuary.fields.fecha_de_lanzamiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_de_lanzamiento') ? 'is-invalid' : '' }}" type="text" name="fecha_de_lanzamiento" id="fecha_de_lanzamiento" value="{{ old('fecha_de_lanzamiento', $usuary->fecha_de_lanzamiento) }}">
                @if($errors->has('fecha_de_lanzamiento'))
                    <span class="text-danger">{{ $errors->first('fecha_de_lanzamiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.fecha_de_lanzamiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.tipo_de_domicilio') }}</label>
                <select class="form-control {{ $errors->has('tipo_de_domicilio') ? 'is-invalid' : '' }}" name="tipo_de_domicilio" id="tipo_de_domicilio">
                    <option value disabled {{ old('tipo_de_domicilio', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::TIPO_DE_DOMICILIO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_de_domicilio', $usuary->tipo_de_domicilio) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_de_domicilio'))
                    <span class="text-danger">{{ $errors->first('tipo_de_domicilio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.tipo_de_domicilio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otro_tipo_de_domicilio">{{ trans('cruds.usuary.fields.otro_tipo_de_domicilio') }}</label>
                <input class="form-control {{ $errors->has('otro_tipo_de_domicilio') ? 'is-invalid' : '' }}" type="text" name="otro_tipo_de_domicilio" id="otro_tipo_de_domicilio" value="{{ old('otro_tipo_de_domicilio', $usuary->otro_tipo_de_domicilio) }}">
                @if($errors->has('otro_tipo_de_domicilio'))
                    <span class="text-danger">{{ $errors->first('otro_tipo_de_domicilio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otro_tipo_de_domicilio_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_nivel') }}</label>
                <select class="form-control {{ $errors->has('riesgo_conducta_suicida_nivel') ? 'is-invalid' : '' }}" name="riesgo_conducta_suicida_nivel" id="riesgo_conducta_suicida_nivel">
                    <option value disabled {{ old('riesgo_conducta_suicida_nivel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::RIESGO_CONDUCTA_SUICIDA_NIVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('riesgo_conducta_suicida_nivel', $usuary->riesgo_conducta_suicida_nivel) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('riesgo_conducta_suicida_nivel'))
                    <span class="text-danger">{{ $errors->first('riesgo_conducta_suicida_nivel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_nivel_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_intentos_previos') }}</label>
                @foreach(App\Models\Usuary::RIESGO_CONDUCTA_SUICIDA_INTENTOS_PREVIOS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('riesgo_conducta_suicida_intentos_previos') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="riesgo_conducta_suicida_intentos_previos_{{ $key }}" name="riesgo_conducta_suicida_intentos_previos" value="{{ $key }}" {{ old('riesgo_conducta_suicida_intentos_previos', $usuary->riesgo_conducta_suicida_intentos_previos) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="riesgo_conducta_suicida_intentos_previos_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('riesgo_conducta_suicida_intentos_previos'))
                    <span class="text-danger">{{ $errors->first('riesgo_conducta_suicida_intentos_previos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_intentos_previos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="riesgo_conducta_suicida_ultima_fecha">{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_ultima_fecha') }}</label>
                <input class="form-control date {{ $errors->has('riesgo_conducta_suicida_ultima_fecha') ? 'is-invalid' : '' }}" type="text" name="riesgo_conducta_suicida_ultima_fecha" id="riesgo_conducta_suicida_ultima_fecha" value="{{ old('riesgo_conducta_suicida_ultima_fecha', $usuary->riesgo_conducta_suicida_ultima_fecha) }}">
                @if($errors->has('riesgo_conducta_suicida_ultima_fecha'))
                    <span class="text-danger">{{ $errors->first('riesgo_conducta_suicida_ultima_fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_ultima_fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_planificacion') }}</label>
                @foreach(App\Models\Usuary::RIESGO_CONDUCTA_SUICIDA_PLANIFICACION_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('riesgo_conducta_suicida_planificacion') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="riesgo_conducta_suicida_planificacion_{{ $key }}" name="riesgo_conducta_suicida_planificacion" value="{{ $key }}" {{ old('riesgo_conducta_suicida_planificacion', $usuary->riesgo_conducta_suicida_planificacion) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="riesgo_conducta_suicida_planificacion_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('riesgo_conducta_suicida_planificacion'))
                    <span class="text-danger">{{ $errors->first('riesgo_conducta_suicida_planificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.riesgo_conducta_suicida_planificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="si_planificacion">{{ trans('cruds.usuary.fields.si_planificacion') }}</label>
                <input class="form-control {{ $errors->has('si_planificacion') ? 'is-invalid' : '' }}" type="text" name="si_planificacion" id="si_planificacion" value="{{ old('si_planificacion', $usuary->si_planificacion) }}">
                @if($errors->has('si_planificacion'))
                    <span class="text-danger">{{ $errors->first('si_planificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.si_planificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.tipo_violencia_sufrida') }}</label>
                <select class="form-control {{ $errors->has('tipo_violencia_sufrida') ? 'is-invalid' : '' }}" name="tipo_violencia_sufrida" id="tipo_violencia_sufrida">
                    <option value disabled {{ old('tipo_violencia_sufrida', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::TIPO_VIOLENCIA_SUFRIDA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_violencia_sufrida', $usuary->tipo_violencia_sufrida) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_violencia_sufrida'))
                    <span class="text-danger">{{ $errors->first('tipo_violencia_sufrida') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.tipo_violencia_sufrida_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.convive_con_el_agresor') }}</label>
                @foreach(App\Models\Usuary::CONVIVE_CON_EL_AGRESOR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('convive_con_el_agresor') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="convive_con_el_agresor_{{ $key }}" name="convive_con_el_agresor" value="{{ $key }}" {{ old('convive_con_el_agresor', $usuary->convive_con_el_agresor) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="convive_con_el_agresor_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('convive_con_el_agresor'))
                    <span class="text-danger">{{ $errors->first('convive_con_el_agresor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.convive_con_el_agresor_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.recibe_o_ha_recibido_atencion_psicosocial') }}</label>
                @foreach(App\Models\Usuary::RECIBE_O_HA_RECIBIDO_ATENCION_PSICOSOCIAL_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('recibe_o_ha_recibido_atencion_psicosocial') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="recibe_o_ha_recibido_atencion_psicosocial_{{ $key }}" name="recibe_o_ha_recibido_atencion_psicosocial" value="{{ $key }}" {{ old('recibe_o_ha_recibido_atencion_psicosocial', $usuary->recibe_o_ha_recibido_atencion_psicosocial) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="recibe_o_ha_recibido_atencion_psicosocial_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('recibe_o_ha_recibido_atencion_psicosocial'))
                    <span class="text-danger">{{ $errors->first('recibe_o_ha_recibido_atencion_psicosocial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.recibe_o_ha_recibido_atencion_psicosocial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="si_recibe_o_ha_recibido_atencion_psicosocial">{{ trans('cruds.usuary.fields.si_recibe_o_ha_recibido_atencion_psicosocial') }}</label>
                <input class="form-control {{ $errors->has('si_recibe_o_ha_recibido_atencion_psicosocial') ? 'is-invalid' : '' }}" type="text" name="si_recibe_o_ha_recibido_atencion_psicosocial" id="si_recibe_o_ha_recibido_atencion_psicosocial" value="{{ old('si_recibe_o_ha_recibido_atencion_psicosocial', $usuary->si_recibe_o_ha_recibido_atencion_psicosocial) }}">
                @if($errors->has('si_recibe_o_ha_recibido_atencion_psicosocial'))
                    <span class="text-danger">{{ $errors->first('si_recibe_o_ha_recibido_atencion_psicosocial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.si_recibe_o_ha_recibido_atencion_psicosocial_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.otros_tipos_de_violencia') }}</label>
                @foreach(App\Models\Usuary::OTROS_TIPOS_DE_VIOLENCIA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('otros_tipos_de_violencia') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="otros_tipos_de_violencia_{{ $key }}" name="otros_tipos_de_violencia" value="{{ $key }}" {{ old('otros_tipos_de_violencia', $usuary->otros_tipos_de_violencia) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="otros_tipos_de_violencia_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('otros_tipos_de_violencia'))
                    <span class="text-danger">{{ $errors->first('otros_tipos_de_violencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_tipos_de_violencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="si_otros_tipos_de_violencia">{{ trans('cruds.usuary.fields.si_otros_tipos_de_violencia') }}</label>
                <input class="form-control {{ $errors->has('si_otros_tipos_de_violencia') ? 'is-invalid' : '' }}" type="text" name="si_otros_tipos_de_violencia" id="si_otros_tipos_de_violencia" value="{{ old('si_otros_tipos_de_violencia', $usuary->si_otros_tipos_de_violencia) }}">
                @if($errors->has('si_otros_tipos_de_violencia'))
                    <span class="text-danger">{{ $errors->first('si_otros_tipos_de_violencia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.si_otros_tipos_de_violencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="motivo_de_alta">{{ trans('cruds.usuary.fields.motivo_de_alta') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('motivo_de_alta') ? 'is-invalid' : '' }}" name="motivo_de_alta" id="motivo_de_alta">{!! old('motivo_de_alta', $usuary->motivo_de_alta) !!}</textarea>
                @if($errors->has('motivo_de_alta'))
                    <span class="text-danger">{{ $errors->first('motivo_de_alta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.motivo_de_alta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_alta">{{ trans('cruds.usuary.fields.fecha_alta') }}</label>
                <input class="form-control date {{ $errors->has('fecha_alta') ? 'is-invalid' : '' }}" type="text" name="fecha_alta" id="fecha_alta" value="{{ old('fecha_alta', $usuary->fecha_alta) }}">
                @if($errors->has('fecha_alta'))
                    <span class="text-danger">{{ $errors->first('fecha_alta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.fecha_alta_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.usuary.fields.derivacion_a') }}</label>
                <select class="form-control {{ $errors->has('derivacion_a') ? 'is-invalid' : '' }}" name="derivacion_a" id="derivacion_a">
                    <option value disabled {{ old('derivacion_a', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Usuary::DERIVACION_A_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('derivacion_a', $usuary->derivacion_a) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('derivacion_a'))
                    <span class="text-danger">{{ $errors->first('derivacion_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.derivacion_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_derivacion_a">{{ trans('cruds.usuary.fields.otros_derivacion_a') }}</label>
                <input class="form-control {{ $errors->has('otros_derivacion_a') ? 'is-invalid' : '' }}" type="text" name="otros_derivacion_a" id="otros_derivacion_a" value="{{ old('otros_derivacion_a', $usuary->otros_derivacion_a) }}">
                @if($errors->has('otros_derivacion_a'))
                    <span class="text-danger">{{ $errors->first('otros_derivacion_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.otros_derivacion_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documentacion_anexa">{{ trans('cruds.usuary.fields.documentacion_anexa') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documentacion_anexa') ? 'is-invalid' : '' }}" id="documentacion_anexa-dropzone">
                </div>
                @if($errors->has('documentacion_anexa'))
                    <span class="text-danger">{{ $errors->first('documentacion_anexa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usuary.fields.documentacion_anexa_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.usuaries.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $usuary->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedDocumentacionAnexaMap = {}
Dropzone.options.documentacionAnexaDropzone = {
    url: '{{ route('admin.usuaries.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documentacion_anexa[]" value="' + response.name + '">')
      uploadedDocumentacionAnexaMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentacionAnexaMap[file.name]
      }
      $('form').find('input[name="documentacion_anexa[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($usuary) && $usuary->documentacion_anexa)
          var files =
            {!! json_encode($usuary->documentacion_anexa) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documentacion_anexa[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection
