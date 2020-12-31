/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();

    $("#numero_acuerdo").keyup(function () {
        validar('numero_acuerdo');
    });

    $("#grupos_autorizado").keyup(function () {
        validar('grupos_autorizado');
    });

    $("#persona").change(function () {
        validar('persona');
    });

    $("#nivel").change(function () {
        validar('nivel');
    });

    $("#ciclo").change(function () {
        validar('ciclo');
    });

    $("#alumnado").change(function () {
        validar('alumnado');
    });

    $("#fecha_inicio_vigencia").change(function () {
        validar('fecha_inicio_vigencia');
    });
    
    $("#fecha_fin_vigencia").change(function () {
        validar('fecha_fin_vigencia');
    });
    
    $("#plantel").change(function () {
        validar('plantel');
    });
    

    $("#btnvalidar").click(function () {

        if (validar('numero_acuerdo') === false || validar('grupos_autorizado') === false
                || validar('persona') === false || validar('nivel') === false
                || validar('ciclo') === false || validar('alumnado') === false
                || validar('fecha_inicio_vigencia') === false || validar('fecha_fin_vigencia') === false 
                || validar('plantel') === false) {

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

        var numAcu = document.getElementById("numero_acuerdo").value;
        var gruAut = document.getElementById("grupos_autorizado").value;
        var perFM = document.getElementById("persona").value;
        var nivEdu = document.getElementById("nivel").value;
        var cicEsc = document.getElementById("ciclo").value;
        var tipAlu = document.getElementById("alumnado").value;
        var fecIniVig = document.getElementById("fecha_inicio_vigencia").value;
        var fecFinVig = document.getElementById("fecha_fin_vigencia").value;
        var plantel = document.getElementById("plantel").value;

        if ((numAcu !== null && numAcu.length !== 0) || 
            (gruAut !== null && gruAut.length !== 0) || 
            (perFM !== '---Seleccione---') || 
            (nivEdu !== '---Seleccione---') || 
            (cicEsc !== '---Seleccione---') || 
            (tipAlu !== '---Seleccione---') || 
            (fecIniVig !== '' && fecIniVig !== null) || 
            (fecFinVig !== '' && fecFinVig !== null) || 
            (plantel !== '---Seleccione---') ) {

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
                            location.href = base_url()+"analista/gestion_acuerdos";
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = base_url()+"analista/gestion_acuerdos";
        }


    });

}

function validar(campo) {

    var numAcu = document.getElementById("numero_acuerdo").value;
    var gruAut = document.getElementById("grupos_autorizado").value;
    var perFM = document.getElementById("persona").value;
    var nivEdu = document.getElementById("nivel").value;
    var cicEsc = document.getElementById("ciclo").value;
    var tipAlu = document.getElementById("alumnado").value;
    var fecIniVig = document.getElementById("fecha_inicio_vigencia").value;
    var fecFinVig = document.getElementById("fecha_fin_vigencia").value;
    var plantel = document.getElementById("plantel").value;

    if (campo === 'numero_acuerdo') {

        if (numAcu === null || numAcu.length === 0 || /^\s+$/.test(numAcu)) {
            $("#iconotexto1").remove();
            $("#numero_acuerdo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#numero_acuerdo").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#numero_acuerdo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (numAcu.length > 8) {
            $("#iconotexto1").remove();
            $("#numero_acuerdo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#numero_acuerdo").parent().children("span").text("El campo no debe de tener más de 8 caracteres.").show();
            $("#numero_acuerdo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#numero_acuerdo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#numero_acuerdo").parent().children("span").text("").hide();
            $("#numero_acuerdo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'grupos_autorizado') {

        if (gruAut === null || gruAut.length === 0 || /^\s+$/.test(gruAut)) {
            $("#iconotexto2").remove();
            $("#grupos_autorizado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#grupos_autorizado").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#grupos_autorizado").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(gruAut)) {
            $("#iconotexto2").remove();
            $("#grupos_autorizado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#grupos_autorizado").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#grupos_autorizado").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (gruAut.length > 8) {
            $("#iconotexto2").remove();
            $("#grupos_autorizado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#grupos_autorizado").parent().children("span").text("El campo no debe de tener más de 8 caracteres.").show();
            $("#grupos_autorizado").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#grupos_autorizado").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#grupos_autorizado").parent().children("span").text("").hide();
            $("#grupos_autorizado").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'persona') {

        if (perFM === '---Seleccione---') {
            $("#iconotexto3").remove();
            $("#persona").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#persona").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#persona").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#persona").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#persona").parent().children("span").text("").hide();
            $("#persona").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'nivel') {

        if (nivEdu === '---Seleccione---') {
            $("#iconotexto4").remove();
            $("#nivel").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#nivel").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#nivel").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel").parent().children("span").text("").hide();
            $("#nivel").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'ciclo') {

        if (cicEsc === '---Seleccione---') {
            $("#iconotexto5").remove();
            $("#ciclo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciclo").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#ciclo").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#ciclo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciclo").parent().children("span").text("").hide();
            $("#ciclo").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'alumnado') {

        if (tipAlu === '---Seleccione---') {
            $("#iconotexto6").remove();
            $("#alumnado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#alumnado").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#alumnado").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto6").remove();
            $("#alumnado").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#alumnado").parent().children("span").text("").hide();
            $("#alumnado").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'fecha_inicio_vigencia') {

        if (fecIniVig === '' || fecIniVig === null) {
            $("#iconotexto7").remove();
            $("#fecha_inicio_vigencia").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_inicio_vigencia").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#fecha_inicio_vigencia").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto7").remove();
            $("#fecha_inicio_vigencia").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_inicio_vigencia").parent().children("span").text("").hide();
            $("#fecha_inicio_vigencia").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'fecha_fin_vigencia') {

        if (fecFinVig === '' || fecFinVig === null) {
            $("#iconotexto8").remove();
            $("#fecha_fin_vigencia").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_fin_vigencia").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#fecha_fin_vigencia").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto8").remove();
            $("#fecha_fin_vigencia").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_fin_vigencia").parent().children("span").text("").hide();
            $("#fecha_fin_vigencia").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'plantel') {

        if (plantel === '---Seleccione---') {
            $("#iconotexto9").remove();
            $("#plantel").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plantel").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#plantel").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto9").remove();
            $("#plantel").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#plantel").parent().children("span").text("").hide();
            $("#plantel").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


}



    