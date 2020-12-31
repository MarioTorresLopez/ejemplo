<?php
/**
 * Vista de periodo escolar
 *
 * Vista que muestra al usuario la interfaz donde se podra consultar la lista de periodos
 * registrados en dicho plantel, ademas de consultar las carreras 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/control_escolar/periodos_mss
 */
?>


<!DOCTYPE html>



<!-- row START -->
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
                Periodo Escolar
            </div>
            <!-- panel-heading END -->
            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Mes</th>
                            <th>Carreras</th>
                        </tr>
                    </thead>
                    <!-- thead END -->
                    <!-- tbody START -->
                    <tbody>
                        <?php for($i=1;$i<6;$i++){ ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td>Agosto-Diciembre</td>
                            <td>
                                <a href="<?= base_url() ?>control_escolar/periodos_mss/carreras">
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
<!-- row END -->

