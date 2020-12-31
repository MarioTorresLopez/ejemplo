<?php

/*
 * Modelo del controlador detalle_datos_cuentas_aspirantes
 *
 * Modelo que contenga la asignación de número de expediente y folio al aspirante
 * 
 * @since       1.0
 * @version     1.0
 * @link        NA
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/models/solicitud_model.php
 */

/**
 * Description of solicitud_model
 *
 * @author CIDTAI
 */
class solicitud_model extends CI_Model {
   
    //Función para crear una solicitud
    public function crear_solicitud($arr){
        
        $this->db->insert('solicitud', $arr);
        return TRUE;
        
    }
    
    //Función para ver si esa solicitud ya existe
    public function existente_curp($curp){

        $cmd="SELECT * FROM solicitud WHERE curp LIKE '$curp'";
        $query=$this->db->query($cmd);
        
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }
    //funcion para ver si existe el correo en una solicitud
      public function existente_correo($correo){

        $cmd="SELECT * FROM solicitud WHERE correo LIKE '$correo'";
        $query=$this->db->query($cmd);
        
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }
    
    //Función para consultar todas las solicitudes pendientes 
    //Estatus de solicitudes pendientes es 2
    public function consultar_solicitudes_pendientes(){
        
        $cmd = "SELECT * FROM solicitud WHERE estatus=2 ORDER BY idsolicitud DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    //Función para consultar la información del usuario seleccionado
    public function consultar_solicitud_pendiente($id){
        
        $cmd = "SELECT * FROM solicitud s 
            INNER JOIN municipio m ON(s.idmunicipio=m.idmunicipio) 
            INNER JOIN estado e ON(s.idestado=e.idestado)
            WHERE s.idsolicitud='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    //Función para aceptar la solicitud de la cuenta de aspirante
    // Aceptacion de cuenta estatus = 1 
    public function aceptar_cuenta($idsolicitud){
        
        $cmd = "UPDATE solicitud SET estatus=1 WHERE idsolicitud='$idsolicitud'";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    //Función para eliminar la solicitud del aspirante
    //Estatus de solicitud rechazada es 0
    public function eliminar_solicitud($id){
        
    	$cmd = "UPDATE solicitud SET estatus=0 WHERE idsolicitud='$id'";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    //Función para consultar todas las solicitudes aceptadas
    public function consultar_solicitudes_aceptadas(){
        
        $cmd = "SELECT * FROM solicitud s 
            INNER JOIN usuario u ON(s.idsolicitud=u.idsolicitud) 
            ORDER BY s.idsolicitud DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_solicitud_aceptada($id){
        
        $cmd = "SELECT * FROM solicitud s  
              INNER JOIN usuario u ON(s.idsolicitud=u.idsolicitud) 
              INNER JOIN municipio m ON(s.idmunicipio=m.idmunicipio)  
              INNER JOIN estado e ON(s.idestado=e.idestado) 
              WHERE s.idsolicitud='$id' AND s.estatus=1";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
}
