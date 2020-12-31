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
                Mapas curriculares
            </div>
            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
            	<!-- table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>N° Solicitud</th>
                            <th>N° Folio</th>
                            <th>N° Expediente</th>
                            <th>Fecha</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <!-- thead END -->
                    <!-- tbody START -->
                    <tbody>
                    	<?php for ($i = 1; $i <= 5; $i++) {?>
                        <tr>
                            <td>1</td>
                            <td>120987547</td>
                            <td>96785478654786</td>
                            <td>07/08/2018</td>
                            <td>
                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_mp">
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-folder-open"></i> 
                                        <span class="bold">  </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
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
</div>
<!-- ROW END -->