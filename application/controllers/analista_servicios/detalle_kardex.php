<?php
/**
 * Controlador de detalle de kardex de media
 * superior y superiores
 *
 * Mostrara la vista de kardex donde se visualizaran
 *  los kardex para los alumnos de escuelas media
 * superiores y superiores.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /app/detalle_kardex_mediasup_superior
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage app 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */
class detalle_kardex extends CI_Controller{
    
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

        if (!$this->session->userdata('is_login')) {
            redirect(base_url()."login", 'refresh');
        }
        $this->load->model('notificacion_model');
        $this->load->model('filtrados_escolar_model');
    }

    public function  mostrar_kardex_alumno($idinstitucion, $idnivel, $idalumno) {

        /**
        Modelo para consultar el rol del usuario que inicio sesión
        */
        $this->load->model('login_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        
        $data = array();
        /*
         * parametro  que se manda a la vista para vfisualizar el 
         * titulo de la pagina
         */
        $data['titulo'] = app_title() . " | Trámite de Kardex";
        
        /**
        Invocar la consulta para saber el rol del usuario
        */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['idinstitucion'] = $idinstitucion;
        $data['encabezado_kardex'] = $this->filtrados_escolar_model->encabezado_kardex_alumno($idinstitucion, $idnivel, $idalumno);
        $data['calificaciones_kardex'] = $this->filtrados_escolar_model->consultar_kardex_alumno($idnivel, $idalumno);
        
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
        $data['breadcrumbs']['titulo'] = "Trámite de Kardex";
        $data['breadcrumbs']['subtitulo'] = "";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de alumnos', base_url() .'analista_servicios/gestion_alumnos'), array('Lista de periodos', base_url() .'analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/'. $idinstitucion . '/' . $idnivel . '/' . $idalumno), 'Trámite de Kardex');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/detalle_kardex_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
}
