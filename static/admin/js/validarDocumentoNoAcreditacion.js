/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", inicio);

function inicio() {
    
    $("span.help-block").hide();
    
    $("#no_acre_inco").change(function (){
        validar('no_acre_inco');
    });
    
    
    $("#btnValidarDoc1").click(function () {
        
        if (validar('no_acre_inco') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form1').submit();
                }
            );
            return false;
        }

    });

}

function validar(campo) {
    
    var no_acre_inco   = document.getElementById("no_acre_inco").value;
    
    if (campo === 'no_acre_inco') {

        if (no_acre_inco === null || no_acre_inco === "") {
            $("#iconotexto1").remove();
            $("#no_acre_inco").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#no_acre_inco").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#no_acre_inco").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#no_acre_inco").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#no_acre_inco").parent().children("span").text("").hide();
            $("#no_acre_inco").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
}
