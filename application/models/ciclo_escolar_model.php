<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ciclo_escolar_model
 *
 * @author CIDTAI
 */
class ciclo_escolar_model extends CI_Model {
    
    public function consultar_ciclos_escolares(){
        
        $cmd = "SELECT idciclo, concat(fechainicio, '-', fechafinal ) tiempo FROM ciclo WHERE descripcion = '1' ORDER BY fechainicio DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
}
