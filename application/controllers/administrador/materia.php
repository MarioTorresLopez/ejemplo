<?php
/**
 * Controlador que lleva a cabo todo el cotrol de altas bajas y modificaciones del formulario
 * del nombre de materia, así como el inicio de sesión por nivel de usuario.
 *
 * @since      1.0
 * @version    1.0
 * @link       /materia
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @vista de editar materia  ./application/views/app/private/modules/Catalogos/editar_materia_catalogo
 * @vista de agregar materia ./application/views/app/private/modules/Catalogos/materia_catalogo
 */

class materia extends CI_Controller {
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
        $this->load->model('materia_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['materias'] = $this->materia_model->consultar_materias();
        $data['titulo'] = app_title() . " | Catálogo de materias";

        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminacionCatalogoMaterias';
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
        $data['breadcrumbs']['titulo'] = "Materias ";
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/materia_catalogo', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function crear_materia() {

        //Validación de los campos del formulario
        $this->form_validation->set_rules('nombre_materia_catalogo', 'asignatura', 'trim|required|xss_clean');

        //Una vez validado el formulacio
        if ($this->form_validation->run()) {

            //Creamos varios arreglos para enviar los datos y sean registrados en la base de datos
            $hoy = date("Y/m/d");
            $id_usu = $this->session->userdata('idusu');
            
            $arr_ins_materia = array();
            $arr_ins_materia['asignatura'] = $this->input->post('nombre_materia_catalogo');
            $arr_ins_materia['fechamodificacion'] = $hoy;
            $arr_ins_materia['usuariomodificacion'] = $id_usu;
            $arr_ins_materia['estatus'] = 1;

            //Se carga el modelo que trae la función 
            $this->load->model('materia_model');

            $nom = $this->input->post('nombre_materia_catalogo');

            $variable = $this->materia_model->existente($nom);

            //se valida que si existe el nombre de la materia ya no se registre dos veces
            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    $idact = $variable->idmateria;
                    $this->materia_model->activar($idact);
                    redirect(base_url() . 'administrador/materia', 'refresh');
                } else {
                    $this->session->set_flashdata('materia_incorrecta', 'La materia ya existe');
                    redirect(base_url() . 'administrador/materia', 'refresh');
                }
            } else {

                $this->materia_model->crear_materia($arr_ins_materia);
                redirect(base_url() . "administrador/materia", 'refresh');
            }
        }
    }
    
    
    public function editar($id) {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('materia_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         * 
         * Se añaden los Scripts para las validaciones de los formularios
         * que vienen desde
         * ./application/static/admin/js/scriptEliminacionCatalogoMaterias
         * ./application/static/admin/js/validacionCatalogos
         */
        $data = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'scriptEliminacionCatalogoMaterias';
        $data['scripts'][] = 'validacionCatalogos';
        /*
         * Mandar llamar la función para rellenar los datos colocando la variable de "materia"
         * para utilizarla en la vista para que se muestren los datos en el formulario.
         *Invocar la consulta desde "materia_model", que se escuentra en:
         * ./application/models/materia_models
         */
        $data['materia'] = $this->materia_model->consultar_materia($id);

        $data['titulo'] = app_title() . " | Catálogo de materias";

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
        $data['breadcrumbs']['titulo'] = "Materias";
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Catalogos/editar_materia_catalogo', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
      public function editar_materia() {

        /*
         * Traer el modelo de materia  para hacer uso de la función 
         */
        $this->load->model('materia_model');

        /*
         * Traer el nuevo valor
         */
        $nombre = $this->input->post('nombre_materia_catalogo');
        $id = $this->input->post('id_materia');

        $variable = $this->materia_model->existente($nombre);


        if (!is_null($variable)) {
            $this->session->set_flashdata('materia_incorrecta', 'La materia ya existe');
            redirect(base_url() . 'administrador/materia/editar/' . $id, 'refresh');
        } else {

            $this->materia_model->editar_materias($id, $nombre);
            redirect(base_url() . 'administrador/materia', 'refresh');
        }
    }

    public function eliminar_materia($id) {

        /*
         * Traer el modelo para eliminar registro, con la respectiva función
         */
        $this->load->model('materia_model');
        $this->materia_model->eliminar_materias($id);

        redirect(base_url() . 'administrador/materia', 'refresh');
    }

    
}
