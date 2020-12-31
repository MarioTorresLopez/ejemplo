
///// funcion para validar los campos del formulario.
$(document).on("ready", inicio);

function inicio(){



    $('#correoEnviado').click(function(){
        

       if (validar('nombre') == false ||validar('apellido1') == false ||   validar('curp') == false
        || validar('telefono1') == false  || validar('correo1') == false || validar('correo2') == false
        || validar('calle') == false  || validar('noext') == false
        || validar('cp') == false || validar('colonia') == false  || validar('idmunicipio') == false || validar('idestado') == false
        || validar('password1') == false || validar('password2') == false) {
         return false;

 }else{
   swal({
    title: "Enviado",
    text: "Se le ha enviado un código al correo",
    type: "success"
},
function () {
                    //location.href = "../login";
                    $("#form").submit();
                });
   return false;
}

});

     //select de los municipios a partir de los estados
     $("#idestado").change(function () {
        $("#idestado option:selected").each(function () {
            provincia = $('#idestado').val();
            $.post(base_url() + "usuario/registro_nuevo_usuario/buscar_municipio1", {
                idestado: provincia
            }, function (data) {
                $("#idmunicipio").html(data);
            });
        });
    });
     
     
     $("#cancelar").click(function(){
       var apellido1 = document.getElementById("apellido1").value;
       var apellido2 = document.getElementById("apellido2").value;
       var nombre = document.getElementById("nombre").value;
       var curp = document.getElementById("curp").value;
       var telefono1 = document.getElementById("telefono1").value;
       var telefono2 = document.getElementById("telefono2").value;
       var correo1 = document.getElementById("correo1").value;
       var correo2 = document.getElementById("correo2").value;
       var password1 = document.getElementById("password1").value;
       var password2 = document.getElementById("password2").value;
       var calle = document.getElementById("calle").value;
       var noint = document.getElementById("noint").value;
       var noext = document.getElementById("noext").value;
       var colonia = document.getElementById("colonia").value;
       var cp = document.getElementById("cp").value;
       var idestado = document.getElementById("idestado").value;
       var idmunicipio = document.getElementById("idmunicipio").value;
       if ((apellido1.length!==0 && apellido1 !==null)  || (apellido2.length!==0  && apellido2 !==null)   || (nombre.length!==0  && nombre !==null)   || (curp.length!==0 && curp !==null)  
        || (telefono1.length!==0 && telefono1 !==null)    || (correo1.length!==0 && correo1 !==null)   || (correo2.length!==0  && correo2 !==null) 
        || (calle.length!==0 && calle !==null)    || (noext.length!==0 && noext !==null) || (noint.length!==0 && noint !==null) 
        || (cp.length!==0 && cp !==null)   || (colonia.length!==0 && colonia !==null)    || (idmunicipio.length!==0 && idmunicipio !=='---Seleccione---')   || (idestado.length!==0 && idestado !=='---Seleccione---')   
        || (password1.length!==0  && password1 !==null)  || (password2.length!==0 && password2 !==null) )  {
         swal({
            title: "¿Seguro?, se perderan todo sus datos",

            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {
                    location.href = "../login";
                    

                } else {
                  swal("Cancelado");

              }
          });

 }
 else{
    location.href = base_url()+"login";
}
});

    //validacion que solo sea en mayusculas
    $('#apellido1').keyup(function(){
        var valorinput = $('#apellido1').val().toUpperCase();
        $('#apellido1').val(valorinput);
        validar('apellido1');
    });

    $("#apellido2").keyup(function () {
     var valorinput = $('#apellido2').val().toUpperCase();
     $('#apellido2').val(valorinput);
     if($("#apellido2").val().length > 0) {
        validar('apellido2');
    }

    else {
        $("#apellido2").parent().removeClass('has-error');
        $("#apellido2").parent().removeClass('has-feedback');
    }


});
    $("#nombre").keyup(function () {
       var valorinput = $('#nombre').val().toUpperCase();
       $('#nombre').val(valorinput);
       validar('nombre');
   });
    $("#curp").keyup(function () {
      var valorinput = $('#curp').val().toUpperCase();
      $('#curp').val(valorinput);
      validar('curp');
  });
    $("#telefono1").keyup(function () {

        validar('telefono1');
    });

    $("#telefono2").keyup(function () {
         var valorinput = $('#telefono2').val().toUpperCase();
     $('#telefono2').val(valorinput);
        if($("#telefono2").val().length > 0) {
            validar('telefono2');
        }

        else {
            $("#telefono2").parent().removeClass('has-error');
            $("#telefono2").parent().removeClass('has-feedback');
        }

    });
    
    $("#correo1").keyup(function () {
        validar('correo1');
    });
    
    $("#correo2").keyup(function () {
        validar('correo2');
    });
    
    $("#calle").keyup(function () {
      var valorinput = $('#calle').val().toUpperCase();
      $('#calle').val(valorinput);
      validar('calle');
  });
    $("#noint").keyup(function () {
     var valorinput = $('#noint').val().toUpperCase();
     $('#noint').val(valorinput);
     if($("#noint").val().length > 0) {
        validar('noint');
    }

    else {
        $("#noint").parent().removeClass('has-error');
        $("#noint").parent().removeClass('has-feedback');
    }
});
    $("#noext").keyup(function () {
     var valorinput = $('#noext').val().toUpperCase();
     $('#noext').val(valorinput);
     validar('noext');
 });
    $("#colonia").keyup(function () {
      var valorinput = $('#colonia').val().toUpperCase();
      $('#colonia').val(valorinput);
      validar('colonia');
  });
    $("#cp").keyup(function () {
        validar('cp');
    });
    $("#idestado").change(function () {

        validar('idestado');
    });
    $("#idmunicipio").change(function () {
        validar('idmunicipio');
    });

    $("#password1").keyup(function () {
        validar('password1');
    });
    $("#password2").keyup(function () {
        validar('password2');
    });
}

