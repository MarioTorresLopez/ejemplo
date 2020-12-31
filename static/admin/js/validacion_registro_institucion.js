
var contadorRepresentante=1 ;

///// funcion para validar los campos del formulario.
$(document).on("ready", inicio);

function inicio(){

  $('#validacion_registro_institucion').click(function(){
      
     


   if (validar('persona') == false ||validar('idnivel') == false || validar('nombre1_institucion') == false
    || validar('calle_institucion') == false 
    || validar('no_exterior_institucion') == false  || validar('colonia_institucion') == false
    || validar('cp_institucion') == false || validar('idestado_institucion') == false  || validar('idmunicipio_institucion') == false) {
    
     return false;

   }else{
     swal({
      title: "Enviado",
           // text: "Se le ha enviado un codigo al correo",
           type: "success"
         },
         function () {
                    //location.href = "../login";
                    $("#form").submit();
                    
                    
                  });
     return false;
   }

 });


  $("#cancelar_institucion").click(function () {
    var persona = document.getElementById("persona").value;
    var idnivel = document.getElementById("idnivel").value;
    var idmodalidad = document.getElementById("idmodalidad").value;
     var plan_estudios = document.getElementById("plan_estudios").value;
      var programa = document.getElementById("programa").value;
    var nombre1_institucion = document.getElementById("nombre1_institucion").value;
    var nombre2_institucion = document.getElementById("nombre2_institucion").value;
      var nombre3_institucion = document.getElementById("nombre3_institucion").value;
    var telefono_institucion = document.getElementById("telefono_institucion").value;
    var calle_institucion = document.getElementById("calle_institucion").value;
    var no_interior_institucion = document.getElementById("no_interior_institucion").value;
    var no_exterior_institucion = document.getElementById("no_exterior_institucion").value;
    var colonia_institucion = document.getElementById("colonia_institucion").value;
    var cp_institucion = document.getElementById("cp_institucion").value;
    var idestado_institucion = document.getElementById("idestado_institucion").value;
    var idmunicipio_institucion = document.getElementById("idmunicipio_institucion").value;
    var apellido1_propietario = document.getElementById("apellido1_propietario").value;
    var apellido2_propietario = document.getElementById("apellido2_propietario").value;
    var nombre_propietario = document.getElementById("nombre_propietario").value;
    var telefono_propietario = document.getElementById("telefono_propietario").value;
    var correo_propietario = document.getElementById("correo_propietario").value;
    var rfc_propietario = document.getElementById("rfc_propietario").value;
    var calle_oirnotificacion = document.getElementById("calle_oirnotificacion").value;
    var no_interior_oirnotificacion = document.getElementById("no_interior_oirnotificacion").value;
    var no_exterior_oirnotificacion = document.getElementById("no_exterior_oirnotificacion").value;
    var colonia_oirnotificacion = document.getElementById("colonia_oirnotificacion").value;
    var cp_oirnotificacion = document.getElementById("cp_oirnotificacion").value;
    var idestado_oirnotificacion = document.getElementById("idestado_oirnotificacion").value;
    var idmunicipio_oirnotificacion = document.getElementById("idmunicipio_oirnotificacion").value;
    var idmunicipio_representante = document.getElementById("idmunicipio_representante").value;
    var apellido1_representante = document.getElementById("apellido1_representante").value;
    var apellido2_representante = document.getElementById("apellido2_representante").value;
    if ((persona.length!==0 && persona !==null) ) {
      swal({
        title: "¿Seguro?, se perderan todos sus datos.",

        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false},
        function (isConfirm) {
          if (isConfirm) {
//                      $("#form")[0].reset();
//                      return true;
//http://localhost/aide/app/inicio    http://localhost/aide/usuario/tramite/aide/app/inicio
//http://localhost/aide/usuario/app/inicio
location.href = "aide/app/inicio"

} else {
  swal("Cancelado");

}
});


            //return false;
            
            
          } else {
            location.href = "../app/inicio"
          }
        });
    //aqui se va a validar el formulario despegable
    $("#persona").change(function(event) {
      var persona = $("#persona").val();

      if(persona == 1){
          $('#row_moral').hide();
        $('#row_propietario').show();
      }
      else{
             //aqui mostramos el row
              $('#row_propietario').hide();
             $('#row_moral').show();

           } 
         });
         ///funcion para agregar mas representantes
         $("#agregar_representante").click(function() {
   
  contadorRepresentante++
               if(contadorRepresentante<5){
                 
                    $("#row_agregado").append('<div class="col-sm-12"><label><h3>REPRESENTANTE : '+contadorRepresentante+'</h3></label></div><div class="form-group"><div class="col-sm-4"><label>Apellido 1</label><input type="text" name="apellido1_representante[]" id="apellido1_representante'+contadorRepresentante+'" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;"><span class="help-block"></span></div></div><div class="form-group"><div class="col-sm-4"><label>Apellido 2</label><input type="text" name="apellido2_representante[]" id="apellido2_representante'+contadorRepresentante+'" class="form-control"  style="text-transform: uppercase;"><span class="help-block"></span></div></div><div class="form-group"><div class="col-sm-4"><label>Nombre(s)</label><input type="text" name="nombre_representante[]" id="nombre_representante'+contadorRepresentante+'" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;"><span class="help-block"></span></div></div><div class="form-group"><div class="col-sm-4"><label>Telefono (con lada)</label><input type="text" name="telefono_representante[]" id="telefono_representante'+contadorRepresentante+'" class="form-control" style="text-transform: uppercase;"><span class="help-block"></span></div></div>');
                 //   $("#row_agregado").append('<button class="btn btn-info"id="agregar_representante"name="agregar_representante" type="button"  >Eliminar Representante<i class="	fa fa-plus-square"></i></button>')
             
             }
//             validar('apellido1_representante'+contadorRepresentante);
//              validar('apellido2_representante'+contadorRepresentante); 
//               validar('nombre_representante'+contadorRepresentante);
//              validar('telefono_representante'+contadorRepresentante); 
       
     
 
         });
   //validacion ´para que muestre los municipios a partir de los estados
   $("#idestado_institucion").change(function () {
    $("#idestado_institucion option:selected").each(function () {
      provincia = $('#idestado_institucion').val();
      $.post(base_url() + "usuario/tramite/buscar_municipio1", {
        idestado_institucion: provincia
      }, function (data) {
        $("#idmunicipio_institucion").html(data);
      });
    });
  });
    ////validacion ´para que muestre los municipios a partir de estado de queretaro

    $("#idestado_oirnotificacion").change(function () {
      $("#idestado_oirnotificacion option:selected").each(function () {
        provincia = $('#idestado_oirnotificacion').val();
        $.post(base_url() + "usuario/tramite/buscar_municipio2", {
          idestado_oirnotificacion: provincia
        }, function (data) {
          $("#idmunicipio_oirnotificacion").html(data);
        });
      });
    });


    $("#persona").change(function () {
     var valorinput = $('#persona').val().toUpperCase();
     $('#persona').val(valorinput);
     validar('persona');
   });
    $("#idnivel").change(function () {
      validar('idnivel');
    });
    $("#idmodalidad").change(function () {
         var valorinput = $('#idmodalidad').val().toUpperCase();
     $('#idmodalidad').val(valorinput);
      validar('idmodalidad');
    });
     $("#plan_estudios").keyup(function () {
      var valorinput = $('#plan_estudios').val().toUpperCase();
      $('#plan_estudios').val(valorinput);
      validar('plan_estudios');
    });
     $("#programa").keyup(function () {
      var valorinput = $('#programa').val().toUpperCase();
      $('#programa').val(valorinput);
      validar('programa');
    });
    $("#nombre1_institucion").keyup(function () {
      var valorinput = $('#nombre1_institucion').val().toUpperCase();
      $('#nombre1_institucion').val(valorinput);
      validar('nombre1_institucion');
    });
    $("#nombre2_institucion").keyup(function () {
      var valorinput = $('#nombre2_institucion').val().toUpperCase();
      $('#nombre2_institucion').val(valorinput);
      
      if($("#nombre2_institucion").val().length > 0) {
        validar('nombre2_institucion');
    }

    else {
        $("#nombre2_institucion").parent().removeClass('has-error');
        $("#nombre2_institucion").parent().removeClass('has-feedback');
    }
    
    });
    $("#nombre3_institucion").keyup(function () {
      var valorinput = $('#nombre3_institucion').val().toUpperCase();
      $('#nombre3_institucion').val(valorinput);
      
      if($("#nombre3_institucion").val().length > 0) {
        validar('nombre3_institucion');
    }

    else {
        $("#nombre3_institucion").parent().removeClass('has-error');
        $("#nombre3_institucion").parent().removeClass('has-feedback');
    }
    
    });

    $("#telefono_institucion").keyup(function () {
     var valorinput = $('#telefono_institucion').val().toUpperCase();
     $('#telefono_institucion').val(valorinput);
     validar('telefono_institucion');
   });
    $("#calle_institucion").keyup(function () {
     var valorinput = $('#calle_institucion').val().toUpperCase();
     $('#calle_institucion').val(valorinput);
     validar('calle_institucion');
   });
    
    $("#no_interior_institucion").keyup(function () {
     var valorinput = $('#no_interior_institucion').val().toUpperCase();
     $('#no_interior_institucion').val(valorinput);
       if($("#no_interior_institucion").val().length > 0) {
         validar('no_interior_institucion');
    }

    else {
        $("#no_interior_institucion").parent().removeClass('has-error');
        $("#no_interior_institucion").parent().removeClass('has-feedback');
    }
    
   });
    
    $("#no_exterior_institucion").keyup(function () {
      var valorinput = $('#no_exterior_institucion').val().toUpperCase();
      $('#no_exterior_institucion').val(valorinput);
      validar('no_exterior_institucion');
    });
    
    $("#colonia_institucion").keyup(function () {
      var valorinput = $('#colonia_institucion').val().toUpperCase();
      $('#colonia_institucion').val(valorinput);
      validar('colonia_institucion');
    });
    $("#cp_institucion").keyup(function () {
      validar('cp_institucion');
    });


    $("#idestado_institucion").change(function () {
      validar('idestado_institucion');
    });
    $("#idmunicipio_institucion").change(function () {
      validar('idmunicipio_institucion');
    });
    ///id de los datos del propiertario
    $("#apellido1_propietario").keyup(function () {
     var valorinput = $('#apellido1_propietario').val().toUpperCase();
     $('#apellido1_propietario').val(valorinput);
     validar('apellido1_propietario');
   });
    
    $("#apellido2_propietario").keyup(function () {
     var valorinput = $('#apellido2_propietario').val().toUpperCase();
     $('#apellido2_propietario').val(valorinput);
     validar('apellido2_propietario');
   });
    $("#nombre_propietario").keyup(function () {
     var valorinput = $('#nombre_propietario').val().toUpperCase();
     $('#nombre_propietario').val(valorinput);
     validar('nombre_propietario');
   });
    $("#rfc_propietario").keyup(function () {
     var valorinput = $('#rfc_propietario').val().toUpperCase();
     $('#rfc_propietario').val(valorinput);
     validar('rfc_propietario');
   });
    $("#telefono_propietario").keyup(function () {
     var valorinput = $('#telefono_propietario').val().toUpperCase();
     $('#telefono_propietario').val(valorinput);
     validar('telefono_propietario');
   });
    $("#correo_propietario").keyup(function () {

      validar('correo_propietario');
    });
    $("#calle_oirnotificacion").keyup(function () {
      var valorinput = $('#calle_oirnotificacion').val().toUpperCase();
      $('#calle_oirnotificacion').val(valorinput);
      validar('calle_oirnotificacion');
    });
    $("#no_interior_oirnotificacion").keyup(function () {
     var valorinput = $('#no_interior_oirnotificacion').val().toUpperCase();
     $('#no_interior_oirnotificacion').val(valorinput);
       if($("#no_interior_oirnotificacion").val().length > 0) {
          validar('no_interior_oirnotificacion');
    }

    else {
        $("#no_interior_oirnotificacion").parent().removeClass('has-error');
        $("#no_interior_oirnotificacion").parent().removeClass('has-feedback');
    }
   });
    
    $("#no_exterior_oirnotificacion").keyup(function () {
     var valorinput = $('#no_exterior_oirnotificacion').val().toUpperCase();
     $('#no_exterior_oirnotificacion').val(valorinput);
     validar('no_exterior_oirnotificacion');
   });
    
    $("#colonia_oirnotificacion").keyup(function () {
      var valorinput = $('#colonia_oirnotificacion').val().toUpperCase();
      $('#colonia_oirnotificacion').val(valorinput);
      validar('colonia_oirnotificacion');
    });
    
    $("#cp_oirnotificacion").keyup(function () {
      var valorinput = $('#cp_oirnotificacion').val().toUpperCase();
      $('#cp_oirnotificacion').val(valorinput);
      validar('cp_oirnotificacion');
    });
    $("#idestado_oirnotificacion").change(function () {
      validar('idestado_oirnotificacion');
    });
    
    $("#idmunicipio_oirnotificacion").change(function () {
      validar('idmunicipio_oirnotificacion');
    });
     //datos del representante
     $("#apellido1_representante1").keyup(function () {
      var valorinput = $('#apellido1_representante1').val().toUpperCase();
      $('#apellido1_representante1').val(valorinput);
      validar('apellido1_representante1');
    });
     $("#apellido2_representante1").keyup(function () {
      var valorinput = $('#apellido2_representante1').val().toUpperCase();
      $('#apellido2_representante1').val(valorinput);
         if($("#apellido2_representante1").val().length > 0) {
        validar('apellido2_representante1');
    }
  
    });
     $("#nombre_representante1").keyup(function () {
      var valorinput = $('#nombre_representante1').val().toUpperCase();
      $('#nombre_representante1').val(valorinput);
      validar('nombre_representante1');
    });
    $("#telefono_representante1").keyup(function () {
       var valorinput = $('#telefono_representante1').val().toUpperCase();
       $('#telefono_representante1').val(valorinput);
       validar('telefono_representante1');
     });
    //representante 2
      $(document).on('keyup', '#apellido1_representante2', function () {
      var valorinput = $('#apellido1_representante2').val().toUpperCase();
      $('#apellido1_representante2').val(valorinput);
      validar('apellido1_representante2');
    });
         $(document).on('keyup', '#apellido2_representante2', function () {
      var valorinput = $('#apellido2_representante2').val().toUpperCase();
      $('#apellido2_representante2').val(valorinput);
       if($("#apellido2_representante2").val().length > 0) {
        validar('apellido2_representante2');
    }
  
    });
     $(document).on('keyup', '#nombre_representante2', function () {
      var valorinput = $('#nombre_representante2').val().toUpperCase();
      $('#nombre_representante2').val(valorinput);
      validar('nombre_representante2');
    });
    $(document).on('keyup', '#telefono_representante2', function () {
       var valorinput = $('#telefono_representante2').val().toUpperCase();
       $('#telefono_representante2').val(valorinput);
       validar('telefono_representante2');
     });
    //representante 3
  $(document).on('keyup', '#apellido1_representante3', function () {
      var valorinput = $('#apellido1_representante3').val().toUpperCase();
      $('#apellido1_representante3').val(valorinput);
      validar('apellido1_representante3');
    });
   $(document).on('keyup', '#apellido2_representante3', function () {
      var valorinput = $('#apellido2_representante3').val().toUpperCase();
      $('#apellido2_representante3').val(valorinput);
     if($("#apellido2_representante3").val().length > 0) {
        validar('apellido2_representante3');
    }
  
    });
   $(document).on('keyup', '#nombre_representante3', function () {
      var valorinput = $('#nombre_representante3').val().toUpperCase();
      $('#nombre_representante3').val(valorinput);
      validar('nombre_representante3');
    });
    $(document).on('keyup', '#telefono_representante3', function () {
       var valorinput = $('#telefono_representante3').val().toUpperCase();
       $('#telefono_representante3').val(valorinput);
       validar('telefono_representante3');
     });
    //representante 4
    $(document).on('keyup', '#apellido1_representante4', function () {
      var valorinput = $('#apellido1_representante4').val().toUpperCase();
      $('#apellido1_representante4').val(valorinput);
      validar('apellido1_representante4');
    });
   $(document).on('keyup', '#apellido2_representante4', function () {
      var valorinput = $('#apellido2_representante4').val().toUpperCase();
      $('#apellido2_representante4').val(valorinput);
      if($("#apellido2_representante4").val().length > 0) {
        validar('apellido2_representante4');
    }
  
    });
   $(document).on('keyup', '#nombre_representante4', function () {
      var valorinput = $('#nombre_representante4').val().toUpperCase();
      $('#nombre_representante4').val(valorinput);
      validar('nombre_representante4');
      
    });
   $(document).on('keyup', '#telefono_representante4', function () {
       var valorinput = $('#telefono_representante4').val().toUpperCase();
       $('#telefono_representante4').val(valorinput);
       validar('telefono_representante4');
     });
    //
  
     $("#calle_representante1").keyup(function () {
      var valorinput = $('#calle_representante1').val().toUpperCase();
      $('#calle_representante1').val(valorinput);
      validar('calle_representante1');
    });
     $("#no_interior_representante1").keyup(function () {
       var valorinput = $('#no_interior_representante1').val().toUpperCase();
       $('#no_interior_representante1').val(valorinput);
       validar('no_interior_representante1');
     });

     $("#no_exterior_representante1").keyup(function () {
      var valorinput = $('#no_exterior_representante1').val().toUpperCase();
      $('#no_exterior_representante1').val(valorinput);
      validar('no_exterior_representante1');
    });

     $("#colonia_representante1").keyup(function () {
       var valorinput = $('#colonia_representante1').val().toUpperCase();
       $('#colonia_representante1').val(valorinput);
       validar('colonia_representante1');
     });

     $("#cp_representante1").keyup(function () {
      validar('cp_representante1');
    });
     $("#idestado_representante1").change(function () {
      validar('idestado_representante1');
    });


     $("#idmunicipio_representante1").change(function () {
      validar('idmunicipio_representante1');
    });
     
     
     // datos de moral
       $("#asociacion").keyup(function () {
       var valorinput = $('#asociacion').val().toUpperCase();
       $('#asociacion').val(valorinput);
       validar('asociacion');
     });
   }


   function validar(input){       
       
     if(input==='persona' ){
       var persona = document.getElementById("persona").value;
       if(persona == '---Seleccione---'){
         $("#iconotexto").remove();
         $("#persona").parent().parent().attr("class","form-group has-error has-feedback");
         $("#persona").parent().children("span").text("Debe ingresar el tipo de persona").show();
         $("#persona").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto").remove();
         $("#persona").parent().parent().attr("class","form-group has-success has-feedback");
         $("#persona").parent().children("span").text("").hide();
         $("#persona").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;
       }
     }
     if(input==='idnivel' ){
       var idnivel = document.getElementById("idnivel").value;
       if(idnivel == '---Seleccione---'){
         $("#iconotexto1").remove();
         $("#idnivel").parent().parent().attr("class","form-group has-error has-feedback");
         $("#idnivel").parent().children("span").text("Debe ingresar el nivel educativo").show();
         $("#idnivel").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto1").remove();
         $("#idnivel").parent().parent().attr("class","form-group has-success has-feedback");
         $("#idnivel").parent().children("span").text("").hide();
         $("#idnivel").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;
       }
     }
       if(input==='idmodalidad' ){
       var idmodalidad = document.getElementById("idmodalidad").value;
       if(idmodalidad == '---Seleccione---'){
         $("#iconotexto93").remove();
         $("#idmodalidad").parent().parent().attr("class","form-group has-error has-feedback");
         $("#idmodalidad").parent().children("span").text("Debe ingresar la modalidad").show();
         $("#idmodalidad").parent().append("<span id='iconotexto93' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto93").remove();
         $("#idmodalidad").parent().parent().attr("class","form-group has-success has-feedback");
         $("#idmodalidad").parent().children("span").text("").hide();
         $("#idmodalidad").parent().append("<span id='iconotexto93' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;
       }
     }

  if(input==='plan_estudios' ){
       var plan_estudios = document.getElementById("plan_estudios").value;
       if(plan_estudios === null || plan_estudios.length == 0 || /^\s+$/.test(plan_estudios) || plan_estudios==""){
         $("#iconotexto91").remove();
         $("#plan_estudios").parent().parent().attr("class","form-group has-error has-feedback");
         $("#plan_estudios").parent().children("span").text("Debe ingresar el nombre del plan de estudios").show();
         $("#plan_estudios").parent().append("<span id='iconotexto91' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }
       if(!/^[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(plan_estudios)){
         $("#iconotexto91").remove();
         $("#plan_estudios").parent().parent().attr("class","form-group has-error has-feedback");
         $("#plan_estudios").parent().children("span").text("No se aceptan caracteres especiales").show();
         $("#plan_estudios").parent().append("<span id='iconotexto91' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto91").remove();
         $("#plan_estudios").parent().parent().attr("class","form-group has-success has-feedback");
         $("#plan_estudios").parent().children("span").text("").hide();
         $("#plan_estudios").parent().append("<span id='iconotexto91' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;

       }
     }
     if(input==='programa' ){
       var programa = document.getElementById("programa").value;
       if(programa === null || programa.length == 0 || /^\s+$/.test(programa) || programa==""){
         $("#iconotexto92").remove();
         $("#programa").parent().parent().attr("class","form-group has-error has-feedback");
         $("#programa").parent().children("span").text("Debe ingresar el programa").show();
         $("#programa").parent().append("<span id='iconotexto92' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }
       if(!/^(?=.{1,200}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(programa)){
         $("#iconotexto92").remove();
         $("#programa").parent().parent().attr("class","form-group has-error has-feedback");
         $("#programa").parent().children("span").text("No se aceptan caracteres especiales").show();
         $("#programa").parent().append("<span id='iconotexto92' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto92").remove();
         $("#programa").parent().parent().attr("class","form-group has-success has-feedback");
         $("#programa").parent().children("span").text("").hide();
         $("#programa").parent().append("<span id='iconotexto92' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;

       }
     }
     if(input==='nombre1_institucion' ){
       var nombre1_institucion = document.getElementById("nombre1_institucion").value;
       if(nombre1_institucion === null || nombre1_institucion.length == 0 || /^\s+$/.test(nombre1_institucion) || nombre1_institucion==""){
         $("#iconotexto2").remove();
         $("#nombre1_institucion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#nombre1_institucion").parent().children("span").text("Debe ingresar el posible nombre de la institucion").show();
         $("#nombre1_institucion").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }
       if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(nombre1_institucion)){
         $("#iconotexto2").remove();
         $("#nombre1_institucion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#nombre1_institucion").parent().children("span").text("No se aceptan caracteres especiales").show();
         $("#nombre1_institucion").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto2").remove();
         $("#nombre1_institucion").parent().parent().attr("class","form-group has-success has-feedback");
         $("#nombre1_institucion").parent().children("span").text("").hide();
         $("#nombre1_institucion").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;

       }
     }
     if(input==='nombre2_institucion' ){
       var nombre2_institucion = document.getElementById("nombre2_institucion").value;
       if(nombre2_institucion === null || nombre2_institucion.length == 0 || /^\s+$/.test(nombre2_institucion) || nombre2_institucion==""){
         $("#iconotexto3").remove();
         $("#nombre2_institucion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#nombre2_institucion").parent().children("span").text("Debe ingresar el posible nombre de la institucion").show();
         $("#nombre2_institucion").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   
       }
       if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(nombre2_institucion)){
         $("#iconotexto3").remove();
         $("#nombre2_institucion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#nombre2_institucion").parent().children("span").text("No se aceptan caracteres especiales").show();
         $("#nombre2_institucion").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto3").remove();
         $("#nombre2_institucion").parent().parent().attr("class","form-group has-success has-feedback");
         $("#nombre2_institucion").parent().children("span").text("").hide();
         $("#nombre2_institucion").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;

       }
     }
      if(input==='nombre3_institucion' ){
       var nombre3_institucion = document.getElementById("nombre3_institucion").value;
       if(nombre3_institucion === null || nombre3_institucion.length == 0 || /^\s+$/.test(nombre3_institucion) || nombre3_institucion==""){
         $("#iconotexto4").remove();
         $("#nombre3_institucion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#nombre3_institucion").parent().children("span").text("Debe ingresar el posible nombre de la institucion").show();
         $("#nombre3_institucion").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   
       }
       if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(nombre2_institucion)){
         $("#iconotexto4").remove();
         $("#nombre3_institucion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#nombre3_institucion").parent().children("span").text("No se aceptan caracteres especiales").show();
         $("#nombre3_institucion").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }

       else{
         $("#iconotexto4").remove();
         $("#nombre3_institucion").parent().parent().attr("class","form-group has-success has-feedback");
         $("#nombre3_institucion").parent().children("span").text("").hide();
         $("#nombre3_institucion").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;

       }
     }

  
     if(input==='telefono_institucion' ){
       var telefono_institucion = document.getElementById("telefono_institucion").value;
       if(telefono_institucion === null || telefono_institucion.length == 0 || /^\s+$/.test(telefono_institucion) || telefono_institucion==""){
        $("#iconotexto5").remove();
        $("#telefono_institucion").parent().parent().attr("class","form-group has-error has-feedback");
        $("#telefono_institucion").parent().children("span").text("Debe ingresar el telefono").show();
        $("#telefono_institucion").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
        return false;
      }
      else if(isNaN(telefono_institucion)){
        $("#iconotexto5").remove();
        $("#telefono_institucion").parent().parent().attr("class","form-group has-error has-feedback");
        $("#telefono_institucion").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
        $("#telefono_institucion").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
      } 
      else if(telefono_institucion.length<10 ){
        $("#iconotexto5").remove();
        $("#telefono_institucion").parent().parent().attr("class","form-group has-error has-feedback");
        $("#telefono_institucion").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
        $("#telefono_institucion").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
        return false;
      }
      

      else {
       $("#iconotexto5").remove();
       $("#telefono_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#telefono_institucion").parent().children("span").text("").hide();
       $("#telefono_institucion").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
       return true;
     }
   }


   if(input==='calle_institucion' ){
     var calle_institucion = document.getElementById("calle_institucion").value;
     if(calle_institucion === null || calle_institucion.length == 0 || /^\s+$/.test(calle_institucion) || calle_institucion==""){
       $("#iconotexto6").remove();
       $("#calle_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#calle_institucion").parent().children("span").text("Debe ingresar la calle.").show();
       $("#calle_institucion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }
     if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(calle_institucion)){
       $("#iconotexto6").remove();
       $("#calle_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#calle_institucion").parent().children("span").text("No se aceptan caracteres especiales.").show();
       $("#calle_institucion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }

     else{
       $("#iconotexto6").remove();
       $("#calle_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#calle_institucion").parent().children("span").text("").hide();
       $("#calle_institucion").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

       return true;
     }
   }
   if(input==='no_interior_institucion' ){
     var no_interior_institucion = document.getElementById("no_interior_institucion").value;
     if(no_interior_institucion === null || no_interior_institucion.length == 0 || /^\s+$/.test(no_interior_institucion) || no_interior_institucion==""){
       $("#iconotexto7").remove();
       $("#no_interior_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#no_interior_institucion").parent().children("span").text("Debe ingresar el numero interior.").show();
       $("#no_interior_institucion").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

     }
     else if(no_interior_institucion.length>5){
       $("#iconotexto7").remove();
       $("#no_interior_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#no_interior_institucion").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
       $("#no_interior_institucion").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }

     else{
       $("#iconotexto7").remove();
       $("#no_interior_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#no_interior_institucion").parent().children("span").text("").hide();
       $("#no_interior_institucion").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
       
       return true;
     }
   }
   if(input==='no_exterior_institucion' ){
     var no_exterior_institucion = document.getElementById("no_exterior_institucion").value;
     if(no_exterior_institucion === null || no_exterior_institucion.length == 0 || /^\s+$/.test(no_exterior_institucion) || no_exterior_institucion==""){
       $("#iconotexto8").remove();
       $("#no_exterior_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#no_exterior_institucion").parent().children("span").text("Debe ingresar el numero exterior.").show();
       $("#no_exterior_institucion").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

     }
     else if(no_exterior_institucion.length>5){
       $("#iconotexto8").remove();
       $("#no_exterior_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#no_exterior_institucion").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
       $("#no_exterior_institucion").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }
     else{
       $("#iconotexto8").remove();
       $("#no_exterior_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#no_exterior_institucion").parent().children("span").text("").hide();
       $("#no_exterior_institucion").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

       return true;
     }
   }
   if(input==='colonia_institucion' ){
     var colonia_institucion = document.getElementById("colonia_institucion").value;
     if(colonia_institucion === null || colonia_institucion.length == 0 || /^\s+$/.test(colonia_institucion) || colonia_institucion==""){
       $("#iconotexto9").remove();
       $("#colonia_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#colonia_institucion").parent().children("span").text("Debe ingresar la colonia").show();
       $("#colonia_institucion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }
     if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(colonia_institucion)){
       $("#iconotexto9").remove();
       $("#colonia_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#colonia_institucion").parent().children("span").text("No se aceptan caracteres especiales").show();
       $("#colonia_institucion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }

     else{
       $("#iconotexto9").remove();
       $("#colonia_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#colonia_institucion").parent().children("span").text("").hide();
       $("#colonia_institucion").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
       
       return true;
     }
   }
   if(input==='cp_institucion' ){
     var cp_institucion = document.getElementById("cp_institucion").value;
     if(cp_institucion === null || cp_institucion.length == 0 || /^\s+$/.test(cp_institucion) || cp_institucion==""){
       $("#iconotexto0").remove();
       $("#cp_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#cp_institucion").parent().children("span").text("Debe ingresar el codigo postal").show();
       $("#cp_institucion").parent().append("<span id='iconotexto0' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }
     if(isNaN(cp_institucion)){
       $("#iconotexto0").remove();
       $("#cp_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#cp_institucion").parent().children("span").text("No se aceptan letras o caracteres especiales").show();
       $("#cp_institucion").parent().append("<span id='iconotexto0' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }
     if(cp_institucion.length !==5){
       $("#iconotexto0").remove();
       $("#cp_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#cp_institucion").parent().children("span").text("El codigo postal deben ser 5 digitos").show();
       $("#cp_institucion").parent().append("<span id='iconotexto0' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }

     else{
       $("#iconotexto0").remove();
       $("#cp_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#cp_institucion").parent().children("span").text("").hide();
       $("#cp_institucion").parent().append("<span id='iconotexto0' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

       return true;
     }
   }
   if(input==='idestado_institucion' ){
     var idestado_institucion = document.getElementById("idestado_institucion").value;
     if(idestado_institucion == '---Seleccione---'){
       $("#iconotexto11").remove();
       $("#idestado_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#idestado_institucion").parent().children("span").text("Debe ingresar la entidad federativa").show();
       $("#idestado_institucion").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }

     else{
       $("#iconotexto11").remove();
       $("#idestado_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#idestado_institucion").parent().children("span").text("").hide();
       $("#idestado_institucion").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

       return true;
     }
   }
   if(input==='idmunicipio_institucion' ){
     var idmunicipio_institucion = document.getElementById("idmunicipio_institucion").value;
     if(idmunicipio_institucion == '---Seleccione---'){
       $("#iconotexto12").remove();
       $("#idmunicipio_institucion").parent().parent().attr("class","form-group has-error has-feedback");
       $("#idmunicipio_institucion").parent().children("span").text("Debe ingresar el municipio").show();
       $("#idmunicipio_institucion").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
       return false;
     }

     else{
       $("#iconotexto12").remove();
       $("#idmunicipio_institucion").parent().parent().attr("class","form-group has-success has-feedback");
       $("#idmunicipio_institucion").parent().children("span").text("").hide();
       $("#idmunicipio_institucion").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
       
       return true;
     }
   }
//validaciones del propietario

if(input==='apellido1_propietario' ){
 var apellido1_propietario = document.getElementById("apellido1_propietario").value;
 if(apellido1_propietario === null || apellido1_propietario.length == 0 || /^\s+$/.test(apellido1_propietario) || apellido1_propietario==""){
   $("#iconotexto13").remove();
   $("#apellido1_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_propietario").parent().children("span").text("Debe ingresar el primer apellido").show();
   $("#apellido1_propietario").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido1_propietario)){
   $("#iconotexto13").remove();
   $("#apellido1_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_propietario").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido1_propietario").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto13").remove();
   $("#apellido1_propietario").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido1_propietario").parent().children("span").text("").hide();
   $("#apellido1_propietario").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}
if(input==='apellido2_propietario' ){
 var apellido2_propietario = document.getElementById("apellido2_propietario").value;
 if(apellido2_propietario === null || apellido2_propietario.length == 0 || /^\s+$/.test(apellido2_propietario) || apellido2_propietario==""){
   $("#iconotexto14").remove();
   $("#apellido2_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_propietario").parent().children("span").text("Debe ingresar el segundo apellido").show();
   $("#apellido2_propietario").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido2_propietario)){
   $("#iconotexto14").remove();
   $("#apellido2_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_propietario").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido2_propietario").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto14").remove();
   $("#apellido2_propietario").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido2_propietario").parent().children("span").text("").hide();
   $("#apellido2_propietario").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}

if(input==='nombre_propietario' ){
 var nombre_propietario = document.getElementById("nombre_propietario").value;
 if(nombre_propietario === null || nombre_propietario.length == 0 || /^\s+$/.test(nombre_propietario) || nombre_propietario==""){
   $("#iconotexto15").remove();
   $("#nombre_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_propietario").parent().children("span").text("Debe ingresar el nombre del propietario").show();
   $("#nombre_propietario").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(nombre_propietario)){
   $("#iconotexto15").remove();
   $("#nombre_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_propietario").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#nombre_propietario").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto15").remove();
   $("#nombre_propietario").parent().parent().attr("class","form-group has-success has-feedback");
   $("#nombre_propietario").parent().children("span").text("").hide();
   $("#nombre_propietario").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}
if(input==='telefono_propietario' ){
 var telefono_propietario = document.getElementById("telefono_propietario").value;
 if(telefono_propietario === null || telefono_propietario.length == 0 || /^\s+$/.test(telefono_propietario) || telefono_propietario==""){
  $("#iconotexto16").remove();
  $("#telefono_propietario").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_propietario").parent().children("span").text("Debe ingresar el telefono").show();
  $("#telefono_propietario").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else if(isNaN(telefono_propietario)){
  $("#iconotexto16").remove();
  $("#telefono_propietario").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_propietario").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
  $("#telefono_propietario").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
} 
else if(telefono_propietario.length<10){
  $("#iconotexto16").remove();
  $("#telefono_propietario").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_propietario").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
  $("#telefono_propietario").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else {
 $("#iconotexto16").remove();
 $("#telefono_propietario").parent().parent().attr("class","form-group has-success has-feedback");
 $("#telefono_propietario").parent().children("span").text("").hide();
 $("#telefono_propietario").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}
if(input==='correo_propietario' ){
 var correo_propietario = document.getElementById("correo_propietario").value;
 if(!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo_propietario)) && correo_propietario.length > 0){
  $("#iconotexto17").remove();
  $("#correo_propietario").parent().parent().attr("class","form-group has-error has-feedback");
  $("#correo_propietario").parent().children("span").text("Ingresar un correo valido").show();
  $("#correo_propietario").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else if (correo_propietario.length === 0 || correo_propietario=="" ){
  $("#iconotexto17").remove();
  $("#correo_propietario").parent().parent().attr("class","form-group has-error has-feedback");
  $("#correo_propietario").parent().children("span").text("Ingresar correo").show();
  $("#correo_propietario").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else {
 $("#iconotexto17").remove();
 $("#correo_propietario").parent().parent().attr("class","form-group has-success has-feedback");
 $("#correo_propietario").parent().children("span").text("").hide();
 $("#correo_propietario").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

 return true;
}
}

if(input==='rfc_propietario' ){
 var rfc_propietario = document.getElementById("rfc_propietario").value;
// if(rfc_propietario === null || rfc_propietario.length == 0 || /^\s+$/.test(rfc_propietario) || rfc_propietario=="" || !/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/.test(rfc_propietario)){
 if(rfc_propietario === null || rfc_propietario.length == 0 || /^\s+$/.test(rfc_propietario) || rfc_propietario=="" ){
   $("#iconotexto18").remove();
   $("#rfc_propietario").parent().parent().attr("class","form-group has-error has-feedback");
   $("#rfc_propietario").parent().children("span").text("Debe ingresar un RFC válido").show();
   $("#rfc_propietario").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }


 else{
   $("#iconotexto18").remove();
   $("#rfc_propietario").parent().parent().attr("class","form-group has-success has-feedback");
   $("#rfc_propietario").parent().children("span").text("").hide();
   $("#rfc_propietario").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}


if(input==='calle_oirnotificacion' ){
 var calle_oirnotificacion = document.getElementById("calle_oirnotificacion").value;
 if(calle_oirnotificacion === null || calle_oirnotificacion.length == 0 || /^\s+$/.test(calle_oirnotificacion) || calle_oirnotificacion==""){
   $("#iconotexto19").remove();
   $("#calle_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#calle_oirnotificacion").parent().children("span").text("Debe ingresar la calle.").show();
   $("#calleoirnotificacion").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(calle_oirnotificacion)){
   $("#iconotexto19").remove();
   $("#calle_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#calle_oirnotificacion").parent().children("span").text("No se aceptan caracteres especiales.").show();
   $("#calle_oirnotificacion").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto19").remove();
   $("#calle_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#calle_oirnotificacion").parent().children("span").text("").hide();
   $("#calle_oirnotificacion").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='no_interior_oirnotificacion' ){
 var no_interior_oirnotificacion = document.getElementById("no_interior_oirnotificacion").value;
 if(no_interior_oirnotificacion === null || no_interior_oirnotificacion.length == 0 || /^\s+$/.test(no_interior_oirnotificacion) || no_interior_oirnotificacion==""){
   $("#iconotexto20").remove();
   $("#no_interior_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_interior_oirnotificacion").parent().children("span").text("Debe ingresar el numero interior.").show();
   $("#no_interior_oirnotificacion").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

 }
 else if(no_interior_oirnotificacion.length>5){
   $("#iconotexto20").remove();
   $("#no_interior_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_interior_oirnotificacion").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
   $("#no_interior_oirnotificacion").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto20").remove();
   $("#no_interior_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#no_interior_oirnotificacion").parent().children("span").text("").hide();
   $("#no_interior_oirnotificacion").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='no_exterior_oirnotificacion' ){
 var no_exterior_oirnotificacion = document.getElementById("no_exterior_oirnotificacion").value;
 if(no_exterior_oirnotificacion === null || no_exterior_oirnotificacion.length == 0 || /^\s+$/.test(no_exterior_oirnotificacion) || no_exterior_oirnotificacion==""){
   $("#iconotexto21").remove();
   $("#no_exterior_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_exterior_oirnotificacion").parent().children("span").text("Debe ingresar el numero exterior.").show();
   $("#no_exterior_oirnotificacion").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

 }
 else if(no_exterior_oirnotificacion.length>5){
   $("#iconotexto21").remove();
   $("#no_exterior_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_exterior_oirnotificacion").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
   $("#no_exterior_oirnotificacion").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 else{
   $("#iconotexto21").remove();
   $("#no_exterior_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#no_exterior_oirnotificacion").parent().children("span").text("").hide();
   $("#no_exterior_oirnotificacion").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='colonia_oirnotificacion' ){
 var colonia_oirnotificacion = document.getElementById("colonia_oirnotificacion").value;
 if(colonia_oirnotificacion === null || colonia_oirnotificacion.length == 0 || /^\s+$/.test(colonia_oirnotificacion) || colonia_oirnotificacion==""){
   $("#iconotexto22").remove();
   $("#colonia_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#colonia_oirnotificacion").parent().children("span").text("Debe ingresar la colonia").show();
   $("#colonia_oirnotificacion").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(colonia_oirnotificacion)){
   $("#iconotexto22").remove();
   $("#colonia_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#colonia_oirnotificacion").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#colonia_oirnotificacion").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto22").remove();
   $("#colonia_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#colonia_oirnotificacion").parent().children("span").text("").hide();
   $("#colonia_oirnotificacion").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='cp_oirnotificacion' ){
 var cp_oirnotificacion = document.getElementById("cp_oirnotificacion").value;
 if(cp_oirnotificacion === null || cp_oirnotificacion.length == 0 || /^\s+$/.test(cp_oirnotificacion) || cp_oirnotificacion==""){
   $("#iconotexto23").remove();
   $("#cp_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp_oirnotificacion").parent().children("span").text("Debe ingresar el codigo postal").show();
   $("#cp_oirnotificacion").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(isNaN(cp_oirnotificacion)){
   $("#iconotexto23").remove();
   $("#cp_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp_oirnotificacion").parent().children("span").text("No se aceptan letras o caracteres especiales").show();
   $("#cp_oirnotificacion").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(cp_oirnotificacion.length !==5){
   $("#iconotexto23").remove();
   $("#cp_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp_oirnotificacion").parent().children("span").text("El codigo postal deben ser 5 digitos").show();
   $("#cp_oirnotificacion").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto23").remove();
   $("#cp_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#cp_oirnotificacion").parent().children("span").text("").hide();
   $("#cp_oirnotificacion").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='idestado_oirnotificacion' ){
 var idestado_oirnotificacion= document.getElementById("idestado_oirnotificacion").value;
 if(idestado_oirnotificacion == '---Seleccione---'){
   $("#iconotexto24").remove();
   $("#idestado_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#idestado_oirnotificacion").parent().children("span").text("Debe ingresar la entidad federativa").show();
   $("#idestado_oirnotificacion").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto24").remove();
   $("#idestado_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#idestado_oirnotificacion").parent().children("span").text("").hide();
   $("#idestado_oirnotificacion").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='idmunicipio_oirnotificacion' ){
 var idmunicipio_oirnotificacion = document.getElementById("idmunicipio_oirnotificacion").value;
 if(idmunicipio_oirnotificacion == '---Seleccione---'){
   $("#iconotexto25").remove();
   $("#idmunicipio_oirnotificacion").parent().parent().attr("class","form-group has-error has-feedback");
   $("#idmunicipio_oirnotificacion").parent().children("span").text("Debe ingresar el municipio").show();
   $("#idmunicipio_oirnotificacion").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto25").remove();
   $("#idmunicipio_oirnotificacion").parent().parent().attr("class","form-group has-success has-feedback");
   $("#idmunicipio_oirnotificacion").parent().children("span").text("").hide();
   $("#idmunicipio_oirnotificacion").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
//validacion representante


if(input==='apellido1_representante1'){
 var apellido1_representante1 = document.getElementById("apellido1_representante1").value;
 
 if(apellido1_representante1 === null || apellido1_representante1.length == 0 || /^\s+$/.test(apellido1_representante1) || apellido1_representante1==""){
   $("#iconotexto26").remove();
   $("#apellido1_representante1").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante1").parent().children("span").text("Debe ingresar el primer apellido").show();
   $("#apellido1_representante1").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido1_representante1)){
   $("#iconotexto26").remove();
   $("#apellido1_representante1").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante1").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido1_representante1").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto26").remove();
   $("#apellido1_representante1").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido1_representante1").parent().children("span").text("").hide();
   $("#apellido1_representante1").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
 
}

if(input==='apellido1_representante2' ){
 var apellido1_representante2 = document.getElementById("apellido1_representante2").value;
 if(apellido1_representante2 === null || apellido1_representante2.length == 0 || /^\s+$/.test(apellido1_representante2) || apellido1_representante2==""){
   $("#iconotexto40").remove();
   $("#apellido1_representante2").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante2").parent().children("span").text("Debe ingresar el primer apellido").show();
   $("#apellido1_representante2").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido1_representante2)){
   $("#iconotexto40").remove();
   $("#apellido1_representante2").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante2").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido1_representante2").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto40").remove();
   $("#apellido1_representante2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido1_representante2").parent().children("span").text("").hide();
   $("#apellido1_representante2").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
 
}
if(input==='apellido1_representante3' ){
 var apellido1_representante3 = document.getElementById("apellido1_representante3").value;
 if(apellido1_representante3 === null || apellido1_representante3.length == 0 || /^\s+$/.test(apellido1_representante3) || apellido1_representante3==""){
   $("#iconotexto80").remove();
   $("#apellido1_representante3").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante3").parent().children("span").text("Debe ingresar el primer apellido").show();
   $("#apellido1_representante3").parent().append("<span id='iconotexto80' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido1_representante3)){
   $("#iconotexto80").remove();
   $("#apellido1_representante3").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante3").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido1_representante3").parent().append("<span id='iconotexto80' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto80").remove();
   $("#apellido1_representante3").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido1_representante3").parent().children("span").text("").hide();
   $("#apellido1_representante3").parent().append("<span id='iconotexto80' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
 
}
if(input==='apellido1_representante4' ){
 var apellido1_representante4 = document.getElementById("apellido1_representante4").value;
 if(apellido1_representante4 === null || apellido1_representante4.length == 0 || /^\s+$/.test(apellido1_representante4) || apellido1_representante4==""){
   $("#iconotexto81").remove();
   $("#apellido1_representante4").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante4").parent().children("span").text("Debe ingresar el primer apellido").show();
   $("#apellido1_representante4").parent().append("<span id='iconotexto81' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido1_representante4)){
   $("#iconotexto81").remove();
   $("#apellido1_representante4").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido1_representante4").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido1_representante4").parent().append("<span id='iconotexto81' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto81").remove();
   $("#apellido1_representante4").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido1_representante4").parent().children("span").text("").hide();
   $("#apellido1_representante4").parent().append("<span id='iconotexto81' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
 
}

if(input==='apellido2_representante1' ){
 var apellido2_representante1 = document.getElementById("apellido2_representante1").value;
 if(apellido2_representante1 === null || apellido2_representante1.length == 0 || /^\s+$/.test(apellido2_representante1) || apellido2_representante1==""){
   $("#iconotexto27").remove();
   $("#apellido2_representante1").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante1").parent().children("span").text("Debe ingresar el segundo apellido").show();
   $("#apellido2_representante1").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido2_representante1)){
   $("#iconotexto27").remove();
   $("#apellido2_representante1").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante1").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido2_representante1").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto27").remove();
   $("#apellido2_representante1").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido2_representante1").parent().children("span").text("").hide();
   $("#apellido2_representante1").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}
if(input==='apellido2_representante3' ){
 var apellido2_representante3 = document.getElementById("apellido2_representante3").value;
 if(apellido2_representante3 === null || apellido2_representante3.length == 0 || /^\s+$/.test(apellido2_representante3) || apellido2_representante3==""){
   $("#iconotexto82").remove();
   $("#apellido2_representante3").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante3").parent().children("span").text("Debe ingresar el segundo apellido").show();
   $("#apellido2_representante3").parent().append("<span id='iconotexto82' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido2_representante3)){
   $("#iconotexto82").remove();
   $("#apellido2_representante3").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante3").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido2_representante3").parent().append("<span id='iconotexto82' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto82").remove();
   $("#apellido2_representante3").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido2_representante3").parent().children("span").text("").hide();
   $("#apellido2_representante3").parent().append("<span id='iconotexto82' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}
if(input==='apellido2_representante4' ){
 var apellido2_representante4 = document.getElementById("apellido2_representante4").value;
 if(apellido2_representante4 === null || apellido2_representante4.length == 0 || /^\s+$/.test(apellido2_representante4) || apellido2_representante4==""){
   $("#iconotexto83").remove();
   $("#apellido2_representante4").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante4").parent().children("span").text("Debe ingresar el segundo apellido").show();
   $("#apellido2_representante4").parent().append("<span id='iconotexto83' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido2_representante4)){
   $("#iconotexto83").remove();
   $("#apellido2_representante4").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante4").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido2_representante4").parent().append("<span id='iconotexto83' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto83").remove();
   $("#apellido2_representante4").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido2_representante4").parent().children("span").text("").hide();
   $("#apellido2_representante4").parent().append("<span id='iconotexto83' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}

if(input==='apellido2_representante2' ){
 var apellido2_representante2 = document.getElementById("apellido2_representante2").value;
 if(apellido2_representante2 === null || apellido2_representante2.length == 0 || /^\s+$/.test(apellido2_representante2) || apellido2_representante2==""){
   $("#iconotexto41").remove();
   $("#apellido2_representante2").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante2").parent().children("span").text("Debe ingresar el primer apellido").show();
   $("#apellido2_representante2").parent().append("<span id='iconotexto41' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(apellido2_representante2)){
   $("#iconotexto41").remove();
   $("#apellido2_representante2").parent().parent().attr("class","form-group has-error has-feedback");
   $("#apellido2_representante2").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#apellido2_representante2").parent().append("<span id='iconotexto41' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto41").remove();
   $("#apellido2_representante2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#apellido2_representante2").parent().children("span").text("").hide();
   $("#apellido2_representante2").parent().append("<span id='iconotexto41' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
 
}

if(input==='nombre_representante1' ){
 var nombre_representante1 = document.getElementById("nombre_representante1").value;
 if(nombre_representante1 === null || nombre_representante1.length == 0 || /^\s+$/.test(nombre_representante1) || nombre_representante1==""){
   $("#iconotexto28").remove();
   $("#nombre_representante1").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante1").parent().children("span").text("Debe ingresar el nombre del representante").show();
   $("#nombre_representante1").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(nombre_representante1)){
   $("#iconotexto28").remove();
   $("#nombre_representante1").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante1").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#nombre_representante1").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto28").remove();
   $("#nombre_representante1").parent().parent().attr("class","form-group has-success has-feedback");
   $("#nombre_representante1").parent().children("span").text("").hide();
   $("#nombre_representante1").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}

if(input==='nombre_representante2' ){
 var nombre_representante2 = document.getElementById("nombre_representante2").value;
 if(nombre_representante2 === null || nombre_representante2.length == 0 || /^\s+$/.test(nombre_representante2) || nombre_representante2==""){
   $("#iconotexto100").remove();
   $("#nombre_representante2").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante2").parent().children("span").text("Debe ingresar el nombre del representante").show();
   $("#nombre_representante2").parent().append("<span id='iconotexto100' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(nombre_representante2)){
   $("#iconotexto100").remove();
   $("#nombre_representante2").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante2").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#nombre_representante2").parent().append("<span id='iconotexto100' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto100").remove();
   $("#nombre_representante2").parent().parent().attr("class","form-group has-success has-feedback");
   $("#nombre_representante2").parent().children("span").text("").hide();
   $("#nombre_representante2").parent().append("<span id='iconotexto100' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}
if(input==='nombre_representante3' ){
 var nombre_representante3 = document.getElementById("nombre_representante3").value;
 if(nombre_representante3 === null || nombre_representante3.length == 0 || /^\s+$/.test(nombre_representante3) || nombre_representante3==""){
   $("#iconotexto85").remove();
   $("#nombre_representante3").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante3").parent().children("span").text("Debe ingresar el nombre del representante").show();
   $("#nombre_representante3").parent().append("<span id='iconotexto85' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(nombre_representante3)){
   $("#iconotexto85").remove();
   $("#nombre_representante3").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante3").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#nombre_representante3").parent().append("<span id='iconotexto85' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto85").remove();
   $("#nombre_representante3").parent().parent().attr("class","form-group has-success has-feedback");
   $("#nombre_representante3").parent().children("span").text("").hide();
   $("#nombre_representante3").parent().append("<span id='iconotexto85' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}
if(input==='nombre_representante4' ){
 var nombre_representante4 = document.getElementById("nombre_representante4").value;
 if(nombre_representante4 === null || nombre_representante4.length == 0 || /^\s+$/.test(nombre_representante4) || nombre_representante4==""){
   $("#iconotexto86").remove();
   $("#nombre_representante4").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante4").parent().children("span").text("Debe ingresar el nombre del representante").show();
   $("#nombre_representante4").parent().append("<span id='iconotexto86' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñ]+(?:['_.\s][a-z\Ñ\ñ]+)*$/i.test(nombre_representante4)){
   $("#iconotexto86").remove();
   $("#nombre_representante4").parent().parent().attr("class","form-group has-error has-feedback");
   $("#nombre_representante4").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#nombre_representante4").parent().append("<span id='iconotexto86' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto86").remove();
   $("#nombre_representante4").parent().parent().attr("class","form-group has-success has-feedback");
   $("#nombre_representante4").parent().children("span").text("").hide();
   $("#nombre_representante4").parent().append("<span id='iconotexto86' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;

 }
}

if(input==='telefono_representante1' ){
 var telefono_representante1 = document.getElementById("telefono_representante1").value;
 if(telefono_representante1 === null || telefono_representante1.length == 0 || /^\s+$/.test(telefono_representante1) || telefono_representante1==""){
  $("#iconotexto78").remove();
  $("#telefono_representante1").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante1").parent().children("span").text("Debe ingresar el telefono").show();
  $("#telefono_representante1").parent().append("<span id='iconotexto78' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else if(isNaN(telefono_representante1)){
  $("#iconotexto78").remove();
  $("#telefono_representante1").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante1").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
  $("#telefono_representante1").parent().append("<span id='iconotexto78' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
} 
else if(telefono_representante1.length<10){
  $("#iconotexto78").remove();
  $("#telefono_representante1").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante1").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
  $("#telefono_representante1").parent().append("<span id='iconotexto78' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}


else {
 $("#iconotexto78").remove();
 $("#telefono_representante1").parent().parent().attr("class","form-group has-success has-feedback");
 $("#telefono_representante1").parent().children("span").text("").hide();
 $("#telefono_representante1").parent().append("<span id='iconotexto78' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
 return true;
}
}

if(input==='telefono_representante2' ){
 var telefono_representante2 = document.getElementById("telefono_representante2").value;
 if(telefono_representante2 === null || telefono_representante2.length == 0 || /^\s+$/.test(telefono_representante2) || telefono_representante2==""){
  $("#iconotexto44").remove();
  $("#telefono_representante2").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante2").parent().children("span").text("Debe ingresar el telefono").show();
  $("#telefono_representante2").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else if(isNaN(telefono_representante2)){
  $("#iconotexto44").remove();
  $("#telefono_representante2").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante2").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
  $("#telefono_representante2").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
} 
else if(telefono_representante2.length<10){
  $("#iconotexto44").remove();
  $("#telefono_representante2").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante2").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
  $("#telefono_representante2").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}


else {
 $("#iconotexto44").remove();
 $("#telefono_representante2").parent().parent().attr("class","form-group has-success has-feedback");
 $("#telefono_representante2").parent().children("span").text("").hide();
 $("#telefono_representante2").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
 return true;
}
}

if(input==='telefono_representante3' ){
 var telefono_representante3 = document.getElementById("telefono_representante3").value;
 if(telefono_representante3 === null || telefono_representante3.length == 0 || /^\s+$/.test(telefono_representante3) || telefono_representante3==""){
  $("#iconotexto87").remove();
  $("#telefono_representante3").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante3").parent().children("span").text("Debe ingresar el telefono").show();
  $("#telefono_representante3").parent().append("<span id='iconotexto87' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else if(isNaN(telefono_representante3)){
  $("#iconotexto87").remove();
  $("#telefono_representante3").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante3").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
  $("#telefono_representante3").parent().append("<span id='iconotexto87' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
} 
else if(telefono_representante3.length<10){
  $("#iconotexto87").remove();
  $("#telefono_representante3").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante3").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
  $("#telefono_representante3").parent().append("<span id='iconotexto87' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}


else {
 $("#iconotexto87").remove();
 $("#telefono_representante3").parent().parent().attr("class","form-group has-success has-feedback");
 $("#telefono_representante3").parent().children("span").text("").hide();
 $("#telefono_representante3").parent().append("<span id='iconotexto87' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
 return true;
}
}
if(input==='telefono_representante4' ){
 var telefono_representante4 = document.getElementById("telefono_representante4").value;
 if(telefono_representante4 === null || telefono_representante4.length == 0 || /^\s+$/.test(telefono_representante4) || telefono_representante4==""){
  $("#iconotexto88").remove();
  $("#telefono_representante4").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante4").parent().children("span").text("Debe ingresar el telefono").show();
  $("#telefono_representante4").parent().append("<span id='iconotexto88' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}
else if(isNaN(telefono_representante4)){
  $("#iconotexto88").remove();
  $("#telefono_representante4").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante4").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
  $("#telefono_representante4").parent().append("<span id='iconotexto88' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
} 
else if(telefono_representante4.length<10){
  $("#iconotexto88").remove();
  $("#telefono_representante4").parent().parent().attr("class","form-group has-error has-feedback");
  $("#telefono_representante4").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
  $("#telefono_representante4").parent().append("<span id='iconotexto88' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
  return false;
}


else {
 $("#iconotexto88").remove();
 $("#telefono_representante2").parent().parent().attr("class","form-group has-success has-feedback");
 $("#telefono_representante2").parent().children("span").text("").hide();
 $("#telefono_representante2").parent().append("<span id='iconotexto88' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
 return true;
}
}


if(input==='calle_representante' ){
 var calle_representante = document.getElementById("calle_representante").value;
 if(calle_representante === null || calle_representante.length == 0 || /^\s+$/.test(calle_representante) || calle_representante==""){
   $("#iconotexto29").remove();
   $("#calle_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#calle_representante").parent().children("span").text("Debe ingresar la calle.").show();
   $("#calle_representante").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z\Ñ\ñÜü]+(?:['_.\s][a-z\Ñ\ñÜü]+)*$/i.test(calle_representante)){
   $("#iconotexto29").remove();
   $("#calle_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#calle_representante").parent().children("span").text("No se aceptan caracteres especiales.").show();
   $("#calle_representante").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto29").remove();
   $("#calle_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#calle_representante").parent().children("span").text("").hide();
   $("#calle_representante").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='no_interior_representante' ){
 var no_interior_representante = document.getElementById("no_interior_representante").value;
 if(no_interior_representante === null || no_interior_representante.length == 0 || /^\s+$/.test(no_interior_representante) || no_interior_representante==""){
   $("#iconotexto30").remove();
   $("#no_interior_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_interior_representante").parent().children("span").text("Debe ingresar el numero interior.").show();
   $("#no_interior_representante").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

 }
 else if(no_interior_representante.length>5){
   $("#iconotexto30").remove();
   $("#no_interior_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_interior_representante").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
   $("#no_interior_representante").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto30").remove();
   $("#no_interior_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#no_interior_representante").parent().children("span").text("").hide();
   $("#no_interior_representante").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='no_exterior_representante' ){
 var no_exterior_representante = document.getElementById("no_exterior_representante").value;
 if(no_exterior_representante === null || no_exterior_representante.length == 0 || /^\s+$/.test(no_exterior_representante) || no_exterior_representante==""){
   $("#iconotexto31").remove();
   $("#no_exterior_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_exterior_representante").parent().children("span").text("Debe ingresar el numero exterior.").show();
   $("#no_exterior_representante").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");

 }
 else if(no_exterior_representante.length>5){
   $("#iconotexto31").remove();
   $("#no_exterior_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#no_exterior_representante").parent().children("span").text("El numero exterior debe ser menor de 5 digitos").show();
   $("#no_exterior_representante").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 else{
   $("#iconotexto31").remove();
   $("#no_exterior_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#no_exterior_representante").parent().children("span").text("").hide();
   $("#no_exterior_representante").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='colonia_representante' ){
 var colonia_representante = document.getElementById("colonia_representante").value;
 if(colonia_representante === null || colonia_representante.length == 0 || /^\s+$/.test(colonia_representante) || colonia_representante==""){
   $("#iconotexto32").remove();
   $("#colonia_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#colonia_representante").parent().children("span").text("Debe ingresar la colonia").show();
   $("#colonia_representante").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(!/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i.test(colonia_representante)){
   $("#iconotexto32").remove();
   $("#colonia_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#colonia_representante").parent().children("span").text("No se aceptan caracteres especiales").show();
   $("#colonia_representante").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto32").remove();
   $("#colonia_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#colonia_representante").parent().children("span").text("").hide();
   $("#colonia_representante").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='cp_representante' ){
 var cp_representante = document.getElementById("cp_representante").value;
 if(cp_representante === null || cp_representante.length == 0 || /^\s+$/.test(cp_representante) || cp_representante==""){
   $("#iconotexto33").remove();
   $("#cp_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp_representante").parent().children("span").text("Debe ingresar el codigo postal").show();
   $("#cp_representante").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(isNaN(cp_representante)){
   $("#iconotexto33").remove();
   $("#cp_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp_representante").parent().children("span").text("No se aceptan letras o caracteres especiales").show();
   $("#cp_representante").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }
 if(cp_representante.length !==5){
   $("#iconotexto33").remove();
   $("#cp_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#cp_representante").parent().children("span").text("El codigo postal deben ser 5 digitos").show();
   $("#cp_representante").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto33").remove();
   $("#cp_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#cp_representante").parent().children("span").text("").hide();
   $("#cp_representante").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='idestado_representante' ){
 var idestado_representante= document.getElementById("idestado_representante").value;
 if(idestado_representante == '---Seleccione---'){
   $("#iconotexto34").remove();
   $("#idestado_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#idestado_representante").parent().children("span").text("Debe ingresar la entidad federativa").show();
   $("#idestado_representante").parent().append("<span id='iconotexto34' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto34").remove();
   $("#idestado_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#idestado_representante").parent().children("span").text("").hide();
   $("#idestado_representante").parent().append("<span id='iconotexto34' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}
if(input==='idmunicipio_representante' ){
 var idmunicipio_representante = document.getElementById("idmunicipio_representante").value;
 if(idmunicipio_representante == '---Seleccione---'){
   $("#iconotexto35").remove();
   $("#idmunicipio_representante").parent().parent().attr("class","form-group has-error has-feedback");
   $("#idmunicipio_representante").parent().children("span").text("Debe ingresar el municipio").show();
   $("#idmunicipio_representante").parent().append("<span id='iconotexto35' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
   return false;
 }

 else{
   $("#iconotexto35").remove();
   $("#idmunicipio_representante").parent().parent().attr("class","form-group has-success has-feedback");
   $("#idmunicipio_representante").parent().children("span").text("").hide();
   $("#idmunicipio_representante").parent().append("<span id='iconotexto35' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

   return true;
 }
}

    if(input==='asociacion' ){
       var asociacion = document.getElementById("asociacion").value;
       if(asociacion === null || asociacion.length == 0 || /^\s+$/.test(asociacion) || asociacion==""){
         $("#iconotexto36").remove();
         $("#asociacion").parent().parent().attr("class","form-group has-error has-feedback");
         $("#asociacion").parent().children("span").text("Debe ingresar el nombre de la asociacion").show();
         $("#asociacion").parent().append("<span id='iconotexto36' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
         return false;
       }
       else{
         $("#iconotexto36").remove();
         $("#asociacion").parent().parent().attr("class","form-group has-success has-feedback");
         $("#asociacion").parent().children("span").text("").hide();
         $("#asociacion").parent().append("<span id='iconotexto36' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

         return true;

       }
     }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


