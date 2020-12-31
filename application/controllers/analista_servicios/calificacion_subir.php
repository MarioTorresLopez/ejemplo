<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calificacion_analista
 *
 * @author UTEQ
 */
class calificacion_subir extends CI_Controller {

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
        $this->load->model('calificacion_model');
        $this->load->model('alumno_model');
        $this->load->model('materia_model');
        $this->load->model('carrera_model');
        $this->load->model('inscripcion_model');
    }

    //put your code here
    public function index() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Inicio";

        /*
         * arrays de js para las alertas
         */
        $data['scripts'] = array();
        $data['scripts'][] = 'eliminarCalificacion';
        $data['scripts'][] = 'aceptarCalificacionAnalista';
        $data['scripts'][] = 'subir_excel';

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


        //$data['scripts'][] = 'scriptEliminar';

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        $data['show_header'] = TRUE;

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
        $data['breadcrumbs']['titulo'] = "Subir calificación";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), 'Aqui mero');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/calificacion_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function calificacion_post() {
        require_once 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
        $val = $this->input->post('validador');
        $tabla_no_registradas = '';

        /**
         * Cargando el archivo en una variable para su lectura
         */
        $fileObj = PHPExcel_IOFactory::load('static/excel/fin/' . $val);
        $fileObj->setActiveSheetIndex(0);

        /**
         * Lectura del archivo
         */
        $sheetObj = $fileObj->setActiveSheetIndex(0)->getHighestRow();
        /**
         * Inicialización de variables para la matriz que contendra los datos del archivo
         */
        $fila1 = 0;
        /**
         * Declaración del array en el que se guardara los datos leidos
         */
        $excel = array();

        $acuerdo = $fileObj->getActiveSheet()->getCell('C5')->getCalculatedValue();
        $nivel = $fileObj->getActiveSheet()->getCell('C6')->getCalculatedValue();
        $clave_plan_estudios = $fileObj->getActiveSheet()->getCell('C7')->getCalculatedValue();
        $modalidad = $fileObj->getActiveSheet()->getCell('C8')->getCalculatedValue();
        $carrera = $fileObj->getActiveSheet()->getCell('C9')->getCalculatedValue();
        $ciclo_escolar = $fileObj->getActiveSheet()->getCell('C10')->getCalculatedValue();
        $escuela = $fileObj->getActiveSheet()->getCell('C11')->getCalculatedValue();
        $clave_centro_trabajo = $fileObj->getActiveSheet()->getCell('C12')->getCalculatedValue();
        $direccion = $fileObj->getActiveSheet()->getCell('C13')->getCalculatedValue();
        $telefono = $fileObj->getActiveSheet()->getCell('C14')->getCalculatedValue();
        $turno = $fileObj->getActiveSheet()->getCell('C15')->getCalculatedValue();
        $tipo = $fileObj->getActiveSheet()->getCell('C16')->getCalculatedValue();
        $correo = $fileObj->getActiveSheet()->getCell('C17')->getCalculatedValue();
        $director = $fileObj->getActiveSheet()->getCell('C18')->getCalculatedValue();
        $repre_legal = $fileObj->getActiveSheet()->getCell('C19')->getCalculatedValue();
        $estado = $fileObj->getActiveSheet()->getCell('C20')->getCalculatedValue();
        $municipio = $fileObj->getActiveSheet()->getCell('C21')->getCalculatedValue();

        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);

        for ($i = 26; $i < $sheetObj; $i ++) {

            $cell1 = $fileObj->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
            $excel[$fila1][0] = $cell1;
            $cell2 = $fileObj->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
            $excel[$fila1][1] = $cell2;
            $cell3 = $fileObj->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
            $excel[$fila1][2] = $cell3;
            $cell4 = $fileObj->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
            $excel[$fila1][3] = $cell4;
            $cell5 = $fileObj->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
            $excel[$fila1][4] = $cell5;
            $cell6 = $fileObj->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
            $excel[$fila1][5] = $cell6;
            $cell7 = $fileObj->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
            $excel[$fila1][6] = $cell7;
            $cell8 = $fileObj->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
            $excel[$fila1][7] = $cell8;
            $cell9 = $fileObj->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
            $excel[$fila1][8] = $cell9;
            $cell10 = $fileObj->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
            $excel[$fila1][9] = $cell10;
            $cell11 = $fileObj->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
            $excel[$fila1][10] = $cell11;
            $cell12 = $fileObj->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
            $excel[$fila1][11] = $cell12;
            $cell13 = $fileObj->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
            $excel[$fila1][12] = $cell13;
            $cell14 = $fileObj->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
            $excel[$fila1][13] = $cell14;
            $cell15 = $fileObj->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
            $excel[$fila1][14] = $cell15;
            $excel[$fila1][15] = $i;
            $fila1++;
        }

        $data = array();
        $result = substr($ciclo_escolar, 0, 4);
        $no_calificaciones = 0;
        $no_faltantes_calificaciones = 0;
        $alumnos = 0;
        $alumnos_noi = 0;
        $cont_alumnos = 0;
        $calificaciones_no_registradas = 0;
        $tabla_no_registradas .= "<div class='table-responsive'><table id='example2' class='table table-striped table-bordered table-hover'><thead><tr><th>Fila</th><th>Especialización</th><th>Periodo</th><th>Materia</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Curp</th><th>Grupo</th><th>Escuela procedencia</th><th>Tipo de ingreso</th><th>Calificación</th><th>Nomenclatura</th><th>Fecha examen</th><th>Estatus</th><th>Aprobación</th></tr></thead><tbody>";

        for ($cont = 0; $cont < $fila1; $cont++) {
            $data['alumno'] = $this->alumno_model->alumno_existente($excel[$cont][6]);
            //$data['materia'] = $this->materia_model->existente($excel[$cont][2]);
            $validar_carrera = $this->carrera_model->existente($carrera);
            $cadena = $excel[$cont][1];
            $array = explode(" ", $cadena);
            $tamanio = count($array);
//            if($tamanio > 1){
//                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
//                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
//
//                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);
//
//                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
//                $idmapa = $idmc->idmc;
//                
//                $validar_materia = $this->materia_model->existente($excel[$cont][2],$idmapa);
//                
//                if ($validar_materia == NULL) {
//                    
//                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);
//                    
//                    
//                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);
//                    $optativas = $this->calificacion_model->consultar_optativas($idplan->idpe);
//                    $optativas_plan = array();
//                    $cont_opt = 0;
//                    foreach ($optativas as $optativa) {
//                        $optativas_plan[$cont_opt] = $optativa->nomoptativa;
//                        $cont_opt++;
//                    }
//                    if (in_array($materia, $optativas_plan)) {
//                        $validar_materia = 'Existente';
//                    } else {
//                        $validar_materia = NULL;
//                    }
//                } else {
//                    $data['materia']=$validar_materia;
//                }
//            }
//            else{
//                
//            }
            if ($excel[$cont][11] == NULL) {
                $calificacion = 0;
            } else {
                $calificacion = $excel[$cont][11];
            }
            /**
             * Guardamos en otra variable el valor que contenga esa celda
             */
            $InvDate = $excel[$cont][13];
            /**
             * Pasamos ese valor a otra variable para realizar el calculo de la fecha
             */
            $xls_date = $InvDate;

            /**
             * Este claculo se realiza para saber la fecha que se encuentra en esa celda,
             * ya que algunos formatos de fecha marcan como numeros las fechas en las celdas
             */
            $unix_date = ($xls_date - 25569) * 86400;
            $xls_date = 25569 + ($unix_date / 86400);
            $unix_date = ($xls_date - 25568) * 86400;
            /**
             * En esta variable guardamos el valor obtenido de los calculos y transformamos al formato de fecha que queramos
             */
            $value = date("Y-m-d", $unix_date);

            $fecha_exa = $value;

            /*
             * Educación inicial
             */
            if ($idnivel->idnivel == 11) {
                
            }
            /*
             * Educación preescolar
             */
            if ($idnivel->idnivel == 12) {
                
            }
            /*
             * Educación primaria
             */
            if ($idnivel->idnivel == 13) {
                
            }
            /*
             * Educación secundaria
             */
            if ($idnivel->idnivel == 14) {
                
            }
            /*
             * #Educación Media superior
             */
            if ($idnivel->idnivel == 15) {
                /*
                 * Máximo de materias reprobadas por alumn@ por carrera
                 */
                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($data['alumno']->idalumno, $validar_carrera->idcarrera);
                //$reprobadas_periodo=$this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno,$validar_carrera->idcarrera);
                if ($tamanio > 1) {
                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }

                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                } else {
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo);
                    
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                }

                if ($reprobadas_carrera->reprobadas < 9) {
                    if ($reprobadas_periodo->reprobadas < 4) {
                        if ($validar_calificacion->oportunidades < 3) {
                            //if ($data['materia'] != NULL && $validar_carrera != NULL) {
                            //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria);
                            //if ($validar_calificacion == NULL) {
                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $arr_calificacion = array();
                            $arr_calificacion['calificacion'] = $calificacion;
                            $arr_calificacion['estatus'] = $excel[$cont][14];
                            $arr_calificacion['idciclo'] = $idciclo->idciclo;
                            $arr_calificacion['idcarrera'] = $validar_carrera->idcarrera;
                            if($var_aux==0){
                                $arr_calificacion['idmateria'] = $validar_materia->idmateria;
                                $arr_calificacion['idopt'] = 0;
                            }
                            else{
                                $arr_calificacion['idmateria'] = 0;
                                $arr_calificacion['idopt'] = $optativa->idoptativa;
                            }
                            //$arr_calificacion['idmateria'] = $data['materia']->idmateria;
                            $arr_calificacion['idalumno'] = $data['alumno']->idalumno;
                            $arr_calificacion['fechaexamen'] = $fecha_exa;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_calificacion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_calificacion['idnoperiodo'] = null;
                            }
                            $arr_calificacion['nomenclatura'] = $excel[$cont][12];
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_calificacion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_calificacion['idespecialidad'] = NULL;
                            }
                            $arr_calificacion['idnivel'] = $idnivel->idnivel;
                            $arr_calificacion['idingreso'] = $excel[$cont][9];
                            $this->calificacion_model->calificacion_inscripcion($arr_calificacion);
                            
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                $idmapa = $idmc->idmc;

                                $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                                $var_aux_d = 0;
                                if ($validar_materia == NULL) {
                                    /*
                                     * Buscar la optativa
                                     */
                                    $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                    $var_aux_d = 1;
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                                } else {
                                    /*
                                     * Si es materia con respecto a un mapa curricular
                                     */
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                                }

                                //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                $idmapa = $idmc->idmc;

                                $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                                $var_aux_d = 0;
                                if ($validar_materia == NULL) {
                                    /*
                                     * Buscar la optativa
                                     */
                                    $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                    $var_aux_d = 1;
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                                } else {
                                    /*
                                     * Si es materia con respecto a un mapa curricular
                                     */
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                                }


                                //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                            }
                            
                            if($validar_calificacion_despues->oportunidades==3){
                                if($var_aux_d==0){
                                    $ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$validar_materia->idmateria);
                                }
                                else{
                                    $ultima=$this->calificacion_model->ultima_calf_opt($data['alumno']->idalumno,$optativa->idoptativa);
                                }
                                //$ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$data['materia']->idmateria);
                                
                                if($ultima->calificacion<=5){
                                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,9);
                                }
                                else{
                                    
                                }
                            }
                            else{
                                
                            }
