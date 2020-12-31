<?php
/**
 * Vista de datos de institución (aspirante)
 *
 * vista que muestra los datos de la solictud para una nueva institucion.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage app/private/fragments/modules/Modulo1/usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses  ./application/controllers/usuario/tramite
 */
?>

<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
               Datos de la solicitud para institución
            </div>
            <!-- PANEL-HEADING START -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form role="form" id="form" action="<?= base_url() ?>usuario/tramite/crear_institucion"  method="post">
                   

                            <div class="text-center">
                                <!--<i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Alta de datos</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                               
                                        <div class="col-sm-12">
                                            <label><h3>Institución</h3></label>
                                        </div>
                                        
                                        <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Persona</label>
                                        
                                       <input type="text" name="persona" id="persona" class="form-control" 
                                              value="<?php  if($institucion_solicitud->personainsti=='1')
                                                  { ?> FÍSICA 
                                                      <?php } else{
                                                  ?> MORAL
                                              <?php }?>" disabled="disabled">
                                        </div>
                                            </div>

                                        <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Nivel educativo:</label>
                                        <input type="text" name="nivelninsti" id="nivelninsti" class="form-control" 
                                              value="<?= $institucion_solicitud->nivelninsti?>" disabled="disabled">

                                    </div>
                                   </div>
                                       <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Teléfono</label>
                                         <input type="text" name="telefonoinsti" id="telefonoinsti" class="form-control" 
                                              value="<?= $institucion_solicitud->telefonoinsti?>" disabled="disabled">
                                        </div>
                                 </div>

                                        <div class=" col-sm-12 tooltip-demo">
                                            <label><h3>Posibles nombres</h3></label>
                                        </div>
                          
                                        
                                        <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Nombre 1</label>
                                         <input type="text" name="terna1insti" id="terna1insti" class="form-control" 
                                              value="<?= $institucion_solicitud->terna1insti?>" disabled="disabled">
                                        </div>
                                        </div>
                                       <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Nombre 2</label>
                                        <input type="text" name="terna2insti" id="terna2insti" class="form-control" 
                                              value="<?= $institucion_solicitud->terna2insti?>" disabled="disabled">
                                        </div>
                                       </div>
                                        
                                       <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Nombre 3</label>
                                         <input type="text" name="terna3insti" id="terna3insti" class="form-control" 
                                              value="<?= $institucion_solicitud->terna3insti?>" disabled="disabled">
                                        </div>
                                      </div>
                                

                                        <div class=" col-sm-12">
                                            <label><h3>Domicilio de la institución</h3></label>
                                        </div>
                                             <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                        <input type="text" name="calleinsti" id="calleinsti" class="form-control" 
                                              value="<?= $institucion_solicitud->calleinsti?>" disabled="disabled">
                                        </div>
                                             </div>
                                              <div class="form-group"> 
                                            <div class="col-sm-4">
                                                <label>Número interior</label>
                                            <input type="text" name="nointinsti" id="nointinsti" class="form-control" 
                                              value="<?= $institucion_solicitud->nointinsti?>" disabled="disabled">
                                            </div>
                                              </div>
                                              <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                        <input type="text" name="noextinsti" id="noextinsti" class="form-control" 
                                              value="<?= $institucion_solicitud->noextinsti?>" disabled="disabled">
                                        </div>
                                              </div>
                                              <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                         <input type="text" name="coloniainsti" id="coloniainsti" class="form-control" 
                                              value="<?= $institucion_solicitud->coloniainsti?>" disabled="disabled">
                                        </div>
                                              </div>
                                              <div class="form-group"> 
                                         <div class="col-sm-4">
                                            <label>Código postal</label>
                                          <input type="text" name="cpinsti" id="cpinsti" class="form-control" 
                                              value="<?= $institucion_solicitud->cpinsti?>" disabled="disabled">
                                         </div>
                                              </div>
                                         <!-- datos de otra tabla start -->
                                   <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Entidad federativa:</label>
                                        <input type="text" name="estaninsti" id="estaninsti" class="form-control" 
                                              value="<?= $institucion_solicitud->estaninsti?>" disabled="disabled">

                                    </div>
                                   </div>
                                            <!-- datos de otra tabla start -->
                                         <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Municipio:</label>
                                        <input type="text" name="munininsti" id="munininsti" class="form-control" 
                                              value="<?= $institucion_solicitud->munininsti?>" disabled="disabled">
                                    </div>
                                   </div>


                                        <div class="col-sm-12">
                                            <label><h3>Datos del propietario</h3></label>
                                        </div>
                                        <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 1</label>
                                         <input type="text" name="a1propie" id="a1propie" class="form-control" 
                                              value="<?= $institucion_solicitud->a1propie?>" disabled="disabled">
                                        </div>
                                        </div>
                                        <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 2</label>
                                         <input type="text" name="a2propie" id="a2propie" class="form-control" 
                                              value="<?= $institucion_solicitud->a2propie?>" disabled="disabled">
                                        </div>
                                        </div>
                                    <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Nombre(s)</label>
                                        <input type="text" name="nompropie" id="nompropie" class="form-control" 
                                              value="<?= $institucion_solicitud->nompropie?>" disabled="disabled">
                                        </div>
                                    </div>
                                 <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Teléfono</label>
                                         <input type="text" name="telefonopropie" id="telefonopropie" class="form-control" 
                                              value="<?= $institucion_solicitud->telefonopropie?>" disabled="disabled">
                                        </div>
                                 </div>
                                <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Correo</label>
                                         <input type="text" name="correopropie" id="correopropie" class="form-control" 
                                              value="<?= $institucion_solicitud->correopropie?>" disabled="disabled">
                                        </div>
                                 </div>
                                            
                                 <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>RFC</label>
                                        <input type="text" name="rfcpropie" id="rfcpropie" class="form-control" 
                                              value="<?= $institucion_solicitud->rfcpropie?>" disabled="disabled">
                                        </div>
                                 </div>

                                        <div class=" col-sm-12">
                                            <label><h3>Domicilio para oír y recibir notificaciones</h3></label>
                                        </div>
                                 
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                         <input type="text" name="callepropie" id="callepropie" class="form-control" 
                                              value="<?= $institucion_solicitud->callepropie?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número interior</label>
                                         <input type="text" name="nointpropie" id="nointpropie" class="form-control" 
                                              value="<?= $institucion_solicitud->nointpropie?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                        <input type="text" name="noextpropie" id="noextpropie" class="form-control" 
                                              value="<?= $institucion_solicitud->noextpropie?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                        <input type="text" name="coloniapropie" id="coloniapropie" class="form-control" 
                                              value="<?= $institucion_solicitud->coloniapropie?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                             <div class="col-sm-4">
                                            <label>Código postal</label>
                                              <input type="text" name="cppropie" id="cppropie" class="form-control" 
                                              value="<?= $institucion_solicitud->cppropie?>" disabled="disabled">
                                             </div>
                                                  </div>
                                       <!-- datos de otra tabla start -->
                                   <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Entidad federativa:</label>
                                         <input type="text" name="estanpropie" id="estanpropie" class="form-control" 
                                              value="<?= $institucion_solicitud->estanpropie?>" disabled="disabled">

                                    </div>
                                   </div>
                                            <!-- datos de otra tabla start -->
                                         <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Municipio:</label>
                                         <input type="text" name="muninpropie" id="muninpropie" class="form-control" 
                                              value="<?= $institucion_solicitud->muninpropie?>" disabled="disabled">
                                    </div>
                                   </div>
                                            
                                            <?php  if($institucion_solicitud->personainsti=='0')
                                                  { ?>
                                            <div class="row col-lg-12" id="row_media" >
                                                <div class="col-sm-12">
                                            <label><h3>Datos del representante</h3></label>
                                        </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 1</label>
                                        <input type="text" name="a1repre" id="a1repre" class="form-control" 
                                              value="<?= $institucion_solicitud->a1repre?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 2</label>
                                         <input type="text" name="a2repre" id="a2repre" class="form-control" 
                                              value="<?= $institucion_solicitud->a2repre?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Nombre(s)</label>
                                         <input type="text" name="nomrepre" id="nomrepre" class="form-control" 
                                              value="<?= $institucion_solicitud->nomrepre?>" disabled="disabled">
                                        </div>
                                                  </div>
                                                 <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Teléfono</label>
                                         <input type="text" name="telrepre" id="telrepre" class="form-control" 
                                              value="<?= $institucion_solicitud->telrepre?>" disabled="disabled">
                                        </div>
                                 </div>

                                       

                                            </div>
                                             <?php }?>

                            </div>
                            <!-- ROW END -->

                          
                      

                </form>
                <!-- FORM END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->

    <!-- ROW START -->
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
    <!-- ROW END -->

</div>
<!-- ROW END -->
