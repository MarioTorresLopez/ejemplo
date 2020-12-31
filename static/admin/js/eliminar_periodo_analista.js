jQuery(document).ready(function ($) {
    $('.EliminarPeridoAnalaista').click(function () {
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
                        location.href = "../analista_servicios/periodo";

                    } else {
                        swal("Cancelar", "error");

                    }
                });
    });



});



