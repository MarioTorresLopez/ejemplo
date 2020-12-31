<?php

/**
 * Controlador que lleva a cabo todo el cotrol de altas bajas y modificaciones del formulario
 * del nombre de modalidad, así como el inicio de sesión por nivel de usuario.
 *
 * @since      1.0
 * @version    1.0
 * @link       /modalidad
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @vista de editar modalidad  ./application/views/app/private/modules/Catalogos/editar_modalidad_catalogo
 * @vista de agregar modalidad ./application/views/app/private/modules/Catalogos/modalidad_catalogo
 */

/**
 * Description of modalidades_administrador
 *
 * @author CIDTAI-UTEQ
 */
class modalidad extends CI_Controller {

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
    }

    public function index() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('modalidad_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Catálogo de Modalidades";


        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoMadalidadAdministrador';
        $data['scripts'][] = 'validacionCatalogos';

        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();

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
        $data['breadcrumbs']['titulo'] = "Modalidades";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión modalidades', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/modalidades_administrador', $data, TRUE);

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
        $this->load->model('modalidad_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        //$id = $this->get('btn1');
        //$id=3;
        $data['modalidad'] = $this->modalidad_model->consultar_modalidad($id);
        $data['titulo'] = app_title() . " |Editar Modalidad";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminarCatalogoMadalidadAdministrador';
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
        $data['breadcrumbs']['titulo'] = "Modalidad";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión modalidades', base_url() . 'administrador/modalidad'), array('Editar modalidad', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_modalidad_administrador', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_modalidad() {
        //Validamos los campos del formulario
        $this->form_validation->set_rules('nombre_modalidad_administrador', 'nommodalidad', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
            $arr_ins_modalidad = array();
            $arr_ins_modalidad['nommodalidad'] = $this->input->post('nombre_modalidad_administrador');
            $arr_ins_modalidad['estatus'] = 1;

            //$nombre= $this->input->post("nombre_modalidad_administrador");
            //Cargar liberias de conexion
            //autoload.php   <----- 
            //Cargamos el modelo correspondiente
            $this->load->model('modalidad_model');

            $nom = $this->input->post('nombre_modalidad_administrador');

            $variable = $this->modalidad_model->existente($nom);


            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    //echo "Aqui";
                    $idact = $variable->idmodalidad;
                    $this->modalidad_model->activar($idact);
                    redirect(base_url() . "administrador/modalidad", 'refresh');
                } else {
                    $this->session->set_flashdata('modalidad_incorrecta', 'La modalidad ya existe');
                    redirect(base_url() . 'administrador/modalidad', 'refresh');
                }
                //$this->session->set_flashdata('modalidad_incorrecta', 'La modalidad ya existe');
                //redirect(base_url() . 'administrador/modalidad', 'refresh');
            } else {

                $this->modalidad_model->crear_modalidad($arr_ins_modalidad);
                redirect(base_url() . "administrador/modalidad", 'refresh');
                //echo "es la buena";
            }
        }
    }

    public function editar_post() {

        /*
         * Traer el modelo de materia  para hacer uso de la función 
         */
        $this->load->model('modalidad_model');
        /*
         * Traer el nuevo valor
         */
        $nom = $this->input->post('nombre_modalidad_administrador');
        $id = $this->input->post('idModalidad');

        $variable = $this->modalidad_model->existente($nom);

         /*
         * Verificar si la modalidad ya existe valida y no lo vuelva a insertar
         */

        if (!is_null($variable)) {
            $this->session->set_flashdata('modalidad_incorrecta', 'La modalidad ya existe');
            redirect(base_url() . 'administrador/modalidad/editar/' . $id, 'refresh');
        } else {

            $this->modalidad_model->editar_modalidad($id, $nom);
            redirect(base_url() . "administrador/modalidad", 'refresh');
            //echo "es la buena";
        }
    }

    public function eliminar($prueba) {

         /*
         * Traer el modelo para eliminar registro, con la respectiva función
         */
        $this->load->model('modalidad_model');
        $this->modalidad_model->eliminar($prueba);

        redirect(base_url() . "administrador/modalidad", 'refresh');
    }

}
