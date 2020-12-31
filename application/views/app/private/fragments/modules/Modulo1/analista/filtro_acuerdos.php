<?php
/**
 * Vista de busqueda de acuerdos mediante filtros
 *
 * Vista que muestra al usuario la interfaz grafica, donde se podra consultar
 * el listado de acuerdos que tiene registrados, buscando por nivel academico, institucion, plantel, carrera, especialidad, etc.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/analista/gestion_acuerdos
 */
?>

<!DOCTYPE html>

<!-- ROW START -->
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
                Buscador
            </div>
            <!-- panel-heading END -->
            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- table START -->
                <table class="table table-striped table-bordered table-hover">
                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>Nombre Institución</th>
                        </tr>
                    </thead>
                    <!-- thead END -->
                    <!-- tbody START -->
                    <tbody>
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <tr>
                                <td>UTEQ</td>                            
                            </tr>
                        <?php } ?>
                    </tbody>
                    <!-- tbody END -->
                </table>
                <!-- table END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                    Lista de Planteles
					
                    <select name="plantel" class="form-control m-b">
                        <option>Selecciona una opción</option>
                        <option value="1">Plantel 1</option>
                        <option value="2">Plantel 2</option>
                        <option value="3">Plantel 3</option>
                        <option value="4">Plantel 4</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                    Lista de Carreras del Plantel 1
					
                    <select name="carreras" class="form-control m-b">
                        <option>Selecciona una opción</option>
                        <option value="1">TIC</option>
                        <option value="2">Mecatronica</option>
                        <option value="3">Administración</option>
                        <option value="4">Mercadotecnia</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                    Lista de Especialidades de la carrera de TIC
					
                    <select name="plantel" class="form-control m-b">
                        <option>Selecciona una opción</option>                        
                        <option value="1">Sistemas Informaticos</option>
                        <option value="2">Redes</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <div class="text-right">
                	<a href="<?php base_url() ?>periodo"><button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="glyphicon glyphicon-search"></i> Consultar</strong></button></a>

                </div>

            </div>
            <!-- panel-body END -->
        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-12 END -->
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
</div>