/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();


    $("#materia").change(function () {
        validar('materia');
    });

    $("#btnvalidar").click(function () {

        if (validar('materia') === false ) {

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

        var materia = document.getElementById("materia").value;
        var idpe = document.getElementById("id_pe").value;
        var idinstitucion = document.getElementById("id_institucion").value;

        if ((materia !== '---Seleccione---') ) {

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
                            location.href = base_url() + "analista_servicios/gestion_mapa_curricular/mc_pe/"+ idpe + "/" + idinstitucion; //falta modificar el destino
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

    var materia = document.getElementById("materia").value;
    
    if (campo === 'materia') {

        if (materia === '---Seleccione---') {
            $("#iconotexto1").remove();
            $("#materia").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#materia").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#materia").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#materia").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#materia").parent().children("span").text("").hide();
            $("#materia").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
      

}