//                            } else {
//                                //echo 'Error la calificacion de ese alumno y esa materia ya existia';
//                            }
                            if ($cont == 0) {
                                $alumnos++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {
                                    $alumnos++;
                                }
                            }
                            $no_calificaciones++;
                        } else {
                            //Cantidad de oportunidades para esa materia excedido
                            $fila = $excel[$cont][15];
                            $especialidad_noi = $excel[$cont][0];
                            $periodo_noi = $excel[$cont][1];
                            $materia_noi = $excel[$cont][2];
                            $ap_noi = $excel[$cont][3];
                            $am_noi = $excel[$cont][4];
                            $nombres_noi = $excel[$cont][5];
                            $curp_noi = $excel[$cont][6];
                            $grupo_noi = $excel[$cont][7];
                            $escuela_noi = $excel[$cont][8];
                            $tipoingreso_noi = $excel[$cont][9];
                            $calificacion_noi = $excel[$cont][11];
                            $nomenclatura_noi = $excel[$cont][12];
                            $fechaexa_noi = $fecha_exa;
                            $estatus_noi = $excel[$cont][14];

                            $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                            $calificaciones_no_registradas++;
                            
                            //$this->calificacion_model->actualizar_alumno($data['alumno']->idalumno);

                            if ($cont == 0) {
                                $alumnos_noi++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {
                                    $alumnos_noi++;
                                }
                            }
                        }
                    } else {
                        //echo 'Limite de materias reprobadas por periodo excedida';
                        $fila = $excel[$cont][15];
                        $especialidad_noi = $excel[$cont][0];
                        $periodo_noi = $excel[$cont][1];
                        $materia_noi = $excel[$cont][2];
                        $ap_noi = $excel[$cont][3];
                        $am_noi = $excel[$cont][4];
                        $nombres_noi = $excel[$cont][5];
                        $curp_noi = $excel[$cont][6];
                        $grupo_noi = $excel[$cont][7];
                        $escuela_noi = $excel[$cont][8];
                        $tipoingreso_noi = $excel[$cont][9];
                        $calificacion_noi = $excel[$cont][11];
                        $nomenclatura_noi = $excel[$cont][12];
                        $fechaexa_noi = $fecha_exa;
                        $estatus_noi = $excel[$cont][14];

                        $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                        $calificaciones_no_registradas++;
                        
                        $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                        if ($cont == 0) {
                            $alumnos_noi++;
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $alumnos_noi++;
                            }
                        }
                    }
                } else {
                    //echo 'Limite de materias reprobadas por carrera excedida';
                    $fila = $excel[$cont][15];
                    $especialidad_noi = $excel[$cont][0];
                    $periodo_noi = $excel[$cont][1];
                    $materia_noi = $excel[$cont][2];
                    $ap_noi = $excel[$cont][3];
                    $am_noi = $excel[$cont][4];
                    $nombres_noi = $excel[$cont][5];
                    $curp_noi = $excel[$cont][6];
                    $grupo_noi = $excel[$cont][7];
                    $escuela_noi = $excel[$cont][8];
                    $tipoingreso_noi = $excel[$cont][9];
                    $calificacion_noi = $excel[$cont][11];
                    $nomenclatura_noi = $excel[$cont][12];
                    $fechaexa_noi = $fecha_exa;
                    $estatus_noi = $excel[$cont][14];

                    $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                    $calificaciones_no_registradas++;
                    
                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                    if ($cont == 0) {
                        $alumnos_noi++;
                    } else {
                        $aux = $cont - 1;
                        $comparar_anterior = $excel[$aux][6];
                        if ($excel[$cont][6] == $comparar_anterior) {
                            
                        } else {
                            $alumnos_noi++;
                        }
                    }
                }
            }
            /*
             * Educación Superior
             */
            if ($idnivel->idnivel == 16) {

                /*
                 * Máximo de materias reprobadas por alumn@ por carrera
                 */
                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($data['alumno']->idalumno, $validar_carrera->idcarrera);
                //$reprobadas_periodo=$this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno,$validar_carrera->idcarrera);
                if ($tamanio > 1) {
                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                } else {
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo);
                    
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                }

                if ($reprobadas_carrera->reprobadas < 11) {
                    if ($reprobadas_periodo->reprobadas < 4) {
                        if ($validar_calificacion->oportunidades < 3) {
                            //if ($data['materia'] != NULL && $validar_carrera != NULL) {
                            //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria);
                            //if ($validar_calificacion == NULL) {
                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $arr_calificacion = array();
                            $arr_calificacion['calificacion'] = $calificacion;
                            $arr_calificacion['estatus'] = $excel[$cont][14];
                            $arr_calificacion['idciclo'] = $idciclo->idciclo;
                            $arr_calificacion['idcarrera'] = $validar_carrera->idcarrera;
                            if($var_aux==0){
                                $arr_calificacion['idmateria'] = $validar_materia->idmateria;
                                $arr_calificacion['idopt'] = 0;
                            }
                            else{
                                $arr_calificacion['idmateria'] = 0;
                                $arr_calificacion['idopt'] = $optativa->idoptativa;
                            }
                            //$arr_calificacion['idmateria'] = $data['materia']->idmateria;
                            $arr_calificacion['idalumno'] = $data['alumno']->idalumno;
                            $arr_calificacion['fechaexamen'] = $fecha_exa;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_calificacion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_calificacion['idnoperiodo'] = null;
                            }
                            $arr_calificacion['nomenclatura'] = $excel[$cont][12];
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_calificacion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_calificacion['idespecialidad'] = NULL;
                            }
                            $arr_calificacion['idnivel'] = $idnivel->idnivel;
                            $arr_calificacion['idingreso'] = $excel[$cont][9];
                            $this->calificacion_model->calificacion_inscripcion($arr_calificacion);
                            
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                $idmapa = $idmc->idmc;

                                $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                                $var_aux_d = 0;
                                if ($validar_materia == NULL) {
                                    /*
                                     * Buscar la optativa
                                     */
                                    $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                    $var_aux_d = 1;
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                                } else {
                                    /*
                                     * Si es materia con respecto a un mapa curricular
                                     */
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                                }
                                
                                //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                $idmapa = $idmc->idmc;

                                $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                                $var_aux_d = 0;
                                if ($validar_materia == NULL) {
                                    /*
                                     * Buscar la optativa
                                     */
                                    $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                    $var_aux_d = 1;
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                                } else {
                                    /*
                                     * Si es materia con respecto a un mapa curricular
                                     */
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                                }
                                
                                //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                            }
                            
                            if($validar_calificacion_despues->oportunidades==3){
                                if($var_aux_d==0){
                                    $ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$validar_materia->idmateria);
                                }
                                else{
                                    $ultima=$this->calificacion_model->ultima_calf_opt($data['alumno']->idalumno,$optativa->idoptativa);
                                }
                                //$ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$data['materia']->idmateria);
                                
                                if($ultima->calificacion<=5){
                                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,9);
                                }
                                else{
                                    
                                }
                            }
                            else{
                                
                            }
