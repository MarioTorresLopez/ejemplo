<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

    private $usuario_id;
    private $rol_id;
    private $permiso_id;

    /**
     * [__construct description]
     */
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');
        }
        $this->load->model('evento_model');
        $this->load->model('institucion_model');
        $this->load->model('notificacion_model');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index() {
        $this->load->model('login_model');
        $this->load->model('evento_model');
        

        $query_eventos = "";

//        if($this->rol_id != 1) {
//            $query_eventos  =" AND usuarios.usuario_id = '".$this->usuario_id."'";
//        }
//
//        else {
//            if($this->input->get('filtro_id')) {
//                if($this->input->get('filtro_id') == 0) {
//                    $query_eventos = "";
//                }
//
//                else {
//                    $query_eventos  =" AND usuarios.usuario_id = '".$this->input->get('filtro_id')."'";
//                }
//
//            }
//        }

        $data = array();
       //SI VIENE UN ID DE INST
        //$data['inserta_cita'] = (!is_null($idinsti)) ? TRUE  : FALSE;
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        $a = $data['valor']->rol;
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['styles'] = array();
        $data['modals'] = array();
        $data['modals'][] = $this->load->view('app/private/fragments/modules/Citas/nuevoevento_modal', $data, TRUE);
        $data['modals'][] = $this->load->view('app/private/fragments/modules/Citas/editarevento_modal', $data, TRUE);
        $data['modals'][] = $this->load->view('app/private/fragments/modules/Citas/nuevoevento_aspirante_modal', $data, TRUE);
        //$data['styles'][]                            = '../plugins/fullcalendar/fullcalendar';
        $data['styles'][] = "../static/styles/fullcalendar";
//        if ($a  !=3 ) {
//            $data['eventos'] = $this->evento_model->get_citas_all();
//        } else {
//            $data['eventos'] = $this->evento_model->get_citas();
//        }
        
        if($a !=2){
            $data['eventos'] = $this->evento_model->get_citas_all();
        }
        else{
            $data['eventos'] = $this->evento_model->get_citas_analista($this->session->userdata('idusu'));
        }
       
        
        //$data['eventos']                             = $this->evento_model->get_eventos($query_eventos);
//        $data['filtro_usuarios_wadmin']              = $this->evento_model->get_event_users(" AND usuarios.rol_id = 1", $this->usuario_id);
//        $data['filtro_usuarios_iadmin']              = $this->evento_model->get_event_users(" AND usuarios.rol_id = 2", $this->usuario_id);
//        $data['filtro_usuarios_agente']              = $this->evento_model->get_event_users(" AND usuarios.rol_id = 3", $this->usuario_id);
        //$data['eventos']                             = null;
        $data['filtro_usuarios_wadmin'] = null;
        $data['filtro_usuarios_iadmin'] = null;
        $data['filtro_usuarios_agente'] = null;
//        $data['app_page_header_data']                = array();
//        $data['app_page_header_data']['titulo']      = "<i class='fa fa-calendar'></i> Eventos";
//        $data['app_page_header_data']['breadcrumbs'] = array(array('Inicio', "app/inicio"), array('Eventos', NULL), 'Calendario');
//        $data['user_menu']                           = get_user_menu((int) $this->session->userdata('rol_id'), 1);

        $data['titulo'] = app_title() . " | Citas";
        $data['breadcrumbs'] = array();
        $data['breadcrumbs']['titulo'] = "Citas";
        $data['breadcrumbs']['subtitulo'] = "";
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión de citas', ''));
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);
        $data['app_header'] = $this->load->view('app/private/fragments/main_header', $data, TRUE);

        

        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);
        
//        if($a ==12){
//            $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Citas/calendario_fragment', $data, TRUE);
//        }
//        else{
//            $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Citas/calendario_fragment2', $data, TRUE);
//        }
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Citas/calendario_fragment', $data, TRUE);
        

        //$data['app_fragment'] = $this->load->view('app/private/fragments/modules/Citas/calendario_fragment', $data, TRUE);

        $this->load->view('app/private/main_view.php', $data, FALSE);
//        echo $a;

