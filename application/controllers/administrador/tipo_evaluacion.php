<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_evaluacion_administrador
 *
 * @author CIDTAI-UTEQ
 */
class tipo_evaluacion extends CI_Controller {

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
        $this->load->model('tipo_evaluacion_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['tevaluaciones'] = $this->tipo_evaluacion_model->consultar_tipo_evaluaciones();
        $data['titulo'] = app_title() . " | Catálogo de Tipo Evaluación";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTipoEvaluacionAdministrador';
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
        $data['breadcrumbs']['titulo'] = "Tipo evaluación";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión tipo evaluación', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/tipo_evaluacion_administrador', $data, TRUE);

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
        $this->load->model('tipo_evaluacion_model');


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'validacionCatalogos';
        $data['scripts'][] = 'scriptEliminarCatalogoTipoEvaluacionAdministrador';
        $data['tevaluacion'] = $this->tipo_evaluacion_model->consultar_tipo_evaluacion($id);
        $data['titulo'] = app_title() . " |Editar Tipo Evaluación";

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
        $data['breadcrumbs']['titulo'] = "Tipo evaluación";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión tipo evaluación', base_url() . 'administrador/tipo_evaluacion'), array('Editar tipo evaluación', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_tipo_evaluacion_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_tipo_evaluacion() {
        //Validamos los campos del formulario
        $this->form_validation->set_rules('nombre_tipo_evaluacion_administrador', 'nombre', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
            $arr_ins_tevaluacion = array();
            $arr_ins_tevaluacion['nombre'] = $this->input->post('nombre_tipo_evaluacion_administrador');
            $arr_ins_tevaluacion['estatus'] = 1;

            //Cargar liberias de conexion
            //autoload.php   <----- 
            //Cargamos el modelo correspondiente
            $this->load->model('tipo_evaluacion_model');

            $nom = $this->input->post('nombre_tipo_evaluacion_administrador');

            $variable = $this->tipo_evaluacion_model->existente($nom);


            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    $idact = $variable->idevaluacion;
                    $this->tipo_evaluacion_model->activar($idact);
                    redirect(base_url() . 'administrador/tipo_evaluacion', 'refresh');
                } else {
                    $this->session->set_flashdata('tevaluacion_incorrecta', 'El tipo de evaluación ya existe');
                    redirect(base_url() . 'administrador/tipo_evaluacion', 'refresh');
                }
            } else {

                $this->tipo_evaluacion_model->crear_tipo_evaluacion($arr_ins_tevaluacion);
                redirect(base_url() . "administrador/tipo_evaluacion", 'refresh');
                //echo "es la buena";
            }
        }
    }

    public function editar_tipo_evaluacion() {
        $this->load->model('tipo_evaluacion_model');
        $nom = $this->input->post('nombre_tipo_evaluacion_administrador');
        $id = $this->input->post('idEvaluacion');

        $variable = $this->tipo_evaluacion_model->existente($nom);

        if (!is_null($variable)) {
            $this->session->set_flashdata('tevaluacion_incorrecta', 'El tipo de evaluación ya existe');
            redirect(base_url() . 'administrador/tipo_evaluacion/editar/' . $id, 'refresh');
        } else {

            $this->tipo_evaluacion_model->editar_tipo_evaluacion($id, $nom);
            redirect(base_url() . "administrador/tipo_evaluacion", 'refresh');
            //echo "es la buena";
        }
    }

    public function eliminar_tipo_evaluacion($prueba) {

        $this->load->model('tipo_evaluacion_model');
        $this->tipo_evaluacion_model->eliminar_tipo_evaluacion($prueba);

        redirect(base_url() . "administrador/tipo_evaluacion", 'refresh');
    }

}
