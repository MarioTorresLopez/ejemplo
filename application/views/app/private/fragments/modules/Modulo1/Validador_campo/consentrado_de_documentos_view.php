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
                    Consentrado para validar el Validador de Campo
                </div>
                <div class="panel-body">
                    <table id="example2" class="table table-striped table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>Nombre de Documetos</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($int = 0; $int <= 30; $int++) {
                                $acumulador = $int + 1;
                                ?>
                                <tr>
                                    <td>Documeto numero <?= $acumulador ?></td>
                                    <td>
                                        <div class="form-group">

                                            <label class="checkbox-inline"> 
                                                <input type="checkbox" class="i-checks" checked> Si aprovado
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" class="i-checks"> Si aprovado
                                            </label>
                                            <input type="text" class="form-control" placeholder="Observacion" style="WIDTH: 400px; HEIGHT: 40px"> 
                                        </div>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-default btn-lg" type="submit">Cancelar</button>
                            <button class="btn btn-primary btn-lg" type="submit">Enviar resultado</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



