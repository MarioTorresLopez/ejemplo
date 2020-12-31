    /* 
 * Script para eliminar un rol
*/
jQuery(document).ready(function ($) {
    
    $(document).on("click", ".eliminacionAdminRol", function (e) {
    //$('.eliminacionAdminRol').click(function () {
        var ww = $(this);
        var rr = $(this);
        //Eliminación total de los permisos del modulo correspondiente a ese rol
        
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
                       location.href = base_url()+"administrador/roles_admin/eliminar_rol_permisos_modulo/"+ww.attr('data-idrol')+"/"+rr.attr('data-idmodulo');
                       
                    } else {
                        swal("Cancelar", "error");
                        
                    }
                });
    });

    
});