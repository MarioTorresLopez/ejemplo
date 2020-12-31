<!--Cambios-->

<div id="modal-addevento-data" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">        

        <div class="modal-header">
            <h3>Detalles de la bitacora</h3>

            <div class="col-sm-12" id="div_comentarioBitacoramodal">
                <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                <div class="textarea" id="text_comentarioBitacoramodal" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                <span class="help-block"></span>
                <button type="button" class="btn btn-primary btnPruebaBitacora" x="" id="btn_enviar_comentarioBitacoramodal" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
            </div>
             <div id="tablabit">
                
            </div>
            </div>
           
<!--            <table id="example2" class="table table-striped table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Nombre analista</th>
                        <th>Documento</th>
                        <th>Comentario</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   
//                    if (!is_null($bitacoras)) :  
//                        $contador = 0;
//                        foreach ($bitacoras as $bitacora) :
//                            $contador += 1;
                            ?>
                            <tr>
                                <td> <//?= $bitacora->nomusuario ?> </td> 
                                <td> <//?= $bitacora->documento ?> </td> 
                                <td> <//?= $bitacora->comentario ?> </td> 
                                <td> <//?= $bitacora->fecha_hora ?> </td> 
                                <td>  
                                    <?php //if ($bitacora->idanalista == $this->session->userdata('idusu')) { ?>
                                        <a class = "btn btn-info" href="<//?= base_url() ?>analista/gestion_institucion/editar_bitacora/<//?= $bitacora->idinstitucion ?>/<//?= $bitacora->consecutivo ?>">
                                            <i class="fa fa-paste"></i> 
                                            <span class="bold">  </span>
                                        </a>
                                    <?php //} else { ?>
                                        <a class = "btn btn-info" disabled>
                                            <i class="fa fa-paste"></i> 
                                            <span class="bold">  </span>
                                        </a>
                                    <?php //} ?>

                                </td>
                            </tr>

                            <?php
                        //endforeach;
                    //endif;
                    ?>
                </tbody>

            </table>-->





        </div>

        <div class="modal-body">

            <?php /*
             * 
             *  <form action="<?=base_url()?>app/analista/enviar_observacion_bitacora" method="post" id="form-addevento-data">
              <div class="row">

              <?php if ($institucion->estatusinsti !== '7') { ?>
              <!--     col-lg-6 START -->
              <div class="col-lg-12">
              <!--         hpanel START -->
              <div class="hpanel hblue">
              <!--             panel-heading START -->
              <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
              <!--                 panel-tools START -->
              <div class="panel-tools">
              <a class="showhide"><i class="fa fa-chevron-up"></i></a>
              </div>
              <!--                 panel-tools END -->
              Agregar bitácora
              </div>
              <!--             panel-heading END
              panel-body START -->
              <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">


              <div class="row">
              <div class="col-sm-12">
              <input type="hidden" class="form-control" id="idinstitucion" name="idinstitucion" value="<?= $otro ?>">
              <input type="hidden" class="form-control" id="otro2" name="otro2" value="<?= $otro2 ?>">
              <input type="hidden" class="form-control" id="otro" name="otro" value="<?= $otro ?>">
              <label class="placeholder">Escriba su observación en el siguiente cuadro de texto.</label>
              <div class="textarea" id="comentario_bitacora" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
              <span class="help-block"></span>
              <button type="button" class="btn btn-primary" id="botonBit">Enviar Comentario</button>
              </div>
              </div>
              </div>
              <!--             panel-body END -->
              </div>
              <!--         hpanel END -->
              </div><!--     col-lg-6 END -->
              <?php } ?>

              <!-- col-lg-12 START -->
              <div class="col-lg-12">
              <!--         hpanel START -->
              <div class="hpanel hblue">
              <!--             panel-heading START -->
              <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
              <!--                 panel-tools START -->
              <div class="panel-tools">
              <a class="showhide"><i class="fa fa-chevron-up"></i></a>
              </div>
              <!--                 panel-tools END -->
              Bitácora
              </div>
              <!--             panel-heading END
              panel-body START -->
              <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

              <table id="example2" class="table table-striped table-bordered table-hover">

              <thead>
              <tr>
              <th>Nombre analista</th>
              <th>Documento</th>
              <th>Comentario</th>
              <th>Fecha</th>
              <th>Editar</th>
              </tr>
              </thead>
              <tbody id="idbitacora">

              </tbody>

              </table>
              <!-- table END -->
              </div>
              <!--             panel-body END -->
              </div>
              <!--        hpanel END -->
              </div>

              </div>
              </form>
             */
            ?>
        </div>


    </div>
