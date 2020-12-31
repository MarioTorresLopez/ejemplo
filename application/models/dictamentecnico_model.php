<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dictamentecnico_model
 *
 * @author UTEQ
 */
class dictamentecnico_model extends CI_Model{
    
    public function crear_solicitud($arr) {
        $this->db->insert('dictamentecnicosolicitud', $arr);
        return true;
    }
    
    public function consultar_solicitud($idsolicitud) {
        $cmd = "select * from dictamentecnicosolicitud where idsolicitud='$idsolicitud'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_solicitudes() {
        $cmd = "select * from dictamentecnicosolicitud";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function editar($id,$data) {
        $this->db->where('idsolicitud', $id);
        $this->db->update('dictamentecnicosolicitud', $data);
        return true;
    }
}
