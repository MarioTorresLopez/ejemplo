<?php
/**
 * Vista de la seccion de historiales
 *
 * Vista que muestra al usuario la interfaz grafica para la consulta del detalle de historiales de planteles
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_plantel
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo1.Historiales
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/incorporacion/historico
 */
?>
<div class="row">
    <div class="col-sm-6">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Anterior
            </div>

            <div class="panel-body">
                <div class="col-sm-12">
                    <label>Croquis</label>
                    <input type="text" name="" value="Croquis" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Plano Arquitectonico</label>
                    <input type="text" name="" value="Plano" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Inventario</label>
                    <input type="text" name="" value="Inventario" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Reglamento</label>
                    <input type="text" name="" value="Reglamento" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Matl. Bibliografico</label>
                    <input type="text" name="" value="Material" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Emblema/Sello</label>
                    <input type="text" name="" value="Emblema/Sello" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Plantilla personal</label>
                    <input type="text" name="" value="Anexo1" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Intls. especiales</label>
                    <input type="text" name="" value="Anexo5" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Descripcion instalaciones</label>
                    <input type="text" name="" value="Anexo4" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Domicilio:</label>
                </div>
                <div class="col-sm-12">
                    <label>Calle</label>
                    <input type="text" name="" value="Calle" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-6">
                    <label>N° Ext.</label>
                    <input type="text" name="" value="300" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-6">
                    <label>N° Int.</label>
                    <input type="text" name="" value="402" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Colonia</label>
                    <input type="text" name="" value="Colonia" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Delegacion</label>
                    <input type="text" name="" value="Delegacion" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Municipio</label>
                    <input type="text" name="" value="Municipio" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Turno</label>
                    <input type="text" name="" value="matutino" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Tipo</label>
                    <input type="text" name="" value="mixta" placeholder="" class="form-control" disabled="">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Actual
            </div>

            <div class="panel-body">
                <div class="col-sm-12">
                    <label>Croquis</label>
                    <input type="text" name="" value="Croquis" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Plano Arquitectonico</label>
                    <input type="text" name="" value="Plano" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Inventario</label>
                    <input type="text" name="" value="Inventario" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Reglamento</label>
                    <input type="text" name="" value="Reglamento" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Matl. Bibliografico</label>
                    <input type="text" name="" value="Material" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Emblema/Sello</label>
                    <input type="text" name="" value="Emblema/Sello" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Plantilla personal</label>
                    <input type="text" name="" value="Anexo1" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Intls. especiales</label>
                    <input type="text" name="" value="Anexo5" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Descripcion instalaciones</label>
                    <input type="text" name="" value="Anexo4" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Domicilio:</label>
                </div>
                <div class="col-sm-12">
                    <label>Calle</label>
                    <input type="text" name="" value="Calle" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-6">
                    <label>N° Ext.</label>
                    <input type="text" name="" value="300" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-6">
                    <label>N° Int.</label>
                    <input type="text" name="" value="402" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Colonia</label>
                    <input type="text" name="" value="Colonia" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Delegacion</label>
                    <input type="text" name="" value="Delegacion" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Municipio</label>
                    <input type="text" name="" value="Municipio" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Turno</label>
                    <input type="text" name="" value="matutino" placeholder="" class="form-control" disabled="">
                </div>
                <div class="col-sm-12">
                    <label>Tipo</label>
                    <input type="text" name="" value="mixta" placeholder="" class="form-control" disabled="">
                </div>
            </div>
        </div>
    </div>
</div> 