<?php
/**
 * Vista de registros de institución (aspirante)
 *
 * Vista que muestra al usuario la interfaz gráfica para el llenado de datos que se requieren al momento de 
 * registrar una institución además ver que documentos han sido aceptados y observaciones.
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
                Registro de institución
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
                            <div class="row ">

                               
                                        <div class="col-sm-12">
                                            <label><h3>Institución</h3></label>
                                        </div>
                                        
                                        <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Persona</label>
                                            <select name="persona" id="persona"class="form-control m-b">
                                                <option>---Seleccione---</option>
                                                <option value="0">Física</option>
                                                <option value="1">Moral</option>
                                            </select>
                                             <span class="help-block"></span>
                                        </div>
                                            </div>

                                        <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Nivel educativo:</label>
                                        <select name="idnivel" class="form-control m-b"  id="idnivel">
                                            <option>---Seleccione---</option>
                                            <?php
                                            if (!is_null($niveles)) :
                                                $contador = 0;
                                                foreach ($niveles as $nivel) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $nivel->idnivel?>"><?=$nivel->nomnivel?></option>      
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                                </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>
                                       <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Telefono</label>
                                            <input type="text" name="telefono_institucion" id="telefono_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                 </div>

                                        <div class=" col-sm-12 tooltip-demo">
                                            <label><h3>Posibles nombres</h3></label>

                                            <a class="btn btn-primary btn-circle" data-toggle="tooltip" title="Deberá registrar los tres posibles nombre que tendrá su institución">
                                                <i class="fa fa-question"></i> 
                                            </a>
                                        </div>
                          
                                        
                                        <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Nombre 1</label>
                                            <input type="text" name="nombre1_institucion" id="nombre1_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                        </div>
                                       <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Nombre 2</label>
                                            <input type="text" name="nombre2_institucion" id="nombre2_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                       </div>
                                        
                                       <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Nombre 3</label>
                                            <input type="text" name="nombre3_institucion" id="nombre3_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                      </div>
                                

                                        <div class=" col-sm-12">
                                            <label><h3>Domicilio de la institución</h3></label>
                                        </div>
                                             <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                            <input type="text" name="calle_institucion" id="calle_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                             </div>
                                              <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número interior</label>
                                            <input type="text" name="no_interior_institucion" id="no_interior_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                              </div>
                                              <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                            <input type="text" name="no_exterior_institucion" id="no_exterior_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                              </div>
                                              <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                            <input type="text" name="colonia_institucion" id="colonia_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                              </div>
                                              <div class="form-group"> 
                                         <div class="col-sm-4">
                                            <label>Codigo Postal</label>
                                            <input type="text" name="cp_institucion" id="cp_institucion" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;" >
                                         <span class="help-block"></span>
                                         </div>
                                              </div>
                                         <!-- datos de otra tabla start -->
                                   <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Entidad federativa:</label>
                                        <select name="idestado_institucion" class="form-control m-b"  id="idestado_institucion">
                                            <option>---Seleccione---</option>
                                            <?php
                                            if (!is_null($estados)) :
                                                $contador = 0;
                                                foreach ($estados as $estado) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $estado->idestado ?>"><?= $estado->nomestado ?></option> 
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>
                                            <!-- datos de otra tabla start -->
                                         <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Municipio:</label>
                                        <select name="idmunicipio_institucion" class="form-control m-b"  id="idmunicipio_institucion">
                                            <option>---Seleccione---</option>
                                            <?php
                                            if (!is_null($municipios)) :
                                                $contador = 0;
                                                foreach ($municipios as $municipio) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $municipio->idmunicipio ?>"><?= $municipio->nombremunicipio ?></option>      
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                                </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>


                                        <div class="col-sm-12">
                                            <label><h3>Datos del propietario</h3></label>
                                        </div>
                                        <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 1</label>
                                            <input type="text" name="apellido1_propietario" id="apellido1_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                        </div>
                                        <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 2</label>
                                            <input type="text" name="apellido2_propietario" id="apellido2_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                        </div>
                                    <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Nombre(s)</label>
                                            <input type="text" name="nombre_propietario" id="nombre_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                 <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Telefono</label>
                                            <input type="text" name="telefono_propietario" id="telefono_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                 </div>
                                <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Correo</label>
                                            <input type="text" name="correo_propietario" id="correo_propietario" class="form-control" placeholder="*Campo requerido" >
                                         <span class="help-block"></span>
                                        </div>
                                 </div>
                                            
                                 <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>RFC</label>
                                            <input type="text" name="rfc_propietario" id="rfc_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                 </div>

                                        <div class=" col-sm-12">
                                            <label><h3>Domicilio del propietario</h3></label>
                                        </div>
                                 
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                            <input type="text" name="calle_propietario" id="calle_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número interior</label>
                                            <input type="text" name="no_interior_propietario" id="no_interior_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                            <input type="text" name="no_exterior_propietario" id="no_exterior_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                            <input type="text" name="colonia_propietario" id="colonia_propietario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                             <div class="col-sm-4">
                                            <label>Codigo Postal</label>
                                            <input type="text" name="cp_propierario" id="cp_propierario" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                             </div>
                                                  </div>
                                       <!-- datos de otra tabla start -->
                                   <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Entidad federativa:</label>
                                        <select name="idestado_propietario" class="form-control m-b"  id="idestado_propietario">
                                            <option>---Seleccione---</option>
                                            <?php
                                            if (!is_null($estados)) :
                                                $contador = 0;
                                                foreach ($estados as $estado) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $estado->idestado ?>"><?= $estado->nomestado ?></option> 
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>
                                            <!-- datos de otra tabla start -->
                                         <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Municipio:</label>
                                        <select name="idmunicipio_propietario" class="form-control m-b"  id="idmunicipio_propietario">
                                            <option>---Seleccione---</option>
                                            <?php
                                            if (!is_null($municipios)) :
                                                $contador = 0;
                                                foreach ($municipios as $municipio) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $municipio->idmunicipio ?>"><?= $municipio->nombremunicipio ?></option>      
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                                </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>
                                            <div class="row col-lg-12" id="row_media" hidden="">
                                                <div class="col-sm-12">
                                            <label><h3>Datos del representante</h3></label>
                                        </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 1</label>
                                            <input type="text" name="apellido1_representante" id="apellido1_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Apellido 2</label>
                                            <input type="text" name="apellido2_representante" id="apellido2_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Nombre(s)</label>
                                            <input type="text" name="nombre_representante" id="nombre_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                 <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <label>Telefono</label>
                                            <input type="text" name="telefono_representante" id="telefono_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                        </div>
                                 </div>

                                        <div class=" col-sm-12">
                                            <label><h3>Domicilio del representante</h3></label>
                                        </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                            <input type="text" name="calle_representante" id="calle_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número interior</label>
                                            <input type="text" name="no_interior_representante" id="no_interior_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                  <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                            <input type="text" name="no_exterior_representante" id="no_exterior_representante" class="form-control" placeholder="*campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                  </div>
                                                 <div class="form-group"> 
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                            <input type="text" name="colonia_representante" id="colonia_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        </div>
                                                 </div>
                                          <div class="form-group"> 
                                             <div class="col-sm-4">
                                            <label>Codigo Postal</label>
                                            <input type="text" name="cp_representante" id="cp_representante" class="form-control" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                         <span class="help-block"></span>
                                             </div>
                                          </div>
                                       <!-- datos de otra tabla start -->
                                   <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Entidad federativa:</label>
                                        <select name="idestado_representante" class="form-control m-b"  id="idestado_representante">
                                            <option value="">---Seleccione---</option>
                                            <?php
                                            if (!is_null($estados)) :
                                                $contador = 0;
                                                foreach ($estados as $estado) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $estado->idestado ?>"><?= $estado->nomestado ?></option> 
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>
                                            <!-- datos de otra tabla start -->
                                         <div class="form-group">
                                        <div class="col-lg-4">
                                        <label>Municipio:</label>
                                        <select name="idmunicipio_representante" class="form-control m-b"  id="idmunicipio_representante">
                                            <option value="">---Seleccione---</option>
                                            <?php
                                            if (!is_null($municipios)) :
                                                $contador = 0;
                                                foreach ($municipios as $municipio) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $municipio->idmunicipio ?>"><?= $municipio->nombremunicipio ?></option>      
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                                </select>
                                        <span class="help-block"></span>

                                    </div>
                                   </div>


                                            </div>

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <button class="btn btn-primary"  
                                        id="validacion_registro_institucion" name="validacion_registro_institucion" type="submit">Siguiente</button>
                            </div>
                      

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
