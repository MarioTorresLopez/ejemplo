    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('.aceptarCalificacionAnalista').click(function () {
        swal({
            title: "¿Deseas enviar?",
              
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, enviar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                       location.href = "../analista_servicios/calificaciones";
                    } else {
                        swal("Cancelado");
                        
                    }
                });
    });

   

});
