<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dropzone extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');

            $this->load->model('materia_model');
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('dropzone_view');
        $this->$algo = 'Hola';
    }

    public function subir_excel() {
        $this->load->model('materia_model');
        $this->load->model('inscripcion_model');
        $this->load->model('carrera_model');
        $this->load->model('calificacion_model');
        $cont = 0;
        if (!empty($_FILES["file"])) {
            //$connect = mysqli_connect("localhost", "root", "12345", "");
            $file_array = explode(".", $_FILES["file"]["name"]);
            $nombre_archivo = $_FILES["file"]["name"];
            $aux_btn = 0;
            if ($file_array[1] == "xls") {
                include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");

                $object = PHPExcel_IOFactory::load($_FILES["file"]["tmp_name"]);
                $acuerdo = $object->getActiveSheet()->getCell('C5')->getCalculatedValue();
                $nivel = $object->getActiveSheet()->getCell('C6')->getCalculatedValue();
                $clave_plan_estudios = $object->getActiveSheet()->getCell('C7')->getCalculatedValue();
                $modalidad = $object->getActiveSheet()->getCell('C8')->getCalculatedValue();
                $carrera = $object->getActiveSheet()->getCell('C9')->getCalculatedValue();
                $ciclo_escolar = $object->getActiveSheet()->getCell('C10')->getCalculatedValue();
                $escuela = $object->getActiveSheet()->getCell('C11')->getCalculatedValue();
                $clave_centro_trabajo = $object->getActiveSheet()->getCell('C12')->getCalculatedValue();
                $direccion = $object->getActiveSheet()->getCell('C13')->getCalculatedValue();
                $telefono = $object->getActiveSheet()->getCell('C14')->getCalculatedValue();
                $turno = $object->getActiveSheet()->getCell('C15')->getCalculatedValue();
                $tipo = $object->getActiveSheet()->getCell('C16')->getCalculatedValue();
                $correo = $object->getActiveSheet()->getCell('C17')->getCalculatedValue();
                $director = $object->getActiveSheet()->getCell('C18')->getCalculatedValue();
                $repre_legal = $object->getActiveSheet()->getCell('C19')->getCalculatedValue();
                $estado = $object->getActiveSheet()->getCell('C20')->getCalculatedValue();
                $municipio = $object->getActiveSheet()->getCell('C21')->getCalculatedValue();
                $output = '';
                if ($acuerdo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el número de acuerdo</label><br>";
                    $aux_btn = 1;
                }
                if ($nivel != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el nivel educativo</label><br>";
                    $aux_btn = 1;
                }
                if ($clave_plan_estudios != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la clave del plan de estudios</label><br>";
                    $aux_btn = 1;
                }
                if ($modalidad != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la modalidad</label><br>";
                    $aux_btn = 1;
                }
                if ($carrera != NULL) {
//                    $validar_carrera = $this->carrera_model->existente($carrera);
//                    if ($validar_carrera != NULL) {
//                        
//                    } else {
//                        $output .= "<label class='text-danger'>Carrera no reconocida</label><br>";
//                        $aux_btn = 1;
//                    }
                } else {
                    $output .= "<label class='text-danger'>Falta la carrera</label><br>";
                    $aux_btn = 1;
                }
                if ($ciclo_escolar != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el ciclo escolar</label><br>";
                    $aux_btn = 1;
                }
                if ($escuela != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el nombre de la escuela</label><br>";
                    $aux_btn = 1;
                }
                if ($clave_centro_trabajo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la clave del centro de trabajo</label><br>";
                    $aux_btn = 1;
                }
                if ($direccion != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la dirección</label><br>";
                    $aux_btn = 1;
                }
                if ($telefono != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el teléfono</label><br>";
                    $aux_btn = 1;
                }
                if ($turno != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el turno</label><br>";
                    $aux_btn = 1;
                }
                if ($tipo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el tipo</label><br>";
                    $aux_btn = 1;
                }
                if ($correo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el correo electronico</label><br>";
                    $aux_btn = 1;
                }
                if ($director != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el director</label><br>";
                    $aux_btn = 1;
                }
                if ($repre_legal != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el representante legal</label><br>";
                    $aux_btn = 1;
                }
                if ($estado != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el estado</label><br>";
                    $aux_btn = 1;
                }
                if ($municipio != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el municipio</label><br>";
                    $aux_btn = 1;
                }
                $output .= "  
           <label class='text-success'>Lectura completa</label>
                <div class='table-responsive'><table id='example2' class='table table-striped table-bordered table-hover'><thead><tr><th>Fila</th><th>Especialización</th><th>Periodo</th><th>Materia</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Curp</th><th>Genero</th><th>Grupo</th><th>Escuela procedencia</th><th>Tipo de ingreso</th></tr></thead><tbody>
                     ";
                $cont_grupos = 0;
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row = 26; $row < $highestRow; $row++) {
                        $especialización = $object->getActiveSheet()->getCell('A' . $row)->getCalculatedValue();
                        $periodo = $object->getActiveSheet()->getCell('B' . $row)->getCalculatedValue();
                        $materia = $object->getActiveSheet()->getCell('C' . $row)->getCalculatedValue();
                        $ap = $object->getActiveSheet()->getCell('D' . $row)->getCalculatedValue();
                        $am = $object->getActiveSheet()->getCell('E' . $row)->getCalculatedValue();
                        $nombres = $object->getActiveSheet()->getCell('F' . $row)->getCalculatedValue();
                        $curp = $object->getActiveSheet()->getCell('G' . $row)->getCalculatedValue();
                        $grupo = $object->getActiveSheet()->getCell('H' . $row)->getCalculatedValue();
                        $escuela_pro = $object->getActiveSheet()->getCell('I' . $row)->getCalculatedValue();
                        $tipo_ingreso = $object->getActiveSheet()->getCell('J' . $row)->getCalculatedValue();
                        $genero = $object->getActiveSheet()->getCell('K' . $row)->getCalculatedValue();
                        $calificacion = $object->getActiveSheet()->getCell('L' . $row)->getCalculatedValue();
                        $nomenclatura = $object->getActiveSheet()->getCell('M' . $row)->getCalculatedValue();
                        
                        
                        //$validar_materia = $this->materia_model->existente($materia);
                        if ($especialización != NULL) {
                            $validar_especialidad = $this->inscripcion_model->consultar_especialidad($especialización);
                        } else {
                            $validar_especialidad = 1;
                        }

                        $aux = $row - 1;
                        $comparar_grupo = $object->getActiveSheet()->getCell('H' . $aux)->getCalculatedValue();
                        if ($grupo == $comparar_grupo) {
                            
                        } else {
                            $cont_grupos++;
                        }

                        $cadena = $periodo;
                        $array = explode(" ", $cadena);
                        $tamanio = count($array);
                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            
                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                            $idmapa = $idmc->idmc;

                            $validar_materia = $this->materia_model->existente($materia, $idmapa);
                            if ($validar_materia == NULL) {
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);
                                $optativas = $this->calificacion_model->consultar_optativas($idplan->idpe);
                                $optativas_plan = array();
                                $cont_opt = 0;
                                foreach ($optativas as $optativa) {
                                    $optativas_plan[$cont_opt] = $optativa->nomoptativa;
                                    $cont_opt++;
                                }
                                if (in_array($materia, $optativas_plan)) {
                                    $validar_materia = 'Existente';
                                } else {
                                    $validar_materia = NULL;
                                }
                            } else {
                                
                            }

                            //$validar_materia = $this->materia_model->existente($materia,$idmapa);
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $idnoperiodo = 1;
                        }

                        /**
                         * Guardamos en otra variable el valor que contenga esa celda
                         */
                        $InvDate = $object->getActiveSheet()->getCell('N' . $row)->getCalculatedValue();
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
                        $estatus = $object->getActiveSheet()->getCell('N' . $row)->getCalculatedValue();

//                        $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
//                        $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
//                        $city = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
//                        $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
//                        $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                        if ($periodo == NULL || $materia == NULL || $ap == NULL || $am == NULL || $nombres == NULL || $curp == NULL || $grupo == NULL || $escuela_pro == NULL || $tipo_ingreso == NULL || $validar_materia == NULL || $genero == NULL) {
                            $aux_btn = 1;
                            if ($validar_materia == NULL) {
                                $output .= '
                                <tr style="background-color:red; color: #FFFFFF;">
                                    <td>' . $row . '</td>';
                                if ($validar_especialidad == NULL) {
                                    $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                        <td>' . $ap . '</td>  
                                        <td>' . $am . '</td>  
                                        <td>' . $nombres . '</td>  
                                        <td>' . $curp . '</td>  
                                        <td>' . $genero . '</td>  
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>
                                    </tr>  
                                    ';
                                    } else {
                                        $output .= ' 
                                        <td>' . $periodo . '</td>  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                        <td>' . $ap . '</td>  
                                        <td>' . $am . '</td>  
                                        <td>' . $nombres . '</td>  
                                        <td>' . $curp . '</td>  
                                        <td>' . $genero . '</td>  
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>
                                    </tr>  
                                    ';
                                    }
                                } else {
                                    $output .= '
                                    <td>' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>
                                            <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>';
                                    } else {
                                        $output .= '<td>' . $periodo . '</td>  
                                    <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                ';
                                    }
                                }
                            } else {
                                $output .= '
                                <tr style="background-color:red; color: #FFFFFF;">
                                    <td>' . $row . '</td>
                                    <td>' . $especialización . '</td>';
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    //$output.='<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td> ';
                                    $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                ';
                                } else {
                                    $output .= '<td>' . $periodo . '</td>  
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                ';
                                }
                            }
                        } else {
                            if ($validar_especialidad == NULL) {
                                $aux_btn = 1;
                                $output .= '
                     <tr style="background-color:red; color: #FFFFFF;">  
                        <td>' . $row . '</td>
                          <td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    $output .= '  
                          <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                } else {
                                    $output .= ' 
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                }
                            } else {
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    $output .= '
                     <tr style="background-color:red; color: #FFFFFF;">  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                } else {
                                    $output .= '
                     <tr>  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                }
                            }
                        }
                        $cont++;
                    }
                }
                $output .= '</tbody></table></div>';
                //if($aux_btn==0){

                if ($acuerdo != NULL && $aux_btn != 1) {
                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                    $validar_grupos = $this->inscripcion_model->consultar_grupos($idacuerdo->idacuerdo);
                    if ($cont_grupos <= $validar_grupos->gruposautorizado) {
                        $output .= '<form method="post" action="' . base_url() . 'analista_servicios/inscripcion/inscribir_post" id="form-inscripcion-data">
                                <input type="hidden" id="validador" name="validador" value="' . $nombre_archivo . '">
                                <button type="button" class="btn btn-primary next text-left pruebaBit" id="btnValidador" name="btnValidador">
                                    <i class="fa fa-check">Aceptar</i>
                                </button>
                            </form>
                            ';
                        echo $output;
                    } else {
                        $output .= '<input type="hidden"  name="prueba" id="prueba" value="1"/>';
                        echo $output;
                    }
                } else {
                    echo $output;
                }
                //move_uploaded_file($_FILES['file']['tmp_name'], 'static/excel/'.$nombre_archivo);
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    copy($_FILES['file']['tmp_name'], "static/excel/$nombre_archivo");
                    //echo "El archivo se ha subido correctamente al servidor, muchas gracias <p>";
                } else {
                    //echo "Error al subir el archivo";
                }
            } else {
                echo '<label class="text-danger">Archivo no válido</label>';
            }
        } else {
            echo 'Nada';
        }
    }

    public function subir_excel_reinscripcion() {
        $this->load->model('materia_model');
        $this->load->model('inscripcion_model');
        $this->load->model('carrera_model');
        $this->load->model('calificacion_model');
        $cont = 0;
        if (!empty($_FILES["file"])) {
            //$connect = mysqli_connect("localhost", "root", "12345", "");
            $file_array = explode(".", $_FILES["file"]["name"]);
            $nombre_archivo = $_FILES["file"]["name"];
            $aux_btn = 0;
            if ($file_array[1] == "xls") {
                include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");

                $object = PHPExcel_IOFactory::load($_FILES["file"]["tmp_name"]);
                $acuerdo = $object->getActiveSheet()->getCell('C5')->getCalculatedValue();
                $nivel = $object->getActiveSheet()->getCell('C6')->getCalculatedValue();
                $clave_plan_estudios = $object->getActiveSheet()->getCell('C7')->getCalculatedValue();
                $modalidad = $object->getActiveSheet()->getCell('C8')->getCalculatedValue();
                $carrera = $object->getActiveSheet()->getCell('C9')->getCalculatedValue();
                $ciclo_escolar = $object->getActiveSheet()->getCell('C10')->getCalculatedValue();
                $escuela = $object->getActiveSheet()->getCell('C11')->getCalculatedValue();
                $clave_centro_trabajo = $object->getActiveSheet()->getCell('C12')->getCalculatedValue();
                $direccion = $object->getActiveSheet()->getCell('C13')->getCalculatedValue();
                $telefono = $object->getActiveSheet()->getCell('C14')->getCalculatedValue();
                $turno = $object->getActiveSheet()->getCell('C15')->getCalculatedValue();
                $tipo = $object->getActiveSheet()->getCell('C16')->getCalculatedValue();
                $correo = $object->getActiveSheet()->getCell('C17')->getCalculatedValue();
                $director = $object->getActiveSheet()->getCell('C18')->getCalculatedValue();
                $repre_legal = $object->getActiveSheet()->getCell('C19')->getCalculatedValue();
                $estado = $object->getActiveSheet()->getCell('C20')->getCalculatedValue();
                $municipio = $object->getActiveSheet()->getCell('C21')->getCalculatedValue();
                $output = '';
                if ($acuerdo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el número de acuerdo</label><br>";
                    $aux_btn = 1;
                }
                if ($nivel != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el nivel educativo</label><br>";
                    $aux_btn = 1;
                }
                if ($clave_plan_estudios != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la clave del plan de estudios</label><br>";
                    $aux_btn = 1;
                }
                if ($modalidad != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la modalidad</label><br>";
                    $aux_btn = 1;
                }
                if ($carrera != NULL) {
//                    $validar_carrera = $this->carrera_model->existente($carrera);
//                    if ($validar_carrera != NULL) {
//                        
//                    } else {
//                        $output .= "<label class='text-danger'>Carrera no reconocida</label><br>";
//                        $aux_btn = 1;
//                    }
                } else {
                    $output .= "<label class='text-danger'>Falta la carrera</label><br>";
                    $aux_btn = 1;
                }
                if ($ciclo_escolar != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el ciclo escolar</label><br>";
                    $aux_btn = 1;
                }
                if ($escuela != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el nombre de la escuela</label><br>";
                    $aux_btn = 1;
                }
                if ($clave_centro_trabajo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la clave del centro de trabajo</label><br>";
                    $aux_btn = 1;
                }
                if ($direccion != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la dirección</label><br>";
                    $aux_btn = 1;
                }
                if ($telefono != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el teléfono</label><br>";
                    $aux_btn = 1;
                }
                if ($turno != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el turno</label><br>";
                    $aux_btn = 1;
                }
                if ($tipo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el tipo</label><br>";
                    $aux_btn = 1;
                }
                if ($correo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el correo electronico</label><br>";
                    $aux_btn = 1;
                }
                if ($director != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el director</label><br>";
                    $aux_btn = 1;
                }
                if ($repre_legal != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el representante legal</label><br>";
                    $aux_btn = 1;
                }
                if ($estado != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el estado</label><br>";
                    $aux_btn = 1;
                }
                if ($municipio != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el municipio</label><br>";
                    $aux_btn = 1;
                }
                $output .= "  
           <label class='text-success'>Lectura completa</label>
                <div class='table-responsive'><table id='example2' class='table table-striped table-bordered table-hover'><thead><tr><th>Fila</th><th>Especialización</th><th>Periodo</th><th>Materia</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Curp</th><th>Genero</th><th>Grupo</th><th>Escuela procedencia</th><th>Tipo de ingreso</th></tr></thead><tbody>
                     ";
                $cont_grupos = 0;
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row = 26; $row < $highestRow; $row++) {
                        $especialización = $object->getActiveSheet()->getCell('A' . $row)->getCalculatedValue();
                        $periodo = $object->getActiveSheet()->getCell('B' . $row)->getCalculatedValue();
                        $materia = $object->getActiveSheet()->getCell('C' . $row)->getCalculatedValue();
                        $ap = $object->getActiveSheet()->getCell('D' . $row)->getCalculatedValue();
                        $am = $object->getActiveSheet()->getCell('E' . $row)->getCalculatedValue();
                        $nombres = $object->getActiveSheet()->getCell('F' . $row)->getCalculatedValue();
                        $curp = $object->getActiveSheet()->getCell('G' . $row)->getCalculatedValue();
                        $grupo = $object->getActiveSheet()->getCell('H' . $row)->getCalculatedValue();
                        $escuela_pro = $object->getActiveSheet()->getCell('I' . $row)->getCalculatedValue();
                        $tipo_ingreso = $object->getActiveSheet()->getCell('J' . $row)->getCalculatedValue();
                        $genero = $object->getActiveSheet()->getCell('K' . $row)->getCalculatedValue();
                        $calificacion = $object->getActiveSheet()->getCell('L' . $row)->getCalculatedValue();
                        $nomenclatura = $object->getActiveSheet()->getCell('M' . $row)->getCalculatedValue();

                        //$validar_materia = $this->materia_model->existente($materia);
                        if ($especialización != NULL) {
                            $validar_especialidad = $this->inscripcion_model->consultar_especialidad($especialización);
                        } else {
                            $validar_especialidad = 1;
                        }

                        $aux = $row - 1;
                        $comparar_grupo = $object->getActiveSheet()->getCell('H' . $aux)->getCalculatedValue();
                        if ($grupo == $comparar_grupo) {
                            
                        } else {
                            $cont_grupos++;
                        }

                        $cadena = $periodo;
                        $array = explode(" ", $cadena);
                        $tamanio = count($array);
                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            
                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);

                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                            $idmapa = $idmc->idmc;

                            $validar_materia = $this->materia_model->existente($materia, $idmapa);
                            if ($validar_materia == NULL) {
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera, $acuerdo);
                                $optativas = $this->calificacion_model->consultar_optativas($idplan->idpe);
                                $optativas_plan = array();
                                $cont_opt = 0;
                                foreach ($optativas as $optativa) {
                                    $optativas_plan[$cont_opt] = $optativa->nomoptativa;
                                    $cont_opt++;
                                }
                                if (in_array($materia, $optativas_plan)) {
                                    $validar_materia = 'Existente';
                                } else {
                                    $validar_materia = NULL;
                                }
                            } else {
                                
                            }

                            //$validar_materia = $this->materia_model->existente($materia,$idmapa);
                            
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $idnoperiodo = 1;
                        }

                        /**
                         * Guardamos en otra variable el valor que contenga esa celda
                         */
                        $InvDate = $object->getActiveSheet()->getCell('N' . $row)->getCalculatedValue();
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
                        $estatus = $object->getActiveSheet()->getCell('N' . $row)->getCalculatedValue();

