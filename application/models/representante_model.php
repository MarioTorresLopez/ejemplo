<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_ingreso_model
 *
 * @author UTEQ
 */
class representante_model extends CI_Model {

    //put your code here

    public function crear_representante($data) {
         $cmd = "INSERT INTO representante (apellido1,apellido2,nombre,telefono,estatus,idinstitucion)   "
                . " VALUES( '".$data['apellido1']."','".$data['apellido2']."','".$data['nombre']."','".$data['telefono']."',"
                . "1,(SELECT (MAX(idinstitucion)) idmax FROM institucion))";
        
        
       $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_representantes() {
        $cmd = "SELECT * FROM representante WHERE estatus = 1 ORDER BY idrepresentante DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_representante($id) {
        $cmd="SELECT * FROM representante WHERE idrepresentante='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function consultar_datos_representante($id) {
        $cmd="SELECT * FROM representante WHERE idinstitucion='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function  editar_representante($id,$calle,$noint,$noext,
            $colonia, $telefono, $idmunicipio,$idestado, $cp){
        $cmd = "UPDATE propietario SET calle='$calle',noint='$noint',noext='$noext',"
                . "colonia='$colonia',telefono='$telefono',idmunicipio='$idmunicipio',idestado='$idestado',"
                . "cp='$cp', WHERE idpropietario='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function eliminar($id){
    	$cmd = "UPDATE representante SET estatus=0 WHERE idrepresentante='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

   

   
}
