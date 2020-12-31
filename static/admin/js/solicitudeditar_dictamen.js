/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).on("ready", inicio);

function inicio() {
    
    $('#validacion_registro_solicitud').click(function () {
        var valorinput = $('#validador').val();
        if(valorinput==0){
            if (validar('ap_dic') == false || validar('am_dic') == false || validar('nom_dic') == false
                    || validar('nacionalidad') == false
                    || validar('curp_dic') == false || validar('calle_num') == false
                    || validar('colonia_dic') == false || validar('del_mun') == false || validar('ciudad_est') == false
                    || validar('cp_dic') == false || validar('tel_dic') == false || validar('correo_dic') == false
                    || validar('nivel_procedencia') == false || validar('inst_proc') == false || validar('ciu_est_inst_ant') == false
                    || validar('nivel_nuevo') == false || validar('especificacion_nuevo') == false || validar('inst_nuevo') == false
                    || validar('ciu_est_inst_nuevo') == false || validar('clv_plan') == false || validar('act_nac') == false
                    || validar('act_nat') == false || validar('cald_mig') == false || validar('certf_bach') == false || validar('certf_tsu') == false
                    || validar('certf_lic') == false || validar('certf_esp') == false || validar('certf_mst') == false || validar('comprobante') == false) {

                return false;

            } else {
                swal({
                    title: "Enviado",
                    // text: "Se le ha enviado un codigo al correo",
                    type: "success"
                },
                        function () {
                            //location.href = "../login";
                            $("#form").submit();


                        });
                return false;
            }
        }
        else{
            if (validar('ap_dic') == false || validar('am_dic') == false || validar('nom_dic') == false
                    || validar('nacionalidad') == false
                    || validar('curp_dic') == false || validar('calle_num') == false
                    || validar('colonia_dic') == false || validar('del_mun') == false || validar('ciudad_est') == false
                    || validar('cp_dic') == false || validar('tel_dic') == false || validar('correo_dic') == false
                    || validar('nivel_procedencia') == false || validar('especificacion_ant') == false || validar('inst_proc') == false || validar('ciu_est_inst_ant') == false
                    || validar('nivel_nuevo') == false || validar('especificacion_nuevo') == false || validar('inst_nuevo') == false
                    || validar('ciu_est_inst_nuevo') == false || validar('clv_plan') == false || validar('act_nac') == false
                    || validar('act_nat') == false || validar('cald_mig') == false || validar('certf_bach') == false || validar('certf_tsu') == false
                    || validar('certf_lic') == false || validar('certf_esp') == false || validar('certf_mst') == false || validar('comprobante') == false) {

                return false;

            } else {
                swal({
                    title: "Enviado",
                    // text: "Se le ha enviado un codigo al correo",
                    type: "success"
                },
                        function () {
                            //location.href = "../login";
                            $("#form").submit();


                        });
                return false;
            }
        }

    });
    
    $("#cancelar_solicitud").click(function () {
        swal({
            title: "¿Seguro?, se perderan todos sus datos.",

            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        location.href = base_url()+"app/inicio"

                    } else {
                        swal("Cancelado");

                    }
                });
    });
    
    $("#nivel_procedencia").change(function () {
        seleccionar_estudio_cursado();
    });
    
    $("#ap_dic").keyup(function () {
      var valorinput = $('#ap_dic').val().toUpperCase();
      $('#ap_dic').val(valorinput);
      validar('ap_dic');
    });
    
    $("#am_dic").keyup(function () {
      var valorinput = $('#am_dic').val().toUpperCase();
      $('#am_dic').val(valorinput);
      validar('am_dic');
    });
    
    $("#nom_dic").keyup(function () {
      var valorinput = $('#nom_dic').val().toUpperCase();
      $('#nom_dic').val(valorinput);
      validar('nom_dic');
    });
    
    $("#nacionalidad").change(function () {
      var valorinput = $('#nacionalidad').val();
      $('#nacionalidad').val(valorinput);
      validar('nacionalidad');
    });
    
    $("#curp_dic").keyup(function () {
      var valorinput = $('#curp_dic').val().toUpperCase();
      $('#curp_dic').val(valorinput);
      validar('curp_dic');
    });
    
    $("#calle_num").keyup(function () {
      var valorinput = $('#calle_num').val().toUpperCase();
      $('#calle_num').val(valorinput);
      validar('calle_num');
    });
    
    $("#colonia_dic").keyup(function () {
      var valorinput = $('#colonia_dic').val().toUpperCase();
      $('#colonia_dic').val(valorinput);
      validar('colonia_dic');
    });
    
    $("#del_mun").keyup(function () {
      var valorinput = $('#del_mun').val().toUpperCase();
      $('#del_mun').val(valorinput);
      validar('del_mun');
    });
    
    $("#ciudad_est").keyup(function () {
      var valorinput = $('#ciudad_est').val().toUpperCase();
      $('#ciudad_est').val(valorinput);
      validar('ciudad_est');
    });
    
    $("#cp_dic").keyup(function () {
      var valorinput = $('#cp_dic').val();
      $('#cp_dic').val(valorinput);
      validar('cp_dic');
    });
    
    $("#tel_dic").keyup(function () {
      var valorinput = $('#tel_dic').val();
      $('#tel_dic').val(valorinput);
      validar('tel_dic');
    });
    
    $("#correo_dic").keyup(function () {
      var valorinput = $('#correo_dic').val();
      $('#correo_dic').val(valorinput);
      validar('correo_dic');
    });
    
    $("#nivel_procedencia").change(function () {
      var valorinput = $('#nivel_procedencia').val();
      $('#nivel_procedencia').val(valorinput);
      validar('nivel_procedencia');
    });
    
    
    $("#inst_proc").keyup(function () {
      var valorinput = $('#inst_proc').val().toUpperCase();
      $('#inst_proc').val(valorinput);
      validar('inst_proc');
    });
    
    $("#ciu_est_inst_ant").keyup(function () {
      var valorinput = $('#ciu_est_inst_ant').val().toUpperCase();
      $('#ciu_est_inst_ant').val(valorinput);
      validar('ciu_est_inst_ant');
    });
    
    $("#nivel_nuevo").change(function () {
      var valorinput = $('#nivel_nuevo').val();
      $('#nivel_nuevo').val(valorinput);
      validar('nivel_nuevo');
    });
    
    $("#especificacion_nuevo").keyup(function () {
      var valorinput = $('#especificacion_nuevo').val().toUpperCase();
      $('#especificacion_nuevo').val(valorinput);
      validar('especificacion_nuevo');
    });
    
    $("#inst_nuevo").keyup(function () {
      var valorinput = $('#inst_nuevo').val().toUpperCase();
      $('#inst_nuevo').val(valorinput);
      validar('inst_nuevo');
    });
    
    $("#ciu_est_inst_nuevo").keyup(function () {
      var valorinput = $('#ciu_est_inst_nuevo').val().toUpperCase();
      $('#ciu_est_inst_nuevo').val(valorinput);
      validar('ciu_est_inst_nuevo');
    });
    
    $("#clv_plan").keyup(function () {
      var valorinput = $('#clv_plan').val().toUpperCase();
      $('#clv_plan').val(valorinput);
      validar('clv_plan');
    });
    
    $("#act_nac").change(function () {
      var valorinput = $('#act_nac').val();
      $('#act_nac').val(valorinput);
      validar('act_nac');
    });
    
    $("#act_nat").change(function () {
      var valorinput = $('#act_nat').val();
      $('#act_nat').val(valorinput);
      validar('act_nat');
    });
    
    $("#cald_mig").change(function () {
      var valorinput = $('#cald_mig').val();
      $('#cald_mig').val(valorinput);
      validar('cald_mig');
    });
    
    $("#certf_bach").change(function () {
      var valorinput = $('#certf_bach').val();
      $('#certf_bach').val(valorinput);
      validar('certf_bach');
    });
    
    $("#certf_tsu").change(function () {
      var valorinput = $('#certf_tsu').val();
      $('#certf_tsu').val(valorinput);
      validar('certf_tsu');
    });
    
    $("#certf_lic").change(function () {
      var valorinput = $('#certf_lic').val();
      $('#certf_lic').val(valorinput);
      validar('certf_lic');
    });
    
    $("#certf_esp").change(function () {
      var valorinput = $('#certf_esp').val();
      $('#certf_esp').val(valorinput);
      validar('certf_esp');
    });
    
    $("#certf_mst").change(function () {
      var valorinput = $('#certf_mst').val();
      $('#certf_mst').val(valorinput);
      validar('certf_mst');
    });
    
    $("#comprobante").change(function () {
      var valorinput = $('#comprobante').val();
      $('#comprobante').val(valorinput);
      validar('comprobante');
    });
    
    $("#otro").keyup(function () {
      var valorinput = $('#otro').val().toUpperCase();
      $('#otro').val(valorinput);
      validar('otro');
    });
    
    $(document).on('keyup', '#especificacion_ant', function () {
        var valorinput = $('#especificacion_ant').val().toUpperCase();
        $('#especificacion_ant').val(valorinput);
        validar('especificacion_ant');
    });
}

