<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registrar_documentacion_general
 *
 * @author CIDTAI
 */
class registro_documentacion_general extends CI_Controller {

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

    public function subir_documentacion_acta_prop() {

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

                //Enviar archivo de acta de nacimiento del propietario
                $acta_prop = 'acta_prop';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_prop)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANP';

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

                //Enviar archivo de acta de nacimiento del propietario
                $acta_prop = 'acta_prop';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_prop)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de acta de nacimiento del propietario
                $acta_prop = 'acta_prop';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_prop)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANP';

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

    public function subir_documentacion_iden_ofic_prop() {

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

                //Enviar archivo de identificación oficial del propietario
                $iden_ofic_prop = 'iden_ofic_prop';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IOP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($iden_ofic_prop)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IOP';

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

                //Enviar archivo de identificación oficial del propietario
                $iden_ofic_prop = 'iden_ofic_prop';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IOP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($iden_ofic_prop)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IOP';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de identificación oficial del propietario
                $iden_ofic_prop = 'iden_ofic_prop';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IOP';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($iden_ofic_prop)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IOP';

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

    public function subir_documentacion_acta_repr() {

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

                //Enviar archivo de acta de nacimiento del representante legal
                $acta_repr = 'acta_repr';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANRL';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_repr)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANRL';

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

                //Enviar archivo de acta de nacimiento del representante legal
                $acta_repr = 'acta_repr';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANRL';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_repr)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANRL';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de acta de nacimiento del representante legal
                $acta_repr = 'acta_repr';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANRL';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_repr)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ANRL';

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

    public function subir_documentacion_iden_ofic_repr() {

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

                //Enviar archivo de identificación oficial del representante legal
                $iden_ofic_repr = 'iden_ofic_repr';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IORL';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($iden_ofic_repr)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IORL';

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

                //Enviar archivo de identificación oficial del representante legal
                $iden_ofic_repr = 'iden_ofic_repr';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IORL';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($iden_ofic_repr)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IORL';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de identificación oficial del representante legal
                $iden_ofic_repr = 'iden_ofic_repr';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IORL';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($iden_ofic_repr)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-IORL';

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
    public function subir_documentacion_nota_repr() {

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
        // Documento que Acredita al Representante Legal
        $carpeta_documento_DARL = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DARL';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DARL)) {

                    mkdir($carpeta_documento_DARL, 0777, TRUE);

                    //Enviar archivo de documento que acredita al representante legal
                    $nota_repr = 'nota_repr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DARL/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($nota_repr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';

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

                if (!file_exists($carpeta_documento_DARL)) {

                    mkdir($carpeta_documento_DARL, 0777, TRUE);

                    //Enviar archivo de documento que acredita al representante legal
                    $nota_repr = 'nota_repr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DARL/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($nota_repr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';

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

                if (!file_exists($carpeta_documento_DARL)) {

                    mkdir($carpeta_documento_DARL, 0777, TRUE);

                    //Enviar archivo de documento que acredita al representante legal
                    $nota_repr = 'nota_repr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DARL/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($nota_repr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de documento que acredita al representante legal
                    $nota_repr = 'nota_repr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DARL/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($nota_repr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DARL';

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
    public function subir_documentacion_acredit_perso() {

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
        // Acreditación de la Persona
        $carpeta_documento_AP = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AP';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_AP)) {

                    mkdir($carpeta_documento_AP, 0777, TRUE);

                    //Enviar archivo del acreditación de la persona
                    $acredit_perso = 'acredit_perso';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acredit_perso)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';

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

                if (!file_exists($carpeta_documento_AP)) {

                    mkdir($carpeta_documento_AP, 0777, TRUE);

                    //Enviar archivo del acreditación de la persona
                    $acredit_perso = 'acredit_perso';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acredit_perso)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';

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

                if (!file_exists($carpeta_documento_AP)) {

                    mkdir($carpeta_documento_AP, 0777, TRUE);

                    //Enviar archivo del acreditación de la persona
                    $acredit_perso = 'acredit_perso';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acredit_perso)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo del acreditación de la persona
                    $acredit_perso = 'acredit_perso';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/AP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acredit_perso)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AP';

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
    
    public function subir_documentacion_acta_const() {

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

                //Enviar archivo de acta constitutiva
                $acta_const = 'acta_const';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_const)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AC';

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

                //Enviar archivo de acta constitutiva
                $acta_const = 'acta_const';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_const)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AC';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de acta constitutiva
                $acta_const = 'acta_const';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($acta_const)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-AC';

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
    public function subir_documentacion_ocup_legal() {

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
        // Ocupación Legal del Inmueble
        $carpeta_documento_OLI = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/OLI';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_OLI)) {

                    mkdir($carpeta_documento_OLI, 0777, TRUE);

                    //Enviar archivo de ocupación legal del inmueble
                    $ocup_legal = 'ocup_legal';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/OLI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($ocup_legal)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

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

                if (!file_exists($carpeta_documento_OLI)) {

                    mkdir($carpeta_documento_OLI, 0777, TRUE);

                    //Enviar archivo de ocupación legal del inmueble
                    $ocup_legal = 'ocup_legal';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/OLI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($ocup_legal)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

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

                if (!file_exists($carpeta_documento_OLI)) {

                    mkdir($carpeta_documento_OLI, 0777, TRUE);

                    //Enviar archivo de ocupación legal del inmueble
                    $ocup_legal = 'ocup_legal';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/OLI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($ocup_legal)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de ocupación legal del inmueble
                    $ocup_legal = 'ocup_legal';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/OLI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($ocup_legal)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

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
    public function subir_documentacion_croquis() {

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
        // Croquis de la Instalación
        $carpeta_documento_CI = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CI)) {

                    mkdir($carpeta_documento_CI, 0777, TRUE);

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

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

                if (!file_exists($carpeta_documento_CI)) {

                    mkdir($carpeta_documento_CI, 0777, TRUE);

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

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

                if (!file_exists($carpeta_documento_CI)) {

                    mkdir($carpeta_documento_CI, 0777, TRUE);

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

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
    public function subir_documentacion_cedula_perito() {

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
        // Cédula Profesional Perito
        $carpeta_documento_CPP = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CPP)) {

                    mkdir($carpeta_documento_CPP, 0777, TRUE);

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

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

                if (!file_exists($carpeta_documento_CPP)) {

                    mkdir($carpeta_documento_CPP, 0777, TRUE);

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

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

                if (!file_exists($carpeta_documento_CPP)) {

                    mkdir($carpeta_documento_CPP, 0777, TRUE);

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

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
    public function subir_documentacion_acre_legal_estr() {

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
        // Acreditación Legal del Inmueble(Escritura Pública)
        $carpeta_documento_ALIEP = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIEP';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_ALIEP)) {

                    mkdir($carpeta_documento_ALIEP, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(escritura pública)
                    $acre_legal_estr = 'acre_legal_estr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIEP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_estr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';

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

                if (!file_exists($carpeta_documento_ALIEP)) {

                    mkdir($carpeta_documento_ALIEP, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(escritura pública)
                    $acre_legal_estr = 'acre_legal_estr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIEP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_estr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';

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

                if (!file_exists($carpeta_documento_ALIEP)) {

                    mkdir($carpeta_documento_ALIEP, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(escritura pública)
                    $acre_legal_estr = 'acre_legal_estr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIEP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_estr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de acreditación legal del inmueble(escritura pública)
                    $acre_legal_estr = 'acre_legal_estr';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIEP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_estr)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIEP';

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
    public function subir_documentacion_acre_legal_arre() {

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
        // Acreditación Legal del Inmueble(Contrato de Arrendamiento)
        $carpeta_documento_ALICA = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICA';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_ALICA)) {

                    mkdir($carpeta_documento_ALICA, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(contrato de arrendamiento)
                    $acre_legal_arre = 'acre_legal_arre';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_arre)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';

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

                if (!file_exists($carpeta_documento_ALICA)) {

                    mkdir($carpeta_documento_ALICA, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(contrato de arrendamiento)
                    $acre_legal_arre = 'acre_legal_arre';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_arre)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';

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

                if (!file_exists($carpeta_documento_ALICA)) {

                    mkdir($carpeta_documento_ALICA, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(contrato de arrendamiento)
                    $acre_legal_arre = 'acre_legal_arre';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_arre)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de acreditación legal del inmueble(contrato de arrendamiento)
                    $acre_legal_arre = 'acre_legal_arre';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_arre)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICA';

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
    public function subir_documentacion_acre_legal_como() {

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
        // Acreditación Legal del Inmueble(Contrato de Comodato)
        $carpeta_documento_ALICC = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICC';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_ALICC)) {

                    mkdir($carpeta_documento_ALICC, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(contrato de comodato)
                    $acre_legal_como = 'acre_legal_como';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_como)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';

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

                if (!file_exists($carpeta_documento_ALICC)) {

                    mkdir($carpeta_documento_ALICC, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(contrato de comodato)
                    $acre_legal_como = 'acre_legal_como';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_como)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';

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

                if (!file_exists($carpeta_documento_ALICC)) {

                    mkdir($carpeta_documento_ALICC, 0777, TRUE);

                    //Enviar archivo de acreditación legal del inmueble(contrato de comodato)
                    $acre_legal_como = 'acre_legal_como';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_como)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo de acreditación legal del inmueble(contrato de comodato)
                    $acre_legal_como = 'acre_legal_como';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALICC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_como)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALICC';

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
    public function subir_documentacion_acre_legal_otro() {

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
        // Acreditación Legal del Inmueble(Otro)
        $carpeta_documento_ALIO= 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIO';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_ALIO)) {

                    mkdir($carpeta_documento_ALIO, 0777, TRUE);

                    //Enviar archivo del acreditación legal del inmueble(otro)
                    $acre_legal_otro = 'acre_legal_otro';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIO/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_otro)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';

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

                if (!file_exists($carpeta_documento_ALIO)) {

                    mkdir($carpeta_documento_ALIO, 0777, TRUE);

                    //Enviar archivo del acreditación legal del inmueble(otro)
                    $acre_legal_otro = 'acre_legal_otro';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIO/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_otro)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';

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

                if (!file_exists($carpeta_documento_ALIO)) {

                    mkdir($carpeta_documento_ALIO, 0777, TRUE);

                    //Enviar archivo del acreditación legal del inmueble(otro)
                    $acre_legal_otro = 'acre_legal_otro';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIO/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_otro)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    }
                } else {

                    //Enviar archivo del acreditación legal del inmueble(otro)
                    $acre_legal_otro = 'acre_legal_otro';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/ALIO/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($acre_legal_otro)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-ALIO';

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
    
    public function subir_documentacion_ocup_legal() {

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

                //Enviar archivo de ocupación legal del inmueble
                $ocup_legal = 'ocup_legal';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($ocup_legal)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

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

                //Enviar archivo de ocupación legal del inmueble
                $ocup_legal = 'ocup_legal';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($ocup_legal)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de ocupación legal del inmueble
                $ocup_legal = 'ocup_legal';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($ocup_legal)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-OLI';

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
    
    public function subir_documentacion_dictamen() {

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

                //Enviar archivo de dictamen de uso de suelo
                $dictamen = 'dictamen';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($dictamen)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

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

                //Enviar archivo de dictamen de uso de suelo
                $dictamen = 'dictamen';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($dictamen)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de dictamen de uso de suelo
                $dictamen = 'dictamen';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($dictamen)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

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
    
    public function subir_documentacion_const_seg() {

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

                //Enviar archivo de constancia de seguridad estructural
                $const_seg = 'const_seg';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CSE';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($const_seg)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CSE';

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

                //Enviar archivo de constancia de seguridad estructural
                $const_seg = 'const_seg';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CSE';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($const_seg)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CSE';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de constancia de seguridad estructural
                $const_seg = 'const_seg';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CSE';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($const_seg)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CSE';

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
    
    public function subir_documentacion_visto_prot() {

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

                //Enviar archivo de visto bueno de protección civil
                $visto_prot = 'visto_prot';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-VBPC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($visto_prot)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-VBPC';

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

                //Enviar archivo de visto bueno de protección civil
                $visto_prot = 'visto_prot';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-VBPC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($visto_prot)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-VBPC';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de visto bueno de protección civil
                $visto_prot = 'visto_prot';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-VBPC';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($visto_prot)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-VBPC';

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
    
    public function subir_documentacion_cert_nume_ofic() {

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

                //Enviar archivo de certificado del número oficial
                $cert_nume_ofic = 'cert_nume_ofic';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CNO';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($cert_nume_ofic)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CNO';

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

                //Enviar archivo de certificado del número oficial
                $cert_nume_ofic = 'cert_nume_ofic';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CNO';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($cert_nume_ofic)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CNO';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de certificado del número oficial
                $cert_nume_ofic = 'cert_nume_ofic';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CNO';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($cert_nume_ofic)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CNO';

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

    public function subir_documentacion_recibo_derechos() {

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

                //Enviar archivo de recibo de derechos
                $recibo_derechos = 'recibo_derechos';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RD';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($recibo_derechos)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RD';

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

                //Enviar archivo de recibo de derechos
                $recibo_derechos = 'recibo_derechos';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RD';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($recibo_derechos)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RD';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de recibo de derechos
                $recibo_derechos = 'recibo_derechos';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RD';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($recibo_derechos)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RD';

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

    public function subir_documentacion_plano() {

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

                //Enviar archivo de plano arquitectónico
                $plano = 'plano';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($plano)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

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

                //Enviar archivo de plano arquitectónico
                $plano = 'plano';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($plano)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

                    $arr_reg_documento = array();
                    $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                    $arr_reg_documento['sin_codigo'] = $sin_codigo;
                    $arr_reg_documento['id_usuario'] = $id_usuario;
                    $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                    $this->documento_model->registrar_documento($arr_reg_documento);

                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                }
            } else {

                //Enviar archivo de plano arquitectónico
                $plano = 'plano';
                $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/';
                $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($plano)) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                    redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo . "/" . $id_institucion, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

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
