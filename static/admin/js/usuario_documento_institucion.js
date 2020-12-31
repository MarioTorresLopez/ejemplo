jQuery(document).ready(function ($) {
    algo=$("#idparacita").val();
    var datos=algo;
    localStorage.setItem("datos", JSON.stringify(datos));
    console.log(algo);

    $("#div_desplegar1").slideUp(10);
    $("#btn_desplegar1").click(function () {

        var iddocsol = document.getElementById("btn_desplegar1").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar1").slideDown(500);
        $("#btn_desplegar1").fadeOut(500);
        
    });


    $("#div_desplegar2").slideUp(10);
    $("#btn_desplegar2").click(function () {

        var iddocsol = document.getElementById("btn_desplegar2").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar2").slideDown(500);
        $("#btn_desplegar2").fadeOut(500);
        
    });


    $("#div_desplegar3").slideUp(10);
    $("#btn_desplegar3").click(function () {

        var iddocsol = document.getElementById("btn_desplegar3").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

    buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar3").slideDown(500);
        $("#btn_desplegar3").fadeOut(500);
        
    });


    $("#div_desplegar4").slideUp(10);
    $("#btn_desplegar4").click(function () {

        var iddocsol = document.getElementById("btn_desplegar4").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

  buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar4").slideDown(500);
        $("#btn_desplegar4").fadeOut(500);
        
    });


    $("#div_desplegar5").slideUp(10);
    $("#btn_desplegar5").click(function () {

        var iddocsol = document.getElementById("btn_desplegar5").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar5").slideDown(500);
        $("#btn_desplegar5").fadeOut(500);
        
    });


    $("#div_desplegar6").slideUp(10);
    $("#btn_desplegar6").click(function () {

        var iddocsol = document.getElementById("btn_desplegar6").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar6").slideDown(500);
        $("#btn_desplegar6").fadeOut(500);
        
    });


    $("#div_desplegar7").slideUp(10);
    $("#btn_desplegar7").click(function () {

        var iddocsol = document.getElementById("btn_desplegar7").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar7").slideDown(500);
        $("#btn_desplegar7").fadeOut(500);
        
    });
 $("#div_desplegar8").slideUp(10);
    $("#btn_desplegar8").click(function () {

        var iddocsol = document.getElementById("btn_desplegar8").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

     buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar8").slideDown(500);
        $("#btn_desplegar8").fadeOut(500);
        
    });
 $("#div_desplegar9").slideUp(10);
    $("#btn_desplegar9").click(function () {

        var iddocsol = document.getElementById("btn_desplegar9").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar9").slideDown(500);
        $("#btn_desplegar9").fadeOut(500);
        
    });
    
     $("#div_desplegar10").slideUp(10);
    $("#btn_desplegar10").click(function () {

        var iddocsol = document.getElementById("btn_desplegar10").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar10").slideDown(500);
        $("#btn_desplegar10").fadeOut(500);
        
    });
 $("#div_desplegar11").slideUp(10);
    $("#btn_desplegar11").click(function () {

        var iddocsol = document.getElementById("btn_desplegar11").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar11").slideDown(500);
        $("#btn_desplegar11").fadeOut(500);
        
    });
     $("#div_desplegar12").slideUp(10);
    $("#btn_desplegar12").click(function () {

        var iddocsol = document.getElementById("btn_desplegar12").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar12").slideDown(500);
        $("#btn_desplegar12").fadeOut(500);
        
    });
     $("#div_desplegar13").slideUp(10);
    $("#btn_desplegar13").click(function () {

        var iddocsol = document.getElementById("btn_desplegar13").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar13").slideDown(500);
        $("#btn_desplegar13").fadeOut(500);
        
    });
     $("#div_desplegar14").slideUp(10);
    $("#btn_desplegar14").click(function () {

        var iddocsol = document.getElementById("btn_desplegar14").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar14").slideDown(500);
        $("#btn_desplegar14").fadeOut(500);
        
    });
 $("#div_desplegar15").slideUp(10);
    $("#btn_desplegar15").click(function () {

        var iddocsol = document.getElementById("btn_desplegar15").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar15").slideDown(500);
        $("#btn_desplegar15").fadeOut(500);
        
    });

 $("#div_desplegar16").slideUp(10);
    $("#btn_desplegar16").click(function () {

        var iddocsol = document.getElementById("btn_desplegar16").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar16").slideDown(500);
        $("#btn_desplegar16").fadeOut(500);
        
    });
     $("#div_desplegar17").slideUp(10);
    $("#btn_desplegar17").click(function () {

        var iddocsol = document.getElementById("btn_desplegar17").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar17").slideDown(500);
        $("#btn_desplegar17").fadeOut(500);
        
    });
    
     $("#div_desplegar18").slideUp(10);
    $("#btn_desplegar18").click(function () {

        var iddocsol = document.getElementById("btn_desplegar18").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar18").slideDown(500);
        $("#btn_desplegar18").fadeOut(500);
        
    });

 $("#div_desplegar19").slideUp(10);
    $("#btn_desplegar19").click(function () {

        var iddocsol = document.getElementById("btn_desplegar19").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

     buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar19").slideDown(500);
        $("#btn_desplegar19").fadeOut(500);
        
    });

 $("#div_desplegar20").slideUp(10);
    $("#btn_desplegar20").click(function () {

        var iddocsol = document.getElementById("btn_desplegar20").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar20").slideDown(500);
        $("#btn_desplegar20").fadeOut(500);
        
    });
 $("#div_desplegar21").slideUp(10);
    $("#btn_desplegar21").click(function () {

        var iddocsol = document.getElementById("btn_desplegar21").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar21").slideDown(500);
        $("#btn_desplegar21").fadeOut(500);
        
    });
    
     $("#div_desplegar22").slideUp(10);
    $("#btn_desplegar22").click(function () {

        var iddocsol = document.getElementById("btn_desplegar22").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar22").slideDown(500);
        $("#btn_desplegar22").fadeOut(500);
        
    });
 $("#div_desplegar23").slideUp(10);
    $("#btn_desplegar23").click(function () {

        var iddocsol = document.getElementById("btn_desplegar23").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar23").slideDown(500);
        $("#btn_desplegar23").fadeOut(500);
        
    });
 $("#div_desplegar24").slideUp(10);
    $("#btn_desplegar24").click(function () {

        var iddocsol = document.getElementById("btn_desplegar24").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

       buscarDatos(idfolio, iddocsol,idusuariorec);

        $("#div_desplegar24").slideDown(500);
        $("#btn_desplegar24").fadeOut(500);
        
    });



    $("#btn_aceptado1").click(function (event) {

        var iddocsol = document.getElementById("btn_aceptado1").value;
        var idfolio = document.getElementById("id_folio").value;
        var idusuariorec = document.getElementById("id_usu_rec").value;

        buscarDatos(idfolio, iddocsol,idusuariorec);

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
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });


    $("#btn_aceptado2").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado2").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario2").prop('disabled', true);
        $("#btn_aceptado2").prop('disabled', true);

    });

    $("#div_comentario2").slideUp(10);
    $("#btn_comentario2").click(function (event) {

        $("#btn_aceptado2").prop('disabled', true);
        $("#div_comentario2").slideDown(500);

        $("#btn_enviarCom2").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_iden_repr").innerText;
            var id_documento = document.getElementById("btn_comentario2").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
        
        });

    });


    $("#btn_aceptado3").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado3").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario3").prop('disabled', true);
        $("#btn_aceptado3").prop('disabled', true);

    });

    $("#div_comentario3").slideUp(10);
    $("#btn_comentario3").click(function (event) {

        $("#btn_aceptado3").prop('disabled', true);
        $("#div_comentario3").slideDown(500);

        $("#btn_enviarCom3").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_acta_prop").innerText;
            var id_documento = document.getElementById("btn_comentario3").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });


    $("#btn_aceptado4").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado4").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario4").prop('disabled', true);
        $("#btn_aceptado4").prop('disabled', true);

    });

    $("#div_comentario4").slideUp(10);
    $("#btn_comentario4").click(function (event) {

        $("#btn_aceptado4").prop('disabled', true);
        $("#div_comentario4").slideDown(500);

        $("#btn_enviarCom4").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_acta_repr").innerText;
            var id_documento = document.getElementById("btn_comentario4").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });


    $("#btn_aceptado5").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado5").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario5").prop('disabled', true);
        $("#btn_aceptado5").prop('disabled', true);

    });

    $("#div_comentario5").slideUp(10);
    $("#btn_comentario5").click(function (event) {

        $("#btn_aceptado5").prop('disabled', true);
        $("#div_comentario5").slideDown(500);

        $("#btn_enviarCom5").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_reci_dere").innerText;
            var id_documento = document.getElementById("btn_comentario5").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });


    $("#btn_aceptado6").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado6").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario6").prop('disabled', true);
        $("#btn_aceptado6").prop('disabled', true);

    });

    $("#div_comentario6").slideUp(10);
    $("#btn_comentario6").click(function (event) {

        $("#btn_aceptado6").prop('disabled', true);
        $("#div_comentario6").slideDown(500);

        $("#btn_enviarCom6").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_acre_legal").innerText;
            var id_documento = document.getElementById("btn_comentario6").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });

    $("#btn_aceptado7").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado7").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario7").prop('disabled', true);
        $("#btn_aceptado7").prop('disabled', true);

    });

    $("#div_comentario7").slideUp(10);
    $("#btn_comentario7").click(function (event) {

        $("#btn_aceptado7").prop('disabled', true);
        $("#div_comentario7").slideDown(500);

        $("#btn_enviarCom7").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario7").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    
    //
      $("#btn_aceptado8").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado8").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario8").prop('disabled', true);
        $("#btn_aceptado8").prop('disabled', true);

    });

    $("#div_comentario8").slideUp(10);
    $("#btn_comentario8").click(function (event) {

        $("#btn_aceptado8").prop('disabled', true);
        $("#div_comentario8").slideDown(500);

        $("#btn_enviarCom8").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario8").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
  $("#btn_aceptado9").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado9").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario9").prop('disabled', true);
        $("#btn_aceptado9").prop('disabled', true);

    });

    $("#div_comentario9").slideUp(10);
    $("#btn_comentario9").click(function (event) {

        $("#btn_aceptado9").prop('disabled', true);
        $("#div_comentario9").slideDown(500);

        $("#btn_enviarCom9").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario9").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
  $("#btn_aceptado10").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado10").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario10").prop('disabled', true);
        $("#btn_aceptado10").prop('disabled', true);

    });

    $("#div_comentario10").slideUp(10);
    $("#btn_comentario10").click(function (event) {

        $("#btn_aceptado10").prop('disabled', true);
        $("#div_comentario10").slideDown(500);

        $("#btn_enviarCom10").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario10").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });

  $("#btn_aceptado11").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado11").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario11").prop('disabled', true);
        $("#btn_aceptado11").prop('disabled', true);

    });

    $("#div_comentario11").slideUp(10);
    $("#btn_comentario11").click(function (event) {

        $("#btn_aceptado11").prop('disabled', true);
        $("#div_comentario11").slideDown(500);

        $("#btn_enviarCom11").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario11").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    
      $("#btn_aceptado12").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado12").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario12").prop('disabled', true);
        $("#btn_aceptado12").prop('disabled', true);

    });

    $("#div_comentario12").slideUp(10);
    $("#btn_comentario12").click(function (event) {

        $("#btn_aceptado12").prop('disabled', true);
        $("#div_comentario12").slideDown(500);

        $("#btn_enviarCom12").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario12").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
  $("#btn_aceptado13").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado13").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario13").prop('disabled', true);
        $("#btn_aceptado13").prop('disabled', true);

    });

    $("#div_comentario13").slideUp(10);
    $("#btn_comentario13").click(function (event) {

        $("#btn_aceptado13").prop('disabled', true);
        $("#div_comentario13").slideDown(500);

        $("#btn_enviarCom13").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario13").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
  $("#btn_aceptado14").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado14").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario14").prop('disabled', true);
        $("#btn_aceptado14").prop('disabled', true);

    });

    $("#div_comentario14").slideUp(10);
    $("#btn_comentario14").click(function (event) {

        $("#btn_aceptado14").prop('disabled', true);
        $("#div_comentario14").slideDown(500);

        $("#btn_enviarCom14").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario14").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });

  $("#btn_aceptado15").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado15").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario15").prop('disabled', true);
        $("#btn_aceptado15").prop('disabled', true);

    });

    $("#div_comentario15").slideUp(10);
    $("#btn_comentario15").click(function (event) {

        $("#btn_aceptado15").prop('disabled', true);
        $("#div_comentario15").slideDown(500);

        $("#btn_enviarCom15").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario15").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
      $("#btn_aceptado16").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado16").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario16").prop('disabled', true);
        $("#btn_aceptado16").prop('disabled', true);

    });

    $("#div_comentario16").slideUp(10);
    $("#btn_comentario16").click(function (event) {

        $("#btn_aceptado16").prop('disabled', true);
        $("#div_comentario16").slideDown(500);

        $("#btn_enviarCom16").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario16").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });

  $("#btn_aceptado17").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado17").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario17").prop('disabled', true);
        $("#btn_aceptado17").prop('disabled', true);

    });

    $("#div_comentario17").slideUp(10);
    $("#btn_comentario17").click(function (event) {

        $("#btn_aceptado17").prop('disabled', true);
        $("#div_comentario17").slideDown(500);

        $("#btn_enviarCom17").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario17").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });

  $("#btn_aceptado18").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado18").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario18").prop('disabled', true);
        $("#btn_aceptado18").prop('disabled', true);

    });

    $("#div_comentario18").slideUp(10);
    $("#btn_comentario18").click(function (event) {

        $("#btn_aceptado18").prop('disabled', true);
        $("#div_comentario18").slideDown(500);

        $("#btn_enviarCom18").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario18").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    //
     $("#btn_aceptado19").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado19").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario19").prop('disabled', true);
        $("#btn_aceptado19").prop('disabled', true);

    });

    $("#div_comentario19").slideUp(10);
    $("#btn_comentario19").click(function (event) {

        $("#btn_aceptado19").prop('disabled', true);
        $("#div_comentario19").slideDown(500);

        $("#btn_enviarCom19").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario19").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
     $("#btn_aceptado20").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado20").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario20").prop('disabled', true);
        $("#btn_aceptado20").prop('disabled', true);

    });

    $("#div_comentario20").slideUp(10);
    $("#btn_comentario20").click(function (event) {

        $("#btn_aceptado20").prop('disabled', true);
        $("#div_comentario20").slideDown(500);

        $("#btn_enviarCom20").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario20").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    
     $("#btn_aceptado21").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado21").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario21").prop('disabled', true);
        $("#btn_aceptado21").prop('disabled', true);

    });

    $("#div_comentario21").slideUp(10);
    $("#btn_comentario21").click(function (event) {

        $("#btn_aceptado21").prop('disabled', true);
        $("#div_comentario21").slideDown(500);

        $("#btn_enviarCom21").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario21").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    
     $("#btn_aceptado22").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado22").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario22").prop('disabled', true);
        $("#btn_aceptado22").prop('disabled', true);

    });

    $("#div_comentario22").slideUp(10);
    $("#btn_comentario22").click(function (event) {

        $("#btn_aceptado22").prop('disabled', true);
        $("#div_comentario22").slideDown(500);

        $("#btn_enviarCom22").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario22").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    
     $("#btn_aceptado23").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado23").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario23").prop('disabled', true);
        $("#btn_aceptado23").prop('disabled', true);

    });

    $("#div_comentario23").slideUp(10);
    $("#btn_comentario23").click(function (event) {

        $("#btn_aceptado23").prop('disabled', true);
        $("#div_comentario23").slideDown(500);

        $("#btn_enviarCom23").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario23").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    
     $("#btn_aceptado24").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado24").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario24").prop('disabled', true);
        $("#btn_aceptado24").prop('disabled', true);

    });

    $("#div_comentario24").slideUp(10);
    $("#btn_comentario24").click(function (event) {

        $("#btn_aceptado24").prop('disabled', true);
        $("#div_comentario24").slideDown(500);

        $("#btn_enviarCom24").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_solicitud").innerText;
            var id_documento = document.getElementById("btn_comentario24").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });

    });
    


    function buscarDatos(idfolio,observacion, iddocsol, idusuariorec) {

        $.ajax({

            url: base_url()+'usuario/tramite/buscar_comentario',
            type: 'POST',
            data: {
                idfolio: idfolio,
                observacion: observacion,
                iddocsol: iddocsol,
                idusuariorec: idusuariorec
            }

        }).done(function (respuesta) {

            if (respuesta.estatus === '1') {
                var iddocsol = respuesta.iddocsol;
                var estatus = respuesta.estatus;
                validarBoton(iddocsol, estatus);
            } else {
                validarBoton(0);
            }

        });

    }

  


});/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


