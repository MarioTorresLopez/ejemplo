<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of especialidad_model
 *
 * @author CIDTAI
 */
class especialidad_model extends CI_Model {

    public function consultar_especialidades() {

        $cmd = "SELECT * FROM especialidad WHERE estatus=1";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
    }

    public function crear_especialidad($data) {
        $cmd = "INSERT INTO especialidad (idespecialidad, nomespecialidad, estatus)  "
                . " VALUES((SELECT (MAX(idespecialidad)+1) idmax FROM especialidad), '" . $data['nomespecialidad'] . "','" . $data['estatus'] ."')";
        $this->db->query($cmd);
        return TRUE;
    }
    
    public function consultar_ultima_especialidad()
    {
        $cmd="SELECT MAX(idespecialidad) idespecialidad FROM especialidad";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function editar_especialidad($nomespecialidad, $idespecialidad) {
        $cmd = "UPDATE especialidad SET nomespecialidad = '$nomespecialidad' WHERE idespecialidad = '$idespecialidad'";
        $this->db->query($cmd);
        return TRUE;
    }

}
