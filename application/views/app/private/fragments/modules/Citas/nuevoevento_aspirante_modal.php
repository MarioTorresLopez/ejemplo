<!--Cambios-->
<div id="modal-addeventoAsp-data" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?=base_url()?>app/eventos/create_cita_aspirante" method="post" id="form-addevento-data">
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
                            <input type="date" name="fechainiAsp" id="fechainiAsp"
                                   value="" class="form-control"  readonly/>
                            <label class="control-label">Hora de inicio</label>
                            <input type="time" name="horainiAsp"  id="horainiAsp"
                                   value="" class="form-control"  readonly/> 
                            <label class="control-label">Hora de término</label>
                            <input type="time" name="horafinAsp"  id="horafinAsp"
                                   value="" class="form-control"  readonly/>
                        </div> 
                    </div> 
                    <div class="col-sm-6" id="divRol">
                        <div class="form-group"> 
                            <label class="control-label">Nota:</label>
                            <label class="control-label">Se le notificara cuando su cita haya sido confirmada.</label>
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
                    <button type="button" class="btn btn-success" id="addEventoAsp" data-dismiss="modal">Agregar</button>
                    <button type="button" class="btn" id="cancelarAsp">Cancelar</button>
                </div>
            </div>  
        </div> 
        </form>    
    </div>
</div>