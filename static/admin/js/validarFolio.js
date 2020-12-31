$(document).on("ready", inicio);

function inicio() {
    var consec=$("#id_sol").val();
    
    var year = (new Date).getFullYear();
    
    if(consec.length==1){
        $("#numero_folio").val("IN"+year+"-000"+consec).toUpperCase();
    }
    if(consec.length==2){
        $("#numero_folio").val("IN"+year+"-00"+consec).toUpperCase();
    }
    if(consec.length==3){
        $("#numero_folio").val("IN"+year+"-0"+consec).toUpperCase();
    }
    if(consec.length==4){
        $("#numero_folio").val("IN"+year+"-"+consec).toUpperCase();
    }
    
    //$("#numero_folio").val("IN"+year+"-000"+consec).toUpperCase();

    $("span.help-block").hide();


    $("#numero_folio").keyup(function () {
        var validarinput = $('#numero_folio').val().toUpperCase();
        $('#numero_folio').val(validarinput);
        validar('numero_folio');
    });
    
    $("#idanalista").change(function () {
        validar('idanalista');
//        parametroanalista=$("#idanalista").val();
//        parametroinstitucion=$("#id_inst").val();
//        var datosanalista=parametroanalista;
//        var datos=parametroinstitucion;
//    
//        localStorage.setItem("datosanalista",JSON.stringify(datosanalista));
//        localStorage.setItem("datos",JSON.stringify(datos));
//        console.log(parametroanalista);
//        console.log(parametroinstitucion);
        
        
    });
    
    $("#btnvalidar").click(function () {
        if (validar('numero_folio') === false || validar('idanalista') == false) {

            swal({
                title: "Alerta",
                text: "Sus campos no estan validados.",
                type: "warning"
            });

            return false;

        } 
        
        else {

            swal({
                title: "Registro",
                text: "Sus datos han sido capturados.",
                type: "success"
            },
                function () {
                    $('#form').submit();
                }
            );
            return false;
        }
        
    });

}

function validar(campo) {

    var numFol = document.getElementById("numero_folio").value;
    var idanalista = document.getElementById("idanalista").value;
    
    if (campo === 'numero_folio') {

        if (numFol === null || numFol.length === 0 || /^\s+$/.test(numFol)) {
            $("#iconotexto1").remove();
            $("#numero_folio").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#numero_folio").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#numero_folio").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (numFol.length > 50) {
            $("#iconotexto1").remove();
            $("#numero_folio").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#numero_folio").parent().children("span").text("El campo no debe de tener más de 50 caracteres.").show();
            $("#numero_folio").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#numero_folio").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#numero_folio").parent().children("span").text("").hide();
            $("#numero_folio").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'idanalista') {
        
        if (idanalista == '---Seleccione---') {
            $("#iconotexto1").remove();
            $("#idanalista").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#idanalista").parent().children("span").text("Debe seleccionar un analista").show();
            $("#idanalista").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }

        else {
            $("#iconotexto1").remove();
            $("#idanalista").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#idanalista").parent().children("span").text("").hide();
            $("#idanalista").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }

}

