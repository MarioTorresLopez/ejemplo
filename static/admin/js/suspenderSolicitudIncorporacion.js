/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.suspendersolicitudinco').click(function () {

    var elem = $(this);

    swal({
        title: "¿Seguro que desea suspender la solicitud para incorporación?",

        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, aceptar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {

                    location.href = base_url() + "analista/gestion_institucion/suspender_solicitud_incorporacion/" + elem.attr('data-id');

                } else {
                    swal("Cancelado", "");

                }
            });
});
