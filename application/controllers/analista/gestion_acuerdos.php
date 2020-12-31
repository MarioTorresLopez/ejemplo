<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controlador para la gestion de acuerdos por parte del usuario Analista
 *
 * @author UTEQ
 */
class gestion_acuerdos extends CI_Controller {

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
        $this->load->model('nivel_educativo_model');
        $this->load->model('institucion_model');
        $this->load->model('plantel_model');
        $this->load->model('documento_model');
        $this->load->model('carrera_model');
        $this->load->model('especialidad_model');
        $this->load->model('acuerdo_model');
        $this->load->model('ciclo_escolar_model');
        $this->load->model('tipo_alumnado_model');
        $this->load->model('documento_model');
        $this->load->model('notificacion_model');
        $this->load->model('turno_model');
        $this->load->model('tipo_proceso_model');
        $this->load->model('propietario_model');
        $this->load->model('representante_model');
        $this->load->model('persona_moral_model');
    }

    /**
     * Función que permite acceder al panel administrativo de los acuerdos de las instituciones
     * 
     * Incluye la vista para la seccion de gestión de acuerdos.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_acuerdos/gestion_acuerdos
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function index() {
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');
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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['instituciones'] = $this->institucion_model->consultar_instituciones();
        $data['planteles'] = $this->plantel_model->consultar_planteles();
        $data['carreras'] = $this->carrera_model->consultar_carreras();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['scripts'] = array();
        $data['scripts'][] = 'filtradoAcuerdo';
        $data['titulo'] = app_title() . " | Acuerdos";

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
        $data['breadcrumbs']['titulo'] = "Gestión de acuerdos";
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/filtro_acuerdos_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function gestion() {

        $this->load->model('login_model');
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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos_documentos();
        $data['titulo'] = app_title() . " | Acuerdos";

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
        $data['breadcrumbs']['titulo'] = "Gestión de acuerdos";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), 'Gestión de acuerdos' );

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/gestion_acuerdos_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función que permite acceder al formulario de agregar acuerdo.
     * 
     * Incluye la vista que carga la inetrfaz grafica de un formulario para la creacion de un nuevo acuerdo.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_acuerdos/nuevo_acuerdo
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function nuevo_acuerdo($idins) {

        $this->load->model('login_model');

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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['institucion'] = $this->institucion_model->consultar_institucion_folio($idins);
        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['ciclos'] = $this->ciclo_escolar_model->consultar_ciclos_escolares();
        $data['alumnado'] = $this->tipo_alumnado_model->consultar_tipo_alumnado();
        $data['turnos'] = $this->turno_model->lista_turnos();
        $data['tipo_procesos'] = $this->tipo_proceso_model->consultar_tipo_proceso();
        $data['datos_prop'] = $this->propietario_model->consulta_datos_propietario($idins);
        $data['datos_repre'] = $this->representante_model->consultar_datos_representante($idins);
        $data['datos_persona_moral']= $this->persona_moral_model->consultar_personamoral($idins);
        
        $data['scripts'] = array();
        $data['scripts'][] = 'validarNuevoAcuerdo';
        $data['titulo'] = app_title() . " | Acuerdo";

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
        $data['breadcrumbs']['titulo'] = "Nuevo acuerdo";
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/registro_acuerdo_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función que permite acceder al panel de visualización de acuerdos.
     * 
     * Incluye la vista para la seccion de revisión de documentos de acuerdos.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_acuerdos/detalle_acuerdo
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function detalle_acuerdo($idacuerdo) {

        $this->load->model('login_model');
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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['validar_acuerdo'] = $this->acuerdo_model->consultar_acuerdo_documentos_carpeta($idacuerdo);
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['documentos'] = $this->documento_model->consultar_documentos_acuerdo_analista($idacuerdo);
        $data['idacu'] = $idacuerdo;
        $data['scripts'] = array();
        $data['scripts'][] = 'editarAcuerdoAnalista';
        $data['scripts'][] = 'mostrarDocumentoAnalista';
        $data['titulo'] = app_title() . " | Acuerdo";

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
        $data['breadcrumbs']['titulo'] = "Consulta de acuerdo";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de acuerdos', base_url().'analista/gestion_acuerdos/gestion'),'Detalle acuerdo');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/detalle_acuerdo_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función que permite acceder al panel de edición de acuerdos.
     * 
     * Incluye la vista para la seccion de edición de documentos de acuerdos.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link analista/gestion_acuerdos/editar
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function editar() {
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');
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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['titulo'] = app_title() . " | Acuerdo";

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
        $data['breadcrumbs']['titulo'] = "Edición";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de acuerdos', base_url().'analista/gestion_acuerdos/gestion'),array('Editar acuerdo', '#'));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/editar_acuerdo_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función que permite acceder al formulario de agregar acuerdo.
     * 
     * Incluye la vista que carga la interfaz grafica de un formulario 
     * para la creacion de un nuevo acuerdo.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_acuerdos/sec_nuevo_acuerdo
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function sec_nuevo_acuerdo() {

        $this->load->model('login_model');
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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['ciclos'] = $this->ciclo_escolar_model->consultar_ciclos_escolares();
        $data['alumnado'] = $this->tipo_alumnado_model->consultar_tipo_alumnado();
        $data['planteles'] = $this->plantel_model->consultar_planteles_sin_estatus();

        $data['scripts'] = array();
        $data['scripts'][] = 'validarAcuerdo';
        $data['titulo'] = app_title() . " | Acuerdo";

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
        $data['breadcrumbs']['titulo'] = "Nuevo acuerdo";
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/registro_acuerdo_sec_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función de documentacion_acuerdo
     * 
     * Incluye la vista que carga la interfaz grafica del formulario
     * que permite guardar los documentos solicitados al aspirante para
     * generar su acuerdo
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_acuerdos/documentacion_acuerdo
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function documentacion_acuerdo($idacuerdo, $idinstitucion) {

        $this->load->model('login_model');
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
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['validar_acuerdo'] = $this->acuerdo_model->consultar_acuerdo_documentos_existente($idacuerdo);
        $data['acuerdo'] = $this->acuerdo_model->consultar_acuerdo($idacuerdo);
        $data['institucion'] = $this->institucion_model->consultar_institucion_folio($idinstitucion);
        $data['scripts'] = array();
        $data['scripts'][] = 'validarDocumentos';
        $data['titulo'] = app_title() . " | Documentación del acuerdo";

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
        $data['breadcrumbs']['titulo'] = "Documentación del acuerdo";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Gestión de acuerdos', base_url().'analista/gestion_acuerdos/gestion'),'Documentación');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/registro_doc_acuerdo_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function registrar_acuerdo() {

        //Validación de los campos del formulario
        $this->form_validation->set_rules('numero_acuerdo', 'numero_acuerdo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('grupos_autorizado', 'grupos_autorizado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('persona', 'persona', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel', 'nivel', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciclo', 'ciclo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alumnado', 'alumnado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_vigente', 'fecha_vigente', 'trim|required|xss_clean');
        $this->form_validation->set_rules('documento_acuerdo', 'documento_acuerdo', 'trim|required|xss_clean');

        //Una vez validado el formulacio
        if ($this->form_validation->run()) {

            $persona = $this->input->post('persona');
            $hoy = date("Y/m/d");

            if ($persona === '1') {
                
                //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
                $arr_nue_acuer = array();
                $arr_nue_acuer['noacuerdo'] = $this->input->post('numero_acuerdo');
                $arr_nue_acuer['fisica'] = 1;
                $arr_nue_acuer['moral'] = 0; 
                $arr_nue_acuer['fechasupervision'] = $hoy;
                $arr_nue_acuer['fechaescrito'] = $hoy;
                $arr_nue_acuer['fechavigencia'] = $this->input->post('fecha_vigente');
                $arr_nue_acuer['estatus'] = 1;
                $arr_nue_acuer['idnivel'] = $this->input->post('nivel');
                $arr_nue_acuer['idiciclo'] = $this->input->post('ciclo');
                $arr_nue_acuer['alumnado'] = $this->input->post('alumnado');
                $arr_nue_acuer['gruposautorizado'] = $this->input->post('grupos_autorizado');
                
                $this->acuerdo_model->registrar_acuerdo($arr_nue_acuer);
                
                redirect(base_url() . 'analista/gestion_acuerdos', 'refresh');
                
            } else {
                
                //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
                $arr_nue_acuer = array();
                $arr_nue_acuer['noacuerdo'] = $this->input->post('numero_acuerdo');
                $arr_nue_acuer['fisica'] = 1;
                $arr_nue_acuer['moral'] = 0; 
                $arr_nue_acuer['fechasupervision'] = $hoy;
                $arr_nue_acuer['fechaescrito'] = $hoy;
                $arr_nue_acuer['fechavigencia'] = $this->input->post('fecha_vigente');
                $arr_nue_acuer['estatus'] = 1;
                $arr_nue_acuer['idnivel'] = $this->input->post('nivel');
                $arr_nue_acuer['idiciclo'] = $this->input->post('ciclo');
                $arr_nue_acuer['alumnado'] = $this->input->post('alumnado');
                $arr_nue_acuer['gruposautorizado'] = $this->input->post('grupos_autorizado');
                
                $this->acuerdo_model->registrar_acuerdo($arr_nue_acuer);
                
                redirect(base_url() . 'analista/gestion_acuerdos', 'refresh');
                
            }
            
        }
    }
    
    public function registrar_acuerdo_analista() {
        
        //Validación de los campos del formulario
        $this->form_validation->set_rules('numero_acuerdo', 'numero_acuerdo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('grupos_autorizado', 'grupos_autorizado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alumnos_autorizado', 'alumnos_autorizado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('turno', 'turno', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ciclo', 'ciclo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alumnado', 'alumnado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_inicio_vigencia', 'fecha_inicio_vigencia', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_fin_vigencia', 'fecha_fin_vigencia', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre_institucion', 'nombre_institucion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('clave_institucion', 'clave_institucion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('correo_institucion', 'correo_institucion', 'trim|required|xss_clean');

        //Una vez validado el formulario
        if ($this->form_validation->run()) {

            $persona = $this->input->post('persona');
            $hoy = date("Y/m/d");

            if ($persona === '1') {
                
                //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
                $arr_nue_acuer = array();
                $arr_nue_acuer['noacuerdo'] = $this->input->post('numero_acuerdo');
                $arr_nue_acuer['fisica'] = 1;
                $arr_nue_acuer['moral'] = 0; 
                $arr_nue_acuer['fechasupervision'] = $hoy;
                $arr_nue_acuer['fechaescrito'] = $this->input->post('fecha_inicio_vigencia');
                $arr_nue_acuer['fechavigencia'] = $this->input->post('fecha_fin_vigencia');
                $arr_nue_acuer['estatus'] = 1;
                $arr_nue_acuer['idnivel'] = $this->input->post('nivel');
                $arr_nue_acuer['idplantel'] = 0;
                $arr_nue_acuer['idiciclo'] = $this->input->post('ciclo');
                $arr_nue_acuer['alumnado'] = $this->input->post('alumnado');
                $arr_nue_acuer['inscripcion'] = 0;
                $arr_nue_acuer['turno'] = $this->input->post('turno');
                $arr_nue_acuer['gruposautorizado'] = $this->input->post('grupos_autorizado');
                $arr_nue_acuer['idpe'] = 0;
                $arr_nue_acuer['nombreinstitucion'] = $this->input->post('nombre_institucion');
                $arr_nue_acuer['alumnosautorizados'] = $this->input->post('alumnos_autorizado');
                $arr_nue_acuer['idinst'] = $this->input->post('idinstitucion');
                
                $this->acuerdo_model->registrar_acuerdo($arr_nue_acuer);
                
                $nombre_institucion = $this->input->post('nombre_institucion');
                $clave_institucion = $this->input->post('clave_institucion');
                $correo_institucion = $this->input->post('correo_institucion');
                $director_institucion = $this->input->post('director_institucion');
                $idinstitucion = $this->input->post('idinstitucion');
                $this->institucion_model->actualizar_nombre_institucion($nombre_institucion, $clave_institucion, $correo_institucion, $director_institucion, $idinstitucion);
                
                $idacuerdo = $this->acuerdo_model->consultar_ultimo_acuerdo();
                
                redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $idacuerdo->idacuerdo . '/' . $idinstitucion, 'refresh');
                
            } else {
                
                //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
                $arr_nue_acuer = array();
                $arr_nue_acuer['noacuerdo'] = $this->input->post('numero_acuerdo');
                $arr_nue_acuer['fisica'] = 0;
                $arr_nue_acuer['moral'] = 1; 
                $arr_nue_acuer['fechasupervision'] = $hoy;
                $arr_nue_acuer['fechaescrito'] = $this->input->post('fecha_inicio_vigencia');
                $arr_nue_acuer['fechavigencia'] = $this->input->post('fecha_fin_vigencia');
                $arr_nue_acuer['estatus'] = 1;
                $arr_nue_acuer['idnivel'] = $this->input->post('nivel');
                $arr_nue_acuer['idplantel'] = 0;
                $arr_nue_acuer['idciclo'] = $this->input->post('ciclo');
                $arr_nue_acuer['alumnado'] = $this->input->post('alumnado');
                $arr_nue_acuer['inscripcion'] = 0;
                $arr_nue_acuer['turno'] = $this->input->post('turno');
                $arr_nue_acuer['gruposautorizado'] = $this->input->post('grupos_autorizado');
                $arr_nue_acuer['idpe'] = 0;
                $arr_nue_acuer['nombreinstitucion'] = $this->input->post('nombre_institucion');
                $arr_nue_acuer['alumnosautorizados'] = $this->input->post('alumnos_autorizado');
                $arr_nue_acuer['idinst'] = $this->input->post('idinstitucion');
                
                $this->acuerdo_model->registrar_acuerdo($arr_nue_acuer);
                
                $nombre_institucion = $this->input->post('nombre_institucion');
                $clave_institucion = $this->input->post('clave_institucion');
                $correo_institucion = $this->input->post('correo_institucion');
                $director_institucion = $this->input->post('director_institucion');
                $idinstitucion = $this->input->post('idinstitucion');
                $this->institucion_model->actualizar_nombre_institucion($nombre_institucion, $clave_institucion, $correo_institucion, $director_institucion, $idinstitucion);
                
                $idacuerdo = $this->acuerdo_model->consultar_ultimo_acuerdo();
                
                redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $idacuerdo->idacuerdo . '/' . $idinstitucion, 'refresh');
                
            }
            
        }
    }
    

}
