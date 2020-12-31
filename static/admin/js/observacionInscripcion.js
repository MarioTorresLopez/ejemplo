    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('.observacionInscripcion').click(function () {
        swal({
            title: "¿Algo salió mal?",
            text:"existe error en tupla 5 y 6",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Enviar mensaje al administrador",
            cancelButtonText: "Aceptar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                       location.href = "../usuario/mensaje";
                    } else {
                        swal("Cancelado");
                        
                    }
                });
    });

   

});
