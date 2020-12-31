jQuery(document).ready(function ($) {

    $("#modal-addevento-data").modal('hide');
    primerparametro = $("#otro2").val();
    segundoparametro = $("#otro").val();

    console.log(primerparametro);
    console.log(segundoparametro);

    var datos1 = primerparametro;
    var datos2 = segundoparametro;

    localStorage.setItem("datos1", JSON.stringify(datos1));
    localStorage.setItem("datos2", JSON.stringify(datos2));


    $("#div_desplegar1").slideUp(10);
    $("#btn_desplegar1").click(function () {

        var id_documento = document.getElementById("btn_desplegar1").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar1").slideDown(500);
        $("#btn_desplegar1").fadeOut(500);

    });

    $("#div_desplegar2").slideUp(10);
    $("#btn_desplegar2").click(function () {

        var id_documento = document.getElementById("btn_desplegar2").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar2").slideDown(500);
        $("#btn_desplegar2").fadeOut(500);

    });


    $("#div_desplegar3").slideUp(10);
    $("#btn_desplegar3").click(function () {

        var id_documento = document.getElementById("btn_desplegar3").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;
        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar3").slideDown(500);
        $("#btn_desplegar3").fadeOut(500);

    });


    $("#div_desplegar4").slideUp(10);
    $("#btn_desplegar4").click(function () {

        var id_documento = document.getElementById("btn_desplegar4").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar4").slideDown(500);
        $("#btn_desplegar4").fadeOut(500);

    });


    $("#div_desplegar5").slideUp(10);
    $("#btn_desplegar5").click(function () {

        var id_documento = document.getElementById("btn_desplegar5").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar5").slideDown(500);
        $("#btn_desplegar5").fadeOut(500);

    });


    $("#div_desplegar6").slideUp(10);
    $("#btn_desplegar6").click(function () {

        var id_documento = document.getElementById("btn_desplegar6").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar6").slideDown(500);
        $("#btn_desplegar6").fadeOut(500);

    });


    $("#div_desplegar7").slideUp(10);
    $("#btn_desplegar7").click(function () {

        var id_documento = document.getElementById("btn_desplegar7").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar7").slideDown(500);
        $("#btn_desplegar7").fadeOut(500);

    });


    $("#div_desplegar8").slideUp(10);
    $("#btn_desplegar8").click(function () {

        var id_documento = document.getElementById("btn_desplegar8").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar8").slideDown(500);
        $("#btn_desplegar8").fadeOut(500);

    });


    $("#div_desplegar9").slideUp(10);
    $("#btn_desplegar9").click(function () {

        var id_documento = document.getElementById("btn_desplegar9").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar9").slideDown(500);
        $("#btn_desplegar9").fadeOut(500);

    });


    $("#div_desplegar10").slideUp(10);
    $("#btn_desplegar10").click(function () {

        var id_documento = document.getElementById("btn_desplegar10").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar10").slideDown(500);
        $("#btn_desplegar10").fadeOut(500);

    });


    $("#div_desplegar11").slideUp(10);
    $("#btn_desplegar11").click(function () {

        var id_documento = document.getElementById("btn_desplegar11").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar11").slideDown(500);
        $("#btn_desplegar11").fadeOut(500);

    });


    $("#div_desplegar12").slideUp(10);
    $("#btn_desplegar12").click(function () {

        var id_documento = document.getElementById("btn_desplegar12").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar12").slideDown(500);
        $("#btn_desplegar12").fadeOut(500);

    });


    $("#div_desplegar13").slideUp(10);
    $("#btn_desplegar13").click(function () {

        var id_documento = document.getElementById("btn_desplegar13").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar13").slideDown(500);
        $("#btn_desplegar13").fadeOut(500);

    });


    $("#div_desplegar14").slideUp(10);
    $("#btn_desplegar14").click(function () {

        var id_documento = document.getElementById("btn_desplegar14").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar14").slideDown(500);
        $("#btn_desplegar14").fadeOut(500);

    });


    $("#div_desplegar15").slideUp(10);
    $("#btn_desplegar15").click(function () {

        var id_documento = document.getElementById("btn_desplegar15").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar15").slideDown(500);
        $("#btn_desplegar15").fadeOut(500);

    });


    $("#div_desplegar16").slideUp(10);
    $("#btn_desplegar16").click(function () {

        var id_documento = document.getElementById("btn_desplegar16").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar16").slideDown(500);
        $("#btn_desplegar16").fadeOut(500);
    });



    $("#div_desplegar17").slideUp(10);
    $("#btn_desplegar17").click(function () {

        var id_documento = document.getElementById("btn_desplegar17").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar17").slideDown(500);
        $("#btn_desplegar17").fadeOut(500);

    });


    $("#div_desplegar18").slideUp(10);
    $("#btn_desplegar18").click(function () {

        var id_documento = document.getElementById("btn_desplegar18").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar18").slideDown(500);
        $("#btn_desplegar18").fadeOut(500);

    });


    $("#div_desplegar19").slideUp(10);
    $("#btn_desplegar19").click(function () {

        var id_documento = document.getElementById("btn_desplegar19").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar19").slideDown(500);
        $("#btn_desplegar19").fadeOut(500);

    });


    $("#div_desplegar20").slideUp(10);
    $("#btn_desplegar20").click(function () {

        var id_documento = document.getElementById("btn_desplegar20").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar20").slideDown(500);
        $("#btn_desplegar20").fadeOut(500);

    });


    $("#div_desplegar21").slideUp(10);
    $("#btn_desplegar21").click(function () {

        var id_documento = document.getElementById("btn_desplegar21").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar21").slideDown(500);
        $("#btn_desplegar21").fadeOut(500);

    });


    $("#div_desplegar22").slideUp(10);
    $("#btn_desplegar22").click(function () {

        var id_documento = document.getElementById("btn_desplegar22").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar22").slideDown(500);
        $("#btn_desplegar22").fadeOut(500);

    });


    $("#div_desplegar23").slideUp(10);
    $("#btn_desplegar23").click(function () {

        var id_documento = document.getElementById("btn_desplegar23").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar23").slideDown(500);
        $("#btn_desplegar23").fadeOut(500);

    });


    $("#div_desplegar24").slideUp(10);
    $("#btn_desplegar24").click(function () {

        var id_documento = document.getElementById("btn_desplegar24").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar24").slideDown(500);
        $("#btn_desplegar24").fadeOut(500);

    });


    $("#div_desplegar25").slideUp(10);
    $("#btn_desplegar25").click(function () {

        var id_documento = document.getElementById("btn_desplegar25").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar25").slideDown(500);
        $("#btn_desplegar25").fadeOut(500);

    });


    $("#div_desplegar26").slideUp(10);
    $("#btn_desplegar26").click(function () {

        var id_documento = document.getElementById("btn_desplegar26").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar26").slideDown(500);
        $("#btn_desplegar26").fadeOut(500);

    });


    $("#div_desplegar27").slideUp(10);
    $("#btn_desplegar27").click(function () {

        var id_documento = document.getElementById("btn_desplegar27").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar27").slideDown(500);
        $("#btn_desplegar27").fadeOut(500);

    });


    $("#div_desplegar28").slideUp(10);
    $("#btn_desplegar28").click(function () {

        var id_documento = document.getElementById("btn_desplegar28").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar28").slideDown(500);
        $("#btn_desplegar28").fadeOut(500);

    });


    $("#div_desplegar29").slideUp(10);
    $("#btn_desplegar29").click(function () {

        var id_documento = document.getElementById("btn_desplegar29").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar29").slideDown(500);
        $("#btn_desplegar29").fadeOut(500);

    });


    $("#div_desplegar30").slideUp(10);
    $("#btn_desplegar30").click(function () {

        var id_documento = document.getElementById("btn_desplegar30").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar30").slideDown(500);
        $("#btn_desplegar30").fadeOut(500);

    });


    $("#div_desplegar31").slideUp(10);
    $("#btn_desplegar31").click(function () {

        var id_documento = document.getElementById("btn_desplegar31").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar31").slideDown(500);
        $("#btn_desplegar31").fadeOut(500);

    });


    $("#div_desplegar32").slideUp(10);
    $("#btn_desplegar32").click(function () {

        var id_documento = document.getElementById("btn_desplegar32").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar32").slideDown(500);
        $("#btn_desplegar32").fadeOut(500);

    });


    $("#btn_aceptado1").click(function (event) {

        var id_documento = document.getElementById("btn_aceptado1").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario1").prop('disabled', true);
        $("#btn_aceptado1").prop('disabled', true);
        $("#btn_aceptado1").prop('class', 'btn btn-success');

    });

    $("#div_comentario1").slideUp(10);
    $("#btn_comentario1").click(function (event) {

        $("#btn_aceptado1").prop('disabled', true);
        $("#div_comentario1").slideDown(500);

        $("#btn_enviar_comentario1").click(function (event) {

            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("text_comentario1").innerText;
            var id_documento = document.getElementById("btn_comentario1").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;

            enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);

            $("#btn_comentario1").prop('disabled', true);
            $("#div_comentario1").slideUp(500);
            $("#div_comentario1").fadeOut(500);

        });

    });
    
    $('.pruebaBit').on('click', function(e) {
        e.preventDefault();
        $("#modal-addevento-data").modal('show');
        var elem = $(this);
        var ref = elem.attr('value');
        $(".btnPruebaBitacora").attr("x", ref);
        //var ref = document.getElementById("btn_comentarioBitacora2").value;
        traer_deese(datos2,ref);

        //  $("#btn_aceptado2").prop('disabled', true);
        $("#div_comentarioBitacora2").slideDown(500);
    });
    
    $(".btnPruebaBitacora").on('click', function (e) {
        var idInstitucion = $("#idInst").val();
        e.preventDefault();
        var comentario = document.getElementById("text_comentarioBitacoramodal").innerText;
        var elem = $(this);
        var documento = elem.attr('x');
        //var elem = $(this);
        var idtipobitacora = 0;
        if (comentario === null || comentario.length == 0 || /^\s+$/.test(comentario) || comentario == "") {
            $("#iconotexto2").remove();
            $("#text_comentarioBitacoramodal").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#text_comentarioBitacoramodal").parent().children("span").text("Debe ingresar un comentario").show();
            $("#text_comentarioBitacoramodal").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");


        } else {

            enviarObservacionBitacora(idInstitucion, comentario, documento);
            

            swal({
                title: "Documentos",
                text: "Su comentario ha sido capturado.",
                type: "success"
            },
                    function () {
                        //location.href = base_url() + "analista/gestion_institucion/detalle_institucion/" + elem.attr('data-usu') + "/" + elem.attr('data-id');
                        $("#text_comentarioBitacoramodal").empty();
                        $("#text_comentarioBitacoramodal").append("<p><br></p>");
                        traer_deese(datos2, documento);
                    }
            );
            $("#div_comentarioBitacora2").slideUp(500);
        }
        // $("#btn_comentarioBitacora2").prop('disabled', true);

        // $("#div_comentarioBitacora2").fadeOut(500);

    });

    $("#botonBit").click(function (event) {

        var idinstitucion = document.getElementById("idinstitucion").value;
        var comentario = document.getElementById("comentario_bitacora").innerText;
        //var comentario = $("#comentario_bitacora").val();
        var elem = $('#otro2').val();
        var otro = $('#otro').val();
        var idtipobitacora=1;
        var documento=70;
        
          if (comentario === null || comentario.length == 0 || /^\s+$/.test(comentario) || comentario == "") {
                $("#iconotexto70").remove();
                $("#comentario_bitacora").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#comentario_bitacora").parent().children("span").text("Debe ingresar un comentario").show();
                $("#comentario_bitacora").parent().append("<span id='iconotexto70' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

            }
            else{

        enviarObservacionBitacora(idinstitucion, comentario,documento,idtipobitacora);
        
        swal({
                    title: "Documentos",
                    text: "Su comentario ha sido capturado.",
                    type: "success"
                },
                        function () {
                            location.href = base_url() + "analista/gestion_institucion/detalle_institucion/" + datos1 + "/" + datos2;
                            $("#comentario_bitacora").empty();
                            $("#comentario_bitacora").append("<p><br></p>");
//                            traer_deese(datos2, documento);
                        }
                );
    }

    });

    function enviarDatos(id_folio, id_documento, id_usu_rec) {

        $.ajax({

            url: base_url() + 'analista/gestion_institucion/enviar_checklist',
            type: 'POST',
            data: {
                id_folio: id_folio,
                id_documento: id_documento,
                id_usu_rec: id_usu_rec
            },
            success: function (respuesta) {
                if (respuesta === "OK") {
                    swal({
                        title: "Documentos",
                        text: "El documento ha sido recibido.",
                        type: "success"
                    });
                    //alert('Insertado');
                    //location.href = "../gestion_institucion";
                }
            },
            error: function () {
                alert('error');
            }

        });

    }


    function buscarDatos(id_folio, id_documento, id_usu_rec) {

        $.ajax({

            url: base_url() + 'analista/gestion_institucion/buscar_checklist',
            type: 'POST',
            data: {
                id_folio: id_folio,
                id_documento: id_documento,
                id_usu_rec: id_usu_rec
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

    function validarBoton(iddocsol, estatus) {

        if (iddocsol === '1') {
            if (estatus === '1') {
                $("#btn_comentario1").prop('disabled', true);
                $("#btn_aceptado1").prop('disabled', true);
                $("#btn_aceptado1").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '2') {
            if (estatus === '1') {
                $("#btn_comentario2").prop('disabled', true);
                $("#btn_aceptado2").prop('disabled', true);
                $("#btn_aceptado2").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '5') {
            if (estatus === '1') {
                $("#btn_comentario3").prop('disabled', true);
                $("#btn_aceptado3").prop('disabled', true);
                $("#btn_aceptado3").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '4') {
            if (estatus === '1') {
                $("#btn_comentario4").prop('disabled', true);
                $("#btn_aceptado4").prop('disabled', true);
                $("#btn_aceptado4").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '33') {
            if (estatus === '1') {
                $("#btn_comentario5").prop('disabled', true);
                $("#btn_aceptado5").prop('disabled', true);
                $("#btn_aceptado5").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '3') {
            if (estatus === '1') {
                $("#btn_comentario6").prop('disabled', true);
                $("#btn_aceptado6").prop('disabled', true);
                $("#btn_aceptado6").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '26') {
            if (estatus === '1') {
                $("#btn_comentario7").prop('disabled', true);
                $("#btn_aceptado7").prop('disabled', true);
                $("#btn_aceptado7").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '64') {
            if (estatus === '1') {
                $("#btn_comentario8").prop('disabled', true);
                $("#btn_aceptado8").prop('disabled', true);
                $("#btn_aceptado8").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '14') {
            if (estatus === '1') {
                $("#btn_comentario9").prop('disabled', true);
                $("#btn_aceptado9").prop('disabled', true);
                $("#btn_aceptado9").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '61') {
            if (estatus === '1') {
                $("#btn_comentario10").prop('disabled', true);
                $("#btn_aceptado10").prop('disabled', true);
                $("#btn_aceptado10").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '11') {
            if (estatus === '1') {
                $("#btn_comentario11").prop('disabled', true);
                $("#btn_aceptado11").prop('disabled', true);
                $("#btn_aceptado11").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '26') {
            if (estatus === '1') {
                $("#btn_comentario12").prop('disabled', true);
                $("#btn_aceptado12").prop('disabled', true);
                $("#btn_aceptado12").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '6') {
            if (estatus === '1') {
                $("#btn_comentario12").prop('disabled', true);
                $("#btn_aceptado12").prop('disabled', true);
                $("#btn_aceptado12").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '7') {
            if (estatus === '1') {
                $("#btn_comentario13").prop('disabled', true);
                $("#btn_aceptado13").prop('disabled', true);
                $("#btn_aceptado13").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '8') {
            if (estatus === '1') {
                $("#btn_comentario14").prop('disabled', true);
                $("#btn_aceptado14").prop('disabled', true);
                $("#btn_aceptado14").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '15') {
            if (estatus === '1') {
                $("#btn_comentario15").prop('disabled', true);
                $("#btn_aceptado15").prop('disabled', true);
                $("#btn_aceptado15").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '9') {
            if (estatus === '1') {
                $("#btn_comentario16").prop('disabled', true);
                $("#btn_aceptado16").prop('disabled', true);
                $("#btn_aceptado16").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '13') {
            if (estatus === '1') {
                $("#btn_comentario17").prop('disabled', true);
                $("#btn_aceptado17").prop('disabled', true);
                $("#btn_aceptado17").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '16') {
            if (estatus === '1') {
                $("#btn_comentario18").prop('disabled', true);
                $("#btn_aceptado18").prop('disabled', true);
                $("#btn_aceptado18").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '56') {
            if (estatus === '1') {
                $("#btn_comentario19").prop('disabled', true);
                $("#btn_aceptado19").prop('disabled', true);
                $("#btn_aceptado19").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '62') {
            if (estatus === '1') {
                $("#btn_comentario20").prop('disabled', true);
                $("#btn_aceptado20").prop('disabled', true);
                $("#btn_aceptado20").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '58') {
            if (estatus === '1') {
                $("#btn_comentario21").prop('disabled', true);
                $("#btn_aceptado21").prop('disabled', true);
                $("#btn_aceptado21").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '59') {
            if (estatus === '1') {
                $("#btn_comentario22").prop('disabled', true);
                $("#btn_aceptado22").prop('disabled', true);
                $("#btn_aceptado22").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '18') {
            if (estatus === '1') {
                $("#btn_comentario23").prop('disabled', true);
                $("#btn_aceptado23").prop('disabled', true);
                $("#btn_aceptado23").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '66') {
            if (estatus === '1') {
                $("#btn_comentario24").prop('disabled', true);
                $("#btn_aceptado24").prop('disabled', true);
                $("#btn_aceptado24").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '21') {
            if (estatus === '1') {
                $("#btn_comentario25").prop('disabled', true);
                $("#btn_aceptado25").prop('disabled', true);
                $("#btn_aceptado25").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '19') {
            if (estatus === '1') {
                $("#btn_comentario26").prop('disabled', true);
                $("#btn_aceptado26").prop('disabled', true);
                $("#btn_aceptado26").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '28') {
            if (estatus === '1') {
                $("#btn_comentario27").prop('disabled', true);
                $("#btn_aceptado27").prop('disabled', true);
                $("#btn_aceptado27").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '68') {
            if (estatus === '1') {
                $("#btn_comentario28").prop('disabled', true);
                $("#btn_aceptado28").prop('disabled', true);
                $("#btn_aceptado28").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '69') {
            if (estatus === '1') {
                $("#btn_comentario29").prop('disabled', true);
                $("#btn_aceptado29").prop('disabled', true);
                $("#btn_aceptado29").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '72') {
            if (estatus === '1') {
                $("#btn_comentario30").prop('disabled', true);
                $("#btn_aceptado30").prop('disabled', true);
                $("#btn_aceptado30").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '65') {
            if (estatus === '1') {
                $("#btn_comentario31").prop('disabled', true);
                $("#btn_aceptado31").prop('disabled', true);
                $("#btn_aceptado31").prop('class', 'btn btn-success');
            }
        }
        if (iddocsol === '63') {
            if (estatus === '1') {
                $("#btn_comentario32").prop('disabled', true);
                $("#btn_aceptado32").prop('disabled', true);
                $("#btn_aceptado32").prop('class', 'btn btn-success');
            }
        }

    }


    function enviarObservacion(id_folio, observacion, id_documento, id_usu_rec) {

        $.ajax({

            url: base_url() + 'analista/gestion_institucion/enviar_observacion',
            type: 'POST',
            data: {
                id_folio: id_folio,
                observacion: observacion,
                id_documento: id_documento,
                id_usu_rec: id_usu_rec
            },
            success: function (respuesta) {
                if (respuesta === "OK") {
                    //alert('Insertado');
                    //location.href = "../gestion_institucion";

                    swal({
                        title: "Documentos",
                        text: "Su comentario ha sido capturado.",
                        type: "success"
                    });

                }
            },
            error: function () {
                swal({
                    title: "Documentos",
                    text: "Hubo un error al intentar capturar su comentario, intente de nuevo",
                    type: "error"
                });

            }

        });

    }
    function enviarObservacionBitacora(idInstitucion, comentario, documento,idtipobitacora) {

        $.ajax({

            url: base_url() + 'analista/gestion_institucion/enviar_observacion_bitacora',
            type: 'POST',
            data: {
                idinstitucion: idInstitucion,
                comentario: comentario,
                documento: documento,
                idtipobitacora: idtipobitacora
            },
            success: function (respuesta) {
                if (respuesta === "OK") {
                    //alert('Insertado');
                    //location.href = "../gestion_institucion";
                    swal({
                        title: "Documentos",
                        text: "Su comentario ha sido capturado.",
                        type: "success"
                    });

                }
            },
            error: function () {
                swal({
                    title: "Documentos",
                    text: "Hubo un error al intentar capturar su comentario, intente de nuevo",
                    type: "error"
                });
            }

        });

    }

    function enviarBitacora(idinstitucion, comentario) {

        var comentario = document.getElementById("comentario_bitacora").innerText;
        var otro1 = document.getElementById("otro2").value;
        var otro2 = document.getElementById("otro").value;
        var elem = $(this);


        if (comentario === null || comentario.length == 0 || /^\s+$/.test(comentario) || comentario == "") {
            $("#iconotexto30").remove();
            $("#comentario_bitacora").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#comentario_bitacora").parent().children("span").text("Debe ingresar un comentario").show();
            $("#comentario_bitacora").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

        } else {
            $.ajax({

                url: base_url() + 'analista/gestion_institucion/enviar_observacion',
                type: 'POST',
                data: {
                    idinstitucion: idinstitucion,
                    documento: 70,
                    comentario: comentario
                },
                success: function (respuesta) {

                    swal({
                        title: "Documentos",
                        text: "Su comentario ha sido capturado.",
                        type: "success"
                    },
                            function () {
                                location.href = base_url() + "analista/gestion_institucion/detalle_institucion/" + otro1 + "/" + otro2;
                            }
                    );


                },
                error: function () {
                    swal({
                        title: "Documentos",
                        text: "Hubo un error al intentar capturar su comentario, intente de nuevo",
                        type: "error"
                    });
                    alert('error');
                }

            });
        }

    }
    function traer_deese(inst, ref_doc) {
        $.ajax({

            url: base_url() + 'analista/gestion_institucion/bitacora_doc',
            type: 'POST',
            data: {
                ref_doc: ref_doc,
                institucion: inst
            },
            success: function (data) {
                $('#tablabit').html(data);
            },

            error: function () {
                swal({
                    title: "Documentos",
                    text: "Hubo un error al intentar capturar su comentario, intente de nuevo",
                    type: "error"
                });
            }

        });
    }
    //Alondra y Mich

});