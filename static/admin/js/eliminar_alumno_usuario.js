jQuery(document).ready(function ($) {
    $('.EliminarAlumnoUsuario').click(function () {
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
                        location.href = "../usuario/alumno";

                    } else {
                        swal("Cancelar", "error");

                    }
                });
    });
    
    $('.EliminarAlumnoLUsuario').click(function () {
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
                        location.href = "../usuario/alumno_lista";

                    } else {
                        swal("Cancelar", "error");

                    }
                });
    });
});
