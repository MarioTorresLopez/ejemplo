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
                Registro de documentación
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">


                <div class="text-center m-b-md" id="wizardControl">
                    <a class="btn btn-primary" id="tab1-tab" disabled>Documentos generales</a>
                    <a class="btn btn-default" id="tab2-tab" disabled>Documentos institución</a>
                    <a class="btn btn-default" id="tab3-tab" disabled>Acuerdo</a>
                </div>

                <!-- TAB-CONTENT START -->
                <div class="tab-content">

                    <!-- STEP1 START -->
                    <div id="step1" class="p-m tab-pane active">
                        
                        <div class="text-right m-t-xs">
                            <a class="btn btn-default next sig1" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                        </div>

                        <!-- ROW START -->
                        <div class="row well well-lg">

                            <?php if (is_null($validar_acuerdo)) { ?>

                                <div class="row well well-lg">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label>Usted no puede subir archivos.</label>
                                        </div>
                                    </div>

                                </div>

                            <?php } else if (is_null($acuerdo)) { ?>  

                                <div class="row well well-lg">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label>Proceso no concluido (sin seguimiento).</label>
                                        </div>
                                    </div>

                                </div>

                            <?php } else { ?>

                                <!-- FORM START -->
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acta_prop" method="post" enctype="multipart/form-data" id="form1">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="1">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acta de nacimiento del propietario</label>
                                                <input type="file" id="acta_prop" class="form-control" name="acta_prop" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc1" name="btnValidarDoc1">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_iden_ofic_prop" method="post" enctype="multipart/form-data" id="form2">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="2">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Identificación oficial con fotografía del propietario</label>
                                                <input type="file" id="iden_ofic_prop" class="form-control" name="iden_ofic_prop" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc2" name="btnValidarDoc2">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- FORM END -->


                                <?php if ($acuerdo->perfis != '1') { ?>

                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acta_repr" method="post" enctype="multipart/form-data" id="form3">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="5">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Acta de nacimiento de representante legal</label>
                                                    <input type="file" id="acta_repr" class="form-control" name="acta_repr" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc3" name="btnValidarDoc3">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_iden_ofic_repr" method="post" enctype="multipart/form-data" id="form4">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="4">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Identificación oficial con fotografía del representante legal</label>
                                                    <input type="file" id="iden_ofic_repr" class="form-control" name="iden_ofic_repr" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc4" name="btnValidarDoc4">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acta_const" method="post" enctype="multipart/form-data" id="form7">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="3">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Acta constitutiva</label>
                                                    <input type="file" value="" id="acta_const" class="form-control" name="acta_const" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc7" name="btnValidarDoc7">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_nota_repr" method="post" enctype="multipart/form-data" id="form5">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="33">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Documento notarial de representante legal</label>
                                                    <input type="file" id="nota_repr" class="form-control" name="nota_repr" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc5" name="btnValidarDoc5">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->

                                <?php } ?>


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acredit_perso" method="post" enctype="multipart/form-data" id="form6">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="33">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acreditación de la persona</label>
                                                <input type="file" value="" id="acredit_perso" class="form-control" name="acredit_perso" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc6" name="btnValidarDoc6">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->  
                                

                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_croquis" method="post" enctype="multipart/form-data" id="form9">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="61">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Croquis de ubicación del inmueble</label>
                                                <input type="file" value="" id="croquis" class="form-control" name="croquis" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc9" name="btnValidarDoc9">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cedula_perito" method="post" enctype="multipart/form-data" id="form10">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="11">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Cédula profesional del perito</label>
                                                <input type="file" value="" id="cedula_perito" class="form-control" name="cedula_perito" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc10" name="btnValidarDoc10">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acre_legal_estr" method="post" enctype="multipart/form-data" id="form11">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="6">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acreditación legal del inmueble (estructura pública)</label>
                                                <input type="file" value="" id="acre_legal_estr" class="form-control" name="acre_legal_estr" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc11" name="btnValidarDoc11">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acre_legal_arre" method="post" enctype="multipart/form-data" id="form12">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="7">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acreditación legal del inmueble (contrato de arrendamiento)</label>
                                                <input type="file" value="" id="acre_legal_arre" class="form-control" name="acre_legal_arre" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc12" name="btnValidarDoc12">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acre_legal_como" method="post" enctype="multipart/form-data" id="form13">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="8">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acreditación legal del inmueble (contrato de comodato)</label>
                                                <input type="file" value="" id="acre_legal_como" class="form-control" name="acre_legal_como" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc13" name="btnValidarDoc13">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_acre_legal_otro" method="post" enctype="multipart/form-data" id="form14">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="32">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acreditación legal del inmueble (otro)</label>
                                                <input type="file" value="" id="acre_legal_otro" class="form-control" name="acre_legal_otro" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc14" name="btnValidarDoc14">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->
                                
                                
                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_ocup_legal" method="post" enctype="multipart/form-data" id="form8">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="26">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Ocupación legal del inmueble</label>
                                                <input type="file" value="" id="ocup_legal" class="form-control" name="ocup_legal" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc8" name="btnValidarDoc8">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_dictamen" method="post" enctype="multipart/form-data" id="form15">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="15">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Dictamen de uso de suelo</label>
                                                <input type="file" value="" id="dictamen" class="form-control" name="dictamen" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc15" name="btnValidarDoc15">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_const_seg" method="post" enctype="multipart/form-data" id="form16">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="9">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Constancia de seguridad estructutal</label>
                                                <input type="file" value="" id="const_seg" class="form-control" name="const_seg" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc16" name="btnValidarDoc16">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_visto_prot" method="post" enctype="multipart/form-data" id="form17">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="13">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Visto bueno de protección civil municipal</label>
                                                <input type="file" value="" id="visto_prot" class="form-control" name="visto_prot" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc17" name="btnValidarDoc17">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cert_nume_ofic" method="post" enctype="multipart/form-data" id="form18">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="16">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Certificado del número oficial</label>
                                                <input type="file" value="" id="cert_nume_ofic" class="form-control" name="cert_nume_ofic" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc18" name="btnValidarDoc18">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_recibo_derechos" method="post" enctype="multipart/form-data" id="form19">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="56">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Recibo de pago de derechos</label>
                                                <input type="file" id="recibo_derechos" class="form-control" name="recibo_derechos" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc19" name="btnValidarDoc19">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- FORM END -->


                                <!-- FORM START -->
                                <!--
                                <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_plano" method="post" enctype="multipart/form-data" id="form20">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="62">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Plano arquitectónico del inmueble</label>
                                                <input type="file" value="" id="plano" class="form-control" name="plano" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc20" name="btnValidarDoc20">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                -->
                                <!-- FORM END -->

                            <?php } ?>

                        </div>
                        <!-- ROW END -->  

                        <div class="text-right m-t-xs">
                            <!--<a class="btn btn-default prev" href="#">Anterior</a>-->
                            <a class="btn btn-default next sig1" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                        </div>
                    </div>
                    <!-- STEP1 END -->

                    <!-- STEP2 START -->
                    <div id="step2" class="p-m tab-pane">
                                                
                        <div class="text-right m-t-xs">
                            <a class="btn btn-default prev ant2" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                            <a class="btn btn-default next sig2" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                        </div>

                        <!-- ROW START -->
                        <div class="row well well-lg">

                            <?php if (is_null($validar_acuerdo)) { ?>

                                <div class="row well well-lg">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label>Usted no puede subir archivos.</label>
                                        </div>
                                    </div>

                                </div>

                            <?php } else if (is_null($acuerdo)) { ?>  

                                <div class="row well well-lg">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label>Proceso no concluido (sin seguimiento).</label>
                                        </div>
                                    </div>

                                </div>

                            <?php } else { ?>

                                <!-- EDUCACIÓN INICIAL START-->
                                <?php if ($acuerdo->idniv == '11') { ?>

                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_plantilla_personal" method="post" enctype="multipart/form-data" id="form21">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="58">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Educación inicial (plantilla de personal docente y directivo)</label>
                                                    <input type="file" value="" id="plantilla_personal" class="form-control" name="plantilla_personal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc21" name="btnValidarDoc21">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_desc_inst" method="post" enctype="multipart/form-data" id="form32">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="63">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Descripción de instalaciones educación inicial</label>
                                                    <input type="file" value="" id="desc_inst" class="form-control" name="desc_inst" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc32" name="btnValidarDoc32">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_ocup_legal" method="post" enctype="multipart/form-data" id="form8">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="26">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Ocupación legal del inmueble</label>
                                                    <input type="file" value="" id="ocup_legal" class="form-control" name="ocup_legal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc8" name="btnValidarDoc8">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_dictamen" method="post" enctype="multipart/form-data" id="form15">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="15">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Dictamen de uso de suelo</label>
                                                    <input type="file" value="" id="dictamen" class="form-control" name="dictamen" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc15" name="btnValidarDoc15">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_const_seg" method="post" enctype="multipart/form-data" id="form16">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="9">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Constancia de seguridad estructutal</label>
                                                    <input type="file" value="" id="const_seg" class="form-control" name="const_seg" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc16" name="btnValidarDoc16">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_visto_prot" method="post" enctype="multipart/form-data" id="form17">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="13">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Visto bueno de protección civil municipal</label>
                                                    <input type="file" value="" id="visto_prot" class="form-control" name="visto_prot" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc17" name="btnValidarDoc17">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cert_nume_ofic" method="post" enctype="multipart/form-data" id="form18">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="16">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Certificado del número oficial</label>
                                                    <input type="file" value="" id="cert_nume_ofic" class="form-control" name="cert_nume_ofic" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc18" name="btnValidarDoc18">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_plano" method="post" enctype="multipart/form-data" id="form20">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="62">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Plano arquitectónico del inmueble</label>
                                                    <input type="file" value="" id="plano" class="form-control" name="plano" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc20" name="btnValidarDoc20">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_inventario" method="post" enctype="multipart/form-data" id="form22">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="59">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Inventario de las instalaciones</label>
                                                    <input type="file" value="" id="inventario" class="form-control" name="inventario" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc22" name="btnValidarDoc22">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->

                                <?php } ?>
                                <!-- EDUCACIÓN INICIAL END-->


                                <!-- EDUCACIÓN BÁSICA START -->
                                <?php if ($acuerdo->idniv == '12' || $acuerdo->idniv == '13' || $acuerdo->idniv == '14') { ?>

                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_plantilla_personal" method="post" enctype="multipart/form-data" id="form21">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="58">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Educación básica (plantilla de personal docente y directivo)</label>
                                                    <input type="file" value="" id="plantilla_personal" class="form-control" name="plantilla_personal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc21" name="btnValidarDoc21">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_desc_inst" method="post" enctype="multipart/form-data" id="form32">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="63">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Descripción de instalaciones educación superior</label>
                                                    <input type="file" value="" id="desc_inst" class="form-control" name="desc_inst" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc32" name="btnValidarDoc32">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_ocup_legal" method="post" enctype="multipart/form-data" id="form8">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="26">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Ocupación legal del inmueble</label>
                                                    <input type="file" value="" id="ocup_legal" class="form-control" name="ocup_legal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc8" name="btnValidarDoc8">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_dictamen" method="post" enctype="multipart/form-data" id="form15">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="15">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Dictamen de uso de suelo</label>
                                                    <input type="file" value="" id="dictamen" class="form-control" name="dictamen" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc15" name="btnValidarDoc15">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_const_seg" method="post" enctype="multipart/form-data" id="form16">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="9">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Constancia de seguridad estructutal</label>
                                                    <input type="file" value="" id="const_seg" class="form-control" name="const_seg" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc16" name="btnValidarDoc16">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_visto_prot" method="post" enctype="multipart/form-data" id="form17">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="13">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Visto bueno de protección civil municipal</label>
                                                    <input type="file" value="" id="visto_prot" class="form-control" name="visto_prot" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc17" name="btnValidarDoc17">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cert_nume_ofic" method="post" enctype="multipart/form-data" id="form18">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="16">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Certificado del número oficial</label>
                                                    <input type="file" value="" id="cert_nume_ofic" class="form-control" name="cert_nume_ofic" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc18" name="btnValidarDoc18">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_plano" method="post" enctype="multipart/form-data" id="form20">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="62">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Plano arquitectónico del inmueble</label>
                                                    <input type="file" value="" id="plano" class="form-control" name="plano" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc20" name="btnValidarDoc20">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_material_biblio" method="post" enctype="multipart/form-data" id="form23">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="18">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Material bibliográfico</label>
                                                    <input type="file" value="" id="material_biblio" class="form-control" name="material_biblio" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc23" name="btnValidarDoc23">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_labo_poli" method="post" enctype="multipart/form-data" id="form24">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="66">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Equipamiento de laboratorio polifuncional</label>
                                                    <input type="file" value="" id="labo_poli" class="form-control" name="labo_poli" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc24" name="btnValidarDoc24">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_inventario" method="post" enctype="multipart/form-data" id="form22">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="59">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">


                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Inventario de las instalaciones</label>
                                                    <input type="file" value="" id="inventario" class="form-control" name="inventario" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc22" name="btnValidarDoc22">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->
                                    

                                <?php } ?>
                                <!-- EDUCACIÓN BÁSICA END -->


                                <!-- EDUCACIÓN MEDIA SUPERIOR START -->
                                <?php if ($acuerdo->idniv == '15') { ?>

                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_plantilla_personal" method="post" enctype="multipart/form-data" id="form21">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="58">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Media superior (plantilla de personal docente y directivo)</label>
                                                    <input type="file" value="" id="plantilla_personal" class="form-control" name="plantilla_personal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc21" name="btnValidarDoc21">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_desc_inst" method="post" enctype="multipart/form-data" id="form32">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="63">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Descripción de instalaciones educación superior</label>
                                                    <input type="file" value="" id="desc_inst" class="form-control" name="desc_inst" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc32" name="btnValidarDoc32">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_ocup_legal" method="post" enctype="multipart/form-data" id="form8">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="26">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Ocupación legal del inmueble</label>
                                                    <input type="file" value="" id="ocup_legal" class="form-control" name="ocup_legal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc8" name="btnValidarDoc8">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_dictamen" method="post" enctype="multipart/form-data" id="form15">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="15">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Dictamen de uso de suelo</label>
                                                    <input type="file" value="" id="dictamen" class="form-control" name="dictamen" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc15" name="btnValidarDoc15">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_const_seg" method="post" enctype="multipart/form-data" id="form16">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="9">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Constancia de seguridad estructutal</label>
                                                    <input type="file" value="" id="const_seg" class="form-control" name="const_seg" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc16" name="btnValidarDoc16">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_visto_prot" method="post" enctype="multipart/form-data" id="form17">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="13">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Visto bueno de protección civil municipal</label>
                                                    <input type="file" value="" id="visto_prot" class="form-control" name="visto_prot" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc17" name="btnValidarDoc17">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cert_nume_ofic" method="post" enctype="multipart/form-data" id="form18">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="16">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Certificado del número oficial</label>
                                                    <input type="file" value="" id="cert_nume_ofic" class="form-control" name="cert_nume_ofic" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc18" name="btnValidarDoc18">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_plano" method="post" enctype="multipart/form-data" id="form20">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="62">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Plano arquitectónico del inmueble</label>
                                                    <input type="file" value="" id="plano" class="form-control" name="plano" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc20" name="btnValidarDoc20">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_labo_poli" method="post" enctype="multipart/form-data" id="form24">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="66">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Equipamiento de laboratorio polifuncional</label>
                                                    <input type="file" value="" id="labo_poli" class="form-control" name="labo_poli" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc24" name="btnValidarDoc24">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_inventario" method="post" enctype="multipart/form-data" id="form22">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="59">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Inventario de las instalaciones</label>
                                                    <input type="file" value="" id="inventario" class="form-control" name="inventario" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc22" name="btnValidarDoc22">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->


                                    


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_inst_eval" method="post" enctype="multipart/form-data" id="form25">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="21">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Ficha de solicitud RVOE-CEPPEMS</label>
                                                    <input type="file" value="" id="inst_eval" class="form-control" name="inst_eval" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc25" name="btnValidarDoc25">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_acervo_biblio" method="post" enctype="multipart/form-data" id="form26">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="19">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Acervo bibliográfico</label>
                                                    <input type="file" value="" id="acervo_biblio" class="form-control" name="acervo_biblio" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc26" name="btnValidarDoc26">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->

                                <?php } ?>
                                <!-- EDUCACIÓN MEDIA SUPERIOR END -->


                                <!-- EDUCACIÓN SUPERIOR START -->
                                <?php if ($acuerdo->idniv == '16') { ?>
                                
                                
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_ocup_legal" method="post" enctype="multipart/form-data" id="form8">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="26">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Ocupación legal del inmueble</label>
                                                    <input type="file" value="" id="ocup_legal" class="form-control" name="ocup_legal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc8" name="btnValidarDoc8">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_dictamen" method="post" enctype="multipart/form-data" id="form15">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="15">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Dictamen de uso de suelo</label>
                                                    <input type="file" value="" id="dictamen" class="form-control" name="dictamen" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc15" name="btnValidarDoc15">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_const_seg" method="post" enctype="multipart/form-data" id="form16">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="9">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Constancia de seguridad estructutal</label>
                                                    <input type="file" value="" id="const_seg" class="form-control" name="const_seg" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc16" name="btnValidarDoc16">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_visto_prot" method="post" enctype="multipart/form-data" id="form17">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="13">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Visto bueno de protección civil municipal</label>
                                                    <input type="file" value="" id="visto_prot" class="form-control" name="visto_prot" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc17" name="btnValidarDoc17">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cert_nume_ofic" method="post" enctype="multipart/form-data" id="form18">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="16">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Certificado del número oficial</label>
                                                    <input type="file" value="" id="cert_nume_ofic" class="form-control" name="cert_nume_ofic" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc18" name="btnValidarDoc18">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_plano" method="post" enctype="multipart/form-data" id="form20">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="62">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Plano arquitectónico del inmueble</label>
                                                    <input type="file" value="" id="plano" class="form-control" name="plano" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc20" name="btnValidarDoc20">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                

                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_mapa_doc" method="post" enctype="multipart/form-data" id="form27">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="28">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Mapa curricular</label>
                                                    <input type="file" value="" id="mapa_doc" class="form-control" name="mapa_doc" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc27" name="btnValidarDoc27">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_prog_estu" method="post" enctype="multipart/form-data" id="form28">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="68">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Programa de estudios</label>
                                                    <input type="file" value="" id="prog_estu" class="form-control" name="prog_estu" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc28" name="btnValidarDoc28">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_plat_tecno" method="post" enctype="multipart/form-data" id="form29">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="69">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Plataforma tecnológica educativa</label>
                                                    <input type="file" value="" id="plat_tecno" class="form-control" name="plat_tecno" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc29" name="btnValidarDoc29">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_inst_espe" method="post" enctype="multipart/form-data" id="form30">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="23">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Instalaciones especiales</label>
                                                    <input type="file" value="" id="inst_espe" class="form-control" name="inst_espe" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc30" name="btnValidarDoc30">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_coepes" method="post" enctype="multipart/form-data" id="form31">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="65">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>COEPES  formato autoevaluación (ENOPEES)</label>
                                                    <input type="file" value="" id="coepes" class="form-control" name="coepes" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc31" name="btnValidarDoc31">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <!--
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_desc_inst" method="post" enctype="multipart/form-data" id="form32">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="63">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Descripción de instalaciones educación superior</label>
                                                    <input type="file" value="" id="desc_inst" class="form-control" name="desc_inst" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc32" name="btnValidarDoc32">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    -->
                                    <!-- FORM END -->

                                <?php } ?>
                                    
                                    
                                <?php if ($acuerdo->idniv == '17') { ?>  
                                
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_opinion_tec" method="post" enctype="multipart/form-data" id="form30">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="72">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Opinión Técnica Académica OTA</label>
                                                    <input type="file" value="" id="opinion_tec" class="form-control" name="opinion_tec" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc30" name="btnValidarDoc30">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_ocup_legal" method="post" enctype="multipart/form-data" id="form8">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="26">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Ocupación legal del inmueble</label>
                                                    <input type="file" value="" id="ocup_legal" class="form-control" name="ocup_legal" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc8" name="btnValidarDoc8">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->
                                    
                                    
                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_dictamen" method="post" enctype="multipart/form-data" id="form15">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="15">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Dictamen de uso de suelo</label>
                                                    <input type="file" value="" id="dictamen" class="form-control" name="dictamen" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc15" name="btnValidarDoc15">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_const_seg" method="post" enctype="multipart/form-data" id="form16">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="9">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Constancia de seguridad estructutal</label>
                                                    <input type="file" value="" id="const_seg" class="form-control" name="const_seg" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc16" name="btnValidarDoc16">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_visto_prot" method="post" enctype="multipart/form-data" id="form17">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="13">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Visto bueno de protección civil municipal</label>
                                                    <input type="file" value="" id="visto_prot" class="form-control" name="visto_prot" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc17" name="btnValidarDoc17">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_cert_nume_ofic" method="post" enctype="multipart/form-data" id="form18">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="16">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Certificado del número oficial</label>
                                                    <input type="file" value="" id="cert_nume_ofic" class="form-control" name="cert_nume_ofic" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc18" name="btnValidarDoc18">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->


                                    <!-- FORM START -->
                                    <form action="<?= base_url() ?>analista/registro_documentacion_general/subir_documentacion_plano" method="post" enctype="multipart/form-data" id="form20">
                                        <div class="row well well-lg">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                    <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                    <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                    <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="62">
                                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                    <?php
                                                    if ($this->session->flashdata('error_documento')) {
                                                        ?>

                                                        <div class="alert alert-danger fade in alert-dismissable">
                                                            <a class="close" data-dismiss="alert">x</a>
                                                            <?= $this->session->flashdata('error_documento') ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <label>Plano arquitectónico del inmueble</label>
                                                    <input type="file" value="" id="plano" class="form-control" name="plano" accept=".pdf">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-3" style="text-align: center">
                                                    <br/>
                                                    <button class="btn btn-primary" type="submit" id="btnValidarDoc20" name="btnValidarDoc20">Enviar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- FORM END -->

                                
                                <?php } ?>     

                            <?php } ?>    

                        </div>
                        <!-- ROW END -->

                        <div class="text-right m-t-xs">
                            <a class="btn btn-default prev ant2" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                            <a class="btn btn-default next sig2" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                        </div>
                    </div>
                    <!-- STEP2 END -->


                    <!-- STEP3 START -->
                    <div id="step3" class="tab-pane">
                        
                        <div class="text-right m-t-xs">
                            <a class="btn btn-default prev ant3" id="btnprevStep3" href="#step2" data-toggle="tab">Anterior</a>
                        </div>
                        <div class="row">
                        </div>
                        <!-- ROW START -->
                        <div class="row well well-lg">

                            <?php if (is_null($validar_acuerdo)) { ?>

                                <div class="row well well-lg">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label>Usted no puede subir archivos.</label>
                                        </div>
                                    </div>

                                </div>

                            <?php } else if (is_null($acuerdo)) { ?>  

                                <div class="row well well-lg">

                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <label>Proceso no concluido (sin seguimiento).</label>
                                        </div>
                                    </div>

                                </div>

                            <?php } else { ?>

                                <!-- FORM START -->
                                <form action="<?= base_url() ?>analista/registro_documentacion_institucion/subir_documentacion_acuerdo" method="post" enctype="multipart/form-data" id="form33">
                                    <div class="row well well-lg">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="id_acuerdo" class="form-control" name="id_acuerdo" value="<?= $acuerdo->idacu ?>">
                                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                                <input type="hidden" id="usu_login" class="form-control" name="usu_login" value="<?= $institucion->usulogin ?>">
                                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="20">
                                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">

                                                <?php
                                                if ($this->session->flashdata('error_documento')) {
                                                    ?>

                                                    <div class="alert alert-danger fade in alert-dismissable">
                                                        <a class="close" data-dismiss="alert">x</a>
                                                        <?= $this->session->flashdata('error_documento') ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label>Acuerdo</label>
                                                <input type="file" value="" id="acuerdo" class="form-control" name="acuerdo" accept=".pdf">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3" style="text-align: center">
                                                <br/>
                                                <button class="btn btn-primary" type="submit" id="btnValidarDoc33" name="btnValidarDoc33">Enviar</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- FORM END -->

                            <?php } ?>

                        </div>
                        <!-- ROW END -->

                        <div class="text-right m-t-xs">
                            <a class="btn btn-default prev ant3" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                            <!--<button class="btn btn-primary" type="submit" value="Submit" id="btnvalidar" name="btnvalidar">Enviar</button>-->
                            <!--<a class="btn btn-primary submitWizard" id="btnvalidar" name="btnvalidar" >Enviar</a>-->                            
                        </div>
                    </div>
                    <!-- STEP3 END -->

                </div>
                <!-- TAB-CONTENT END -->


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

