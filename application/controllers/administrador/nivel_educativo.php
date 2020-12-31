<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controlador que lleva a cabo todo el cotrol de altas bajas y modificaciones del formulario
 * del nombre de nivel educativo, así como el inicio de sesión por nivel de usuario.
 *
 * @since      1.0
 * @version    1.0
 * @link       /nivel_educativo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @vista de editar nivel educativo  ./application/views/app/private/modules/Catalogos/editar_nivel_educativo_administrador
 * @vista de agregar nivel educativo ./application/views/app/private/modules/Catalogos/nivel_educativo_administrador
 */
class nivel_educativo extends CI_Controller {

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
        $this->load->model('nivel_educativo_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['titulo'] = app_title() . " | Catálogo de nivel educativo";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoNivelEducativoAdministrador';
        $data['scripts'][] = 'validacionCatalogos';

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
        $data['breadcrumbs']['titulo'] = "Nivel educativo";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión nivel educativo', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/nivel_educativo_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_nivel() {

        //Validación de los campos del formulario
        $this->form_validation->set_rules('nombre_nivel_educativo_administrador', 'nomnivel', 'trim|required|xss_clean');

        //Una vez validado el formulacio
        if ($this->form_validation->run()) {

            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            $arr_ins_nivel = array();
            $arr_ins_nivel['nomnivel'] = $this->input->post('nombre_nivel_educativo_administrador');
            $arr_ins_nivel['estatus'] = 1;

            //Se carga el modelo que trae la función 
            $this->load->model('nivel_educativo_model');

            $nom = $this->input->post('nombre_nivel_educativo_administrador');

            $variable = $this->nivel_educativo_model->existente($nom);


            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    $idact = $variable->idnivel;
                    $this->nivel_educativo_model->activar($idact);
                    redirect(base_url() . 'administrador/nivel_educativo', 'refresh');
                } else {
                    $this->session->set_flashdata('nivel_incorrecta', 'El nivel ya existe');
                    redirect(base_url() . 'administrador/nivel_educativo', 'refresh');
                }
            } else {

                $this->nivel_educativo_model->crear_nivel_educativo($arr_ins_nivel);
                redirect(base_url() . "administrador/nivel_educativo", 'refresh');
            }
        }
    }

    public function editar($id) {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('nivel_educativo_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoNivelEducativoAdministrador';
        $data['scripts'][] = 'validacionCatalogos';
        /*
         * Mandar llamar la función para rellenar los datos 
         */
        $data['nivel'] = $this->nivel_educativo_model->consultar_nivel_educativo($id);

        $data['titulo'] = app_title() . " | Catálogo de nivel educativo";

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
        $data['breadcrumbs']['titulo'] = "Nivel educativo";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión nivel educativo', base_url() . 'administrador/nivel_educativo'), array('Editar nivel educativo', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_nivel_educativo_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar_nivel() {

        /*
         * Traer el modelo de nivel educativo para hacer uso de la función 
         */
        $this->load->model('nivel_educativo_model');

        /*
         * Traer el nuevo valor
         */
        $nombre = $this->input->post('nombre_nivel_educativo_administrador');
        $id = $this->input->post('id_nivel');

        $variable = $this->nivel_educativo_model->existente($nombre);


        if (!is_null($variable)) {
            $this->session->set_flashdata('nivel_incorrecta', 'El nivel ya existe');
            redirect(base_url() . 'administrador/nivel_educativo/editar/' . $id, 'refresh');
        } else {

            $this->nivel_educativo_model->editar_nivel_educativo($id, $nombre);
            redirect(base_url() . 'administrador/nivel_educativo', 'refresh');
        }
    }

    public function eliminar_nivel($id) {

        /*
         * Traer el modelo para eliminar registro, con la respectiva función
         */
        $this->load->model('nivel_educativo_model');
        $this->nivel_educativo_model->eliminar_nivel_educativo($id);

        redirect(base_url() . 'administrador/nivel_educativo', 'refresh');
    }

}
