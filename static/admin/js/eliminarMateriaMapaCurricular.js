/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {

    $('.eliminacion').click(function () {

        var elem = $(this);
        var idpe = document.getElementById("id_pe").value;
        var idinstitucion = document.getElementById("id_institucion").value;

        swal({
            title: "¿Seguro que desea eliminar la materia?",

            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {

                        location.href = base_url()+"analista_servicios/gestion_mapacurricular_materias/eliminar/"+elem.attr('data-id')+"/"+elem.attr('data-mc')+"/"+idpe+"/"+idinstitucion;
                        
                    } else {
                        swal("Cancelado", "");

                    }
                });
    });

});