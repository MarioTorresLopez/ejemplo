jQuery(document).ready(function($) {
    $("#tipo_institucion").change(function(event) {

       

        var cantidad = $("#num_materias").val();
        cantidad = parseInt(cantidad);
        var tipo_institucion = $("#tipo_institucion").val();
        

        if(tipo_institucion == 1){
        	for(var i = 0; i < cantidad; i++) {
            var HTML = '<div class="col-sm-12"><label><h3>Asignatura</h3></label></div><div class="col-sm-6"><label>Asignatura</label><input type="text" name="nom_asign" id="nom_asign" class="form-control" placeholder="*campo requrido"><label>Clave</label><input type="text" name="clave_asig" id="clave_asig" class="form-control" placeholder="*campo requrido"></div><div class="col-sm-6"><label>Periodo académico</label><input type="text" name="periodo_acd" id="periodo_acd" class="form-control" placeholder="*campo requrido"><label>Horas</label><input type="text" name="horas" id="horas" class="form-control" placeholder="*campo requrido"></div>';
            $("#row_media").append(HTML);
          }
        }

        if(tipo_institucion == 2){
        	for(var i = 0; i < cantidad; i++) {
            var HTML = '<div class="col-sm-12"><label><h3>Asignatura</h3></label></div><div class="col-sm-6"><label>Asignatura</label><input type="text" name="nom_asign" id="nom_asign" class="form-control" placeholder="*campo requrido"><label>Clave</label><input type="text" name="clave_asig" id="clave_asig" class="form-control" placeholder="*campo requrido"></div><div class="col-sm-6"><label>Periodo académico</label><input type="text" name="periodo_acd" id="periodo_acd" class="form-control" placeholder="*campo requrido"><label>Horas</label><input type="text" name="horas" id="horas" class="form-control" placeholder="*campo requrido"></div><div class="col-sm-6"><label>Créditos</label><input type="text" name="creditos" id="creditos" class="form-control" placeholder="*campo requrido"></div>';
            $("#row_superior").append(HTML);
          }
        }
    });

    
});
