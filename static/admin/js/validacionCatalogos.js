/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

                               
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Actualización
///// funcion para validar los campos del formulario.
$(document).on("ready", inicio);

function inicio() {
  
    $('#botonMod').click(function () {

        if (validar('nombre_modalidad_administrador') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    
    $('#botonNivel').click(function () {

        if (validar('nombre_nivel_educativo_administrador') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    
    $('#botoTipoEval').click(function () {

        if (validar('nombre_tipo_evaluacion_administrador') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    
    $('#botonTipoIng').click(function () {

        if (validar('nombre_ingreso_adminstrador') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    $('#botonTurno').click(function () {

        if (validar('nombre_turno_administrador') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    
    $('#botonTramiteCat').click(function () {

        if (validar('nombre_tramite_catalogo') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    $('#botonMateria').click(function () {

        if (validar('nombre_materia_catalogo') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    $('#botonPeriodo').click(function () {

        if (validar('nombre_periodo') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
    
   
    $("#nombre_modalidad_administrador").keyup(function () {
        var valorinput = $('#nombre_modalidad_administrador').val().toUpperCase();
        $('#nombre_modalidad_administrador').val(valorinput);
        validar('nombre_modalidad_administrador');
    });
    
    $("#nombre_nivel_educativo_administrador").keyup(function () {
        var valorinput = $('#nombre_nivel_educativo_administrador').val().toUpperCase();
        $('#nombre_nivel_educativo_administrador').val(valorinput);
        validar('nombre_nivel_educativo_administrador');
    });
    
    $("#nombre_tipo_evaluacion_administrador").keyup(function () {
        var valorinput = $('#nombre_tipo_evaluacion_administrador').val().toUpperCase();
        $('#nombre_tipo_evaluacion_administrador').val(valorinput);
        validar('nombre_tipo_evaluacion_administrador');
    });
    $("#nombre_ingreso_adminstrador").keyup(function () {
        var valorinput = $('#nombre_ingreso_adminstrador').val().toUpperCase();
        $('#nombre_ingreso_adminstrador').val(valorinput);
        validar('nombre_ingreso_adminstrador');
    });
    $("#nombre_turno_administrador").keyup(function () {
        var valorinput = $('#nombre_turno_administrador').val().toUpperCase();
        $('#nombre_turno_administrador').val(valorinput);
        validar('nombre_turno_administrador');
    });
    $("#nombre_tramite_catalogo").keyup(function () {
        var valorinput = $('#nombre_tramite_catalogo').val().toUpperCase();
        $('#nombre_tramite_catalogo').val(valorinput);
        validar('nombre_tramite_catalogo');
    });
    $("#nombre_materia_catalogo").keyup(function () {
        var valorinput = $('#nombre_materia_catalogo').val().toUpperCase();
        $('#nombre_materia_catalogo').val(valorinput);
        validar('nombre_materia_catalogo');
    });
    $("#nombre_periodo").keyup(function () {
        var valorinput = $('#nombre_periodo').val().toUpperCase();
        $('#nombre_periodo').val(valorinput);
        validar('nombre_periodo');
    });

}
function validar(input) {

    var x = false;

    if (input === 'nombre_modalidad_administrador') {
        var nombre_modalidad_administrador = document.getElementById("nombre_modalidad_administrador").value;
        if (nombre_modalidad_administrador === null || nombre_modalidad_administrador.length == 0 || /^\s+$/.test(nombre_modalidad_administrador) || nombre_modalidad_administrador == "") {
            $("#iconotexto55").remove();
            $("#nombre_modalidad_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_modalidad_administrador").parent().children("span").text("Debe ingresar el nombre modalidad.").show();
            $("#nombre_modalidad_administrador").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_modalidad_administrador)) {
            $("#iconotexto55").remove();
            $("#nombre_modalidad_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_modalidad_administrador").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_modalidad_administrador").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto55").remove();
            $("#nombre_modalidad_administrador").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_modalidad_administrador").parent().children("span").text("").hide();
            $("#nombre_modalidad_administrador").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'nombre_nivel_educativo_administrador') {
        var nombre_nivel_educativo_administrador = document.getElementById("nombre_nivel_educativo_administrador").value;
        if (nombre_nivel_educativo_administrador === null || nombre_nivel_educativo_administrador.length == 0 || /^\s+$/.test(nombre_nivel_educativo_administrador) || nombre_nivel_educativo_administrador == "") {
            $("#iconotexto56").remove();
            $("#nombre_nivel_educativo_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_nivel_educativo_administrador").parent().children("span").text("Debe ingresar el nombre nivel educativo.").show();
            $("#nombre_nivel_educativo_administrador").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_nivel_educativo_administrador)) {
            $("#iconotexto56").remove();
            $("#nombre_nivel_educativo_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_nivel_educativo_administrador").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_nivel_educativo_administrador").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto56").remove();
            $("#nombre_nivel_educativo_administrador").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_nivel_educativo_administrador").parent().children("span").text("").hide();
            $("#nombre_nivel_educativo_administrador").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
     if (input === 'nombre_tipo_evaluacion_administrador') {
        var nombre_tipo_evaluacion_administrador = document.getElementById("nombre_tipo_evaluacion_administrador").value;
        if (nombre_tipo_evaluacion_administrador === null || nombre_tipo_evaluacion_administrador.length == 0 || /^\s+$/.test(nombre_tipo_evaluacion_administrador) || nombre_tipo_evaluacion_administrador == "") {
            $("#iconotexto57").remove();
            $("#nombre_tipo_evaluacion_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_tipo_evaluacion_administrador").parent().children("span").text("Debe ingresar el nombre tipo de evaluación.").show();
            $("#nombre_tipo_evaluacion_administrador").parent().append("<span id='iconotexto57' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_tipo_evaluacion_administrador)) {
            $("#iconotexto57").remove();
            $("#nombre_tipo_evaluacion_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_tipo_evaluacion_administrador").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_tipo_evaluacion_administrador").parent().append("<span id='iconotexto57' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto57").remove();
            $("#nombre_tipo_evaluacion_administrador").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_tipo_evaluacion_administrador").parent().children("span").text("").hide();
            $("#nombre_tipo_evaluacion_administrador").parent().append("<span id='iconotexto57' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
     if (input === 'nombre_ingreso_adminstrador') {
        var nombre_ingreso_adminstrador = document.getElementById("nombre_ingreso_adminstrador").value;
        if (nombre_ingreso_adminstrador === null || nombre_ingreso_adminstrador.length == 0 || /^\s+$/.test(nombre_ingreso_adminstrador) || nombre_ingreso_adminstrador == "") {
            $("#iconotexto58").remove();
            $("#nombre_ingreso_adminstrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ingreso_adminstrador").parent().children("span").text("Debe ingresar el nombre ingreso.").show();
            $("#nombre_ingreso_adminstrador").parent().append("<span id='iconotexto58' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_ingreso_adminstrador)) {
            $("#iconotexto58").remove();
            $("#nombre_ingreso_adminstrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ingreso_adminstrador").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_ingreso_adminstrador").parent().append("<span id='iconotexto58' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto58").remove();
            $("#nombre_ingreso_adminstrador").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_ingreso_adminstrador").parent().children("span").text("").hide();
            $("#nombre_ingreso_adminstrador").parent().append("<span id='iconotexto58' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
     if (input === 'nombre_turno_administrador') {
        var nombre_turno_administrador = document.getElementById("nombre_turno_administrador").value;
        if (nombre_turno_administrador === null || nombre_turno_administrador.length == 0 || /^\s+$/.test(nombre_turno_administrador) || nombre_turno_administrador == "") {
            $("#iconotexto59").remove();
            $("#nombre_turno_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_turno_administrador").parent().children("span").text("Debe ingresar el nombre turno.").show();
            $("#nombre_turno_administrador").parent().append("<span id='iconotexto59' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_turno_administrador)) {
            $("#iconotexto59").remove();
            $("#nombre_turno_administrador").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_turno_administrador").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_turno_administrador").parent().append("<span id='iconotexto59' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto59").remove();
            $("#nombre_turno_administrador").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_turno_administrador").parent().children("span").text("").hide();
            $("#nombre_turno_administrador").parent().append("<span id='iconotexto59' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
     if (input === 'nombre_tramite_catalogo') {
        var nombre_tramite_catalogo = document.getElementById("nombre_tramite_catalogo").value;
        if (nombre_tramite_catalogo === null || nombre_tramite_catalogo.length == 0 || /^\s+$/.test(nombre_tramite_catalogo) || nombre_tramite_catalogo == "") {
            $("#iconotexto60").remove();
            $("#nombre_tramite_catalogo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_tramite_catalogo").parent().children("span").text("Debe ingresar el nombre del trámite.").show();
            $("#nombre_tramite_catalogo").parent().append("<span id='iconotexto60' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_tramite_catalogo)) {
            $("#iconotexto60").remove();
            $("#nombre_tramite_catalogo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_tramite_catalogo").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_tramite_catalogo").parent().append("<span id='iconotexto60' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto60").remove();
            $("#nombre_tramite_catalogo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_tramite_catalogo").parent().children("span").text("").hide();
            $("#nombre_tramite_catalogo").parent().append("<span id='iconotexto60' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
     if (input === 'nombre_materia_catalogo') {
        var nombre_materia_catalogo = document.getElementById("nombre_materia_catalogo").value;
        if (nombre_materia_catalogo === null || nombre_materia_catalogo.length == 0 || /^\s+$/.test(nombre_materia_catalogo) || nombre_materia_catalogo == "") {
            $("#iconotexto61").remove();
            $("#nombre_materia_catalogo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_materia_catalogo").parent().children("span").text("Debe ingresar el nombre de la materia.").show();
            $("#nombre_materia_catalogo").parent().append("<span id='iconotexto61' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_materia_catalogo)) {
            $("#iconotexto61").remove();
            $("#nombre_materia_catalogo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_materia_catalogo").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_materia_catalogo").parent().append("<span id='iconotexto61' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto61").remove();
            $("#nombre_materia_catalogo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_materia_catalogo").parent().children("span").text("").hide();
            $("#nombre_materia_catalogo").parent().append("<span id='iconotexto61' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
     if (input === 'nombre_periodo') {
        var nombre_periodo = document.getElementById("nombre_periodo").value;
        if (nombre_periodo === null || nombre_periodo.length == 0 || /^\s+$/.test(nombre_periodo) || nombre_periodo == "") {
            $("#iconotexto63").remove();
            $("#nombre_periodo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_periodo").parent().children("span").text("Debe ingresar el nombre del periodo.").show();
            $("#nombre_periodo").parent().append("<span id='iconotexto63' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_periodo)) {
            $("#iconotexto63").remove();
            $("#nombre_periodo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_periodo").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_periodo").parent().append("<span id='iconotexto63' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto63").remove();
            $("#nombre_periodo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_periodo").parent().children("span").text("").hide();
            $("#nombre_periodo").parent().append("<span id='iconotexto63' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
}

