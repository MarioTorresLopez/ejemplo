<!DOCTYPE html>
<?php
/**
 * Vista del adminstrador, muestra una tabla con la lista periodos, donde las acciones son; 
 * agregar, eliminar o editar 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /periodo
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.periodo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/periodo
 */
?>
<div class="row">
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
                Trámites recibidos por municipio y nivel educativo
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                <table id="" class="table table-striped table-bordered table-hover">
                    <!--                     thead START -->
                    <thead>
                        <tr>
                            <th>Municipio</th>
                            <th>M. Superior</th>
                            <th>Superior</th>
                            <th>Básica</th>
                            <th>Gran total</th>
                        </tr>
                    </thead>
                    <!--                     thead END 
                                         tbody START -->
                    <tbody>
                        <tr>
                            <th>Amealco</th>
                            <th><?= $tramites_recibidos_amealco_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_amealco_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_amealco_b->recibidos ?></th>
                            <?php
                            $grantotalamealco = $tramites_recibidos_amealco_ms->recibidos + $tramites_recibidos_amealco_s->recibidos + $tramites_recibidos_amealco_b->recibidos;
                            ?>
                            <th><?= $grantotalamealco ?></th> 
                        </tr>
                        <tr>
                            <th>Arroyo seco</th>
                            <th><?= $tramites_recibidos_arro_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_arro_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_arro_b->recibidos ?></th>
                            <?php
                            $grantotalarro = $tramites_recibidos_arro_ms->recibidos + $tramites_recibidos_arro_s->recibidos + $tramites_recibidos_arro_b->recibidos;
                            ?>
                            <th><?= $grantotalarro ?></th> 
                        </tr>
                        <tr>
                            <th>Cadereyta de montes</th>
                            <th><?= $tramites_recibidos_cade_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_cade_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_cade_b->recibidos ?></th>
                            <?php
                            $grantotalcade = $tramites_recibidos_cade_ms->recibidos + $tramites_recibidos_cade_s->recibidos + $tramites_recibidos_cade_b->recibidos;
                            ?>
                            <th><?= $grantotalcade ?></th> 
                        </tr>
                        <tr>
                            <th>Colón</th>
                            <th><?= $tramites_recibidos_col_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_col_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_col_b->recibidos ?></th>
                            <?php
                            $grantotalcol = $tramites_recibidos_col_ms->recibidos + $tramites_recibidos_col_s->recibidos + $tramites_recibidos_col_b->recibidos;
                            ?>
                            <th><?= $grantotalcol ?></th> 
                        </tr>
                        <tr>
                            <th>Corregidora</th>
                            <th><?= $tramites_recibidos_corre_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_corre_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_corre_b->recibidos ?></th>
                            <?php
                            $grantotalcorre = $tramites_recibidos_corre_ms->recibidos + $tramites_recibidos_corre_s->recibidos + $tramites_recibidos_corre_b->recibidos;
                            ?>
                            <th><?= $grantotalcorre ?></th> 
                        </tr>
                        <tr>
                            <th>El Marqués</th>
                            <th><?= $tramites_recibidos_marq_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_marq_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_marq_b->recibidos ?></th>
                            <?php
                            $grantotalmarq = $tramites_recibidos_marq_ms->recibidos + $tramites_recibidos_marq_s->recibidos + $tramites_recibidos_marq_b->recibidos;
                            ?>
                            <th><?= $grantotalmarq ?></th> 
                        </tr>
                        <tr>
                            <th>Ezequiel montes</th>
                            <th><?= $tramites_recibidos_eze_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_eze_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_eze_b->recibidos ?></th>
                            <?php
                            $grantotaleze = $tramites_recibidos_eze_ms->recibidos + $tramites_recibidos_eze_s->recibidos + $tramites_recibidos_eze_b->recibidos;
                            ?>
                            <th><?= $grantotaleze ?></th> 
                        </tr>
                        <tr>
                            <th>Huimilpan</th>
                            <th><?= $tramites_recibidos_hui_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_hui_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_hui_b->recibidos ?></th>
                            <?php
                            $grantotalhui = $tramites_recibidos_hui_ms->recibidos + $tramites_recibidos_hui_s->recibidos + $tramites_recibidos_hui_b->recibidos;
                            ?>
                            <th><?= $grantotalhui ?></th> 
                        </tr>
                        <tr>
                            <th>Jalpan de serra</th>
                            <th><?= $tramites_recibidos_jal_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_jal_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_jal_b->recibidos ?></th>
                            <?php
                            $grantotaljal = $tramites_recibidos_jal_ms->recibidos + $tramites_recibidos_jal_s->recibidos + $tramites_recibidos_jal_b->recibidos;
                            ?>
                            <th><?= $grantotaljal ?></th> 
                        </tr>
                        <tr>
                            <th>Landa de matamoros</th>
                            <th><?= $tramites_recibidos_lan_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_lan_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_lan_b->recibidos ?></th>
                            <?php
                            $grantotalan = $tramites_recibidos_lan_ms->recibidos + $tramites_recibidos_lan_s->recibidos + $tramites_recibidos_lan_b->recibidos;
                            ?>
                            <th><?= $grantotalan ?></th> 
                        </tr>
                        <tr>
                            <th>Pedro escobedo</th>
                            <th><?= $tramites_recibidos_ped_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_ped_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_ped_b->recibidos ?></th>
                            <?php
                            $grantotalped = $tramites_recibidos_ped_ms->recibidos + $tramites_recibidos_ped_s->recibidos + $tramites_recibidos_ped_b->recibidos;
                            ?>
                            <th><?= $grantotalped ?></th> 
                        </tr>
                        <tr>
                            <th>Peñamiller</th>
                            <th><?= $tramites_recibidos_pen_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_pen_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_pen_b->recibidos ?></th>
                            <?php
                            $grantotalpen = $tramites_recibidos_pen_ms->recibidos + $tramites_recibidos_pen_s->recibidos + $tramites_recibidos_pen_b->recibidos;
                            ?>
                            <th><?= $grantotalpen ?></th> 
                        </tr>
                        <tr>
                            <th>Pinal de amoles</th>
                            <th><?= $tramites_recibidos_pin_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_pin_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_pin_b->recibidos ?></th>
                            <?php
                            $grantotalpin = $tramites_recibidos_pin_ms->recibidos + $tramites_recibidos_pin_s->recibidos + $tramites_recibidos_pin_b->recibidos;
                            ?>
                            <th><?= $grantotalpin ?></th> 
                        </tr>
                        <tr>
                            <th>Querétaro</th>
                            <th><?= $tramites_recibidos_qro_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_qro_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_qro_b->recibidos ?></th>
                            <?php
                            $grantotalqro = $tramites_recibidos_qro_ms->recibidos + $tramites_recibidos_qro_s->recibidos + $tramites_recibidos_qro_b->recibidos;
                            ?>
                            <th><?= $grantotalqro ?></th> 
                        </tr>
                        <tr>
                            <th>San joaquín</th>
                            <th><?= $tramites_recibidos_sjoa_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_sjoa_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_sjoa_b->recibidos ?></th>
                            <?php
                            $grantotalsanjoa = $tramites_recibidos_sjoa_ms->recibidos + $tramites_recibidos_sjoa_s->recibidos + $tramites_recibidos_sjoa_b->recibidos;
                            ?>
                            <th><?= $grantotalsanjoa ?></th> 
                        </tr>
                        <tr>
                            <th>San juan del río</th>
                            <th><?= $tramites_recibidos_sjr_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_sjr_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_sjr_b->recibidos ?></th>
                            <?php
                            $grantotalsanjr = $tramites_recibidos_sjr_ms->recibidos + $tramites_recibidos_sjr_s->recibidos + $tramites_recibidos_sjr_b->recibidos;
                            ?>
                            <th><?= $grantotalsanjr ?></th> 
                        </tr>
                        <tr>
                            <th>Tequisquiapan</th>
                            <th><?= $tramites_recibidos_teq_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_teq_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_teq_b->recibidos ?></th>
                            <?php
                            $grantotalteq = $tramites_recibidos_teq_ms->recibidos + $tramites_recibidos_teq_s->recibidos + $tramites_recibidos_teq_b->recibidos;
                            ?>
                            <th><?= $grantotalteq ?></th> 
                        </tr>
                        <tr>
                            <th>Tolimán</th>
                            <th><?= $tramites_recibidos_tol_ms->recibidos ?></th>
                            <th><?= $tramites_recibidos_tol_s->recibidos ?></th>
                            <th><?= $tramites_recibidos_tol_b->recibidos ?></th>
                            <?php
                            $grantotaltol = $tramites_recibidos_tol_ms->recibidos + $tramites_recibidos_tol_s->recibidos + $tramites_recibidos_tol_b->recibidos;
                            ?>
                            <th><?= $grantotaltol ?></th> 
                        </tr>
                        <?php
                        $grantotal = $grantotalamealco + $grantotalarro + $grantotalan + $grantotalcade + $grantotalcol + $grantotalcorre + $grantotaleze + $grantotalhui + $grantotaljal + $grantotalmarq + $grantotalped + $grantotalpen + $grantotalpin + $grantotalqro + $grantotalsanjoa + $grantotalsanjr + $grantotalteq + $grantotaltol;
                        ?>
                    </tbody>
                    <!--                     tbody END -->

                </table>
                <!--                 table END -->
                <div class="col-lg-3">
                    <label class="form-control">Total: <?= $grantotal ?></label>
                </div>
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?php base_url() ?>imprimir_reportes" class="btn btn-info btn-lg" data-toggle="tooltip" title='Cargar archivo' target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
            </div>
            <!--             panel-body END -->

        </div>

        <!--        hpanel END -->
    </div>


    <!-- col-lg-12 START -->
    <div class="col-lg-12">

        <!-- hpanel START -->
        <div class="hpanel hblue">

            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!--  panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Trámites recibidos por nivel y porcentaje
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">

                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>Nivel</th>
                            <th>Total</th>
                            <th>Porcentaje %</th>
                        </tr>
                    </thead>
                    <!-- thead END -->

                    <!-- tbody START -->
                    <tbody>
                        <?php
                        $totalbasica = $tramites_recibidos_nivel_basica->totalinibas;
                        $totalmedias = $tramites_recibidos_nivel_medias->totalmediasup;
                        $totalsuperior = $tramites_recibidos_nivel_superior->totalsuperior;
                        $totalgeneral = $totalbasica + $totalmedias + $totalsuperior;

                        $porcentajebasica = round($totalbasica / $totalgeneral * 100);
                        $porcentajemedias = round($totalmedias / $totalgeneral * 100);
                        $porcentajesuperior = round($totalsuperior / $totalgeneral * 100);
                        $porcentajegeneral = $porcentajebasica + $porcentajemedias + $porcentajesuperior;
                        ?>
                        <tr>
                            <th>Inicial y básica</th>
                            <th><?= $totalbasica ?></th>
                            <th><?= $porcentajebasica ?></th>
                        </tr>
                        <tr>
                            <th>Media superior</th>
                            <th><?= $totalmedias ?></th>
                            <th><?= $porcentajemedias ?></th>
                        </tr>
                        <tr>
                            <th>Superior</th>
                            <th><?= $totalsuperior ?></th>
                            <th><?= $porcentajesuperior ?></th>
                        </tr>
                        <tr>

                            <th>Total general</th>
                            <th><?= $totalgeneral ?></th>
                            <th><?= $porcentajegeneral ?></th>
                        </tr>
                    </tbody>
                    <!-- tbody END -->

                </table>
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?php base_url() ?>imprimir_kardex_alumno" class="btn btn-info btn-lg" data-toggle="tooltip" title='Cargar archivo' target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
                <!-- table END -->
            </div>
            <!-- panel-body END -->

        </div>
        <!-- hpanel END -->

    </div>
    <!-- col-lg-12 END -->


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
                Avances
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!--                     thead START -->
                    <thead>
                        <tr>
                            <th>Estatus</th>
                            <th>Total</th>
                            <th>Porcentaje</th>
                        </tr>
                        <tr>
                            <th>Análisis de expediente realizado</th> 
                            <th></th> 
                            <th></th> 
                        </tr>
                        <tr>
                            <th>Análisis de expediente por realizar</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Trámites en suspención</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Trámites cancelados</th>                  
                            <th></th>                  
                            <th></th>                  
                        </tr>
                        <tr>
                            <th>Superviciones realizadas</th>                  
                            <th></th>                  
                            <th></th>                  
                        </tr>
                        <tr>
                            <th>Acuerdos otrogados</th>                  
                            <th></th>                  
                            <th></th>                  
                        </tr>

                    </thead>
                    <!--                     thead END 
                                         tbody START -->
                    <tbody>
                    </tbody>
                    <!--                     tbody END -->

                </table>
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?php base_url() ?>imprimir_kardex_alumno" class="btn btn-info btn-lg" data-toggle="tooltip" title='Cargar archivo' target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
                <!--                 table END -->
            </div>
            <!--             panel-body END -->
        </div>
        <!--        hpanel END -->
    </div>
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
                ACUERDOS OTORGADOS (CICLO ACTUAL “2019”)
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!--                     thead START -->
                    <thead>
                        <tr>
                            <th>Municipio</th>
                            <th>Media superior</th>
                            <th>Superior</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <!--                     thead END 
                                         tbody START -->
                    <tbody>
                    </tbody>
                    <!--                     tbody END -->

                </table>
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?php base_url() ?>imprimir_kardex_alumno" class="btn btn-info btn-lg" data-toggle="tooltip" title='Cargar archivo' target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
                <!--                 table END -->
            </div>
            <!--             panel-body END -->
        </div>
        <!--        hpanel END -->
    </div>
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
                ACUERDOS OTORGADOS POR AÑO
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!--                     thead START -->
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>Básica</th>
                            <th>Media superior</th>
                            <th>Superior</th>
                            <th>Gran total</th>
                        </tr>
                    </thead>
                    <!--                     thead END 
                                         tbody START -->
                    <tbody>
                        <tr>
                            <th>2019</th>
                            <th><?= $acuerdos_2019_b->otorgados?></th>
                            <th><?= $acuerdos_2019_ms->otorgados?></th>
                            <th><?= $acuerdos_2019_s->otorgados?></th>
                            <?php
                            $grantotal2019=$acuerdos_2019_b->otorgados+$acuerdos_2019_ms->otorgados+$acuerdos_2019_s->otorgados;
                            ?>
                            <th><?= $grantotal2019?></th>
                        </tr>
                        <tr>
                            <th>2018</th>
                            <th><?= $acuerdos_2018_b->otorgados?></th>
                            <th><?= $acuerdos_2018_ms->otorgados?></th>
                            <th><?= $acuerdos_2018_s->otorgados?></th>
                            <?php
                            $grantotal2018=$acuerdos_2018_b->otorgados+$acuerdos_2018_ms->otorgados+$acuerdos_2018_s->otorgados;
                            ?>
                            <th><?= $grantotal2018?></th>
                        </tr>
                        <tr>
                            <th>2017</th>
                            <th><?= $acuerdos_2017_b->otorgados?></th>
                            <th><?= $acuerdos_2017_ms->otorgados?></th>
                            <th><?= $acuerdos_2017_s->otorgados?></th>
                            <?php
                            $grantotal2017=$acuerdos_2017_b->otorgados+$acuerdos_2017_ms->otorgados+$acuerdos_2017_s->otorgados;
                            ?>
                            <th><?= $grantotal2017?></th>
                        </tr>
                        <tr>
                            <th>2016</th>
                            <th><?= $acuerdos_2016_b->otorgados?></th>
                            <th><?= $acuerdos_2016_ms->otorgados?></th>
                            <th><?= $acuerdos_2016_s->otorgados?></th>
                            <?php
                            $grantotal2016=$acuerdos_2016_b->otorgados+$acuerdos_2016_ms->otorgados+$acuerdos_2016_s->otorgados;
                            ?>
                            <th><?= $grantotal2016?></th>
                        </tr>
                        <tr>
                            <th>2015</th>
                            <th><?= $acuerdos_2015_b->otorgados?></th>
                            <th><?= $acuerdos_2015_ms->otorgados?></th>
                            <th><?= $acuerdos_2015_s->otorgados?></th>
                            <?php
                            $grantotal2015=$acuerdos_2015_b->otorgados+$acuerdos_2015_ms->otorgados+$acuerdos_2015_s->otorgados;
                            ?>
                            <th><?= $grantotal2015?></th>
                        </tr>
                        <tr>
                            <th>2014</th>
                            <th><?= $acuerdos_2014_b->otorgados?></th>
                            <th><?= $acuerdos_2014_ms->otorgados?></th>
                            <th><?= $acuerdos_2014_s->otorgados?></th>
                            <?php
                            $grantotal2014=$acuerdos_2014_b->otorgados+$acuerdos_2014_ms->otorgados+$acuerdos_2014_s->otorgados;
                            ?>
                            <th><?= $grantotal2014?></th>
                        </tr>
                        <tr>
                            <th>2013</th>
                            <th><?= $acuerdos_2013_b->otorgados?></th>
                            <th><?= $acuerdos_2013_ms->otorgados?></th>
                            <th><?= $acuerdos_2013_s->otorgados?></th>
                            <?php
                            $grantotal2013=$acuerdos_2013_b->otorgados+$acuerdos_2013_ms->otorgados+$acuerdos_2013_s->otorgados;
                            ?>
                            <th><?= $grantotal2013?></th>
                        </tr>
                        <tr>
                            <th>2012</th>
                            <th><?= $acuerdos_2012_b->otorgados?></th>
                            <th><?= $acuerdos_2012_ms->otorgados?></th>
                            <th><?= $acuerdos_2012_s->otorgados?></th>
                            <?php
                            $grantotal2012=$acuerdos_2012_b->otorgados+$acuerdos_2012_ms->otorgados+$acuerdos_2012_s->otorgados;
                            ?>
                            <th><?= $grantotal2012?></th>
                        </tr>
                        <tr>
                            <th>2011</th>
                            <th><?= $acuerdos_2011_b->otorgados?></th>
                            <th><?= $acuerdos_2011_ms->otorgados?></th>
                            <th><?= $acuerdos_2011_s->otorgados?></th>
                            <?php
                            $grantotal2011=$acuerdos_2011_b->otorgados+$acuerdos_2011_ms->otorgados+$acuerdos_2011_s->otorgados;
                            ?>
                            <th><?= $grantotal2011?></th>
                        </tr>
                        <tr>
                            <th>2010</th>
                            <th><?= $acuerdos_2010_b->otorgados?></th>
                            <th><?= $acuerdos_2010_ms->otorgados?></th>
                            <th><?= $acuerdos_2010_s->otorgados?></th>
                            <?php
                            $grantotal2010=$acuerdos_2010_b->otorgados+$acuerdos_2010_ms->otorgados+$acuerdos_2010_s->otorgados;
                            ?>
                            <th><?= $grantotal2010?></th>
                        </tr>
                        <tr>
                            <th>2009</th>
                            <th><?= $acuerdos_2009_b->otorgados?></th>
                            <th><?= $acuerdos_2009_ms->otorgados?></th>
                            <th><?= $acuerdos_2009_s->otorgados?></th>
                            <?php
                            $grantotal2009=$acuerdos_2009_b->otorgados+$acuerdos_2009_ms->otorgados+$acuerdos_2009_s->otorgados;
                            ?>
                            <th><?= $grantotal2009?></th>
                        </tr>
                        <tr>
                            <th>2008</th>
                            <th><?= $acuerdos_2008_b->otorgados?></th>
                            <th><?= $acuerdos_2008_ms->otorgados?></th>
                            <th><?= $acuerdos_2008_s->otorgados?></th>
                            <?php
                            $grantotal2008=$acuerdos_2008_b->otorgados+$acuerdos_2008_ms->otorgados+$acuerdos_2008_s->otorgados;
                            ?>
                            <th><?= $grantotal2008?></th>
                        </tr>
                        <tr>
                            <th>2007</th>
                            <th><?= $acuerdos_2007_b->otorgados?></th>
                            <th><?= $acuerdos_2007_ms->otorgados?></th>
                            <th><?= $acuerdos_2007_s->otorgados?></th>
                            <?php
                            $grantotal2007=$acuerdos_2007_b->otorgados+$acuerdos_2007_ms->otorgados+$acuerdos_2007_s->otorgados;
                            ?>
                            <th><?= $grantotal2007?></th>
                        </tr>
                        <tr>
                            <th>2006</th>
                            <th><?= $acuerdos_2006_b->otorgados?></th>
                            <th><?= $acuerdos_2006_ms->otorgados?></th>
                            <th><?= $acuerdos_2006_s->otorgados?></th>
                            <?php
                            $grantotal2006=$acuerdos_2006_b->otorgados+$acuerdos_2006_ms->otorgados+$acuerdos_2006_s->otorgados;
                            ?>
                            <th><?= $grantotal2006?></th>
                        </tr>
                        <tr>
                            <th>2005</th>
                            <th><?= $acuerdos_2005_b->otorgados?></th>
                            <th><?= $acuerdos_2005_ms->otorgados?></th>
                            <th><?= $acuerdos_2005_s->otorgados?></th>
                            <?php
                            $grantotal2005=$acuerdos_2005_b->otorgados+$acuerdos_2005_ms->otorgados+$acuerdos_2005_s->otorgados;
                            ?>
                            <th><?= $grantotal2005?></th>
                        </tr>
                        <tr>
                            <th>2004</th>
                            <th><?= $acuerdos_2004_b->otorgados?></th>
                            <th><?= $acuerdos_2004_ms->otorgados?></th>
                            <th><?= $acuerdos_2004_s->otorgados?></th>
                            <?php
                            $grantotal2004=$acuerdos_2004_b->otorgados+$acuerdos_2004_ms->otorgados+$acuerdos_2004_s->otorgados;
                            ?>
                            <th><?= $grantotal2004?></th>
                        </tr>
                        <tr>
                            <th>2003</th>
                            <th><?= $acuerdos_2003_b->otorgados?></th>
                            <th><?= $acuerdos_2003_ms->otorgados?></th>
                            <th><?= $acuerdos_2003_s->otorgados?></th>
                            <?php
                            $grantotal2003=$acuerdos_2003_b->otorgados+$acuerdos_2003_ms->otorgados+$acuerdos_2003_s->otorgados;
                            ?>
                            <th><?= $grantotal2003?></th>
                        </tr>
                        <tr>
                            <th>2002</th>
                            <th><?= $acuerdos_2002_b->otorgados?></th>
                            <th><?= $acuerdos_2002_ms->otorgados?></th>
                            <th><?= $acuerdos_2002_s->otorgados?></th>
                            <?php
                            $grantotal2002=$acuerdos_2002_b->otorgados+$acuerdos_2002_ms->otorgados+$acuerdos_2002_s->otorgados;
                            ?>
                            <th><?= $grantotal2002?></th>
                        </tr>
                        <tr>
                            <th>2001</th>
                            <th><?= $acuerdos_2001_b->otorgados?></th>
                            <th><?= $acuerdos_2001_ms->otorgados?></th>
                            <th><?= $acuerdos_2001_s->otorgados?></th>
                            <?php
                            $grantotal2001=$acuerdos_2001_b->otorgados+$acuerdos_2001_ms->otorgados+$acuerdos_2001_s->otorgados;
                            ?>
                            <th><?= $grantotal2001?></th>
                        </tr>
                        <tr>
                            <th>2000</th>
                            <th><?= $acuerdos_2000_b->otorgados?></th>
                            <th><?= $acuerdos_2000_ms->otorgados?></th>
                            <th><?= $acuerdos_2000_s->otorgados?></th>
                            <?php
                            $grantotal2000=$acuerdos_2000_b->otorgados+$acuerdos_2000_ms->otorgados+$acuerdos_2000_s->otorgados;
                            ?>
                            <th><?= $grantotal2000?></th>
                        </tr>
                        <?php
                        $grantotalanios=$grantotal2000+$grantotal2001+$grantotal2002+$grantotal2003+$grantotal2004+$grantotal2005+$grantotal2006+$grantotal2007+$grantotal2008+$grantotal2009+$grantotal2010+$grantotal2011+$grantotal2012+$grantotal2013+$grantotal2014+$grantotal2015+$grantotal2016+$grantotal2017+$grantotal2018+$grantotal2019;
                        ?>
                    </tbody>
                    <!--                     tbody END -->

                </table>
                <div class="col-lg-3">
                    <label class="form-control">Total: <?= $grantotalanios ?></label>
                </div>
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?php base_url() ?>imprimir_kardex_alumno" class="btn btn-info btn-lg" data-toggle="tooltip" title='Cargar archivo' target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
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



