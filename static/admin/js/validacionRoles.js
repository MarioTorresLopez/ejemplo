/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



///// funcion para validar los campos del formulario.
$(document).on("ready", inicio);

function inicio(){

      $('#botonRol').click(function(){
            
       if (validar('nombreRol') == false ||  validar('correoRol') == false || validar('password') == false
               || validar('idrol') == false || validar('fechainivig') == false || validar('fechafinvig') == false  ) {
             return false;
           
        }
        
        else{
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
    
    $("#nombreRol").keyup(function () {
          var valorinput = $('#nombreRol').val().toUpperCase();
        $('#nombreRol').val(valorinput);
        validar('nombreRol');
      });
    
     $("#correoRol").keyup(function () {
        validar('correoRol');
    });
     $("#password").keyup(function () {
        validar('password');
    });
     $("#password").keyup(function () {
        validar('password');
    });
       $("#idrol").change(function () {
        validar('idrol');
    });
       $("#fechainivig").keyup(function () {
        validar('fechainivig');
    });
       $("#fechafinvig").keyup(function () {
        validar('fechafinvig');
    });
}


function validar(input){
   
   var x = false;

if(input==='nombreRol' ){
     var nombreRol = document.getElementById("nombreRol").value;
    if(nombreRol === null || nombreRol.length == 0 || /^\s+$/.test(nombreRol) || nombreRol==""){
        $("#iconotexto1").remove();
        $("#nombreRol").parent().parent().attr("class","form-group has-error has-feedback");
        $("#nombreRol").parent().children("span").text("Debe ingresar el nombre.").show();
        $("#nombreRol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
    }
    if(!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombreRol)){
       $("#iconotexto1").remove();
        $("#nombreRol").parent().parent().attr("class","form-group has-error has-feedback");
        $("#nombreRol").parent().children("span").text("No se aceptan carácteres especiales").show();
        $("#nombreRol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
    }
    
    else{
     $("#iconotexto1").remove();
        $("#nombreRol").parent().parent().attr("class","form-group has-success has-feedback");
        $("#nombreRol").parent().children("span").text("").hide();
        $("#nombreRol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
  
      return true;
       
    }
}

if(input==='correoRol' ){
     var correoRol = document.getElementById("correoRol").value;
    if(!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correoRol)) && correoRol.length > 0){
        $("#iconotexto2").remove();
        $("#correoRol").parent().parent().attr("class","form-group has-error has-feedback");
        $("#correoRol").parent().children("span").text("Ingresar un correo válido").show();
        $("#correoRol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
      return false;
    }
    else if (correoRol.length === 0 || correoRol=="" ){
        $("#iconotexto2").remove();
        $("#correoRol").parent().parent().attr("class","form-group has-error has-feedback");
        $("#correoRol").parent().children("span").text("Ingresar correo").show();
        $("#correoRol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
    }
    else {
       $("#iconotexto2").remove();
        $("#correoRol").parent().parent().attr("class","form-group has-success has-feedback");
        $("#correoRol").parent().children("span").text("").hide();
        $("#correoRol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
       
      return true;
    }
}
if(input==='password' ){
     var password = document.getElementById("password").value;
    if(password === null || password.length == 0 || /^\s+$/.test(password) || password==""){
        $("#iconotexto3").remove();
        $("#password").parent().parent().attr("class","form-group has-error has-feedback");
        $("#password").parent().children("span").text("Debe solo 8 carácteres").show();
        $("#password").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
     return false;
        }
    else if(password.length<8){
        $("#iconotexto3").remove();
        $("#password").parent().parent().attr("class","form-group has-error has-feedback");
        $("#password").parent().children("span").text("La contraseña debe tener menos de 8 digítos").show();
        $("#password").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
     return false;
        }
    else {
       $("#iconotexto3").remove();
        $("#password").parent().parent().attr("class","form-group has-success has-feedback");
        $("#password").parent().children("span").text("").hide();
        $("#password").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
     
      return true;
    }
}
if(input==='idrol' ){
     var idrol = document.getElementById("idrol").value;
    if(idrol == '--Selecciona--'){
       $("#iconotexto4").remove();
        $("#idrol").parent().parent().attr("class","form-group has-error has-feedback");
        $("#idrol").parent().children("span").text("Debe ingresar el rol").show();
        $("#idrol").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
     return false;
    }   
    else{
     $("#iconotexto4").remove();
        $("#idrol").parent().parent().attr("class","form-group has-success has-feedback");
        $("#idrol").parent().children("span").text("").hide();
        $("#idrol").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
         
      return true;
    }
}
if(input==='fechainivig' ){
     var fechainivig = document.getElementById("fechainivig").value;
    if(fechainivig == ''){
       $("#iconotexto5").remove();
        $("#fechainivig").parent().parent().attr("class","form-group has-error has-feedback");
        $("#fechainivig").parent().children("span").text("Debe asignar la fecha de inicio").show();
        $("#fechainivig").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
     return false;
    }
   
    else{
     $("#iconotexto5").remove();
        $("#fechainivig").parent().parent().attr("class","form-group has-success has-feedback");
        $("#fechainivig").parent().children("span").text("").hide();
        $("#fechainivig").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
         
      return true;
    }
}
if(input==='fechafinvig' ){
     var fechafinvig = document.getElementById("fechafinvig").value;
    if(fechafinvig == ''){
       $("#iconotexto6").remove();
        $("#fechafinvig").parent().parent().attr("class","form-group has-error has-feedback");
        $("#fechafinvig").parent().children("span").text("Debe asignar la fecha de vigencia").show();
        $("#fechafinvig").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
     return false;
    }
   
    else{
     $("#iconotexto6").remove();
        $("#fechafinvig").parent().parent().attr("class","form-group has-success has-feedback");
        $("#fechafinvig").parent().children("span").text("").hide();
        $("#fechafinvig").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
         
      return true;
    }
}
}
    
