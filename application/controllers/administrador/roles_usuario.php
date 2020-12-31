<?php 
/**
 * Controlador para la sección de creación de usuario y asignacion de rol
 *
 * Clase que carga los modelos y vistas que pertenecen a la seccion de asignacion de roles por usuario
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


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class roles_usuario extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        if (!$this->session->userdata('is_login')) {
            redirect(base_url()."login", 'refresh');
            
        }
        $this->load->model('notificacion_model');
    }

    /**
     * ----
     * 
     * Incluye la vista para el modulo de gestión usuario y asignación de rol o roles
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/roles_usuario/gestion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    
    public function index() {

        
         $this->load->model('login_model');
         $this->load->model('roles_model');
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Rol por usuario";

        $data['scripts'] = array();
        $data['scripts'][] = 'validacionRoles';
        $data['scripts'][] = 'eliminar_usuario_admin';
       
        
        $data['roles'] = $this->roles_model->consultar_roles();
        $data['usuario_rol'] = $this->roles_model->consultar_usuario_rol();
        

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
        $data['breadcrumbs']['titulo'] = "Rol por usuario";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de roles por usuario', ' '));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/roles_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
        
    }
    
     public function crear_rol() {
         
            //Validamos los campos del formulario
        $this->form_validation->set_rules('nombreRol', 'nombreRol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('correoRol', 'correoRol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idrol', 'idrol', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fechainivig', 'fechainivig', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fechafinvig', 'fechafinvig', 'trim|required|xss_clean');
  
        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
            
            $hoy = date("Y/m/d");
            $arr_ins_usurario = array();
            $arr_ins_usurario['nomusuario'] = $this->input->post('nombreRol');
            $arr_ins_usurario['correousu'] = $this->input->post('correoRol');
            $arr_ins_usurario['passwordusu'] =  md5($this->input->post('password'));
            //$arr_ins_usurario['idrol'] =$this->input->post('idrol');
            $arr_ins_usurario['usuariomodificacion'] = $this->session->userdata('idusu');
            $arr_ins_usurario['fechamod'] = $hoy;
            $arr_ins_usurario['estatus'] = 1;
            
            $this->load->model('usuario_model');    
            $this->usuario_model->crear_rolUsuario($arr_ins_usurario);
            
            
            $arr_ins_rolUsu = array();
            $arr_ins_rolUsu['idrol'] = $this->input->post('idrol');
            $arr_ins_rolUsu['fecinivigencia'] = $this->input->post('fechainivig');
            $arr_ins_rolUsu['fecfinalvigencia'] = $this->input->post('fechafinvig');
            $arr_ins_rolUsu['estatus'] = 1;
      
             $this->load->model('roles_model');    
            
            $this->roles_model->crear_rol($arr_ins_rolUsu);
            $this->roles_model->crear_idUsuario_aRol($arr_ins_rolUsu);
         
             redirect(base_url() . "administrador/roles_usuario", 'refresh');
             
                 if(!is_null($variable)){

                if($variable->estatus==0){
                    //echo "Aqui";
                    $idact = $variable->idusuario;
                    $this->roles_model->activar_usuario_rol($idact);
                    redirect(base_url()."administrador/roles_usuario", 'refresh');
                }
                else{
                    $this->session->set_flashdata('rol_incorrecto', 'El usuario ya existe');
                    redirect(base_url() . 'administrador/roles_model', 'refresh');
                }
                //$this->session->set_flashdata('modalidad_incorrecta', 'La modalidad ya existe');
                //redirect(base_url() . 'administrador/modalidad', 'refresh');

            } else {

//                $this->modalidad_model->crear_modalidad($arr_ins_usurario);
//                $this->modalidad_model->crear_modalidad($arr_ins_rolUsu);
//                redirect(base_url()."administrador/roles_usuario", 'refresh');
                //echo "es la buena";
            }
             
             
        }
        
        else {
            echo validation_errors();
        }

    }

    
    /**
     * ----
     * 
     * Incluye la vista para el modulo de edicion de datos del usuario
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /incorporacion/roles_usuario/editar_roles_usuario
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */

    public function editar_roles_usuario($id) {

        /**
        Modelo para consultar el rol del usuario que inicio sesión
        */
        $this->load->model('login_model');
        $this->load->model('roles_model');
        
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['rol'] = $this->roles_model->consultar_usuario_roles($id);
        $data['roles'] = $this->roles_model->consultar_roles();
        $data['titulo'] = app_title() . " | Editar por usuario";

        $data['scripts'] = array();
        $data['scripts'][] = 'validacionRoles';
        
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

//        $data['scripts'] = array();
//        $data['scripts'][] = 'eliminar_rol_admin';
//        $data['scripts'][] = 'validacionRoles';
//        
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
        $data['breadcrumbs']['titulo'] = "Rol por usuario";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de roles por usuario', base_url().'administrador/roles_usuario'),array('Editar usuario', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Roles/editar_roles_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
        
    }
    
     public function editar_post(){
        $this->load->model('roles_model');
        $nom=$this->input->post('nombreRol');
        $correo=$this->input->post('correoRol');
        $id=$this->input->post('idRol');
        $idrol=$this->input->post('idrolnuevo');
        
            
        $variable = $this->roles_model->existente_usuario_rol($correo,$id);

            if(!is_null($variable)){
                $this->session->set_flashdata('rol_incorrecta', 'El correo ya existe');
                redirect(base_url() . 'administrador/roles_usuario/editar_roles_usuario/'.$id, 'refresh');
            } else {

                $this->roles_model->editar_usuario_rol($id,$nom,$correo);
                if($idrol!="---Seleccione---"){
                    $this->roles_model->editar_rol_usuario($idrol,$id);
                }
                redirect(base_url()."administrador/roles_usuario", 'refresh');
                //echo "es la buena";
            }
    }
    
    /**
     * ----
     * 
     * Incluye la vista para el modulo de eliminacion de datos del usuario
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /incorporacion/roles_usuario/eliminar_roles_usuario
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */

    public function eliminar_roles_usuario($prueba) {

          $this->load->model('roles_model');
        $this->roles_model->eliminar_usuario_rol($prueba);

        redirect(base_url()."administrador/roles_usuario", 'refresh');

    }
    
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */