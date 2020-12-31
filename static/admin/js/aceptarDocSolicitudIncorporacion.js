/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('.revisiondocumentos').click(function () {

    var elem = $(this);

    swal({
        title: "¿Seguro que desea aceptar los documentos para incorporación?",

        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí, aceptar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: base_url() + 'analista/gestion_institucion/aceptar_documentos',
                        type: 'POST',
                        dataType: 'text',
                        data: {
                            folio: $("#id_folio").val(),
                            tipoProceso: 1
                        }, success: function (data, textStatus, jqXHR) {
                            if (data != '0')
                            {
                                swal({
                                    title: "Antención",
                                    text: "No se puede continuar con el proceso si no se han recibido todos los documentos.",
                                    type: "warning"
                                });
                            } else {
                                location.href = base_url() + "analista/gestion_institucion/recibir_documentacion_solicitud_incorporacion/" + elem.attr('data-id');

                            }
                        }, error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);

                        }
                    });

                } else {
                    swal("Cancelado", "");

                }
            });
});
$('.aceptaciondocumentos').click(function () {

    var elem = $(this);

    swal({
        title: "¿Seguro que desea aceptar los documentos para incorporación?",

        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, aceptar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: base_url() + 'analista/gestion_institucion/aceptar_documentos',
                        type: 'POST',
                        dataType: 'text',
                        data: {
                            folio: $("#id_folio").val(),
                            tipoProceso: 1
                        }, success: function (data, textStatus, jqXHR) {
                            if (data != '0')
                            {
                                swal({
                                    title: "Antención",
                                    text: "No se puede continuar con el proceso si no se han recibido todos los documentos.",
                                    type: "warning"
                                });
                            } else {
                                location.href = base_url() + "analista/gestion_institucion/aceptar_documentacion_solicitud_incorporacion/" + elem.attr('data-id');

                            }
                        }, error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);

                        }
                    });

                } else {
                    swal("Cancelado", "");

                }
            });
});