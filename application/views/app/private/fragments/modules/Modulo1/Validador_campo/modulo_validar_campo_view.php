<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<div class="content animate-panel">

    <div class="row">
        <div class="col-lg-12">


            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    Standard table
                </div>
                <div class="panel-body">
                    <table id="example2" class="table table-striped table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>Nombre de Institución</th>
                                <th>Dirección</th>
                                <th>Revisar Documentos</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($int = 0; $int <= 5; $int++) {
                                $acumulador = $int + 1;
                                ?>
                                <tr>
                                    <td>Intitución Patito <?= $acumulador ?></td>
                                    <td>Direccion de Intitución Patito <?= $acumulador ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="<?= base_url() ?>consentrado_de_documetos_validador_campo/revisar">
                                            Revisar documentos
                                        </a>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


