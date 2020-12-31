<!DOCTYPE html>
<?php
/**
 * Vista del administrador, donde edita el nombre de la modalidad
 * @since      1.0
 * @version    1.0
 * @link       /editar_modalidad
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.editar_modalidad_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/editar_modalidad
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
                    Editar bitácora
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    <p>
                        Comentario actual 
                    </p>
                    <form role="form" id="form" action="" method="post">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="comentario" name="comentario" value="<?= $bitacora->comentario ?>" readonly="">
                            <input type="hidden" class="form-control" id="idBitacora" name="idBitacora" value="<?= $bitacora->idinstitucion ?>">
                            <input type="hidden" class="form-control" id="idUsuarioPlantel" name="idUsuarioPlantel" value="<?= $usuarioPlantel ?>">
                            <input type="hidden" class="form-control" id="consecutivo" name="consecutivo" value="<?= $bitacora->consecutivo ?>">
                            <input type="hidden" class="form-control" id="idtipobitacora" name="idtipobitacora" value="<?= $bitacora->idtipobitacora ?>" style="text-transform: uppercase;" >
                            <span class="placeholder">Escriba su observación en el siguiente cuadro de texto.</span>
                            <textarea class="form-control" class="textarea" id="comentario_bitacora" name="comentario_bitacora" tabindex="0" role="textbox" aria-multiline="true"  contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"></textarea>
                            <button type="submit" class="btn btn-primary" id="botonBit">Enviar Comentario</button>
                        </div>
                    </form>
                    <!-- ./form -->
                </div>
                <!-- ./panel-body -->
            </div>
            <!-- ./hpanel -->
        </div>
        <!-- ./col-lg-6 -->
    </div>
</div>

