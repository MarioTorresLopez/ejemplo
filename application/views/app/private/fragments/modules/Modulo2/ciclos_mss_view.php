<?php
/**
 * Vista de ciclo escolar
 *
 * Vista que muestra al usuario la interfaz donde se podra consultar la lista de ciclos
 * registrados por el plantel seleccionado y periodo escolar
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/control_escolar/ciclos_mss
 */
?>


<!DOCTYPE html>

<div class="row">
    
    <!-- col-lg-12 START-->
    <div class="col-lg-12">
        <!-- hpanel START -->
        <div class="hpanel hblue">
            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Ciclo Escolar
            </div>
            <!-- panel-heading END -->
            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>Periodos</th>
                        </tr>
                    </thead>
                    <!-- thead END -->
                    <!-- tbody START -->
                    <tbody>
                        <?php for($i=0;$i<5;$i++){ ?>
                        <tr>
                            <td>2016-2017AB</td>
                            <td>
                                <a href="<?= base_url() ?>control_escolar/periodos_mss/periodos_ciclo_escolar">
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-book"></i> 
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
            <!-- panel-body END -->
        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-12 END -->
    
</div>     
