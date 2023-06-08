function other_documentation_toggle(evt){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == "documentacion_no_conocemos" ?
        showOrHideItem("otro_documentacion_toggle",true) :
        showOrHideItem("otro_documentacion_toggle",false);
}

function other_gender_toggle(evt){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == "genero_otro" ?
        showOrHideItem("otro_genero_toggle",true) :
        showOrHideItem("otro_genero_toggle",false);
}

function how_you_met_us_toggle(evt){
    const selectedTarget = document.getElementById(evt.currentTarget.id);
    const value = selectedTarget.value;
    value == "no_conocido" ?
        showOrHideItem("otros_como_nos_conocio_toggle",true) :
        showOrHideItem("otros_como_nos_conocio_toggle",false);
}

function referral_made_toggle(evt){
    const selectedTarget = document.getElementById(evt.currentTarget.id);
    const value = selectedTarget.value;
    value == "no_conocido" ?
        showOrHideItem("derivacion_realizada_otros_como_nos_conocio_toggle",true) :
        showOrHideItem("derivacion_realizada_otros_como_nos_conocio_toggle",false);
}

function other_civil_status(evt){
    const selectedTarget = document.getElementById(evt.currentTarget.id);
    const value = selectedTarget.value;
    value == "otro" ?
        showOrHideItem("estado_civil_otro_toggle",true) :
        showOrHideItem("estado_civil_otro_toggle",false);
}

function linkage_with_other_resources_toggle(evt){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == "vinculacion_con_otros_recursos_si" ?
        showOrHideItem("si_vinculacion_con_otros_recursos_toggle",true) :
        showOrHideItem("si_vinculacion_con_otros_recursos_toggle",false);
}

function type_of_address_toggle(evt){
    const selectedTarget = document.getElementById(evt.currentTarget.id);
    const value = selectedTarget.value;
    value == "otro" ?
        showOrHideItem("otro_tipo_de_domicilio_toggle",true) :
        showOrHideItem("otro_tipo_de_domicilio_toggle",false);
}

function planning_for_suicidal_behavior_toggle(evt){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == "riesgo_conducta_suicida_planificacion_si" ?
        showOrHideItem("si_planificacion_toggle",true) :
        showOrHideItem("si_planificacion_toggle",false);
}

function psychological_care_toggle(evt){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == "recibe_o_ha_recibido_atencion_psicosocial_si" ?
        showOrHideItem("si_recibe_o_ha_recibido_atencion_psicosocial_toggle",true) :
        showOrHideItem("si_recibe_o_ha_recibido_atencion_psicosocial_toggle",false);
}

function other_types_violence_toggle(evt){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == "otros_tipos_de_violencia_si" ?
        showOrHideItem("si_otros_tipos_de_violencia_toggle",true) :
        showOrHideItem("si_otros_tipos_de_violencia_toggle",false);
}

function generic_yes_toggle(evt, optionCorrectly, idToToggled){
    const idEventSelected = evt.currentTarget.id;
    idEventSelected == optionCorrectly ?
        showOrHideItem(idToToggled,true) :
        showOrHideItem(idToToggled,false);
}

function alta_other_referral_toggle(){
    $("#alta_otros_derivacion_a_toggle").toggle(true);
}

function showOrHideItem(id, action){
    const animationSpeed = 400;
    action ? $("#" + id).fadeIn(animationSpeed) : $("#" + id).fadeOut(animationSpeed);
}

$( document ).ready(function() {
    $("#otro_documentacion_toggle").toggle(false);
    $("#otro_genero_toggle").toggle(false);
    $("#otros_como_nos_conocio_toggle").toggle(false);
    $("#derivacion_realizada_otros_como_nos_conocio_toggle").toggle(false);
    $("#estado_civil_otro_toggle").toggle(false);
    $("#si_vinculacion_con_otros_recursos_toggle").toggle(false);
    $("#otro_tipo_de_domicilio_toggle").toggle(false);
    $("#si_planificacion_toggle").toggle(false);
    $("#si_recibe_o_ha_recibido_atencion_psicosocial_toggle").toggle(false);
    $("#si_otros_tipos_de_violencia_toggle").toggle(false);
    $("#alta_otros_derivacion_a_toggle").toggle(false);
    $("#otros_diagnostico_salud_toggle").toggle(false);
    $("#otros_toma_psicofarmacos_toggle").toggle(false);
    $("#otros_discapacidad_toggle").toggle(false);
    $("#otros_problemas_salud_fisica_toggle").toggle(false);
    $("#otros_relacion_covid_19_toggle").toggle(false);
    $("#dificultad_economica_si_toggle").toggle(false);
});
