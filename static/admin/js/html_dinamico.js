jQuery(document).ready(function($) {
    $("#agrega-html").click(function(event) {

       

        var cantidad = $("#cantidad").val();
        cantidad = parseInt(cantidad);

     

        for(var i = 0; i < cantidad; i++) {
            var HTML = '<div class="col-sm-4"><div class="form-group"><input type="text" name="dato_dinamico[]" id="cantidad-'+i+'" class="form-control" placeholder="Ingresa valor"></div></div>';
            $("#contenido-dinamico").append(HTML);
        }

    });
});
