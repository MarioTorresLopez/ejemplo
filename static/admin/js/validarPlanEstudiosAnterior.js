/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();

    $("#nom_institucion").keyup(function () {
        var valorinput = $('#nom_institucion').val().toUpperCase();
        $('#nom_institucion').val(valorinput);
        validar('nom_institucion');
    });

    $("#nom_acuerdo").keyup(function () {
        var valorinput = $('#nom_acuerdo').val().toUpperCase();
        $('#nom_acuerdo').val(valorinput);
        validar('nom_acuerdo');
    });
    
    $("#nivel").change(function () {
        validar('nivel');
    });
    
    $("#modalidad").change(function () {
        validar('modalidad');
    });
    
    $("#plan_estudios").keyup(function () {
        var valorinput = $('#plan_estudios').val().toUpperCase();
        $('#plan_estudios').val(valorinput);
        validar('plan_estudios');
    });
    
    $("#clave_plan_estudios").keyup(function () {
        var valorinput = $('#clave_plan_estudios').val().toUpperCase();
        $('#clave_plan_estudios').val(valorinput);
        validar('clave_plan_estudios');
    });
    
    $("#especialidad").keyup(function () {
        var valorinput = $('#especialidad').val().toUpperCase();
        $('#especialidad').val(valorinput);
        validar('especialidad');
    });
    
    $("#tipo_educativo").change(function () {
        validar('tipo_educativo');
    });
    
    $("#fecha_creacion").keyup(function () {
        validar('fecha_creacion');
    });

    $("#btnvalidar").click(function () {

        if (validar('nom_institucion') === false || validar('nom_acuerdo') === false 
                || validar('nivel') === false || validar('modalidad') === false
                || validar('plan_estudios') === false || validar('clave_plan_estudios') === false 
                || validar('tipo_educativo') === false || validar('fecha_creacion') === false) {

            swal({
                title: "Alerta",
                text: "Sus campos no estan validados.",
                type: "warning"
            });

            return false;

        } else {

            swal({
                title: "Registro",
                text: "Sus datos han sido capturados.",
                type: "success"
            },
                    function () {
                        $('#form').submit();
                    }
            );
            return false;
        }

    });


    $("#btnvalidarcancelar").click(function () {

        var nomIns = document.getElementById("nom_institucion").value;
        var nomAcu = document.getElementById("nom_acuerdo").value;
        var nivel = document.getElementById("nivel").value;
        var modali = document.getElementById("modalidad").value;
        //var especi = document.getElementById("especialidad").value;
        var nomPla = document.getElementById("plan_estudios").value;
        var claPla = document.getElementById("clave_plan_estudios").value;
        var tipEdu = document.getElementById("tipo_educativo").value;
        var fecCre = document.getElementById("fecha_creacion").value;

        if ((nomIns !== null && nomIns.length !== 0) || 
                (nomAcu !== null && nomAcu.length !== 0) ||
                (nivel !== '---Seleccione---') || 
                (modali !== '---Seleccione---') || 
                (nomPla !== null && claPla.length !== 0) ||
                (claPla !== null && claPla.length !== 0) ||
                (tipEdu !== '---Seleccione---') ||
                (fecCre !== null && fecCre.length !== 0)) {

            swal({
                title: "¿Seguro que desea cancelar el proceso?",

                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, cancelar",
                cancelButtonText: "No, permanecer",
                closeOnConfirm: false,
                closeOnCancel: false},
                    function (isConfirm) {
                        if (isConfirm) {
                            location.href = base_url() + "analista_servicios/gestion_planes_estudios/pe_anterior"; //falta modificar el destino
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = base_url() + "analista_servicios/gestion_planes_estudios/pe_anterior"; //falta modificar el destino
        }

    });

}

function validar(campo) {

    var nomIns = document.getElementById("nom_institucion").value;
    var nomAcu = document.getElementById("nom_acuerdo").value;
    var nivel = document.getElementById("nivel").value;
    var modali = document.getElementById("modalidad").value;
    var nomPla = document.getElementById("plan_estudios").value;
    var claPla = document.getElementById("clave_plan_estudios").value;
    var especi = document.getElementById("especialidad").value;
    var tipEdu = document.getElementById("tipo_educativo").value;
    var fecCre = document.getElementById("fecha_creacion").value;
    
    if (campo === 'nom_institucion') {

        if (nomIns === null || nomIns.length === 0 || /^\s+$/.test(nomIns)) {
            $("#iconotexto1").remove();
            $("#nom_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nom_institucion").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nom_institucion").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomIns.length < 3) {
            $("#iconotexto1").remove();
            $("#nom_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nom_institucion").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nom_institucion").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#nom_institucion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nom_institucion").parent().children("span").text("").hide();
            $("#nom_institucion").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    } 
    
    if (campo === 'nom_acuerdo') {

        if (nomAcu === null || nomAcu.length === 0 || /^\s+$/.test(nomAcu)) {
            $("#iconotexto2").remove();
            $("#nom_acuerdo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nom_acuerdo").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nom_acuerdo").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomAcu.length < 3) {
            $("#iconotexto2").remove();
            $("#nom_acuerdo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nom_acuerdo").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nom_acuerdo").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#nom_acuerdo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nom_acuerdo").parent().children("span").text("").hide();
            $("#nom_acuerdo").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nivel') {

        if (nivel === '---Seleccione---') {
            $("#iconotexto3").remove();
            $("#nivel").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#nivel").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#nivel").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel").parent().children("span").text("").hide();
            $("#nivel").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'modalidad') {

        if (modali === '---Seleccione---') {
            $("#iconotexto4").remove();
            $("#modalidad").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#modalidad").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#modalidad").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#modalidad").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#modalidad").parent().children("span").text("").hide();
            $("#modalidad").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'plan_estudios') {

        if (nomPla === null || nomPla.length === 0 || /^\s+$/.test(nomPla)) {
            $("#iconotexto5").remove();
            $("#plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plan_estudios").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#plan_estudios").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomPla.length < 3) {
            $("#iconotexto5").remove();
            $("#plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plan_estudios").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#plan_estudios").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#plan_estudios").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#plan_estudios").parent().children("span").text("").hide();
            $("#plan_estudios").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'clave_plan_estudios') {

        if (claPla === null || claPla.length === 0 || /^\s+$/.test(claPla)) {
            $("#iconotexto6").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claPla.length < 3) {
            $("#iconotexto6").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claPla.length > 8) {
            $("#iconotexto6").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("El campo debe de tener menos de 8 caracteres.").show();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto6").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("").hide();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'especialidad') {

        if (especi === null || especi.length === 0 || /^\s+$/.test(especi)) {
            $("#iconotexto7").remove();
            $("#especialidad").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especialidad").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#especialidad").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (especi.length < 3) {
            $("#iconotexto7").remove();
            $("#especialidad").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especialidad").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#especialidad").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto7").remove();
            $("#especialidad").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#especialidad").parent().children("span").text("").hide();
            $("#especialidad").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'tipo_educativo') {

        if (tipEdu === '---Seleccione---') {
            $("#iconotexto8").remove();
            $("#tipo_educativo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#tipo_educativo").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#tipo_educativo").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto8").remove();
            $("#tipo_educativo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#tipo_educativo").parent().children("span").text("").hide();
            $("#tipo_educativo").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'fecha_creacion') {

        if (fecCre === null || fecCre.length === 0 || /^\s+$/.test(fecCre)) {
            $("#iconotexto9").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_creacion").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#fecha_creacion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(fecCre)) {
            $("#iconotexto9").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_creacion").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#fecha_creacion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (fecCre.length > 4) {
            $("#iconotexto9").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_creacion").parent().children("span").text("El campo no debe de tener más de 4 caracteres.").show();
            $("#fecha_creacion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto9").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_creacion").parent().children("span").text("").hide();
            $("#fecha_creacion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    

}