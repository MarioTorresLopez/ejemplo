/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {
    
    $("span.help-block").hide();
    
    $("#apellido1_sol").keyup(function () {
        var valorinput = $('#apellido1_sol').val().toUpperCase();
        $('#apellido1_sol').val(valorinput);
        validar('apellido1_sol');
    });
    
    $("#apellido2_sol").keyup(function () {
        var valorinput = $('#apellido2_sol').val().toUpperCase();
        $('#apellido2_sol').val(valorinput);
        validar('apellido2_sol');
    });
    
    $("#nombres_sol").keyup(function () {
        var valorinput = $('#nombres_sol').val().toUpperCase();
        $('#nombres_sol').val(valorinput);
        validar('nombres_sol');
    });
    
    $("#calle_num_sol").keyup(function () {
        var valorinput = $('#calle_num_sol').val().toUpperCase();
        $('#calle_num_sol').val(valorinput);
        validar('calle_num_sol');
    });
    
    $("#colonia_sol").keyup(function () {
        var valorinput = $('#colonia_sol').val().toUpperCase();
        $('#colonia_sol').val(valorinput);
        validar('colonia_sol');
    });
    
    $("#delegacion_sol").keyup(function () {
        var valorinput = $('#delegacion_sol').val().toUpperCase();
        $('#delegacion_sol').val(valorinput);
        validar('delegacion_sol');
    });
    
    $("#ciudad_sol").keyup(function () {
        var valorinput = $('#ciudad_sol').val().toUpperCase();
        $('#ciudad_sol').val(valorinput);
        validar('ciudad_sol');
    });
    
    $("#estado_sol").keyup(function () {
        var valorinput = $('#estado_sol').val().toUpperCase();
        $('#estado_sol').val(valorinput);
        validar('estado_sol');
    });
    
    $("#cp_sol").keyup(function () {
        validar('cp_sol');
    });
    
    $("#telefono_sol").keyup(function () {
        validar('telefono_sol');
    });
    
    $("#nacionalidad_sol").keyup(function () {
        var valorinput = $('#nacionalidad_sol').val().toUpperCase();
        $('#nacionalidad_sol').val(valorinput);
        validar('nacionalidad_sol');
    });
    
    $("#entidad_nac_sol").keyup(function () {
        var valorinput = $('#entidad_nac_sol').val().toUpperCase();
        $('#entidad_nac_sol').val(valorinput);
        validar('entidad_nac_sol');
    });
    
    $("#fecha_nac_sol").change(function () {
        validar('fecha_nac_sol');
    });
    
    $("#se_sol").change(function () {
        validar('se_sol');
    });
    
    $("#curp_sol").keyup(function () {
        var valorinput = $('#curp_sol').val().toUpperCase();
        $('#curp_sol').val(valorinput);
        validar('curp_sol');
    });
    
    $("#nombre_ins_sol").keyup(function () {
        var valorinput = $('#nombre_ins_sol').val().toUpperCase();
        $('#nombre_ins_sol').val(valorinput);
        validar('nombre_ins_sol');
    });
    
    $("#pais_sol").keyup(function () {
        var valorinput = $('#pais_sol').val().toUpperCase();
        $('#pais_sol').val(valorinput);
        validar('pais_sol');
    });
    
    $("#calle_num_ins_sol").keyup(function () {
        var valorinput = $('#calle_num_ins_sol').val().toUpperCase();
        $('#calle_num_ins_sol').val(valorinput);
        validar('calle_num_ins_sol');
    }); 
    
    $("#colonia_ins_sol").keyup(function () {
        var valorinput = $('#colonia_ins_sol').val().toUpperCase();
        $('#colonia_ins_sol').val(valorinput);
        validar('colonia_ins_sol');
    });
    
    $("#delegcion_ins_sol").keyup(function () {
        var valorinput = $('#delegcion_ins_sol').val().toUpperCase();
        $('#delegcion_ins_sol').val(valorinput);
        validar('delegcion_ins_sol');
    });
    
    $("#ciudad_ins_sol").keyup(function () {
        var valorinput = $('#ciudad_ins_sol').val().toUpperCase();
        $('#ciudad_ins_sol').val(valorinput);
        validar('ciudad_ins_sol');
    });
    
    $("#estado_ins_sol").keyup(function () {
        var valorinput = $('#estado_ins_sol').val().toUpperCase();
        $('#estado_ins_sol').val(valorinput);
        validar('estado_ins_sol');
    });
    
    $("#cp_ins_sol").keyup(function () {
        validar('cp_ins_sol');
    });
    
    $("#telefono_ins_sol").keyup(function () {
        validar('telefono_ins_sol');
    });
    
    $("#nivel_ins_sol").change(function () {
        validar('nivel_ins_sol');
    });
    
    $("#carrera_ins_sol").keyup(function () {
        var valorinput = $('#carrera_ins_sol').val().toUpperCase();
        $('#carrera_ins_sol').val(valorinput);
        validar('carrera_ins_sol');
    });
    
    $("#clave_ins_sol").keyup(function () {
        var valorinput = $('#clave_ins_sol').val().toUpperCase();
        $('#clave_ins_sol').val(valorinput);
        validar('clave_ins_sol');
    });
    
    $("#semestre_ins_sol").keyup(function () {
        var valorinput = $('#semestre_ins_sol').val().toUpperCase();
        $('#semestre_ins_sol').val(valorinput);
        validar('semestre_ins_sol');
    });
    
    $("#area_ins_sol").keyup(function () {
        var valorinput = $('#area_ins_sol').val().toUpperCase();
        $('#area_ins_sol').val(valorinput);
        validar('area_ins_sol');
    });
    
    $("#de_fecha_sol").change(function () {
        validar('de_fecha_sol');
    });
    
    $("#a_fecha_sol").change(function () {
        validar('a_fecha_sol');
    });
    
    $("#nombre_ins_niv_sol").keyup(function () {
        var valorinput = $('#nombre_ins_niv_sol').val().toUpperCase();
        $('#nombre_ins_niv_sol').val(valorinput);
        validar('nombre_ins_niv_sol');
    });
    
    $("#pais_ins_niv_sol").keyup(function () {
        var valorinput = $('#pais_ins_niv_sol').val().toUpperCase();
        $('#pais_ins_niv_sol').val(valorinput);
        validar('pais_ins_niv_sol');
    });
    
    $("#calle_num_ins_niv_sol").keyup(function () {
        var valorinput = $('#calle_num_ins_niv_sol').val().toUpperCase();
        $('#calle_num_ins_niv_sol').val(valorinput);
        validar('calle_num_ins_niv_sol');
    });
    
    $("#colonia_ins_niv_sol").keyup(function () {
        var valorinput = $('#colonia_ins_niv_sol').val().toUpperCase();
        $('#colonia_ins_niv_sol').val(valorinput);
        validar('colonia_ins_niv_sol');
    });
    
    $("#delegcion_ins_niv_sol").keyup(function () {
        var valorinput = $('#delegcion_ins_niv_sol').val().toUpperCase();
        $('#delegcion_ins_niv_sol').val(valorinput);
        validar('delegcion_ins_niv_sol');
    });
    
    $("#ciudad_ins_niv_sol").keyup(function () {
        var valorinput = $('#ciudad_ins_niv_sol').val().toUpperCase();
        $('#ciudad_ins_niv_sol').val(valorinput);
        validar('ciudad_ins_niv_sol');
    });
    
    $("#estado_ins_niv_sol").keyup(function () {
        var valorinput = $('#estado_ins_niv_sol').val().toUpperCase();
        $('#estado_ins_niv_sol').val(valorinput);
        validar('estado_ins_niv_sol');
    });
    
    $("#cp_ins_niv_sol").keyup(function () {
        validar('cp_ins_niv_sol');
    });
    
    $("#telefono_ins_niv_sol").keyup(function () {
        validar('telefono_ins_niv_sol');
    });
    
    $("#nivel_ins_niv_sol").change(function () {
        validar('nivel_ins_niv_sol');
    });
    
    $("#carrera_ins_niv_sol").keyup(function () {
        var valorinput = $('#carrera_ins_niv_sol').val().toUpperCase();
        $('#carrera_ins_niv_sol').val(valorinput);
        validar('carrera_ins_niv_sol');
    });
    
    $("#clave_ins_niv_sol").keyup(function () {
        var valorinput = $('#clave_ins_niv_sol').val().toUpperCase();
        $('#clave_ins_niv_sol').val(valorinput);
        validar('clave_ins_niv_sol');
    });
    
    $("#semestre_ins_niv_sol").keyup(function () {
        var valorinput = $('#semestre_ins_niv_sol').val().toUpperCase();
        $('#semestre_ins_niv_sol').val(valorinput);
        validar('semestre_ins_niv_sol');
    });
    
    $("#area_ins_niv_sol").keyup(function () {
        var valorinput = $('#area_ins_niv_sol').val().toUpperCase();
        $('#area_ins_niv_sol').val(valorinput);
        validar('area_ins_niv_sol');
    });
    
    $("#de_fecha_niv_sol").change(function () {
        validar('de_fecha_niv_sol');
    });
    
    $("#a_fecha_niv_sol").change(function () {
        validar('a_fecha_niv_sol');
    });
    
    $("#nombre_ins_equi_sol").keyup(function () {
        var valorinput = $('#nombre_ins_equi_sol').val().toUpperCase();
        $('#nombre_ins_equi_sol').val(valorinput);
        validar('nombre_ins_equi_sol');
    });
    
    $("#ciudad_mun_ins_equi_sol").keyup(function () {
        var valorinput = $('#ciudad_mun_ins_equi_sol').val().toUpperCase();
        $('#ciudad_mun_ins_equi_sol').val(valorinput);
        validar('ciudad_mun_ins_equi_sol');
    });
    
    $("#calle_num_ins_equi_sol").keyup(function () {
        var valorinput = $('#calle_num_ins_equi_sol').val().toUpperCase();
        $('#calle_num_ins_equi_sol').val(valorinput);
        validar('calle_num_ins_equi_sol');
    });
    
    $("#colonia_ins_equi_sol").keyup(function () {
        var valorinput = $('#colonia_ins_equi_sol').val().toUpperCase();
        $('#colonia_ins_equi_sol').val(valorinput);
        validar('colonia_ins_equi_sol');
    });
    
    $("#delegcion_ins_equi_sol").keyup(function () {
        var valorinput = $('#delegcion_ins_equi_sol').val().toUpperCase();
        $('#delegcion_ins_equi_sol').val(valorinput);
        validar('delegcion_ins_equi_sol');
    });
    
    $("#ciudad_ins_equi_sol").keyup(function () {
        var valorinput = $('#ciudad_ins_equi_sol').val().toUpperCase();
        $('#ciudad_ins_equi_sol').val(valorinput);
        validar('ciudad_ins_equi_sol');
    });
    
    $("#estado_ins_equi_sol").keyup(function () {
        var valorinput = $('#estado_ins_equi_sol').val().toUpperCase();
        $('#estado_ins_equi_sol').val(valorinput);
        validar('estado_ins_equi_sol');
    });
    
    $("#cp_ins_equi_sol").keyup(function () {
        validar('cp_ins_equi_sol');
    });
    
    $("#telefono_ins_equi_sol").keyup(function () {
        validar('telefono_ins_equi_sol');
    });
    
    $("#nivel_ins_equi_sol").change(function () {
        validar('nivel_ins_equi_sol');
    });
    
    $("#carrera_ins_equi_sol").keyup(function () {
        var valorinput = $('#carrera_ins_equi_sol').val().toUpperCase();
        $('#carrera_ins_equi_sol').val(valorinput);
        validar('carrera_ins_equi_sol');
    });
    
    $("#pe_ins_equi_sol").keyup(function () {
        var valorinput = $('#pe_ins_equi_sol').val().toUpperCase();
        $('#pe_ins_equi_sol').val(valorinput);
        validar('pe_ins_equi_sol');
    });
    
    $("#semestre_ins_equi_sol").keyup(function () {
        var valorinput = $('#semestre_ins_equi_sol').val().toUpperCase();
        $('#semestre_ins_equi_sol').val(valorinput);
        validar('semestre_ins_equi_sol');
    });
    
    $("#area_esp_ins_equi_sol").keyup(function () {
        var valorinput = $('#area_esp_ins_equi_sol').val().toUpperCase();
        $('#area_esp_ins_equi_sol').val(valorinput);
        validar('area_esp_ins_equi_sol');
    });
    
    $("#fecha_ing_ins_equi_sol").change(function () {
        validar('fecha_ing_ins_equi_sol');
    });
    
    $("#btnvalidar").click(function () {
        
        if (validar('apellido1_sol') === false || validar('apellido2_sol') === false
                || validar('nombres_sol') === false || validar('calle_num_sol') === false
                || validar('colonia_sol') === false || validar('delegcion_sol') === false
                || validar('ciudad_sol') === false || validar('estado_sol') === false
                || validar('cp_sol') === false || validar('telefono_sol') === false
                || validar('nacionalidad_sol') === false || validar('entidad_nac_sol') === false
                || validar('fecha_nac_sol') === false || validar('se_sol') === false
                || validar('curp_sol') === false || validar('nombre_ins_sol') === false
                || validar('pais_sol') === false || validar('calle_num_ins_sol') === false
                || validar('colonia_ins_sol') === false || validar('delegcion_ins_sol') === false
                || validar('ciudad_ins_sol') === false || validar('estado_ins_sol') === false
                || validar('cp_ins_sol') === false || validar('telefono_ins_sol') === false
                || validar('nivel_ins_sol') === false || validar('carrera_ins_sol') === false
                || validar('clave_ins_sol') === false || validar('semestre_ins_sol') === false
                || validar('area_ins_sol') === false || validar('de_fecha_sol') === false
                || validar('a_fecha_sol') === false || validar('nombre_ins_equi_sol') === false
                || validar('ciudad_mun_ins_equi_sol') === false || validar('calle_num_ins_equi_sol') === false
                || validar('colonia_ins_equi_sol') === false || validar('delegcion_ins_equi_sol') === false
                || validar('ciudad_ins_equi_sol') === false || validar('estado_ins_equi_sol') === false
                || validar('cp_ins_equi_sol') === false || validar('telefono_ins_equi_sol') === false
                || validar('nivel_ins_equi_sol') === false || validar('carrera_ins_equi_sol') === false
                || validar('pe_ins_equi_sol') === false || validar('semestre_ins_equi_sol') === false
                || validar('area_esp_ins_equi_sol') === false || validar('fecha_ing_ins_equi_sol') === false) {

            swal({
                title: "Alerta",
                text: "Sus campos no estan validados.",
                type: "warning"
            });

            return false;

        } else {

            swal({
                title: "Registro",
                text: "Sus datos han sido capturados.",
                type: "success"
            },
                    function () {
                        $('#form').submit();
                    }
            );
            return false;
        }

    });
    
    
    $("#btnvalidarcancelar").click(function () {

        var ape1Sol = document.getElementById("apellido1_sol").value;
        var ape2Sol = document.getElementById("apellido2_sol").value;
        var nomSol = document.getElementById("nombres_sol").value;
        var calSol = document.getElementById("calle_num_sol").value;
        var colSol = document.getElementById("colonia_sol").value;
        var delSol = document.getElementById("delegacion_sol").value;
        var ciuSol = document.getElementById("ciudad_sol").value;
        var estSol = document.getElementById("estado_sol").value;
        var cpSol = document.getElementById("cp_sol").value;
        var telSol = document.getElementById("telefono_sol").value;
        var nacSol = document.getElementById("nacionalidad_sol").value;
        var entSol = document.getElementById("entidad_nac_sol").value;
        var fecNacSol = document.getElementById("fecha_nac_sol").value;
        var seSol = document.getElementById("se_sol").value;
        var curpSol = document.getElementById("curp_sol").value;
        var nomInsSol = document.getElementById("nombre_ins_sol").value;
        var paisSol = document.getElementById("pais_sol").value;
        var calInsSol = document.getElementById("calle_num_ins_sol").value;
        var colInsSol = document.getElementById("colonia_ins_sol").value;
        var delInsSol = document.getElementById("delegcion_ins_sol").value;
        var ciuInsSol = document.getElementById("ciudad_ins_sol").value;
        var estInsSol = document.getElementById("estado_ins_sol").value;
        var cpInsSol = document.getElementById("cp_ins_sol").value;
        var telInsSol = document.getElementById("telefono_ins_sol").value;
        var nivInsSol = document.getElementById("nivel_ins_sol").value;
        var carInsSol = document.getElementById("carrera_ins_sol").value;
        var claInsSol = document.getElementById("clave_ins_sol").value;
        var semInsSol = document.getElementById("semestre_ins_sol").value;
        var areaInsSol = document.getElementById("area_ins_sol").value;
        var defecSol = document.getElementById("de_fecha_sol").value;
        var afecSol = document.getElementById("a_fecha_sol").value;
        var nomInsEquSol = document.getElementById("nombre_ins_equi_sol").value;
        var ciuMunInsEquSol = document.getElementById("ciudad_mun_ins_equi_sol").value;
        var calInsEquSol = document.getElementById("calle_num_ins_equi_sol").value;
        var colInsEquSol = document.getElementById("colonia_ins_equi_sol").value;
        var delInsEquSol = document.getElementById("delegcion_ins_equi_sol").value;
        var ciuInsEquSol = document.getElementById("ciudad_ins_equi_sol").value;
        var estInsEquSol = document.getElementById("estado_ins_equi_sol").value;
        var cpInsEquSol = document.getElementById("cp_ins_equi_sol").value;
        var telInsEquSol = document.getElementById("telefono_ins_equi_sol").value;
        var nivInsEquSol = document.getElementById("nivel_ins_equi_sol").value;
        var carInsEquSol = document.getElementById("carrera_ins_equi_sol").value;
        var peInsEquSol = document.getElementById("pe_ins_equi_sol").value;
        var semInsEquSol = document.getElementById("semestre_ins_equi_sol").value;
        var areaInsEquSol = document.getElementById("area_esp_ins_equi_sol").value;
        var fecInsEquSol = document.getElementById("fecha_ing_ins_equi_sol").value;

        if ((ape1Sol !== null && ape1Sol.length !== 0) || 
                (ape2Sol !== null && ape2Sol.length !== 0) || 
                (nomSol !== null && nomSol.length !== 0) || 
                (calSol !== null && calSol.length !== 0) || 
                (colSol !== null && colSol.length !== 0) || 
                (delSol !== null && delSol.length !== 0) || 
                (ciuSol !== null && ciuSol.length !== 0) || 
                (estSol !== null && estSol.length !== 0) || 
                (cpSol !== null && cpSol.length !== 0) || 
                (telSol !== null && telSol.length !== 0) || 
                (nacSol !== null && nacSol.length !== 0) || 
                (entSol !== null && entSol.length !== 0) || 
                (fecNacSol !== '' && fecNacSol !== null) || 
                (seSol !== '---Seleccione---') || 
                (curpSol !== null && curpSol.length !== 0) || 
                (nomInsSol !== null && nomInsSol.length !== 0) || 
                (paisSol !== null && paisSol.length !== 0) || 
                (calInsSol !== null && calInsSol.length !== 0) || 
                (colInsSol !== null && colInsSol.length !== 0) || 
                (delInsSol !== null && delInsSol.length !== 0) || 
                (ciuInsSol !== null && ciuInsSol.length !== 0) || 
                (estInsSol !== null && estInsSol.length !== 0) || 
                (cpInsSol !== null && cpInsSol.length !== 0) || 
                (telInsSol !== null && telInsSol.length !== 0) || 
                (nivInsSol !== '---Seleccione---') || 
                (carInsSol !== null && carInsSol.length !== 0) || 
                (claInsSol !== null && claInsSol.length !== 0) || 
                (semInsSol !== null && semInsSol.length !== 0) || 
                (areaInsSol !== null && areaInsSol.length !== 0) || 
                (defecSol !== null && defecSol.length !== 0) || 
                (afecSol !== null && afecSol.length !== 0) || 
                (nomInsEquSol !== null && nomInsEquSol.length !== 0) || 
                (ciuMunInsEquSol !== null && ciuMunInsEquSol.length !== 0) || 
                (calInsEquSol !== null && calInsEquSol.length !== 0) || 
                (colInsEquSol !== null && colInsEquSol.length !== 0) || 
                (delInsEquSol !== null && delInsEquSol.length !== 0) || 
                (ciuInsEquSol !== null && ciuInsEquSol.length !== 0) || 
                (estInsEquSol !== null && estInsEquSol.length !== 0) || 
                (cpInsEquSol !== null && cpInsEquSol.length !== 0) || 
                (telInsEquSol !== null && telInsEquSol.length !== 0) || 
                (nivInsEquSol !== null && nivInsEquSol.length !== 0) || 
                (carInsEquSol !== null && carInsEquSol.length !== 0) || 
                (peInsEquSol !== null && peInsEquSol.length !== 0) || 
                (semInsEquSol !== null && semInsEquSol.length !== 0) || 
                (areaInsEquSol !== null && areaInsEquSol.length !== 0) || 
                (fecInsEquSol !== '' && fecInsEquSol !== null)) {

            swal({
                title: "¿Seguro que desea cancelar el proceso?",

                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, cancelar",
                cancelButtonText: "No, permanecer",
                closeOnConfirm: false,
                closeOnCancel: false},
                    function (isConfirm) {
                        if (isConfirm) {
                            location.href = base_url() + "analista_servicios/revalidacion";
                        } else {
                            swal("Cancelado");
                        }
                    });

            return false;

        } else {
            location.href = "../revalidacion";
        }


    });
        
}    

