<?php
/**
 * Vista para la gestión de instituciones para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para gestionar el proceso de tramite de las instituciones del sistema.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /gestion
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
                Instituciones
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- ROW START -->
                <div class="row">
                    <!-- COL-SM-12 START -->
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <h3>Nomenclatura de botones</h3>
                        </div>

                        <?php
                        if($valor->rol==12):
                        ?>
                        <div class="col-sm-4">
                            <button class="btn btn-info btn-sm btn-block disabled " type="button">
                                Revisión información 
                                <i class="fa fa-file-text"></i> 
                                <span class="bold">  </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-primary2 btn-sm btn-block disabled" type="button">
                                Asignación expediente
                                <i class="fa fa-pencil-square-o"></i> 
                                <span class="bold">  </span>
                            </button>
                        </div>
                        <?php endif;?>
                        <div class="col-sm-4">
                            <button class="btn btn-default btn-sm btn-block disabled" type="button">
                                Revisión documentos 
                                <i class="fa fa-folder-open"></i> 
                                <span class="bold">  </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-primary btn-sm btn-block disabled" type="button">
                                Análisis documentos 
                                <i class="fa fa-folder-open"></i> 
                                <span class="bold">  </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-success  btn-sm btn-block disabled" type="button">
                                Supervisión de campo
                                <i class="fa pe-7s-note2"></i> 
                                <span class="bold">  </span>
                            </button> 
                        </div>

                        <br/>
                        <div class="col-sm-4">
                            <button class="btn btn-warning2 btn-sm btn-block disabled" type="button">
                                Suspención
                                <i class="fa pe-7s-attention"></i> 
                                <span class="bold">  </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-danger btn-sm btn-block disabled" type="button">
                                Incorporación no acreditada
                                <i class="fa pe-7s-close-circle"></i> 
                                <span class="bold">  </span>
                            </button>
                        </div>
                    </div>
                    <!-- COL-SM-12 END -->

                </div>
                <!-- ROW END -->
                <div>
                    <br>
                    <br>
                </div>
                <!-- TABLE-RESPONSIVE START -->
                <div class="table-responsive">

                    <!-- TABLE START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">

                        <!-- THEAD START -->
                        <thead>
                            <tr>
                                <th>Fecha creación</th>
                                <th>Nombre completo de propietario o asociación moral</th>
                                <th>N° expediente</th>
                                <?php
                                if($valor->rol==12):
                                ?>
                                <th>Fecha asignación</th>
                                <?php
                                endif;
                                ?>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- THEAD END -->

                        <!-- TBODY START -->
                        <tbody>

                            <?php
                            if (!is_null($usuarios)) :
                                foreach ($usuarios as $usuario) :
                                    ?>

                                    <tr>
                                        <td><?= $usuario->fechacreacion ?></td>
                                        <?php if($usuario->persona_moral === NULL || $usuario->persona_moral === '') {?>
                                            <td><?= $usuario->nombrepropietario ?></td>
                                        <?php } else { ?>   
                                            <td><?= $usuario->persona_moral ?></td>
                                        <?php } ?> 
                                        <td><?= $usuario->folio ?></td>
                                        <?php
                                        if($valor->rol==12):
                                        ?>
                                        <td><?= $usuario->fechainsti ?></td>
                                        <?php
                                        endif;
                                        ?>
                                        <td>

                                            <?php if ($usuario->folio === NULL || $usuario->folio === '0' || $usuario->folio === '') { ?>
                                                <a href="<?= base_url() ?>analista/registrar_folio_aspirante/folio_aspirante/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-primary2 btn-block" type="button">
                                                        Asignación expediente
                                                        <i class="fa fa-pencil-square-o"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>
                                            <?php } else if ($usuario->estatusinsti === '0') { ?>
                                                Información no valida
                                            <?php } else if ($usuario->estatusinsti === '1') { ?>
                                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_institucion/<?= $usuario->idusu ?>/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-default btn-block" type="button">
                                                        Revisión documentos 
                                                        <i class="fa fa-folder-open"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>  
                                            <?php } else if ($usuario->estatusinsti === '2') { ?>
                                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_institucion/<?= $usuario->idusu ?>/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-info btn-block" type="button">
                                                        Revisión información 
                                                        <i class="fa fa-file-text"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>
                                            <?php } else if ($usuario->estatusinsti === '3') {
                                                ?>
                                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_institucion/<?= $usuario->idusu ?>/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-primary btn-block" type="button">
                                                        Análisis documentos 
                                                        <i class="fa fa-folder-open"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>  
                                            <?php } else if ($usuario->estatusinsti === '4') { ?>
                                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_institucion/<?= $usuario->idusu ?>/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-success  btn-block" type="button">
                                                        Supervisión de campo
                                                        <i class="fa pe-7s-note2"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>
                                            <?php } else if ($usuario->estatusinsti === '5') { ?>
                                                Documentación no valida
                                            <?php } else if ($usuario->estatusinsti === '6') { ?>
                                                Incorporación acreditada
                                            <?php } else if ($usuario->estatusinsti === '7') { ?>
                                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_institucion/<?= $usuario->idusu ?>/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-danger  btn-block" type="button">
                                                        Incorporación no acreditada
                                                        <i class="fa pe-7s-close-circle"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>    
                                            <?php } else if ($usuario->estatusinsti === '8') { ?>
                                                <a href="<?= base_url() ?>analista/gestion_institucion/detalle_institucion/<?= $usuario->idusu ?>/<?= $usuario->idinsti ?>">
                                                    <button class="btn btn-warning2 btn-block" type="button">
                                                        Suspendida
                                                        <i class="fa pe-7s-attention"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>
                                            <?php } ?>      

                                        </td>
                                    </tr>

                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </tbody>
                        <!-- TBODY END -->

                    </table>
                    <!-- TABLE END -->

                </div>
                <!-- TABLE-RESPONSIVE END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->


    <!-- ROW START -->
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
    <!-- ROW END -->


</div>
<!-- ROW END -->