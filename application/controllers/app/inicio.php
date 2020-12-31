<?php

/**
 * Controlador Home de los usuarios registrados
 *
 * Calse que muestra las funciones de inicio junto con la 
 * GUI correspondiente al nivel de usuario
 * 
 * @since      1.0
 * @version    1.0
 * @link       /app/home
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage app 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
        $this->load->model('institucion_model');
        $this->load->model('acuerdo_model');
        $this->load->model('notificacion_model');
    }

    /**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista de inicio, armada dinamicamente a 
     * partir de los permisos que el usuario 
     * tenga habilitados
     * 
     * @since   1.0
     * @version 1.0
     * @link    /app/inicio/index
     * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return  View
     */
    public function index() {

        /*
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $id = $this->session->userdata('idusu');


        /*
          array de los datos que se van a guardar
         *          */
        $data = array();
        
        $data['institucion_solicitud    '] = $this->institucion_model->consultar_institucion_solicitud($id);
        $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_aceptacion($id);
        //Consultar acuerdos pertenecinetes al usuario
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
        //$data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos(110);
        //Para almacenar los modulos de cada rol
        ///$data['modulos'] = array();
        $data['titulo'] = app_title() . " | Inicio";
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));

        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
        
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
        $data['breadcrumbs']['titulo'] = "Inicio";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'),'Inicio');

        /**
         * el indice app_right_sidebar indica
         * la vista o fragmento en cuestion cuenta con 
         * menu lateral derecho o no (en caso de no contar desaparecerá el menu 'news')
         * delhgeader
         */
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);
        
        /*
         * Invocar la consulta de los modulos que tiene dicho usuario (menu izquierdo)
         */
        //$id = $this->session->userdata('idusu');
        //$data['menus'] = $this->login_model->cargar_modulos($id);

        /*
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        

        /*
         * Utilizar un foreach para recorrer el rol y 
         * en una matriz almacenar los permisos 
         */
//                foreach ($data['valor'] as $aux) {
//                    $data['modulos'][] = $this->login_model->cargar_modulos2($aux->rol);
//                }
        //echo $data['valor']->rol;
        $a = $data['valor']->rol;
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/inicio_fragment', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function leer_noti(){
        if ($this->input->is_ajax_request()) {
            $idnotificacion = $this->input->post('id');
            $this->notificacion_model->leer_notificacion($idnotificacion);
            echo json_encode(array("response_code" => 200));
        }
        else {
            http_error(400);
        }
        
    }

}

/* End of file inicio.php */
/* Location: ./application/controllers/app/inicio.php */
