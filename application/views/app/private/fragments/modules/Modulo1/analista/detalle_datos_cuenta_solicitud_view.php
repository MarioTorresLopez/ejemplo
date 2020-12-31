<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/**
 * Vista de datos de cuenta de para la solictud de cuenta
 *
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_prop
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo1.Historiales
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/
 */
?>

<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <h2 style="font-family: 'Soberana Sans'; font-size: 2rem;">Detalle de solicitud para cuenta</h2>
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- ROW START -->
                <div class="row">

                    <form>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Apellido 1</label>
                                <input class="form-control" id="ap1_soli" name="ap1_soli" type="text" value="<?= $solicitud->apellido1 ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Apellido 2</label>
                                <input class="form-control" id="ap2_soli" name="ap2_soli" type="text" value="<?= $solicitud->apellido2 ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Nombre(s)</label>
                                <input class="form-control" id="nombre_soli" name="nombre_soli" type="text" value="<?= $solicitud->nombre ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hr-line-dashed"></div>
                        </div> 


                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">CURP</label>
                                <input class="form-control" id="curp_soli" name="curp_soli" type="text" value="<?= $solicitud->curp ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Teléfono 1</label>
                                <input class="form-control" id="telefono1_soli" name="telefono1_soli" type="text" value="<?= $solicitud->telefono1 ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Teléfono 2</label>
                                <input class="form-control" id="telefono2_soli" name="telefono2_soli" type="text" value="<?= $solicitud->telefono2 ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hr-line-dashed"></div>
                        </div>  


                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Correo electrónico</label>
                                <input class="form-control" id="correo_soli" name="correo_soli" type="text" value="<?= $solicitud->correo ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hr-line-dashed"></div>
                        </div>  


                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Calle</label>
                                <input class="form-control" id="calle_soli" name="calle_soli" type="text" value="<?= $solicitud->calle ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Número exterior</label>
                                <input class="form-control" id="noext_soli" name="noext_soli" type="text" value="<?= $solicitud->noext ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Número interior</label>
                                <input class="form-control" id="noint_soli" name="noint_soli" type="text" value="<?= $solicitud->noint ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Colonia</label>
                                <input class="form-control" id="colonia_soli" name="colonia_soli" type="text" value="<?= $solicitud->colonia ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hr-line-dashed"></div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Código postal</label>
                                <input class="form-control" id="cp_soli" name="cp_soli" type="text" value="<?= $solicitud->cp ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Entidad federativa</label>
                                <input class="form-control" id="estado_soli" name="estado_soli" type="text" value="<?= $solicitud->nomestado ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Municipio</label>
                                <input class="form-control" id="estado_soli" name="estado_soli" type="text" value="<?= $solicitud->nombremunicipio ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </form>


                </div>
                <!-- ROW END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->

</div>
<!-- ROW END -->

<!-- ROW START -->
<div class="row">
    <!--ROW  START-->
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
    <!--ROW  END-->
</div>
<!-- ROW END -->