//                            } else {
//                                //echo 'Error la calificacion de ese alumno y esa materia ya existia';
//                            }
                            if ($cont == 0) {
                                $alumnos++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {
                                    $alumnos++;
                                }
                            }
                            $no_calificaciones++;
                        } else {
                            //Cantidad de oportunidades para esa materia excedido
                            $fila = $excel[$cont][15];
                            $especialidad_noi = $excel[$cont][0];
                            $periodo_noi = $excel[$cont][1];
                            $materia_noi = $excel[$cont][2];
                            $ap_noi = $excel[$cont][3];
                            $am_noi = $excel[$cont][4];
                            $nombres_noi = $excel[$cont][5];
                            $curp_noi = $excel[$cont][6];
                            $grupo_noi = $excel[$cont][7];
                            $escuela_noi = $excel[$cont][8];
                            $tipoingreso_noi = $excel[$cont][9];
                            $calificacion_noi = $excel[$cont][11];
                            $nomenclatura_noi = $excel[$cont][12];
                            $fechaexa_noi = $fecha_exa;
                            $estatus_noi = $excel[$cont][14];

                            $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                            $calificaciones_no_registradas++;
                            
                            $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                            if ($cont == 0) {
                                $alumnos_noi++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {
                                    $alumnos_noi++;
                                }
                            }
                        }
                    } else {
                        //echo 'Limite de materias reprobadas por periodo excedida';
                        $fila = $excel[$cont][15];
                        $especialidad_noi = $excel[$cont][0];
                        $periodo_noi = $excel[$cont][1];
                        $materia_noi = $excel[$cont][2];
                        $ap_noi = $excel[$cont][3];
                        $am_noi = $excel[$cont][4];
                        $nombres_noi = $excel[$cont][5];
                        $curp_noi = $excel[$cont][6];
                        $grupo_noi = $excel[$cont][7];
                        $escuela_noi = $excel[$cont][8];
                        $tipoingreso_noi = $excel[$cont][9];
                        $calificacion_noi = $excel[$cont][11];
                        $nomenclatura_noi = $excel[$cont][12];
                        $fechaexa_noi = $fecha_exa;
                        $estatus_noi = $excel[$cont][14];

                        $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                        $calificaciones_no_registradas++;
                        
                        $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                        if ($cont == 0) {
                            $alumnos_noi++;
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $alumnos_noi++;
                            }
                        }
                    }
                } else {
                    //echo 'Limite de materias reprobadas por carrera excedida';
                    $fila = $excel[$cont][15];
                    $especialidad_noi = $excel[$cont][0];
                    $periodo_noi = $excel[$cont][1];
                    $materia_noi = $excel[$cont][2];
                    $ap_noi = $excel[$cont][3];
                    $am_noi = $excel[$cont][4];
                    $nombres_noi = $excel[$cont][5];
                    $curp_noi = $excel[$cont][6];
                    $grupo_noi = $excel[$cont][7];
                    $escuela_noi = $excel[$cont][8];
                    $tipoingreso_noi = $excel[$cont][9];
                    $calificacion_noi = $excel[$cont][11];
                    $nomenclatura_noi = $excel[$cont][12];
                    $fechaexa_noi = $fecha_exa;
                    $estatus_noi = $excel[$cont][14];

                    $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                    $calificaciones_no_registradas++;
                    
                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                    if ($cont == 0) {
                        $alumnos_noi++;
                    } else {
                        $aux = $cont - 1;
                        $comparar_anterior = $excel[$aux][6];
                        if ($excel[$cont][6] == $comparar_anterior) {
                            
                        } else {
                            $alumnos_noi++;
                        }
                    }
                }
            }
            
            /*
             * Educación Superior área salud
             */
            if ($idnivel->idnivel == 17) {

                /*
                 * Máximo de materias reprobadas por alumn@ por carrera
                 */
                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($data['alumno']->idalumno, $validar_carrera->idcarrera);
                //$reprobadas_periodo=$this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno,$validar_carrera->idcarrera);
                if ($tamanio > 1) {
                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                } else {
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo);
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                }

                if ($reprobadas_carrera->reprobadas < 11) {
                    if ($reprobadas_periodo->reprobadas < 4) {
                        if ($validar_calificacion->oportunidades < 3) {
                            //if ($data['materia'] != NULL && $validar_carrera != NULL) {
                            //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria);
                            //if ($validar_calificacion == NULL) {
                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $arr_calificacion = array();
                            $arr_calificacion['calificacion'] = $calificacion;
                            $arr_calificacion['estatus'] = $excel[$cont][14];
                            $arr_calificacion['idciclo'] = $idciclo->idciclo;
                            $arr_calificacion['idcarrera'] = $validar_carrera->idcarrera;
                            if($var_aux==0){
                                $arr_calificacion['idmateria'] = $validar_materia->idmateria;
                                $arr_calificacion['idopt'] = 0;
                            }
                            else{
                                $arr_calificacion['idmateria'] = 0;
                                $arr_calificacion['idopt'] = $optativa->idoptativa;
                            }
                            //$arr_calificacion['idmateria'] = $data['materia']->idmateria;
                            $arr_calificacion['idalumno'] = $data['alumno']->idalumno;
                            $arr_calificacion['fechaexamen'] = $fecha_exa;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_calificacion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_calificacion['idnoperiodo'] = null;
                            }
                            $arr_calificacion['nomenclatura'] = $excel[$cont][12];
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_calificacion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_calificacion['idespecialidad'] = NULL;
                            }
                            $arr_calificacion['idnivel'] = $idnivel->idnivel;
                            $arr_calificacion['idingreso'] = $excel[$cont][9];
                            $this->calificacion_model->calificacion_inscripcion($arr_calificacion);
                            
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                $idmapa = $idmc->idmc;

                                $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                                $var_aux_d = 0;
                                if ($validar_materia == NULL) {
                                    /*
                                     * Buscar la optativa
                                     */
                                    $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                    $var_aux_d = 1;
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                                } else {
                                    /*
                                     * Si es materia con respecto a un mapa curricular
                                     */
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                                }
                                
                                //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                                $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                $idmapa = $idmc->idmc;

                                $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                                $var_aux_d = 0;
                                if ($validar_materia == NULL) {
                                    /*
                                     * Buscar la optativa
                                     */
                                    $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                    $var_aux_d = 1;
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                                } else {
                                    /*
                                     * Si es materia con respecto a un mapa curricular
                                     */
                                    $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                                }
                                
                                //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                            }
                            
                            if($validar_calificacion_despues->oportunidades==3){
                                if($var_aux_d==0){
                                    $ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$validar_materia->idmateria);
                                }
                                else{
                                    $ultima=$this->calificacion_model->ultima_calf_opt($data['alumno']->idalumno,$optativa->idoptativa);
                                }
                                //$ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$data['materia']->idmateria);
                                
                                if($ultima->calificacion<=5){
                                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,9);
                                }
                                else{
                                    
                                }
                            }
                            else{
                                
                            }
