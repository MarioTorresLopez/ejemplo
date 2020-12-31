<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of carrera_model
 *
 * @author CIDTAI
 */
class carrera_model extends CI_Model {

    public function consultar_carreras() {

        $cmd = "SELECT * FROM carrera WHERE estatus=1";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
    }

    public function existente($nombre) {

        $cmd = "SELECT * FROM carrera WHERE nomcarrera LIKE '$nombre'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

}
