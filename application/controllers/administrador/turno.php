<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of turno_administrador
 *
 * @author CIDTAI-UTEQ
 */
class turno extends CI_Controller {

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
        $this->load->model('turno_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['lista_turnos'] = $this->turno_model->lista_turnos();
        $data['titulo'] = app_title() . " | Catálogo de Turno";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTurnoAdministrador';
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
        $data['breadcrumbs']['titulo'] = "Turno";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión turno', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/turno_administrador', $data, TRUE);

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
        $this->load->model("turno_model");
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTurnoAdministrador';
        $data['scripts'][] = 'validacionCatalogos';
        $data['turno'] = $this->turno_model->consultar_turno($id);
        $data['titulo'] = app_title() . " |Editar turno";

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
        $data['breadcrumbs']['titulo'] = "Turno";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión turno', base_url() . 'administrador/turno'), array('Editar turno', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_turno_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_turno() {
        $this->form_validation->set_rules('nombre_turno_administrador', 'descturno', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
            $arr_turno = array();
            $arr_turno['descturno'] = $this->input->post('nombre_turno_administrador');
            $arr_turno['estatus'] = 1;
            //Cargar liberias de conexion
            //autoload.php   <----- 
            //Cargamos el modelo correspondiente
            $this->load->model('turno_model');

            $nom = $this->input->post('nombre_turno_administrador');

            $variable = $this->turno_model->existente($nom);


            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    $idact = $variable->idturno;
                    $this->turno_model->activar($idact);
                    redirect(base_url() . 'administrador/turno', 'refresh');
                } else {
                    $this->session->set_flashdata('turno_incorrecta', 'El turno ya existe');
                    redirect(base_url() . 'administrador/turno', 'refresh');
                }
            } else {

                $this->turno_model->crear_turno($arr_turno);

                redirect(base_url() . "administrador/turno", 'refresh');
                //echo "es la buena";
            }
        }
    }

    public function editar_post() {

        $this->load->model('turno_model');
        $nom = $this->input->post('nombre_turno_administrador');
        $id = $this->input->post('id_turno');

        $variable = $this->turno_model->existente($nom);


        if (!is_null($variable)) {
            $this->session->set_flashdata('turno_incorrecta', 'El turno ya existe');
            redirect(base_url() . 'administrador/turno/editar/' . $id, 'refresh');
        } else {

            $this->turno_model->editar_turno($id, $nom);
            redirect(base_url() . "administrador/turno", 'refresh');
        }
    }

    public function eliminar($id) {
        $this->load->model('turno_model');
        $this->turno_model->eliminar($id);
        redirect(base_url() . "administrador/turno", 'refresh');
    }

    //put your code here
}
