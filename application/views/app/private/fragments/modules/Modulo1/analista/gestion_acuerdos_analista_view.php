<?php
/**
 * Vista para la gestión de acuerdos para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para gestionar los acuerdos del sistema.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /gestion
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/gestion_institucion_analista
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
                Acuerdos
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body">
                <!--
                <a href="<?= base_url() ?>analista/gestion_acuerdos/nuevo_acuerdo">
                    <button type="button" class="btn btn-primary">Agregar acuerdo</button>
                </a>  
                -->
                
                <!-- table START -->  
                <table id="example2" class="table table-striped table-bordered table-hover">

                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>N° Acuerdo</th>
                            <td>Persona</td>
                            <td>Nombre acuerdo</td>
                            <td>Fecha de vigencia</td>
                            <td>Ver archivos</td>
                        </tr>
                    </thead>
                    <!-- thead END -->

                    <!-- tbody START -->
                    <tbody>
                        <?php
                        if (!is_null($acuerdos)) :
                            foreach ($acuerdos as $acuerdo) :
                                ?>
                                <tr>
                                    <td><?= $acuerdo->idacuerdo ?></td>
                                    <?php if($acuerdo->fisica === '1') {?>
                                    <td>Física</td>
                                    <?php } else { ?>
                                    <td>Moral</td>
                                    <?php }?>
                                    <td><?= $acuerdo->noacuerdo ?></td>
                                    <td><?= $acuerdo->fechavigencia ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>analista/gestion_acuerdos/detalle_acuerdo/<?= $acuerdo->idacuerdo ?>">
                                            <button class="btn btn-info" type="button">
                                                <i class="fa fa-folder-open"></i> 
                                                <span class="bold">  </span>
                                            </button>
                                        </a>
                                        <!--
                                        <a href="<?= base_url() ?>analista/gestion_acuerdos/documentacion_acuerdo/<?= $acuerdo->idacuerdo ?>">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fa fa-upload"></i> 
                                                <span class="bold">  </span>
                                            </button>
                                        </a>
                                        -->
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                    <!-- tbody END -->

                </table>
                <!-- table END -->

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