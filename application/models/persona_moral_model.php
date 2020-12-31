<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona_moral_model
 *
 * @author UTEQ
 */
class persona_moral_model extends CI_Model {
    //put your code here
     public function crear_persona_moral($data) {
        $cmd = "INSERT INTO personamoral (nombre,idinstitucion,estatus)   "
                . " VALUES( '".$data['nombre']."',(SELECT (MAX(idinstitucion)) idmax FROM institucion),1)";
        
        
       $this->db->query($cmd);
        return TRUE;
    }
    public function consultar_personamoral($idinsti) {
        $cmd = "select * from personamoral where idinstitucion='$idinsti'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
}
