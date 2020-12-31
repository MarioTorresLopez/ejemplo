<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equivalencia_model
 *
 * @author UTEQ
 */
class equivalencia_model extends CI_Model{
    public function crear_solicitud($arr) {
        $this->db->insert('solicitudequivalencia', $arr);
        return true;
    }
    
    public function consultar_solicitud($idsolicitud) {
        $cmd = "select * from solicitudequivalencia where idsolicitudequivalencia='$idsolicitud'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_solicitudes() {
        $cmd = "select * from solicitudequivalencia";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function editar($id,$data) {
        $this->db->where('idsolicitudequivalencia', $id);
        $this->db->update('solicitudequivalencia', $data);
        return true;
    }
}
