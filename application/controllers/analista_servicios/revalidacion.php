<?php

/**
 * Controlador para la vista de solicitud de revalidación 
 *
 * Clase que visualiza la vista para el llenado de datos
 * para solicitar una revalidación.
 * 
 * @since 1.0
 * @version 1.0
 * @link   /
 * @global constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package application.controllers
 * @subpackage NA 
 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses ./application/config/autoload.php ???
 * @see ./system/core/Controller.php  
 */
class revalidacion extends CI_Controller {

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
        $this->load->model('notificacion_model');
        $this->load->model('revalidacion_model');
    }

    public function index() {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Solicitud de revalidación";

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

        $data['scripts'] = array();
        $data['scripts'][] = 'validarRevalidacion';

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
        $data['breadcrumbs']['titulo'] = "Solicitud de revalidación";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion\solicitud_revalidacion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function revalidacion_extranjero() {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Solicitud de revalidación";

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

        $data['scripts'] = array();
        $data['scripts'][] = 'validarRevalidacionExtranjero';

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
        $data['breadcrumbs']['titulo'] = "Solicitud de revalidación de estudios de High School";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion_extranjero\solicitud_revalidacion_extranjero_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function agregar_revalidacion() {

        $this->form_validation->set_rules('apellido1_sol', 'apellido1_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido2_sol', 'apellido2_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombres_sol', 'nombres_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_sol', 'calle_num_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_sol', 'colonia_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegacion_sol', 'delegacion_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_sol', 'ciudad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_sol', 'estado_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_sol', 'cp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_sol', 'telefono_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nacionalidad_sol', 'nacionalidad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('entidad_nac_sol', 'entidad_nac_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_nac_sol', 'fecha_nac_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('se_sol', 'se_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('curp_sol', 'curp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_sol', 'nombre_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pais_sol', 'pais_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_sol', 'calle_num_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_sol', 'colonia_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_ins_sol', 'delegcion_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_sol', 'ciudad_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_sol', 'estado_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_sol', 'cp_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_sol', 'telefono_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel_ins_sol', 'nivel_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('carrera_ins_sol', 'carrera_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('clave_ins_sol', 'clave_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('semestre_ins_sol', 'semestre_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_ins_sol', 'area_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('de_fecha_sol', 'de_fecha_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('a_fecha_sol', 'a_fecha_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_equi_sol', 'nombre_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_mun_ins_equi_sol', 'ciudad_mun_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_equi_sol', 'calle_num_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_equi_sol', 'colonia_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_ins_equi_sol', 'delegcion_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_equi_sol', 'ciudad_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_equi_sol', 'estado_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_equi_sol', 'cp_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_equi_sol', 'telefono_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel_ins_equi_sol', 'nivel_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('carrera_ins_equi_sol', 'carrera_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pe_ins_equi_sol', 'pe_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('semestre_ins_equi_sol', 'semestre_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_esp_ins_equi_sol', 'area_esp_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_ing_ins_equi_sol', 'fecha_ing_ins_equi_sol', 'trim|required|xss_clean');

        
        
        //Si pasamos la validación
        if ($this->form_validation->run()) {
            
            $arr_revalidacion = array();
            $arr_revalidacion['fecha'] = $this->input->post('fecha_sol');
            $arr_revalidacion['folio'] = $this->input->post('folio_sol');
            $arr_revalidacion['ape1'] = $this->input->post('apellido1_sol');
            $arr_revalidacion['ape2'] = $this->input->post('apellido2_sol');
            $arr_revalidacion['nombre'] = $this->input->post('nombres_sol');
            $arr_revalidacion['callenum'] = $this->input->post('calle_num_sol');
            $arr_revalidacion['colonia'] = $this->input->post('colonia_sol');
            $arr_revalidacion['delegacion'] = $this->input->post('delegcion_sol');
            $arr_revalidacion['ciudad'] = $this->input->post('ciudad_sol');
            $arr_revalidacion['estado'] = $this->input->post('estado_sol');
            $arr_revalidacion['codigopostal'] = $this->input->post('cp_sol');
            $arr_revalidacion['telefono'] = $this->input->post('telefono_sol');
            $arr_revalidacion['nacionalidad'] = $this->input->post('nacionalidad_sol');
            $arr_revalidacion['entidadnac'] = $this->input->post('entidad_nac_sol');
            $arr_revalidacion['fechanacimiento'] = $this->input->post('fecha_nac_sol');
            $arr_revalidacion['genero'] = $this->input->post('se_sol');
            $arr_revalidacion['curp'] = $this->input->post('curp_sol');
            $arr_revalidacion['nombreins'] = $this->input->post('nombre_ins_sol');
            $arr_revalidacion['paisins'] = $this->input->post('pais_sol');
            $arr_revalidacion['callenumins'] = $this->input->post('calle_num_ins_sol');
            $arr_revalidacion['coloniains'] = $this->input->post('colonia_ins_sol');
            $arr_revalidacion['delegacionins'] = $this->input->post('delegcion_ins_sol');
            $arr_revalidacion['ciudadins'] = $this->input->post('ciudad_ins_sol');
            $arr_revalidacion['estadoins'] = $this->input->post('estado_ins_sol');
            $arr_revalidacion['codigopostalins'] = $this->input->post('cp_ins_sol');
            $arr_revalidacion['telefonoins'] = $this->input->post('telefono_ins_sol');
            $arr_revalidacion['nivelins'] = $this->input->post('nivel_ins_sol');
            $arr_revalidacion['carrerains'] = $this->input->post('carrera_ins_sol');
            $arr_revalidacion['claveins'] = $this->input->post('clave_ins_sol');
            $arr_revalidacion['semestreins'] = $this->input->post('semestre_ins_sol');
            $arr_revalidacion['areains'] = $this->input->post('area_ins_sol');
            $arr_revalidacion['defechains'] = $this->input->post('de_fecha_sol');
            $arr_revalidacion['afechains'] = $this->input->post('a_fecha_sol');
            $arr_revalidacion['nombreinsniv'] = $this->input->post('nombre_ins_niv_sol');
            $arr_revalidacion['paisinsniv'] = $this->input->post('pais_ins_niv_sol');
            $arr_revalidacion['callenuminsniv'] = $this->input->post('calle_num_ins_niv_sol');
            $arr_revalidacion['coloniainsniv'] = $this->input->post('colonia_ins_niv_sol');
            $arr_revalidacion['delegacioninsniv'] = $this->input->post('delegcion_ins_niv_sol');
            $arr_revalidacion['ciudadinsniv'] = $this->input->post('ciudad_ins_niv_sol');
            $arr_revalidacion['estadoinsniv'] = $this->input->post('estado_ins_niv_sol');
            $arr_revalidacion['codigopostalinsniv'] = $this->input->post('cp_ins_niv_sol');
            $arr_revalidacion['telefonoinsniv'] = $this->input->post('telefono_ins_niv_sol');
            $arr_revalidacion['nivelinsniv'] = $this->input->post('nivel_ins_niv_sol');
            $arr_revalidacion['carrerainsniv'] = $this->input->post('carrera_ins_niv_sol');
            $arr_revalidacion['claveinsniv'] = $this->input->post('clave_ins_niv_sol');
            $arr_revalidacion['semestreinsniv'] = $this->input->post('semestre_ins_niv_sol');
            $arr_revalidacion['areainsniv'] = $this->input->post('area_ins_niv_sol');
            $arr_revalidacion['defechainsniv'] = $this->input->post('de_fecha_niv_sol');
            $arr_revalidacion['afechainsniv'] = $this->input->post('a_fecha_niv_sol');
            $arr_revalidacion['nombreinsequi'] = $this->input->post('nombre_ins_equi_sol');
            $arr_revalidacion['ciudadmuninsequi'] = $this->input->post('ciudad_mun_ins_equi_sol');
            $arr_revalidacion['callenuminsequi'] = $this->input->post('calle_num_ins_equi_sol');
            $arr_revalidacion['coloniainsequi'] = $this->input->post('colonia_ins_equi_sol');
            $arr_revalidacion['delegacioninsequi'] = $this->input->post('delegcion_ins_equi_sol');
            $arr_revalidacion['ciudadinsequi'] = $this->input->post('ciudad_ins_equi_sol');
            $arr_revalidacion['estadoinsequi'] = $this->input->post('estado_ins_equi_sol');
            $arr_revalidacion['codigopostalinsequi'] = $this->input->post('cp_ins_equi_sol');
            $arr_revalidacion['telefonoinsequi'] = $this->input->post('telefono_ins_equi_sol');
            $arr_revalidacion['nivelinsequi'] = $this->input->post('nivel_ins_equi_sol');
            $arr_revalidacion['carrerainsequi'] = $this->input->post('carrera_ins_equi_sol');
            $arr_revalidacion['peinsequi'] = $this->input->post('pe_ins_equi_sol');
            $arr_revalidacion['semestreinsequi'] = $this->input->post('semestre_ins_equi_sol');
            $arr_revalidacion['areaespinsequi'] = $this->input->post('area_esp_ins_equi_sol');
            $arr_revalidacion['fechaingins'] = $this->input->post('fecha_ing_ins_equi_sol');
            
            //$this->revalidacion_model->crear_solicitud_revalidacion($arr_revalidacion);
            
            redirect(base_url() . 'analista_servicios/revalidacion/visualizar_comprobante', 'refresh');
            
        }
    }
    
    public function agregar_revalidacion_extranjero() {
        
        $this->form_validation->set_rules('folio_sol', 'folio_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido1_sol', 'apellido1_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido2_sol', 'apellido2_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombres_sol', 'nombres_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_sol', 'calle_num_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_sol', 'colonia_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_municipio_sol', 'delegcion_municipio_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_sol', 'ciudad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_sol', 'estado_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_sol', 'cp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_sol', 'telefono_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nacionalidad_sol', 'nacionalidad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('entidad_nac_sol', 'entidad_nac_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('se_sol', 'se_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('curp_sol', 'curp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prepa_sol', 'prepa_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_sol', 'area_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_sol', 'nombre_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ubicacion_sol', 'ubicacion_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_sol', 'calle_num_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_sol', 'ciudad_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_sol', 'estado_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pais_ins_sol', 'pais_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_sol', 'cp_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_sol', 'telefono_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_hs_sol', 'fecha_hs_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_niv_sol', 'nombre_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_niv_sol', 'calle_num_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_niv_sol', 'colonia_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_niv_sol', 'ciudad_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_niv_sol', 'estado_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pais_ins_niv_sol', 'pais_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_niv_sol', 'cp_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_niv_sol', 'telefono_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_equi_sol', 'nombre_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_mun_ins_equi_sol', 'ciudad_mun_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_equi_sol', 'calle_num_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_equi_sol', 'colonia_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_ins_equi_sol', 'delegcion_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_equi_sol', 'ciudad_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_equi_sol', 'estado_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_equi_sol', 'cp_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_equi_sol', 'telefono_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pe_ins_equi_sol', 'pe_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_ing_ins_equi_sol', 'fecha_ing_ins_equi_sol', 'trim|required|xss_clean');
        
        //Si pasamos la validación
        if ($this->form_validation->run()) {
            
            $arr_revalidacion_extranjero = array();
            $arr_revalidacion_extranjero['fecha'] = $this->input->post('fecha_sol');
            $arr_revalidacion_extranjero['folio'] = $this->input->post('folio_sol');
            $arr_revalidacion_extranjero['ape1'] = $this->input->post('apellido1_sol');
            $arr_revalidacion_extranjero['ape2'] = $this->input->post('apellido2_sol');
            $arr_revalidacion_extranjero['nombre'] = $this->input->post('nombres_sol');
            $arr_revalidacion_extranjero['callenum'] = $this->input->post('calle_num_sol');
            $arr_revalidacion_extranjero['colonia'] = $this->input->post('colonia_sol');
            $arr_revalidacion_extranjero['delegacionmun'] = $this->input->post('delegcion_municipio_sol');
            $arr_revalidacion_extranjero['ciudad'] = $this->input->post('ciudad_sol');
            $arr_revalidacion_extranjero['estado'] = $this->input->post('estado_sol');
            $arr_revalidacion_extranjero['codigopostal'] = $this->input->post('cp_sol');
            $arr_revalidacion_extranjero['telefono'] = $this->input->post('telefono_sol');
            $arr_revalidacion_extranjero['nacionalidad'] = $this->input->post('nacionalidad_sol');
            $arr_revalidacion_extranjero['entidadnacimiento'] = $this->input->post('entidad_nac_sol');
            $arr_revalidacion_extranjero['genero'] = $this->input->post('se_sol');
            $arr_revalidacion_extranjero['curp'] = $this->input->post('curp_sol');
            $arr_revalidacion_extranjero['preparatoria'] = $this->input->post('prepa_sol');
            $arr_revalidacion_extranjero['area'] = $this->input->post('area_sol');
            $arr_revalidacion_extranjero['nombrehg'] = $this->input->post('nombre_ins_sol');
            $arr_revalidacion_extranjero['ubicacionhg'] = $this->input->post('ubicacion_sol');
            $arr_revalidacion_extranjero['callenumhg'] = $this->input->post('calle_num_ins_sol');
            $arr_revalidacion_extranjero['ciudadhg'] = $this->input->post('ciudad_ins_sol');
            $arr_revalidacion_extranjero['estadohg'] = $this->input->post('estado_ins_sol');
            $arr_revalidacion_extranjero['paishg'] = $this->input->post('pais_ins_sol');
            $arr_revalidacion_extranjero['zonapostalhg'] = $this->input->post('cp_ins_sol');
            $arr_revalidacion_extranjero['telefonohg'] = $this->input->post('telefono_ins_sol');
            $arr_revalidacion_extranjero['fechahg'] = $this->input->post('fecha_hs_sol');
            $arr_revalidacion_extranjero['nombrehgniv'] = $this->input->post('nombre_ins_niv_sol');
            $arr_revalidacion_extranjero['callenumhgniv'] = $this->input->post('calle_num_ins_niv_sol');
            $arr_revalidacion_extranjero['coloniahgniv'] = $this->input->post('colonia_ins_niv_sol');
            $arr_revalidacion_extranjero['ciudadhgniv'] = $this->input->post('ciudad_ins_niv_sol');
            $arr_revalidacion_extranjero['estadohgniv'] = $this->input->post('estado_ins_niv_sol');
            $arr_revalidacion_extranjero['paishgniv'] = $this->input->post('pais_ins_niv_sol');
            $arr_revalidacion_extranjero['zonapostalhgniv'] = $this->input->post('cp_ins_niv_sol');
            $arr_revalidacion_extranjero['telefonohgniv'] = $this->input->post('telefono_ins_niv_sol');
            $arr_revalidacion_extranjero['nombreins'] = $this->input->post('nombre_ins_equi_sol');
            $arr_revalidacion_extranjero['ciudadmunins'] = $this->input->post('ciudad_mun_ins_equi_sol');
            $arr_revalidacion_extranjero['callenumins'] = $this->input->post('calle_num_ins_equi_sol');
            $arr_revalidacion_extranjero['coloniains'] = $this->input->post('colonia_ins_equi_sol');
            $arr_revalidacion_extranjero['delegacionins'] = $this->input->post('delegcion_ins_equi_sol');
            $arr_revalidacion_extranjero['ciudadins'] = $this->input->post('ciudad_ins_equi_sol');
            $arr_revalidacion_extranjero['estadoins'] = $this->input->post('estado_ins_equi_sol');
            $arr_revalidacion_extranjero['codigopostalins'] = $this->input->post('cp_ins_equi_sol');
            $arr_revalidacion_extranjero['telefonoins'] = $this->input->post('telefono_ins_equi_sol');
            $arr_revalidacion_extranjero['clavepeins'] = $this->input->post('pe_ins_equi_sol');
            $arr_revalidacion_extranjero['fechaingins'] = $this->input->post('fecha_ing_ins_equi_sol');
            
            //$this->revalidacion_model->crear_solicitud_revalidacion_extranjero($arr_revalidacion_extranjero);
            redirect(base_url() . 'analista_servicios/revalidacion/visualizar_comprobante', 'refresh');
            
        }
        
        
    }
    
    public function detalle_solicitud_revalidacion($idsolicitud) {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Solicitud de revalidación";

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['solicitud_revalidacion'] = $this->revalidacion_model->consultar_solicitud_revalidacion($idsolicitud);

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        $data['scripts'] = array();
        $data['scripts'][] = 'validarRevalidacion';

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
        $data['breadcrumbs']['titulo'] = "Solicitud de revalidación";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion\detalle_solicitud_revalidacion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function detalle_solicitud_revalidacion_extranjero($idsolicitud) {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Solicitud de revalidación";

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['solicitud_revalidacion_extra'] = $this->revalidacion_model->consultar_solicitud_revalidacion_extranjero($idsolicitud);

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        $data['scripts'] = array();
        $data['scripts'][] = 'validarRevalidacion';

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
        $data['breadcrumbs']['titulo'] = "Solicitud de revalidación";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion_extranjero\detalle_solicitud_revalidacion_extranjero_view', $data, TRUE);

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
        $data['titulo'] = app_title() . " | Solicitudes revalidación";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitudes'] = $this->revalidacion_model->consultar_solicitudes();
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
        $data['breadcrumbs']['titulo'] = "Solicitudes de revalidación";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion\solicitudes_revalidacion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function solicitudes_extranjero() {
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
        $data['titulo'] = app_title() . " | Solicitudes revalidación extranjero";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitudes'] = $this->revalidacion_model->consultar_solicitudes_extranjero();
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
        $data['breadcrumbs']['titulo'] = "Solicitudes de revalidación del extranjero";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion_extranjero\solicitudes_revalidacionextranjero_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function editar_revalidacion($idsolicitud) {
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
        $data['titulo'] = app_title() . " | Editar solicitud de revalidación";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitud_revalidacion'] = $this->revalidacion_model->consultar_solicitud_revalidacion($idsolicitud);

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        $data['scripts'] = array();
        $data['scripts'][] = 'editarRevalidacion';

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
        $data['breadcrumbs']['titulo'] = "Editar solicitud de revalidación";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion\editar_revalidacion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function editar_revalidacion_extranjero($idsolicitud) {
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
        $data['titulo'] = app_title() . " | Editar solicitud de revalidación del extranjero";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['solicitud_revalidacion_extra'] = $this->revalidacion_model->consultar_solicitud_revalidacion_extranjero($idsolicitud);

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        $data['scripts'] = array();
        $data['scripts'][] = 'editarRevalidacionExtranjero';

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
        $data['breadcrumbs']['titulo'] = "Editar solicitud de revalidación del extranjero";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo3\revalidacion_extranjero\editar_revalidacion_extranjero_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function editar_datos_revalidacion() {

        $this->form_validation->set_rules('apellido1_sol', 'apellido1_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido2_sol', 'apellido2_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombres_sol', 'nombres_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_sol', 'calle_num_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_sol', 'colonia_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegacion_sol', 'delegacion_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_sol', 'ciudad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_sol', 'estado_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_sol', 'cp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_sol', 'telefono_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nacionalidad_sol', 'nacionalidad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('entidad_nac_sol', 'entidad_nac_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_nac_sol', 'fecha_nac_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('se_sol', 'se_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('curp_sol', 'curp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_sol', 'nombre_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pais_sol', 'pais_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_sol', 'calle_num_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_sol', 'colonia_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_ins_sol', 'delegcion_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_sol', 'ciudad_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_sol', 'estado_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_sol', 'cp_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_sol', 'telefono_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel_ins_sol', 'nivel_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('carrera_ins_sol', 'carrera_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('clave_ins_sol', 'clave_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('semestre_ins_sol', 'semestre_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_ins_sol', 'area_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('de_fecha_sol', 'de_fecha_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('a_fecha_sol', 'a_fecha_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_equi_sol', 'nombre_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_mun_ins_equi_sol', 'ciudad_mun_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_equi_sol', 'calle_num_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_equi_sol', 'colonia_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_ins_equi_sol', 'delegcion_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_equi_sol', 'ciudad_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_equi_sol', 'estado_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_equi_sol', 'cp_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_equi_sol', 'telefono_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel_ins_equi_sol', 'nivel_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('carrera_ins_equi_sol', 'carrera_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pe_ins_equi_sol', 'pe_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('semestre_ins_equi_sol', 'semestre_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_esp_ins_equi_sol', 'area_esp_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_ing_ins_equi_sol', 'fecha_ing_ins_equi_sol', 'trim|required|xss_clean');

        
        
        //Si pasamos la validación
        if ($this->form_validation->run()) {
            
            $arr_revalidacion = array();
            $arr_revalidacion['fecha'] = $this->input->post('fecha_sol');
            $arr_revalidacion['folio'] = $this->input->post('folio_sol');
            $arr_revalidacion['ape1'] = $this->input->post('apellido1_sol');
            $arr_revalidacion['ape2'] = $this->input->post('apellido2_sol');
            $arr_revalidacion['nombre'] = $this->input->post('nombres_sol');
            $arr_revalidacion['callenum'] = $this->input->post('calle_num_sol');
            $arr_revalidacion['colonia'] = $this->input->post('colonia_sol');
            $arr_revalidacion['delegacion'] = $this->input->post('delegcion_sol');
            $arr_revalidacion['ciudad'] = $this->input->post('ciudad_sol');
            $arr_revalidacion['estado'] = $this->input->post('estado_sol');
            $arr_revalidacion['codigopostal'] = $this->input->post('cp_sol');
            $arr_revalidacion['telefono'] = $this->input->post('telefono_sol');
            $arr_revalidacion['nacionalidad'] = $this->input->post('nacionalidad_sol');
            $arr_revalidacion['entidadnac'] = $this->input->post('entidad_nac_sol');
            $arr_revalidacion['fechanacimiento'] = $this->input->post('fecha_nac_sol');
            $arr_revalidacion['genero'] = $this->input->post('se_sol');
            $arr_revalidacion['curp'] = $this->input->post('curp_sol');
            $arr_revalidacion['nombreins'] = $this->input->post('nombre_ins_sol');
            $arr_revalidacion['paisins'] = $this->input->post('pais_sol');
            $arr_revalidacion['callenumins'] = $this->input->post('calle_num_ins_sol');
            $arr_revalidacion['coloniains'] = $this->input->post('colonia_ins_sol');
            $arr_revalidacion['delegacionins'] = $this->input->post('delegcion_ins_sol');
            $arr_revalidacion['ciudadins'] = $this->input->post('ciudad_ins_sol');
            $arr_revalidacion['estadoins'] = $this->input->post('estado_ins_sol');
            $arr_revalidacion['codigopostalins'] = $this->input->post('cp_ins_sol');
            $arr_revalidacion['telefonoins'] = $this->input->post('telefono_ins_sol');
            $arr_revalidacion['nivelins'] = $this->input->post('nivel_ins_sol');
            $arr_revalidacion['carrerains'] = $this->input->post('carrera_ins_sol');
            $arr_revalidacion['claveins'] = $this->input->post('clave_ins_sol');
            $arr_revalidacion['semestreins'] = $this->input->post('semestre_ins_sol');
            $arr_revalidacion['areains'] = $this->input->post('area_ins_sol');
            $arr_revalidacion['defechains'] = $this->input->post('de_fecha_sol');
            $arr_revalidacion['afechains'] = $this->input->post('a_fecha_sol');
            $arr_revalidacion['nombreinsniv'] = $this->input->post('nombre_ins_niv_sol');
            $arr_revalidacion['paisinsniv'] = $this->input->post('pais_ins_niv_sol');
            $arr_revalidacion['callenuminsniv'] = $this->input->post('calle_num_ins_niv_sol');
            $arr_revalidacion['coloniainsniv'] = $this->input->post('colonia_ins_niv_sol');
            $arr_revalidacion['delegacioninsniv'] = $this->input->post('delegcion_ins_niv_sol');
            $arr_revalidacion['ciudadinsniv'] = $this->input->post('ciudad_ins_niv_sol');
            $arr_revalidacion['estadoinsniv'] = $this->input->post('estado_ins_niv_sol');
            $arr_revalidacion['codigopostalinsniv'] = $this->input->post('cp_ins_niv_sol');
            $arr_revalidacion['telefonoinsniv'] = $this->input->post('telefono_ins_niv_sol');
            $arr_revalidacion['nivelinsniv'] = $this->input->post('nivel_ins_niv_sol');
            $arr_revalidacion['carrerainsniv'] = $this->input->post('carrera_ins_niv_sol');
            $arr_revalidacion['claveinsniv'] = $this->input->post('clave_ins_niv_sol');
            $arr_revalidacion['semestreinsniv'] = $this->input->post('semestre_ins_niv_sol');
            $arr_revalidacion['areainsniv'] = $this->input->post('area_ins_niv_sol');
            $arr_revalidacion['defechainsniv'] = $this->input->post('de_fecha_niv_sol');
            $arr_revalidacion['afechainsniv'] = $this->input->post('a_fecha_niv_sol');
            $arr_revalidacion['nombreinsequi'] = $this->input->post('nombre_ins_equi_sol');
            $arr_revalidacion['ciudadmuninsequi'] = $this->input->post('ciudad_mun_ins_equi_sol');
            $arr_revalidacion['callenuminsequi'] = $this->input->post('calle_num_ins_equi_sol');
            $arr_revalidacion['coloniainsequi'] = $this->input->post('colonia_ins_equi_sol');
            $arr_revalidacion['delegacioninsequi'] = $this->input->post('delegcion_ins_equi_sol');
            $arr_revalidacion['ciudadinsequi'] = $this->input->post('ciudad_ins_equi_sol');
            $arr_revalidacion['estadoinsequi'] = $this->input->post('estado_ins_equi_sol');
            $arr_revalidacion['codigopostalinsequi'] = $this->input->post('cp_ins_equi_sol');
            $arr_revalidacion['telefonoinsequi'] = $this->input->post('telefono_ins_equi_sol');
            $arr_revalidacion['nivelinsequi'] = $this->input->post('nivel_ins_equi_sol');
            $arr_revalidacion['carrerainsequi'] = $this->input->post('carrera_ins_equi_sol');
            $arr_revalidacion['peinsequi'] = $this->input->post('pe_ins_equi_sol');
            $arr_revalidacion['semestreinsequi'] = $this->input->post('semestre_ins_equi_sol');
            $arr_revalidacion['areaespinsequi'] = $this->input->post('area_esp_ins_equi_sol');
            $arr_revalidacion['fechaingins'] = $this->input->post('fecha_ing_ins_equi_sol');
            
            //$this->revalidacion_model->crear_solicitud_revalidacion($arr_revalidacion);
            
            redirect(base_url() . 'analista_servicios/revalidacion/solicitudes', 'refresh');
            
        }
    }
    
    public function editar_datos_revalidacion_extranjero() {
        
        $this->form_validation->set_rules('folio_sol', 'folio_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido1_sol', 'apellido1_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido2_sol', 'apellido2_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombres_sol', 'nombres_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_sol', 'calle_num_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_sol', 'colonia_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_municipio_sol', 'delegcion_municipio_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_sol', 'ciudad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_sol', 'estado_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_sol', 'cp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_sol', 'telefono_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nacionalidad_sol', 'nacionalidad_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('entidad_nac_sol', 'entidad_nac_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('se_sol', 'se_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('curp_sol', 'curp_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prepa_sol', 'prepa_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_sol', 'area_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_sol', 'nombre_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ubicacion_sol', 'ubicacion_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_sol', 'calle_num_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_sol', 'ciudad_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_sol', 'estado_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pais_ins_sol', 'pais_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_sol', 'cp_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_sol', 'telefono_ins_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_hs_sol', 'fecha_hs_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_niv_sol', 'nombre_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_niv_sol', 'calle_num_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_niv_sol', 'colonia_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_niv_sol', 'ciudad_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_niv_sol', 'estado_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pais_ins_niv_sol', 'pais_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_niv_sol', 'cp_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_niv_sol', 'telefono_ins_niv_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_ins_equi_sol', 'nombre_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_mun_ins_equi_sol', 'ciudad_mun_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle_num_ins_equi_sol', 'calle_num_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia_ins_equi_sol', 'colonia_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delegcion_ins_equi_sol', 'delegcion_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciudad_ins_equi_sol', 'ciudad_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('estado_ins_equi_sol', 'estado_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_ins_equi_sol', 'cp_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono_ins_equi_sol', 'telefono_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pe_ins_equi_sol', 'pe_ins_equi_sol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_ing_ins_equi_sol', 'fecha_ing_ins_equi_sol', 'trim|required|xss_clean');
        
        //Si pasamos la validación
        if ($this->form_validation->run()) {
            
            $arr_revalidacion_extranjero = array();
            $arr_revalidacion_extranjero['fecha'] = $this->input->post('fecha_sol');
            $arr_revalidacion_extranjero['folio'] = $this->input->post('folio_sol');
            $arr_revalidacion_extranjero['ape1'] = $this->input->post('apellido1_sol');
            $arr_revalidacion_extranjero['ape2'] = $this->input->post('apellido2_sol');
            $arr_revalidacion_extranjero['nombre'] = $this->input->post('nombres_sol');
            $arr_revalidacion_extranjero['callenum'] = $this->input->post('calle_num_sol');
            $arr_revalidacion_extranjero['colonia'] = $this->input->post('colonia_sol');
            $arr_revalidacion_extranjero['delegacionmun'] = $this->input->post('delegcion_municipio_sol');
            $arr_revalidacion_extranjero['ciudad'] = $this->input->post('ciudad_sol');
            $arr_revalidacion_extranjero['estado'] = $this->input->post('estado_sol');
            $arr_revalidacion_extranjero['codigopostal'] = $this->input->post('cp_sol');
            $arr_revalidacion_extranjero['telefono'] = $this->input->post('telefono_sol');
            $arr_revalidacion_extranjero['nacionalidad'] = $this->input->post('nacionalidad_sol');
            $arr_revalidacion_extranjero['entidadnacimiento'] = $this->input->post('entidad_nac_sol');
            $arr_revalidacion_extranjero['genero'] = $this->input->post('se_sol');
            $arr_revalidacion_extranjero['curp'] = $this->input->post('curp_sol');
            $arr_revalidacion_extranjero['preparatoria'] = $this->input->post('prepa_sol');
            $arr_revalidacion_extranjero['area'] = $this->input->post('area_sol');
            $arr_revalidacion_extranjero['nombrehg'] = $this->input->post('nombre_ins_sol');
            $arr_revalidacion_extranjero['ubicacionhg'] = $this->input->post('ubicacion_sol');
            $arr_revalidacion_extranjero['callenumhg'] = $this->input->post('calle_num_ins_sol');
            $arr_revalidacion_extranjero['ciudadhg'] = $this->input->post('ciudad_ins_sol');
            $arr_revalidacion_extranjero['estadohg'] = $this->input->post('estado_ins_sol');
            $arr_revalidacion_extranjero['paishg'] = $this->input->post('pais_ins_sol');
            $arr_revalidacion_extranjero['zonapostalhg'] = $this->input->post('cp_ins_sol');
            $arr_revalidacion_extranjero['telefonohg'] = $this->input->post('telefono_ins_sol');
            $arr_revalidacion_extranjero['fechahg'] = $this->input->post('fecha_hs_sol');
            $arr_revalidacion_extranjero['nombrehgniv'] = $this->input->post('nombre_ins_niv_sol');
            $arr_revalidacion_extranjero['callenumhgniv'] = $this->input->post('calle_num_ins_niv_sol');
            $arr_revalidacion_extranjero['coloniahgniv'] = $this->input->post('colonia_ins_niv_sol');
            $arr_revalidacion_extranjero['ciudadhgniv'] = $this->input->post('ciudad_ins_niv_sol');
            $arr_revalidacion_extranjero['estadohgniv'] = $this->input->post('estado_ins_niv_sol');
            $arr_revalidacion_extranjero['paishgniv'] = $this->input->post('pais_ins_niv_sol');
            $arr_revalidacion_extranjero['zonapostalhgniv'] = $this->input->post('cp_ins_niv_sol');
            $arr_revalidacion_extranjero['telefonohgniv'] = $this->input->post('telefono_ins_niv_sol');
            $arr_revalidacion_extranjero['nombreins'] = $this->input->post('nombre_ins_equi_sol');
            $arr_revalidacion_extranjero['ciudadmunins'] = $this->input->post('ciudad_mun_ins_equi_sol');
            $arr_revalidacion_extranjero['callenumins'] = $this->input->post('calle_num_ins_equi_sol');
            $arr_revalidacion_extranjero['coloniains'] = $this->input->post('colonia_ins_equi_sol');
            $arr_revalidacion_extranjero['delegacionins'] = $this->input->post('delegcion_ins_equi_sol');
            $arr_revalidacion_extranjero['ciudadins'] = $this->input->post('ciudad_ins_equi_sol');
            $arr_revalidacion_extranjero['estadoins'] = $this->input->post('estado_ins_equi_sol');
            $arr_revalidacion_extranjero['codigopostalins'] = $this->input->post('cp_ins_equi_sol');
            $arr_revalidacion_extranjero['telefonoins'] = $this->input->post('telefono_ins_equi_sol');
            $arr_revalidacion_extranjero['clavepeins'] = $this->input->post('pe_ins_equi_sol');
            $arr_revalidacion_extranjero['fechaingins'] = $this->input->post('fecha_ing_ins_equi_sol');
            
            //$this->revalidacion_model->crear_solicitud_revalidacion_extranjero($arr_revalidacion_extranjero);
            redirect(base_url() . 'analista_servicios/revalidacion/solicitudes', 'refresh');
            
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
        $data['scripts'][] = 'subir_resolucion';


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
        redirect(base_url() . 'analista_servicios/dictamen_tecnico/equiparacion', 'refresh');
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
    
    public function visualizar_comprobante() {

        $data = array();
        $data['titulo'] = app_title() . " | Comprobante de trámite";
        
        
        $this->load->view("app/private/fragments/modules/Modulo3/imprimir_comprobante_tramite_view", $data, FALSE);
        
    }
    
    
    
}
