/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", inicio);

function inicio() {

    var arrayOptativas =[];
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
    
    $("#no_optativa").keyup(function () {
        var valorinput = $('#no_optativa').val().toUpperCase();
        $('#no_optativa').val(valorinput);
    });
    
    $("#nomb_optativa").keyup(function () {
        var valorinput = $('#nomb_optativa').val().toUpperCase();
        $('#nomb_optativa').val(valorinput);
    });
    
    $('.agregar-optativa').click(function (){
        var nooptativa = document.getElementById("no_optativa").value;
        var nomboptativa = document.getElementById("nomb_optativa").value;
        var array=[nooptativa,nomboptativa];
        arrayOptativas.push(array);
        document.getElementById("no_optativa").value = "";
        document.getElementById("nomb_optativa").value = "";
        //document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td>'+nooptativa+'</td><td>'+nomboptativa+'</td><td><button class="btn btn-danger eliminar-optativa" type="button"><i class="fa fa-trash-o"></i><span class="bold"> </span></button></td>';
        document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td>'+nooptativa+'</td><td>'+nomboptativa+'</td>';
    });
    
    $(document).on('click', '.eliminar-optativa', function(event){
        eliminar();
    });

    $('.anadir-optativa').click(function (){
        document.getElementById("optativas").value = arrayOptativas;
        var idpe = document.getElementById("id_pe").value;
        
        $.ajax({
            url: base_url() + "analista_servicios/gestion_mapa_curricular/crear_optativas",
            type: "post",
            dataType: "json",
            data: {
                array: JSON.stringify(arrayOptativas),
                idpe: $('#id_pe').val()
            },
            success: function (json) {
                swal({
                    title: "Registro",
                    text: "Optativas registradas: " + json.optativas,
                    type: "success"
                },
                        function () {
                            location.href = base_url() + "analista_servicios/gestion_mapa_curricular/mc_pe_anterior/"+idpe;
                        }
                );
            },
            error: function (a, b, c) {
                alert("No Agregado " + c);
                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
            }
        });
        
    });
    
    $("#btnvalidarcancelarMateria").click(function () {

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
                            location.href = base_url() + "usuario/gestion_mapa_curricular"; //falta modificar el destino
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

//function eliminar(){
//    var table = document.getElementById("tablaprueba");
//    var rowCount = table.rows.length;
//    //console.log(rowCount);
//
//    if (rowCount <= 1)
//        alert('No se puede eliminar el encabezado');
//    else
//        table.deleteRow(rowCount - 1);
//}

function eliminar(){
    var table = document.getElementById("tablaprueba");
    var rowCount = table.rows.length;
    if(rowCount<=1){
        //alert('No se puede eliminar si no hay registros');
        swal({
            title: "atención",
            text: "No se puede eliminar si no hay un listado",
            type: "warning"
        });
    }
    else{
        table.deleteRow(rowCount-1);
    }
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
