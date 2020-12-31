<link rel='stylesheet' href='<?= base_url() ?>static/vendor/fullcalendar/dist/fullcalendar.css' />
<script src='<?= base_url() ?>static/vendor/jquery/moment.min.js'></script>
<script src='<?= base_url() ?>static/vendor/jquery/fullcalendar.js'></script>
<?php
if (!is_null($modals)):
    foreach ($modals as $modal):
        ?>
        <?= $modal ?>
        <?php
    endforeach;
endif;
?>
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>Calendario de eventos</strong>
                    <input id="rol" type="hidden" value="<?=$valor->rol?>">
                </span>
                <div class="panel-options pull-right"><!-- panel options -->
                    <ul class="options list-unstyled" style="margin-right: 10px;">
                        <?php if ($this->session->userdata('rol_id') == 1) : ?>
                            <li style="line-height: 30px;">
                                <strong>
                                    <i class="fa fa-filter"></i>
                                    Filtar por: 
                                </strong>
                            </li>
                            <li>
                                <select name="filtro_id" id="filtro_id" class="form-control input-sm">
                                    <option value="0"> Todos los eventos </option>
                                    <option value="<?= $this->session->userdata('usuario_id') ?>" <?= ($this->input->get('filtro_id') == $this->session->userdata('usuario_id')) ? 'selected="selected"' : NULL ?>> Sólo mis eventos </option>
                                    <optgroup label="Administradores del sistema">
                                        <?php
                                        if (!is_null($filtro_usuarios_wadmin)) :
                                            foreach ($filtro_usuarios_wadmin as $row) :
                                                ?>
                                                <option value="<?= $row->usuario_id ?>" <?= ($this->input->get('filtro_id') == $row->usuario_id) ? 'selected="selected"' : NULL ?>> <?= $row->nombre ?> <?= $row->apellido1 ?> &lt;<?= $row->email_auth ?>&gt;</option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </optgroup>
                                    <optgroup label="Administradores inmobiliarios">
                                        <?php
                                        if (!is_null($filtro_usuarios_iadmin)) :
                                            foreach ($filtro_usuarios_iadmin as $row) :
                                                ?>
                                                <option value="<?= $row->usuario_id ?>" <?= ($this->input->get('filtro_id') == $row->usuario_id) ? 'selected="selected"' : NULL ?>> <?= $row->nombre ?> <?= $row->apellido1 ?> &lt;<?= $row->email_auth ?>&gt;</option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </optgroup>
                                    <optgroup label="Agentes inmobiliarios">
                                        <?php
                                        if (!is_null($filtro_usuarios_agente)) :
                                            foreach ($filtro_usuarios_agente as $row) :
                                                ?>
                                                <option value="<?= $row->usuario_id ?>" <?= ($this->input->get('filtro_id') == $row->usuario_id) ? 'selected="selected"' : NULL ?>> <?= $row->nombre ?> <?= $row->apellido1 ?> &lt;<?= $row->email_auth ?>&gt;</option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </optgroup>
                                </select>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a data-widget="calendar-view" href="#month"><i class="fa fa-calendar-o color-green"></i> <span>Mes</span></a>
                            <a data-widget="calendar-view" href="#agendaWeek"><i class="fa fa-calendar-o color-red"></i> <span>Agenda</span></a>
                            <a data-widget="calendar-view" href="#agendaDay"><i class="fa fa-calendar-o color-yellow"></i> <span>Hoy</span></a>
                            <a data-widget="calendar-view" href="#basicWeek"><i class="fa fa-calendar-o color-gray"></i> <span>Semana</span></a>
                        </li>
                    </ul>
                </div><!-- /panel options -->
            </div>

            <!-- panel content -->
            <div class="panel-body">
                <div id="calendar" data-modal-create="true">
                    <p class="text-center">
                    <div class="col-sm-12">
                        <svg class="lds-typing" width="100%" height="120px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="27.5" cy="37.5683" r="5" fill="#176698">
                        <animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.5s"></animate>
                        </circle> <circle cx="42.5" cy="40.5235" r="5" fill="#69a541">
                        <animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.375s"></animate>
                        </circle> <circle cx="57.5" cy="54.5028" r="5" fill="#176698">
                        <animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.25s"></animate>
                        </circle> <circle cx="72.5" cy="62.5" r="5" fill="#69a541">
                        <animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite" values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.125s"></animate>
                        </circle></svg>
                    </div>
                    </p>
                </div>
            </div>
            <!-- /panel content -->

            <!-- panel footer -->
            <div class="panel-footer">
            </div>
            <!-- /panel footer -->
        </div>
        <!-- /PANEL -->
    </div>
    <!-- ROW START-->
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
    <!-- ROW END-->
    <style>
        .bg-warning-2{
            background: #FF8000 !important;
            color: darkslateblue !important;
        }
        .bg-danger-2{
            background: #DF0101 !important;
            color: darkslateblue !important;
        }
        .bg-success-2{
            background: #31B404 !important;
            color: darkslateblue !important;
        }
    </style>