//                        $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
//                        $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
//                        $city = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
//                        $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
//                        $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                        if ($periodo == NULL || $materia == NULL || $ap == NULL || $am == NULL || $nombres == NULL || $curp == NULL || $grupo == NULL || $escuela_pro == NULL || $tipo_ingreso == NULL || $validar_materia == NULL || $genero == NULL) {
                            $aux_btn = 1;
                            if ($validar_materia == NULL) {
                                $output .= '
                                <tr style="background-color:red; color: #FFFFFF;">
                                    <td>' . $row . '</td>';
                                if ($validar_especialidad == NULL) {
                                    $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                        <td>' . $ap . '</td>  
                                        <td>' . $am . '</td>  
                                        <td>' . $nombres . '</td>  
                                        <td>' . $curp . '</td>  
                                        <td>' . $genero . '</td>  
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>
                                    </tr>  
                                    ';
                                    } else {
                                        $output .= ' 
                                        <td>' . $periodo . '</td>  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                        <td>' . $ap . '</td>  
                                        <td>' . $am . '</td>  
                                        <td>' . $nombres . '</td>  
                                        <td>' . $curp . '</td>  
                                        <td>' . $genero . '</td>  
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>
                                    </tr>  
                                    ';
                                    }
                                } else {
                                    $output .= '
                                    <td>' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>
                                            <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>';
                                    } else {
                                        $output .= '<td>' . $periodo . '</td>  
                                    <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                ';
                                    }
                                }
                            } else {
                                $output .= '
                                <tr style="background-color:red; color: #FFFFFF;">
                                    <td>' . $row . '</td>
                                    <td>' . $especialización . '</td>';
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    //$output.='<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td> ';
                                    $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                ';
                                } else {
                                    if ($tamanio > 1) {
                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                            
                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera);
                                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo,$idplan->idpe);
                                            $idmapa = $idmc->idmc;

                                            $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                            $materias_del_periodo = array();
                                            $cont_plan = 0;
                                            foreach ($materias_plan as $materia_plan) {
                                                $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                                //echo $materias_del_periodo[$cont_plan];
                                                $cont_plan++;
                                            }
                                        } else {
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                            $idnoperiodo = 1;
                                        }
                                        if (in_array($materia, $materias_del_periodo)) {
                                    $output .= '<td>' . $periodo . '</td>  
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                ';
                                }
                                else{
                                   $output .= '<td>' . $periodo . '</td>  
                                    <td style="background-color:#FC6109; color: white;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>  
                                    <td>' . $curp . '</td>  
                                    <td>' . $genero . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>
                                </tr>
                                '; 
                                }
                                }
                            }
                        } else {
                            if ($validar_especialidad == NULL) {
                                $aux_btn = 1;
                                $output .= '
                     <tr style="background-color:red; color: #FFFFFF;">  
                        <td>' . $row . '</td>
                          <td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    $output .= '  
                          <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                } else {
                                    if ($tamanio > 1) {
                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                            
                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera);
                                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo,$idplan->idpe);
                                            $idmapa = $idmc->idmc;

                                            $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                            $materias_del_periodo = array();
                                            $cont_plan = 0;
                                            foreach ($materias_plan as $materia_plan) {
                                                $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                                //echo $materias_del_periodo[$cont_plan];
                                                $cont_plan++;
                                            }
                                        } else {
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                            $idnoperiodo = 1;
                                        }
                                        if (in_array($materia, $materias_del_periodo)) {
                                    $output .= ' 
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                }
                                else{
                                  $output .= ' 
                          <td>' . $periodo . '</td>  
                          <td style="background-color:#FC6109; color: white;">' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';  
                                }
                                }
                            } else {
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    $output .= '
                     <tr style="background-color:red; color: #FFFFFF;">  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                } else {
                                    if ($tamanio > 1) {
                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                            
                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera,$acuerdo);
                                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo,$idplan->idpe);
                                            $idmapa = $idmc->idmc;

                                            $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                            $materias_del_periodo = array();
                                            $cont_plan = 0;
                                            foreach ($materias_plan as $materia_plan) {
                                                $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                                //echo $materias_del_periodo[$cont_plan];
                                                $cont_plan++;
                                            }
                                        } else {
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                            $idnoperiodo = 1;
                                        }
                                        if (in_array($materia, $materias_del_periodo)) {
                                    $output .= '
                     <tr>  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                }
                                else{
                                    $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera,$acuerdo);
                                            $optativas=$this->calificacion_model->consultar_optativas($idplan->idpe);
                                            $optativas_plan = array();
                                            $cont_opt = 0;
                                            foreach ($optativas as $optativa) {
                                                $optativas_plan[$cont_opt] = $optativa->nomoptativa;
                                                $cont_opt++;
                                            }
                                            if (in_array($materia, $optativas_plan)) {
                                    $output .= '
                     <tr>  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                            }
                                            else{
                                                $output .= '
                     <tr>  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td>' . $periodo . '</td>  
                          <td style="background-color:#FC6109; color: white;">Aqui mero' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $genero . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>
                     </tr>  
                     ';
                                            }
                                }
                                }
                            }
                        }
                        $cont++;
                    }
                }
                $output .= '</tbody></table></div>';
                //if($aux_btn==0){

                if ($acuerdo != NULL && $aux_btn != 1) {
                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                    $validar_grupos = $this->inscripcion_model->consultar_grupos($idacuerdo->idacuerdo);
                    if ($cont_grupos <= $validar_grupos->gruposautorizado) {
                        $output .= '<form method="post" action="' . base_url() . 'analista_servicios/reinscripcion/reinscribir_post" id="form-reinscripcion-data">
                                <input type="hidden" id="validador" name="validador" value="' . $nombre_archivo . '">
                                <button type="button" class="btn btn-primary next text-left pruebaBit" id="btnReinscripcion" name="btnReinscripcion">
                                    <i class="fa fa-check">Aceptar</i>
                                </button>
                            </form>
                            ';
                        echo $output;
                    } else {
                        $output .= '<input type="hidden"  name="prueba" id="prueba" value="1"/>';
                        echo $output;
                    }
                } else {
                    echo $output;
                }
                //move_uploaded_file($_FILES['file']['tmp_name'], 'static/excel/'.$nombre_archivo);
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    copy($_FILES['file']['tmp_name'], "static/excel/$nombre_archivo");
                    //echo "El archivo se ha subido correctamente al servidor, muchas gracias <p>";
                } else {
                    //echo "Error al subir el archivo";
                }
            } else {
                echo '<label class="text-danger">Archivo no válido</label>';
            }
        } else {
            echo 'Nada';
        }
    }

    public function subir_excel_calificacion() {
        $this->load->model('materia_model');
        $this->load->model('inscripcion_model');
        $this->load->model('carrera_model');
        $this->load->model('alumno_model');
        $this->load->model('calificacion_model');
        $cont = 0;
        if (!empty($_FILES["file"])) {
            $file_array = explode(".", $_FILES["file"]["name"]);
            $nombre_archivo = $_FILES["file"]["name"];
            if ($file_array[1] == "xls") {
                include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");
                $aux_btn = 0;
                $object = PHPExcel_IOFactory::load($_FILES["file"]["tmp_name"]);
                $acuerdo = $object->getActiveSheet()->getCell('C5')->getCalculatedValue();
                $nivel = $object->getActiveSheet()->getCell('C6')->getCalculatedValue();
                $clave_plan_estudios = $object->getActiveSheet()->getCell('C7')->getCalculatedValue();
                $modalidad = $object->getActiveSheet()->getCell('C8')->getCalculatedValue();
                $carrera = $object->getActiveSheet()->getCell('C9')->getCalculatedValue();
                $ciclo_escolar = $object->getActiveSheet()->getCell('C10')->getCalculatedValue();
                $escuela = $object->getActiveSheet()->getCell('C11')->getCalculatedValue();
                $clave_centro_trabajo = $object->getActiveSheet()->getCell('C12')->getCalculatedValue();
                $direccion = $object->getActiveSheet()->getCell('C13')->getCalculatedValue();
                $telefono = $object->getActiveSheet()->getCell('C14')->getCalculatedValue();
                $turno = $object->getActiveSheet()->getCell('C15')->getCalculatedValue();
                $tipo = $object->getActiveSheet()->getCell('C16')->getCalculatedValue();
                $correo = $object->getActiveSheet()->getCell('C17')->getCalculatedValue();
                $director = $object->getActiveSheet()->getCell('C18')->getCalculatedValue();
                $repre_legal = $object->getActiveSheet()->getCell('C19')->getCalculatedValue();
                $estado = $object->getActiveSheet()->getCell('C20')->getCalculatedValue();
                $municipio = $object->getActiveSheet()->getCell('C21')->getCalculatedValue();
                $output = '';
                if ($acuerdo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el número de acuerdo</label><br>";
                    $aux_btn = 1;
                }
                if ($nivel != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el nivel educativo</label><br>";
                    $aux_btn = 1;
                }
                if ($clave_plan_estudios != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la clave del plan de estudios</label><br>";
                    $aux_btn = 1;
                }
                if ($modalidad != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la modalidad</label><br>";
                    $aux_btn = 1;
                }
                if ($carrera != NULL) {
//                    $validar_carrera = $this->carrera_model->existente($carrera);
//                    if ($validar_carrera != NULL) {
//                        
//                    } else {
//                        $output .= "<label class='text-danger'>Carrera no reconocida</label><br>";
//                        $aux_btn = 1;
//                    }
                } else {
                    $output .= "<label class='text-danger'>Falta la carrera</label><br>";
                    $aux_btn = 1;
                }
                if ($ciclo_escolar != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el ciclo escolar</label><br>";
                    $aux_btn = 1;
                }
                if ($escuela != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el nombre de la escuela</label><br>";
                    $aux_btn = 1;
                }
                if ($clave_centro_trabajo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la clave del centro de trabajo</label><br>";
                    $aux_btn = 1;
                }
                if ($direccion != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta la dirección</label><br>";
                    $aux_btn = 1;
                }
                if ($telefono != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el teléfono</label><br>";
                    $aux_btn = 1;
                }
                if ($turno != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el turno</label><br>";
                    $aux_btn = 1;
                }
                if ($tipo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el tipo</label><br>";
                    $aux_btn = 1;
                }
                if ($correo != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el correo electronico</label><br>";
                    $aux_btn = 1;
                }
                if ($director != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el director</label><br>";
                    $aux_btn = 1;
                }
                if ($repre_legal != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el representante legal</label><br>";
                    $aux_btn = 1;
                }
                if ($estado != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el estado</label><br>";
                    $aux_btn = 1;
                }
                if ($municipio != NULL) {
                    
                } else {
                    $output .= "<label class='text-danger'>Falta el municipio</label><br>";
                    $aux_btn = 1;
                }
                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                $output .= "  
           <label class='text-success'>Lectura completa</label>
                <div class='table-responsive'><table id='example2' class='table table-striped table-bordered table-hover'><thead><tr><th>Fila</th><th>Especialización</th><th>Periodo</th><th>Materia</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Curp</th><th>Grupo</th><th>Escuela procedencia</th><th>Tipo de ingreso</th><th>Calificación</th><th>Nomenclatura</th><th>Fecha examen</th><th>Estatus</th></tr></thead><tbody>
                     ";
                //$object = PHPExcel_IOFactory::load($_FILES["file"]["tmp_name"]);
                $cont_grupos = 0;
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row = 26; $row < $highestRow; $row++) {
                        $especialización = $object->getActiveSheet()->getCell('A' . $row)->getCalculatedValue();
                        $periodo = $object->getActiveSheet()->getCell('B' . $row)->getCalculatedValue();
                        $materia = $object->getActiveSheet()->getCell('C' . $row)->getCalculatedValue();
                        $ap = $object->getActiveSheet()->getCell('D' . $row)->getCalculatedValue();
                        $am = $object->getActiveSheet()->getCell('E' . $row)->getCalculatedValue();
                        $nombres = $object->getActiveSheet()->getCell('F' . $row)->getCalculatedValue();
                        $curp = $object->getActiveSheet()->getCell('G' . $row)->getCalculatedValue();
                        $grupo = $object->getActiveSheet()->getCell('H' . $row)->getCalculatedValue();
                        $escuela_pro = $object->getActiveSheet()->getCell('I' . $row)->getCalculatedValue();
                        $tipo_ingreso = $object->getActiveSheet()->getCell('J' . $row)->getCalculatedValue();
                        $genero = $object->getActiveSheet()->getCell('K' . $row)->getCalculatedValue();
                        $calificacion = $object->getActiveSheet()->getCell('L' . $row)->getCalculatedValue();
                        $nomenclatura = $object->getActiveSheet()->getCell('M' . $row)->getCalculatedValue();
                        //$validar_materia = $this->materia_model->existente($materia);
                        $validar_alumno = $this->alumno_model->alumno_existente($curp);
                        if ($especialización != NULL) {
                            $validar_especialidad = $this->inscripcion_model->consultar_especialidad($especialización);
                        } else {
                            $validar_especialidad = 1;
                        }

                        $aux = $row - 1;
                        $comparar_grupo = $object->getActiveSheet()->getCell('H' . $aux)->getCalculatedValue();
                        if ($grupo == $comparar_grupo) {
                            
                        } else {
                            $cont_grupos++;
                        }
                        $cadena = $periodo;
                        $array = explode(" ", $cadena);
                        $tamanio = count($array);
                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            
                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera,$acuerdo);

                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                            $idmapa = $idmc->idmc;
                            
                            $validar_materia = $this->materia_model->existente($materia,$idmapa);
                            if($validar_materia==NULL){
                                $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios, $carrera,$acuerdo);
                                $optativas = $this->calificacion_model->consultar_optativas($idplan->idpe);
                                $optativas_plan = array();
                                $cont_opt = 0;
                                foreach ($optativas as $optativa) {
                                    $optativas_plan[$cont_opt] = $optativa->nomoptativa;
                                    $cont_opt++;
                                }
                                if (in_array($materia, $optativas_plan)) {
                                    $validar_materia='Existente';
                                }
                                else{
                                    $validar_materia=NULL;
                                }
                            }
                            else{
                                
                            }
                            
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $idnoperiodo = 1;
                        }

                        /**
                         * Guardamos en otra variable el valor que contenga esa celda
                         */
                        $InvDate = $object->getActiveSheet()->getCell('N' . $row)->getCalculatedValue();
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
                        $estatus = $object->getActiveSheet()->getCell('O' . $row)->getCalculatedValue();
                        if ($periodo == NULL || $materia == NULL || $ap == NULL || $am == NULL || $nombres == NULL || $curp == NULL || $grupo == NULL || $escuela_pro == NULL || $tipo_ingreso == NULL || $nomenclatura == NULL || $fecha_exa == NULL || $validar_materia == NULL) {
                            $aux_btn = 1;
                            if ($validar_materia == NULL) {
                                $aux_btn = 1;
                                $output .= '
                                <tr style="background-color:red; color: #FFFFFF;">
                                    <td>' . $row . '</td>';
                                if ($validar_especialidad == NULL) {
                                    $aux_btn = 1;
                                    $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                    <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>';
                                        }
                                    } else {
                                        $output .= '<td>' . $periodo . '</td>  
                                    <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>';
                                        }
                                    }
                                } else {
                                    $output .= '
                                    <td>' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                        <td>' . $ap . '</td>  
                                        <td>' . $am . '</td>  
                                        <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>  
                                        <td>' . $calificacion . '</td>
                                        <td>' . $nomenclatura . '</td>
                                        <td>' . $fecha_exa . '</td>
                                        <td>' . $estatus . '</td>
                                    </tr>
                                    ';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>  
                                        <td>' . $calificacion . '</td>
                                        <td>' . $nomenclatura . '</td>
                                        <td>' . $fecha_exa . '</td>
                                        <td>' . $estatus . '</td>
                                    </tr>
                                    ';
                                        }
                                    } else {
                                        $output .= '<td>' . $periodo . '</td>  
                                        <td style="background-color:blue; color: #FFFFFF;">' . $materia . '</td>  
                                        <td>' . $ap . '</td>  
                                        <td>' . $am . '</td>  
                                        <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>  
                                        <td>' . $calificacion . '</td>
                                        <td>' . $nomenclatura . '</td>
                                        <td>' . $fecha_exa . '</td>
                                        <td>' . $estatus . '</td>
                                    </tr>
                                    ';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>
                                        <td>' . $grupo . '</td>  
                                        <td>' . $escuela_pro . '</td>  
                                        <td>' . $tipo_ingreso . '</td>  
                                        <td>' . $calificacion . '</td>
                                        <td>' . $nomenclatura . '</td>
                                        <td>' . $fecha_exa . '</td>
                                        <td>' . $estatus . '</td>
                                    </tr>
                                    ';
                                        }
                                    }
                                }
                            } else {
                                $output .= '
                                <tr style="background-color:red; color: #FFFFFF;">
                                    <td>' . $row . '</td>';
                                if ($validar_especialidad == NULL) {
                                    $aux_btn = 1;
                                    $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>
                                            <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                        }
                                    } else {
                                        if ($tamanio > 1) {
                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                            
                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera);
                                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo,$idplan->idpe);
                                            $idmapa = $idmc->idmc;

                                            $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                            $materias_del_periodo = array();
                                            $cont_plan = 0;
                                            foreach ($materias_plan as $materia_plan) {
                                                $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                                //echo $materias_del_periodo[$cont_plan];
                                                $cont_plan++;
                                            }
                                        } else {
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                            $idnoperiodo = 1;
                                        }
                                        //$output.='<td>' . $periodo . '</td>';

                                        if (in_array($materia, $materias_del_periodo)) {
                                            $output .= '<td>' . $periodo . '</td>
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                            if ($validar_alumno == NULL) {
                                                $aux_btn = 1;
                                                $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            } else {
                                                $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            }
                                        } else {
                                            $output .= '<td>' . $periodo . '</td>
                                    <td style="background-color:#FC6109; color: white;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                            if ($validar_alumno == NULL) {
                                                $aux_btn = 1;
                                                $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            } else {
                                                $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            }
                                        }
                                    }
                                } else {
                                    $output .= '
                                    <td>' . $especialización . '</td>';
                                    if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                        $aux_btn = 1;
                                        $output .= '
                                    <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                        }
                                    } else {
                                        if ($tamanio > 1) {
                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);

                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera);
                                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo,$idplan->idpe);
                                            $idmapa = $idmc->idmc;

                                            $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                            $materias_del_periodo = array();
                                            $cont_plan = 0;
                                            foreach ($materias_plan as $materia_plan) {
                                                $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                                //echo $materias_del_periodo[$cont_plan];
                                                $cont_plan++;
                                            }
                                        } else {
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                            $idnoperiodo = 1;
                                        }
                                        if (in_array($materia, $materias_del_periodo)) {
                                            $output .= '
                                    <td>' . $periodo . '</td>  
                                    <td>' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                            if ($validar_alumno == NULL) {
                                                $aux_btn = 1;
                                                $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            } else {
                                                $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            }
                                        } else {
                                            $output .= '
                                    <td>' . $periodo . '</td>  
                                    <td style="background-color:#FC6109; color: white;">' . $materia . '</td>  
                                    <td>' . $ap . '</td>  
                                    <td>' . $am . '</td>  
                                    <td>' . $nombres . '</td>';
                                            if ($validar_alumno == NULL) {
                                                $aux_btn = 1;
                                                $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            } else {
                                                $output .= '<td>' . $curp . '</td>  
                                    <td>' . $grupo . '</td>  
                                    <td>' . $escuela_pro . '</td>  
                                    <td>' . $tipo_ingreso . '</td>  
                                    <td>' . $calificacion . '</td>
                                    <td>' . $nomenclatura . '</td>
                                    <td>' . $fecha_exa . '</td>
                                    <td>' . $estatus . '</td>
                                </tr>
                                ';
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if ($validar_especialidad == NULL) {
                                $aux_btn = 1;
                                $output .= '
                     <tr style="background-color:red; color: #FFFFFF;">  
                        <td>' . $row . '</td>
                          <td style="background-color:blue; color: #FFFFFF;">' . $especialización . '</td>';
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    $output .= '  
                          <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>';
                                    if ($validar_alumno == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                    } else {
                                        $output .= '<td>' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                    }
                                } else {
                                    if ($tamanio > 1) {
                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);

                                        $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera);
                                        $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo, $idplan->idpe);
                                        $idmapa = $idmc->idmc;

                                        $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                        $materias_del_periodo = array();
                                        $cont_plan = 0;
                                        foreach ($materias_plan as $materia_plan) {
                                            $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                            //echo $materias_del_periodo[$cont_plan];
                                            $cont_plan++;
                                        }
                                    } else {
                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                        $idnoperiodo = 1;
                                    }
                                    if (in_array($materia, $materias_del_periodo)) {
                                        $output .= ' 
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                        }
                                    } else {
                                        $output .= ' 
                          <td>' . $periodo . '</td>  
                          <td style="background-color:#FC6109; color: white;">' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>';
                                        if ($validar_alumno == NULL) {
                                            $aux_btn = 1;
                                            $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                        } else {
                                            $output .= '<td>' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                        }
                                    }
                                    ////Este de aqui
                                }
                            } else {
                                if ($idperiodo == NULL || $idnoperiodo == NULL) {
                                    $aux_btn = 1;
                                    $output .= '
                          <td>' . $especialización . '</td>  
                          <td style="background-color:blue; color: #FFFFFF;">' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>';
                                    if ($validar_alumno == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                    } else {
                                        $output .= '<td>' . $curp . '</td>  
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                    }
                                } else {
                                    if ($validar_alumno == NULL) {
                                        $aux_btn = 1;
                                        $output .= '<tr style="background-color:red; color: #FFFFFF;">  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td>' . $periodo . '</td>  
                          <td>' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>
                          <td style="background-color:blue; color: #FFFFFF;">' . $curp . '</td> 
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                    } else {
                                        if ($tamanio > 1) {
                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);

                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera,$acuerdo);
                                            $idmc = $this->calificacion_model->consultar_mapa_curricular($idperiodo->idperiodo, $idnoperiodo->idnoperiodo,$idplan->idpe);
                                            $idmapa = $idmc->idmc;

                                            $materias_plan = $this->calificacion_model->consultar_materias_plan($idmapa);

                                            $materias_del_periodo = array();
                                            $cont_plan = 0;
                                            foreach ($materias_plan as $materia_plan) {
                                                $materias_del_periodo[$cont_plan] = $materia_plan->asignatura;
                                                //echo $materias_del_periodo[$cont_plan];
                                                $cont_plan++;
                                            }
                                        } else {
                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                            $idnoperiodo = 1;
                                        }
                                        $output .= '<tr>  
                        <td>' . $row . '</td>
                          <td>' . $especialización . '</td>  
                          <td>' . $periodo . '</td>';
                                        $indice = array_search($materia, $materias_del_periodo);
                                        if (in_array($materia, $materias_del_periodo)) {
                                            $output .= '<td>' . $materia . '</td> '
                                                    . '<td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>
                          <td>' . $curp . '</td> 
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>';
                                        } else {
                                            $idplan = $this->calificacion_model->consultar_plan($clave_plan_estudios,$carrera,$acuerdo);
                                            $optativas=$this->calificacion_model->consultar_optativas($idplan->idpe);
                                            $optativas_plan = array();
                                            $cont_opt = 0;
                                            foreach ($optativas as $optativa) {
                                                $optativas_plan[$cont_opt] = $optativa->nomoptativa;
                                                $cont_opt++;
                                            }
                                            if (in_array($materia, $optativas_plan)) {
                                                $output .= '<td>' . $materia . '</td> '
                                                    . '<td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>
                          <td>' . $curp . '</td> 
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>';
                                            }
                                            else{
                                                
                                            
                                            $aux_btn = 1;
                                            $output .= '
                          <td style="background-color:#FC6109; color: white;">' . $materia . '</td>  
                          <td>' . $ap . '</td>  
                          <td>' . $am . '</td>  
                          <td>' . $nombres . '</td>
                          <td>' . $curp . '</td> 
                          <td>' . $grupo . '</td>  
                          <td>' . $escuela_pro . '</td>  
                          <td>' . $tipo_ingreso . '</td>  
                          <td>' . $calificacion . '</td>
                          <td>' . $nomenclatura . '</td>
                          <td>' . $fecha_exa . '</td>
                          <td>' . $estatus . '</td>
                     </tr>  
                     ';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $cont++;
                    }
                }
                $output .= '</tbody></table></div>';
                
                if ($acuerdo != NULL && $aux_btn != 1) {
                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                    $validar_grupos = $this->inscripcion_model->consultar_grupos($idacuerdo->idacuerdo);
                    if ($cont_grupos <= $validar_grupos->gruposautorizado) {
                        $output .= '<form method="post" action="' . base_url() . 'analista_servicios/calificacion_subir/calificacion_post" id="form-calificacion-data">
                                <input type="hidden" id="validador" name="validador" value="' . $nombre_archivo . '">
                                <button class="btn btn-primary next text-left" type="button" id="btnCalificacion" name="btnCalificacion">
                                    <i class="fa fa-check">Aceptar</i>
                                </button>
                            </form>';
                        echo $output;
                    } else {
                        $output .= '<input type="hidden"  name="prueba" id="prueba" value="1"/>';
                        echo $output;
                    }
                } else {
                    echo $output;
                }
                //move_uploaded_file($_FILES['file']['tmp_name'], 'static/excel/'.$nombre_archivo);
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    copy($_FILES['file']['tmp_name'], "static/excel/fin/$nombre_archivo");
                    //echo "El archivo se ha subido correctamente al servidor, muchas gracias <p>";
                } else {
                    //echo "Error al subir el archivo";
                }
            } else {
                echo '<label class="text-danger">Archivo no válido</label>';
            }
        } else {
            echo 'Nada';
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
