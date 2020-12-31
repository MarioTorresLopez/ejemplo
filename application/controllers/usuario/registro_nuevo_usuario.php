<?php


/**
 * Description of registro_nuevo_usuario
 *
 * @author UTEQ
 * Clase que visualiza mustrara el formulario para realizar solicitud de 
 * crear cuenta 
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
class registro_nuevo_usuario extends CI_Controller {
    //cosntructor para jalar los model y no se esten recargando cada vez que se utilizan
      public function __construct()
    {
        parent::__construct();
        $this->load->model('municipio_model');
         $this->load->model('estado_model');
          $this->load->model('roles_model');
          $this->load->model('notificacion_model');
    }

    

    //put your code here
    public function index() {
          $data = array();
          $data['municipios'] = $this->municipio_model->consultar_municipios();
       
        $data['estados'] = $this->estado_model->consultar_estados();
           
         
        /*
         * para metro que indica que el controlador usa un archivo .js para 
         * realizar una funcion en la vista por medio de jQuery
         * @uses ./static/admin/js/alerts_recuperar_passw
         * 
         */
        
        $data['scripts'] = array();
        $data['scripts'][] = 'alerts_recuperar_passw';

        $data['scripts'][] = 'correoEnviado';
        $data['scripts'][] = 'validacionCorreo';

        /*
         * parameto que se manda a la  vista para mostrar el titulo
         */
        $data['titulo'] = app_title() . " | Registro de cuenta nueva";
        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $data = $this->load->view('app/public/usuario/registro_nuevo_usuario_view', $data, FALSE);    
    }
    
    public function crear_solicitud() {
        
            //Validamos los campos del formulario
        $this->form_validation->set_rules('apellido1', 'apellido1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('apellido2', 'apellido2', 'trim|xss_clean');
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('curp', 'curp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono1', 'telefono1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono2', 'telefono2', 'trim|xss_clean');
        $this->form_validation->set_rules('correo1', 'correo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('calle', 'calle', 'trim|required|xss_clean');
        $this->form_validation->set_rules('noint', 'noint', 'trim|xss_clean');
        $this->form_validation->set_rules('noext', 'noext', 'trim|required|xss_clean');
        $this->form_validation->set_rules('colonia', 'colonia', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp', 'cp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idestado', 'idestado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idmunicipio', 'idmunicipio', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password1', 'password', 'trim|required|xss_clean');       

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            //Creamos un arreglo con los campos de la base de datos
            //como indice y el valor a partir del post
           
            $arr_ins_solicitud = array();
            $arr_ins_solicitud['nombre'] = $this->input->post('nombre');
            $arr_ins_solicitud['apellido1'] = $this->input->post('apellido1');
            $arr_ins_solicitud['apellido2'] = $this->input->post('apellido2');
            $arr_ins_solicitud['curp'] = $this->input->post('curp');
            $arr_ins_solicitud['telefono1'] = $this->input->post('telefono1');
            $arr_ins_solicitud['telefono2'] = $this->input->post('telefono2');
            $arr_ins_solicitud['correo'] = $this->input->post('correo1');
            $arr_ins_solicitud['calle'] = $this->input->post('calle');
            $arr_ins_solicitud['noint'] = $this->input->post('noint');
            $arr_ins_solicitud['noext'] = $this->input->post('noext');
            $arr_ins_solicitud['colonia'] = $this->input->post('colonia');
            $arr_ins_solicitud['cp'] = $this->input->post('cp');
            $arr_ins_solicitud['idestado'] = $this->input->post('idestado');
            $arr_ins_solicitud['idmunicipio'] = $this->input->post('idmunicipio');
            $arr_ins_solicitud['password'] = md5($this->input->post('password1'));
            $arr_ins_solicitud['fechasolicitud'] = date('Y-m-d H:i:s');
            $arr_ins_solicitud['estatus'] = 2;

            //Cargar liberias de conexion
            //autoload.php   <----- 
        
            //Cargamos el modelo correspondiente
            $this->load->model('solicitud_model');     
            //sacamos el curp para verificarlo  
           $nom = $this->input->post('curp');
           $nom = $this->input->post('correo');
            
           $variable = $this->solicitud_model->existente_curp($arr_ins_solicitud['curp']);
           $variable2 = $this->solicitud_model->existente_correo($arr_ins_solicitud['correo']);
          
            if(!is_null($variable)){
                     //validamos que el curp no exista el cual lo traemos desde la base de datos
                $this->session->set_flashdata('solicitud_incorrecta', 'El aspirante ya existe,Verificar Curp');
                    redirect(base_url() .'usuario/registro_nuevo_usuario', 'refresh');
            }if(!is_null($variable2)){
                  //validamos que el correo electronico no exista el cual lo traemos desde la base de datos
                $this->session->set_flashdata('solicitud_incorrecta2', 'El aspirante ya existe,Verificar correo electronico');
                    redirect(base_url() .'usuario/registro_nuevo_usuario', 'refresh');
            }else{
                //aqui creamos la solicitud 
                $this->solicitud_model->crear_solicitud($arr_ins_solicitud);
                $arr_notificacion = array(
                    "tipo" => 1,
                    "leido" => 0,
                    "idusuarioorigen" => null,
                    "idrol" => 12,
                    "idusuariodestino" => null,
                    "fecha" => date('Y-m-d H:i:s')
                );
                $this->notificacion_model->crear_notificacion($arr_notificacion); 
                
                redirect(base_url()."login", 'refresh');
                //echo "es la buena";
            }
            
        }
        else{
            var_dump(validation_errors());
        }      
        


    }
     //esta funcion sirve para mandar a llamar todos los municipios de un estado que se señale en la vista
       public function buscar_municipio1() {
        $data = array();
        $options = "";
        if ($this->input->post('idestado')) {
            $estado = $this->input->post('idestado');
            $municipios = $this->municipio_model->consultar_municipios_estado($estado);
            foreach ($municipios as $fila) {
                ?>
                 <option value="<?= $fila->idmunicipio ?>"><?= $fila->nombremunicipio ?></option>
                <?php
            }
        }
    } 
   


}
