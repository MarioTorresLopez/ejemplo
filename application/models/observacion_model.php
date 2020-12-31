<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of observacion_model
 *
 * @author CIDTAI
 */
class observacion_model extends CI_Model {

    //Función para enviar observaciones de los documentos que no han 
    // sido entregados o si no cumplen los las caracteristicas especificadas
    public function crear_observacion($array) {

        /*
          $cmd = "INSERT INTO observaciondocumento VALUES('$array[idfolio]','$array[iddocsol]','$array[observacion]','$array[idusuarioenv]','$array[idusuariorec]','$array[estatus]')";
          $this->db->query($cmd);
          return TRUE;
         * 
         */
        $this->db->insert('observaciondocumento', $array);
        return TRUE;
    }
    
    public function consultar_comentarios($id, $iddocsol){
        	$cmd="select idobservacion,idfolio,iddocsol,observacion,idusuarioenv,idusuariorec, estatus,fechareg from "
                        . "observaciondocumento "
                        . "where idusuariorec='$id' AND iddocsol='$iddocsol' OrDER BY fechareg DESC LIMIT 1";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }

}
