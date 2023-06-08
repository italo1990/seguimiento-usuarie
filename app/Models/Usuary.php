<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Usuary extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'usuaries';

    protected $appends = [
        'documentacion_anexa',
    ];

    public const DISCAPACIDAD_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const PERMISO_TRABAJO_SELECT = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const RELACION_COVID_19_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const PERMISO_RESIDENCIA_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const TOMA_PSICOFARMACOS_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const PROBLEMAS_SALUD_FISICA_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const CONVIVE_CON_EL_AGRESOR_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const DIFICULTADES_ECONOMICAS_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const DIAGNOSTICO_SALUD_MENTAL_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const OTROS_TIPOS_DE_VIOLENCIA_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const EN_SITUACION_DE_DESAHUCIO_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const VINCULACION_CON_OTROS_RECURSOS_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const RIESGO_CONDUCTA_SUICIDA_PLANIFICACION_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const RIESGO_CONDUCTA_SUICIDA_INTENTOS_PREVIOS_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const RECIBE_O_HA_RECIBIDO_ATENCION_PSICOSOCIAL_RADIO = [
        'si' => 'Sí',
        'no' => 'No',
    ];

    public const GENERO_RADIO = [
        'mujer'  => 'Mujer',
        'hombre' => 'Hombre',
        'trans'  => 'Trans',
        'otro'  => 'No conocido',
    ];

    public const ES_DE_LA_FUENSANTA_RADIO = [
        'si'                   => 'Sí',
        'trabaja_en_el_barrio' => 'Trabaja en el barrio',
    ];

    public const RIESGO_CONDUCTA_SUICIDA_NIVEL_SELECT = [
        'alto'  => 'Alto',
        'medio' => 'Medio',
        'bajo'  => 'Bajo',
    ];

    public const PROVINCIA_RESIDENCIA_SELECT = [
        'valencia'  => 'Valencia',
        'castellon' => 'Castellón',
        'alicante'  => 'Alicante',
    ];

    public const TIPO_VIOLENCIA_SUFRIDA_SELECT = [
        'fisica'      => 'Física',
        'psicologica' => 'Psicológica',
        'sexual'      => 'Sexual',
        'economica'   => 'Económica',
    ];

    protected $dates = [
        'fecha_nacimiento',
        'fecha_registro',
        'fecha_de_lanzamiento',
        'riesgo_conducta_suicida_ultima_fecha',
        'fecha_alta',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const DOCUMENTACION_RADIO = [
        'dni'          => 'DNI',
        'nie'          => 'NIE',
        'pasaporte'    => 'Pasaporte',
        'tarjeta_roja' => 'Tarjeta Roja',
        'no_tiene'     => 'No tiene',
        'no_conocemos' => 'No conocemos',
    ];

    public const DERIVACION_A_SELECT = [
        'servicios_sociales' => 'Servicios sociales',
        'centro_de_salud'    => 'Centro de salud',
        'entitat_publica'    => 'Entidad pública',
        'centro_educativo'   => 'Centro educativo',
        'ongs'               => 'Ongs',
    ];

    public const DERIVACION_REALIZADA_POR_SELECT = [
        'servicios_sociales' => 'Servicios sociales',
        'centro_de_salud'    => 'Centro de salud',
        'entidad_publica'    => 'Entidad pública',
        'centro_educativo'   => 'Centro educativo',
        'ongs'               => 'Ongs',
        'no_conocido'        => 'No conocido',
    ];

    public const CONVIVE_CON_SELECT = [
        'sola_o'              => 'Sola/o',
        'pareja'              => 'Pareja',
        'madre_padre'         => 'Madre/Padre',
        'companyerxs_de_piso' => 'Compañerxs de piso',
        'familiares'          => 'Familiares',
        'hijes'               => 'Hijes',
        'empleadora'          => 'Empleadora',
    ];

    public const SITUACION_LABORAL_RADIO = [
        'trabajador_cuenta_propia' => 'Trabajador por cuenta propia',
        'trabajador_cuenta_ajena'  => 'Trabajador por cuenta ajena',
        'desempleado'              => 'Desempleado',
        'jubilado'                 => 'Jubilado',
        'estudiante'               => 'Estudiante',
    ];

    public const ESTADO_CIVIL_SELECT = [
        'solterx'         => 'Solterx',
        'casadx'          => 'Casadx',
        'divorciadx'      => 'Divorciadx',
        'viudx'           => 'Viudx',
        'separadx'        => 'Separadx',
        'pareja_de_hecho' => 'Pareja de hecho',
        'amigues'         => 'Amigues',
        'otro'            => 'Otro',
    ];

    /*public const AREA_ASIGNADA_SELECT = [
        'apoyo_en_crisis' => 'Apoyo en Crisis',
        'feminismos'      => 'Feminismos',
        'sapec'           => 'Sapec',
        'migraciones'     => 'Migraciones',
        'comunitaria'     => 'Comunitaria',
        'respira_y_calma' => 'Respira y Calma',
        'trabajo_social'  => 'Trabajo social',
        'cooperacion'     => 'Cooperación',
    ];*/

    public const COMO_NOS_CONOCIO_SELECT = [
        'servicios_sociales'     => 'Servicios sociales',
        'centro_de_salud'        => 'Centro de salud',
        'entidad_publica'        => 'Entidad pública',
        'centro_educativo'       => 'Centro educativo',
        'ongs'                   => 'Ongs',
        'web_o_redes_sociales'   => 'Web o redes sociales',
        'boca_a_boca'            => 'Boca a boca',
        'medios_de_comunicacion' => 'Medios de comunicación',
        'no_conocido' => 'No conocido',
    ];

    public const PRESTACIONES_SELECT = [
        'renta_valenciana_inclusion'    => 'Renta Valenciana Inclusión',
        'ingreso_minimo_vital'          => 'Ingreso mínimo vital',
        'pensiones_no_contributivas'    => 'Pensiones NO contributivas',
        'pensiones_contributivas'       => 'Pensiones contributivas',
        'ayuda_a_la_vivienda'           => 'Ayuda a la vivienda',
        'ayuda_a_personas_dependientes' => 'Ayuda a personas dependientes',
        'ayuda_por_violencia_de_genero' => 'Ayuda por violencia de género',
        'no_se_sabe'                    => 'No se sabe',
    ];

    public const TIPO_DE_DOMICILIO_SELECT = [
        'vivienda_propia_pagada'         => 'Vivienda propia pagada',
        'vivienda_propia_hipoteca'       => 'Vivienda propia hipoteca',
        'vivienda_alquilada_completa'    => 'Vivienda alquilada completa',
        'habitacion_alquilada'           => 'Habitación alquilada',
        'vivienda_en_usufructo'          => 'Vivienda en usufructo',
        'vivienda_cedida_en_uso'         => 'Vivienda cedida en uso',
        'centro_de_acogida_temporal'     => 'Centro de acogida temporal',
        'centro_de_atencion_residencial' => 'Centro de atención residencial',
        'ocupacion_de_vivienda'          => 'Ocupación de vivienda',
        'sin_domicilio'                  => 'Sin domicio (situación de calle)',
        'otro'                           => 'Otro',
    ];

    public const LUGAR_RESIDENCIA_SELECT = [
        'andalucia'            => 'Andalucía',
        'aragon'               => 'Aragón',
        'asturias'             => 'Asturias',
        'baleares'             => 'Baleares',
        'canarias'             => 'Canarias',
        'cantabria'            => 'Cantabria',
        'castilla_la_mancha'   => 'Castilla La Mancha',
        'castilla_y_leon'      => 'Castilla y León',
        'catalunya'            => 'Cataluña',
        'comunidad_valenciana' => 'Comunidad Valenciana',
        'extremadura'          => 'Extremadura',
        'galicia'              => 'Galicia',
        'la_rioja'             => 'La Rioja',
        'madrid'               => 'Madrid',
        'murcia'               => 'Murcia',
        'navarra'              => 'Navarra',
        'pais_vasco'           => 'País Vasco',
        'ceuta'                => 'Ceuta',
        'melilla'              => 'Melilla',
        'fuera_de_espana'      => 'Fuera de España',
    ];

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'documentacion',
        'otro_documentacion',
        'fecha_nacimiento',
        'genero',
        'otro_genero',
        'lugar_residencia',
        'motivo_consulta',
        'fecha_registro',
        'nacionalidad',
        'direccion_domicilio',
        'provincia_residencia',
        'es_de_la_fuensanta',
        'permiso_residencia',
        'permiso_trabajo',
        'como_nos_conocio',
        'otros_como_nos_conocio',
        'derivacion_realizada_por',
        'otros_derivacion_realizada_por',
        'situacion_laboral',
        'prestaciones',
        'dificultades_economicas',
        'diagnostico_salud_mental',
        'otros_diagnostico_salud',
        'toma_psicofarmacos',
        'otros_toma_psicofarmacos',
        'discapacidad',
        'otros_discapacidad',
        'problemas_salud_fisica',
        'otros_problemas_salud_fisica',
        'relacion_covid_19',
        'otros_relacion_covid_19',
        'estado_civil',
        'otros_estado_civil',
        'convive_con',
        'vinculacion_con_otros_recursos',
        'si_vinculacion_con_otros_recursos',
        'observaciones',
        'en_situacion_de_desahucio',
        'fecha_de_lanzamiento',
        'tipo_de_domicilio',
        'otro_tipo_de_domicilio',
        'riesgo_conducta_suicida_nivel',
        'riesgo_conducta_suicida_intentos_previos',
        'riesgo_conducta_suicida_ultima_fecha',
        'riesgo_conducta_suicida_planificacion',
        'si_planificacion',
        'tipo_violencia_sufrida',
        'convive_con_el_agresor',
        'recibe_o_ha_recibido_atencion_psicosocial',
        'si_recibe_o_ha_recibido_atencion_psicosocial',
        'otros_tipos_de_violencia',
        'si_otros_tipos_de_violencia',
        'motivo_de_alta',
        'fecha_alta',
        'derivacion_a',
        'otros_derivacion_a',
        'dificultad_economica_si',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function usuarieFichasDeSeguimientos()
    {
        return $this->hasMany(FichasDeSeguimiento::class, 'usuarie_id', 'id');
    }

    public function getFechaNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaNacimientoAttribute($value)
    {
        $this->attributes['fecha_nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function area_asignadas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function psicologa_asignadas()
    {
        return $this->belongsToMany(User::class);
    }

    public function getFechaRegistroAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaRegistroAttribute($value)
    {
        $this->attributes['fecha_registro'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeLanzamientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeLanzamientoAttribute($value)
    {
        $this->attributes['fecha_de_lanzamiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRiesgoConductaSuicidaUltimaFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRiesgoConductaSuicidaUltimaFechaAttribute($value)
    {
        $this->attributes['riesgo_conducta_suicida_ultima_fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaAltaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAltaAttribute($value)
    {
        $this->attributes['fecha_alta'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDocumentacionAnexaAttribute()
    {
        return $this->getMedia('documentacion_anexa');
    }

    public function getPrestacionesAttribute($value)
    {
        return $this->attributes['PRESTACIONES_SELECT'] = json_decode($value);
    }
}
