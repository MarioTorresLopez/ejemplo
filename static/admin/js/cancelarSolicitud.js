
$('.eliminacion').click(function () {

    var elem = $(this);

    swal({
        title: "¿Seguro que desea eliminar la solicitud?",

        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {

                    location.href = "../eliminar/" + elem.attr('data-id');

                } else {
                    swal("Cancelado", "");

                }
            });
});

// Toastr options
toastr.options = {
    "debug": false,
    "newestOnTop": false,
    "positionClass": "toast-top-center",
    "closeButton": true,
    "toastClass": "animated fadeInDown",
};

$('.homerDemo1').click(function () {
    toastr.info('Info - This is a custom Homer info notification');
});

$('.homerDemo2').click(function () {
    toastr.success('Success - This is a Homer success notification');
});

$('.homerDemo3').click(function () {
    toastr.warning('Warning - This is a Homer warning notification');
});

$('.homerDemo4').click(function () {
    toastr.error('Error - This is a Homer error notification');
});