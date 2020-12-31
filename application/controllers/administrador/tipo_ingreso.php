<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_ingreso_administrador
 *
 * @author CIDTAI-UTEQ
 */
class tipo_ingreso extends CI_Controller {

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
    }

    public function index() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('tipo_ingreso_model');
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['tipos_ingresos'] = $this->tipo_ingreso_model->lista_de_tipo_ingreso();
        $data['titulo'] = app_title() . " | Catálogo de Tipo Ingreso";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTipoIngresoAdministrador';
        $data['scripts'][] = 'validacionCatalogos';

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
        /**
         * 
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

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
        $data['breadcrumbs']['titulo'] = "Tipo ingreso";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión tipo ingreso', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/tipo_ingreso_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar($id) {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('tipo_ingreso_model');
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTipoIngresoAdministrador';
        $data['scripts'][] = 'validacionCatalogos';
        $data['tipo_ingreso'] = $this->tipo_ingreso_model->consulta_tipo_ingreso($id);
        $data['titulo'] = app_title() . " |Editar Tipo Ingreso";

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
        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

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
        $data['breadcrumbs']['titulo'] = "Tipo ingreso";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión tipo ingreso', base_url() . 'administrador/tipo_ingreso'), array('Editar tipo ingreso', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_tipo_ingreso_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_tipo_ingreso() {
        $this->form_validation->set_rules('nombre_ingreso_adminstrador', 'tipoingreso', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
            $arr_tipo_ingreso = array();
            $arr_tipo_ingreso['nomingreso'] = $this->input->post('nombre_ingreso_adminstrador');
            $arr_tipo_ingreso['estatus'] = 1;
            //Cargar liberias de conexion
            //autoload.php   <----- 
            //Cargamos el modelo correspondiente
            $this->load->model('tipo_ingreso_model');

            $nom = $this->input->post('nombre_ingreso_adminstrador');

            $variable = $this->tipo_ingreso_model->existente($nom);


            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    $idact = $variable->idingreso;
                    $this->tipo_ingreso_model->activar($idact);
                    redirect(base_url() . 'administrador/tipo_ingreso', 'refresh');
                } else {
                    $this->session->set_flashdata('tingreso_incorrecta', 'El tipo de ingreso ya existe');
                    redirect(base_url() . 'administrador/tipo_ingreso', 'refresh');
                }
            } else {

                $this->tipo_ingreso_model->crear_tipo_ingreso($arr_tipo_ingreso);

                redirect(base_url() . "administrador/tipo_ingreso", 'refresh');
            }
        }
    }

    public function editar_post() {

        $this->load->model('tipo_ingreso_model');
        $nom = $this->input->post('nombre_ingreso_adminstrador');
        $id = $this->input->post('id_tipo_ingreso');

        $variable = $this->tipo_ingreso_model->existente($nom);


        if (!is_null($variable)) {
            $this->session->set_flashdata('tingreso_incorrecta', 'El tipo de ingreso ya existe');
            redirect(base_url() . 'administrador/tipo_ingreso/editar/' . $id, 'refresh');
        } else {

            $this->tipo_ingreso_model->editar_tipo_ingreso($id, $nom);

            redirect(base_url() . "administrador/tipo_ingreso", 'refresh');
        }
    }

    //put your code here

    public function eliminar($id) {
        $this->load->model('tipo_ingreso_model');
        $this->tipo_ingreso_model->eliminar($id);
        redirect(base_url() . "administrador/tipo_ingreso", 'refresh');
    }

}