//                            } else {
//                                //echo 'Error la calificacion de ese alumno y esa materia ya existia';
//                            }
                            if ($cont == 0) {
                                $alumnos++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {
                                    $alumnos++;
                                }
                            }
                            $no_calificaciones++;
                        } else {
                            //Cantidad de oportunidades para esa materia excedido
                            $fila = $excel[$cont][15];
                            $especialidad_noi = $excel[$cont][0];
                            $periodo_noi = $excel[$cont][1];
                            $materia_noi = $excel[$cont][2];
                            $ap_noi = $excel[$cont][3];
                            $am_noi = $excel[$cont][4];
                            $nombres_noi = $excel[$cont][5];
                            $curp_noi = $excel[$cont][6];
                            $grupo_noi = $excel[$cont][7];
                            $escuela_noi = $excel[$cont][8];
                            $tipoingreso_noi = $excel[$cont][9];
                            $calificacion_noi = $excel[$cont][11];
                            $nomenclatura_noi = $excel[$cont][12];
                            $fechaexa_noi = $fecha_exa;
                            $estatus_noi = $excel[$cont][14];

                            $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                            $calificaciones_no_registradas++;
                            
                            $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                            if ($cont == 0) {
                                $alumnos_noi++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {
                                    $alumnos_noi++;
                                }
                            }
                        }
                    } else {
                        //echo 'Limite de materias reprobadas por periodo excedida';
                        $fila = $excel[$cont][15];
                        $especialidad_noi = $excel[$cont][0];
                        $periodo_noi = $excel[$cont][1];
                        $materia_noi = $excel[$cont][2];
                        $ap_noi = $excel[$cont][3];
                        $am_noi = $excel[$cont][4];
                        $nombres_noi = $excel[$cont][5];
                        $curp_noi = $excel[$cont][6];
                        $grupo_noi = $excel[$cont][7];
                        $escuela_noi = $excel[$cont][8];
                        $tipoingreso_noi = $excel[$cont][9];
                        $calificacion_noi = $excel[$cont][11];
                        $nomenclatura_noi = $excel[$cont][12];
                        $fechaexa_noi = $fecha_exa;
                        $estatus_noi = $excel[$cont][14];

                        $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                        $calificaciones_no_registradas++;
                        
                        $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                        if ($cont == 0) {
                            $alumnos_noi++;
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $alumnos_noi++;
                            }
                        }
                    }
                } else {
                    //echo 'Limite de materias reprobadas por carrera excedida';
                    $fila = $excel[$cont][15];
                    $especialidad_noi = $excel[$cont][0];
                    $periodo_noi = $excel[$cont][1];
                    $materia_noi = $excel[$cont][2];
                    $ap_noi = $excel[$cont][3];
                    $am_noi = $excel[$cont][4];
                    $nombres_noi = $excel[$cont][5];
                    $curp_noi = $excel[$cont][6];
                    $grupo_noi = $excel[$cont][7];
                    $escuela_noi = $excel[$cont][8];
                    $tipoingreso_noi = $excel[$cont][9];
                    $calificacion_noi = $excel[$cont][11];
                    $nomenclatura_noi = $excel[$cont][12];
                    $fechaexa_noi = $fecha_exa;
                    $estatus_noi = $excel[$cont][14];

                    $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                    $calificaciones_no_registradas++;
                    
                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                    if ($cont == 0) {
                        $alumnos_noi++;
                    } else {
                        $aux = $cont - 1;
                        $comparar_anterior = $excel[$aux][6];
                        if ($excel[$cont][6] == $comparar_anterior) {
                            
                        } else {
                            $alumnos_noi++;
                        }
                    }
                }
            }
            
            if ($idnivel->idnivel == 18) {
                if ($tamanio > 1) {
                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                } else {
                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                    $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($data['alumno']->idalumno, $idperiodo->idperiodo);
                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                    $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                    $idmapa = $idmc->idmc;

                    $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                    $var_aux=0;
                    if($validar_materia==NULL){
                        /*
                         * Buscar la optativa
                         */
                        $optativa=$this->calificacion_model->consultar_optativa($excel[$cont][2],$idplan->idpe);
                        $var_aux=1;
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                    }
                    else{
                        /*
                         * Si es materia con respecto a un mapa curricular
                         */
                        $validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                    }
                    
                    //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                }
                if ($reprobadas_periodo->reprobadas < 5) {
                    $plan_estudios = $this->calificacion_model->consultar_plan($clave_plan_estudios);
                    if($plan_estudios->fechacreacion==1999 || $plan_estudios->fechacreacion==2002 || $plan_estudios->fechacreacion==2004 || $plan_estudios->fechacreacion==2012){
                        $oportunidades_normal=3;
                    }
                    else{
                        if($plan_estudios->fechacreacion!=2018){
                            $oportunidades_normal=4;
                        }
                        else{
                            $oportunidades_normal=2;
                        }
                    }
                    
                    if ($validar_calificacion->oportunidades < $oportunidades_normal) {
                        //if ($data['materia'] != NULL && $validar_carrera != NULL) {
                        //$validar_calificacion = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria);
                        //if ($validar_calificacion == NULL) {
                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                        $arr_calificacion = array();
                        $arr_calificacion['calificacion'] = $calificacion;
                        $arr_calificacion['estatus'] = $excel[$cont][14];
                        $arr_calificacion['idciclo'] = $idciclo->idciclo;
                        $arr_calificacion['idcarrera'] = $validar_carrera->idcarrera;
                        if ($var_aux == 0) {
                            $arr_calificacion['idmateria'] = $validar_materia->idmateria;
                            $arr_calificacion['idopt'] = 0;
                        } else {
                            $arr_calificacion['idmateria'] = 0;
                            $arr_calificacion['idopt'] = $optativa->idoptativa;
                        }
                        //$arr_calificacion['idmateria'] = $data['materia']->idmateria;
                        $arr_calificacion['idalumno'] = $data['alumno']->idalumno;
                        $arr_calificacion['fechaexamen'] = $fecha_exa;

                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_calificacion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $arr_calificacion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_calificacion['idnoperiodo'] = null;
                        }
                        $arr_calificacion['nomenclatura'] = $excel[$cont][12];
                        if ($excel[$cont][0] != NULL) {
                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                            $arr_calificacion['idespecialidad'] = $idespecialidad->idespecialidad;
                        } else {
                            $arr_calificacion['idespecialidad'] = NULL;
                        }
                        $arr_calificacion['idnivel'] = $idnivel->idnivel;
                        $arr_calificacion['idingreso'] = $excel[$cont][9];
                        $this->calificacion_model->calificacion_inscripcion($arr_calificacion);
                        
                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                            $idmapa = $idmc->idmc;

                            $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                            $var_aux_d = 0;
                            if ($validar_materia == NULL) {
                                /*
                                 * Buscar la optativa
                                 */
                                $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                $var_aux_d = 1;
                                $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                            } else {
                                /*
                                 * Si es materia con respecto a un mapa curricular
                                 */
                                $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                            }

                            //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                            $idmapa = $idmc->idmc;

                            $validar_materia = $this->materia_model->existente($excel[$cont][2], $idmapa);
                            $var_aux_d = 0;
                            if ($validar_materia == NULL) {
                                /*
                                 * Buscar la optativa
                                 */
                                $optativa = $this->calificacion_model->consultar_optativa($excel[$cont][2], $idplan->idpe);
                                $var_aux_d = 1;
                                $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion_opt($data['alumno']->idalumno, $optativa->idoptativa, $idperiodo->idperiodo);
                            } else {
                                /*
                                 * Si es materia con respecto a un mapa curricular
                                 */
                                $validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $validar_materia->idmateria, $idperiodo->idperiodo);
                            }

                            //$validar_calificacion_despues = $this->calificacion_model->checar_cal_inscripcion($data['alumno']->idalumno, $data['materia']->idmateria, $idperiodo->idperiodo);
                        }

                        if ($validar_calificacion_despues->oportunidades == $oportunidades_normal) {
                            if ($var_aux_d == 0) {
                                $ultima = $this->calificacion_model->ultima_calf($data['alumno']->idalumno, $validar_materia->idmateria);
                            } else {
                                $ultima = $this->calificacion_model->ultima_calf_opt($data['alumno']->idalumno, $optativa->idoptativa);
                            }
                            //$ultima=$this->calificacion_model->ultima_calf($data['alumno']->idalumno,$data['materia']->idmateria);

                            if ($ultima->calificacion <= 5) {
                                $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,9);
                            } else {
                                
                            }
                        } else {
                            
                        }

