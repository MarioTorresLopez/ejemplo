/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Actualización
///// funcion para validar los campos del formulario.
$(document).on("ready", inicio);

function inicio() {
    var c1=0,c2=0,c3=0,c4=0;
    var verificar =[];
    console.log('c1',c1);
    console.log('array',verificar);
    
    $("#idrol").change(function () {
        validar('idrol');
    });
    
    $("#idmodulo").change(function () {
        validar('idmodulo');
    });
    
    $("#ch1").change(function(){
        verificar.push(1);
    });
    
    $("#ch2").change(function(){
        verificar.push(2);
    });
    
    $("#ch3").change(function(){
        verificar.push(3);
    });
    
    $("#ch4").change(function(){
        verificar.push(4);
    });

    $('#botonRol').click(function () {

        if (validar('nombre_rol') == false) {
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
    
    $('#botonmodulo').click(function(){
        if(validar('idrol')===false || validar('idmodulo')===false || verificar.length===0){
            swal({
                title: "Alerta",
                text: "Se requiere seleccionar el rol, módulo y mínimo un permiso",
                type: "error"
            },
                    function () {
                        
                    });
            return false;
        }
        else{
            swal({
                title: "Registrado",
                text: "Se ha registado",
                type: "success"
            },
                    function () {
                        $("#form1").submit();
                    });
            return false;
        }
    });

    $("#nombre_rol").keyup(function () {
        var valorinput = $('#nombre_rol').val().toUpperCase();
        $('#nombre_rol').val(valorinput);
        validar('nombre_rol');
    });



}
function validar(input) {

    var x = false;

    if (input === 'nombre_rol') {
        var nombre_rol = document.getElementById("nombre_rol").value;
        if (nombre_rol === null || nombre_rol.length == 0 || /^\s+$/.test(nombre_rol) || nombre_rol == "") {
            $("#iconotexto1").remove();
            $("#nombre_rol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_rol").parent().children("span").text("Debe ingresar el nombre.").show();
            $("#nombre_rol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre_rol)) {
            $("#iconotexto1").remove();
            $("#nombre_rol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_rol").parent().children("span").text("No se aceptan carácteres especiales").show();
            $("#nombre_rol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#nombre_rol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_rol").parent().children("span").text("").hide();
            $("#nombre_rol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;

        }
    }
    if (input === 'idrol') {
        var idrol = document.getElementById("idrol").value;
        if (idrol == '---Seleccione---') {
            $("#iconotexto2").remove();
            $("#idrol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#idrol").parent().children("span").text("Debe seleccionar el rol").show();
            $("#idrol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#idrol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#idrol").parent().children("span").text("").hide();
            $("#idrol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'idmodulo') {
        var idrol = document.getElementById("idmodulo").value;
        if (idrol == '---Seleccione---') {
            $("#iconotexto3").remove();
            $("#idmodulo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#idmodulo").parent().children("span").text("Debe seleccionar el modulo").show();
            $("#idmodulo").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#idmodulo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#idmodulo").parent().children("span").text("").hide();
            $("#idmodulo").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }

}

