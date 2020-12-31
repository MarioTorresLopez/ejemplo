/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();

    $("#nombre_grupo").keyup(function () {
        var valorinput = $('#nombre_grupo').val().toUpperCase();
        $('#nombre_grupo').val(valorinput);
        validar('nombre_grupo');
    });

    $("#numero_alumnos").keyup(function () {
        validar('numero_alumnos');
    });

    $("#btnvalidar").click(function () {

        if (validar('nombre_grupo') === false || validar('numero_alumnos') === false) {

            swal({
                title: "Alerta",
                text: "Sus campos no estan validados.",
                type: "warning"
            });

            return false;

        } 
        else {

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

        var nomGru = document.getElementById("nombre_grupo").value;
        var numAlu = document.getElementById("numero_alumnos").value;

        if ((nomGru !== null && nomGru.length !== 0) ||
                (numAlu !== null && numAlu.length !== 0)) {

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
                            location.href = base_url() + "usuario/gestion_grupos"; //falta modificar el destino
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = "../gestion_grupos"; //falta modificar el destino
        }

    });


    $('.validargrupo').click(function () {

        var elem = $(this);

        $.ajax({
            url: base_url() + 'usuario/gestion_grupos/validar_grupo_acuerdo',
            type: 'POST',
            dataType: 'text',
            data: {
                id_acuerdo: $("#id_acuerdo").val()
            }, success: function (data, textStatus, jqXHR) {
                if (data === '0') {
                    swal({
                        title: "Antención",
                        text: "Grupos no disponibles.",
                        type: "warning"
                    });
                } else if (data === '1') {
                    swal({
                        title: "Antención",
                        text: "La cantidad de alumnos es mayor a la registrada en el acuerdo.",
                        type: "warning"
                    });
                } else {
                    document.getElementById("form").submit();
                } 
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

    });
    

}

function validar(campo) {

    var nomGru = document.getElementById("nombre_grupo").value;
    var numAlu = document.getElementById("numero_alumnos").value;

    if (campo === 'nombre_grupo') {

        if (nomGru === null || nomGru.length === 0 || /^\s+$/.test(nomGru)) {
            $("#iconotexto1").remove();
            $("#nombre_grupo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_grupo").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nombre_grupo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#nombre_grupo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_grupo").parent().children("span").text("").hide();
            $("#nombre_grupo").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }


    if (campo === 'numero_alumnos') {

        if (numAlu === null || numAlu.length === 0 || /^\s+$/.test(numAlu)) {
            $("#iconotexto2").remove();
            $("#numero_alumnos").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#numero_alumnos").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#numero_alumnos").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(numAlu)) {
            $("#iconotexto2").remove();
            $("#numero_alumnos").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#numero_alumnos").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#numero_alumnos").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#numero_alumnos").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#numero_alumnos").parent().children("span").text("").hide();
            $("#numero_alumnos").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }

}