<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documentoxnivel_model
 *
 * @author UTEQ
 */
class documentoxnivel_model extends CI_Model {

    //Función que regresa los datos del documento solicitado
    public function consultar_documentos($tipoPersona, $idnivel, $idtipoproceso) {
        $persona = 1;
        if ($tipoPersona == 0) {
            $persona = 9;
        }
        $cmd = "select iddocumento from documentoxnivel where idnivel = 10 or idnivel ='$idnivel' or idnivel='$persona' and idtipoproceso ='$idtipoproceso'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    //Función que regresa si ya se aceptaron todos los documentos
    public function aceptar_documentos($folio, $tipoProceso) {
        $cmd = "select * from checklist where estatus = 0 and folio like '$folio'";
        $query = $this->db->query($cmd);
        return $query->num_rows();
    }

}
