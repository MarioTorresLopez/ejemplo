<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of roles_model
 *
 * @author CIDTAI-UTEQ
 */
class roles_model extends CI_Model {
    
     public function crear_rol ($arr){
        
        $this->db->insert('rolusuario', $arr);
        return TRUE;
        
    }
      
    public function consultar_roles(){
         $cmd = "SELECT * FROM rol  where estatus=1 ORDER BY idrol DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
     public function consultar_usuario_rol() {
        $cmd = "SELECT * FROM usuario WHERE estatus = 1 ORDER BY idusuario DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
     public function consultar_usuario_roles($id){
    	//$cmd="SELECT * FROM usuario WHERE idusuario='$id'";
    	$cmd="SELECT usuario.*,rolusuario.idrol,rol.nomrol FROM usuario,rolusuario,rol WHERE usuario.idusuario='$id' and usuario.idusuario=rolusuario.idusuario and rolusuario.idrol=rol.idrol";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    public function  editar_usuario_rol($id,$nom,$correo){
        $cmd = "UPDATE usuario SET nomusuario='$nom', correousu='$correo' WHERE idusuario='$id'";
      // UPDATE usuario SET nomusuario='maria', correousu='mich@jh.com',passwordusu='12345678' WHERE idusuario='477'
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
    public function editar_rol_usuario($idrol,$idusuario){
        $cmd="update rolusuario set idrol='$idrol' where idusuario='$idusuario'";
        $query=$this->db->query($cmd);
        return true;
    }

    public function eliminar_usuario_rol($id){
    	$cmd = "UPDATE usuario SET estatus=0 WHERE idusuario='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function existente_usuario_rol($correo,$id){

        $cmd="SELECT * FROM usuario WHERE correousu LIKE '$correo' and idusuario != '$id'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }
     public function activar_usuario_rol($id){
        $cmd = "UPDATE usuario SET estatus=1 WHERE idusuario='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
     public function consultar_usuario_existente ($nom)
    {
        $cmd="SELECT * FROM usuario WHERE nomusuario LIKE '$nom'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    public function crear_idUsuario_aRol ($data){
        
        $cmd = "INSERT INTO rolusuario (idusuario,idrol,fecinivigencia,fecfinalvigencia,estatus) VALUES((SELECT (MAX(idusuario)) idmax FROM usuario), "
                . "'".$data['idrol']."','".$data['fecinivigencia']."','".$data['fecfinalvigencia']."',1)";
        
       $this->db->query($cmd);
        return TRUE;
        
    }
    
    public function crear_rol_usuario($data){
        
        $cmd = "INSERT INTO rolusuario (idusuario, idrol, fecinivigencia, fecfinalvigencia, estatus) values ((SELECT (MAX(idusuario)) idmax FROM usuario), "
                ."'".$data['idrol']."','".$data['fecinivigencia']."','".$data['fecfinalvigencia']."','".$data['estatus']."')";
        $this->db->query($cmd);
        return TRUE;
        
    }
    //put your code here
}
