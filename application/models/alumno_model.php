<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumno_model
 *
 * @author UTEQ
 */
class alumno_model extends CI_Model {
    
    public function crear_alumno($arr) {
        $this->db->insert('alumno', $arr);
        return $this->db->insert_id();
    }

    public function alumno_existente($curp){

        $cmd="SELECT * FROM alumno WHERE curp LIKE '$curp'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }
}
