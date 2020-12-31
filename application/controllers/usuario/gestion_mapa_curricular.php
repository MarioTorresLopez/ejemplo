<?php

/**
 * Controlador para la vista de gestión de mapa curricular
 *
 * Clase que visualiza los mapa(s) curricular(es) del plan de estudios
 * 
 * @since 1.0
 * @version 1.0
 * @link   /
 * @global constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package application.controllers
 * @subpackage NA 
 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses ./application/config/autoload.php ???
 * @see ./system/core/Controller.php  
 */

class gestion_mapa_curricular extends CI_Controller {

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
        $this->load->model('login_model');
        $this->load->model('notificacion_model');
        $this->load->model('acuerdo_model');
        $this->load->model('institucion_model');
        $this->load->model('planestudios_model');
        $this->load->model('periodo_model');
        $this->load->model('noperiodo_model');
        $this->load->model('mapa_curricular_model');
    }

    /**
     * Función que permite acceder al panel administrativo de la institución
     * 
     * Incluye la vista para la sección de gestión de planes de estudio.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_planes_estudios
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function mc_pe($idpe) {

        /**
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        //Validar las notificaciones por usuario
        $a = $data['valor']->rol;
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
        $data['mapas_curriculares'] = $this->mapa_curricular_model->consultar_mapas_curriculares($idpe);
        $data['periodos'] = $this->periodo_model->lista_de_periodo();
        $data['noperiodos'] = $this->noperiodo_model->consultar_noperiodo();
        
        $datos_institucion = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $id_institucion = $datos_institucion->idinstitucion;
        $data['plan_estudios'] = $this->planestudios_model->consultar_plan($id_institucion, $idpe);

        
        $data['scripts'] = array();
        $data['scripts'][] = 'validarMapaCurricular';
        
        $data['titulo'] = app_title() . " | Mapa curricular";

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = FALSE;

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
        $data['breadcrumbs']['titulo'] = "Gestión de mapa curricular";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Planes de estudio', base_url() .'usuario/gestion_planes_estudios'), 'Mapa curricular');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/usuario/gestion_mapa_curricular_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function crear_mapa_curricular() {
        
        $this->form_validation->set_rules('mapa_curricular', 'mapa_curricular', 'trim|required|xss_clean');
        $this->form_validation->set_rules('periodo', 'periodo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_periodo', 'no_periodo', 'trim|required|xss_clean');
        

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            
            $hoy = date("Y/m/d");
            $idpe = $this->input->post('id_pe');
            
            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            $arr_map_cur = array();
            $arr_map_cur['mapacurricular'] = $this->input->post('mapa_curricular');
            $arr_map_cur['idperiodo'] = $this->input->post('periodo');
            $arr_map_cur['estatus'] = 1;
            $arr_map_cur['fechamodificacion'] = $hoy;
            $arr_map_cur['usuariomodificacion'] = $this->session->userdata('idusu');
            $arr_map_cur['idpe'] = $this->input->post('id_pe');
            $arr_map_cur['idnoperiodo'] = $this->input->post('no_periodo');
            
            $this->mapa_curricular_model->crear_mapa_curricular($arr_map_cur);
            
            redirect(base_url() . "usuario/gestion_mapa_curricular/mc_pe/" . $idpe, 'refresh');
            
        }
        
    }
    

}
