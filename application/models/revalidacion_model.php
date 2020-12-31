<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of revalidacionmodel
 *
 * @author CIDTAI
 */
class revalidacion_model extends CI_Model {
    
    //Función para ingresar una solicitud de revalidación
    public function crear_solicitud_revalidacion($arr) {
        
        $this->db->insert('solicitudrevalidacion', $arr);
        return true;
        
    }
    
    //Función para mostrar los datos de la solicitud seleccionada
    public function consultar_solicitud_revalidacion($idsolicitud) {
        
        $cmd = "SELECT * FROM solicitudrevalidacion WHERE idrev = '$idsolicitud'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
        
    }
    
    //Función para ingresar una solicitud de revalidación del extranjero
    public function crear_solicitud_revalidacion_extranjero($arr) {
        
        $this->db->insert('solicitudrevalidacionextra', $arr);
        return true;
        
    }
    
    //Función para mostrar los datos de la solicitud seleccionada
    public function consultar_solicitud_revalidacion_extranjero($idsolicitud) {
        
        $cmd = "SELECT * FROM solicitudrevalidacionextra WHERE idrevsol = '$idsolicitud'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_solicitudes() {
        $cmd = "select * from solicitudrevalidacion";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_solicitudes_extranjero() {
        $cmd = "select * from solicitudrevalidacionextra";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
}
