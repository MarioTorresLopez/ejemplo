<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notificacion_model
 *
 * @author marioeduardo
 */
class notificacion_model extends CI_Model {
    
    public function crear_notificacion($arr) {
        $this->db->insert('notificacion', $arr);
        return TRUE;
    }
    
    public function ultimousuario() {
        $cmd="select max(idusuario) id from usuario";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function institucion_analista($idinstitucion) {
        $cmd="select idanalista from institucion where idinstitucion='$idinstitucion'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function consultar_usuario_asignacion($idinstitucion) {
        $cmd="select idusuario from institucion where idinstitucion='$idinstitucion'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function consultar_usuario($folio) {
        $cmd="select institucion.idusuario from usuario,institucion where institucion.idinstitucion='$folio' group by institucion.idusuario";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function get_notificaciones($idrol,$idusuario = NULL){
        $cmd="SELECT * FROM notificacion WHERE idrol='$idrol' order by fecha desc limit 10";
        if (!is_null($idusuario)) {
           $cmd = "SELECT * FROM notificacion WHERE idrol='$idrol' and idusuariodestino ='$idusuario' order by fecha desc limit 10";
        }
    	$query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function get_notificaciones_all($idrol,$idusuario = NULL){
        $cmd="SELECT * FROM notificacion WHERE idrol='$idrol' order by fecha desc";
        if (!is_null($idusuario)) {
           $cmd = "SELECT * FROM notificacion WHERE idrol='$idrol' and idusuariodestino ='$idusuario' order by fecha desc";
        }
    	$query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function leer_notificacion($idnotificacion) {
        $cmd="UPDATE notificacion SET leido=1 WHERE idnotificacion='$idnotificacion'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
    public function nombre_analista($idanalista) {
        $cmd="select nomusuario from usuario where idusuario='$idanalista'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
}
