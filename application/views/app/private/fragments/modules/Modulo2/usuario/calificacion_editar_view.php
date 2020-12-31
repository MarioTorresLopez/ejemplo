<?php
/**
 * Vista de actualizacion de calificaciones 
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra actualizar
 * las calificaciones que tiene cada alumno corespondiente a su carrera
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
                Editar calificación
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">
                
                <!--form START-->
                <form role="form" id="form">

                    <!--form-group START-->
                    <div class="form-group col-lg-12">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <label for="curp" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Calificación</label>
                            </div>
                            <div class="col-lg-4">
                                <label for="curp" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Tipo evaluación</label>
                            </div>
                            <div class=" col-lg-4">
                                <label for="fec_evaluacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Fecha de examen</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <input type="text" id="calificacion" name="calificacion" placeholder="8.0" class="form-control" required>
                        </div>
                        <div class="col-lg-4">
                            <select name="tEvaluacion" class="form-control m-b">
                                <option>--Seleccione--</option>
                                <option value="1">Ordinario</option>
                                <option value="2">Regularización</option>
                                <option value="3">Extraordinario</option>
                            </select> 
                        </div>
                        <div class="col-lg-4">
                            <input type="date" id="fec_evaluacion" name="fec_evaluacion" class="form-control" required>
                        </div>
                    </div>                    
                    <!--form-group END-->

                    <div class="text-right">
                        <a href="<?= base_url() ?>usuario/calificacion_gestion" class="btn btn-primary" 
                            ><i class="fa fa-check"> </i> Actualizar
                        </a>

                        <a href="<?= base_url() ?>usuario/calificacion_gestion" class="btn btn-danger" 
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