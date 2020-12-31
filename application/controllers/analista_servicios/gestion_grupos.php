<?php

/**
 * Controlador de gestion de grupos
 *
 * Mostrará la vista de gestion de grupos donde
 * se visualizaran agregar grupos y el listado 
 * de los mismos, debera ser llenado conforme
 * al acuerdo
 * 
 * @since      1.0
 * @version    1.0
 * @link       /usuario/gestion_grupos
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage app 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */
class gestion_grupos extends CI_Controller {
    
    /**
     * Constructor de la clase
     * 
     * Invoca al constructor del padre
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
        $this->load->model('login_model');
        $this->load->model('grupos_acuerdo_model');
    }
    
    public function index() {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        /*
         * parametro  que se manda a la vista para vfisualizar el 
         * titulo de la pagina
         */
        $data['titulo'] = app_title() . " | Gestión de grupos";

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['acuerdos_existentes'] = $this->grupos_acuerdo_model->consultar_acuerdos_existentes();
        $data['grupos_acuerdos'] = $this->grupos_acuerdo_model->consultar_grupos();

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        $data['scripts'] = array();

        $data['scripts'][] = 'validarGrupoAnalista';

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
        $data['breadcrumbs']['titulo'] = "Gestión de grupos";
        $data['breadcrumbs']['subtitulo'] = "";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), 'Gestión de grupos');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_grupos_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function crear_grupo() {

        //Validación de los campos del formulario
        $this->form_validation->set_rules('no_acuerdo', 'no_acuerdo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_grupo', 'nombre_grupo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('numero_alumnos', 'numero_alumnos', 'trim|required|xss_clean');

        //Una vez validado el formulario
        if ($this->form_validation->run()) {

            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            $arr_nue_grupo = array();
            $arr_nue_grupo['grupo'] = $this->input->post('nombre_grupo');
            $arr_nue_grupo['alumnosxgrupo'] = $this->input->post('numero_alumnos');
            $arr_nue_grupo['estatus'] = 1;
            $arr_nue_grupo['idacuerdo'] = $this->input->post('no_acuerdo');
            
            $this->grupos_acuerdo_model->crear_grupos_acuerdo($arr_nue_grupo);
            
            redirect(base_url() . 'analista_servicios/gestion_grupos', 'refresh');
            
            
        }
    }
    
}
