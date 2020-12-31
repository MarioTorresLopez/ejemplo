<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estado_model
 *
 * @author UTEQ
 */
class estado_model  extends CI_Model {
    //put your code here
    public function consultar_estados(){
         $cmd = "SELECT * FROM estado ORDER BY idestado asc";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
  
    public function consultar_estado($id){
         $cmd = "SELECT * FROM estado  where idestado='$id'";
        $query = $this->db->query($cmd);

        return ($query->num_rows() == 1) ? $query->result() : NULL;  
    }
    
public function consultar_estado_queretaro (){
         $cmd = "select * from estado where idestado=22";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    
}
