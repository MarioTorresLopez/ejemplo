    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('.observacionCalificacion').click(function () {
        swal({
            title: "¿Algo Salió Mal?",
            text:"existe error en tupla 5 y 6",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Enviar Mensaje al Administrador",
            cancelButtonText: "Aceptar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                       location.href = "../usuario/mensaje_calificacion";
                    } else {
                        swal("Cancelado");
                        
                    }
                });
    });

   

});
