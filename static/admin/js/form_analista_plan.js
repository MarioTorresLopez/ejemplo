jQuery(document).ready(function ($) {
    
    $("#div_desplegar1").slideUp(10);
    $("#btn_desplegar1").click(function () {

        var id_documento = document.getElementById("btn_desplegar1").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar1").slideDown(500);
        $("#btn_desplegar1").fadeOut(500);
        
    });
    
    
    $("#div_desplegar2").slideUp(10);
    $("#btn_desplegar2").click(function () {

        var id_documento = document.getElementById("btn_desplegar2").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar2").slideDown(500);
        $("#btn_desplegar2").fadeOut(500);
        
    });
    
    
    $("#div_desplegar3").slideUp(10);
    $("#btn_desplegar3").click(function () {

        var id_documento = document.getElementById("btn_desplegar3").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar3").slideDown(500);
        $("#btn_desplegar3").fadeOut(500);
        
    });
    
    
    $("#btn_aceptado1").click(function (event) {
        
        var id_documento = document.getElementById("btn_aceptado1").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario1").prop('disabled', true);
        $("#btn_aceptado1").prop('disabled', true);
        
    });


    $("#div_comentario1").slideUp(10);
    $("#btn_comentario1").click(function (event) {
        
        $("#btn_aceptado1").prop('disabled', true);
        $("#div_comentario1").slideDown(500);

        $("#btn_enviarCom1").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_iden_prop").innerText;
            var id_documento = document.getElementById("btn_comentario1").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            //enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });
        
    });

    
    $("#btn_aceptado2").click(function (event) {
        
        var id_documento = document.getElementById("btn_aceptado2").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario2").prop('disabled', true);
        $("#btn_aceptado2").prop('disabled', true);
        
    });


    $("#div_comentario2").slideUp(10);
    $("#btn_comentario2").click(function (event) {
        
        $("#btn_aceptado2").prop('disabled', true);
        $("#div_comentario2").slideDown(500);

        $("#btn_enviarCom2").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_iden_prop").innerText;
            var id_documento = document.getElementById("btn_comentario2").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            //enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });
        
    });

    
    $("#btn_aceptado3").click(function (event) {
        
        var id_documento = document.getElementById("btn_aceptado3").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario3").prop('disabled', true);
        $("#btn_aceptado3").prop('disabled', true);
        
    });


    $("#div_comentario3").slideUp(10);
    $("#btn_comentario3").click(function (event) {
        
        $("#btn_aceptado3").prop('disabled', true);
        $("#div_comentario3").slideDown(500);

        $("#btn_enviarCom3").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_iden_prop").innerText;
            var id_documento = document.getElementById("btn_comentario3").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            //enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });
        
    });
    
    
});