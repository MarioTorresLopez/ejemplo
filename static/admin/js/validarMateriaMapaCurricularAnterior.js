/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {

    var arrayMaterias =[];
    $("span.help-block").hide();

    $("#materia").keyup(function () {
        var valorinput = $('#materia').val().toUpperCase();
        $('#materia').val(valorinput);
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
                            location.href = base_url() + "analista_servicios/gestion_mapa_curricular/mc_pe_anterior/"+ idpe; //falta modificar el destino
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = "../"; //falta modificar el destino
        }

    });
    
    $('.agregar').click(function (){
        var materia = document.getElementById("materia").value;
        arrayMaterias.push(materia);
        document.getElementById("materia").value = "";
        document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td>'+materia+'</td>';
    });
    
    

    $('.anadir').click(function (){
        document.getElementById("materias").value = arrayMaterias;
        swal({
            title: "Registro",
            text: "Sus datos han sido capturados.",
            type: "success"
        },
                function () {
                    $('#form').submit();
                }
        );
        //console.log('array',arrayMaterias);
    });

}

function validar(campo) {

    var materia = document.getElementById("materia").value;
    
    if (campo === 'materia') {

        if (materia === null || materia.length === 0 || /^\s+$/.test(materia)) {
            $("#iconotexto5").remove();
            $("#materia").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#materia").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#materia").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (materia.length < 3) {
            $("#iconotexto5").remove();
            $("#materia").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#materia").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#materia").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#materia").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#materia").parent().children("span").text("").hide();
            $("#materia").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
      

}
