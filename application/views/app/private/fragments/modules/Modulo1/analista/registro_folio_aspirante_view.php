<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Asignación de expediente
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- ROW START -->
                <div class="row">

                    <!-- COL-LG-12 FORM-GROUP START -->
                    <div class="col-lg-12 form-group">

                        <!-- FORM START -->
                        <form name="simpleForm" novalidate id="form" action="<?= base_url() ?>analista/registrar_folio_aspirante/registrar_folio" method="post">

                            <?php
                            if ($this->session->flashdata('folio_incorrecto')) {
                                ?>

                                <div class="alert alert-danger fade in alert-dismissable">
                                    <a class="close" data-dismiss="alert">x</a>
                                    <?= $this->session->flashdata('folio_incorrecto') ?>
                                </div>
                                <?php
                            }
                            ?>

<!--                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="control-label">Número de expediente</label>
                                    <input class="form-control" id="id_sol" name="id_sol" type="text" value="<?= $usuario->expediente ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->
                            <input class="form-control" id="id_sol" name="id_sol" type="hidden" value="<?= $usuario->expediente ?>" disabled>

<!--                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="control-label">Nombre completo aspirante</label>
                                    <input class="form-control" id="nombrecom_sol" name="nombrecom_sol" type="text" value="<?= $usuario->nombrecom ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->

                            

                            <?php if (!is_null($datos_prop)): ?>

                                <div class="col-sm-12">
                                    <label><h3>Datos del propietario</h3></label>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-4">
                                        <label>Apellido 1</label>
                                        <input type="text" name="a1propie" id="a1propie" class="form-control" value="<?= $datos_prop->apellido1 ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-4">
                                        <label>Apellido 2</label>
                                        <input type="text" name="a2propie" id="a2propie" class="form-control" value="<?= $datos_prop->apellido2 ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-4">
                                        <label>Nombre(s)</label>
                                        <input type="text" name="nompropie" id="nompropie" class="form-control" value="<?= $datos_prop->nompropietario ?>" disabled="disabled">
                                    </div>
                                </div>

                            <?php endif ?>

                            <?php
                            if(!is_null($datos_persona_moral)):
                            ?>
<div class="form-group"> 
    <div class="col-sm-12">
        <label>Asociación moral</label>
        <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="<?= $datos_persona_moral->nombre ?>" disabled="disabled">
    </div>
</div>
                            <?php
                            endif;
                            ?>


<div class="form-group">
    <div class="col-sm-4">
        <label class="control-label">Nivel educativo</label>
        <input class="form-control" id="nivel_educativo" name="nivel_educativo" type="text" value="<?= $usuario->nivelninsti ?>" disabled>
        <input class="form-control" id="idNivel" name="idNivel" type="hidden" value="<?= $usuario->nivelinsti ?>">
        <input class="form-control" id="persona" name="persona" type="hidden" value="<?= $usuario->persona ?>">
        <span class="help-block"></span>
    </div>
</div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="control-label">
                                        Ingresar expediente
                                    </label>
                                    <input class="form-control" id="numero_folio" name="numero_folio" type="text" value="" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="control-label">
                                        Analista
                                    </label>
                                    <select name="idanalista" id="idanalista" class="form-control m-b" required="">
                                        <option>---Seleccione---</option>

                                        <?php
                                        if (!is_null($analistas)) :
                                            $contador = 0;
                                            foreach ($analistas as $analista) :
                                                $contador += 1;
                                                ?>
                                                <option value="<?= $analista->idusuario ?>"><?= $analista->nomusuario ?></option>      
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
                                    <input class="form-control" id="id_inst" name="id_inst" type="hidden" value="<?= $usuario->idinsti ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input class="form-control" id="id_usu" name="id_usu" type="hidden" value="<?= $usuario->idusu ?>">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="hr-line-dashed">
                                </div>
                            </div>

                            <div class="form-group col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary" id="btnvalidar">
                                    Asignar
                                </button>
                                <a class="btn btn-default" href="<?= base_url() ?>analista/gestion_institucion/gestion_instituciones">
                                    Cancelar
                                </a>
                            </div>


                        </form>
                        <!-- FORM END -->

                    </div>
                    <!-- COL-LG-12 FORM-GROUP END -->

                </div>
                <!-- ROW END -->

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
