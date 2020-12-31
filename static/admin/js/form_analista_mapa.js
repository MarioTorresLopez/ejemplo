jQuery(document).ready(function($) {
    $("#tipo_institucion").val(function(event) {

       

        var cantidad = $("#num_materias").val();
        cantidad = parseInt(cantidad);
        var tipo_institucion = $("#tipo_institucion").val();
        

        if(tipo_institucion == 1){
        	for(var i = 0; i < cantidad; i++) {
            var HTML = '<div class="col-sm-12"><label><h3>Asignatura</h3></label></div><div class="col-sm-6"><label>Nombre</label><input type="text" name="nom_asign" id="nom_asign" class="form-control" value="Matemáticas" disabled=""><label>Clave</label><input type="text" name="clave_asig" id="clave_asig" class="form-control" value="CVM1" disabled=""></div><div class="col-sm-6"><label>Período Académico</label><input type="text" name="periodo_acd" id="periodo_acd" class="form-control" value="2018A" disabled=""><label>Horas</label><input type="text" name="horas" id="horas" class="form-control" value="5" disabled=""></div>';
            $("#row_media").append(HTML);
          }
        }

        if(tipo_institucion == 2){
        	for(var i = 0; i < cantidad; i++) {
            var HTML = '<div class="col-sm-12"><label><h3>Asignatura</h3></label></div><div class="col-sm-6"><label>Asignatura</label><input type="text" name="nom_asign" id="nom_asign" class="form-control" value="Matemáticas" disabled=""><label>Clave</label><input type="text" name="clave_asig" id="clave_asig" class="form-control" value="CVM1" disabled=""></div><div class="col-sm-6"><label>Período Académico</label><input type="text" name="periodo_acd" id="periodo_acd" class="form-control" value="2018A" disabled=""><label>Horas</label><input type="text" name="horas" id="horas" class="form-control" value="5" disabled=""></div><div class="col-sm-6"><label>Créditos</label><input type="text" name="creditos" id="creditos" class="form-control" value="25" disabled=""></div>';
            $("#row_superior").append(HTML);
          }
        }
    });


    $("#div_desplegar1").slideUp(10);
    $("#btn_desplegar1").click(function () {

        var id_documento = document.getElementById("btn_desplegar1").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar1").slideDown(500);
        $("#btn_desplegar1").fadeOut(500);
        
    });
    
    
    $("#div_desplegar2").slideUp(10);
    $("#btn_desplegar2").click(function () {

        var id_documento = document.getElementById("btn_desplegar2").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //buscarDatos(id_folio, id_documento, id_usu_rec);

        $("#div_desplegar2").slideDown(500);
        $("#btn_desplegar2").fadeOut(500);
        
    });

    
    $("#btn_aceptado1").click(function (event) {
        
        var id_documento = document.getElementById("btn_aceptado1").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario1").prop('disabled', true);
        $("#btn_aceptado1").prop('disabled', true);
        
    });

    $("#div_comentario1").slideUp(10);
    $("#btn_comentario1").click(function (event) {
        
        $("#btn_aceptado1").prop('disabled', true);
        $("#div_comentario1").slideDown(500);

        $("#btn_enviarCom1").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_iden_prop").innerText;
            var id_documento = document.getElementById("btn_comentario1").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            //enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });
        
    });
    
    
    $("#btn_aceptado2").click(function (event) {
        
        var id_documento = document.getElementById("btn_aceptado2").value;
        var id_folio = document.getElementById("id_folio").value;
        var id_usu_rec = document.getElementById("id_usu_rec").value;

        //enviarDatos(id_folio, id_documento, id_usu_rec);

        $("#btn_comentario2").prop('disabled', true);
        $("#btn_aceptado2").prop('disabled', true);
        
    });

    $("#div_comentario2").slideUp(10);
    $("#btn_comentario2").click(function (event) {
        
        $("#btn_aceptado2").prop('disabled', true);
        $("#div_comentario2").slideDown(500);

        $("#btn_enviarCom2").click(function (event) {
            
            var id_folio = document.getElementById("id_folio").value;
            var observacion = document.getElementById("come_iden_prop").innerText;
            var id_documento = document.getElementById("btn_comentario2").value;
            var id_usu_rec = document.getElementById("id_usu_rec").value;
            
            //enviarObservacion(id_folio, observacion, id_documento, id_usu_rec);
            
        });
        
    });
    
});