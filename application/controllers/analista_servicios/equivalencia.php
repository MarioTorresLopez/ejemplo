<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equivalencia
 *
 * @author UTEQ
 */
class equivalencia extends CI_Controller {
    
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
        $this->load->model('notificacion_model');
        $this->load->model('filtrados_escolar_model');
        $this->load->model('tipo_evaluacion_model');
        $this->load->model('equivalencia_model');
    }
    
    public function index() {
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');

        $data = array();
        $data['titulo'] = app_title() . " | Equivalencia";
        $data['scripts'] = array();
        $data['scripts'][] = 'solicitud_equivalencia';

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Solicitud de equivalencia";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Lista de solicitudes', base_url() . 'analista_servicios/equivalencia_revalidacion'), 'Detalle solicitud');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\equivalencia\solicitud_de_equivalencia_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function solicitudes() {
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');

        $data = array();
        $data['titulo'] = app_title() . " | Solicitudes equivalencia";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitudes'] = $this->equivalencia_model->consultar_solicitudes();
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Solicitudes de dictamen técnico";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Listado de solicitudes');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\equivalencia\solicitudes_equivalencia_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function crear_solicitud() {
        $this->form_validation->set_rules('folio_sol', 'folio_sol', 'trim|xss_clean');
        $this->form_validation->set_rules('ap_eq', 'ap_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('am_eq', 'am_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('nom_eq', 'nom_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('nacionalidad', 'nacionalidad', 'trim|xss_clean');
        $this->form_validation->set_rules('curp_eq', 'curp_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('calle_num', 'calle_num', 'trim|xss_clean');
        $this->form_validation->set_rules('colonia_eq', 'colonia_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('del_mun', 'del_mun', 'trim|xss_clean');
        $this->form_validation->set_rules('ciudad_est', 'ciudad_est', 'trim|xss_clean');
        $this->form_validation->set_rules('cp_eq', 'cp_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('tel_eq', 'tel_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('correo_eq', 'correo_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('nivel_procedencia', 'nivel_procedencia', 'trim|xss_clean');
        $this->form_validation->set_rules('inst_proc', 'inst_proc', 'trim|xss_clean');
        $this->form_validation->set_rules('ciu_est_inst_ant', 'ciu_est_inst_ant', 'trim|xss_clean');
        $this->form_validation->set_rules('nivel_nuevo', 'nivel_nuevo', 'trim|xss_clean');
        $this->form_validation->set_rules('inst_nuevo', 'inst_nuevo', 'trim|xss_clean');
        $this->form_validation->set_rules('ciu_est_inst_nuevo', 'ciu_est_inst_nuevo', 'trim|xss_clean');
        $this->form_validation->set_rules('clv_plan', 'clv_plan', 'trim|xss_clean');
        $this->form_validation->set_rules('act_nac', 'act_nac', 'trim|xss_clean');
        $this->form_validation->set_rules('act_nat', 'act_nat', 'trim|xss_clean');
        $this->form_validation->set_rules('cald_mig', 'cald_mig', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_sec', 'certf_sec', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_post', 'certf_post', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_bach', 'certf_bach', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_tsu', 'certf_tsu', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_lic', 'certf_lic', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_esp', 'certf_esp', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_mst', 'certf_mst', 'trim|xss_clean');
        $this->form_validation->set_rules('carta_acep', 'carta_acep', 'trim|xss_clean');
        $this->form_validation->set_rules('carta_ren', 'carta_ren', 'trim|xss_clean');
        $this->form_validation->set_rules('comprobante', 'comprobante', 'trim|xss_clean');
        $this->form_validation->set_rules('otro', 'otro', 'trim|xss_clean');
        
        if ($this->form_validation->run()) {
            $arr_solicitud = array();
            $arr_solicitud['fecha'] = date("Y/m/d");
            $arr_solicitud['folio'] = $this->input->post('folio_sol');
            $arr_solicitud['nombre'] = $this->input->post('nom_eq');
            $arr_solicitud['ap1'] = $this->input->post('ap_eq');
            $arr_solicitud['ap2'] = $this->input->post('am_eq');
            $arr_solicitud['nacionalidad'] = $this->input->post('nacionalidad');
            $arr_solicitud['curp'] = $this->input->post('curp_eq');
            $arr_solicitud['callenumero'] = $this->input->post('calle_num');
            $arr_solicitud['colonia'] = $this->input->post('colonia_eq');
            $arr_solicitud['delegacionmunicipio'] = $this->input->post('del_mun');
            $arr_solicitud['ciudadestado'] = $this->input->post('ciudad_est');
            $arr_solicitud['cp'] = $this->input->post('cp_eq');
            $arr_solicitud['telefono'] = $this->input->post('tel_eq');
            $arr_solicitud['correo'] = $this->input->post('correo_eq');
            $arr_solicitud['nivelcursado'] = $this->input->post('nivel_procedencia');
            if($arr_solicitud['nivelcursado']!='BACHILLERATO GENERAL'){
                $arr_solicitud['especificacioncursado'] = $this->input->post('especificacion_ant');
            }
            else{
                
            }
            $arr_solicitud['instituciondeprocedencia'] = $this->input->post('inst_proc');
            $arr_solicitud['ciudadestadoinstproc'] = $this->input->post('ciu_est_inst_ant');
            $arr_solicitud['niveldestino'] = $this->input->post('nivel_nuevo');
            if($arr_solicitud['niveldestino']!='BACHILLERATO GENERAL'){
                $arr_solicitud['especificaciondestino'] = $this->input->post('especificacion_ant');
            }
            else{
                
            }
            $arr_solicitud['instituciondestino'] = $this->input->post('inst_nuevo');
            $arr_solicitud['ciudadestadoinstdestino'] = $this->input->post('ciu_est_inst_nuevo');
            $arr_solicitud['claveplan'] = $this->input->post('clv_plan');
            $arr_solicitud['actanaciemiento'] = $this->input->post('act_nac');
            $arr_solicitud['actanaturalizacion'] = $this->input->post('act_nat');
            $arr_solicitud['calidadmigratoria'] = $this->input->post('cald_mig');
            $arr_solicitud['certificadosecundaria'] = $this->input->post('certf_sec');
            $arr_solicitud['certificadotecpostsecundario'] = $this->input->post('certf_post');
            $arr_solicitud['certificadobachillerato'] = $this->input->post('certf_bach');
            $arr_solicitud['certificadotecsupuni'] = $this->input->post('certf_tsu');
            $arr_solicitud['certificadolicenciatura'] = $this->input->post('certf_lic');
            $arr_solicitud['certificadoespecialidad'] = $this->input->post('certf_esp');
            $arr_solicitud['certificadomaestria'] = $this->input->post('certf_mst');
            $arr_solicitud['cartaceptacionedunormal'] = $this->input->post('carta_acep');
            $arr_solicitud['cartarenunciasemestreasig'] = $this->input->post('carta_ren');
            $arr_solicitud['comprobantepagosderecho'] = $this->input->post('comprobante');
            $arr_solicitud['otro'] = $this->input->post('otro');
            $arr_solicitud['estatus'] = 1;
            
            $this->equivalencia_model->crear_solicitud($arr_solicitud);
            redirect(base_url() . 'analista_servicios/equivalencia/solicitudes', 'refresh');
        }
        else{
            echo validation_errors();
        }
    }
    
    public function detalle($idsolicitud) {
        $this->load->model('login_model');

        $data = array();
        $data['titulo'] = app_title() . " | Equivalencia";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitud'] = $this->equivalencia_model->consultar_solicitud($idsolicitud);
        
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Detalle de solicitud de equivalencia";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Listado de solicitudes', base_url() . 'analista_servicios/equivalencia/solicitudes'),'Detalle solicitud');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\equivalencia\detallesolicitud_equivalencia_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function editar_solicitud($idsolicitud) {
        $this->load->model('login_model');

        $data = array();
        $data['titulo'] = app_title() . " | Equivalencia";
        $data['scripts'] = array();
        $data['scripts'][] = 'solicitudeditar_equivalencia';
        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitud'] = $this->equivalencia_model->consultar_solicitud($idsolicitud);
        
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Editar solicitud de equivalencia";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Listado de solicitudes', base_url() . 'analista_servicios/equivalencia/solicitudes'),'Editar solicitud');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\equivalencia\editar_equivalencia_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function editar_solicitud_post() {
        //$this->form_validation->set_rules('folio_sol', 'folio_sol', 'trim|xss_clean');
        $this->form_validation->set_rules('ap_eq', 'ap_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('am_eq', 'am_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('nom_eq', 'nom_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('nacionalidad', 'nacionalidad', 'trim|xss_clean');
        $this->form_validation->set_rules('curp_eq', 'curp_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('calle_num', 'calle_num', 'trim|xss_clean');
        $this->form_validation->set_rules('colonia_eq', 'colonia_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('del_mun', 'del_mun', 'trim|xss_clean');
        $this->form_validation->set_rules('ciudad_est', 'ciudad_est', 'trim|xss_clean');
        $this->form_validation->set_rules('cp_eq', 'cp_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('tel_eq', 'tel_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('correo_eq', 'correo_eq', 'trim|xss_clean');
        $this->form_validation->set_rules('nivel_procedencia', 'nivel_procedencia', 'trim|xss_clean');
        $this->form_validation->set_rules('inst_proc', 'inst_proc', 'trim|xss_clean');
        $this->form_validation->set_rules('ciu_est_inst_ant', 'ciu_est_inst_ant', 'trim|xss_clean');
        $this->form_validation->set_rules('nivel_nuevo', 'nivel_nuevo', 'trim|xss_clean');
        $this->form_validation->set_rules('inst_nuevo', 'inst_nuevo', 'trim|xss_clean');
        $this->form_validation->set_rules('ciu_est_inst_nuevo', 'ciu_est_inst_nuevo', 'trim|xss_clean');
        $this->form_validation->set_rules('clv_plan', 'clv_plan', 'trim|xss_clean');
        $this->form_validation->set_rules('act_nac', 'act_nac', 'trim|xss_clean');
        $this->form_validation->set_rules('act_nat', 'act_nat', 'trim|xss_clean');
        $this->form_validation->set_rules('cald_mig', 'cald_mig', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_sec', 'certf_sec', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_post', 'certf_post', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_bach', 'certf_bach', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_tsu', 'certf_tsu', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_lic', 'certf_lic', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_esp', 'certf_esp', 'trim|xss_clean');
        $this->form_validation->set_rules('certf_mst', 'certf_mst', 'trim|xss_clean');
        $this->form_validation->set_rules('carta_acep', 'carta_acep', 'trim|xss_clean');
        $this->form_validation->set_rules('carta_ren', 'carta_ren', 'trim|xss_clean');
        $this->form_validation->set_rules('comprobante', 'comprobante', 'trim|xss_clean');
        $this->form_validation->set_rules('otro', 'otro', 'trim|xss_clean');
        
        if ($this->form_validation->run()) {
            $idsolicitud=$this->input->post('solicitud');
            $arr_solicitud = array();
            $arr_solicitud['nombre'] = $this->input->post('nom_eq');
            $arr_solicitud['ap1'] = $this->input->post('ap_eq');
            $arr_solicitud['ap2'] = $this->input->post('am_eq');
            $arr_solicitud['nacionalidad'] = $this->input->post('nacionalidad');
            $arr_solicitud['curp'] = $this->input->post('curp_eq');
            $arr_solicitud['callenumero'] = $this->input->post('calle_num');
            $arr_solicitud['colonia'] = $this->input->post('colonia_eq');
            $arr_solicitud['delegacionmunicipio'] = $this->input->post('del_mun');
            $arr_solicitud['ciudadestado'] = $this->input->post('ciudad_est');
            $arr_solicitud['cp'] = $this->input->post('cp_eq');
            $arr_solicitud['telefono'] = $this->input->post('tel_eq');
            $arr_solicitud['correo'] = $this->input->post('correo_eq');
            $arr_solicitud['nivelcursado'] = $this->input->post('nivel_procedencia');
            if($arr_solicitud['nivelcursado']!='BACHILLERATO GENERAL'){
                $arr_solicitud['especificacioncursado'] = $this->input->post('especificacion_ant');
            }
            else{
                
            }
            $arr_solicitud['instituciondeprocedencia'] = $this->input->post('inst_proc');
            $arr_solicitud['ciudadestadoinstproc'] = $this->input->post('ciu_est_inst_ant');
            $arr_solicitud['niveldestino'] = $this->input->post('nivel_nuevo');
            if($arr_solicitud['niveldestino']!='BACHILLERATO GENERAL'){
                $arr_solicitud['especificaciondestino'] = $this->input->post('especificacion_ant');
            }
            else{
                
            }
            $arr_solicitud['instituciondestino'] = $this->input->post('inst_nuevo');
            $arr_solicitud['ciudadestadoinstdestino'] = $this->input->post('ciu_est_inst_nuevo');
            $arr_solicitud['claveplan'] = $this->input->post('clv_plan');
            $arr_solicitud['actanaciemiento'] = $this->input->post('act_nac');
            $arr_solicitud['actanaturalizacion'] = $this->input->post('act_nat');
            $arr_solicitud['calidadmigratoria'] = $this->input->post('cald_mig');
            $arr_solicitud['certificadosecundaria'] = $this->input->post('certf_sec');
            $arr_solicitud['certificadotecpostsecundario'] = $this->input->post('certf_post');
            $arr_solicitud['certificadobachillerato'] = $this->input->post('certf_bach');
            $arr_solicitud['certificadotecsupuni'] = $this->input->post('certf_tsu');
            $arr_solicitud['certificadolicenciatura'] = $this->input->post('certf_lic');
            $arr_solicitud['certificadoespecialidad'] = $this->input->post('certf_esp');
            $arr_solicitud['certificadomaestria'] = $this->input->post('certf_mst');
            $arr_solicitud['cartaceptacionedunormal'] = $this->input->post('carta_acep');
            $arr_solicitud['cartarenunciasemestreasig'] = $this->input->post('carta_ren');
            $arr_solicitud['comprobantepagosderecho'] = $this->input->post('comprobante');
            $arr_solicitud['otro'] = $this->input->post('otro');
            $arr_solicitud['estatus'] = 1;
            
            $this->equivalencia_model->editar($idsolicitud,$arr_solicitud);
            redirect(base_url() . 'analista_servicios/equivalencia/solicitudes', 'refresh');
        }
        else{
            echo validation_errors();
        }
    }
    
    public function subir() {
        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Inicio";


        /*
         * arrays de js para las alertas
         */
        $data['scripts'] = array();
        $data['scripts'][] = 'eliminarInscripcion';
        $data['scripts'][] = 'aceptarInscripcionAnalista';
        $data['scripts'][] = 'subir_resolucion_equivalencia';


        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }


        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        $data['show_header'] = TRUE;

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
        $data['breadcrumbs']['titulo'] = "Subir resolución";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Inscripción', ''));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo3/subir_resolucion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function subir_post() {
        redirect(base_url() . 'analista_servicios/equivalencia/equiparacion', 'refresh');
    }
    
    public function equiparacion() {
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');

        $data = array();
        $data['titulo'] = app_title() . " | Tabla de equiparación";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Tabla de equiparación";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'),'Dictamen técnico','Solicitud');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\tabla_equiparacion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function imprimir_comprobante() {
        $data = array();
        $data['titulo'] = app_title() . " | Comprobante de trámite";
        
        
        $this->load->view("app/private/fragments/modules/Modulo3/imprimir_comprobante_tramite_view", $data, FALSE);
    }
}
