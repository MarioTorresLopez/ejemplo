<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tramite_catalogo
 *
 * @author CIDTAI-UTEQ
 */
class tramite_catalogo extends CI_Controller {

    //put your code here

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
        $this->load->model('tramite_catalogo_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Catálogo de trámite";


        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTramite';
        $data['scripts'][] = 'validacionCatalogos';

        $data['catalogo_tramite'] = $this->tramite_catalogo_model->consultar_tramite_catalogo();

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
        $data['breadcrumbs']['titulo'] = "Trámite";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión trámite', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/tramite_catalogo', $data, TRUE);

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
        $this->load->model('tramite_catalogo_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        //$id = $this->get('btn1');
        //$id=3;

        $data['catalogo_tramite'] = $this->tramite_catalogo_model->consultar_tramite_catalogo($id);
        $data['tramite1'] = $this->tramite_catalogo_model->consultar_modalidad($id);
        $data['titulo'] = app_title() . " |Editar trámite";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoTramite';
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
        $data['breadcrumbs']['titulo'] = "Trámite catálogo";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión trámite', base_url() . 'administrador/modalidad'), array('Editar modalidad', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_tramite_catalogo', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_tramite_catalogo() {
        //Validamos los campos del formulario
        $this->form_validation->set_rules('nombre_tramite_catalogo', 'descripcion', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
            $arr_ins_tramite = array();
            $arr_ins_tramite['descripcion'] = $this->input->post('nombre_tramite_catalogo');
            $arr_ins_tramite['estatus'] = 1;

            //$nombre= $this->input->post("nombre_modalidad_administrador");
            //Cargar liberias de conexion
            //autoload.php   <----- 
            //Cargamos el modelo correspondiente
            $this->load->model('tramite_catalogo_model');

            $nom = $this->input->post('nombre_tramite_catalogo');

            $variable = $this->tramite_catalogo_model->existente($nom);


            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    //echo "Aqui";
                    $idact = $variable->idtipotramite;
                    $this->tramite_catalogo_model->activar($idact);
                    redirect(base_url() . "administrador/tramite_catalogo", 'refresh');
                } else {
                    $this->session->set_flashdata('tramite_incorrecta', 'el trámite ya existe en el catálogo');
                    redirect(base_url() . 'administrador/tramite_catalogo', 'refresh');
                }
                //$this->session->set_flashdata('modalidad_incorrecta', 'La modalidad ya existe');
                //redirect(base_url() . 'administrador/modalidad', 'refresh');
            } else {

                $this->tramite_catalogo_model->crear_tramite_catalogo($arr_ins_tramite);
                redirect(base_url() . "administrador/tramite_catalogo", 'refresh');
                //echo "es la buena";
            }
        }
    }

    public function editar_tramiteCatalogo() {

        //echo "es la buena";

        $this->load->model('tramite_catalogo_model');
        $nom = $this->input->post('nombre_tramite_catalogo');
        $id = $this->input->post('idTramite');

        $variable = $this->tramite_catalogo_model->existente($nom);

        if (!is_null($variable)) {
            $this->session->set_flashdata('tramite_incorrecta', 'El trámite ya existe en el catálogo');
            redirect(base_url() . 'administrador/tramite_catalogo/editar/' . $id, 'refresh');
        } else {

            $this->tramite_catalogo_model->editar_tramite_catalogo($id, $nom);
            redirect(base_url() . "administrador/tramite_catalogo", 'refresh');
        }
    }

    public function eliminar($prueba) {

        $this->load->model('tramite_catalogo_model');
        $this->tramite_catalogo_model->eliminar($prueba);

        redirect(base_url() . "administrador/tramite_catalogo", 'refresh');
    }

}
