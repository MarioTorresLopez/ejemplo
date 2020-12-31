<div class="row">
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
</div>
