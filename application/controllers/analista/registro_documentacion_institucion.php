<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registro_documentacion_acuerdo
 *
 * @author CIDTAI
 */
class registro_documentacion_institucion extends CI_Controller {

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
        //Invocar el models necesario para registrar los documentos
        $this->load->model('documento_model');
    }
    
    public function subir_documentacion_plantilla_personal() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de plantilla de personal
                $plantilla_personal = 'plantilla_personal';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($plantilla_personal)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de plantilla de personal
                $plantilla_personal = 'plantilla_personal';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($plantilla_personal)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de plantilla de personal
                $plantilla_personal = 'plantilla_personal';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($plantilla_personal)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
    /*
    public function subir_documentacion_inventario() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Inventario
        $carpeta_documento_I = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/IN';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_I)) {

                    mkdir($carpeta_documento_I, 0777, TRUE);

                    //Enviar archivo del inventario
                    $inventario = 'inventario';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/I/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inventario)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_I)) {

                    mkdir($carpeta_documento_I, 0777, TRUE);

                    //Enviar archivo del inventario
                    $inventario = 'inventario';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/I/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inventario)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_I)) {

                    mkdir($carpeta_documento_I, 0777, TRUE);

                    //Enviar archivo del inventario
                    $inventario = 'inventario';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/I/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inventario)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo del inventario
                    $inventario = 'inventario';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/I/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inventario)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-I';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        }
    }
    */
    
    public function subir_documentacion_material_biblio() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de material bibliográfico
                $material_biblio = 'material_biblio';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MB';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($material_biblio)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MB';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de material bibliográfico
                $material_biblio = 'material_biblio';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MB';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($material_biblio)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MB';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de material bibliográfico
                $material_biblio = 'material_biblio';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MB';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($material_biblio)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MB';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
    public function subir_documentacion_labo_poli() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Laboratorio Polifuncional
        $carpeta_documento_LP = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/LP';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de laboratorio polifuncional
                $labo_poli = 'labo_poli';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-LP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($labo_poli)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-LP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de laboratorio polifuncional
                $labo_poli = 'labo_poli';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-LP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($labo_poli)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-LP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de laboratorio polifuncional
                $labo_poli = 'labo_poli';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-LP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($labo_poli)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-LP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
    public function subir_documentacion_inst_eval() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de acta de CEPPEMS
                $inst_eval = 'inst_eval';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CEPPEMS';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($inst_eval)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CEPPEMS';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de acta de CEPPEMS
                $inst_eval = 'inst_eval';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CEPPEMS';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($inst_eval)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CEPPEMS';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de acta de CEPPEMS
                $inst_eval = 'inst_eval';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CEPPEMS';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($inst_eval)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CEPPEMS';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
    /*
    public function subir_documentacion_acervo_biblio() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Acervo Bibliográfico
        $carpeta_documento_AB = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AB';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_AB)) {

                    mkdir($carpeta_documento_AB, 0777, TRUE);

                    //Enviar archivo de acervo bibliográfico
                    $acervo_biblio = 'acervo_biblio';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AB/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acervo_biblio)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_AB)) {

                    mkdir($carpeta_documento_AB, 0777, TRUE);

                    //Enviar archivo de acervo bibliográfico
                    $acervo_biblio = 'acervo_biblio';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AB/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acervo_biblio)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_AB)) {

                    mkdir($carpeta_documento_AB, 0777, TRUE);

                    //Enviar archivo de acervo bibliográfico
                    $acervo_biblio = 'acervo_biblio';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AB/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acervo_biblio)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de acervo bibliográfico
                    $acervo_biblio = 'acervo_biblio';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AB/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acervo_biblio)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AB';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        }
    }
    */
    
    public function subir_documentacion_mapa_doc() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo del mapa curricular
                $mapa_doc = 'mapa_doc';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($mapa_doc)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MC';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo del mapa curricular
                $mapa_doc = 'mapa_doc';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($mapa_doc)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MC';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo del mapa curricular
                $mapa_doc = 'mapa_doc';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($mapa_doc)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-MC';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }

    /*
    public function subir_documentacion_prog_estu() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Programa de Estudios
        $carpeta_documento_PES = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PES';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PES)) {

                    mkdir($carpeta_documento_PES, 0777, TRUE);

                    //Enviar archivo de programa de estudios
                    $prog_estu = 'prog_estu';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PES/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($prog_estu)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PES)) {

                    mkdir($carpeta_documento_PES, 0777, TRUE);

                    //Enviar archivo de programa de estudios
                    $prog_estu = 'prog_estu';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PES/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($prog_estu)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_PES)) {

                    mkdir($carpeta_documento_PES, 0777, TRUE);

                    //Enviar archivo de programa de estudios
                    $prog_estu = 'prog_estu';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PES/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($prog_estu)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de programa de estudios
                    $prog_estu = 'prog_estu';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PES/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($prog_estu)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PES';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        }
    }
    */
    
    /*
    public function subir_documentacion_plat_tecno() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Plataforma Tecnológica Educativa
        $carpeta_documento_PTE = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PTE';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PTE)) {

                    mkdir($carpeta_documento_PTE, 0777, TRUE);

                    //Enviar archivo de plataforma tecnológica educativa
                    $plat_tecno = 'plat_tecno';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PTE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plat_tecno)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PTE)) {

                    mkdir($carpeta_documento_PTE, 0777, TRUE);

                    //Enviar archivo de plataforma tecnológica educativa
                    $plat_tecno = 'plat_tecno';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PTE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plat_tecno)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_PTE)) {

                    mkdir($carpeta_documento_PTE, 0777, TRUE);

                    //Enviar archivo de plataforma tecnológica educativa
                    $plat_tecno = 'plat_tecno';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PTE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plat_tecno)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de plataforma tecnológica educativa
                    $plat_tecno = 'plat_tecno';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PTE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plat_tecno)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PTE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        }
    }
    */
    
    /*
    public function subir_documentacion_inst_espe() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento  
        // Instalaciones Especiales
        $carpeta_documento_IE = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/IE';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_IE)) {

                    mkdir($carpeta_documento_IE, 0777, TRUE);

                    //Enviar archivo de instalaciones especiales
                    $inst_espe = 'inst_espe';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/IE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inst_espe)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_IE)) {

                    mkdir($carpeta_documento_IE, 0777, TRUE);

                    //Enviar archivo de instalaciones especiales
                    $inst_espe = 'inst_espe';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/IE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inst_espe)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_IE)) {

                    mkdir($carpeta_documento_IE, 0777, TRUE);

                    //Enviar archivo de instalaciones especiales
                    $inst_espe = 'inst_espe';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/IE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inst_espe)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de instalaciones especiales
                    $inst_espe = 'inst_espe';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/IE/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($inst_espe)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IE';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                }
            }
        }
    }
    */
    
    public function subir_documentacion_coepes() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de COEPES
                $coepes = 'coepes';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-COEPES';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($coepes)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-COEPES';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de COEPES
                $coepes = 'coepes';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-COEPES';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($coepes)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-COEPES';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de COEPES
                $coepes = 'coepes';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-COEPES';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($coepes)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-COEPES';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
    public function subir_documentacion_desc_inst() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de la descripción de las instalaciones
                $desc_inst = 'desc_inst';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($desc_inst)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo de la descripción de las instalaciones
                $desc_inst = 'desc_inst';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($desc_inst)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de la descripción de las instalaciones
                $desc_inst = 'desc_inst';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($desc_inst)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
    public function subir_documentacion_acuerdo() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo acuerdo
                $acuerdo = 'acuerdo';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-A';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acuerdo)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-A';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo acuerdo
                $acuerdo = 'acuerdo';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-A';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acuerdo)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-A';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo acuerdo
                $acuerdo = 'acuerdo';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-A';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acuerdo)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-A';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }

    public function subir_documentacion_opinion_tec() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');
        $id_institucion = $this->input->post('id_institucion');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo OTA
                $opinion_tec = 'opinion_tec';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OTA';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acuerdo)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OTA';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                //Enviar archivo OTA
                $opinion_tec = 'opinion_tec';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OTA';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acuerdo)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OTA';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo OTA
                $opinion_tec = 'opinion_tec';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OTA';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acuerdo)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OTA';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            }
        }
    }
    
}
