/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {

    /*
    $("#nivel_educativo").change(function () {
        validar('nivel_educativo');
    });

    function validar() {
        var id_nivel = document.getElementById('nivel_educativo').value;
        buscarDatos(id_nivel);
    }

    function buscarDatos(id_nivel) {

        $.ajax({

            url: '../analista/gestion_acuerdos/enviar_nivel',
            type: 'POST',
            data: {
                id_nivel: id_nivel
            }

        }).done(function (respuesta){
            
            $(".respuesta").html("Institución:<br><pre>" + JSON.stringify(respuesta, null, 2) + "</pre>");
            $(".institucionm").html("Institución:<br><pre>" + JSON.stringify(respuesta, null, 2) + "</pre>");
            /*
            var res = JSON.stringify(respuesta, null, 2);
            alert (res.length);
            */
           
           
            //for(var i = 1; i <= res.length; i++){
            //    $(".respuesta").html("Institución"+[i]+":<br><pre>" + JSON.stringify(respuesta[i], null, 2) + "</pre>");
            //}
            
        //});

    //}

}

