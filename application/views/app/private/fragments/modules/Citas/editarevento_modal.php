<!--Cambios-->
<div id="modal-editevento-data" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?=base_url()?>app/eventos/update_cita" method="post" id="form-editevento-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Editar Cita</h2>
            </div>
            <div class="modal-body">
                <div class="row" id="todo">
<!--                    <div class="col-sm-12" id="img" style="margin-left: 150px;">
                        <img src="img/mario.gif" style=" width: 45%; height: 50%; "/>
                    </div>-->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="hidden" name="evento_id" id="evento_id" value=""/>
                            <label class="control-label">Fecha</label>
                            <input type="date" name="e_fecha_iniev" id="e_fecha_iniev"
                                   value="" class="form-control"  />
                            <label class="control-label">Hora de inicio</label>
                            <input type="time" name="e_hora_iniev"  id="e_hora_iniev"
                                   value="" class="form-control"  /> 
                            <label class="control-label">Hora de término</label>
                            <input type="time" name="e_hora_finev"  id="e_hora_finev"
                                   value="" class="form-control"  /> 
                        </div> 
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Expediente</label>
                            <input id="e_idanalista_hidden" name="e_idanalista_hidden" value="" class="form-control" type="hidden"/>
                            <select id="e_idanalista" name="e_idanalista" class="form-control">
                                <option>--Selecciona--</option>
                                     
                            </select>
                            <label class="control-label">Observaciones</label>
                            <textarea type="text" name="e_descripcion_ev" placeholder=""  
                                      value="" class="form-control" id="e_descripcion_ev" required></textarea> 
                        </div>
                    </div>    
                </div>
<!--                <div class="row" id="carga">
                    <img src="img/ajax-loader.gif" style="margin: auto; display: block;"/>
                </div>-->
                <div class="row" id="tabla-posiciones">

                </div>
            </div>
            <div class="modal-footer">
                
                <div class="col-sm-12">
                    <button type="button" class="btn btn-success" id="editEvento" data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn" id="e_cancelar">Cancelar</button>
                </div>
            </div>  
        </div> 
        </form>    
    </div>
</div>