</div>
<script type="text/javascript">var plugin_path = '../static/plugins/';</script>
<script type="text/javascript">

    function loadScript(src, cb) {
        var script = document.createElement('script');
        script.async = true;
        script.src = src;

        script.onerror = function () {
            cb(new Error("Failed to load" + src));
        };

        script.onload = function () {
            cb();
        };

        document.getElementsByTagName("head")[0].appendChild(script);
    }

//module.exports = loadScript;

    var objNewDate = {
        titulo: null,
        desc: null,
        fechaIni: null,
        fechaFin: null,
        allDay: null,
        start: null,
        end: null
    };

    jQuery(document).ready(function ($) {
//        var dataFromlocalStorage = JSON.parse(localStorage.getItem("datos"));
//        iddelainstitucion = dataFromlocalStorage;
//        console.log(iddelainstitucion);
//        
//        var dataFromlocalStorage2 = JSON.parse(localStorage.getItem("datosanalista"));
//    
//        idanalistaasignado=dataFromlocalStorage2;
    
//        console.log(idanalistaasignado);
        

        var idroll = $("#rol").val();
        $("#filtro_id").change(function (event) {
            /* Act on the event */
            var filtro_id = parseInt($(this).val());
            $("#loader-wrapper").fadeIn(500, function () {
                window.location.href = base_url() + "app/eventos/?filtro_id=" + filtro_id;
            });
        });
        //Borrar Eventos
        $("#form-editevento-data-btn-delete").click(function (event) {
            if (confirm("¿Realmente desea eliminar este vento?\n\nEsta acción no puede deshacerse")) {
                var evento_id = parseInt($("#evento_id").val());
                $("#modal-editevento-data").modal('hide');
                $('#calendar').fullCalendar('removeEvents', evento_id);
                $.ajax({
                    url: base_url() + "app/eventos/delete_evento",
                    type: "post",
                    dataType: "json",
                    data: {
                        evento_id: evento_id
                    },
                    success: function (json) {
                        _toastr("Evento eliminado correctamenete", "top-right", "success", false);
                    },
                    error: function (a, b, c) {
                        _toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo", "top-right", "error", false);
                    }
                });
            }
        });
        //Cambiar de vista
        jQuery("a[data-widget=calendar-view]").bind("click", function (e) {
            e.preventDefault();

            var _href = jQuery(this).attr('href'),
                    _href = _href.replace('#', ''),
                    _name = jQuery('span', this).html();

            if (_href) {
                jQuery('#calendar').fullCalendar('changeView', _href.trim()); // month  , basicWeek , basicDay , agendaWeek , agendaDay 
                jQuery("#agenda_btn").empty().append(_name);

                // add current view to cookie
                jQuery.cookie('calendar_view', _href, {expires: 30});         // expire 30 days
                jQuery.cookie('calendar_view_name', _name, {expires: 30});    // expire 30 days
            }
        });

        $("#addEvento").click(function () {
            addevent();
        });
        
        $("#addEventoAsp").click(function(){
            addeventA();
        });

        $("#editEvento").click(function () {
            editevent();
        });
        $("#e_cancelar").click(function () {
            $("#modal-editevento-data .close").click();
        });
        $("#cancelar").click(function () {
            $("#modal-addevento-data .close").click();
        });
        $("#cancelarAsp").click(function () {
            $("#modal-addeventoAsp-data .close").click();
        });

//Restablecer valores de la modal
        $("#modal-editevento-data").on('hidden.bs.modal', function () {
            $("#loader-editevento-data").show(1);
            $("#form-editevento-data").hide(1);
        });
//Vaciar campos de la modal
        $("#modal-addevento-data").on('hidden.bs.modal', function () {
            $("#form-addevento-data input, #form-addevento-data textarea").val('');
        });
    });