function seleccionar_estudio_cursado() {
    var opcion = $('#nivel_procedencia').val();
    if (opcion != 'BACHILLERATO GENERAL' && opcion !='---Seleccione---') {
        document.getElementById("div_nivel_anterior").innerHTML = '<label>En:</label><input type="text" id="especificacion_ant" class="form-control" name="especificacion_ant" placeholder="*Campo requerido" style="text-transform: uppercase;"><span class="help-block"></span>';
        $('#validador').val(1);
    } else {
        document.getElementById("div_nivel_anterior").innerHTML = ' ';
        $('#validador').val(0);
    }
}

function validar(input){
    if (input === 'ap_dic') {
        var ap_dic = document.getElementById("ap_dic").value;
        if (ap_dic === null || ap_dic.length == 0 || /^\s+$/.test(ap_dic) || ap_dic == "") {
            $("#iconotexto").remove();
            $("#ap_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ap_dic").parent().children("span").text("Campo obligatorio").show();
            $("#ap_dic").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(ap_dic)) {
            $("#iconotexto").remove();
            $("#ap_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ap_dic").parent().children("span").text("No se aceptan caracteres especiales").show();
            $("#ap_dic").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto").remove();
            $("#ap_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ap_dic").parent().children("span").text("").hide();
            $("#ap_dic").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;

        }
    }
    
    if (input === 'am_dic') {
        var am_dic = document.getElementById("am_dic").value;
        if (am_dic === null || am_dic.length == 0 || /^\s+$/.test(am_dic) || am_dic == "") {
            $("#iconotexto2").remove();
            $("#am_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#am_dic").parent().children("span").text("Campo obligatorio").show();
            $("#am_dic").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(am_dic)) {
            $("#iconotexto2").remove();
            $("#am_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#am_dic").parent().children("span").text("No se aceptan caracteres especiales").show();
            $("#am_dic").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#am_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#am_dic").parent().children("span").text("").hide();
            $("#am_dic").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;

        }
    }
    
    if (input === 'nom_dic') {
        var nom_dic = document.getElementById("nom_dic").value;
        if (nom_dic === null || nom_dic.length == 0 || /^\s+$/.test(nom_dic) || nom_dic == "") {
            $("#iconotexto3").remove();
            $("#nom_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nom_dic").parent().children("span").text("Campo obligatorio").show();
            $("#nom_dic").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(nom_dic)) {
            $("#iconotexto3").remove();
            $("#nom_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nom_dic").parent().children("span").text("No se aceptan caracteres especiales").show();
            $("#nom_dic").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#nom_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nom_dic").parent().children("span").text("").hide();
            $("#nom_dic").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;

        }
    }
    
    if (input === 'nacionalidad') {
        var nacionalidad = document.getElementById("nacionalidad").value;
        if (nacionalidad == '---Seleccione---') {
            $("#iconotexto4").remove();
            $("#nacionalidad").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nacionalidad").parent().children("span").text("Debe seleccionar la nacionalidad").show();
            $("#nacionalidad").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#nacionalidad").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nacionalidad").parent().children("span").text("").hide();
            $("#nacionalidad").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'curp_dic') {
        var curp_dic = document.getElementById("curp_dic").value;
        if (curp_dic === null || curp_dic.length == 0 || /^\s+$/.test(curp_dic) || curp_dic == "" || !/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/.test(curp_dic)) {
            $("#iconotexto5").remove();
            $("#curp_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#curp_dic").parent().children("span").text("Debe ingresar un curp válido.").show();
            $("#curp_dic").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (curp_dic.length !== 18) {
            $("#iconotexto5").remove();
            $("#curp_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#curp_dic").parent().children("span").text("El curp debe ser de 18 digitos").show();
            $("#curp_dic").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#curp_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#curp_dic").parent().children("span").text("").hide();
            $("#curp_dic").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'calle_num') {
        var calle_num = document.getElementById("calle_num").value;
        if (calle_num === null || calle_num.length == 0 || /^\s+$/.test(calle_num) || calle_num == "") {
            $("#iconotexto6").remove();
            $("#calle_num").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num").parent().children("span").text("Debe ingresar la calle.").show();
            $("#calle_num").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(calle_num)) {
            $("#iconotexto6").remove();
            $("#calle_num").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#calle_num").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#calle_num").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto6").remove();
            $("#calle_num").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#calle_num").parent().children("span").text("").hide();
            $("#calle_num").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'colonia_dic') {
        var colonia_dic = document.getElementById("colonia_dic").value;
        if (colonia_dic === null || colonia_dic.length == 0 || /^\s+$/.test(colonia_dic) || colonia_dic == "") {
            $("#iconotexto7").remove();
            $("#colonia_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_dic").parent().children("span").text("Debe ingresar la colonia.").show();
            $("#colonia_dic").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(colonia_dic)) {
            $("#iconotexto7").remove();
            $("#colonia_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#colonia_dic").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#colonia_dic").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto7").remove();
            $("#colonia_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#colonia_dic").parent().children("span").text("").hide();
            $("#colonia_dic").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'del_mun') {
        var del_mun = document.getElementById("del_mun").value;
        if (del_mun === null || del_mun.length == 0 || /^\s+$/.test(del_mun) || del_mun == "") {
            $("#iconotexto8").remove();
            $("#del_mun").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#del_mun").parent().children("span").text("Debe ingresar la delegación o municipio.").show();
            $("#del_mun").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(colonia_dic)) {
            $("#iconotexto8").remove();
            $("#del_mun").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#del_mun").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#del_mun").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto8").remove();
            $("#del_mun").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#del_mun").parent().children("span").text("").hide();
            $("#del_mun").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'ciudad_est') {
        var ciudad_est = document.getElementById("ciudad_est").value;
        if (ciudad_est === null || ciudad_est.length == 0 || /^\s+$/.test(ciudad_est) || ciudad_est == "") {
            $("#iconotexto9").remove();
            $("#ciudad_est").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_est").parent().children("span").text("Debe ingresar la ciudad y estado.").show();
            $("#ciudad_est").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(colonia_dic)) {
            $("#iconotexto9").remove();
            $("#ciudad_est").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciudad_est").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#ciudad_est").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto9").remove();
            $("#ciudad_est").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciudad_est").parent().children("span").text("").hide();
            $("#ciudad_est").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'cp_dic') {
        var cp_dic = document.getElementById("cp_dic").value;
        if (cp_dic === null || cp_dic.length == 0 || /^\s+$/.test(cp_dic) || cp_dic == "") {
            $("#iconotexto10").remove();
            $("#cp_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_dic").parent().children("span").text("Debe ingresar el codigo postal").show();
            $("#cp_dic").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (isNaN(cp_dic)) {
            $("#iconotexto10").remove();
            $("#cp_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_dic").parent().children("span").text("No se aceptan letras o caracteres especiales").show();
            $("#cp_dic").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (cp_dic.length !== 5) {
            $("#iconotexto10").remove();
            $("#cp_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cp_dic").parent().children("span").text("El codigo postal deben ser 5 digitos").show();
            $("#cp_dic").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto10").remove();
            $("#cp_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cp_dic").parent().children("span").text("").hide();
            $("#cp_dic").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'tel_dic') {
        var tel_dic = document.getElementById("tel_dic").value;
        if (tel_dic === null || tel_dic.length == 0 || /^\s+$/.test(tel_dic) || tel_dic == "") {
            $("#iconotexto11").remove();
            $("#tel_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#tel_dic").parent().children("span").text("Debe ingresar el telefono").show();
            $("#tel_dic").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (isNaN(tel_dic)) {
            $("#iconotexto11").remove();
            $("#tel_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#tel_dic").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
            $("#tel_dic").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
        } else if (tel_dic.length < 10) {
            $("#iconotexto11").remove();
            $("#tel_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#tel_dic").parent().children("span").text("El teléfono debe ser igual o mayor a 10 incluyendo la lada").show();
            $("#tel_dic").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto11").remove();
            $("#tel_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#tel_dic").parent().children("span").text("").hide();
            $("#tel_dic").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }
    }
    
    if (input === 'correo_dic') {
        var correo_dic = document.getElementById("correo_dic").value;
        if (!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo_dic)) && correo_dic.length > 0) {
            $("#iconotexto12").remove();
            $("#correo_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#correo_dic").parent().children("span").text("Ingresar un correo valido").show();
            $("#correo_dic").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else if (correo_dic.length === 0 || correo_dic == "") {
            $("#iconotexto12").remove();
            $("#correo_dic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#correo_dic").parent().children("span").text("Ingresar correo").show();
            $("#correo_dic").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto12").remove();
            $("#correo_dic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#correo_dic").parent().children("span").text("").hide();
            $("#correo_dic").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'nivel_procedencia') {
        var nivel_procedencia = document.getElementById("nivel_procedencia").value;
        if (nivel_procedencia == '---Seleccione---') {
            $("#iconotexto13").remove();
            $("#nivel_procedencia").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel_procedencia").parent().children("span").text("Debe seleccionar el nivel").show();
            $("#nivel_procedencia").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto13").remove();
            $("#nivel_procedencia").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel_procedencia").parent().children("span").text("").hide();
            $("#nivel_procedencia").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'especificacion_ant') {
        var especificacion_ant = document.getElementById("especificacion_ant").value;
        if (especificacion_ant === null || especificacion_ant.length == 0 || /^\s+$/.test(especificacion_ant) || especificacion_ant == "") {
            $("#iconotexto14").remove();
            $("#especificacion_ant").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especificacion_ant").parent().children("span").text("Debe ingresar la delegación o municipio.").show();
            $("#especificacion_ant").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(especificacion_ant)) {
            $("#iconotexto14").remove();
            $("#especificacion_ant").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especificacion_ant").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#especificacion_ant").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto14").remove();
            $("#especificacion_ant").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#especificacion_ant").parent().children("span").text("").hide();
            $("#especificacion_ant").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'inst_proc') {
        var inst_proc = document.getElementById("inst_proc").value;
        if (inst_proc === null || inst_proc.length == 0 || /^\s+$/.test(inst_proc) || inst_proc == "") {
            $("#iconotexto15").remove();
            $("#inst_proc").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inst_proc").parent().children("span").text("Debe ingresar el nombre de la insitución.").show();
            $("#inst_proc").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(inst_proc)) {
            $("#iconotexto15").remove();
            $("#inst_proc").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inst_proc").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#inst_proc").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto15").remove();
            $("#inst_proc").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#inst_proc").parent().children("span").text("").hide();
            $("#inst_proc").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'ciu_est_inst_ant') {
        var ciu_est_inst_ant = document.getElementById("ciu_est_inst_ant").value;
        if (ciu_est_inst_ant === null || ciu_est_inst_ant.length == 0 || /^\s+$/.test(ciu_est_inst_ant) || ciu_est_inst_ant == "") {
            $("#iconotexto16").remove();
            $("#ciu_est_inst_ant").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciu_est_inst_ant").parent().children("span").text("Debe ingresar el nombre de la insitución.").show();
            $("#ciu_est_inst_ant").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(ciu_est_inst_ant)) {
            $("#iconotexto16").remove();
            $("#ciu_est_inst_ant").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciu_est_inst_ant").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#ciu_est_inst_ant").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto16").remove();
            $("#ciu_est_inst_ant").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciu_est_inst_ant").parent().children("span").text("").hide();
            $("#ciu_est_inst_ant").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'nivel_nuevo') {
        var nivel_nuevo = document.getElementById("nivel_nuevo").value;
        if (nivel_nuevo == '---Seleccione---') {
            $("#iconotexto17").remove();
            $("#nivel_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nivel_nuevo").parent().children("span").text("Debe seleccionar el nivel").show();
            $("#nivel_nuevo").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto17").remove();
            $("#nivel_nuevo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nivel_nuevo").parent().children("span").text("").hide();
            $("#nivel_nuevo").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'especificacion_nuevo') {
        var especificacion_nuevo = document.getElementById("especificacion_nuevo").value;
        if (especificacion_nuevo === null || especificacion_nuevo.length == 0 || /^\s+$/.test(especificacion_nuevo) || especificacion_nuevo == "") {
            $("#iconotexto18").remove();
            $("#especificacion_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especificacion_nuevo").parent().children("span").text("Debe ingresar la delegación o municipio.").show();
            $("#especificacion_nuevo").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(especificacion_nuevo)) {
            $("#iconotexto18").remove();
            $("#especificacion_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#especificacion_nuevo").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#especificacion_nuevo").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto18").remove();
            $("#especificacion_nuevo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#especificacion_nuevo").parent().children("span").text("").hide();
            $("#especificacion_nuevo").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'inst_nuevo') {
        var inst_nuevo = document.getElementById("inst_nuevo").value;
        if (inst_nuevo === null || inst_nuevo.length == 0 || /^\s+$/.test(inst_nuevo) || inst_nuevo == "") {
            $("#iconotexto19").remove();
            $("#inst_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inst_nuevo").parent().children("span").text("Debe ingresar la delegación o municipio.").show();
            $("#inst_nuevo").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(inst_nuevo)) {
            $("#iconotexto19").remove();
            $("#inst_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inst_nuevo").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#inst_nuevo").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto19").remove();
            $("#inst_nuevo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#inst_nuevo").parent().children("span").text("").hide();
            $("#inst_nuevo").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'ciu_est_inst_nuevo') {
        var ciu_est_inst_nuevo = document.getElementById("ciu_est_inst_nuevo").value;
        if (ciu_est_inst_nuevo === null || ciu_est_inst_nuevo.length == 0 || /^\s+$/.test(ciu_est_inst_nuevo) || ciu_est_inst_nuevo == "") {
            $("#iconotexto20").remove();
            $("#ciu_est_inst_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciu_est_inst_nuevo").parent().children("span").text("Debe ingresar la delegación o municipio.").show();
            $("#ciu_est_inst_nuevo").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(especificacion_ant)) {
            $("#iconotexto20").remove();
            $("#ciu_est_inst_nuevo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ciu_est_inst_nuevo").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#ciu_est_inst_nuevo").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto20").remove();
            $("#ciu_est_inst_nuevo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ciu_est_inst_nuevo").parent().children("span").text("").hide();
            $("#ciu_est_inst_nuevo").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'clv_plan') {
        var clv_plan = document.getElementById("clv_plan").value;
        if (clv_plan === null || clv_plan.length == 0 || /^\s+$/.test(clv_plan) || clv_plan == "") {
            $("#iconotexto21").remove();
            $("#clv_plan").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clv_plan").parent().children("span").text("Debe ingresar la calle.").show();
            $("#clv_plan").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(clv_plan)) {
            $("#iconotexto21").remove();
            $("#clv_plan").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#clv_plan").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#clv_plan").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto21").remove();
            $("#clv_plan").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#clv_plan").parent().children("span").text("").hide();
            $("#clv_plan").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'act_nac') {
        var act_nac = document.getElementById("act_nac").value;
        if (act_nac == '---Seleccione---') {
            $("#iconotexto22").remove();
            $("#act_nac").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#act_nac").parent().children("span").text("Debe seleccionar una opción").show();
            $("#act_nac").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto22").remove();
            $("#act_nac").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#act_nac").parent().children("span").text("").hide();
            $("#act_nac").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'act_nat') {
        var act_nat = document.getElementById("act_nat").value;
        if (act_nat == '---Seleccione---') {
            $("#iconotexto23").remove();
            $("#act_nat").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#act_nat").parent().children("span").text("Debe seleccionar una opción").show();
            $("#act_nat").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto23").remove();
            $("#act_nat").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#act_nat").parent().children("span").text("").hide();
            $("#act_nat").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'cald_mig') {
        var cald_mig = document.getElementById("cald_mig").value;
        if (cald_mig == '---Seleccione---') {
            $("#iconotexto24").remove();
            $("#cald_mig").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cald_mig").parent().children("span").text("Debe seleccionar una opción").show();
            $("#cald_mig").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto24").remove();
            $("#cald_mig").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cald_mig").parent().children("span").text("").hide();
            $("#cald_mig").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'certf_bach') {
        var certf_bach = document.getElementById("certf_bach").value;
        if (certf_bach == '---Seleccione---') {
            $("#iconotexto25").remove();
            $("#certf_bach").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#certf_bach").parent().children("span").text("Debe seleccionar una opción").show();
            $("#certf_bach").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto25").remove();
            $("#certf_bach").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#certf_bach").parent().children("span").text("").hide();
            $("#certf_bach").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'certf_tsu') {
        var certf_tsu = document.getElementById("certf_tsu").value;
        if (certf_tsu == '---Seleccione---') {
            $("#iconotexto26").remove();
            $("#certf_tsu").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#certf_tsu").parent().children("span").text("Debe seleccionar una opción").show();
            $("#certf_tsu").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto26").remove();
            $("#certf_tsu").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#certf_tsu").parent().children("span").text("").hide();
            $("#certf_tsu").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'certf_lic') {
        var certf_lic = document.getElementById("certf_lic").value;
        if (certf_lic == '---Seleccione---') {
            $("#iconotexto27").remove();
            $("#certf_lic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#certf_lic").parent().children("span").text("Debe seleccionar una opción").show();
            $("#certf_lic").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto27").remove();
            $("#certf_lic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#certf_lic").parent().children("span").text("").hide();
            $("#certf_lic").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'certf_esp') {
        var certf_esp = document.getElementById("certf_esp").value;
        if (certf_esp == '---Seleccione---') {
            $("#iconotexto28").remove();
            $("#certf_esp").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#certf_esp").parent().children("span").text("Debe seleccionar una opción").show();
            $("#certf_esp").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto28").remove();
            $("#certf_esp").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#certf_esp").parent().children("span").text("").hide();
            $("#certf_esp").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'certf_mst') {
        var certf_mst = document.getElementById("certf_mst").value;
        if (certf_mst == '---Seleccione---') {
            $("#iconotexto29").remove();
            $("#certf_mst").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#certf_mst").parent().children("span").text("Debe seleccionar una opción").show();
            $("#certf_mst").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto29").remove();
            $("#certf_mst").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#certf_mst").parent().children("span").text("").hide();
            $("#certf_mst").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'comprobante') {
        var comprobante = document.getElementById("comprobante").value;
        if (comprobante == '---Seleccione---') {
            $("#iconotexto30").remove();
            $("#comprobante").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#comprobante").parent().children("span").text("Debe seleccionar una opción").show();
            $("#comprobante").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto30").remove();
            $("#comprobante").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#comprobante").parent().children("span").text("").hide();
            $("#comprobante").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'otro') {
        var otro = document.getElementById("otro").value;
        if (otro === null || otro.length == 0 || /^\s+$/.test(otro) || otro == "") {
            $("#iconotexto31").remove();
            $("#otro").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#otro").parent().children("span").text("Debe ingresar la calle.").show();
            $("#otro").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        if (!/^(?=.{1,50}$)[a-z0-9\Ñ\ñüÜ]+(?:['_.\s][a-z0-9\Ñ\ñüÜ]+)*$/i.test(otro)) {
            $("#iconotexto31").remove();
            $("#otro").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#otro").parent().children("span").text("No se aceptan caracteres especiales.").show();
            $("#otro").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto31").remove();
            $("#otro").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#otro").parent().children("span").text("").hide();
            $("#otro").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
}