<?php
/**
 * Vista para la gestión de planteles para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para gestionar el proceso de tramite de los planteles del sistema.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /gestion_planteles
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
                Planteles
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- TABLE-RESPONSIVE START -->
                <div class="table-responsive">

                    <!-- TABLE START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">

                        <!-- THEAD START -->
                        <thead>
                            <tr>
                                <th>N° Solicitud</th>
                                <th>Nombre completo</th>
                                <th>N° Folio</th>
                                <th>ID institución</th>
                                <th>ID plantel</th>
                                <th>Nombre plantel</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <!-- THEAD END -->

                        <!-- TBODY START -->
                        <tbody>

                            <?php
                            if (!is_null($usuarios)) :
                                foreach ($usuarios as $usuario) :
                                    ?>

                                    <tr>
                                        <td><?= $usuario->soliusu ?></td>
                                        <td><?= $usuario->nombrecom ?></td>
                                        <td><?= $usuario->folio ?></td>
                                        <td><?= $usuario->idinsti ?></td>
                                        <td><?= $usuario->idpla ?></td>
                                        <td><?= $usuario->nompla ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>analista/gestion_institucion/detalle_plantel/<?= $usuario->idusu ?>">
                                                <button class="btn btn-info" type="button">
                                                    <i class="fa fa-folder-open"></i> 
                                                    <span class="bold">  </span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </tbody>
                        <!-- TBODY END -->

                    </table>
                    <!-- TABLE END -->

                </div>
                <!-- TABLE-RESPONSIVE END -->

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