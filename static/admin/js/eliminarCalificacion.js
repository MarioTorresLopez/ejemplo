    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('.eliminarCalificacion').click(function () {
        swal({
            title: "¿Seguro de eliminarlo?",
              
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        swal("¡Eliminado!");
                       
                    } else {
                        swal("Cancelado");
                        
                    }
                });
    });



});
