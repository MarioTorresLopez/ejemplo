<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of oirnoticiacion
 *
 * @author UTEQ
 */
class oirnotificacion_model  extends CI_Model {
    //crear una notificion
  public function crear_oirnotificacion($data) {
 $cmd = "INSERT INTO oirnotificacion (calle,noint,noext,colonia,idmunicipio,idestado,estatus,cp,idinstitucion )  "
                . " VALUES( '".$data['calle']."','".$data['noint']."','".$data['noext']."','".$data['colonia']."',"
                . "'".$data['idmunicipio']."','".$data['idestado']."',1,'".$data['cp']."',(SELECT (MAX(idinstitucion)) idmax FROM institucion))";
        
       $this->db->query($cmd);
        return TRUE;
	}
        //consultar notificaciones
     public function consultar_oirnotificacion($idinsti) {
        $cmd = "select oirnotificacion.*,(select nombremunicipio  from municipio where municipio.idmunicipio=oirnotificacion.idmunicipio) munioirnotificacion,
(select nomestado from estado where estado.idestado=oirnotificacion.idestado ) estaoirnotificacion from oirnotificacion where idinstitucion='$idinsti'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
}
