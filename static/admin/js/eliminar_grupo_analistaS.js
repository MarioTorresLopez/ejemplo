jQuery(document).ready(function ($) {
    $('.EliminarGrupoAnalaista').click(function () {
        swal({
            title: "¿Seguro que desea eliminarlo?",

            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        location.href = "../analista_servicios/grupo";

                    } else {
                        swal("Cancelar", "error");

                    }
                });
    });



});