//        $data['app_title']                           = app_title() . " | Eventos - Calendario";
//        $data['app_loader']                          = $this->load->view('libs/main_loader', $data, TRUE);
//        $data['app_header']                          = $this->load->view('app/private/fragments/headers/main_header', $data, TRUE);
//        $data['app_nav']                             = $this->load->view('app/private/fragments/navs/main_nav', $data, TRUE);
//        $data['app_fragment']                        = $this->load->view('app/private/fragments/modules/eventos/calendario_fragment', $data, TRUE);
//        $this->load->view('app/private/main_view', $data, FALSE);
    }

    public function instituciones() {
        $analistas = $this->institucion_model->consultar_institucion_analista($this->session->userdata('idusu'));
        foreach ($analistas as $analista) {
            ?>
            <option value="<?= $analista->idinsti ?>" data-id="<?= $analista->idinsti ?>"><?= $analista->folio ?></option>
            <?php
        }
    }
    
    public function instituciones_editar($actual) {
        $verificar=$this->evento_model->get_cita_editar($actual);
        $analistas = $this->institucion_model->consultar_institucion_analista($this->session->userdata('idusu'));
        foreach ($analistas as $analista) {
            ?>
            <option value="<?= $analista->idinsti ?>" data-id="<?= $analista->idinsti ?>" <?php if($verificar->idsolicitud==$analista->idinsti):?> selected="selected" <?php endif;?> ><?= $analista->folio ?></option>
            <?php
        }
    }

    public function create_cita() {
        $data=array();
        $this->load->model('evento_model');
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('fechaini', 'fechaini', 'trim|required|xss_clean');
            $this->form_validation->set_rules('horaini', 'horaini', 'trim|required|xss_clean');
            $this->form_validation->set_rules('horafin', 'horafin', 'trim|xss_clean');
            $this->form_validation->set_rules('idanalista', 'idanalista', 'trim|xss_clean');
            $this->form_validation->set_rules('observaciones', 'observaciones', 'trim|xss_clean');

            if ($this->form_validation->run()) {
                $fechaini = $this->input->post('fechaini');
                $horaini = $this->input->post('horaini');
                $horafin = $this->input->post('horafin');
                $idanalista = $this->input->post('idanalista');
                $observaciones = $this->input->post('observaciones');

                //if($this->session->userdata('estatus_id') == 3) {
                //$this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');
                //if (!is_null($this->permiso_id)) {
                $arr_insert = array(
                    "idtipotramite" => 1,
                    "idusuario" => $this->session->userdata('idusu'),
                    "idanalista" => $this->session->userdata('idusu'),
                    "idestatuscita" => 1,
                    "observaciones" => $observaciones,
                    "idsolicitud" => $idanalista,
                    "fechaini" => $fechaini,
                    "fechafin" => $fechaini,
                    "horaini" => $horaini,
                    "horafin" => $horafin,
                    "fechacreacion" => date('Y-m-d H:i:s')
                );
                
                $data['usudestino']=$this->notificacion_model->consultar_usuario($idanalista);
                foreach($data['usudestino'] as $algo){
                    $idusudestino=$algo->idusuario;
                }
                
                $nom=$this->notificacion_model->nombre_analista($this->session->userdata('idusu'));
                
                $arr_notificacion = array(
                    "tipo" => 8,
                    "leido" => 0,
                    "idusuarioorigen" => $this->session->userdata('idusu'),
                    "idrol" => 3,
                    "idusuariodestino" => $idusudestino,
                    "folio" => $idanalista,
                    "fecha" => date('Y-m-d H:i:s'),
                    "nomanalista" => $nom->nomusuario
//                    "nomanalista" => "MARIO"
                );

                $evento_id = $this->evento_model->crear_cita($arr_insert);
                $this->notificacion_model->crear_notificacion($arr_notificacion);
//                $this->evento_model->crear_cita($arr_insert);
//                $evento_id = $this->evento_model->get_id();
//                json_header();

                echo json_encode(array("response_code" => 200, "evento_id" => $evento_id));
//                echo  json_encode(array("evento_id" => $evento_id));
//                echo $evento_id;
                //}
//                    else {
//                        http_error(405);
//                    }
                //}
//                else {
//                    http_error(401);
//                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    public function create_cita_aspirante($idinstitucion) {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('fechaini', 'fechaini', 'trim|required|xss_clean');
            $this->form_validation->set_rules('horaini', 'horaini', 'trim|required|xss_clean');
            $this->form_validation->set_rules('horafin', 'horafin', 'trim|xss_clean');
            $this->form_validation->set_rules('idinstitucion', 'idinstitucion', 'trim|xss_clean');

            if ($this->form_validation->run()) {
                $fechaini = $this->input->post('fechaini');
                $horaini = $this->input->post('horaini');
                $horafin = $this->input->post('horafin');
                //$idinstitucion = $this->input->post('idinstitucion');

                //if($this->session->userdata('estatus_id') == 3) {
                //$this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');
                //if (!is_null($this->permiso_id)) {
                $arr_insert = array(
                    "idtipotramite" => 1,
                    "idusuario" => $this->session->userdata('idusu'),
                    "idestatuscita" => 1,
                    "idsolicitud" => $idinstitucion,
                    "fechaini" => $fechaini,
                    "fechafin" => $fechaini,
                    "horaini" => $horaini,
                    "horafin" => $horafin,
                    "fechacreacion" => date('Y-m-d H:i:s')
                );

                $evento_id = $this->evento_model->crear_cita_aspirante($arr_insert);

//                json_header();

                echo json_encode(array("response_code" => 200, "evento_id" => $evento_id));

                //}
//                    else {
//                        http_error(405);
//                    }
                //}
//                else {
//                    http_error(401);
//                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    public function get_cita() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                $evento_id = $this->input->post('evento_id');

                //if($this->session->userdata('estatus_id') == 3) {
                //$this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');
                //if (!is_null($this->permiso_id)) {
                $evento_data = $this->evento_model->get_cita($evento_id);
                //json_header();

                echo json_encode(array("response_code" => 200, "evento_data" => $evento_data));

                //}
//                    else {
//                        http_error(405);
//                    }
                //}
//                else {
//                    http_error(401);
//                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    public function update_cita() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_fecha_iniev', 'e_fecha_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_hora_iniev', 'e_hora_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_hora_finev', 'e_hora_finev', 'trim|xss_clean');
            $this->form_validation->set_rules('e_idanalista', 'e_idanalista', 'trim|xss_clean');
            $this->form_validation->set_rules('e_descripcion_ev', 'e_descripcion_ev', 'trim|xss_clean');

            if ($this->form_validation->run()) {
                $evento_id = $this->input->post('evento_id');
                $fecha_iniev = $this->input->post('e_fecha_iniev');
                $hora_iniev = $this->input->post('e_hora_iniev');
                $hora_finev = $this->input->post('e_hora_finev');
                $titulo_ev = $this->input->post('e_idanalista');
                $descripcion_ev = $this->input->post('e_descripcion_ev');

//                if ($this->session->userdata('estatus_id') == 3) {
//
//                    $this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');
//
//                    if (!is_null($this->permiso_id)) {
                $arr_update = array(
                    //"idanalista" => $titulo_ev,
                    "fechaini" => $fecha_iniev,
                    "horaini" => $hora_iniev,
                    "fechafin" => $fecha_iniev,
                    "horafin" => $hora_finev,
                    "idsolicitud" => $$titulo_ev,
                    "observaciones" => $descripcion_ev
                );

                $this->evento_model->update_cita($evento_id, $arr_update);

                //json_header();

                echo json_encode(array("response_code" => 200, "evento_id" => (int) $evento_id));
//                    } else {
//                        http_error(405);
//                    }
//                } else {
//                    http_error(401);
//                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    /**
     * [create_evento description]
     * @return [type] [description]
     */
    public function create_evento() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('fecha_iniev', 'fecha_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('hora_iniev', 'hora_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('hora_finev', 'hora_finev', 'trim|xss_clean');
            $this->form_validation->set_rules('titulo_ev', 'titulo_ev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('descripcion_ev', 'descripcion_ev', 'trim|xss_clean');

            if ($this->form_validation->run()) {
                $fecha_iniev = $this->input->post('fecha_iniev');
                $hora_iniev = $this->input->post('hora_iniev');
                $hora_finev = $this->input->post('hora_finev');
                $titulo_ev = $this->input->post('titulo_ev');
                $descripcion_ev = $this->input->post('descripcion_ev');

                if ($this->session->userdata('estatus_id') == 3) {

                    $this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');

                    if (!is_null($this->permiso_id)) {
                        $arr_insert = array(
                            "usuario_id" => $this->usuario_id,
                            "estatus_id" => 3,
                            "titulo_ev" => $titulo_ev,
                            "fecha_iniev" => $fecha_iniev,
                            "hora_iniev" => $hora_iniev,
                            "fecha_finev" => $fecha_iniev,
                            "hora_finev" => $hora_finev,
                            "descripcion_ev" => $descripcion_ev,
                            "fecha_creacion" => date('Y-m-d H:i:s'),
                            "usuario_id_umod" => $this->usuario_id,
                            "fecha_umod" => date('Y-m-d H:i:s')
                        );

                        $evento_id = $this->evento_model->create_evento($arr_insert);

                        json_header();

                        echo json_encode(array("response_code" => 200, "evento_id" => $evento_id));
                    } else {
                        http_error(405);
                    }
                } else {
                    http_error(401);
                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    /**
     * [get_evento description]
     * @return [type] [description]
     */
    public function get_evento() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                $evento_id = $this->input->post('evento_id');

                if ($this->session->userdata('estatus_id') == 3) {

                    $this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');

                    if (!is_null($this->permiso_id)) {
                        $evento_data = $this->evento_model->get_evento($evento_id);
                        json_header();

                        echo json_encode(array("response_code" => 200, "evento_data" => $evento_data));
                    } else {
                        http_error(405);
                    }
                } else {
                    http_error(401);
                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    /**
     * [update_evento description]
     * @return [type] [description]
     */
    public function update_evento() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_fecha_iniev', 'e_fecha_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_hora_iniev', 'e_hora_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_hora_finev', 'e_hora_finev', 'trim|xss_clean');
            $this->form_validation->set_rules('e_titulo_ev', 'e_titulo_ev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('e_descripcion_ev', 'e_descripcion_ev', 'trim|xss_clean');

            if ($this->form_validation->run()) {
                $evento_id = $this->input->post('evento_id');
                $fecha_iniev = $this->input->post('e_fecha_iniev');
                $hora_iniev = $this->input->post('e_hora_iniev');
                $hora_finev = $this->input->post('e_hora_finev');
                $titulo_ev = $this->input->post('e_titulo_ev');
                $descripcion_ev = $this->input->post('e_descripcion_ev');

                if ($this->session->userdata('estatus_id') == 3) {

                    $this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');

                    if (!is_null($this->permiso_id)) {
                        $arr_update = array(
                            "estatus_id" => 3,
                            "titulo_ev" => $titulo_ev,
                            "fecha_iniev" => $fecha_iniev,
                            "hora_iniev" => $hora_iniev,
                            "fecha_finev" => $fecha_iniev,
                            "hora_finev" => $hora_finev,
                            "descripcion_ev" => $descripcion_ev,
                            "usuario_id_umod" => $this->usuario_id,
                            "fecha_umod" => date('Y-m-d H:i:s')
                        );

                        $this->evento_model->update_evento($evento_id, $arr_update);

                        json_header();

                        echo json_encode(array("response_code" => 200, "evento_id" => (int) $evento_id));
                    } else {
                        http_error(405);
                    }
                } else {
                    http_error(401);
                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    /**
     * [update_evento description]
     * @return [type] [description]
     */
    public function move_evento() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|xss_clean');
            $this->form_validation->set_rules('fechaini', 'e_fecha_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('horaini', 'e_hora_iniev', 'trim|required|xss_clean');
            $this->form_validation->set_rules('horafin', 'e_hora_finev', 'trim|xss_clean');

            if ($this->form_validation->run()) {
                $evento_id = $this->input->post('evento_id');
                $fecha_iniev = $this->input->post('fechaini');
                $hora_iniev = $this->input->post('horaini');
                $hora_finev = $this->input->post('horafin');

//                if ($this->session->userdata('estatus_id') == 3) {
//
//                    $this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');
//
//                    if (!is_null($this->permiso_id)) {
                $arr_update = array(
                    "idtipotramite" => 1,
                    "fechaini" => $fecha_iniev,
                    "horaini" => $hora_iniev,
                    "fechafin" => $fecha_iniev,
                    "horafin" => $hora_finev
                );

                $this->evento_model->update_cita($evento_id, $arr_update);

//                        json_header();

                echo json_encode(array("response_code" => 200, "evento_id" => (int) $evento_id));
//                    } else {
//                        http_error(405);
//                    }
//                } else {
//                    http_error(401);
//                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }

    /**
     * [delete_evento description]
     * @return [type] [description]
     */
    public function delete_evento() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|xss_clean');
            if ($this->form_validation->run()) {
                $evento_id = $this->input->post('evento_id');
                if ($this->session->userdata('estatus_id') == 3) {
                    $this->permiso_id = get_rol_access($this->rol_id, 16, 'modulo');
                    if (!is_null($this->permiso_id)) {
                        $this->evento_model->delete_evento($evento_id);
                        json_header();
                        echo json_encode(array("response_code" => 200, "evento_id" => (int) $evento_id));
                    } else {
                        http_error(405);
                    }
                } else {
                    http_error(401);
                }
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }
    
    public function solicitar_cita($idinsti,$folio) {
        $cons=$this->notificacion_model->institucion_analista($idinsti);
        $idusuariodestino=$cons->idanalista;
        $arr_notificacion = array(
            "tipo" => 4,
            "leido" => 0,
            "idusuarioorigen" => $this->session->userdata('idusu'),
            "idrol" => 2,
            "idusuariodestino" => $idusuariodestino,
            "folio" => $folio,
            "fecha" => date('Y-m-d H:i:s')
        );
        $this->notificacion_model->crear_notificacion($arr_notificacion);
        
        redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
    }

}

/* End of file eventos.php */
/* Location: ./application/controllers/app/eventos.php */
