/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();

    $("#idacuerdo").change(function () {
        $("#idacuerdo option:selected").each(function () {
            var idacuerdo = $('#idacuerdo').val();
            $.post(base_url() + "analista_servicios/gestion_planes_estudios/buscar_datos_acuerdo", {
                idacuerdo: idacuerdo
            }, function (data) {
                $("#d1").html(data);
            });
        });
    });

    $("#idacuerdo").change(function () {
        validar('idacuerdo');
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
    
    $("#especialidad").change(function () {
        validar('especialidad');
    });
    
    $("#tipo_educativo").change(function () {
        validar('tipo_educativo');
    });
    
    $("#fecha_creacion").keyup(function () {
        validar('fecha_creacion');
    });

    $("#btnvalidar").click(function () {

        if (validar('idacuerdo') === false || validar('plan_estudios') === false
                || validar('clave_plan_estudios') === false || validar('tipo_educativo') === false
                || validar('fecha_creacion') === false) {

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

        var numAcu = document.getElementById("idacuerdo").value;
        //var especi = document.getElementById("especialidad").value;
        var nomPla = document.getElementById("plan_estudios").value;
        var claPla = document.getElementById("clave_plan_estudios").value;
        var tipEdu = document.getElementById("tipo_educativo").value;
        var fecCre = document.getElementById("fecha_creacion").value;

        if ((numAcu !== '---Seleccione---') ||
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
                            location.href = base_url() + "analista_servicios/gestion_instituciones"; //falta modificar el destino
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = base_url() + "analista_servicios/gestion_instituciones"; //falta modificar el destino
        }

    });

}

function validar(campo) {

    var numAcu = document.getElementById("idacuerdo").value;
    var nomPla = document.getElementById("plan_estudios").value;
    var claPla = document.getElementById("clave_plan_estudios").value;
    var especi = document.getElementById("especialidad").value;
    var tipEdu = document.getElementById("tipo_educativo").value;
    var fecCre = document.getElementById("fecha_creacion").value;
        
    if (campo === 'idacuerdo') {

        if (numAcu === '---Seleccione---') {
            $("#iconotexto1").remove();
            $("#idacuerdo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#idacuerdo").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#idacuerdo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#idacuerdo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#idacuerdo").parent().children("span").text("").hide();
            $("#idacuerdo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'plan_estudios') {

        if (nomPla === null || nomPla.length === 0 || /^\s+$/.test(nomPla)) {
            $("#iconotexto2").remove();
            $("#plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plan_estudios").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#plan_estudios").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomPla.length < 3) {
            $("#iconotexto2").remove();
            $("#plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plan_estudios").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#plan_estudios").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#plan_estudios").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#plan_estudios").parent().children("span").text("").hide();
            $("#plan_estudios").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'clave_plan_estudios') {

        if (claPla === null || claPla.length === 0 || /^\s+$/.test(claPla)) {
            $("#iconotexto3").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claPla.length < 3) {
            $("#iconotexto3").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claPla.length > 8) {
            $("#iconotexto3").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("El campo debe de tener menos de 8 caracteres.").show();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#clave_plan_estudios").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#clave_plan_estudios").parent().children("span").text("").hide();
            $("#clave_plan_estudios").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'especialidad') {

        if (especi === '---Seleccione---') {
            $("#iconotexto4").remove();
            $("#especialidad").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especialidad").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#especialidad").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#especialidad").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#especialidad").parent().children("span").text("").hide();
            $("#especialidad").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'tipo_educativo') {

        if (tipEdu === '---Seleccione---') {
            $("#iconotexto5").remove();
            $("#tipo_educativo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#tipo_educativo").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#tipo_educativo").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#tipo_educativo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#tipo_educativo").parent().children("span").text("").hide();
            $("#tipo_educativo").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'fecha_creacion') {

        if (fecCre === null || fecCre.length === 0 || /^\s+$/.test(fecCre)) {
            $("#iconotexto6").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_creacion").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#fecha_creacion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(fecCre)) {
            $("#iconotexto6").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_creacion").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#fecha_creacion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (fecCre.length > 4) {
            $("#iconotexto6").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_creacion").parent().children("span").text("El campo no debe de tener más de 4 caracteres.").show();
            $("#fecha_creacion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto6").remove();
            $("#fecha_creacion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_creacion").parent().children("span").text("").hide();
            $("#fecha_creacion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    

}
