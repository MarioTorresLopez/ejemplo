
$(function () {
    var dialog, form,
            tips = $(".validateTips");

    $("#a1").change(function () {
        validar('a1');
        cancelar('a1');
    });

    function validar() {
        var ar = document.getElementById("a1").value;
        if (ar.length !== 0) {
            var pdffile, pdffile_url,
                    pdffile = document.getElementById("a1").files[0];
            pdffile_url = URL.createObjectURL(pdffile);
            $('#viewer').attr('src', pdffile_url);
            $(".ui-dialog-buttonset").hide();
            $('#guardar').show();
            $('#cancelar').show();

        }
    }

    $("#guardar").click(function () {

    });

    $("#cancelar").click(function () {
        $(".ui-dialog-buttonset").show();
        $('#guardar').hide();
        $('#cancelar').hide();
        var ar2 = document.getElementById('a1').value = '';

        $('#viewer').attr('src', ar2);



    });



    function editar_documento() {
        $("#a1").trigger("click");

    }


    dialog = $("#documento").dialog({
        autoOpen: false,
        height: 550,
        width: 550,
        modal: true,
        show: "blind",
        hide: "scale",
        buttons: {
            "Adjuntar": editar_documento,
            Cancelar: function () {
                dialog.dialog("close");
            }}
    });

    form = dialog.find("form").on("submit", function (event) {
        event.preventDefault();

    });

    $(".mostrarDocumento").button().on("click", function () {
        dialog.dialog("open");
    });
    $("#nuevopdf").change(function () {
        $("button").prop("disabled", this.files.length == 0);
    });
    
        
    function enviarPdf(idinsti, a1) {

        $.ajax({

            url: base_url()+'usuario/tramite/registro_plan',
            type: 'POST',
            data: {
                idinsti: idinsti,
                pdf: a1
            },
            success: function (respuesta) {
                if (respuesta === "OK") {
                    alert ("Insertado");
                }
            },
            error: function () {
                alert('error');
            }

        });

    }


});
