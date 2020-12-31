<!DOCTYPE html>

<?php
/**
 * Vista de listado de solicitudes para cuentas pendientes
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_prop
 * @package    application.views
 * @subpackage views/private/fragments/modules/Modulo1/analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/analista/solicitud_de_cuentas_aspirantes
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
                Lista de solicitudes para cuentas pendientes
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- TABLE-RESPONSIVE START -->
                <div class="table-responsive">

                    <!-- TABLE START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th class="text_center">N° Id</th>
                                <th class="text_center">Nombre</th>
                                <th class="text_center">Fecha de solicitud</th>
                                <th class="text_center">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!is_null($solicitudes)) :
                                foreach ($solicitudes as $solicitud) :
                                    ?>
                                    <tr>
                                        <td><?= $solicitud->idsolicitud ?></td>
                                        <td><?= $solicitud->nombre ?> <?= $solicitud->apellido1 ?> <?= $solicitud->apellido2 ?></td>
                                        <td  class="text_center"> <?= $solicitud->fechasolicitud ?>  </td>
                                        <td class="tooltip-demo text-center">
                                            <a href="<?= base_url() ?>analista/detalle_datos_cuentas_solicitud_aspirantes/solicitud/<?= $solicitud->idsolicitud ?>" class="btn btn-primary " data-toggle="tooltip" title="Ver el perfil de los aspirantes a cuenta">
                                                <i class="fa fa fa-check"></i> Ver detalle 
                                            </a>
                                        </td>   
                                    </tr>

                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </tbody>

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
<!-- SROW END -->