function validar(input){
   var x = false;

   if(input==='apellido1' ){
     var apellido1 = document.getElementById("apellido1").value;
     if(apellido1 === null || apellido1.length == 0 || /^\s+$/.test(apellido1) || apellido1==""){
       $("#iconotexto").remove();
       $("#apellido1").parent().parent().attr("class","form-group has-error has-feedback");
       $("#apellido1").parent().children("span").text("Debe ingresar el primer apellido.").show();
       $("#apellido1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
   }
   if(!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(apellido1)){
       $("#iconotexto").remove();
       $("#apellido1").parent().parent().attr("class","form-group has-error has-feedback");
       $("#apellido1").parent().children("span").text("No se aceptan caracteres especiales").show();
       $("#apellido1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
   }

   else{
     $("#iconotexto").remove();
     $("#apellido1").parent().parent().attr("class","form-group has-success has-feedback");
     $("#apellido1").parent().children("span").text("").hide();
     $("#apellido1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

     return true;

 }
}
if(input==='apellido2' ){
 var apellido2 = document.getElementById("apellido2").value;
 if(apellido2 === null || apellido2.length == 0 || /^\s+$/.test(apellido2) || apellido2==""){
    $("#iconotexto").remove();
    $("#apellido2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#apellido2").parent().children("span").text("Debe ingresar el segundo apellido.").show();
    $("#apellido2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

}
if(!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(apellido2)){
    $("#iconotexto").remove();
    $("#apellido2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#apellido2").parent().children("span").text("No se aceptan caracteres especiales.").show();
    $("#apellido2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}

else{
   $("#iconotexto").remove();
   $("#apellido2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido2").parent().children("span").text("").hide();
   $("#apellido2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}

if(input==='nombre' ){
 var nombre = document.getElementById("nombre").value;
 if(nombre === null || nombre.length == 0 || /^\s+$/.test(nombre)|| nombre==""){
    $("#iconotexto").remove();
    $("#nombre").parent().parent().attr("class","form-group has-error has-feedback");
    $("#nombre").parent().children("span").text("Debe ingresar el nombre.").show();
    $("#nombre").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}

if(!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(nombre)){
    $("#iconotexto").remove();
    $("#nombre").parent().parent().attr("class","form-group has-error has-feedback");
    $("#nombre").parent().children("span").text("No se aceptan caracteres especiales.").show();
    $("#nombre").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}

else{
   $("#iconotexto").remove();
   $("#nombre").parent().parent().attr("class","form-group has-success has-feedback");
   $("#nombre").parent().children("span").text("").hide();
   $("#nombre").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}
if(input==='curp' ){
 var curp = document.getElementById("curp").value;
 if(curp === null || curp.length == 0 || /^\s+$/.test(curp) || curp=="" ||!/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/.test(curp)){
    $("#iconotexto").remove();
    $("#curp").parent().parent().attr("class","form-group has-error has-feedback");
    $("#curp").parent().children("span").text("Debe ingresar una curp válida.").show();
    $("#curp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if(curp.length!==18){
    $("#iconotexto").remove();
    $("#curp").parent().parent().attr("class","form-group has-error has-feedback");
    $("#curp").parent().children("span").text("El curp debe ser de 18 digitos").show();
    $("#curp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}

else {
   $("#iconotexto").remove();
   $("#curp").parent().parent().attr("class","form-group has-success has-feedback");
   $("#curp").parent().children("span").text("").hide();
   $("#curp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}

if(input==='telefono1' ){
 var telefono1 = document.getElementById("telefono1").value;
 if(telefono1 === null || telefono1.length == 0 || /^\s+$/.test(telefono1) || telefono1==""){
    $("#iconotexto").remove();
    $("#telefono1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono1").parent().children("span").text("Debe ingresar el telefono").show();
    $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if(isNaN(telefono1)){
    $("#iconotexto").remove();
    $("#telefono1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono1").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
    $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
} 
else if(telefono1.length<7){
    $("#iconotexto").remove();
    $("#telefono1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono1").parent().children("span").text("El telefono debe ser mayor de 6 digitos").show();
    $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if(telefono1.length>10){
    $("#iconotexto").remove();
    $("#telefono1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono1").parent().children("span").text("El telefono debe ser menor de 10 digitos").show();
    $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}


else {
   $("#iconotexto").remove();
   $("#telefono1").parent().parent().attr("class","form-group has-success has-feedback");
   $("#telefono1").parent().children("span").text("").hide();
   $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}

if(input==='telefono2' ){
    
    
 var telefono2 = document.getElementById("telefono2").value;
 if(telefono2 === null || telefono2.length == 0 || /^\s+$/.test(telefono2) || telefono2==""){
    $("#iconotexto").remove();
    $("#telefono2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono2").parent().children("span").text("Debe ingresar el telefono").show();
    $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   
}
else if(isNaN(telefono2)){
    $("#iconotexto").remove();
    $("#telefono2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono2").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
    $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
} 
else if(telefono2.length<7){
    $("#iconotexto").remove();
    $("#telefono2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono2").parent().children("span").text("El telefono debe ser mayor de 6 digitos").show();
    $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if(telefono2.length>10){
    $("#iconotexto").remove();
    $("#telefono2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#telefono2").parent().children("span").text("El telefono debe ser menor de 10 digitos").show();
    $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}


else {
   $("#iconotexto").remove();
   $("#telefono2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#telefono2").parent().children("span").text("").hide();
   $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}
if(input==='correo1' ){
 var correo1 = document.getElementById("correo1").value;
 if(!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo1)) && correo1.length > 0){
    $("#iconotexto").remove();
    $("#correo1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#correo1").parent().children("span").text("Ingresar un correo valido").show();
    $("#correo1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if (correo1.length === 0 || correo1=="" ){
    $("#iconotexto").remove();
    $("#correo1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#correo1").parent().children("span").text("Ingresar correo").show();
    $("#correo1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else {
   $("#iconotexto").remove();
   $("#correo1").parent().parent().attr("class","form-group has-success has-feedback");
   $("#correo1").parent().children("span").text("").hide();
   $("#correo1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}
if(input==='correo2' ){
 var correo1 = document.getElementById("correo1").value;
 var correo2 = document.getElementById("correo2").value;
 if(!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo2)) && correo2.length > 0){
    $("#iconotexto").remove();
    $("#correo2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#correo2").parent().children("span").text("Ingresar un correo valido").show();
    $("#correo2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if (correo2.length === 0 || correo2=="" ){
    $("#iconotexto").remove();
    $("#correo2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#correo2").parent().children("span").text("Ingresar correo").show();
    $("#correo2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if(correo1 !== correo2){
    $("#iconotexto").remove();
    $("#correo2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#correo2").parent().children("span").text("Los correos deben ser iguales").show();
    $("#correo2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if (correo1 == correo2){
   $("#iconotexto").remove();
   $("#correo2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#correo2").parent().children("span").text("").hide();
   $("#correo2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}

if(input==='password1' ){
 var password1 = document.getElementById("password1").value;

 if (password1.length === 0 || password1=="" ){
    $("#iconotexto").remove();
    $("#password1").parent().parent().attr("class","form-group has-error has-feedback");
    $("#password1").parent().children("span").text("Ingresar contraseña").show();
    $("#password1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else {
   $("#iconotexto").remove();
   $("#password1").parent().parent().attr("class","form-group has-success has-feedback");
   $("#password1").parent().children("span").text("").hide();
   $("#password1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}
if(input==='password2' ){
 var password1 = document.getElementById("password1").value;
 var password2 = document.getElementById("password2").value;

 if (password2.length === 0 || password2=="" ){
    $("#iconotexto").remove();
    $("#password2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#password2").parent().children("span").text("Ingresar contraseña").show();
    $("#password2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if(password1 !== password2){
    $("#iconotexto").remove();
    $("#password2").parent().parent().attr("class","form-group has-error has-feedback");
    $("#password2").parent().children("span").text("Las contraseñas deben ser iguales").show();
    $("#password2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
    return false;
}
else if (password1 == password2){
   $("#iconotexto").remove();
   $("#password2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#password2").parent().children("span").text("").hide();
   $("#password2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
}
}



if(input==='calle' ){
 var calle = document.getElementById("calle").value;
 if(calle === null || calle.length == 0 || /^\s+$/.test(calle) || calle==""){
   $("#iconotexto").remove();
   $("#calle").parent().parent().attr("class","form-group has-error has-feedback");
   $("#calle").parent().children("span").text("Debe ingresar la calle.").show();
   $("#calle").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}
if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(calle)){
   $("#iconotexto").remove();
   $("#calle").parent().parent().attr("class","form-group has-error has-feedback");
   $("#calle").parent().children("span").text("No se aceptan caracteres especiales.").show();
   $("#calle").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}

else{
 $("#iconotexto").remove();
 $("#calle").parent().parent().attr("class","form-group has-success has-feedback");
 $("#calle").parent().children("span").text("").hide();
 $("#calle").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='noint' ){
 var noint = document.getElementById("noint").value;
 if(noint === null || noint.length == 0 || /^\s+$/.test(noint) || noint==""){
   $("#iconotexto").remove();
   $("#noint").parent().parent().attr("class","form-group has-error has-feedback");
   $("#noint").parent().children("span").text("Debe ingresar el numero interior.").show();
   $("#noint").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}
else if(noint.length>5){
 $("#iconotexto").remove();
 $("#noint").parent().parent().attr("class","form-group has-error has-feedback");
 $("#noint").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
 $("#noint").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
 return false;
}

else{
 $("#iconotexto").remove();
 $("#noint").parent().parent().attr("class","form-group has-success has-feedback");
 $("#noint").parent().children("span").text("").hide();
 $("#noint").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='noext' ){
 var noext = document.getElementById("noext").value;
 if(noext === null || noext.length == 0 || /^\s+$/.test(noext) || noext==""){
   $("#iconotexto").remove();
   $("#noext").parent().parent().attr("class","form-group has-error has-feedback");
   $("#noext").parent().children("span").text("Debe ingresar el numero exterior.").show();
   $("#noext").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}
else if(noext.length>5){
 $("#iconotexto").remove();
 $("#noext").parent().parent().attr("class","form-group has-error has-feedback");
 $("#noext").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
 $("#noext").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
 return false;
}
else{
 $("#iconotexto").remove();
 $("#noext").parent().parent().attr("class","form-group has-success has-feedback");
 $("#noext").parent().children("span").text("").hide();
 $("#noext").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='colonia' ){
 var colonia = document.getElementById("colonia").value;
 if(colonia === null || colonia.length == 0 || /^\s+$/.test(colonia) || colonia==""){
   $("#iconotexto").remove();
   $("#colonia").parent().parent().attr("class","form-group has-error has-feedback");
   $("#colonia").parent().children("span").text("Debe ingresar la colonia").show();
   $("#colonia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}
if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(colonia)){
   $("#iconotexto").remove();
   $("#colonia").parent().parent().attr("class","form-group has-error has-feedback");
   $("#colonia").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#colonia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}

else{
 $("#iconotexto").remove();
 $("#colonia").parent().parent().attr("class","form-group has-success has-feedback");
 $("#colonia").parent().children("span").text("").hide();
 $("#colonia").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='cp' ){
 var cp = document.getElementById("cp").value;
 if(cp === null || cp.length == 0 || /^\s+$/.test(cp) || cp==""){
   $("#iconotexto").remove();
   $("#cp").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp").parent().children("span").text("Debe ingresar el codigo postal").show();
   $("#cp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}
if(isNaN(cp)){
 $("#iconotexto").remove();
 $("#cp").parent().parent().attr("class","form-group has-error has-feedback");
 $("#cp").parent().children("span").text("No se aceptan numeros o caracteres especiales").show();
 $("#cp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
 return false;
}
if(cp.length !==5){
 $("#iconotexto").remove();
 $("#cp").parent().parent().attr("class","form-group has-error has-feedback");
 $("#cp").parent().children("span").text("El codigo postal deben ser 5 digitos").show();
 $("#cp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
 return false;
}

else{
 $("#iconotexto").remove();
 $("#cp").parent().parent().attr("class","form-group has-success has-feedback");
 $("#cp").parent().children("span").text("").hide();
 $("#cp").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='idestado' ){
 var idestado = document.getElementById("idestado").value;
 if(idestado == '---Seleccione---'){
   $("#iconotexto").remove();
   $("#idestado").parent().parent().attr("class","form-group has-error has-feedback");
   $("#idestado").parent().children("span").text("Debe ingresar la entidad federativa").show();
   $("#idestado").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}

else{
 $("#iconotexto").remove();
 $("#idestado").parent().parent().attr("class","form-group has-success has-feedback");
 $("#idestado").parent().children("span").text("").hide();
 $("#idestado").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='idmunicipio' ){ 
 var idmunicipio = document.getElementById("idmunicipio").value;
 if(idmunicipio == '---Seleccione---'){
   $("#iconotexto").remove();
   $("#idmunicipio").parent().parent().attr("class","form-group has-error has-feedback");
   $("#idmunicipio").parent().children("span").text("Debe ingresar el municipio").show();
   $("#idmunicipio").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
}

else{
 $("#iconotexto").remove();
 $("#idmunicipio").parent().parent().attr("class","form-group has-success has-feedback");
 $("#idmunicipio").parent().children("span").text("").hide();
 $("#idmunicipio").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}


}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


