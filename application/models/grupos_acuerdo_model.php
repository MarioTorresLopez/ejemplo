<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupo_acuerdo_model
 *
 * @author CIDTAI
 */
class grupos_acuerdo_model extends CI_Model {

    public function crear_grupos_acuerdo($arr) {
        
        $this->db->insert('gruposacuerdo', $arr);
        return TRUE;
        
    }

    public function consultar_grupos_acuerdo($idacuerdo) {
        
        $cmd = "SELECT * FROM gruposacuerdo  
            WHERE estatus = 1 AND idacuerdo = '$idacuerdo' ORDER BY idga DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function cantidad_grupos_acuerdo($idacuerdo) {
        
        $cmd = "SELECT COUNT(idacuerdo) cangrupos FROM gruposacuerdo WHERE idacuerdo = '$idacuerdo'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }

    public function cantidad_alumnos_acuerdo($idacuerdo){
        
        $cmd="SELECT SUM(alumnosxgrupo) canalumnos FROM gruposacuerdo WHERE idacuerdo = '$idacuerdo'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_grupos() {
        
        $cmd = "SELECT *, (SELECT noacuerdo FROM acuerdo WHERE acuerdo.idacuerdo = gruposacuerdo.idacuerdo) 
            FROM gruposacuerdo 
            WHERE estatus = 1 
            ORDER BY idga DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_acuerdos_existentes() {
        
        $cmd = "SELECT * FROM acuerdo WHERE NOT noacuerdo = ''";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
}
