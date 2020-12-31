<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportes_incorporacion
 *
 * @author UTEQ
 */
class reportes_incorporacion extends CI_Controller {
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
    }

    public function index(){

        /**
        Modelo para consultar el rol del usuario que inicio sesión
        */
        $this->load->model('login_model');
         $this->load->model('reportes_incorporacion_model');
         
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        
        $data = array();
        $data['titulo'] = app_title() . " | Reportes";
        
        
        $data['scripts'] = array();
        $data['tramites_recibidos_amealco_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2312,15);
        $data['tramites_recibidos_amealco_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2312,16);
        $data['tramites_recibidos_amealco_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2312);
        
        $data['tramites_recibidos_arro_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2313,15);
        $data['tramites_recibidos_arro_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2313,16);
        $data['tramites_recibidos_arro_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2313);
        
        $data['tramites_recibidos_cade_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2314,15);
        $data['tramites_recibidos_cade_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2314,16);
        $data['tramites_recibidos_cade_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2314);
        
        $data['tramites_recibidos_col_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2315,15);
        $data['tramites_recibidos_col_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2315,16);
        $data['tramites_recibidos_col_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2315);
        
        $data['tramites_recibidos_corre_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2316,15);
        $data['tramites_recibidos_corre_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2316,16);
        $data['tramites_recibidos_corre_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2316);
        
        $data['tramites_recibidos_marq_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2317,15);
        $data['tramites_recibidos_marq_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2317,16);
        $data['tramites_recibidos_marq_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2317);
        
        $data['tramites_recibidos_eze_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2318,15);
        $data['tramites_recibidos_eze_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2318,16);
        $data['tramites_recibidos_eze_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2318);
        
        $data['tramites_recibidos_hui_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2319,15);
        $data['tramites_recibidos_hui_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2319,16);
        $data['tramites_recibidos_hui_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2319);
        
        $data['tramites_recibidos_jal_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2320,15);
        $data['tramites_recibidos_jal_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2320,16);
        $data['tramites_recibidos_jal_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2320);
        
        $data['tramites_recibidos_lan_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2321,15);
        $data['tramites_recibidos_lan_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2321,16);
        $data['tramites_recibidos_lan_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2321);
        
        $data['tramites_recibidos_ped_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(23122,15);
        $data['tramites_recibidos_ped_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2322,16);
        $data['tramites_recibidos_ped_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2322);
        
        $data['tramites_recibidos_pen_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2323,15);
        $data['tramites_recibidos_pen_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2323,16);
        $data['tramites_recibidos_pen_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2323);
        
        $data['tramites_recibidos_pin_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2324,15);
        $data['tramites_recibidos_pin_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2324,16);
        $data['tramites_recibidos_pin_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2324);
        
        $data['tramites_recibidos_qro_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2325,15);
        $data['tramites_recibidos_qro_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2325,16);
        $data['tramites_recibidos_qro_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2325);
        
        $data['tramites_recibidos_sjoa_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2326,15);
        $data['tramites_recibidos_sjoa_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2326,16);
        $data['tramites_recibidos_sjoa_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2326);
        
        $data['tramites_recibidos_sjr_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2327,15);
        $data['tramites_recibidos_sjr_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2327,16);
        $data['tramites_recibidos_sjr_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2327);
        
        $data['tramites_recibidos_teq_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2328,15);
        $data['tramites_recibidos_teq_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2328,16);
        $data['tramites_recibidos_teq_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2328);
        
        $data['tramites_recibidos_tol_ms']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2329,15);
        $data['tramites_recibidos_tol_s']=$this->reportes_incorporacion_model->consultar_tramites_recibidos(2329,16);
        $data['tramites_recibidos_tol_b']=$this->reportes_incorporacion_model->consultar_tramites_recibidos_basica(2329);
        
        $data['tramites_recibidos_nivel_basica'] = $this->reportes_incorporacion_model->consultar_tramites_recibidos_nivel_basica();
        $data['tramites_recibidos_nivel_medias'] = $this->reportes_incorporacion_model->consultar_tramites_recibidos_nivel_medias();
        $data['tramites_recibidos_nivel_superior'] = $this->reportes_incorporacion_model->consultar_tramites_recibidos_nivel_superior();
        
        $data['acuerdos_2019_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2019);
        $data['acuerdos_2019_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2019);
        $data['acuerdos_2019_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2019);
        
        $data['acuerdos_2018_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2018);
        $data['acuerdos_2018_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2018);
        $data['acuerdos_2018_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2018);
        
        $data['acuerdos_2017_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2017);
        $data['acuerdos_2017_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2017);
        $data['acuerdos_2017_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2017);
        
        $data['acuerdos_2016_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2016);
        $data['acuerdos_2016_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2016);
        $data['acuerdos_2016_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2016);
        
        $data['acuerdos_2015_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2015);
        $data['acuerdos_2015_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2015);
        $data['acuerdos_2015_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2015);
        
        $data['acuerdos_2014_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2014);
        $data['acuerdos_2014_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2014);
        $data['acuerdos_2014_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2014);
        
        $data['acuerdos_2013_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2013);
        $data['acuerdos_2013_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2013);
        $data['acuerdos_2013_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2013);
        
        $data['acuerdos_2012_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2012);
        $data['acuerdos_2012_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2012);
        $data['acuerdos_2012_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2012);
        
        $data['acuerdos_2011_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2011);
        $data['acuerdos_2011_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2011);
        $data['acuerdos_2011_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2011);
        
        $data['acuerdos_2010_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2010);
        $data['acuerdos_2010_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2010);
        $data['acuerdos_2010_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2010);
        
        $data['acuerdos_2009_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2009);
        $data['acuerdos_2009_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2009);
        $data['acuerdos_2009_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2009);
        
        $data['acuerdos_2008_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2008);
        $data['acuerdos_2008_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2008);
        $data['acuerdos_2008_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2008);
        
        $data['acuerdos_2007_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2007);
        $data['acuerdos_2007_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2007);
        $data['acuerdos_2007_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2007);
        
        $data['acuerdos_2006_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2006);
        $data['acuerdos_2006_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2006);
        $data['acuerdos_2006_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2006);
        
        $data['acuerdos_2005_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2005);
        $data['acuerdos_2005_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2005);
        $data['acuerdos_2005_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2005);
        
        $data['acuerdos_2004_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2004);
        $data['acuerdos_2004_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2004);
        $data['acuerdos_2004_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2004);
        
        $data['acuerdos_2003_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2003);
        $data['acuerdos_2003_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2003);
        $data['acuerdos_2003_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2003);
        
        $data['acuerdos_2002_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2002);
        $data['acuerdos_2002_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2002);
        $data['acuerdos_2002_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2002);
        
        $data['acuerdos_2001_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2001);
        $data['acuerdos_2001_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2001);
        $data['acuerdos_2001_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2001);
        
        $data['acuerdos_2000_b']=$this->reportes_incorporacion_model->acuerdos_anio_b(2000);
        $data['acuerdos_2000_ms']=$this->reportes_incorporacion_model->acuerdos_anio_ms(2000);
        $data['acuerdos_2000_s']=$this->reportes_incorporacion_model->acuerdos_anio_s(2000);
        
        $data['scripts'][] = 'scriptEliminarCatalogoPeriodo';
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
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Listado de reportes";
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
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
//        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo2\analista_servicios\periodo_analista_view', $data, TRUE);
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/reportes_incorporacion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
}
