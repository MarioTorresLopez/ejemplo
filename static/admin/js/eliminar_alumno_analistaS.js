jQuery(document).ready(function ($) {
    $('.EliminarAlumnoAnalaista').click(function () {
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
                        location.href = "../analista_servicios/alumno";

                    } else {
                        swal("Cancelar", "error");

                    }
                });
    });



});



