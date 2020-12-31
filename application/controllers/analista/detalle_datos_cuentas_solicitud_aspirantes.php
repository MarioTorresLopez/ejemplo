<?php

/**
 * Description of detalle_datos_cuenta_solicitud_aspirantes
 *
 * @author UTEQ
 * 
 * Clase que visualiza los datos del usuario que solicita una cuenta para 
 * poder ingresqar al Sistema
 * 
 * @since 1.0
 * @version 1.0
 * @link   /
 * @global constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package application.controllers.administrador
 * @subpackage NA 
 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses ./application/config/autoload.php 
 * @see ./system/core/Controller.php 
 */
class detalle_datos_cuentas_solicitud_aspirantes extends CI_Controller {

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
        //Invocar los models necesarios para el proceso de aceptación de cuentas de aspirantes
        
        $this->load->model('login_model');
        $this->load->model('usuario_model');
        $this->load->model('solicitud_model');
        $this->load->model('roles_model');
        $this->load->model('notificacion_model');
        
    }

    /**
     * Función para la asignacion de folio, numero de expediente y contraseña 
     * 
     * Incluye la vista para visualizar los datos del usuario que esta solicitando un
     * acuerdo, ademas de asignación de folio, expediente y contraseña
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/public/usuario/detalle_datos_cuenta_aspirantes_view
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function solicitud($id) {

        /**
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */

        $data = array();
        
        /**
          Invocar la consulta para saber el rol del usuario
         */
        $idusuario = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($idusuario);

        //Validar las notificaciones por usuario
        $a = $data['valor']->rol;
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$idusuario); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        /*
         * parametro que indica que el controlador usa un archivo .js para 
         * realizar una funcion en la vista, por medio de jQuery
         * 
         * use ./static/admin/js/mostar_row_folio_expediente
         * 
         */
        $data['solicitud'] = $this->solicitud_model->consultar_solicitud_pendiente($id);
        $data['scripts'] = array();
        $data['scripts'][] = 'cancelarSolicitud';
        $data['scripts'][] = 'validarFechaSolicitud';
        
        /*
         * 
         */
        $data['titulo'] = app_title() . " | Detalle de datos";
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
        $data['breadcrumbs']['titulo'] = " Detalle de datos";
        $data['breadcrumbs']['subtitulo'] = "";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Aceptación de aspirantes', base_url().'analista/solicitud_de_cuentas_aspirantes'), 'Detalle de solicitud para cuenta');

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
        //$data['menus'] = $this->login_model->cargar_modulos();
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/detalle_datos_cuenta_aspirantes_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function registro_solicitud() {
        
        //Cambiar el estatus a la solicitud de cuenta 
        //Estatus=1 
        $idsolicitud = $this->input->post('id_solicitud');
        $this->solicitud_model->aceptar_cuenta($idsolicitud);
    
        
        $nombre = $this->input->post('nombre');
        $apellido1 = $this->input->post('apellido1');
        $apellido2 = $this->input->post('apellido2');
        $correousu = $this->input->post('correo');
        $passwordusu = $this->input->post('pass');
        $idusumod = $this->session->userdata('idusu');
        $hoy = date("Y/m/d");
        $nombrecompleto = $nombre . " " . $apellido1 . " " . $apellido2;
        
        $arr_reg_usuario = array();
        $arr_reg_usuario['nomusuario']  = $nombrecompleto;
        $arr_reg_usuario['correousu']   = $correousu;
        $arr_reg_usuario['passwordusu'] = $passwordusu;
        $arr_reg_usuario['estatus']     = 1;
        $arr_reg_usuario['fechamod']    = $hoy;
        $arr_reg_usuario['usuariomod']  = $idusumod;
        $arr_reg_usuario['idsolicitud'] = $idsolicitud;
        
        //registrar los datos del aspirante en la tabla de usuario
        $this->usuario_model->registrar_usuario($arr_reg_usuario);
        
        $idusuariodestino=$this->notificacion_model->ultimousuario();
        $arr_notificacion = array(
            "tipo" => 2,
            "leido" => 0,
            "idusuarioorigen" => $this->session->userdata('idusu'),
            "idrol" => 3,
            "idusuariodestino" => $idusuariodestino->id,
            "fecha" => date('Y-m-d H:i:s')
        );
        $this->notificacion_model->crear_notificacion($arr_notificacion);
        
        $arr_reg_rol_usuario = array();
        $arr_reg_rol_usuario['idrol'] = 3;
        $arr_reg_rol_usuario['fecinivigencia'] = $this->input->post('fecha_inicio');
        $arr_reg_rol_usuario['fecfinalvigencia'] = $this->input->post('fecha_fin');
        $arr_reg_rol_usuario['estatus'] = 1;
                
        //registrar el rol al usuario
        $this->roles_model->crear_rol_usuario($arr_reg_rol_usuario);

        redirect(base_url() . "analista/solicitud_de_cuentas_aspirantes", 'refresh');
         
    }
    
    public function generar_token($longitud = 16) {
        
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres);
        $token = '';
        for ($i = 0; $i < $longitud; $i++) {
            $token .= $caracteres[rand(0, $longitud_caracteres - 1)];
        }
       // return $token;
        return '87654321';
        
    }

    public function eliminar($id) {
        
        $this->solicitud_model->eliminar_solicitud($id);

        redirect(base_url() . "analista/solicitud_de_cuentas_aspirantes", 'refresh');
        
    }

}