//                            } else {
//                                //echo 'Error la calificacion de ese alumno y esa materia ya existia';
//                            }
                        if ($cont == 0) {
                            $alumnos++;
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $alumnos++;
                            }
                        }
                        $no_calificaciones++;
                    } else {
                        //Cantidad de oportunidades para esa materia excedido
                        $fila = $excel[$cont][15];
                        $especialidad_noi = $excel[$cont][0];
                        $periodo_noi = $excel[$cont][1];
                        $materia_noi = $excel[$cont][2];
                        $ap_noi = $excel[$cont][3];
                        $am_noi = $excel[$cont][4];
                        $nombres_noi = $excel[$cont][5];
                        $curp_noi = $excel[$cont][6];
                        $grupo_noi = $excel[$cont][7];
                        $escuela_noi = $excel[$cont][8];
                        $tipoingreso_noi = $excel[$cont][9];
                        $calificacion_noi = $excel[$cont][11];
                        $nomenclatura_noi = $excel[$cont][12];
                        $fechaexa_noi = $fecha_exa;
                        $estatus_noi = $excel[$cont][14];

                        $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                        $calificaciones_no_registradas++;
                        
                        $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                        if ($cont == 0) {
                            $alumnos_noi++;
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $alumnos_noi++;
                            }
                        }
                    }
                } else {
                    //echo 'Limite de materias reprobadas por periodo excedida';
                    $fila = $excel[$cont][15];
                    $especialidad_noi = $excel[$cont][0];
                    $periodo_noi = $excel[$cont][1];
                    $materia_noi = $excel[$cont][2];
                    $ap_noi = $excel[$cont][3];
                    $am_noi = $excel[$cont][4];
                    $nombres_noi = $excel[$cont][5];
                    $curp_noi = $excel[$cont][6];
                    $grupo_noi = $excel[$cont][7];
                    $escuela_noi = $excel[$cont][8];
                    $tipoingreso_noi = $excel[$cont][9];
                    $calificacion_noi = $excel[$cont][11];
                    $nomenclatura_noi = $excel[$cont][12];
                    $fechaexa_noi = $fecha_exa;
                    $estatus_noi = $excel[$cont][14];

                    $tabla_no_registradas .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td>' . $calificacion_noi . '</td><td>' . $nomenclatura_noi . '</td><td>' . $fechaexa_noi . '</td><td>' . $estatus_noi . '</td><td></td></tr>';
                    $calificaciones_no_registradas++;
                    $this->calificacion_model->actualizar_alumno($data['alumno']->idalumno,4);

                    if ($cont == 0) {
                        $alumnos_noi++;
                    } else {
                        $aux = $cont - 1;
                        $comparar_anterior = $excel[$aux][6];
                        if ($excel[$cont][6] == $comparar_anterior) {
                            
                        } else {
                            $alumnos_noi++;
                        }
                    }
                }
            }
        }
        $tabla_no_registradas .= '</tbody></table></div><button type="button" class="btn btn-warning next text-left" id="btnNotif" name="btnNotif">
                                    <i class="fa fa-exclamation-triangle">Notificar</i>
                                </button>';
        echo json_encode(array("response_code" => 200, "no_calificaciones" => $no_calificaciones, "alumnos" => $alumnos, "no_faltantes_calificaciones" => $calificaciones_no_registradas, "alumnos_noi" => $alumnos_noi, "tabla_no_registradas" => $tabla_no_registradas));
    }

}
