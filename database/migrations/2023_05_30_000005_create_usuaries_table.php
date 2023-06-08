<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariesTable extends Migration
{
    public function up()
    {
        Schema::create('usuaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('email')->nullable();
            $table->string('documentacion')->nullable();
            $table->string('otro_documentacion')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('otro_genero')->nullable();
            $table->string('lugar_residencia');
            $table->longText('motivo_consulta')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('direccion_domicilio')->nullable();
            $table->string('provincia_residencia')->nullable();
            $table->string('es_de_la_fuensanta')->nullable();
            $table->string('permiso_residencia')->nullable();
            $table->string('permiso_trabajo')->nullable();
            $table->string('como_nos_conocio')->nullable();
            $table->string('otros_como_nos_conocio')->nullable();
            $table->string('derivacion_realizada_por')->nullable();
            $table->string('otros_derivacion_realizada_por')->nullable();
            $table->string('situacion_laboral')->nullable();
            $table->string('prestaciones')->nullable();
            $table->string('dificultades_economicas')->nullable();
            $table->string('dificultad_economica_si')->nullable();
            $table->string('diagnostico_salud_mental')->nullable();
            $table->string('otros_diagnostico_salud')->nullable();
            $table->string('toma_psicofarmacos')->nullable();
            $table->string('otros_toma_psicofarmacos')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('otros_discapacidad')->nullable();
            $table->string('problemas_salud_fisica')->nullable();
            $table->string('otros_problemas_salud_fisica')->nullable();
            $table->string('relacion_covid_19')->nullable();
            $table->string('otros_relacion_covid_19')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('otros_estado_civil')->nullable();
            $table->string('convive_con')->nullable();
            $table->string('vinculacion_con_otros_recursos')->nullable();
            $table->string('si_vinculacion_con_otros_recursos')->nullable();
            $table->longText('observaciones')->nullable();
            $table->string('en_situacion_de_desahucio')->nullable();
            $table->date('fecha_de_lanzamiento')->nullable();
            $table->string('tipo_de_domicilio')->nullable();
            $table->string('otro_tipo_de_domicilio')->nullable();
            $table->string('riesgo_conducta_suicida_nivel')->nullable();
            $table->string('riesgo_conducta_suicida_intentos_previos')->nullable();
            $table->date('riesgo_conducta_suicida_ultima_fecha')->nullable();
            $table->string('riesgo_conducta_suicida_planificacion')->nullable();
            $table->string('si_planificacion')->nullable();
            $table->string('tipo_violencia_sufrida')->nullable();
            $table->string('convive_con_el_agresor')->nullable();
            $table->string('recibe_o_ha_recibido_atencion_psicosocial')->nullable();
            $table->string('si_recibe_o_ha_recibido_atencion_psicosocial')->nullable();
            $table->string('otros_tipos_de_violencia')->nullable();
            $table->string('si_otros_tipos_de_violencia')->nullable();
            $table->longText('motivo_de_alta')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->string('derivacion_a')->nullable();
            $table->string('otros_derivacion_a')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
