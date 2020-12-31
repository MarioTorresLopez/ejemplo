<?php
/**
 * Vista de la gestion de mapas curriculares
 *
 * Vista que muestra al usuario la interfaz grafica para agregar, mostrar, editar y eliminar mapas curriculares
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo.Mapa_curricular
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/mp_controller
 */
?>

<div class="content">

    <div class="row">
        <!-- col-lg-6 -->
        <div class="col-lg-12">
            <!-- hpanel -->
            <div class="hpanel hblue">
                <!-- panel-heading -->
                <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                    <!-- panel-tools -->
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    Agregar Mapa Curricular
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    <p>
                        Formulario 
                    </p>
                    <!-- form -->
                    <form role="form" id="form">
                        <div class="form-group">
                            <label for="nombre" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre Mapa Curricular</label> 
                            <input type="text" id="nombre_asig" name="nombre_asig" placeholder="*Campo requerido" class="form-control" required>
                        </div>
                        <div class="row" id="previa_select">
                            <div class="form-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                <label for="tipo">Periodo</label> 
                                <select name="institucion" class="form-control m-b">
                                    <option>---Seleccione---</option>
                                    <option value="">Sep18</option>
                                    <option value="">Agos18</option>1
                                    <option value="">Oct18</option>
                                    <option value="">Nov18</option>                                        
                                </select>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                        </div>
                    </form>
                    <!-- ./form -->
                </div>
                <!-- ./panel-body -->
            </div>
            <!-- ./hpanel -->


        </div>
        <!-- ./col-lg-6 -->

        <!-- col-lg-12 -->
        <div class="col-lg-12">
            <!-- hpanel -->
            <div class="hpanel hblue">
                <!-- panel-heading -->
                <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                    <!-- panel-tools -->
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    <!-- ./panel-tools -->
                    Mapas Curriculares
                </div>
                <!-- ./panel-heading -->


                <!-- panel-body -->
                <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    <!-- table -->
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        <!-- thead -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Mapa</th>
                                <th>Periodo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- ./thead -->
                        <!-- tbody -->
                        <tbody>
                            <?php for ($i = 0; $i < 30; $i++) { ?>
                                <tr> 
                                    <td>1</td>
                                    <td>Mecatronica</td>
                                    <td>Enero18-Abril18</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php base_url() ?>editar"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                            <a href="<?php base_url() ?>eliminar"><button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button></a>                                                
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php for ($i = 0; $i < 30; $i++) { ?>
                                <tr> 
                                    <td>2</td>
                                    <td>Electronica</td>
                                    <td>Enero18-Abril18</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php base_url() ?>editar"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                            <a href="<?php base_url() ?>eliminar"><button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button></a>                                                
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <!-- ./tbody -->                          

                    </table>
                    <!-- ./table -->
                </div>
                <!-- ./panel-body -->


            </div>
            <!-- ./hpanel -->


        </div>
        <!-- ./col-lg-12 -->

    </div>
</div>
