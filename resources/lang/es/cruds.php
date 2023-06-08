<?php

return [
    'userManagement' => [
        'title'          => 'Gestión de Usuarios',
        'title_singular' => 'Gestión de Usuarios',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'areas'                    => 'Areas',
            'areas_helper'             => ' ',
        ],
    ],
    'usuary' => [
        'title'          => 'Usuaries',
        'title_singular' => 'Usuarie',
        'fields'         => [
            'id'                                                  => 'ID',
            'id_helper'                                           => ' ',
            'nombre'                                              => 'Nombre',
            'nombre_helper'                                       => ' ',
            'apellidos'                                           => 'Apellidos',
            'apellidos_helper'                                    => ' ',
            'telefono'                                            => 'Teléfono',
            'telefono_helper'                                     => ' ',
            'email'                                               => 'Email',
            'email_helper'                                        => ' ',
            'documentacion'                                       => 'Documentacion',
            'documentacion_helper'                                => ' ',
            'fecha_nacimiento'                                    => 'Fecha nacimiento',
            'fecha_nacimiento_helper'                             => ' ',
            'genero'                                              => 'Género',
            'genero_helper'                                       => ' ',
            'lugar_residencia'                                    => 'Lugar de residencia',
            'lugar_residencia_helper'                             => ' ',
            'created_at'                                          => 'Created at',
            'created_at_helper'                                   => ' ',
            'updated_at'                                          => 'Updated at',
            'updated_at_helper'                                   => ' ',
            'deleted_at'                                          => 'Deleted at',
            'deleted_at_helper'                                   => ' ',
            'psicologa_asignada'                                  => 'Psicóloga Asignada',
            'psicologa_asignada_helper'                           => ' ',
            'otro_documentacion'                                  => 'Otra Documentación',
            'otro_documentacion_helper'                           => ' ',
            'otro_genero'                                         => 'Otro Género',
            'otro_genero_helper'                                  => ' ',
            'motivo_consulta'                                     => 'Motivo de la Consulta',
            'motivo_consulta_helper'                              => ' ',
            'fecha_registro'                                      => 'Fecha de registro',
            'fecha_registro_helper'                               => ' ',
            'nacionalidad'                                        => 'Nacionalidad',
            'nacionalidad_helper'                                 => ' ',
            'direccion_domicilio'                                 => 'Direccion domicilio',
            'direccion_domicilio_helper'                          => ' ',
            'provincia_residencia'                                => 'Provincia donde reside',
            'provincia_residencia_helper'                         => ' ',
            'es_de_la_fuensanta'                                  => '¿Es de La Fuensanta?',
            'es_de_la_fuensanta_helper'                           => ' ',
            'permiso_residencia'                                  => 'Permiso residencia',
            'permiso_residencia_helper'                           => ' ',
            'permiso_trabajo'                                     => 'Permiso de trabajo',
            'permiso_trabajo_helper'                              => ' ',
            'como_nos_conocio'                                    => '¿Cómo nos conoció?',
            'como_nos_conocio_helper'                             => ' ',
            'otros_como_nos_conocio'                              => 'Otros',
            'otros_como_nos_conocio_helper'                       => ' ',
            'derivacion_realizada_por'                            => 'Derivacion realizada por',
            'derivacion_realizada_por_helper'                     => ' ',
            'otros_derivacion_realizada_por'                      => 'Otros',
            'otros_derivacion_realizada_por_helper'               => ' ',
            'situacion_laboral'                                   => 'Situación laboral',
            'situacion_laboral_helper'                            => ' ',
            'prestaciones'                                        => 'Prestaciones',
            'prestaciones_helper'                                 => ' ',
            'dificultades_economicas'                             => '¿Presenta dificultades economicas para satisfacer necesidades básicas?',
            'dificultades_economicas_helper'                      => '(Comida, luz, agua, ...)',
            'diagnostico_salud_mental'                            => 'Diagnóstico salud mental previo',
            'diagnostico_salud_mental_helper'                     => ' ',
            'otros_diagnostico_salud'                             => 'Sí diagnósticos',
            'otros_diagnostico_salud_helper'                      => ' ',
            'toma_psicofarmacos'                                  => 'Toma Psicofármacos',
            'toma_psicofarmacos_helper'                           => ' ',
            'otros_toma_psicofarmacos'                            => 'Sí psicofármacos',
            'otros_toma_psicofarmacos_helper'                     => ' ',
            'discapacidad'                                        => 'Discapacidad %',
            'discapacidad_helper'                                 => ' ',
            'otros_discapacidad'                                  => 'Sí discapacidades',
            'otros_discapacidad_helper'                           => ' ',
            'problemas_salud_fisica'                              => 'Problemas salud física',
            'problemas_salud_fisica_helper'                       => ' ',
            'otros_problemas_salud_fisica'                        => 'Sí problemas salud física',
            'otros_problemas_salud_fisica_helper'                 => ' ',
            'relacion_covid_19'                                   => 'Relación Covid-19',
            'relacion_covid_19_helper'                            => ' ',
            'otros_relacion_covid_19'                             => 'Sí relación Covid-19',
            'otros_relacion_covid_19_helper'                      => ' ',
            'estado_civil'                                        => 'Estado Civil',
            'estado_civil_helper'                                 => ' ',
            'otros_estado_civil'                                  => 'Otro Estado Civil',
            'otros_estado_civil_helper'                           => ' ',
            'convive_con'                                         => 'Convive con',
            'convive_con_helper'                                  => ' ',
            'vinculacion_con_otros_recursos'                      => 'Vinculación con otros recursos',
            'vinculacion_con_otros_recursos_helper'               => ' ',
            'observaciones'                                       => 'Observaciones',
            'observaciones_helper'                                => ' ',
            'en_situacion_de_desahucio'                           => 'En situación de desahucio',
            'en_situacion_de_desahucio_helper'                    => ' ',
            'fecha_de_lanzamiento'                                => 'Fecha De Lanzamiento',
            'fecha_de_lanzamiento_helper'                         => ' ',
            'tipo_de_domicilio'                                   => 'Tipo de domicilio',
            'tipo_de_domicilio_helper'                            => ' ',
            'otro_tipo_de_domicilio'                              => 'Otro tipo de domicilio',
            'otro_tipo_de_domicilio_helper'                       => ' ',
            'riesgo_conducta_suicida_nivel'                       => 'Nivel',
            'riesgo_conducta_suicida_nivel_helper'                => ' ',
            'riesgo_conducta_suicida_intentos_previos'            => 'Intentos previos',
            'riesgo_conducta_suicida_intentos_previos_helper'     => ' ',
            'riesgo_conducta_suicida_ultima_fecha'                => 'Última fecha',
            'riesgo_conducta_suicida_ultima_fecha_helper'         => ' ',
            'riesgo_conducta_suicida_planificacion'               => 'Planificación',
            'riesgo_conducta_suicida_planificacion_helper'        => ' ',
            'tipo_violencia_sufrida'                              => 'Tipo violencia sufrida',
            'tipo_violencia_sufrida_helper'                       => ' ',
            'convive_con_el_agresor'                              => '¿Convive con el agresor?',
            'convive_con_el_agresor_helper'                       => ' ',
            'recibe_o_ha_recibido_atencion_psicosocial'           => '¿Recibe o ha recibido atención psicosocial?',
            'recibe_o_ha_recibido_atencion_psicosocial_helper'    => ' ',
            'otros_tipos_de_violencia'                            => 'Otros tipos de violencia',
            'otros_tipos_de_violencia_helper'                     => ' ',
            'motivo_de_alta'                                      => 'Motivo de alta',
            'motivo_de_alta_helper'                               => ' ',
            'fecha_alta'                                          => 'Fecha',
            'fecha_alta_helper'                                   => ' ',
            'derivacion_a'                                        => 'Derivación a',
            'derivacion_a_helper'                                 => ' ',
            'documentacion_anexa'                                 => 'Documentación',
            'documentacion_anexa_helper'                          => ' ',
            'si_vinculacion_con_otros_recursos'                   => 'Sí Vinculación con otros recursos',
            'si_vinculacion_con_otros_recursos_helper'            => ' ',
            'si_planificacion'                                    => 'Sí planificación',
            'si_planificacion_helper'                             => ' ',
            'si_recibe_o_ha_recibido_atencion_psicosocial'        => 'Si recibe o ha recibido atención psicosocial',
            'si_recibe_o_ha_recibido_atencion_psicosocial_helper' => ' ',
            'si_otros_tipos_de_violencia'                         => 'Si otros tipos de violencia',
            'si_otros_tipos_de_violencia_helper'                  => ' ',
            'otros_derivacion_a'                                  => 'Otros derivación a',
            'otros_derivacion_a_helper'                           => ' ',
            'dificultad_economica_si'                             => 'Describir dificultad económica',
            'dificultad_economica_si_helper'                      => ' ',
            'area_asignada'                                       => 'Área asignada',
            'area_asignada_helper'                                => ' ',
        ],
    ],
    'fichasDeSeguimiento' => [
        'title'          => 'Fichas de seguimiento',
        'title_singular' => 'Fichas de seguimiento',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'profesional'                    => 'Profesional',
            'profesional_helper'             => ' ',
            'fecha_y_hora'                   => 'Fecha y hora',
            'fecha_y_hora_helper'            => ' ',
            'comentarios_seguimiento'        => 'Comentarios de seguimiento',
            'comentarios_seguimiento_helper' => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'usuarie'                        => 'Usuarie',
            'usuarie_helper'                 => ' ',
        ],
    ],
    'area' => [
        'title'          => 'Areas',
        'title_singular' => 'Area',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nombre'            => 'Nombre',
            'nombre_helper'     => ' ',
            'users'             => 'Users',
            'users_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
