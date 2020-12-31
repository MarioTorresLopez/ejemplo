/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var dialog, form,tips = $(".validateTips");

    $("#nuevoAcuerdo").change(function () {
        validar('nuevoAcuerdo');
    });

    function validar() {
        var ar = document.getElementById("nuevoAcuerdo").value;
        if (ar.length !== 0) {
            
            var pdffile, pdffile_url,pdffile = document.getElementById("nuevoAcuerdo").files[0];
            pdffile_url = URL.createObjectURL(pdffile);
            $('#acuerdo').attr('src', pdffile_url);
            $("#editarAcuerdo").hide();
            $('#aceptarAcuerdo').show();
            $('#cancelarAcuerdo').show();

        }
    }

    $("#aceptarAcuerdo").click(function () {

    });

    $("#cancelarAcuerdo").click(function () {
        
        $("#editarAcuerdo").show();
        $('#aceptarAcuerdo').hide();
        $('#cancelarAcuerdo').hide();
        $('#editarAcuerdo').show();
        var ar2 = document.getElementById('nuevoAcuerdo').value = '';
        $('#acuerdo').attr('src', ar2);

    });

    function editar_acuerdo() {
        $("#nuevoAcuerdo").trigger("click");
    }
    
    $("#editarAcuerdo").click(function () {
        editar_acuerdo();
    });

});
