<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asignarol_model
 *
 * @author CIDTAI-UTEQ
 */
class asignarol_model extends CI_Model {
    //put your code here
    
     public function asignar_rol_modulo ($arr){
         $this->db->insert('permisosmodulo', $arr);
        return TRUE;
    }
    
       public function asignar_activar_rol($id){
        $cmd = "UPDATE permisosmodulo SET estatus=1 WHERE idmodulo='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function consultar_modulo() {
        $cmd = "SELECT * FROM modulo WHERE estatus = 1 ORDER BY idmodulo DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
public function consultar_rol() {
        $cmd = "SELECT * FROM rol WHERE estatus = 1 ORDER BY idrol DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
       public function consultar_permisosmodulo(){
         $cmd = "
SELECT rol.idrol,rol.nomrol,modulo.idmodulo,modulo.nommodulo, permiso.idpermiso as permisos
FROM permiso INNER JOIN
  permisosmodulo ON permiso.idpermiso = permisosmodulo.idpermiso INNER JOIN
  rol ON permisosmodulo.idrol = rol.idrol INNER JOIN modulo ON 
  permisosmodulo.idmodulo = modulo.idmodulo order by nomrol desc";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;    
    }
       public function consultar_permisosmodulo1(){
         $cmd = "select nomrol, nommodulo,  Concat (a.idpermiso, ',',a.idpermiso, 
                ',',a.idpermiso, ',',a.idpermiso) as permisos from permisosmodulo a join
                rol b on (a.idrol = b.idrol) join modulo c on (a.idmodulo = c.idmodulo) join
                permiso d on (a.idpermiso = d.idpermiso) where a.idpermiso = d.idpermiso
                group by a.idpermiso, nomrol, nommodulo;";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;    
    }
    
    public function prueba(){
        $cmd="select nomrol, nommodulo,b.idrol,c.idmodulo from permisosmodulo a join
                rol b on (a.idrol = b.idrol) join modulo c on (a.idmodulo = c.idmodulo) join
                permiso d on (a.idpermiso = d.idpermiso) where a.idpermiso = d.idpermiso
                group by b.idrol,c.idmodulo,nomrol, nommodulo";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;  
    }
    public function prueba2($idrol,$idmodulo){
        $cmd="SELECT modulo.nommodulo,rol.nomrol,rol.idrol,modulo.idmodulo,permiso.idpermiso as permisos
FROM permiso INNER JOIN
  permisosmodulo ON permiso.idpermiso = permisosmodulo.idpermiso INNER JOIN
  rol ON permisosmodulo.idrol = rol.idrol INNER JOIN modulo ON 
  permisosmodulo.idmodulo = modulo.idmodulo where rol.idrol='$idrol' and permisosmodulo.idmodulo='$idmodulo' order by permisos";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL; 
    }

//       public function consultar_permisosmodulo1(){
//         $cmd = "select(select nomrol from rol where rol.idrol=permisosmodulo.idrol) nomrol,
//(select nommodulo from modulo where modulo.idmodulo=permisosmodulo.idmodulo) nommodulo,
//(select idpermiso from permiso where permiso.idpermiso=permisosmodulo.idpermiso) idpermiso
//from permisosmodulo inner join rol on permisosmodulo.idrol=rol.idrol inner join modulo on
//permisosmodulo.idmodulo=modulo.idmodulo inner join permiso on 
//permisosmodulo.idpermiso=permiso.idpermiso where permisosmodulo.idpermiso = permiso.idpermiso order by nommodulo desc";
//        $query = $this->db->query($cmd);
//        return ($query->num_rows() > 0) ? $query->result() : NULL;    
//    }
      public function consultar_roles_modulo_permiso($id){
    	$cmd="SELECT * FROM permisosmodulo WHERE idpermiso='$id' ";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
//    public function existente_roles_modulo_permiso($idpermiso){
//
//        $cmd="SELECT * FROM permisosmodulo WHERE idpermiso = '$idpermiso' ";
//        $query=$this->db->query($cmd);
//        return ($query->num_rows() > 0) ? $query->row() : NULL;
//
//    }
    
    public function existente_roles_modulo_permiso($idmodulo,$idrol,$idpermiso){

        $cmd="select * from permisosmodulo pm where pm.idmodulo = '$idmodulo' and pm.idrol='$idrol' and pm.idpermiso='$idpermiso'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;

    }
    
     public function  editar_roles_modulo_permiso($id,$idpermiso){
        $cmd = "UPDATE permisosmodulo SET idpermiso='$idpermiso' WHERE idrol='$id'";
      // UPDATE usuario SET nomusuario='maria', correousu='mich@jh.com',passwordusu='12345678' WHERE idusuario='477'
        $query = $this->db->query($cmd);
        return TRUE;
    }
  
    public function eliminar_permisos_modulo($idrol,$idmodulo){
        $cmd="delete from permisosmodulo pm where pm.idrol='$idrol' and pm.idmodulo='$idmodulo'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
    public function eliminar_permisos_espefifico_modulo($idrol, $idmodulo,$idpermiso){
        $cmd="delete from permisosmodulo pm where pm.idrol='$idrol' and pm.idmodulo='$idmodulo' and pm.idpermiso='$idpermiso'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
//    public function eliminar_permisos_espefifico_modulo($idrol, $idmodulo,$idpermiso){
//        $cmd="delete from permisosmodulo pm where pm.idrol='$idrol' and pm.idmodulo='$idmodulo' and pm.idpermiso='$idpermiso'";
//        $query = $this->db->query($cmd);
//        return TRUE;
//    }
   
    }

