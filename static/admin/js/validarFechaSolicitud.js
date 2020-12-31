/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", inicio);

function inicio() {
    
    $("#fecha_inicio").change(function () {
        validar('fecha_inicio');
    });
    
    $("#fecha_fin").change(function () {
        validar('fecha_fin');
    });
    
    $("#btnvalidar").click(function () {

        if (validar('fecha_inicio') === false || validar('fecha_fin') === false) {

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
         
}


function validar(campo) {

    var fechaInicio = document.getElementById("fecha_inicio").value;
    var fechaFin    = document.getElementById("fecha_fin").value;
    
    if (campo === 'fecha_inicio') {

        if (fechaInicio === '' || fechaInicio === null) {
            $("#iconotexto1").remove();
            $("#fecha_inicio").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_inicio").parent().children("span").text("Debe seleccionar asignar una fecha de inicio.").show();
            $("#fecha_inicio").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#fecha_inicio").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_inicio").parent().children("span").text("").hide();
            $("#fecha_inicio").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'fecha_fin') {

        if (fechaFin === '' || fechaFin === null) {
            $("#iconotexto2").remove();
            $("#fecha_fin").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_fin").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#fecha_fin").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#fecha_fin").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_fin").parent().children("span").text("").hide();
            $("#fecha_fin").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
}