//EVENTOS YA CREADOS
    var _calendarEvents = [
<?php
$valoridrol = $valor;
if (!is_null($eventos)) :
    foreach ($eventos as $row) :
?>
                {
                    id : parseInt('<?= $row->idcita ?>'),
                    title: 'Ocupado',
                    //title: '<?= substr($row->descripcion, 0, 15) ?><?= (strlen($row->descripcion) > 15) ? "..." : NULL ?>',
                    start : '<?= $row->fechaini ?> <?= $row->horaini ?>',
                    //end: '<?= $row->fechaini ?> <?= $row->horafin ?>',
                    //description :'<?= ($row->idusuario != $this->session->userdata('idusu')) ? $row->nomusuario : substr($row->observaciones, 0, 20) ?><?= (strlen($row->observaciones) > 20) ? "..." : NULL ?>',
                    allDay: false,
                    className: ["<?= ($row->idtipotramite == 1) ? 'bg-warning-2' : 'bg-success-2' ?>"],
                    icon: 'fa-clock-o',
                    owner: <?= ($valoridrol->rol != 2) ? 'false' : 'true' ?>
        <?php if ($valoridrol->rol != 2): ?>
                    , editable: false
        <?php endif; ?>
                },
        <?php
    endforeach;
endif;
?>
                            ];

                                    loadScript(plugin_path + "jquery/jquery.cookie.js", function () {
                                        loadScript(plugin_path + "jquery/jquery-ui.min.js", function () {
                                            loadScript(plugin_path + "jquery/jquery.ui.touch-punch.min.js", function () {
                                                loadScript(plugin_path + "moment.js", function () {
                                                    loadScript(plugin_path + "bootstrap.dialog/dist/js/bootstrap-dialog.min.js", function () {
                                                        loadScript(plugin_path + "fullcalendar/fullcalendar.js", function () {
                                                            loadScript(plugin_path + "fullcalendar/gcal.js", function () {
                                                                jQuery(document).ready(function ($) {
                                                                    initCalendar();
                                                                });
                                                            });
                                                        });
                                                    });
                                                });
                                            });
                                        });
                                    });
