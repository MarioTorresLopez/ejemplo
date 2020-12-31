<?php
/**
 * Vista de edicion de peridos
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra aditar
 * el listado de periodos que tiene registrados.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/periodo
 */
?>

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
                Editar período
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">
                <p>Formulario</p>
                <!--form START-->
                <form role="form" >

                	<!--form-group START-->
                    <div class="form-group col-lg-12">
                        <label for="nombre_perido" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre período académico</label> 

                        <select  class="form-control m-b">
                        	<option>--Seleccione--</option>
                        	<option value="1">Anual</option>
                        	<option value="2">Cuatrimestral</option>
                        	<option value="3">Semestral</option>
                        	<option value="4">--Agregar otro--</option>
                        </select>

                        <label  style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Fecha inicio</label> 
                        <input type="date" placeholder="*Campo requerido" class="form-control">

                        <label  style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Fecha fin</label>
                        <input type="date" placeholder="*Campo requerido" class="form-control" >
                    </div>
                    <!--form-group END-->

                    <div class="text-right">
                        <a href="<?= base_url() ?>analista_servicios/periodo" class="btn btn-primary" 
                            ><i class="fa fa-check"> </i> Actualizar
                        </a>

                        <a href="<?= base_url() ?>analista_servicios/periodo" class="btn btn-danger" 
                            ><i class="fa fa-ban"> </i> Cancelar
                        </a>
                    </div>

                </form>
                <!--form END-->
            </div>
            <!--panel body END-->

        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-12 END-->
</div>