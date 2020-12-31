/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);
function inicio() {
  
    $('#botonBitacora').click(function () {

        if (validar('bitacora') == false) {
            return false;

        } else {
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form").submit();
                    });
            return false;
        }

    });
   
   
    $("#bitacora").keyup(function () {
        var valorinput = $('#bitacora').val().toUpperCase();
        $('#bitacora').val(valorinput);
        validar('bitacora');
    });
    
     $("#fecha").keyup(function () {
        validar('fecha');
    });
    
    

}
function validar(input) {

    var x = false;

    if (input === 'bitacora') {
        var bitacora = document.getElementById("bitacora").value;
        if (bitacora === null || bitacora.length == 0 || /^\s+$/.test(bitacora) || bitacora == "") {
            $("#iconotexto55").remove();
            $("#bitacora").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#bitacora").parent().children("span").text("Debe ingresar las actividades realizadas.").show();
            $("#bitacora").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(bitacora)) {
            $("#iconotexto55").remove();
            $("#bitacora").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#bitacora").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#bitacora").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto55").remove();
            $("#bitacora").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#bitacora").parent().children("span").text("").hide();
            $("#bitacora").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    if(input==='fecha' ){
     var fecha = document.getElementById("fecha").value;
    if(fecha == ''){
       $("#iconotexto6").remove();
        $("#fecha").parent().parent().attr("class","form-group has-error has-feedback");
        $("#fecha").parent().children("span").text("Debe asignar la fecha correcta").show();
        $("#fecha").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
     return false;
    }
   
    else{
     $("#iconotexto6").remove();
        $("#fecha").parent().parent().attr("class","form-group has-success has-feedback");
        $("#fecha").parent().children("span").text("").hide();
        $("#fecha").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
         
      return true;
    }
}
      
}