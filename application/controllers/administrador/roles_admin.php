<?php
//Actualización
/**
 * Controlador para la seccion de asignacion de roles
 *
 * Clase que carga los modelos y vistas que pertenecen a la seccion de asignacion de rol, modulo y permiso
 * 
 * @since      1.0
 * 
 * @version    1.0
 * @link       /notfound
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage NA 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php ->???
 * @see        ./system/core/Controller.php
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class roles_admin extends CI_Controller {

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
        $this->load->model('agregaroladmin_model');
        $this->load->model('notificacion_model');
    }

    /**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista para el modulo de gestion de roles por usuario
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /incorporacion/roles/gestion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function index() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('agregaroladmin_model');
        $this->load->model('asignarol_model');

        // $this->load->model('agregarRolAdmin_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        //$data['usuario_rol'] = $this->agregarRolAdmin_model->consultar_usuario_rol();
        $data['titulo'] = app_title() . " | Roles";

        //Para almacenar los permisos
        $data['permisos'] = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'validacionesRolUsuario';
       
        $data['scripts'][] = 'eliminar_rol_modulo_permiso_admin';
        $data['scripts'][] = 'eliminar_rol_admin';

        $data['roles'] = $this->asignarol_model->consultar_rol();
        $data['modulosA'] = $this->asignarol_model->consultar_modulo();
        $data['usuarioRoles'] = $this->agregaroladmin_model->consultar_usuario_rol();
        $data['permodulo'] = $this->asignarol_model->prueba();
        /*
         * Utilizar un foreach para recorrer el rol y 
         * en una matriz almacenar los permisos 
         */
        foreach ($data['permodulo'] as $aux) {
            $data['permisos'][] = $this->asignarol_model->prueba2($aux->idrol, $aux->idmodulo);
        }

        //$data['permodulo'] = $this->asignarol_model->consultar_permisosmodulo();
        $data['permodulo1'] = $this->asignarol_model->consultar_permisosmodulo1();

        
        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        
        $a=$data['valor']->rol;
        $data['modulos']= $this->login_model->cargar_modulos2($a);
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
        $data['breadcrumbs']['titulo'] = "Roles";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de roles por módulo', ''));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/rol_modulo_permiso_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    //////////////////////////////////////AGREGAR ROL  /////////////////////
    public function crear_rol_admin() {

        //   Validamos los campos del formulario
        $this->form_validation->set_rules('nombre_rol', 'nombre_rol', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post


            $hoy = date("Y/m/d");
            $arr_ins_rol_usuario = array();
            $arr_ins_rol_usuario['nomrol'] = $this->input->post('nombre_rol');
            $arr_ins_rol_usuario['usuariomodificacion'] = $this->session->userdata('idusu');
            $arr_ins_rol_usuario['estatus'] = 1;
            $arr_ins_rol_usuario['fechamod'] = $hoy;


            $nombre = $this->input->post('nombre_rol');

            $variable = $this->agregaroladmin_model->existente_usuario_rol($nombre);

            if (!is_null($variable)) {

                if ($variable->estatus == 0) {
                    //echo "Aqui";
                    $idact = $variable->idrol;
                    $this->agregaroladmin_model->activar_rol($idact);
                    redirect(base_url() . "administrador/roles_admin", 'refresh');
                } else {
                    $this->session->set_flashdata('rol_incorrecta', 'El rol ya existe');
                    //redirect(base_url() . 'administrador/roles_usuario', 'refresh');
                }
            }
            $this->load->model('agregaroladmin_model');
            //$this->agregaroladmin_model->crear_rol($arr_ins_rol_usuario);
            $this->agregaroladmin_model->crear_admin($arr_ins_rol_usuario);





            redirect(base_url() . "administrador/roles_admin", 'refresh');
        } else {
            echo validation_errors();
        }
    }

    /**
     * ----
     * 
     * Incluye la vista para el modulo de edicion del rol dado de alta
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /incorporacion/roles/editar_rol
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function editar_rol($id) {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('agregaroladmin_model');


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['rolAdmin'] = $this->agregaroladmin_model->consultar_usuario_roles($id);
        $data['titulo'] = app_title() . " | Roles";

        $data['scripts'] = array();
        $data['scripts'][] = 'validacionesRolUsuario';


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
        $data['breadcrumbs']['titulo'] = "Roles";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de roles por módulo', base_url().'administrador/roles_admin'),array('Editar rol', '#'));

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        
        $a=$data['valor']->rol;
        $data['modulos']= $this->login_model->cargar_modulos2($a);
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }
        
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/editar_rol_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * ----
     * 
     * Incluye la vista para el modulo de gestion de roles por usuario
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /incorporacion/roles/editar_rol_modulo_permiso
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function editar_rol_modulo_permiso() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('agregaroladmin_model');
        $nombre = $this->input->post('nombre_rol');
        $id = $this->input->post('idRol');

        $variable = $this->agregaroladmin_model->existente_usuario_rol($nombre);

        if (!is_null($variable)) {
            $this->session->set_flashdata('rol_incorrecta', 'El nombre ya existe');
            redirect(base_url() . 'administrador/roles_admin/editar_rol/' . $id, 'refresh');
        } else {

            $this->agregaroladmin_model->editar_usuario_rol($id, $nombre);
            redirect(base_url() . "administrador/roles_admin", 'refresh');
            //echo "es la buena";
        }


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Roles";

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
        $data['breadcrumbs']['titulo'] = "Roles";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), array('Otro', '#'), array('Otro mas', '#'), 'Aqui mero');

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
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/editar_rol_modulo_permiso_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function eliminar_roles_usuario($prueba) {

        $this->load->model('agregaroladmin_model');
        $this->agregaroladmin_model->eliminar_usuario_rol($prueba);

        redirect(base_url() . "administrador/roles_admin", 'refresh');
    }

    public function eliminar_rol_permisos_modulo($idrol, $idmodulo) {
        $this->load->model('asignarol_model');
        $this->asignarol_model->eliminar_permisos_modulo($idrol, $idmodulo);

        redirect(base_url() . "administrador/roles_admin", 'refresh');
    }

    public function eliminar_rol_permisos_especifico_modulo() {
        //En proceso de probar este metodo
        $idrol=$_POST['idrolA'];
        $idmodulo=$_POST['idmoduloA'];
        $idpermiso=$_POST['idpermisoA'];
        $this->load->model('asignarol_model');
        $this->asignarol_model->eliminar_permisos_espefifico_modulo($idrol, $idmodulo,$idpermiso);

        redirect(base_url() . "administrador/roles_admin", 'refresh');
    }

    //------------------//////////////////////////////////////ASIGNAR ROL CON MÓDULO /////////////////////---------------------------
    public function asignar_rol() {

        //Validamos los campos del formulario
        $this->form_validation->set_rules('idrol', 'idrol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idmodulo', 'idmodulo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post

            $this->load->model('asignarol_model');

            //INSERTAMOS CUANTOS PERMISOS SE HAYAN SELECCIONADO
            foreach ($this->input->post('check') as $idpermiso) {
                $variable = $this->asignarol_model->existente_roles_modulo_permiso($this->input->post('idmodulo'), $this->input->post('idrol'), $idpermiso);
                if (is_null($variable)) {
                    $arr_asig_rol_modulo = array();
                    $arr_asig_rol_modulo['idrol'] = $this->input->post('idrol');
                    $arr_asig_rol_modulo['idmodulo'] = $this->input->post('idmodulo');
                    $arr_asig_rol_modulo['idpermiso'] = $idpermiso;
                    $arr_asig_rol_modulo['estatus'] = 1;
                    $this->asignarol_model->asignar_rol_modulo($arr_asig_rol_modulo);
                } else {
                    
                    
                }
            }
            redirect(base_url() . "administrador/roles_admin", 'refresh');
        } else {
            echo validation_errors();
        }
        
    }

    public function editar_roles_permiso_modulo($idrol, $idmodulo) {
        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('asignarol_model');


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Roles";
        $data['permodulo'] = $this->asignarol_model->prueba2($idrol, $idmodulo);
        //$data['permodulo'] = $this->asignarol_model->consultar_permisosmodulo_id($id);
        $arrPermisos = "";
        $arrPermisos = $data['permodulo'];
        $data['scripts'] = array();
        //$data['scripts'][] = 'validacionesRolUsuario';
        $data['scripts'][] = 'cargar_permisos';


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
        $data['breadcrumbs']['titulo'] = "Roles";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de roles por módulo', base_url().'administrador/roles_admin'),array('Editar permisos', '#'));

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        
        $a=$data['valor']->rol;
        $data['modulos']= $this->login_model->cargar_modulos2($a);
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }
        
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/editar_rol_modulo_permiso_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        //echo $data['permodulo'][0];
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar_roles_modulo_permisos_post() {
        //Validamos los campos del formulario
        $this->form_validation->set_rules('idrol', 'idrol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idmodulo', 'idmodulo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');
        $this->form_validation->set_rules('check[]', 'check[]', 'trim|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post

            $this->load->model('asignarol_model');
            
            $idrol=$this->input->post('idrol');
            $idmodulo=$this->input->post('idmodulo');
            //Borrado de permisos
            $this->asignarol_model->eliminar_permisos_modulo($idrol, $idmodulo);

            //INSERTAMOS CUANTOS PERMISOS SE HAYAN SELECCIONADO
            foreach ($this->input->post('check') as $idpermiso) {
                $variable = $this->asignarol_model->existente_roles_modulo_permiso($this->input->post('idmodulo'), $this->input->post('idrol'), $idpermiso);
                if (is_null($variable)) {
                    $arr_asig_rol_modulo = array();
                    $arr_asig_rol_modulo['idrol'] = $this->input->post('idrol');
                    $arr_asig_rol_modulo['idmodulo'] = $this->input->post('idmodulo');
                    $arr_asig_rol_modulo['idpermiso'] = $idpermiso;
                    $arr_asig_rol_modulo['estatus'] = 1;
                    $this->asignarol_model->asignar_rol_modulo($arr_asig_rol_modulo);
                } else {
                    
                    
                }
            }
            redirect(base_url() . "administrador/roles_admin", 'refresh');
        } else {
            echo validation_errors();
        }
    }

    public function editar_roles_modulo_permisos() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        foreach ($this->input->post('check') as $nom) {
            $this->load->model('login_model');
            $this->load->model('asignarol_model');
            $nom = $this->input->post('check[]');
            $id = $this->input->post('idRolPer');
            $variable = $this->asignarol_model->existente_roles_modulo_permiso($idpermiso);
        }

        if (!is_null($variable)) {
            $this->session->set_flashdata('rol_incorrecta', 'El permiso ya existe');
            redirect(base_url() . 'administrador/roles_admin/editar_roles_permiso_modulo/' . $id, 'refresh');
        } else {

            $this->asignarol_model->editar_roles_modulo_permiso($id, $idpermiso);
            redirect(base_url() . "administrador/roles_admin", 'refresh');
            //echo "es la buena";
        }


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Roles";

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
        $data['breadcrumbs']['titulo'] = "Roles";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), array('Otro', '#'), array('Otro mas', '#'), 'Aqui mero');

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
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/editar_rol_modulo_permiso_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

