<!--Cambios-->
<div id="modal-addevento-data" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?=base_url()?>app/eventos/create_cita" method="post" id="form-addevento-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Cita</h2>
            </div>
            <div class="modal-body">
                <div class="row" id="todo">
<!--                    <div class="col-sm-12" id="img" style="margin-left: 150px;">
                        <img src="img/mario.gif" style=" width: 45%; height: 50%; "/>
                    </div>-->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <input type="date" name="fechaini" id="fechaini"
                                   value="" class="form-control"  readonly/>
                            <label class="control-label">Hora de inicio</label>
                            <input type="time" name="horaini"  id="horaini"
                                   value="" class="form-control"/> 
                            <label class="control-label">Hora de término</label>
                            <input type="time" name="horafin"  id="horafin"
                                   value="" class="form-control"/> 
                        </div> 
                    </div> 
                    <div class="col-sm-6" id="divRol">
                        <div class="form-group">
                            <label class="control-label">Expediente</label>
                            <select id="idanalista" name="idanalista" class="form-control">
                                <option>--Selecciona--</option>
                                     
                            </select>
                            <label class="control-label">Observaciones</label>
                            <textarea type="text" name="observaciones" placeholder=""  
                                      value="" class="form-control" id="observaciones" required></textarea> 
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
                    <button type="button" class="btn btn-success" id="addEvento" data-dismiss="modal">Agregar</button>
                    <button type="button" class="btn" id="cancelar">Cancelar</button>
                </div>
            </div>  
        </div> 
        </form>    
    </div>
</div>