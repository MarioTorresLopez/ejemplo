/* 
 * Script para eliminar un usuario 
*/
jQuery(document).ready(function ($) {
     $(document).on("click", ".eliminacionUsuRol", function (e) {  
         
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
                        location.href = base_url()+"administrador/roles_usuario/eliminar_roles_usuario/"+elem.attr('data-id');
             
                       
                    } else {
                        swal("Cancelar", "error");
                        
                    }
                });
    });

    
});