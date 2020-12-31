    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('.mensajeAnalista').click(function () {
        swal({
            title: "Duplicado",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Enviar mensaje al usuario",
            cancelButtonText: "Aceptar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                       location.href = "../analista_servicios/mensaje";
                    } else {
                        swal("Cancelado");
                        
                    }
                });
    });

   

});
