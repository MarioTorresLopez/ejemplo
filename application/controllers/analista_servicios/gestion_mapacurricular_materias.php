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
class gestion_mapacurricular_materias extends CI_Controller {

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
        $this->load->model('institucion_model');
        $this->load->model('planestudios_model');
        $this->load->model('mapa_curricular_model');
        $this->load->model('materia_model');
        $this->load->model('materias_model');
        $this->load->model('nivel_educativo_model');
        $this->load->model('tipo_educativo_model');
        $this->load->model('especialidad_model');
        $this->load->model('modalidad_model');
        $this->load->model('periodo_model');
        $this->load->model('noperiodo_model');
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
    public function mc_materias($idinstitucion, $idpe, $idmc) {

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

        $data['plan_estudios'] = $this->planestudios_model->consultar_plan($idinstitucion, $idpe);
        $data['mapa_curricular'] = $this->mapa_curricular_model->consultar_mc($idmc, $idpe);
        $data['idinstitucion'] = $idinstitucion;
        $data['materias'] = $this->materia_model->consultar_materias();

        $data['materias_mc'] = $this->materias_model->consultar_materias_mc_anterior($idmc);


        $data['scripts'] = array();
        $data['scripts'][] = 'validarMateriaMapaCurricular';
        $data['scripts'][] = 'validarMapaCurricularAnterior';
        $data['scripts'][] = 'eliminarMateriaMapaCurricular';

        $data['titulo'] = app_title() . " | Materias";

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
        $data['breadcrumbs']['titulo'] = "Gestión de materias";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Consultar instituciones', base_url() . 'analista_servicios/gestion_instituciones'), array('Planes de estudio', base_url() . 'analista_servicios/gestion_planes_estudios/institucion/' . $idinstitucion), array('Gestión de mapa curricular', base_url() . 'analista_servicios/gestion_mapa_curricular/mc_pe/' . $idinstitucion . '/' . $idpe), 'Gestión de materias');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_mapacurricular_materias_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_mapa_curricular_materias() {

        $this->form_validation->set_rules('materia', 'materia', 'trim|required|xss_clean');


        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            $hoy = date("Y/m/d");
            $idmc = $this->input->post('id_mc');
            $idinstitucion = $this->input->post('id_institucion');
            $idpe = $this->input->post('id_pe');

            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            $arr_mat_map_cur = array();
            $arr_mat_map_cur['asignatura'] = $this->input->post('materia');
            $arr_mat_map_cur['estatus'] = 1;
            $arr_mat_map_cur['fechamodificacion'] = $hoy;
            $arr_mat_map_cur['usuariomodificacion'] = $this->session->userdata('idusu');
            $arr_mat_map_cur['idmc'] = $idmc;

            $this->materias_model->crear_materia_mc_anterior($arr_mat_map_cur);

            redirect(base_url() . "analista_servicios/gestion_mapacurricular_materias/mc_materias/" . $idinstitucion . '/' . $idpe . '/' . $idmc, 'refresh');
        }
    }

    public function eliminar($idmateria, $idmc, $idpe, $idinstitucion) {

        //Traer el modelo para eliminar registro, con la respectiva función
        $this->materias_model->eliminar_materia_mc_anterior($idmateria, $idmc);

        redirect(base_url() . "analista_servicios/gestion_mapacurricular_materias/mc_materias/" . $idinstitucion . '/' . $idpe . '/' . $idmc, 'refresh');
    }

    public function mc_materias_anteriores($idpe, $idmc) {

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

        $data['plan_estudios'] = $this->planestudios_model->consultar_plan_estudio($idpe);
        $data['mapa_curricular'] = $this->mapa_curricular_model->consultar_mc($idmc, $idpe);
        $data['materias'] = $this->materia_model->consultar_materias();

        $data['materias_mc'] = $this->materias_model->consultar_materias_mc_anterior($idmc);


        $data['scripts'] = array();
        $data['scripts'][] = 'validarMateriaMapaCurricularAnterior';
        $data['scripts'][] = 'eliminarMateriaMapaCurricularAnterior';

        $data['titulo'] = app_title() . " | Materias";

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
        $data['breadcrumbs']['titulo'] = "Gestión de materias";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Planes de estudio', base_url() . 'analista_servicios/gestion_planes_estudios/pe_anterior'), array('Gestión de mapa curricular', base_url() . 'analista_servicios/gestion_mapa_curricular/mc_pe_anterior/' . $idpe), 'Gestión de materias');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_mapacurricular_materias_anteriores_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function crear_mapa_curricular_materias_anterior() {

        $this->form_validation->set_rules('materias', 'materias', 'trim|required|xss_clean');


        //Si pasamos la validacion
        if ($this->form_validation->run()) {

//            $hoy = date("Y/m/d");
//            $idmc = $this->input->post('id_mc');
//            $idpe = $this->input->post('id_pe');
//            
//            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
//            $arr_mat_map_cur = array();
//            $arr_mat_map_cur['asignatura'] = $this->input->post('materia');
//            $arr_mat_map_cur['estatus'] = 1;
//            $arr_mat_map_cur['fechamodificacion'] = $hoy;
//            $arr_mat_map_cur['usuariomodificacion'] = $this->session->userdata('idusu');
//            $arr_mat_map_cur['idmc'] = $idmc;
//            
//            $this->materias_model->crear_materia_mc_anterior($arr_mat_map_cur);
//            
//            redirect(base_url() . "analista_servicios/gestion_mapacurricular_materias/mc_materias_anteriores/"  . $idpe . '/' . $idmc, 'refresh');

            $hoy = date("Y/m/d");
            $idmc = $this->input->post('id_mc');
            $idpe = $this->input->post('id_pe');
            $cadena = $this->input->post('materias');
            $array = explode(",", $cadena);

            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            foreach ($array as $idpermiso) {
                $arr_mat_map_cur = array();
                $arr_mat_map_cur['asignatura'] = $idpermiso;
                $arr_mat_map_cur['estatus'] = 1;
                $arr_mat_map_cur['fechamodificacion'] = $hoy;
                $arr_mat_map_cur['usuariomodificacion'] = $this->session->userdata('idusu');
                $arr_mat_map_cur['idmc'] = $idmc;

                $this->materias_model->crear_materia_mc_anterior($arr_mat_map_cur);
            }

            redirect(base_url() . "analista_servicios/gestion_mapacurricular_materias/mc_materias_anteriores/" . $idpe . '/' . $idmc, 'refresh');
        }
    }

    public function eliminar_anterior($idmateria, $idmc, $idpe) {

        //Traer el modelo para eliminar registro, con la respectiva función
        $this->materias_model->eliminar_materia_mc_anterior($idmateria, $idmc);

        redirect(base_url() . "analista_servicios/gestion_mapacurricular_materias/mc_materias_anteriores/" . $idpe . '/' . $idmc, 'refresh');
    }

    public function editar_mapa_curricular_anterior($idmc,$idpe) {
       
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
        $data['idmapa']=$idmc;
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

        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['tipos_educativos'] = $this->tipo_educativo_model->consultar_tipos_educativos();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();
        $data['mapa_curricular'] = $this->mapa_curricular_model->consultar_mapa_curricular($idmc);
        $data['periodos'] = $this->periodo_model->lista_de_periodo();
        $data['noperiodos'] = $this->noperiodo_model->consultar_noperiodo();
        $data['plan_estudios'] = $this->planestudios_model->consultar_plan_estudio($idpe);

        $data['scripts'] = array();
        $data['scripts'][] = 'validarMapaCurricularAnterior';
        $data['titulo'] = app_title() . " | Editar mapa curricular";

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
        $data['breadcrumbs']['titulo'] = "Editar mapa curricular";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Planes de estudios', base_url() . 'analista_servicios/gestion_mapa_curricular/mc_pe_anterior'), 'Editar mapa curricular');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/editar_mapa_curricular_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar_mapa_anterior() {

        $this->form_validation->set_rules('mapacurricular', 'mapacurricular', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_periodo', 'no_periodo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('periodo', 'periodo', 'trim|required|xss_clean');

        //Si pasamos la validacion
        //if ($this->form_validation->run()) {

            $hoy = date("Y/m/d");
            $idmc = $this->input->post('idmc');
            $idpe = $this->input->post('id_pe');

            //if ($this->input->post('id_especialidad') != 0) {


                //Creamos un arreglo para editar los datos
                $arr_edi_mapa_curri = array();
                $arr_edi_mapa_curri['mapacurricular'] = $this->input->post('mapa_curricular');
                $arr_edi_mapa_curri['idnoperiodo'] = $this->input->post('no_periodo');
                $arr_edi_mapa_curri['idperiodo'] = $this->input->post('periodo');


                $this->mapa_curricular_model->editar_mapa_curricular($arr_edi_mapa_curri, $idmc);

                redirect(base_url() . "analista_servicios/gestion_mapa_curricular/mc_pe_anterior/".$idpe, 'refresh');
            //}
        //}
    }

}
