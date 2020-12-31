<?php
/**
 * Vista de la edicion del usuario
 *
 * Vista que muestra al usuario la interfaz grafica para editar los datos del usuario (nombre, correo, contraseña)
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/incorporacion/roles_usuario
 */
?>

<!DOCTYPE html>

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
                Todas mis notificaciones
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <?php
                if ($this->session->flashdata('rol_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('rol_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
                <!-- TABLE-RESPONSIVE START -->
                <!--<div class="table-responsive">-->

                    <!-- TABLE START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th class="text_center">Nombre</th>
                                <th class="text_center">Fecha/Hora</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!is_null($notificacioness)) :
                                foreach ($notificacioness as $notificacion) :
                                    ?>
                                    <tr>
                                                <?php if ($notificacion->tipo == 1): ?>
                                    <td>
                                        Nueva solicitud de cuenta.
                                    </td> 
                                    <?php
                                endif;
                                if ($notificacion->tipo == 2):
                                    ?>
                                    <td>
                                        Bienvenido.
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 3):
                                    ?>
                                    <td>
                                        Nueva solictud de incorporación.
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 4):
                                    ?>
                                    <td>
                                        Solicitud de cita para el expediente <?= $notificacion->folio ?>
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 5):
                                    ?>
                                    <td>
                                        Solicitud para iniciar trámite de incorporación aceptada.
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 6):
                                    ?>
                                    <td>
                                        Incorporación rechazada.
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 7):
                                    ?>
                                    <td>
                                        Nuevo expediente asignado.
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 8):
                                    ?>
                                    <td>
                                        Tienes una nueva cita programada con <?= $notificacion->nomanalista ?>.
                                    </td>
                                    <?php
                                endif;
                                if ($notificacion->tipo == 9):
                                    ?>
                                    <td>
                                        Se han revisado todos los documentos.
                                    </td>
                                    <?php
                                endif;
                                ?>
                                        <td  class="text_center"> <?= $notificacion->fecha ?>  </td>  
                                    </tr>

                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </tbody>

                    </table>
                    <!-- TABLE END -->

                <!--</div>-->
                <!-- TABLE-RESPONSIVE END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->

    <!-- ROW START-->
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
    <!-- ROW END-->

</div>
<!-- ROW END -->