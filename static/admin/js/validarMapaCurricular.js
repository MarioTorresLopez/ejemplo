/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();

    $("#mapa_curricular").keyup(function () {
        var valorinput = $('#mapa_curricular').val().toUpperCase();
        $('#mapa_curricular').val(valorinput);
        validar('mapa_curricular');
    });

    $("#periodo").change(function () {
        validar('periodo');
    });

    $("#no_periodo").change(function () {
        validar('no_periodo');
    });

    $("#btnvalidar").click(function () {

        if (validar('mapa_curricular') === false || validar('periodo') === false
                || validar('no_periodo') === false) {

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

        var mapCur = document.getElementById("mapa_curricular").value;
        var periodo = document.getElementById("periodo").value;
        var nomPer = document.getElementById("no_periodo").value;

        if ((mapCur !== null && mapCur.length !== 0) ||
                (periodo !== '---Seleccione---') ||
                (nomPer !== '---Seleccione---')) {

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
                            location.href = base_url() + "usuario/gestion_planes_estudios"; //falta modificar el destino
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = "../"; //falta modificar el destino
        }

    });

}

function validar(campo) {

    var mapCur = document.getElementById("mapa_curricular").value;
    var periodo = document.getElementById("periodo").value;
    var nomPer = document.getElementById("no_periodo").value;
    
    if (campo === 'mapa_curricular') {

        if (mapCur === null || mapCur.length === 0 || /^\s+$/.test(mapCur)) {
            $("#iconotexto1").remove();
            $("#mapa_curricular").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#mapa_curricular").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#mapa_curricular").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (mapCur.length < 3) {
            $("#iconotexto1").remove();
            $("#mapa_curricular").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#mapa_curricular").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#mapa_curricular").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#mapa_curricular").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#mapa_curricular").parent().children("span").text("").hide();
            $("#mapa_curricular").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'periodo') {

        if (periodo === '---Seleccione---') {
            $("#iconotexto2").remove();
            $("#periodo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#periodo").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#periodo").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#periodo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#periodo").parent().children("span").text("").hide();
            $("#periodo").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'no_periodo') {

        if (nomPer === '---Seleccione---') {
            $("#iconotexto3").remove();
            $("#no_periodo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#no_periodo").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#no_periodo").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#no_periodo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#no_periodo").parent().children("span").text("").hide();
            $("#no_periodo").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }

}