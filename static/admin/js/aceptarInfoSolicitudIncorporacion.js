/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.aceptacion').click(function () {

    var elem = $(this);

    swal({
        title: "¿Seguro que desea aceptar la información de la solicitud?",

        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí, aceptar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {

                    location.href = base_url() + "analista/gestion_institucion/aceptar_informacion_solicitud_incorporacion/" + elem.attr('data-id');

                } else {
                    swal("Cancelado", "");

                }
            });
});
