<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestion_materias
 *
 * @author CIDTAI-UTEQ
 */
class gestion_instituciones extends CI_Controller {

    /**
     * Constructor de la clase
     * 
     * Invoca al constrcutor del padre
     * 
     * @since    1.0
     * @version  1.0
     * @internal Se invoca unicamente partir del instanciamiento de la clase
     * @author   CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return   void 
     */
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');
        }
        $this->load->model('login_model');
        $this->load->model('materias_model');
        $this->load->model('checklist_model');
        $this->load->model('observacion_model');
        $this->load->model('notificacion_model');
        $this->load->model('propietario_model');
        $this->load->model('representante_model');
        $this->load->model('oirnotificacion_model');
        $this->load->model('persona_moral_model');
        $this->load->model('documentoxnivel_model');
    }
    
    
    public function index() {

        /**
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();



        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        $a = $data['valor']->rol;
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        if ($a != 2) {
            $data['usuarios'] = $this->materias_model->consultar_instituciones();
        } else {
            $data['usuarios'] = $this->materias_model->consultar_institucion_analista($id);
        }



        $data['titulo'] = app_title() . " | Instituciones";


        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = FALSE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la refeencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Consultar instituciones";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Consultar instituciones');

        /**
         * el indice app_right_sidebar indica
         * la vista o fragmento en cuestion cuenta con 
         * menu lateral derecho o no (en caso de no contar desaparecerá el menu 'news')
         * delhgeader
         */
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);

        /**
         * Invoca al fragmento correspondiente al encabezado del sitio       
         */
        $data['app_header'] = $this->load->view('app/private/fragments/main_header', $data, TRUE);


        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_instituciones_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función que permite acceder al panel administrativo de los tramites de las instituciones
     * 
     * Incluye la vista para la seccion de gestión de instituciones.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_institucion_analista/gestion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function instituciones() {

        /**
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();



        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        $a = $data['valor']->rol;
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        if ($a != 2) {
            $data['usuarios'] = $this->materias_model->consultar_instituciones();
        } else {
            $data['usuarios'] = $this->materias_model->consultar_institucion_analista($id);
        }



        $data['titulo'] = app_title() . " | Institución";


        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = FALSE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la refeencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Gestión de materias";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Trámites de acuerdo', '#'), 'Instituciones');

        /**
         * el indice app_right_sidebar indica
         * la vista o fragmento en cuestion cuenta con 
         * menu lateral derecho o no (en caso de no contar desaparecerá el menu 'news')
         * delhgeader
         */
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);

        /**
         * Invoca al fragmento correspondiente al encabezado del sitio       
         */
        $data['app_header'] = $this->load->view('app/private/fragments/main_header', $data, TRUE);


        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_materias_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function detalle_institucion($idusu, $idins) {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        //Validar las notificaciones por usuario
        $a = $data['valor']->rol;
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        $data['institucion'] = $this->institucion_model->consultar_institucion_incorporacion($idusu, $idins);
        $data['bitacoras'] = $this->bitacora_model->consultar_bitacoras($idins);
        $data['modals'] = array();
        $data['modals'][] = $this->load->view('app/private/fragments/modules/Modulo1/analista/nuevabitacora_modal', $data, TRUE);

        $data['datos_prop'] = $this->propietario_model->consulta_datos_propietario($idins);
        $data['datos_repre'] = $this->representante_model->consultar_datos_representante($idins);
        $data['datos_notificacion'] = $this->oirnotificacion_model->consultar_oirnotificacion($idins);
        $data['datos_persona_moral'] = $this->persona_moral_model->consultar_personamoral($idins);

        $data['otro'] = $idins;
        $data['otro2'] = $idusu;
        $data['scripts'] = array();
        $data['scripts'][] = 'form_analista_institucion';
        $data['scripts'][] = 'aceptarInfoSolicitudIncorporacion';
        $data['scripts'][] = 'cancelarInfoSolicitudIncorporacion';
        $data['scripts'][] = 'aceptarDocSolicitudIncorporacion';
        $data['scripts'][] = 'cancelarDocSolicitudIncorporacion';
        $data['scripts'][] = 'acreditarIncorporacion';
        $data['scripts'][] = 'cancelarIncorporacion';
        $data['scripts'][] = 'suspenderSolicitudIncorporacion';
        $data['scripts'][] = 'habilitarIncorporacion';
        $data['titulo'] = app_title() . " | Institución";

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = FALSE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la refeencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Detalle de institución";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Trámites de acuerdo', '#'), array('Instituciones', base_url() . 'analista/gestion_institucion/gestion_instituciones'), 'Detalles de institución');

        /**
         * el indice app_right_sidebar indica
         * la vista o fragmento en cuestion cuenta con 
         * menu lateral derecho o no (en caso de no contar desaparecerá el menu 'news')
         * delhgeader
         */
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);

        /**
         * Invoca al fragmento correspondiente al encabezado del sitio		 
         */
        $data['app_header'] = $this->load->view('app/private/fragments/main_header', $data, TRUE);

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/registro_institucion_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function enviar_checklist() {

        $idfolio = $this->input->post('id_folio');
        $iddocumento = $this->input->post('id_documento');
        //$iddocumento = (int) $id_docum;
        $idusuarioenv = $this->session->userdata('idusu');
        $idusuariorec = $this->input->post('id_usu_rec');

        $this->checklist_model->editar_checklist($idusuarioenv, $idusuariorec, $idfolio, $iddocumento);

        echo 'OK';

        //redirect(base_url() . "analista/gestion_institucion/getion_instituciones", 'refresh');
    }

    public function aceptar_documentos() {
        $folio = $this->input->post('folio');
        $tipoProceso = $this->input->post('tipoProceso');

        $result = $this->documentoxnivel_model->aceptar_documentos($folio, $tipoProceso);

        if ($result > 0) {
            //aun no se aceptaron todos los documentos
            echo '1';
        } else {
            //ya se aceptan todos los documentos
            echo '0';

//            $data['usudestino'] = $this->notificacion_model->consultar_usuario($this->session->userdata('idusu'));
//            foreach ($data['usudestino'] as $algo) {
//                $idusudestino = $algo->idusuario;
//            }
//
//            $arr_notificacion = array(
//                "tipo" => 9,
//                "leido" => 0,
//                "idusuarioorigen" => $this->session->userdata('idusu'),
//                "idrol" => 3,
//                "idusuariodestino" => $idusudestino,
//                "fecha" => date('Y-m-d H:i:s')
//            );
//            $this->notificacion_model->crear_notificacion($arr_notificacion);
        }
    }

    public function buscar_checklist() {

        $id_folio = $this->input->post('id_folio');
        $id_docum = $this->input->post('id_documento');
        $id_usu_rec = $this->input->post('id_usu_rec');

        header('Content-Type: application/json');
        $data = array();
        $data = $this->checklist_model->consultar_checklist($id_folio, $id_docum, $id_usu_rec);
        echo json_encode($data, JSON_FORCE_OBJECT);
    }


    public function aceptar_informacion_solicitud_incorporacion($idins) {

        $this->institucion_model->aceptar_informacion_solicitud_incorporacion($idins);
        $idusuariodestino = $this->notificacion_model->consultar_usuario_asignacion($idins);
        $arr_notificacion = array(
            "tipo" => 5,
            "leido" => 0,
            "idusuarioorigen" => $this->session->userdata('idusu'),
            "idrol" => 3,
            "idusuariodestino" => $idusuariodestino->idusuario,
            "folio" => $idins,
            "fecha" => date('Y-m-d H:i:s')
        );
        $this->notificacion_model->crear_notificacion($arr_notificacion);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function eliminar_informacion_solicitud_incorporacion($idins) {

        $this->institucion_model->eliminar_informacion_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function recibir_documentacion_solicitud_incorporacion($idins) {

        $this->institucion_model->recibir_documentacion_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function aceptar_documentacion_solicitud_incorporacion($idins) {

        $this->institucion_model->aceptar_documentacion_solicitud_incorporacion($idins);
        $data['usudestino'] = $this->notificacion_model->consultar_usuario($idins);
        foreach ($data['usudestino'] as $algo) {
            $idusudestino = $algo->idusuario;
        }

        $arr_notificacion = array(
            "tipo" => 9,
            "leido" => 0,
            "idusuarioorigen" => $this->session->userdata('idusu'),
            "idrol" => 3,
            "idusuariodestino" => $idusudestino,
            "folio" => $idins,
            "fecha" => date('Y-m-d H:i:s')
        );
        $this->notificacion_model->crear_notificacion($arr_notificacion);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function eliminar_documentacion_solicitud_incorporacion($idins) {

        $this->institucion_model->eliminar_documentacion_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function acreditar_solicitud_incorporacion($idins) {

        $this->institucion_model->acreditar_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/gestion_acuerdos/nuevo_acuerdo/" . $idins, 'refresh');
    }

    public function eliminar_solicitud_incorporacion($idins) {

        $this->institucion_model->eliminar_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/registro_documento_no_acreditacion_institucion/registrar_documento/" . $idins, 'refresh');
    }

    public function suspender_solicitud_incorporacion($idins) {

        $estatussoli = $this->institucion_model->consultar_estatus_solicitud_incorporacion($idins);
        $this->institucion_model->insertar_estatus_anterior_incorporacion($estatussoli->estatussolicitud, $idins);
        $this->institucion_model->suspender_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function pendiente_solicitud_incorporacion($idins) {

        $this->institucion_model->pendiente_solicitud_incorporacion($idins);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }

    public function habilitar_solicitud_incorporacion($idins) {

        $estatusanterior = $this->institucion_model->consultar_estatus_anterior_incorporacion($idins);
        $this->institucion_model->habilitar_solicitud_incorporacion($estatusanterior->estatusanterior, $idins);
        redirect(base_url() . "analista/gestion_institucion/gestion_instituciones", 'refresh');
    }


}