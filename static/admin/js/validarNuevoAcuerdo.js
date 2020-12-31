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

    $("#alumnos_autorizado").keyup(function () {
        validar('alumnos_autorizado');
    });

    $("#turno").change(function () {
        validar('turno');
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

    $("#nombre_institucion").keyup(function () {
        var validarinput = $('#nombre_institucion').val().toUpperCase();
        $('#nombre_institucion').val(validarinput);
        validar('nombre_institucion');
    });

    $("#clave_institucion").keyup(function () {
        var validarinput = $('#clave_institucion').val().toUpperCase();
        $('#clave_institucion').val(validarinput);
        validar('clave_institucion');
    });

    $("#correo_institucion").keyup(function () {
        validar('correo_institucion');
    });

    $("#director_institucion").keyup(function () {
        var validarinput = $('#director_institucion').val().toUpperCase();
        $('#director_institucion').val(validarinput);
        validar('director_institucion');
    });

    $("#btnvalidar").click(function () {

        if (validar('numero_acuerdo') === false || validar('grupos_autorizado') === false
                || validar('alumnos_autorizado') === false || validar('turno') === false
                || validar('ciclo') === false || validar('alumnado') === false
                || validar('fecha_inicio_vigencia') === false || validar('fecha_fin_vigencia') === false
                || validar('nombre_institucion') === false || validar('clave_institucion') === false
                || validar('correo_institucion') === false || validar('director_institucion') === false) {

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
        var aluAut = document.getElementById("alumnos_autorizado").value;
        var turno = document.getElementById("turno").value;
        var cicEsc = document.getElementById("ciclo").value;
        var tipAlu = document.getElementById("alumnado").value;
        var fecIniVig = document.getElementById("fecha_inicio_vigencia").value;
        var fecFinVig = document.getElementById("fecha_fin_vigencia").value;
        var nomIns = document.getElementById("nombre_institucion").value;
        var claIns = document.getElementById("clave_institucion").value;
        var corIns = document.getElementById("correo_institucion").value;
        var dirIns = document.getElementById("director_institucion").value;

        if ((numAcu !== null && numAcu.length !== 0) ||
                (gruAut !== null && gruAut.length !== 0) ||
                (aluAut !== null && aluAut.length !== 0) ||
                (turno !== '---Seleccione---') ||
                (cicEsc !== '---Seleccione---') ||
                (tipAlu !== '---Seleccione---') ||
                (fecIniVig !== '' && fecIniVig !== null) ||
                (fecFinVig !== '' && fecFinVig !== null) ||
                (nomIns !== null && nomIns.length !== 0) ||
                (claIns !== null && claIns.length !== 0) ||
                (corIns !== null && corIns.length !== 0) ||
                (dirIns !== null && dirIns.length !== 0)) {

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
                            location.href = base_url() + "analista/gestion_acuerdos/gestion";
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = "../gestion_acuerdos/gestion";
        }


    });

}

function validar(campo) {

    var numAcu = document.getElementById("numero_acuerdo").value;
    var gruAut = document.getElementById("grupos_autorizado").value;
    var aluAut = document.getElementById("alumnos_autorizado").value;
    var turno = document.getElementById("turno").value;
    var cicEsc = document.getElementById("ciclo").value;
    var tipAlu = document.getElementById("alumnado").value;
    var fecIniVig = document.getElementById("fecha_inicio_vigencia").value;
    var fecFinVig = document.getElementById("fecha_fin_vigencia").value;
    var nomIns = document.getElementById("nombre_institucion").value;
    var claIns = document.getElementById("clave_institucion").value;
    var corIns = document.getElementById("correo_institucion").value;
    var dirIns = document.getElementById("director_institucion").value;

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


    if (campo === 'alumnos_autorizado') {

        if (aluAut === null || aluAut.length === 0 || /^\s+$/.test(aluAut)) {
            $("#iconotexto3").remove();
            $("#alumnos_autorizado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#alumnos_autorizado").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#alumnos_autorizado").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(aluAut)) {
            $("#iconotexto3").remove();
            $("#alumnos_autorizado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#alumnos_autorizado").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#alumnos_autorizado").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (aluAut.length > 8) {
            $("#iconotexto3").remove();
            $("#alumnos_autorizado").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#alumnos_autorizado").parent().children("span").text("El campo no debe de tener más de 8 caracteres.").show();
            $("#alumnos_autorizado").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#alumnos_autorizado").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#alumnos_autorizado").parent().children("span").text("").hide();
            $("#alumnos_autorizado").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'turno') {

        if (turno === '---Seleccione---') {
            $("#iconotexto4").remove();
            $("#turno").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#turno").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#turno").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#turno").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#turno").parent().children("span").text("").hide();
            $("#turno").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
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


    if (campo === 'nombre_institucion') {

        if (nomIns === null || nomIns.length === 0 || /^\s+$/.test(nomIns)) {
            $("#iconotexto9").remove();
            $("#nombre_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_institucion").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nombre_institucion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomIns.length < 3) {
            $("#iconotexto9").remove();
            $("#nombre_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_institucion").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nombre_institucion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto9").remove();
            $("#nombre_institucion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_institucion").parent().children("span").text("").hide();
            $("#nombre_institucion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'clave_institucion') {

        if (claIns === null || claIns.length === 0 || /^\s+$/.test(claIns)) {
            $("#iconotexto10").remove();
            $("#clave_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_institucion").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#clave_institucion").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claIns.length < 3) {
            $("#iconotexto10").remove();
            $("#clave_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_institucion").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#clave_institucion").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto10").remove();
            $("#clave_institucion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#clave_institucion").parent().children("span").text("").hide();
            $("#clave_institucion").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'correo_institucion') {

        if (!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(corIns)) && corIns.length > 0) {
            $("#iconotexto11").remove();
            $("#correo_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#correo_institucion").parent().children("span").text("Ingresar un correo valido").show();
            $("#correo_institucion").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (corIns.length === 0 || corIns === "") {
            $("#iconotexto11").remove();
            $("#correo_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#correo_institucion").parent().children("span").text("Ingresar correo").show();
            $("#correo_institucion").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto11").remove();
            $("#correo_institucion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#correo_institucion").parent().children("span").text("").hide();
            $("#correo_institucion").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }

    }


    if (campo === 'director_institucion') {

        if (dirIns === null || dirIns.length === 0 || /^\s+$/.test(dirIns)) {
            $("#iconotexto12").remove();
            $("#director_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#director_institucion").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#director_institucion").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (dirIns.length < 3) {
            $("#iconotexto12").remove();
            $("#director_institucion").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#director_institucion").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#director_institucion").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto12").remove();
            $("#director_institucion").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#director_institucion").parent().children("span").text("").hide();
            $("#director_institucion").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


}

