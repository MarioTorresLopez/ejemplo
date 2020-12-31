<?php

/*
 * Modelo del controlador modalidad
 *
 * Modelo que contenga las consultas necesarias para realizar el CRUD. (create,read,update,delete)
 * 
 * @since       1.0
 * @version     1.0
 * @link        NA
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/models/modalidad_model.php
 */

/**
 * Description of modalidad_model
 *
 * @author CIDTAI
 */
class modalidad_model extends CI_Model {
    
    public function consultar_modalidades() {
        $cmd = "SELECT * FROM modalidad WHERE estatus = 1 ORDER BY idmodalidad DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_modalidad($id){
    	$cmd="SELECT * FROM modalidad WHERE idmodalidad='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    //Metodo que inserte en la tabla usuario
	public function crear_modalidad($arr) {
		$this->db->insert('modalidad', $arr);
		return TRUE;
	}

    /*public function crear_modalidad($nombre) {
        $cmd = "INSERT INTO modalidad (nommodalidad,estatus) VALUES ('$nombre',1)";
        $query = $this->db->query($cmd);
        return TRUE;
    }*/
    
    public function  editar_modalidad($id,$nom){
        $cmd = "UPDATE modalidad SET nommodalidad='$nom' WHERE idmodalidad='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar($id){
    	$cmd = "UPDATE modalidad SET estatus=0 WHERE idmodalidad='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($nombre){

        $cmd="SELECT * FROM modalidad WHERE nommodalidad LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE modalidad SET estatus=1 WHERE idmodalidad='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_modalidad_existente($nom)
    {
        $cmd="SELECT * FROM modalidad WHERE nommodalidad LIKE '$nom'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
}
