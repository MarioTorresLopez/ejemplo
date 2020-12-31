/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on("ready", inicio);

function inicio() {

    $("span.help-block").hide();
    
    $("#acta_prop").change(function (){
        validar('acta_prop');
    });
    
    $("#iden_ofic_prop").change(function (){
        validar('iden_ofic_prop');
    });
    
    $("#acta_repr").change(function (){
        validar('acta_repr');
    });
    
    $("#iden_ofic_repr").change(function (){
        validar('iden_ofic_repr');
    });
    
    $("#nota_repr").change(function (){
        validar('nota_repr');
    });
    
    $("#acredit_perso").change(function (){
        validar('acredit_perso');
    });
    
    $("#acta_const").change(function (){
        validar('acta_const');
    });
    
    $("#ocup_legal").change(function (){
        validar('ocup_legal');
    });
    
    $("#croquis").change(function (){
        validar('croquis');
    });
    
    $("#cedula_perito").change(function (){
        validar('cedula_perito');
    });
    
    $("#acre_legal_estr").change(function (){
        validar('acre_legal_estr');
    });
    
    $("#acre_legal_arre").change(function (){
        validar('acre_legal_arre');
    });
    
    $("#acre_legal_como").change(function (){
        validar('acre_legal_como');
    });
    
    $("#acre_legal_otro").change(function (){
        validar('acre_legal_otro');
    });
    
    $("#dictamen").change(function (){
        validar('dictamen');
    });
    
    $("#const_seg").change(function (){
        validar('const_seg');
    });
    
    $("#visto_prot").change(function (){
        validar('visto_prot');
    });
    
    $("#cert_nume_ofic").change(function (){
        validar('cert_nume_ofic');
    });
    
    $("#recibo_derechos").change(function (){
        validar('recibo_derechos');
    });
    
    $("#plano").change(function (){
        validar('plano');
    });
    
    $("#plantilla_personal").change(function (){
        validar('plantilla_personal');
    });
    
    $("#inventario").change(function (){
        validar('inventario');
    });
    
    $("#material_biblio").change(function (){
        validar('material_biblio');
    });
    
    $("#labo_poli").change(function (){
        validar('labo_poli');
    });
    
    $("#inst_eval").change(function (){
        validar('inst_eval');
    });
    
    $("#acervo_biblio").change(function (){
        validar('acervo_biblio');
    });
    
    $("#mapa_doc").change(function (){
        validar('mapa_doc');
    });
    
    $("#prog_estu").change(function (){
        validar('prog_estu');
    });
    
    $("#plat_tecno").change(function (){
        validar('plat_tecno');
    });
    
    $("#inst_espe").change(function (){
        validar('inst_espe');
    });
    
    $("#coepes").change(function (){
        validar('coepes');
    });
    
    $("#desc_inst").change(function (){
        validar('desc_inst');
    });
    
    $("#acuerdo").change(function (){
        validar('acuerdo');
    });
    
    
    $("#btnValidarDoc1").click(function () {
        
        if (validar('acta_prop') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form1').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc2").click(function () {
        
        if (validar('iden_ofic_prop') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form2').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc3").click(function () {
        
        if (validar('acta_repr') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form3').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc4").click(function () {
        
        if (validar('iden_ofic_repr') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form4').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc5").click(function () {
        
        if (validar('nota_repr') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form5').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc6").click(function () {
        
        if (validar('acredit_perso') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form6').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc7").click(function () {
        
        if (validar('acta_const') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form7').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc8").click(function () {
        
        if (validar('ocup_legal') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form8').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc9").click(function () {
        
        if (validar('croquis') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form9').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc10").click(function () {
        
        if (validar('cedula_perito') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form10').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc11").click(function () {
        
        if (validar('acre_legal_estr') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form11').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc12").click(function () {
        
        if (validar('acre_legal_arre') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form12').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc13").click(function () {
        
        if (validar('acre_legal_como') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form13').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc14").click(function () {
        
        if (validar('acre_legal_otro') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form14').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc15").click(function () {
        
        if (validar('dictamen') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form15').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc16").click(function () {
        
        if (validar('const_seg') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form16').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc17").click(function () {
        
        if (validar('visto_prot') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form17').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc18").click(function () {
        
        if (validar('cert_nume_ofic') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form18').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc19").click(function () {
        
        if (validar('recibo_derechos') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form19').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc20").click(function () {
        
        if (validar('plano') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form20').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc21").click(function () {
        
        if (validar('plantilla_personal') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form21').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc22").click(function () {
        
        if (validar('inventario') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form22').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc23").click(function () {
        
        if (validar('material_biblio') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form23').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc24").click(function () {
        
        if (validar('labo_poli') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form24').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc25").click(function () {
        
        if (validar('inst_eval') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form25').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc26").click(function () {
        
        if (validar('acervo_biblio') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form26').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc27").click(function () {
        
        if (validar('mapa_doc') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form27').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc28").click(function () {
        
        if (validar('prog_estu') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form28').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc29").click(function () {
        
        if (validar('plat_tecno') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form29').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc30").click(function () {
        
        if (validar('inst_espe') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form30').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc31").click(function () {
        
        if (validar('coepes') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form31').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc32").click(function () {
        
        if (validar('desc_inst') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form32').submit();
                }
            );
            return false;
        }

    });
    
    
    $("#btnValidarDoc33").click(function () {
        
        if (validar('acuerdo') === false) {

            swal({
                title: "Alerta",
                text: "No ha seleccionado su documento.",
                type: "warning"
            });

            return false;

        }
        
        else {

            swal({
                title: "Registro",
                text: "Su documento ha sido guardado.",
                type: "success"
            },
                function () {
                    $('#form33').submit();
                }
            );
            return false;
        }

    });
    

}


function validar(campo) {

    var acta_prop       = document.getElementById("acta_prop").value;
    var iden_ofic_prop  = document.getElementById("iden_ofic_prop").value;
    var acta_repr       = document.getElementById("acta_repr").value;
    var iden_ofic_repr  = document.getElementById("iden_ofic_repr").value;
    var nota_repr       = document.getElementById("nota_repr").value;
    var acredit_perso   = document.getElementById("acredit_perso").value;
    var acta_const      = document.getElementById("acta_const").value;
    var ocup_legal      = document.getElementById("ocup_legal").value;
    var croquis         = document.getElementById("croquis").value;
    var cedula_perito   = document.getElementById("cedula_perito").value;
    var acre_legal_estr = document.getElementById("acre_legal_estr").value;
    var acre_legal_arre = document.getElementById("acre_legal_arre").value;
    var acre_legal_como = document.getElementById("acre_legal_como").value;
    var acre_legal_otro = document.getElementById("acre_legal_otro").value;
    var dictamen        = document.getElementById("dictamen").value;
    var const_seg       = document.getElementById("const_seg").value;
    var visto_prot      = document.getElementById("visto_prot").value;
    var cert_nume_ofic  = document.getElementById("cert_nume_ofic").value;
    var recibo_derechos = document.getElementById("recibo_derechos").value;
    var plano           = document.getElementById("plano").value;
    var plantilla_personal = document.getElementById("plantilla_personal").value;
    var inventario      = document.getElementById("inventario").value;
    var material_biblio = document.getElementById("material_biblio").value;
    var labo_poli       = document.getElementById("labo_poli").value;
    var inst_eval       = document.getElementById("inst_eval").value;
    var acervo_biblio   = document.getElementById("acervo_biblio").value;
    var mapa_doc        = document.getElementById("mapa_doc").value;
    var prog_estu       = document.getElementById("prog_estu").value;
    var plat_tecno      = document.getElementById("plat_tecno").value;
    var inst_espe       = document.getElementById("inst_espe").value;
    var coepes          = document.getElementById("coepes").value;
    var desc_inst       = document.getElementById("desc_inst").value;
    var acuerdo         = document.getElementById("acuerdo").value;
    
    
    if (campo === 'acta_prop') {

        if (acta_prop === null || acta_prop === "") {
            $("#iconotexto1").remove();
            $("#acta_prop").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acta_prop").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acta_prop").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto1").remove();
            $("#acta_prop").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acta_prop").parent().children("span").text("").hide();
            $("#acta_prop").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    

    if (campo === 'iden_ofic_prop') {

        if (iden_ofic_prop === null || iden_ofic_prop === "") {
            $("#iconotexto2").remove();
            $("#iden_ofic_prop").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#iden_ofic_prop").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#iden_ofic_prop").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto2").remove();
            $("#iden_ofic_prop").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#iden_ofic_prop").parent().children("span").text("").hide();
            $("#iden_ofic_prop").parent().append("<span id='iconotexto2' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acta_repr') {

        if (acta_repr === null || acta_repr === "") {
            $("#iconotexto3").remove();
            $("#acta_repr").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acta_repr").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acta_repr").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto3").remove();
            $("#acta_repr").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acta_repr").parent().children("span").text("").hide();
            $("#acta_repr").parent().append("<span id='iconotexto3' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'iden_ofic_repr') {

        if (iden_ofic_repr === null || iden_ofic_repr === "") {
            $("#iconotexto4").remove();
            $("#iden_ofic_repr").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#iden_ofic_repr").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#iden_ofic_repr").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto4").remove();
            $("#iden_ofic_repr").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#iden_ofic_repr").parent().children("span").text("").hide();
            $("#iden_ofic_repr").parent().append("<span id='iconotexto4' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'nota_repr') {

        if (nota_repr === null || nota_repr === "") {
            $("#iconotexto5").remove();
            $("#nota_repr").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#nota_repr").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#nota_repr").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto5").remove();
            $("#nota_repr").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#nota_repr").parent().children("span").text("").hide();
            $("#nota_repr").parent().append("<span id='iconotexto5' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acredit_perso') {

        if (acredit_perso === null || acredit_perso === "") {
            $("#iconotexto6").remove();
            $("#acredit_perso").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acredit_perso").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acredit_perso").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto6").remove();
            $("#acredit_perso").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acredit_perso").parent().children("span").text("").hide();
            $("#acredit_perso").parent().append("<span id='iconotexto6' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acta_const') {

        if (acta_const === null || acta_const === "") {
            $("#iconotexto7").remove();
            $("#acta_const").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acta_const").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acta_const").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto7").remove();
            $("#acta_const").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acta_const").parent().children("span").text("").hide();
            $("#acta_const").parent().append("<span id='iconotexto7' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'ocup_legal') {

        if (ocup_legal === null || ocup_legal === "") {
            $("#iconotexto8").remove();
            $("#ocup_legal").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#ocup_legal").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#ocup_legal").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto8").remove();
            $("#ocup_legal").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#ocup_legal").parent().children("span").text("").hide();
            $("#ocup_legal").parent().append("<span id='iconotexto8' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'croquis') {

        if (croquis === null || croquis === "") {
            $("#iconotexto9").remove();
            $("#croquis").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#croquis").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#croquis").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto9").remove();
            $("#croquis").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#croquis").parent().children("span").text("").hide();
            $("#croquis").parent().append("<span id='iconotexto9' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'cedula_perito') {

        if (cedula_perito === null || cedula_perito === "") {
            $("#iconotexto10").remove();
            $("#cedula_perito").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cedula_perito").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#cedula_perito").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto10").remove();
            $("#cedula_perito").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cedula_perito").parent().children("span").text("").hide();
            $("#cedula_perito").parent().append("<span id='iconotexto10' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acre_legal_estr') {

        if (acre_legal_estr === null || acre_legal_estr === "") {
            $("#iconotexto11").remove();
            $("#acre_legal_estr").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acre_legal_estr").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acre_legal_estr").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto11").remove();
            $("#acre_legal_estr").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acre_legal_estr").parent().children("span").text("").hide();
            $("#acre_legal_estr").parent().append("<span id='iconotexto11' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acre_legal_arre') {

        if (acre_legal_arre === null || acre_legal_arre === "") {
            $("#iconotexto12").remove();
            $("#acre_legal_arre").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acre_legal_arre").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acre_legal_arre").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto12").remove();
            $("#acre_legal_arre").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acre_legal_arre").parent().children("span").text("").hide();
            $("#acre_legal_arre").parent().append("<span id='iconotexto12' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acre_legal_como') {

        if (acre_legal_como === null || acre_legal_como === "") {
            $("#iconotexto13").remove();
            $("#acre_legal_como").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acre_legal_como").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acre_legal_como").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto13").remove();
            $("#acre_legal_como").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acre_legal_como").parent().children("span").text("").hide();
            $("#acre_legal_como").parent().append("<span id='iconotexto13' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acre_legal_otro') {

        if (acre_legal_otro === null || acre_legal_otro === "") {
            $("#iconotexto14").remove();
            $("#acre_legal_otro").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acre_legal_otro").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acre_legal_otro").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto14").remove();
            $("#acre_legal_otro").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acre_legal_otro").parent().children("span").text("").hide();
            $("#acre_legal_otro").parent().append("<span id='iconotexto14' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'dictamen') {

        if (dictamen === null || dictamen === "") {
            $("#iconotexto15").remove();
            $("#dictamen").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#dictamen").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#dictamen").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto15").remove();
            $("#dictamen").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#dictamen").parent().children("span").text("").hide();
            $("#dictamen").parent().append("<span id='iconotexto15' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'const_seg') {

        if (const_seg === null || const_seg === "") {
            $("#iconotexto16").remove();
            $("#const_seg").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#const_seg").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#const_seg").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto16").remove();
            $("#const_seg").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#const_seg").parent().children("span").text("").hide();
            $("#const_seg").parent().append("<span id='iconotexto16' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'visto_prot') {

        if (visto_prot === null || visto_prot === "") {
            $("#iconotexto17").remove();
            $("#visto_prot").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#visto_prot").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#visto_prot").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto17").remove();
            $("#visto_prot").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#visto_prot").parent().children("span").text("").hide();
            $("#visto_prot").parent().append("<span id='iconotexto17' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'cert_nume_ofic') {

        if (cert_nume_ofic === null || cert_nume_ofic === "") {
            $("#iconotexto18").remove();
            $("#cert_nume_ofic").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#cert_nume_ofic").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#cert_nume_ofic").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto18").remove();
            $("#cert_nume_ofic").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#cert_nume_ofic").parent().children("span").text("").hide();
            $("#cert_nume_ofic").parent().append("<span id='iconotexto18' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'recibo_derechos') {

        if (recibo_derechos === null || recibo_derechos === "") {
            $("#iconotexto19").remove();
            $("#recibo_derechos").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#recibo_derechos").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#recibo_derechos").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto19").remove();
            $("#recibo_derechos").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#recibo_derechos").parent().children("span").text("").hide();
            $("#recibo_derechos").parent().append("<span id='iconotexto19' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'plano') {

        if (plano === null || plano === "") {
            $("#iconotexto20").remove();
            $("#plano").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plano").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#plano").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto20").remove();
            $("#plano").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#plano").parent().children("span").text("").hide();
            $("#plano").parent().append("<span id='iconotexto20' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'plantilla_personal') {

        if (plantilla_personal === null || plantilla_personal === "") {
            $("#iconotexto21").remove();
            $("#plantilla_personal").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plantilla_personal").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#plantilla_personal").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto21").remove();
            $("#plantilla_personal").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#plantilla_personal").parent().children("span").text("").hide();
            $("#plantilla_personal").parent().append("<span id='iconotexto21' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'inventario') {

        if (inventario === null || inventario === "") {
            $("#iconotexto22").remove();
            $("#inventario").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inventario").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#inventario").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto22").remove();
            $("#inventario").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#inventario").parent().children("span").text("").hide();
            $("#inventario").parent().append("<span id='iconotexto22' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'material_biblio') {

        if (material_biblio === null || material_biblio === "") {
            $("#iconotexto23").remove();
            $("#material_biblio").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#material_biblio").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#material_biblio").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto23").remove();
            $("#material_biblio").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#material_biblio").parent().children("span").text("").hide();
            $("#material_biblio").parent().append("<span id='iconotexto23' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'labo_poli') {

        if (labo_poli === null || labo_poli === "") {
            $("#iconotexto24").remove();
            $("#labo_poli").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#labo_poli").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#labo_poli").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto24").remove();
            $("#labo_poli").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#labo_poli").parent().children("span").text("").hide();
            $("#labo_poli").parent().append("<span id='iconotexto24' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'inst_eval') {

        if (inst_eval === null || inst_eval === "") {
            $("#iconotexto25").remove();
            $("#inst_eval").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inst_eval").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#inst_eval").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto25").remove();
            $("#inst_eval").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#inst_eval").parent().children("span").text("").hide();
            $("#inst_eval").parent().append("<span id='iconotexto25' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acervo_biblio') {

        if (acervo_biblio === null || acervo_biblio === "") {
            $("#iconotexto26").remove();
            $("#acervo_biblio").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acervo_biblio").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acervo_biblio").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto26").remove();
            $("#acervo_biblio").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acervo_biblio").parent().children("span").text("").hide();
            $("#acervo_biblio").parent().append("<span id='iconotexto26' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'mapa_doc') {

        if (mapa_doc === null || mapa_doc === "") {
            $("#iconotexto27").remove();
            $("#mapa_doc").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#mapa_doc").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#mapa_doc").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto27").remove();
            $("#mapa_doc").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#mapa_doc").parent().children("span").text("").hide();
            $("#mapa_doc").parent().append("<span id='iconotexto27' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'prog_estu') {

        if (prog_estu === null || prog_estu === "") {
            $("#iconotexto28").remove();
            $("#prog_estu").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#prog_estu").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#prog_estu").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto28").remove();
            $("#prog_estu").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#prog_estu").parent().children("span").text("").hide();
            $("#prog_estu").parent().append("<span id='iconotexto28' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'plat_tecno') {

        if (plat_tecno === null || plat_tecno === "") {
            $("#iconotexto29").remove();
            $("#plat_tecno").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#plat_tecno").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#plat_tecno").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto29").remove();
            $("#plat_tecno").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#plat_tecno").parent().children("span").text("").hide();
            $("#plat_tecno").parent().append("<span id='iconotexto29' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'inst_espe') {

        if (inst_espe === null || inst_espe === "") {
            $("#iconotexto30").remove();
            $("#inst_espe").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#inst_espe").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#inst_espe").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto30").remove();
            $("#inst_espe").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#inst_espe").parent().children("span").text("").hide();
            $("#inst_espe").parent().append("<span id='iconotexto30' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'coepes') {

        if (coepes === null || coepes === "") {
            $("#iconotexto31").remove();
            $("#coepes").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#coepes").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#coepes").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto31").remove();
            $("#coepes").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#coepes").parent().children("span").text("").hide();
            $("#coepes").parent().append("<span id='iconotexto31' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'desc_inst') {

        if (desc_inst === null || desc_inst === "") {
            $("#iconotexto32").remove();
            $("#desc_inst").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#desc_inst").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#desc_inst").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto32").remove();
            $("#desc_inst").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#desc_inst").parent().children("span").text("").hide();
            $("#desc_inst").parent().append("<span id='iconotexto32' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
    if (campo === 'acuerdo') {

        if (acuerdo === null || acuerdo === "") {
            $("#iconotexto33").remove();
            $("#acuerdo").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#acuerdo").parent().children("span").text("Debe ingresar el documento correspondiente.").show();
            $("#acuerdo").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        } else {
            $("#iconotexto33").remove();
            $("#acuerdo").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#acuerdo").parent().children("span").text("").hide();
            $("#acuerdo").parent().append("<span id='iconotexto33' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
            return true;
        }

    }
    
    
}