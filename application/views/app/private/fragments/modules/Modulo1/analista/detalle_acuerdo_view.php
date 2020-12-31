<?php
/**
 * Vista para el detalle de acuerdos para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para visualizar los acuerdos del sistema.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_acuerdo
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/gestion_acuerdos_analista
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
                Acuerdo
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body">

                <?php if (is_null($validar_acuerdo)) { ?>

                    <div class="row well well-lg">

                        <div class="form-group">
                            <div class="col-sm-9">
                                <label>Usted no tiene documentos registrados en el sistema.</label>
                            </div>
                        </div>

                    </div>

                <?php } else { ?> 

                    <!-- COL-SM-6 START -->
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <!--<iframe id="acuerdo" src="<?= base_url() ?>/static/acuerdos/acuerdo_<?= $idacu ?>/1-1-20-DECEM00001_A.pdf" width="500" height="700" style="border: none;" allowfullscreen></iframe>-->
                            <?php
                            if (!is_null($documentos)):
                                foreach ($documentos as $docAcuerdo):
                                    if ($docAcuerdo->iddoc == 20):
                                        ?>
                                        <iframe id="acuerdo" src="<?= base_url() ?>static/acuerdos/acuerdo_<?= $idacu ?>/<?= $docAcuerdo->pdf ?>" width="500" height="700" style="border: none;" allowfullscreen></iframe>
                                        <?php
                                    endif;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                    <!-- COL-SM-6 END -->

                    <!-- COL-SM-6 START -->
                    <div class="col-sm-6">

                        <!-- TABLE-RESPONSIVE START -->
                        <div class="table-responsive">

                            <!-- TABLE START -->
                            <table id="example2" class="table table-striped table-bordered table-hover">

                                <!--  THEAD START -->
                                <thead>
                                    <tr>
                                        <th>Nombre documento</th>
                                        <th>Visualizar documento</th>
                                        <th>Historial</th>
                                    </tr>
                                </thead>
                                <!-- THEAD END -->

                                <!-- TBODY START -->
                                <tbody>
                                    <?php
                                    if (!is_null($documentos)) :
                                        $contador = 0;
                                        foreach ($documentos as $documento) :
                                            $contador += 1;
                                            ?>
                                            <tr>
                                                <td><?= $documento->nombredocumento ?></td>
                                                <?php if ($documento->pdf == null) { ?> 
                                                    <td>No</td>
                                                    <td>No</td>
                                                <?php } else { ?>
                                                    <td>                            
                                                        <a>
                                                            <button class="btn btn-primary mostrarDocumento" x="<?= $contador ?>" type="button" id="visualizar" name="mostrarDocumento">
                                                                <i class="pe-7s-copy-file"></i> 
                                                                <span class="bold">  </span>
                                                                <input id="doc-<?= $contador ?>" type="hidden" value="<?= base_url() ?>static/acuerdos/acuerdo_<?= $idacu ?>/<?= $documento->pdf ?>">
                                                            </button>       
                                                        </a>
                                                    </td>
                                                    <td>  
                                                        <a href="<?= base_url() ?>usuario/historial_documento/mostrar_historial/<?= $idacu ?>/<?= $documento->idusuario ?>">
                                                            <button class="btn btn-info" type="button" id="historial"  name="historial" >
                                                                <i class="pe-7s-folder"></i> 
                                                                <span class="bold">  </span>
                                                            </button>       
                                                        </a>

                                                    </td>
                                                <?php } ?>
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

                        <div id="documento" title="pdf" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                            <form>
                                <div class="col-lg-12" style="clear:both" >
                                    <iframe id="viewer" src=""
                                            style="width:500px; height:400px;" frameborder="5"  ></iframe>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- COL-SM-6 END -->

                <?php } ?>



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