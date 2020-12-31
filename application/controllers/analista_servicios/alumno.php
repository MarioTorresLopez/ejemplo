<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumno_analista
 *
 * @author UTEQ
 */
class alumno extends CI_Controller {

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
        $this->load->model('filtrados_escolar_model');
        $this->load->model('carrera_model');
        $this->load->model('especialidad_model');
        $this->load->model('grupos_acuerdo_model');
        $this->load->model('turno_model');
    }

    //put your code here
    public function index() {
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');

        $data = array();
        ;
        $data['titulo'] = app_title() . " | Alumno";

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

        $data['scripts'] = array();
        $data['scripts'][] = 'eliminar_alumno_analistaS';

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
        $data['breadcrumbs']['titulo'] = "Lista de alumnos";
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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo2\analista_servicios\alumno_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar($idinscripcion) {

        $this->load->model('login_model');
        $data = array();
        $data['titulo'] = app_title() . " | Editar alumno";

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['datos_alumno'] = $this->filtrados_escolar_model->consultar_datos_alumno($idinscripcion);

        $infomacion_alumno = $this->filtrados_escolar_model->consultar_datos_alumno($idinscripcion);
        $idacuerdo = $infomacion_alumno->idacuerdo;

        $data['carreras'] = $this->carrera_model->consultar_carreras();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['grupos_acuerdo'] = $this->grupos_acuerdo_model->consultar_grupos_acuerdo($idacuerdo);
        $data['turnos'] = $this->turno_model->lista_turnos();


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
        $data['breadcrumbs']['titulo'] = "Editar alumno";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión de alumnos', base_url() . 'analista_servicios/gestion_alumnos'), array('Lista de periodos', base_url() . 'analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/' . $infomacion_alumno->idinstitucion . '/' . $infomacion_alumno->idnivel . '/' . $infomacion_alumno->idalumno), 'Editar alumno');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo2\analista_servicios\alumno_editar_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar_datos_alumno() {

        $this->form_validation->set_rules('carrera', 'carrera', 'trim|required|xss_clean');
        $this->form_validation->set_rules('especialidad', 'especialidad', 'trim|required|xss_clean');
        $this->form_validation->set_rules('grupo', 'grupo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('turno', 'turno', 'trim|required|xss_clean');

        //Si pasamos la validación
        if ($this->form_validation->run()) {

            $idinscripcion = $this->input->post('id_inscripcion');

            if ($this->input->post('especialidad') === 'N/A') {

                $arr_incripcion_alumno = array(
                    'idcarrera' => $this->input->post('carrera'),
                    'idga' => $this->input->post('grupo'),
                    'idturno' => $this->input->post('turno')
                );

                $this->filtrados_escolar_model->editar_incripcion_alumno($idinscripcion, $arr_incripcion_alumno);
                $infomacion_alumno = $this->filtrados_escolar_model->consultar_datos_alumno($idinscripcion);

                redirect(base_url() . "analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/" . $infomacion_alumno->idinstitucion . '/' . $infomacion_alumno->idalumno, 'refresh');
                            
            } else {

                $arr_incripcion_alumno = array(
                    'idcarrera' => $this->input->post('carrera'),
                    'idespecialidad' => $this->input->post('especialidad'),
                    'idga' => $this->input->post('grupo'),
                    'idturno' => $this->input->post('turno')
                );

                $this->filtrados_escolar_model->editar_incripcion_alumno($idinscripcion, $arr_incripcion_alumno);
                $infomacion_alumno = $this->filtrados_escolar_model->consultar_datos_alumno($idinscripcion);

                redirect(base_url() . "analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/" . $infomacion_alumno->idinstitucion . '/' . $infomacion_alumno->idalumno, 'refresh');
                            
            }
        }
    }

}
