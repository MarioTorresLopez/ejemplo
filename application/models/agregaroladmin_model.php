<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of agregarRolAdmin
 *
 * @author CIDTAI-UTEQ
 */
class agregaroladmin_model extends CI_Model{
    //put your code here
      
       
    public function consultar_usuario_rol() {
        $cmd = "SELECT * FROM rol WHERE estatus = 1 ORDER BY idrol ASC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
//    //Metodo que inserte en la tabla usuario
//	public function crear_rol($arr) {
//		$this->db->insert('rol', $arr);
//		return TRUE;
//	}
       
     public function activar_rol($id){
        $cmd = "UPDATE rol SET estatus=1 WHERE idrol='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
  
    public function crear_admin ($data){
        
        $cmd = "INSERT INTO rol (idrol,nomrol,usuariomodificacion,fecmodificacion,estatus) VALUES((SELECT (MAX(idrol)+1) idmax FROM rol), "
                . "'".$data['nomrol']."','".$data['usuariomodificacion']."','".$data['fechamod']."',1)";
  
       $this->db->query($cmd);
        return TRUE;
        
    }
    
    
      public function consultar_usuario_roles($id){
    	$cmd="SELECT * FROM rol WHERE idrol='$id' ";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    //$cmd="SELECT * FROM rol WHERE estatus=1 ORDER BY idrol='$id' DESC";
    	
     public function existente_usuario_rol($nombre){

        $cmd="SELECT * FROM rol WHERE nomrol LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }
    
     public function  editar_usuario_rol($id,$nom){
        $cmd = "UPDATE rol SET nomrol='$nom'WHERE idrol='$id'";
      // UPDATE usuario SET nomusuario='maria', correousu='mich@jh.com',passwordusu='12345678' WHERE idusuario='477'
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
     public function eliminar_usuario_rol($id){
    	$cmd = "UPDATE rol SET estatus=0 WHERE idrol='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
    
    
    
    
}
