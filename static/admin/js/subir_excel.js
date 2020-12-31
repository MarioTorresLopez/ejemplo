var dropzoneMultimedia = null;
jQuery(document).ready(function ($) {
    Dropzone.options.formMultimediaData = {
        addRemoveLinks: false,
        autoDiscover: false,
        autoProcessQueue: true,
        dictDefaultMessage: 'Arrastre su archivo de Excel o de <br />Click aqui',
        dictRemoveFile: "Eliminar archivo",
        autoQueue: true,
        accept: function (file, done) {

            dropzoneMultimedia = this;
            //if(file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
            if (file.type == "application/vnd.ms-excel") {
                done();

            } else {
                this.removeFile(file);
                swal({
                    title: "Antención",
                    text: "ERROR EN LA EXTENSION DE ARCHIVO.",
                    type: "warning"
                });
            }
        },
        success: function (file, data) {
            //alert(file.name+"\nSubido correctamente");
            //vALIDACIÓN ESTATICA
            var ht = 1;
            window.setTimeout(function () {
                dropzoneMultimedia.removeFile(file);
            }, 1000);
            //$('#example2').dataTable();
            $('#tablaexcel').html(data);
        },
        queuecomplete: function () {
            var valorinput = $('#prueba').val();
            if (valorinput == 1) {
                swal({
                    title: "Antención",
                    text: "Tienes más grupos de los autorizados",
                    type: "warning"
                });
            } else {

            }
            $('#example2').dataTable();
            function base_url() {
                return "<?= base_url() ?>";
            }
        }
    }
    
    $(document).on('click', '#btnValidador', function (event) {
        inscribir();
    });
    
    $(document).on('click', '#btnCalificacion', function(event){
        subir_calificacion();
    });
    $(document).on('click', '#btnReinscripcion', function(event){
        reinscribir();
    });
    
    $(document).on('click', '#btnNotif', function(event){
        notificar();
    });
    
    function inscribir() {
        $.ajax({
            url: base_url() + "analista_servicios/inscripcion/inscribir_post",
            type: "post",
            dataType: "json",
            data: $("#form-inscripcion-data").serialize(),
            success: function (json) {
//                $('#tablaexcel').html('');
                if(json.alumnos_inscritos>0 && json.alumnos_no_inscritos==0){
                    $('#tablaexcel').html('');
                    swal({
                        title: "Inscripcion realizada",
                        text: "Alumnos inscritos: " + json.alumnos_inscritos + ", Alumnos no inscritos: " + json.alumnos_no_inscritos,
                        type: "success"
                    });
                }
                if(json.alumnos_inscritos>0 && json.alumnos_no_inscritos>0){
                    $('#tablaexcel').html('');
                    $('#tablaexcel').html(json.tabla);
                    $('#example2').dataTable();
                    swal({
                        title: "Inscripcion realizada",
                        text: "Alumnos inscritos: " + json.alumnos_inscritos + ", Alumnos no inscritos: " + json.alumnos_no_inscritos,
                        type: "warning"
                    });
                }
                if(json.alumnos_inscritos==0 && json.alumnos_no_inscritos>0){
                    $('#tablaexcel').html(json.tabla);
                    $('#example2').dataTable();
                    swal({
                        title: "Inscripcion no realizada",
                        text: "Alumnos inscritos: " + json.alumnos_inscritos + ", Alumnos no inscritos: " + json.alumnos_no_inscritos,
                        type: "error"
                    });
                }
            },
            error: function (a, b, c) {
                alert("No Agregado " + c);
                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
            }
        });
    }
    function reinscribir() {
        $.ajax({
            url: base_url() + "analista_servicios/reinscripcion/reinscribir_post",
            type: "post",
            dataType: "json",
            data: $("#form-reinscripcion-data").serialize(),
            success: function (json) {
//                $('#tablaexcel').html('');
                if(json.alumnos_inscritos>0 && json.alumnos_no_inscritos==0){
                    $('#tablaexcel').html('');
                    swal({
                        title: "Inscripcion realizada",
                        text: "Alumnos inscritos: " + json.alumnos_inscritos + ", Alumnos no inscritos: " + json.alumnos_no_inscritos,
                        type: "success"
                    });
                }
                if(json.alumnos_inscritos>0 && json.alumnos_no_inscritos>0){
                    $('#tablaexcel').html('');
                    $('#tablaexcel').html(json.tabla);
                    $('#example2').dataTable();
                    swal({
                        title: "Inscripcion realizada",
                        text: "Alumnos inscritos: " + json.alumnos_inscritos + ", Alumnos no inscritos: " + json.alumnos_no_inscritos,
                        type: "warning"
                    });
                }
                if(json.alumnos_inscritos==0 && json.alumnos_no_inscritos>0){
                    $('#tablaexcel').html(json.tabla);
                    $('#example2').dataTable();
                    swal({
                        title: "Inscripcion no realizada",
                        text: "Alumnos inscritos: " + json.alumnos_inscritos + ", Alumnos no inscritos: " + json.alumnos_no_inscritos,
                        type: "error"
                    });
                }
            },
            error: function (a, b, c) {
                alert("No Agregado DE" + c);
                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
            }
        });
    }
    
    function subir_calificacion() {
        $.ajax({
            url: base_url() + "analista_servicios/calificacion_subir/calificacion_post",
            type: "post",
            dataType: "json",
            data: $("#form-calificacion-data").serialize(),
            success: function (json) {
                //$('#tablaexcel').html('');
                if(json.no_calificaciones>0 && json.no_faltantes_calificaciones==0){
                    $('#tablaexcel').html('');
                    swal({
                        title: "Registro realizado",
                        text: "Calificaciones registradas: " + json.no_calificaciones + " de " + json.alumnos + " alumnos",
                        type: "success"
                    });
                }
                if(json.no_calificaciones>0 && json.no_faltantes_calificaciones>0){
                    $('#tablaexcel').html('');
                    $('#tablaexcel').html(json.tabla_no_registradas);
                    $('#example2').dataTable();
                    swal({
                        title: "Registro realizado",
                        text: "Calificaciones registradas: " + json.no_calificaciones + " de " + json.alumnos + " alumnos, Calificaciones no registradas: " + json.no_faltantes_calificaciones,
                        type: "warning"
                    });
                }
                if(json.no_calificaciones==0 && json.no_faltantes_calificaciones>0){
                    $('#tablaexcel').html(json.tabla_no_registradas);
                    $('#example2').dataTable();
                    swal({
                        title: "Registro no realizado",
                        text: "Calificaciones no registradas: " + json.no_faltantes_calificaciones + " de " + json.alumnos_noi + " alumnos",
                        type: "error"
                    });
                }
                
//                swal({
//                    title: "Registro realizado",
//                    text: "Calificaciones registradas: " + json.no_calificaciones+" de "+json.alumnos+" alumnos",
//                    type: "success"
//                });
            },
            error: function (a, b, c) {
                alert("No Agregado " + c);
                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
            }
        });
    }
    
    function notificar() {
        $.ajax({
            url: base_url() + "analista_servicios/inscripcion/notificar",
            type: "post",
            dataType: "json",
            success: function (json) {
                $('#tablaexcel').html('');
                swal({
                    title: "Notificación realizada",
                    text: "Se notifico al jefe de departamento",
                    type: "success"
                });
            },
            error: function (a, b, c) {
                alert("No Agregado " + c);
                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
            }
        });
    }

});