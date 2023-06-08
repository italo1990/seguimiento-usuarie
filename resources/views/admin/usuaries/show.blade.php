@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.usuary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.usuaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.id') }}
                        </th>
                        <td>
                            {{ $usuary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.nombre') }}
                        </th>
                        <td>
                            {{ $usuary->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.apellidos') }}
                        </th>
                        <td>
                            {{ $usuary->apellidos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.telefono') }}
                        </th>
                        <td>
                            {{ $usuary->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.email') }}
                        </th>
                        <td>
                            {{ $usuary->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.documentacion') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::DOCUMENTACION_RADIO[$usuary->documentacion] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otro_documentacion') }}
                        </th>
                        <td>
                            {{ $usuary->otro_documentacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.fecha_nacimiento') }}
                        </th>
                        <td>
                            {{ $usuary->fecha_nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.genero') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::GENERO_RADIO[$usuary->genero] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otro_genero') }}
                        </th>
                        <td>
                            {{ $usuary->otro_genero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.lugar_residencia') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::LUGAR_RESIDENCIA_SELECT[$usuary->lugar_residencia] ?? '' }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.area_asignada') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::AREA_ASIGNADA_SELECT[$usuary->area_asignada] ?? '' }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.area_asignada') }}
                        </th>
                        <td>
                            {{-- @foreach($usuary->area_asignada as $key => $area_asignadas)
                                <span class="label label-info">{{ App\Models\Usuary::AREA_ASIGNADA_SELECT[$area_asignadas] ?? '' }}</span>
                            @endforeach --}}
                            @foreach($usuary->area_asignadas as $key => $area_asignada)
                                <span class="label label-info">{{ $area_asignada->nombre }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.psicologa_asignada') }}
                        </th>
                        <td>
                            @foreach($usuary->psicologa_asignadas as $key => $psicologa_asignada)
                                <span class="label label-info">{{ $psicologa_asignada->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.motivo_consulta') }}
                        </th>
                        <td>
                            {!! $usuary->motivo_consulta !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.fecha_registro') }}
                        </th>
                        <td>
                            {{ $usuary->fecha_registro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.nacionalidad') }}
                        </th>
                        <td>
                            {{ $usuary->nacionalidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.direccion_domicilio') }}
                        </th>
                        <td>
                            {{ $usuary->direccion_domicilio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.provincia_residencia') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::PROVINCIA_RESIDENCIA_SELECT[$usuary->provincia_residencia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.es_de_la_fuensanta') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::ES_DE_LA_FUENSANTA_RADIO[$usuary->es_de_la_fuensanta] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.permiso_residencia') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::PERMISO_RESIDENCIA_RADIO[$usuary->permiso_residencia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.permiso_trabajo') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::PERMISO_TRABAJO_SELECT[$usuary->permiso_trabajo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.como_nos_conocio') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::COMO_NOS_CONOCIO_SELECT[$usuary->como_nos_conocio] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_como_nos_conocio') }}
                        </th>
                        <td>
                            {{ $usuary->otros_como_nos_conocio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.derivacion_realizada_por') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::DERIVACION_REALIZADA_POR_SELECT[$usuary->derivacion_realizada_por] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_derivacion_realizada_por') }}
                        </th>
                        <td>
                            {{ $usuary->otros_derivacion_realizada_por }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.situacion_laboral') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::SITUACION_LABORAL_RADIO[$usuary->situacion_laboral] ?? '' }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.prestaciones') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::PRESTACIONES_SELECT[$usuary->prestaciones] ?? '' }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.prestaciones') }}
                        </th>
                        <td>
                            @if($usuary->prestaciones !== null)
                                @foreach($usuary->prestaciones as $key => $prestacion)
                                    <span class="label label-info">{{  App\Models\Usuary::PRESTACIONES_SELECT[$prestacion] ?? '' }}</span>
                                @endforeach
                            @else
                                <p>Sin prestaciones</p>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.dificultades_economicas') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::DIFICULTADES_ECONOMICAS_RADIO[$usuary->dificultades_economicas] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.dificultad_economica_si') }}
                        </th>
                        <td>
                            {{ $usuary->dificultad_economica_si }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.diagnostico_salud_mental') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::DIAGNOSTICO_SALUD_MENTAL_RADIO[$usuary->diagnostico_salud_mental] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_diagnostico_salud') }}
                        </th>
                        <td>
                            {{ $usuary->otros_diagnostico_salud }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.toma_psicofarmacos') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::TOMA_PSICOFARMACOS_RADIO[$usuary->toma_psicofarmacos] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_toma_psicofarmacos') }}
                        </th>
                        <td>
                            {{ $usuary->otros_toma_psicofarmacos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.discapacidad') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::DISCAPACIDAD_RADIO[$usuary->discapacidad] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_discapacidad') }}
                        </th>
                        <td>
                            {{ $usuary->otros_discapacidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.problemas_salud_fisica') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::PROBLEMAS_SALUD_FISICA_RADIO[$usuary->problemas_salud_fisica] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_problemas_salud_fisica') }}
                        </th>
                        <td>
                            {{ $usuary->otros_problemas_salud_fisica }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.relacion_covid_19') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::RELACION_COVID_19_RADIO[$usuary->relacion_covid_19] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_relacion_covid_19') }}
                        </th>
                        <td>
                            {{ $usuary->otros_relacion_covid_19 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.estado_civil') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::ESTADO_CIVIL_SELECT[$usuary->estado_civil] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_estado_civil') }}
                        </th>
                        <td>
                            {{ $usuary->otros_estado_civil }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.convive_con') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::CONVIVE_CON_SELECT[$usuary->convive_con] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.vinculacion_con_otros_recursos') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::VINCULACION_CON_OTROS_RECURSOS_RADIO[$usuary->vinculacion_con_otros_recursos] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.si_vinculacion_con_otros_recursos') }}
                        </th>
                        <td>
                            {{ $usuary->si_vinculacion_con_otros_recursos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.observaciones') }}
                        </th>
                        <td>
                            {!! $usuary->observaciones !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.en_situacion_de_desahucio') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::EN_SITUACION_DE_DESAHUCIO_RADIO[$usuary->en_situacion_de_desahucio] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.fecha_de_lanzamiento') }}
                        </th>
                        <td>
                            {{ $usuary->fecha_de_lanzamiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.tipo_de_domicilio') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::TIPO_DE_DOMICILIO_SELECT[$usuary->tipo_de_domicilio] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otro_tipo_de_domicilio') }}
                        </th>
                        <td>
                            {{ $usuary->otro_tipo_de_domicilio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.riesgo_conducta_suicida_nivel') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::RIESGO_CONDUCTA_SUICIDA_NIVEL_SELECT[$usuary->riesgo_conducta_suicida_nivel] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.riesgo_conducta_suicida_intentos_previos') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::RIESGO_CONDUCTA_SUICIDA_INTENTOS_PREVIOS_RADIO[$usuary->riesgo_conducta_suicida_intentos_previos] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.riesgo_conducta_suicida_ultima_fecha') }}
                        </th>
                        <td>
                            {{ $usuary->riesgo_conducta_suicida_ultima_fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.riesgo_conducta_suicida_planificacion') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::RIESGO_CONDUCTA_SUICIDA_PLANIFICACION_RADIO[$usuary->riesgo_conducta_suicida_planificacion] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.si_planificacion') }}
                        </th>
                        <td>
                            {{ $usuary->si_planificacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.tipo_violencia_sufrida') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::TIPO_VIOLENCIA_SUFRIDA_SELECT[$usuary->tipo_violencia_sufrida] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.convive_con_el_agresor') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::CONVIVE_CON_EL_AGRESOR_RADIO[$usuary->convive_con_el_agresor] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.recibe_o_ha_recibido_atencion_psicosocial') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::RECIBE_O_HA_RECIBIDO_ATENCION_PSICOSOCIAL_RADIO[$usuary->recibe_o_ha_recibido_atencion_psicosocial] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.si_recibe_o_ha_recibido_atencion_psicosocial') }}
                        </th>
                        <td>
                            {{ $usuary->si_recibe_o_ha_recibido_atencion_psicosocial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_tipos_de_violencia') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::OTROS_TIPOS_DE_VIOLENCIA_RADIO[$usuary->otros_tipos_de_violencia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.si_otros_tipos_de_violencia') }}
                        </th>
                        <td>
                            {{ $usuary->si_otros_tipos_de_violencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.motivo_de_alta') }}
                        </th>
                        <td>
                            {!! $usuary->motivo_de_alta !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.fecha_alta') }}
                        </th>
                        <td>
                            {{ $usuary->fecha_alta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.derivacion_a') }}
                        </th>
                        <td>
                            {{ App\Models\Usuary::DERIVACION_A_SELECT[$usuary->derivacion_a] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.otros_derivacion_a') }}
                        </th>
                        <td>
                            {{ $usuary->otros_derivacion_a }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usuary.fields.documentacion_anexa') }}
                        </th>
                        <td>
                            @foreach($usuary->documentacion_anexa as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.usuaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#usuarie_fichas_de_seguimientos" role="tab" data-toggle="tab">
                {{ trans('cruds.fichasDeSeguimiento.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="usuarie_fichas_de_seguimientos">
            @includeIf('admin.usuaries.relationships.usuarieFichasDeSeguimientos', ['fichasDeSeguimientos' => $usuary->usuarieFichasDeSeguimientos])
        </div>
    </div>
</div>

@endsection
