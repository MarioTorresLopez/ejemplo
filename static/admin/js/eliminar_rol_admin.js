/* 
 * Script para eliminar un rol
*/
jQuery(document).ready(function ($) {
    
      $('#nombreRol').keyup(function(e){
        var valorinput = $('#nombreRol').val().toUpperCase();
        $('#nombreRol').val(valorinput);
    });
        $("#correoRol").keyup(function () {
        validar('correoRol');
    });
    
    $(document).on("click", ".eliminacionUsuRol", function (e) {
    //$('.eliminacionUsuRol').click(function () {
    
              var elem = $(this);
        
        swal({
            title: "¿Está seguro de eliminarlo?",
              
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                      //  location.href = "../administrador/roles_usuario/eliminar_roles_usuario/"+elem.attr('data-id');
                       location.href = base_url()+"administrador/roles_admin/eliminar_roles_usuario/"+elem.attr('data-id');
                       
                    } else {
                        swal("Cancelar", "");
                        
                    }
                });
    });
    
     /* toastr.options = {
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
    }); */

    
});