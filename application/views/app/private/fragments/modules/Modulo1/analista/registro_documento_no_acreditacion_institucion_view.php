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
                <h2 style="font-family: 'Soberana Sans'; font-size: 2rem;">Registro de archivo para no acreditar la institución</h2>
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form action="<?= base_url() ?>analista/registro_documento_no_acreditacion_institucion/subir_documentacion_no_acre_inco" method="post" enctype="multipart/form-data" id="form1">
                    <div class="row well well-lg">

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinsti ?>">
                                <input type="hidden" id="id_usuario" class="form-control" name="id_usuario" value="<?= $institucion->idusu ?>">
                                <input type="hidden" id="sin_codigo" class="form-control" name="sin_codigo" value="71">

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
                                <label>Documento de negación de solicitud</label>
                                <input type="file" id="no_acre_inco" class="form-control" name="no_acre_inco" accept=".pdf">
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