//Inicializa el calendario
                                    var evento;
                                    function initCalendar() {

                                        for (let x = 0; x < _calendarEvents.length; x++) {
                                            console.log(_calendarEvents[x]);
                                        }
                                        jQuery('#calendar').html('');

                                        var calendar_view = jQuery.cookie('calendar_view');
                                        var calendar_view_name = jQuery.cookie('calendar_view_name');

                                        if (calendar_view && calendar_view_name) {
                                            jQuery('#calendar').fullCalendar('changeView', calendar_view.trim());
                                            jQuery("#agenda_btn").empty().append(calendar_view_name);
                                        }

                                        jQuery('#calendar').fullCalendar({
                                            defaultView: 'agendaWeek',
                                            draggable: true,
                                            selectable: true,
                                            selectHelper: true,
                                            unselectAuto: false,
                                            disableResizing: true,
                                            editable: true,
                                            allDaySlot: false,
                                            header: {
                                                left: 'title',
                                            },
                                            minTime: '07:00:00',
                                            maxTime: '22:00:00',
                                            droppable: false,
                                            select: function (start, end, allDay) {
                                                var fechaIni = moment(start).format('YYYY-MM-DD');
                                                var horaIni = moment(start).format('HH:mm');

                                                horaIni = (horaIni == '00:00') ? '07:00' : horaIni;

                                                var fechaFin = moment(end).format('YYYY-MM-DD');
                                                var horaFin = moment(end).format('HH:mm');

                                                horaFin = (horaFin == '00:00') ? '22:00' : horaFin;

                                                $("#fechaini").val(fechaIni);
                                                $("#fechainiAsp").val(fechaIni);
                                                $("#horaini").val(horaIni);
                                                $("#horainiAsp").val(horaIni);
                                                
                                                //$("#idinstitucion").val(iddelainstitucion);
                                                
                                                $.post(base_url()+"app/eventos/analistas", {
                                                }, function (data) {
                                                    $("#idanalista").html(data);
                                                    });
                                                var idrol = $("#rol").val();

                                                objNewDate.fechaIni = fechaIni;
                                                objNewDate.fechaFin = fechaFin;
                                                objNewDate.horaIni = horaIni;
                                                objNewDate.horaFin = horaFin;
                                                objNewDate.allDay = allDay;
                                                objNewDate.start = start;
                                                objNewDate.end = end;

                                                $("#horafin").val(horaFin);
                                                $("#horafinAsp").val(horaFin);
                                                
                                                if(idrol !=3){
                                                    $("#modal-addevento-data").modal({
                                                    backdrop: 'static',
                                                    keyboard: false,
                                                    show: true
                                                });
                                                }
                                                else{
                                                    $("#modal-addeventoAsp-data").modal({
                                                    backdrop: 'static',
                                                    keyboard: false,
                                                    show: true
                                                });
                                                }
                                                
//                                                $("#modal-addevento-data").modal({
//                                                    backdrop: 'static',
//                                                    keyboard: false,
//                                                    show: true
//                                                });
                                            },
                                            events: _calendarEvents,
                                            eventResizeStart: function () {
                                                isResizingEvent = true;
                                            },
                                            eventResizeStop: function () {
                                                isResizingEvent = false;
                                            },
                                            //Mover un evento de un lugar a otro
                                            eventDrop: function (event, dayDelta, minuteDelta, allDay) {

                                                var fechaIni = moment(event.start).format('YYYY-MM-DD');
                                                var horaIni = moment(event.start).format('HH:mm');

                                                horaIni = (horaIni == '00:00') ? '07:00' : horaIni;

                                                var fechaFin = moment(event.end).format('YYYY-MM-DD');
                                                var horaFin = moment(event.end).format('HH:mm');

                                                horaFin = (horaFin == '00:00') ? '22:00' : horaFin;

                                                $.ajax({
                                                    url: base_url() + "app/eventos/move_evento",
                                                    type: "post",
                                                    dataType: "json",
                                                    data: {
                                                        evento_id: event.id,
                                                        fechaini: fechaIni,
                                                        horaini: horaIni,
                                                        horafin: horaFin
                                                    },
                                                    success: function (json) {
//                                                        _toastr("Evento modificado correctamenete", "top-right", "success", false);
                                                        event.className=["bg-warning-2"];
                                                        $("#calendar").fullCalendar("updateEvent",event);
                                                        swal({
                                                            title: "Evento modificado correctamenete",
                                                            text: "",
                                                            type: "success"
                                                        },
                                                                function () {

                                                                });
                                                    },
                                                    error: function (a, b, c) {
                                                        alert('No edito' + c);
                                                        //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo", "top-right", "error", false);
                                                    }
                                                });
                                            },
                                            eventRender: function (event, element, icon) {

                                                if (!event.description == '') {
                                                    element.find('.fc-event-title').append("<br /><br /><span class='font300 fsize11'>" + event.description + "</span>");
                                                }

                                                if (!event.icon == '') {
                                                    element.find('.fc-event-title').append("<i class='fc-icon fa " + event.icon + "'></i>");
                                                }

                                            },
                                            eventClick: function (calEvent, jsEvent, view) {
                                                evento = calEvent;
                                                if (!calEvent.owner) {
                                                    $("#form-editevento-data input, #form-editevento-data textarea").attr('disabled', 'disabled');
                                                    $("#form-editevento-data-btn-sbmt").hide(1);
                                                    $("#form-editevento-data-btn-delete").hide(1);
                                                } else {
                                                    $("#form-editevento-data input, #form-editevento-data textarea").removeAttr('disabled');
                                                    $("#form-editevento-data-btn-sbmt").show(1);
                                                    $("#form-editevento-data-btn-delete").show(1);
                                                }

                                                $("#modal-editevento-data").modal({
                                                    backdrop: 'static',
                                                    keyboard: false,
                                                    show: true
                                                });

                                                $.ajax({
                                                    url: base_url() + "app/eventos/get_cita",
                                                    type: "post",
                                                    dataType: "json",
                                                    data: {
                                                        evento_id: calEvent.id
                                                    },
                                                    success: function (json) {
                                                        $("#evento_id").val(parseInt(json.evento_data.idcita));
                                                        $("#e_titulo_ev").val(json.evento_data.descripcion);
                                                        $("#e_fecha_iniev").val(json.evento_data.fechaini);
                                                        $("#e_hora_iniev").val(json.evento_data.horaini);
//                                                        $("#e_fecha_finev").val(json.evento_data.fechafin);
                                                        $("#e_hora_finev").val(json.evento_data.horafin);
                                                        $("#e_descripcion_ev").val(json.evento_data.observaciones);

                                                        objNewDate.fechaIni = json.evento_data.fechaini;
                                                        objNewDate.fechaFin = json.evento_data.fechafin;
                                                        objNewDate.horaIni = json.evento_data.horaini;
                                                        objNewDate.horaFin = json.evento_data.horafin;
                                                        objNewDate.allDay = calEvent;
                                                        objNewDate.start = calEvent.start;
                                                        objNewDate.end = calEvent.end;

                                                        $("#loader-editevento-data").slideUp(250);
                                                        $("#form-editevento-data").slideDown(250);

                                                    },
                                                    error: function (a, b, c) {
                                                        alert('No trajo datos' + c);
                                                        //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo", "top-right", "error", false);
                                                        $("#modal-editevento-data").modal('hide');
                                                    }
                                                });
                                            }
                                        });
                                    }
                                    function addevent() {
//                                    alert('funciono');
                                        $.ajax({
                                            url: base_url() + "app/eventos/create_cita/"+iddelainstitucion,
                                            type: "post",
                                            dataType: "json",
                                            data: $("#form-addevento-data").serialize(),
                                            success: function (json) {
//                        _toastr("Evento agregado correctamenete","top-right","success",false);

                                                $('#calendar').fullCalendar('renderEvent', {
                                                    id: json.evento_id,
                                                    title: $("#idanalista").val(),
                                                    start: objNewDate.start,
                                                    end: (objNewDate.allDay) ? null : objNewDate.end,
                                                    allDay: objNewDate.allDay,
                                                    description: $("#observaciones").val(),
                                                    className: ["bg-warning-2"],
                                                    icon: 'fa-clock-o'
                                                }, true);
                                            },
                                            error: function (a, b, c) {
                                                alert("No Agregado " + c);
                                                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
                                            },
                                            complete: function () {
                                                $("#form-addevento-data").find('#form-addevento-data-btn-sbmt').removeAttr('disabled').find('.fa-refresh').removeClass('fa-refresh').removeClass('fa-spin').addClass('fa-save');
                                                $("#form-addevento-data-btn-cancel").show(0);
                                                $("#form-addevento-data input, #form-addevento-data textarea").val('');
//                    $("#modal-addevento-data").modal('hide');
                                            }
                                        });
                                    }
                                    
                                    function addeventA() {
                                    //alert('funciono para aspirante');
                                        $.ajax({
                                            url: base_url() + "app/eventos/create_cita_aspirante/"+iddelainstitucion,
                                            type: "post",
                                            dataType: "json",
                                            data: $("#form-addevento-data").serialize(),
                                            success: function (json) {
//                        _toastr("Evento agregado correctamenete","top-right","success",false);

                                                $('#calendar').fullCalendar('renderEvent', {
                                                    id: json.evento_id,
                                                    title: 'Pendiente',
                                                    start: objNewDate.start,
                                                    end: (objNewDate.allDay) ? null : objNewDate.end,
                                                    allDay: objNewDate.allDay,
                                                    description: '',
                                                    className: ["bg-primary"],
                                                    icon: 'fa-clock-o'
                                                }, true);
                                                     swal({
                                                            title: "Cita solicitada exitosamente",
                                                            text: "Espere la confirmación de su cita",
                                                            type: "success"
                                                        },
                                                                function () {
                                                                    location.href = base_url() +"app/inicio";
                                                                });
                                            },
                                            error: function (a, b, c) {
                                                alert("No Agregado " + c);
                                                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
                                            },
                                            complete: function () {
                                                $("#form-addevento-data").find('#form-addevento-data-btn-sbmt').removeAttr('disabled').find('.fa-refresh').removeClass('fa-refresh').removeClass('fa-spin').addClass('fa-save');
                                                $("#form-addevento-data-btn-cancel").show(0);
                                                $("#form-addevento-data input, #form-addevento-data textarea").val('');
//                    $("#modal-addevento-data").modal('hide');
                                            }
                                        });
                                    }

                                    function editevent() {
                                        $.ajax({
                                            url: base_url() + "app/eventos/update_cita",
                                            type: "post",
                                            dataType: "json",
//                                            dataType: "text",
                                            data: $("#form-editevento-data").serialize(),
                                            success: function (json) {
                                                //_toastr("Evento actualizado correctamenete","top-right","success",false);
//                 
                                                evento.start = $("#e_fecha_iniev").val() + " " + $("#e_hora_iniev").val();
                                                evento.end = $("#e_fecha_iniev").val() + " " + $("#e_hora_finev").val();
                                                evento.className = ["bg-warning-2"];
                                                $('#calendar').fullCalendar('updateEvent', evento);

                                            },
                                            error: function (a, b, c) {
                                                alert('No edito ' + c);
                                                //_toastr("ERROR<br />ocurrió un error, por favor vuelva a intentarlo","top-right","error",false);
                                            },
                                            complete: function () {
                                                $("#form-editevento-data").find('#form-editevento-data-btn-sbmt').removeAttr('disabled').find('.fa-refresh').removeClass('fa-refresh').removeClass('fa-spin').addClass('fa-save');
                                                $("#form-editevento-data-btn-cancel").show(0);
                                                $("#form-editevento-data-btn-delete").hide(0);
                                                $("#form-addevento-data input, #form-addevento-data textarea").val('');
                                                //$("#modal-editevento-data").modal('hide');
                                            }
                                        });
                                    }

</script>
