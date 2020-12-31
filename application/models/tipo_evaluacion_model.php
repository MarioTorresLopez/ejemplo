<?php

/*
 * Modelo del controlador tipo evaluacion
 *
 * Modelo que contenga las consultas necesarias para realizar el CRUD. (create,read,update,delete)
 * 
 * @since       1.0
 * @version     1.0
 * @link        NA
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/models/tipo_evaluacion_model.php
 */

/**
 * Description of modalidad_model
 *
 * @author CIDTAI
 */
class tipo_evaluacion_model extends CI_Model {
    
    public function consultar_tipo_evaluaciones() {
        $cmd = "SELECT * FROM tipoevaluacion WHERE estatus = 1 ORDER BY idevaluacion DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_tipo_evaluacion($id){
    	$cmd="SELECT * FROM tipoevaluacion WHERE idevaluacion='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    //Metodo que inserte en la tabla usuario
	public function crear_tipo_evaluacion($arr) {
		$this->db->insert('tipoevaluacion', $arr);
		return TRUE;
	}
    
    public function  editar_tipo_evaluacion($id,$nom){
        $cmd = "UPDATE tipoevaluacion SET nombre='$nom' WHERE idevaluacion='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar_tipo_evaluacion($id){
    	$cmd = "UPDATE tipoevaluacion SET estatus=0 WHERE idevaluacion='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($nombre){

        $cmd="SELECT * FROM tipoevaluacion WHERE nombre LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE tipoevaluacion SET estatus=1 WHERE idevaluacion='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
}
