/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {
    $(document).on("click", ".noti", function (e) {
        var elem = $(this);
        var idnoti=elem.attr('data-id');
        $.ajax({
            url: base_url() + "app/inicio/leer_noti",
            type: "post",
            dataType: "json",
            data: {
                id: idnoti
            },
            success: function (json) {
                
            },
            error: function (a, b, c) {
                alert("No se ha leido " + c);
                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
            }
        });
    });
});

