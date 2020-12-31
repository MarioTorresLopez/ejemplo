<?php
/**
 * Vista de busqueda de instituciones y sus planteles
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra consultar
 * el listado de instituciones que tiene registradas asi como los planteles de
 * esa institucion, sus carreras de esos planteles y si esta cuenta con una
 * especialidad la mostrara de lo contrario pasara a la gestion escolar
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/buscador_kardex
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
                Buscador
            </div>
            <!-- panel-heading END -->
            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                
                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                    Nivel educativo

                    <select name="nivel" class="form-control m-b">
                        <option>Selecciona una opción</option>
                        <option value="1">Basico</option>
                        <option value="2">Media Superior</option>
                        <option value="3">Superior</option>
                        <option value="4">Normal</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Instituciones

                    <select name="institucion" style="width: 100%" class="js-source-states">
                        <option>Selecciona una opción</option>
                        <option value="1">UTEQ</option>
                        <option value="2">UPQ</option>
                        <option value="3">ITQ</option>
                        <option value="4">UVM</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de planteles

                    <select name="plantel" style="width: 100%"  class="js-source-states">
                        <option>Selecciona una opción</option>
                        <option value="1">Plantel 1</option>
                        <option value="2">Plantel 2</option>
                        <option value="3">Plantel 3</option>
                        <option value="4">Plantel 4</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de carreras del plantel 1

                    <select name="carreras" style="width: 100%"  class="js-source-states">
                        <option>Selecciona una opción</option>
                        <option value="1">TIC</option>
                        <option value="2">Mecatronica</option>
                        <option value="3">Administración</option>
                        <option value="4">Mercadotecnia</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <!-- panel-group START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de especialidades de la carrera de TIC

                    <select name="especialidad" style="width: 100%"  class="js-source-states">
                        <option>Selecciona una opción</option>                        
                        <option value="1">Sistemas Informaticos</option>
                        <option value="2">Redes</option>
                    </select>
                </div>
                <!-- panel-group END -->

                <div class="text-right">
                	<a href="<?php base_url() ?>gestion_kardex"><button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="glyphicon glyphicon-search"></i> Consultar</strong></button></a>

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