function validar(campo) {
    
    var ape1Sol = document.getElementById("apellido1_sol").value;
    var ape2Sol = document.getElementById("apellido2_sol").value;
    var nomSol = document.getElementById("nombres_sol").value;
    var calSol = document.getElementById("calle_num_sol").value;
    var colSol = document.getElementById("colonia_sol").value;
    var delSol = document.getElementById("delegacion_sol").value;
    var ciuSol = document.getElementById("ciudad_sol").value;
    var estSol = document.getElementById("estado_sol").value;
    var cpSol = document.getElementById("cp_sol").value;
    var telSol = document.getElementById("telefono_sol").value;
    var nacSol = document.getElementById("nacionalidad_sol").value;
    var entSol = document.getElementById("entidad_nac_sol").value;
    var fecNacSol = document.getElementById("fecha_nac_sol").value;
    var seSol = document.getElementById("se_sol").value;
    var curpSol = document.getElementById("curp_sol").value;
    var nomInsSol = document.getElementById("nombre_ins_sol").value;
    var paisSol = document.getElementById("pais_sol").value;
    var calInsSol = document.getElementById("calle_num_ins_sol").value;
    var colInsSol = document.getElementById("colonia_ins_sol").value;
    var delInsSol = document.getElementById("delegcion_ins_sol").value;
    var ciuInsSol = document.getElementById("ciudad_ins_sol").value;
    var estInsSol = document.getElementById("estado_ins_sol").value;
    var cpInsSol = document.getElementById("cp_ins_sol").value;
    var telInsSol = document.getElementById("telefono_ins_sol").value;
    var nivInsSol = document.getElementById("nivel_ins_sol").value;
    var carInsSol = document.getElementById("carrera_ins_sol").value;
    var claInsSol = document.getElementById("clave_ins_sol").value;
    var semInsSol = document.getElementById("semestre_ins_sol").value;
    var areaInsSol = document.getElementById("area_ins_sol").value;
    var defecSol = document.getElementById("de_fecha_sol").value;
    var afecSol = document.getElementById("a_fecha_sol").value;
    var nomInsNivSol = document.getElementById("nombre_ins_niv_sol").value;
    var paisInsNivSol = document.getElementById("pais_ins_niv_sol").value;
    var calInsNivSol = document.getElementById("calle_num_ins_niv_sol").value;
    var colInsNivSol = document.getElementById("colonia_ins_niv_sol").value;
    var delInsNivSol = document.getElementById("delegcion_ins_niv_sol").value;
    var ciuInsNivSol = document.getElementById("ciudad_ins_niv_sol").value;
    var estInsNivSol = document.getElementById("estado_ins_niv_sol").value;
    var cpInsNivSol = document.getElementById("cp_ins_niv_sol").value;
    var telInsNivSol = document.getElementById("telefono_ins_niv_sol").value;
    var nivInsNivSol = document.getElementById("nivel_ins_niv_sol").value;
    var carInsNivSol = document.getElementById("carrera_ins_niv_sol").value;
    var claInsNivSol = document.getElementById("clave_ins_niv_sol").value;
    var semInsNivSol = document.getElementById("semestre_ins_niv_sol").value;
    var areaInsNivSol = document.getElementById("area_ins_niv_sol").value;
    var defecInsNivSol = document.getElementById("de_fecha_niv_sol").value;
    var afecInsNivSol = document.getElementById("a_fecha_niv_sol").value;
    var nomInsEquSol = document.getElementById("nombre_ins_equi_sol").value;
    var ciuMunInsEquSol = document.getElementById("ciudad_mun_ins_equi_sol").value;
    var calInsEquSol = document.getElementById("calle_num_ins_equi_sol").value;
    var colInsEquSol = document.getElementById("colonia_ins_equi_sol").value;
    var delInsEquSol = document.getElementById("delegcion_ins_equi_sol").value;
    var ciuInsEquSol = document.getElementById("ciudad_ins_equi_sol").value;
    var estInsEquSol = document.getElementById("estado_ins_equi_sol").value;
    var cpInsEquSol = document.getElementById("cp_ins_equi_sol").value;
    var telInsEquSol = document.getElementById("telefono_ins_equi_sol").value;
    var nivInsEquSol = document.getElementById("nivel_ins_equi_sol").value;
    var carInsEquSol = document.getElementById("carrera_ins_equi_sol").value;
    var peInsEquSol = document.getElementById("pe_ins_equi_sol").value;
    var semInsEquSol = document.getElementById("semestre_ins_equi_sol").value;
    var areaInsEquSol = document.getElementById("area_esp_ins_equi_sol").value;
    var fecInsEquSol = document.getElementById("fecha_ing_ins_equi_sol").value;
    
    if (campo === 'apellido1_sol') {

        if (ape1Sol === null || ape1Sol.length === 0 || /^\s+$/.test(ape1Sol)) {
            $("#iconotexto1").remove();
            $("#apellido1_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#apellido1_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#apellido1_sol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ape1Sol.length < 3) {
            $("#iconotexto1").remove();
            $("#apellido1_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#apellido1_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#apellido1_sol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#apellido1_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#apellido1_sol").parent().children("span").text("").hide();
            $("#apellido1_sol").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    } 
    
    if (campo === 'apellido2_sol') {

        if (ape2Sol === null || ape2Sol.length === 0 || /^\s+$/.test(ape2Sol)) {
            $("#iconotexto2").remove();
            $("#apellido2_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#apellido2_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#apellido2_sol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ape2Sol.length < 3) {
            $("#iconotexto2").remove();
            $("#apellido2_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#apellido2_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#apellido2_sol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#apellido2_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#apellido2_sol").parent().children("span").text("").hide();
            $("#apellido2_sol").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nombres_sol') {

        if (nomSol === null || nomSol.length === 0 || /^\s+$/.test(nomSol)) {
            $("#iconotexto3").remove();
            $("#nombres_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombres_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nombres_sol").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomSol.length < 3) {
            $("#iconotexto3").remove();
            $("#nombres_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombres_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nombres_sol").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#nombres_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombres_sol").parent().children("span").text("").hide();
            $("#nombres_sol").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'calle_num_sol') {

        if (calSol === null || calSol.length === 0 || /^\s+$/.test(calSol)) {
            $("#iconotexto4").remove();
            $("#calle_num_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#calle_num_sol").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (calSol.length < 3) {
            $("#iconotexto4").remove();
            $("#calle_num_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#calle_num_sol").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#calle_num_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#calle_num_sol").parent().children("span").text("").hide();
            $("#calle_num_sol").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'colonia_sol') {

        if (colSol === null || colSol.length === 0 || /^\s+$/.test(colSol)) {
            $("#iconotexto5").remove();
            $("#colonia_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#colonia_sol").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (colSol.length < 3) {
            $("#iconotexto5").remove();
            $("#colonia_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#colonia_sol").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#colonia_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#colonia_sol").parent().children("span").text("").hide();
            $("#colonia_sol").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'delegacion_sol') {

        if (delSol === null || delSol.length === 0 || /^\s+$/.test(delSol)) {
            $("#iconotexto6").remove();
            $("#delegacion_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegacion_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#delegacion_sol").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (delSol.length < 3) {
            $("#iconotexto6").remove();
            $("#delegacion_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegacion_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#delegacion_sol").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto6").remove();
            $("#delegacion_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#delegacion_sol").parent().children("span").text("").hide();
            $("#delegacion_sol").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'ciudad_sol') {

        if (ciuSol === null || ciuSol.length === 0 || /^\s+$/.test(ciuSol)) {
            $("#iconotexto7").remove();
            $("#ciudad_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#ciudad_sol").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ciuSol.length < 3) {
            $("#iconotexto7").remove();
            $("#ciudad_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#ciudad_sol").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto7").remove();
            $("#ciudad_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciudad_sol").parent().children("span").text("").hide();
            $("#ciudad_sol").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'estado_sol') {

        if (estSol === null || estSol.length === 0 || /^\s+$/.test(estSol)) {
            $("#iconotexto8").remove();
            $("#estado_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#estado_sol").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (estSol.length < 3) {
            $("#iconotexto8").remove();
            $("#estado_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#estado_sol").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto8").remove();
            $("#estado_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#estado_sol").parent().children("span").text("").hide();
            $("#estado_sol").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'cp_sol') {

        if (cpSol === null || cpSol.length === 0 || /^\s+$/.test(cpSol)) {
            $("#iconotexto9").remove();
            $("#cp_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#cp_sol").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(cpSol)) {
            $("#iconotexto9").remove();
            $("#cp_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#cp_sol").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (cpSol.length < 3) {
            $("#iconotexto9").remove();
            $("#cp_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#cp_sol").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto9").remove();
            $("#cp_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cp_sol").parent().children("span").text("").hide();
            $("#cp_sol").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'telefono_sol') {

        if (telSol === null || telSol.length === 0 || /^\s+$/.test(telSol)) {
            $("#iconotexto10").remove();
            $("#telefono_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#telefono_sol").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(telSol)) {
            $("#iconotexto10").remove();
            $("#telefono_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#telefono_sol").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (telSol.length < 3) {
            $("#iconotexto10").remove();
            $("#telefono_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#telefono_sol").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto10").remove();
            $("#telefono_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#telefono_sol").parent().children("span").text("").hide();
            $("#telefono_sol").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nacionalidad_sol') {

        if (nacSol === null || nacSol.length === 0 || /^\s+$/.test(nacSol)) {
            $("#iconotexto11").remove();
            $("#nacionalidad_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nacionalidad_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nacionalidad_sol").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nacSol.length < 3) {
            $("#iconotexto11").remove();
            $("#nacionalidad_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nacionalidad_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nacionalidad_sol").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto11").remove();
            $("#nacionalidad_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nacionalidad_sol").parent().children("span").text("").hide();
            $("#nacionalidad_sol").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'entidad_nac_sol') {

        if (entSol === null || entSol.length === 0 || /^\s+$/.test(entSol)) {
            $("#iconotexto12").remove();
            $("#entidad_nac_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#entidad_nac_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#entidad_nac_sol").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (entSol.length < 3) {
            $("#iconotexto12").remove();
            $("#entidad_nac_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#entidad_nac_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#entidad_nac_sol").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto12").remove();
            $("#entidad_nac_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#entidad_nac_sol").parent().children("span").text("").hide();
            $("#entidad_nac_sol").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'fecha_nac_sol') {

        if (fecNacSol === '' || fecNacSol === null) {
            $("#iconotexto13").remove();
            $("#fecha_nac_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_nac_sol").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#fecha_nac_sol").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto13").remove();
            $("#fecha_nac_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_nac_sol").parent().children("span").text("").hide();
            $("#fecha_nac_sol").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'se_sol') {

        if (seSol === '---Seleccione---') {
            $("#iconotexto14").remove();
            $("#se_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#se_sol").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#se_sol").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto14").remove();
            $("#se_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#se_sol").parent().children("span").text("").hide();
            $("#se_sol").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'curp_sol') {

        if (curpSol === null || curpSol.length === 0 || /^\s+$/.test(curpSol)) {
            $("#iconotexto15").remove();
            $("#curp_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#curp_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#curp_sol").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (curpSol.length < 3) {
            $("#iconotexto15").remove();
            $("#curp_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#curp_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#curp_sol").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto15").remove();
            $("#curp_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#curp_sol").parent().children("span").text("").hide();
            $("#curp_sol").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nombre_ins_sol') {

        if (nomInsSol === null || nomInsSol.length === 0 || /^\s+$/.test(nomInsSol)) {
            $("#iconotexto16").remove();
            $("#nombre_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nombre_ins_sol").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomInsSol.length < 3) {
            $("#iconotexto16").remove();
            $("#nombre_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nombre_ins_sol").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto16").remove();
            $("#nombre_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_ins_sol").parent().children("span").text("").hide();
            $("#nombre_ins_sol").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'pais_sol') {

        if (paisSol === null || paisSol.length === 0 || /^\s+$/.test(paisSol)) {
            $("#iconotexto17").remove();
            $("#pais_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#pais_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#pais_sol").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (paisSol.length < 3) {
            $("#iconotexto17").remove();
            $("#pais_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#pais_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#pais_sol").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto17").remove();
            $("#pais_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#pais_sol").parent().children("span").text("").hide();
            $("#pais_sol").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'calle_num_ins_sol') {

        if (calInsSol === null || calInsSol.length === 0 || /^\s+$/.test(calInsSol)) {
            $("#iconotexto18").remove();
            $("#calle_num_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#calle_num_ins_sol").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (calInsSol.length < 3) {
            $("#iconotexto18").remove();
            $("#calle_num_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#calle_num_ins_sol").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto18").remove();
            $("#calle_num_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#calle_num_ins_sol").parent().children("span").text("").hide();
            $("#calle_num_ins_sol").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'colonia_ins_sol') {

        if (colInsSol === null || colInsSol.length === 0 || /^\s+$/.test(colInsSol)) {
            $("#iconotexto19").remove();
            $("#colonia_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#colonia_ins_sol").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (colInsSol.length < 3) {
            $("#iconotexto19").remove();
            $("#colonia_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#colonia_ins_sol").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto19").remove();
            $("#colonia_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#colonia_ins_sol").parent().children("span").text("").hide();
            $("#colonia_ins_sol").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'delegcion_ins_sol') {

        if (delInsSol === null || delInsSol.length === 0 || /^\s+$/.test(delInsSol)) {
            $("#iconotexto20").remove();
            $("#delegcion_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegcion_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#delegcion_ins_sol").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (delInsSol.length < 3) {
            $("#iconotexto20").remove();
            $("#delegcion_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegcion_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#delegcion_ins_sol").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto20").remove();
            $("#delegcion_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#delegcion_ins_sol").parent().children("span").text("").hide();
            $("#delegcion_ins_sol").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'ciudad_ins_sol') {

        if (ciuInsSol === null || ciuInsSol.length === 0 || /^\s+$/.test(ciuInsSol)) {
            $("#iconotexto21").remove();
            $("#ciudad_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#ciudad_ins_sol").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ciuInsSol.length < 3) {
            $("#iconotexto21").remove();
            $("#ciudad_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#ciudad_ins_sol").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto21").remove();
            $("#ciudad_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciudad_ins_sol").parent().children("span").text("").hide();
            $("#ciudad_ins_sol").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'estado_ins_sol') {

        if (estInsSol === null || estInsSol.length === 0 || /^\s+$/.test(estInsSol)) {
            $("#iconotexto22").remove();
            $("#estado_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#estado_ins_sol").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (estInsSol.length < 3) {
            $("#iconotexto22").remove();
            $("#estado_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#estado_ins_sol").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto22").remove();
            $("#estado_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#estado_ins_sol").parent().children("span").text("").hide();
            $("#estado_ins_sol").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'cp_ins_sol') {

        if (cpInsSol === null || cpInsSol.length === 0 || /^\s+$/.test(cpInsSol)) {
            $("#iconotexto23").remove();
            $("#cp_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#cp_ins_sol").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(cpInsSol)) {
            $("#iconotexto23").remove();
            $("#cp_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#cp_ins_sol").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (cpInsSol.length < 3) {
            $("#iconotexto23").remove();
            $("#cp_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#cp_ins_sol").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto23").remove();
            $("#cp_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cp_ins_sol").parent().children("span").text("").hide();
            $("#cp_ins_sol").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'telefono_ins_sol') {

        if (telInsSol === null || telInsSol.length === 0 || /^\s+$/.test(telInsSol)) {
            $("#iconotexto24").remove();
            $("#telefono_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#telefono_ins_sol").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(telInsSol)) {
            $("#iconotexto24").remove();
            $("#telefono_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#telefono_ins_sol").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (telInsSol.length < 3) {
            $("#iconotexto24").remove();
            $("#telefono_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#telefono_ins_sol").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto24").remove();
            $("#telefono_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#telefono_ins_sol").parent().children("span").text("").hide();
            $("#telefono_ins_sol").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nivel_ins_sol') {

        if (nivInsSol === '---Seleccione---') {
            $("#iconotexto25").remove();
            $("#nivel_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel_ins_sol").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#nivel_ins_sol").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto25").remove();
            $("#nivel_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel_ins_sol").parent().children("span").text("").hide();
            $("#nivel_ins_sol").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'carrera_ins_sol') {

        if (carInsSol === null || carInsSol.length === 0 || /^\s+$/.test(carInsSol)) {
            $("#iconotexto26").remove();
            $("#carrera_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#carrera_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#carrera_ins_sol").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (carInsSol.length < 3) {
            $("#iconotexto26").remove();
            $("#carrera_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#carrera_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#carrera_ins_sol").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto26").remove();
            $("#carrera_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#carrera_ins_sol").parent().children("span").text("").hide();
            $("#carrera_ins_sol").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'clave_ins_sol') {

        if (claInsSol === null || claInsSol.length === 0 || /^\s+$/.test(claInsSol)) {
            $("#iconotexto27").remove();
            $("#clave_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#clave_ins_sol").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claInsSol.length < 3) {
            $("#iconotexto27").remove();
            $("#clave_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#clave_ins_sol").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto27").remove();
            $("#clave_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#clave_ins_sol").parent().children("span").text("").hide();
            $("#clave_ins_sol").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'semestre_ins_sol') {

        if (semInsSol === null || semInsSol.length === 0 || /^\s+$/.test(semInsSol)) {
            $("#iconotexto28").remove();
            $("#semestre_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#semestre_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#semestre_ins_sol").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (semInsSol.length < 3) {
            $("#iconotexto28").remove();
            $("#semestre_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#semestre_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#semestre_ins_sol").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto28").remove();
            $("#semestre_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#semestre_ins_sol").parent().children("span").text("").hide();
            $("#semestre_ins_sol").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'area_ins_sol') {

        if (areaInsSol === null || areaInsSol.length === 0 || /^\s+$/.test(areaInsSol)) {
            $("#iconotexto29").remove();
            $("#area_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#area_ins_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#area_ins_sol").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (areaInsSol.length < 3) {
            $("#iconotexto29").remove();
            $("#area_ins_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#area_ins_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#area_ins_sol").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto29").remove();
            $("#area_ins_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#area_ins_sol").parent().children("span").text("").hide();
            $("#area_ins_sol").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'de_fecha_sol') {

        if (defecSol === '' || defecSol === null) {
            $("#iconotexto30").remove();
            $("#de_fecha_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#de_fecha_sol").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#de_fecha_sol").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto30").remove();
            $("#de_fecha_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#de_fecha_sol").parent().children("span").text("").hide();
            $("#de_fecha_sol").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'a_fecha_sol') {

        if (afecSol === '' || afecSol === null) {
            $("#iconotexto31").remove();
            $("#a_fecha_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#a_fecha_sol").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#a_fecha_sol").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto31").remove();
            $("#a_fecha_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#a_fecha_sol").parent().children("span").text("").hide();
            $("#a_fecha_sol").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nombre_ins_niv_sol') {

        if (nomInsNivSol === null || nomInsNivSol.length === 0 || /^\s+$/.test(nomInsNivSol)) {
            $("#iconotexto32").remove();
            $("#nombre_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nombre_ins_niv_sol").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomInsNivSol.length < 3) {
            $("#iconotexto32").remove();
            $("#nombre_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nombre_ins_niv_sol").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto32").remove();
            $("#nombre_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_ins_niv_sol").parent().children("span").text("").hide();
            $("#nombre_ins_niv_sol").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'pais_ins_niv_sol') {

        if (paisInsNivSol === null || paisInsNivSol.length === 0 || /^\s+$/.test(paisInsNivSol)) {
            $("#iconotexto33").remove();
            $("#pais_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#pais_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#pais_ins_niv_sol").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (paisInsNivSol.length < 3) {
            $("#iconotexto33").remove();
            $("#pais_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#pais_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#pais_ins_niv_sol").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto33").remove();
            $("#pais_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#pais_ins_niv_sol").parent().children("span").text("").hide();
            $("#pais_ins_niv_sol").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'calle_num_ins_niv_sol') {

        if (calInsNivSol === null || calInsNivSol.length === 0 || /^\s+$/.test(calInsNivSol)) {
            $("#iconotexto34").remove();
            $("#calle_num_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#calle_num_ins_niv_sol").parent().append("<span id='iconotexto34' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (calInsNivSol.length < 3) {
            $("#iconotexto34").remove();
            $("#calle_num_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#calle_num_ins_niv_sol").parent().append("<span id='iconotexto34' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto34").remove();
            $("#calle_num_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#calle_num_ins_niv_sol").parent().children("span").text("").hide();
            $("#calle_num_ins_niv_sol").parent().append("<span id='iconotexto34' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'colonia_ins_niv_sol') {

        if (colInsNivSol === null || colInsNivSol.length === 0 || /^\s+$/.test(colInsNivSol)) {
            $("#iconotexto35").remove();
            $("#colonia_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#colonia_ins_niv_sol").parent().append("<span id='iconotexto35' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (colInsNivSol.length < 3) {
            $("#iconotexto35").remove();
            $("#colonia_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#colonia_ins_niv_sol").parent().append("<span id='iconotexto35' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto35").remove();
            $("#colonia_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#colonia_ins_niv_sol").parent().children("span").text("").hide();
            $("#colonia_ins_niv_sol").parent().append("<span id='iconotexto35' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'delegcion_ins_niv_sol') {

        if (delInsNivSol === null || delInsNivSol.length === 0 || /^\s+$/.test(delInsNivSol)) {
            $("#iconotexto36").remove();
            $("#delegcion_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegcion_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#delegcion_ins_niv_sol").parent().append("<span id='iconotexto36' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (delInsNivSol.length < 3) {
            $("#iconotexto36").remove();
            $("#delegcion_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegcion_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#delegcion_ins_niv_sol").parent().append("<span id='iconotexto36' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto36").remove();
            $("#delegcion_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#delegcion_ins_niv_sol").parent().children("span").text("").hide();
            $("#delegcion_ins_niv_sol").parent().append("<span id='iconotexto36' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'ciudad_ins_niv_sol') {

        if (ciuInsNivSol === null || ciuInsNivSol.length === 0 || /^\s+$/.test(ciuInsNivSol)) {
            $("#iconotexto37").remove();
            $("#ciudad_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#ciudad_ins_niv_sol").parent().append("<span id='iconotexto37' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ciuInsNivSol.length < 3) {
            $("#iconotexto37").remove();
            $("#ciudad_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#ciudad_ins_niv_sol").parent().append("<span id='iconotexto37' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto37").remove();
            $("#ciudad_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciudad_ins_niv_sol").parent().children("span").text("").hide();
            $("#ciudad_ins_niv_sol").parent().append("<span id='iconotexto37' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'estado_ins_niv_sol') {

        if (estInsNivSol === null || estInsNivSol.length === 0 || /^\s+$/.test(estInsNivSol)) {
            $("#iconotexto38").remove();
            $("#estado_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#estado_ins_niv_sol").parent().append("<span id='iconotexto38' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (estInsNivSol.length < 3) {
            $("#iconotexto38").remove();
            $("#estado_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#estado_ins_niv_sol").parent().append("<span id='iconotexto38' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto38").remove();
            $("#estado_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#estado_ins_niv_sol").parent().children("span").text("").hide();
            $("#estado_ins_niv_sol").parent().append("<span id='iconotexto38' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'cp_ins_niv_sol') {

        if (cpInsNivSol === null || cpInsNivSol.length === 0 || /^\s+$/.test(cpInsNivSol)) {
            $("#iconotexto39").remove();
            $("#cp_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#cp_ins_niv_sol").parent().append("<span id='iconotexto39' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(cpInsNivSol)) {
            $("#iconotexto39").remove();
            $("#cp_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_niv_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#cp_ins_niv_sol").parent().append("<span id='iconotexto39' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (cpInsNivSol.length < 3) {
            $("#iconotexto39").remove();
            $("#cp_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#cp_ins_niv_sol").parent().append("<span id='iconotexto39' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto39").remove();
            $("#cp_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cp_ins_niv_sol").parent().children("span").text("").hide();
            $("#cp_ins_niv_sol").parent().append("<span id='iconotexto39' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'telefono_ins_niv_sol') {

        if (telInsNivSol === null || telInsNivSol.length === 0 || /^\s+$/.test(telInsNivSol)) {
            $("#iconotexto40").remove();
            $("#telefono_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#telefono_ins_niv_sol").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(telInsNivSol)) {
            $("#iconotexto40").remove();
            $("#telefono_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_niv_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#telefono_ins_niv_sol").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (telInsNivSol.length < 3) {
            $("#iconotexto40").remove();
            $("#telefono_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#telefono_ins_niv_sol").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto40").remove();
            $("#telefono_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#telefono_ins_niv_sol").parent().children("span").text("").hide();
            $("#telefono_ins_niv_sol").parent().append("<span id='iconotexto40' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nivel_ins_niv_sol') {

        if (nivInsNivSol === '---Seleccione---') {
            $("#iconotexto41").remove();
            $("#nivel_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel_ins_niv_sol").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#nivel_ins_niv_sol").parent().append("<span id='iconotexto41' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto41").remove();
            $("#nivel_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel_ins_niv_sol").parent().children("span").text("").hide();
            $("#nivel_ins_niv_sol").parent().append("<span id='iconotexto41' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'carrera_ins_niv_sol') {

        if (carInsNivSol === null || carInsNivSol.length === 0 || /^\s+$/.test(carInsNivSol)) {
            $("#iconotexto42").remove();
            $("#carrera_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#carrera_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#carrera_ins_niv_sol").parent().append("<span id='iconotexto42' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (carInsNivSol.length < 3) {
            $("#iconotexto42").remove();
            $("#carrera_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#carrera_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#carrera_ins_niv_sol").parent().append("<span id='iconotexto42' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto42").remove();
            $("#carrera_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#carrera_ins_niv_sol").parent().children("span").text("").hide();
            $("#carrera_ins_niv_sol").parent().append("<span id='iconotexto42' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'clave_ins_niv_sol') {

        if (claInsNivSol === null || claInsNivSol.length === 0 || /^\s+$/.test(claInsNivSol)) {
            $("#iconotexto43").remove();
            $("#clave_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#clave_ins_niv_sol").parent().append("<span id='iconotexto43' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (claInsNivSol.length < 3) {
            $("#iconotexto43").remove();
            $("#clave_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clave_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#clave_ins_niv_sol").parent().append("<span id='iconotexto43' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto43").remove();
            $("#clave_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#clave_ins_niv_sol").parent().children("span").text("").hide();
            $("#clave_ins_niv_sol").parent().append("<span id='iconotexto43' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'semestre_ins_niv_sol') {

        if (semInsNivSol === null || semInsNivSol.length === 0 || /^\s+$/.test(semInsNivSol)) {
            $("#iconotexto44").remove();
            $("#semestre_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#semestre_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#semestre_ins_niv_sol").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (semInsNivSol.length < 3) {
            $("#iconotexto44").remove();
            $("#semestre_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#semestre_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#semestre_ins_niv_sol").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto44").remove();
            $("#semestre_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#semestre_ins_niv_sol").parent().children("span").text("").hide();
            $("#semestre_ins_niv_sol").parent().append("<span id='iconotexto44' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'area_ins_niv_sol') {

        if (areaInsNivSol === null || areaInsNivSol.length === 0 || /^\s+$/.test(areaInsNivSol)) {
            $("#iconotexto45").remove();
            $("#area_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#area_ins_niv_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#area_ins_niv_sol").parent().append("<span id='iconotexto45' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (areaInsNivSol.length < 3) {
            $("#iconotexto45").remove();
            $("#area_ins_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#area_ins_niv_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#area_ins_niv_sol").parent().append("<span id='iconotexto45' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto45").remove();
            $("#area_ins_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#area_ins_niv_sol").parent().children("span").text("").hide();
            $("#area_ins_niv_sol").parent().append("<span id='iconotexto45' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'de_fecha_niv_sol') {

        if (defecInsNivSol === '' || defecInsNivSol === null) {
            $("#iconotexto46").remove();
            $("#de_fecha_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#de_fecha_niv_sol").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#de_fecha_niv_sol").parent().append("<span id='iconotexto46' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto46").remove();
            $("#de_fecha_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#de_fecha_niv_sol").parent().children("span").text("").hide();
            $("#de_fecha_niv_sol").parent().append("<span id='iconotexto46' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'a_fecha_niv_sol') {

        if (afecInsNivSol === '' || afecInsNivSol === null) {
            $("#iconotexto47").remove();
            $("#a_fecha_niv_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#a_fecha_niv_sol").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#a_fecha_niv_sol").parent().append("<span id='iconotexto47' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto47").remove();
            $("#a_fecha_niv_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#a_fecha_niv_sol").parent().children("span").text("").hide();
            $("#a_fecha_niv_sol").parent().append("<span id='iconotexto47' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nombre_ins_equi_sol') {

        if (nomInsEquSol === null || nomInsEquSol.length === 0 || /^\s+$/.test(nomInsEquSol)) {
            $("#iconotexto48").remove();
            $("#nombre_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#nombre_ins_equi_sol").parent().append("<span id='iconotexto48' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (nomInsEquSol.length < 3) {
            $("#iconotexto48").remove();
            $("#nombre_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nombre_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#nombre_ins_equi_sol").parent().append("<span id='iconotexto48' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto48").remove();
            $("#nombre_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nombre_ins_equi_sol").parent().children("span").text("").hide();
            $("#nombre_ins_equi_sol").parent().append("<span id='iconotexto48' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'ciudad_mun_ins_equi_sol') {

        if (ciuMunInsEquSol === null || ciuMunInsEquSol.length === 0 || /^\s+$/.test(ciuMunInsEquSol)) {
            $("#iconotexto49").remove();
            $("#ciudad_mun_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_mun_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#ciudad_mun_ins_equi_sol").parent().append("<span id='iconotexto49' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ciuMunInsEquSol.length < 3) {
            $("#iconotexto49").remove();
            $("#ciudad_mun_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_mun_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#ciudad_mun_ins_equi_sol").parent().append("<span id='iconotexto49' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto49").remove();
            $("#ciudad_mun_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciudad_mun_ins_equi_sol").parent().children("span").text("").hide();
            $("#ciudad_mun_ins_equi_sol").parent().append("<span id='iconotexto49' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'calle_num_ins_equi_sol') {

        if (calInsEquSol === null || calInsEquSol.length === 0 || /^\s+$/.test(calInsEquSol)) {
            $("#iconotexto50").remove();
            $("#calle_num_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#calle_num_ins_equi_sol").parent().append("<span id='iconotexto50' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (calInsEquSol.length < 3) {
            $("#iconotexto50").remove();
            $("#calle_num_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#calle_num_ins_equi_sol").parent().append("<span id='iconotexto50' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto50").remove();
            $("#calle_num_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#calle_num_ins_equi_sol").parent().children("span").text("").hide();
            $("#calle_num_ins_equi_sol").parent().append("<span id='iconotexto50' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'colonia_ins_equi_sol') {

        if (colInsEquSol === null || colInsEquSol.length === 0 || /^\s+$/.test(colInsEquSol)) {
            $("#iconotexto51").remove();
            $("#colonia_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#colonia_ins_equi_sol").parent().append("<span id='iconotexto51' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (colInsEquSol.length < 3) {
            $("#iconotexto51").remove();
            $("#colonia_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#colonia_ins_equi_sol").parent().append("<span id='iconotexto51' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto51").remove();
            $("#colonia_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#colonia_ins_equi_sol").parent().children("span").text("").hide();
            $("#colonia_ins_equi_sol").parent().append("<span id='iconotexto51' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'delegcion_ins_equi_sol') {

        if (delInsEquSol === null || delInsEquSol.length === 0 || /^\s+$/.test(delInsEquSol)) {
            $("#iconotexto52").remove();
            $("#delegcion_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegcion_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#delegcion_ins_equi_sol").parent().append("<span id='iconotexto52' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (delInsEquSol.length < 3) {
            $("#iconotexto52").remove();
            $("#delegcion_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#delegcion_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#delegcion_ins_equi_sol").parent().append("<span id='iconotexto52' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto52").remove();
            $("#delegcion_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#delegcion_ins_equi_sol").parent().children("span").text("").hide();
            $("#delegcion_ins_equi_sol").parent().append("<span id='iconotexto52' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'ciudad_ins_equi_sol') {

        if (ciuInsEquSol === null || ciuInsEquSol.length === 0 || /^\s+$/.test(ciuInsEquSol)) {
            $("#iconotexto53").remove();
            $("#ciudad_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#ciudad_ins_equi_sol").parent().append("<span id='iconotexto53' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (ciuInsEquSol.length < 3) {
            $("#iconotexto53").remove();
            $("#ciudad_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#ciudad_ins_equi_sol").parent().append("<span id='iconotexto53' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto53").remove();
            $("#ciudad_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciudad_ins_equi_sol").parent().children("span").text("").hide();
            $("#ciudad_ins_equi_sol").parent().append("<span id='iconotexto53' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'estado_ins_equi_sol') {

        if (estInsEquSol === null || estInsEquSol.length === 0 || /^\s+$/.test(estInsEquSol)) {
            $("#iconotexto54").remove();
            $("#estado_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#estado_ins_equi_sol").parent().append("<span id='iconotexto54' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (estInsEquSol.length < 3) {
            $("#iconotexto54").remove();
            $("#estado_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#estado_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#estado_ins_equi_sol").parent().append("<span id='iconotexto54' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto54").remove();
            $("#estado_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#estado_ins_equi_sol").parent().children("span").text("").hide();
            $("#estado_ins_equi_sol").parent().append("<span id='iconotexto54' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'cp_ins_equi_sol') {

        if (cpInsEquSol === null || cpInsEquSol.length === 0 || /^\s+$/.test(cpInsEquSol)) {
            $("#iconotexto55").remove();
            $("#cp_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#cp_ins_equi_sol").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(cpInsEquSol)) {
            $("#iconotexto55").remove();
            $("#cp_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_equi_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#cp_ins_equi_sol").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (cpInsEquSol.length < 3) {
            $("#iconotexto55").remove();
            $("#cp_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#cp_ins_equi_sol").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto55").remove();
            $("#cp_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cp_ins_equi_sol").parent().children("span").text("").hide();
            $("#cp_ins_equi_sol").parent().append("<span id='iconotexto55' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'telefono_ins_equi_sol') {

        if (telInsEquSol === null || telInsEquSol.length === 0 || /^\s+$/.test(telInsEquSol)) {
            $("#iconotexto56").remove();
            $("#telefono_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#telefono_ins_equi_sol").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(telInsEquSol)) {
            $("#iconotexto56").remove();
            $("#telefono_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_equi_sol").parent().children("span").text("Debe ingresar caracteres numéricos.").show();
            $("#telefono_ins_equi_sol").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (telInsEquSol.length < 3) {
            $("#iconotexto56").remove();
            $("#telefono_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#telefono_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#telefono_ins_equi_sol").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto56").remove();
            $("#telefono_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#telefono_ins_equi_sol").parent().children("span").text("").hide();
            $("#telefono_ins_equi_sol").parent().append("<span id='iconotexto56' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'nivel_ins_equi_sol') {

        if (nivInsEquSol === '---Seleccione---') {
            $("#iconotexto57").remove();
            $("#nivel_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel_ins_equi_sol").parent().children("span").text("Debe seleccionar una opción.").show();
            $("#nivel_ins_equi_sol").parent().append("<span id='iconotexto57' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto57").remove();
            $("#nivel_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel_ins_equi_sol").parent().children("span").text("").hide();
            $("#nivel_ins_equi_sol").parent().append("<span id='iconotexto57' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'carrera_ins_equi_sol') {

        if (carInsEquSol === null || carInsEquSol.length === 0 || /^\s+$/.test(carInsEquSol)) {
            $("#iconotexto58").remove();
            $("#carrera_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#carrera_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#carrera_ins_equi_sol").parent().append("<span id='iconotexto58' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (carInsEquSol.length < 3) {
            $("#iconotexto58").remove();
            $("#carrera_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#carrera_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#carrera_ins_equi_sol").parent().append("<span id='iconotexto58' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto58").remove();
            $("#carrera_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#carrera_ins_equi_sol").parent().children("span").text("").hide();
            $("#carrera_ins_equi_sol").parent().append("<span id='iconotexto58' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'pe_ins_equi_sol') {

        if (peInsEquSol === null || peInsEquSol.length === 0 || /^\s+$/.test(peInsEquSol)) {
            $("#iconotexto59").remove();
            $("#pe_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#pe_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#pe_ins_equi_sol").parent().append("<span id='iconotexto59' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (peInsEquSol.length < 3) {
            $("#iconotexto59").remove();
            $("#pe_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#pe_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#pe_ins_equi_sol").parent().append("<span id='iconotexto59' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto59").remove();
            $("#pe_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#pe_ins_equi_sol").parent().children("span").text("").hide();
            $("#pe_ins_equi_sol").parent().append("<span id='iconotexto59' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'semestre_ins_equi_sol') {

        if (semInsEquSol === null || semInsEquSol.length === 0 || /^\s+$/.test(semInsEquSol)) {
            $("#iconotexto60").remove();
            $("#semestre_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#semestre_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#semestre_ins_equi_sol").parent().append("<span id='iconotexto60' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (semInsEquSol.length < 3) {
            $("#iconotexto60").remove();
            $("#semestre_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#semestre_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#semestre_ins_equi_sol").parent().append("<span id='iconotexto60' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto60").remove();
            $("#semestre_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#semestre_ins_equi_sol").parent().children("span").text("").hide();
            $("#semestre_ins_equi_sol").parent().append("<span id='iconotexto60' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'area_esp_ins_equi_sol') {

        if (areaInsEquSol === null || areaInsEquSol.length === 0 || /^\s+$/.test(areaInsEquSol)) {
            $("#iconotexto61").remove();
            $("#area_esp_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#area_esp_ins_equi_sol").parent().children("span").text("Debe ingresar un caracter.").show();
            $("#area_esp_ins_equi_sol").parent().append("<span id='iconotexto61' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (areaInsEquSol.length < 3) {
            $("#iconotexto61").remove();
            $("#area_esp_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#area_esp_ins_equi_sol").parent().children("span").text("El campo debe de tener más de 3 caracteres.").show();
            $("#area_esp_ins_equi_sol").parent().append("<span id='iconotexto61' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto61").remove();
            $("#area_esp_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#area_esp_ins_equi_sol").parent().children("span").text("").hide();
            $("#area_esp_ins_equi_sol").parent().append("<span id='iconotexto61' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    if (campo === 'fecha_ing_ins_equi_sol') {

        if (fecInsEquSol === '' || fecInsEquSol === null) {
            $("#iconotexto62").remove();
            $("#fecha_ing_ins_equi_sol").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#fecha_ing_ins_equi_sol").parent().children("span").text("Debe seleccionar asignar una fecha de vigencia.").show();
            $("#fecha_ing_ins_equi_sol").parent().append("<span id='iconotexto62' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto62").remove();
            $("#fecha_ing_ins_equi_sol").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#fecha_ing_ins_equi_sol").parent().children("span").text("").hide();
            $("#fecha_ing_ins_equi_sol").parent().append("<span id='iconotexto62' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
}