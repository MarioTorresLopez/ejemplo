<div class="row">
    <!--     col-lg-6 END   col-lg-12 START -->
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

                <!--             panel-body END -->

            </div>

            <!--        hpanel END -->
        </div>
    </div>
