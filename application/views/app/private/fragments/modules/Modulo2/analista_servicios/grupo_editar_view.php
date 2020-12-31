<?php
/**
 * Vista de edicion de grupos 
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra editar
 * el grupo seleccionado
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/grupo
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
                Editar grupo
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <p>Formulario</p>
                <div class="col-lg-12 text-right">
                    <a href="#">Visualizar acuerdo</a>
                </div>
                <!--form START-->
                <form role="form" id="form">

                    <!--form-group START-->
                    <div class="form-group col-lg-12">
                        <label for="nombre_grupo" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre grupo</label> 

                        <input type="text" id="nombre_grupo" name="nombre_grupo" placeholder="*Campo requerido" class="form-control" required>

                        <label for="capacidad" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Número de alumnos</label> 
                        <input type="number" id="capacidad" name="capacidad" placeholder="*Campo requerido" class="form-control" required>

                    </div>
                    <!--form-group END-->
                    <div class="text-right">
                        <a href="<?= base_url() ?>analista_servicios/grupo" class="btn btn-primary" 
                            ><i class="fa fa-check"> </i> Actualizar
                        </a>

                        <a href="<?= base_url() ?>analista_servicios/grupo" class="btn btn-danger" 
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