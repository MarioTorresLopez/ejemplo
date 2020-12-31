<!DOCTYPE html>
<?php
/**
 * Vista del adminstrador, muestra una tabla con la lista de turnos, donde las acciones son; 
 * agregar, eliminar o editar 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /turno
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.turno_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/turno
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
                Agregar turno 
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <p>
                    <!--                    Formulario -->
                </p>
                <!--                 form START -->
                <?php
                if ($this->session->flashdata('turno_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('turno_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
      <form id="form" action="<?= base_url()?>administrador/turno/crear_turno" method="post">
          <div class="row">      
              <div class="col-sm-12">
                  <div class="form-group">
                     <div class="col-sm-12">
                        <label for="rol">Nombre de turno</label> 
                        <input type="text" id="nombre_turno_administrador" name="nombre_turno_administrador" style="text-transform: uppercase;" placeholder="*Campo requerido" class="form-control" required>
                        <span class="help-block"></span>
                     </div>
                  </div>
                    <div>
                        <div class="col-sm-12">
                        <button id="botonTurno" name="botonTurno" class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                            <strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                        </div>
                    </div>
              </div>
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
                Turno
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!--                     thead START -->
                    <thead>
                        <tr>
                            <th>Nombre turno</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <!--                     thead END 
                                         tbody START -->
                    <tbody>
                        <?php
                        if (!is_null($lista_turnos)) :
                            $contador = 0;
                            foreach ($lista_turnos as $turno) :
                                $contador += 1;
                                ?>
                                <tr>
                                    <td><?= $turno->descturno ?></td>
                                    <td>                            
                                        <a  class = "btn btn-info" href="<?= base_url() ?>administrador/turno/editar/<?= $turno->idturno?>">
                                            <i class="fa fa-paste"></i> 
                                            <span class="bold">  </span>
                                        </a>
                                        <button class="btn btn-danger TurnoAdministrador" data-id="<?=$turno->idturno?>">
                                            <i class="fa fa-trash-o"></i> 
                                            <span class="bold">  </span>
                                        </button>
                                    </td>
                                </tr> 
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                    <!--                     tbody END -->

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
