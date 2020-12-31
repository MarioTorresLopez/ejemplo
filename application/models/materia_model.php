<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materia_model
 *
 * @author CIDTAI-UTEQ
 */
class materia_model extends CI_Model {
    
    public function consultar_materias () {
        $cmd = "SELECT * FROM materia WHERE estatus = 1 ORDER BY idmateria DESC";
         $query = $this->db->query($cmd);
		return ($query->num_rows() > 0) ? $query->result() : NULL;
                
        
    }
    
    
    //Función para seleccionar un registro en especifico
    public function consultar_materia($id){

    	$cmd = "SELECT * FROM materia WHERE idmateria='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;

    }

    //Función para crear un nuevo nivel educativo
	public function crear_materia($arr) {
            
            $cmd = "INSERT INTO materia (idmateria, asignatura,fechamodificacion,usuariomodificacion,estatus) "
                . " VALUES ((SELECT (MAX(idmateria)+1) idmax FROM materia), '" . $arr['asignatura'] . "', '" . $arr['fechamodificacion'] . "', '" 
                . $arr['usuariomodificacion'] . "', '" . $arr['estatus'] . "')";  
            $this->db->query($cmd);
            return TRUE;
	}
    
    //Función para editar un registro 
    public function  editar_materias($id,$nombre){

        $cmd = "UPDATE materia SET asignatura='$nombre' WHERE idmateria='$id'";
        $query = $this->db->query($cmd);
        return TRUE;

    }

    //Función para eliminar un registro
    public function eliminar_materias($id){

    	$cmd = "UPDATE materia SET estatus=0 WHERE idmateria='$id'";
        $query = $this->db->query($cmd);
        return TRUE;

    }

    public function existente($nombre,$idmc){

        $cmd="SELECT * FROM materia WHERE asignatura LIKE '$nombre' and idmc='$idmc'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE materia SET estatus=1 WHERE idmateria='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
  
}
