<?php
/**
 * Vista del administrador, muestra una tabla con la lista del nivel educativo, donde las acciones son; 
 * agregar, eliminar o editar 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /nivel_educativo
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.nivel_educativo_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/nivel_educativo
 */
?>
<div class="row">

    <!--     col-lg-6 START -->
    <div class="col-lg-12">
        <!--         hpanel START -->
        <div class="hpanel hblue">
            <!--             panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!--                 panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--                 panel-tools END -->
                Agregar materia
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <p>
                    <!--                    Formulario -->
                </p>
                <!--                 form START -->
                <?php
                if ($this->session->flashdata('materia_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('materia_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
                <form id="form" action="<?=base_url()?>administrador/materia/crear_materia" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12"> 
                                    <label>Nombre materia</label> 
                                    <input type="text" id="nombre_materia_catalogo" name="nombre_materia_catalogo" placeholder="*Campo requerido" class="form-control" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div>
                                <div class="col-sm-12">
                                    <button class="btn btn-sm btn-primary m-t-n-xs" id="botonMateria" name="botonMateria" type="submit">
                                        <strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                                </div>
                            </div>
                        </div>   
                    <!--</div>-->
                </div>
                </form>
                <!--                 form END -->
            
        </div>
        <!--             panel-body END -->
    </div>
    <!--         hpanel END -->
</div>

<!--     col-lg-6 END 

     col-lg-12 START -->
<div class="col-lg-12">
    <!--         hpanel START -->
    <div class="hpanel hblue">
        <!--             panel-heading START -->
        <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
            <!--                 panel-tools START -->
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            <!--                 panel-tools END -->
           Materia
        </div>
        <!--             panel-heading END 
                     panel-body START -->
        <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
            <!--                 table START -->
            <table id="example2" class="table table-striped table-bordered table-hover">
                <!--                     thead START -->
                <thead>
                    <tr>
                        <th>Nombre materia</th>
                        <th>Editar/Eliminar</th>
                    </tr>
                </thead>
                <!--                     thead END 
                                     tbody START -->
                <tbody>
                    <?php
                    if (!is_null($materias)) :
                        $contador = 0;
                        foreach ($materias as $materia) :
                            $contador += 1;
                            ?>
                            <tr>
                                <td> <?= $materia->asignatura ?> </td> 
                                <td>                            
                                    <a class = "btn btn-info" href="<?= base_url() ?>administrador/materia/editar/<?= $materia->idmateria ?>">
                                        <i class="fa fa-paste"></i> 
                                        <span class="bold">  </span>
                                    </a>
                                    <button class="btn btn-danger eliminacion" data-id="<?= $materia->idmateria ?>" type="button">
                                        <i class="fa fa-trash-o"></i> 
                                        <span class="bold"> </span>
                                    </button>

                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
                <!-- tbody END -->

            </table>
            <!--                 table END -->
        </div>
        <!--             panel-body END -->
    </div>
    <!--        hpanel END -->
</div>
<div class="row">
    <div class="col-lg-12">
        <label>  </label>
    </div>
    <div class="col-lg-12">
        <label>  </label>
    </div>
</div>
</div>




