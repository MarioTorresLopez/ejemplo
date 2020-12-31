<?php

/**
 * Description of usuario_model
 *
 * @author CIDTAI
 */
class usuario_model extends CI_Model {

    //Función para insertar un nuevo usuario, una vez aceptada la solicitud del aspirante
    public function registrar_usuario($data) {

        $cmd = "INSERT INTO usuario (idusuario, nomusuario, correousu, passwordusu, estatus, fechamodificacion, usuariomodificacion, idsolicitud) "
                . " VALUES ((SELECT (MAX(idusuario)+1) idmax FROM usuario), '" . $data['nomusuario'] . "', '" . $data['correousu'] . "', "
                . "'" . $data['passwordusu'] . "', '" . $data['estatus'] . "', '" . $data['fechamod'] . "', '" . $data['usuariomod'] . "', '" . $data['idsolicitud'] . "')";
        $this->db->query($cmd);
        return TRUE;
        
    }

    public function crear_rolUsuario($data) {

        $cmd = "INSERT INTO usuario (idusuario, nomusuario, correousu, passwordusu,usuariomodificacion,fechamodificacion,estatus) VALUES((SELECT (MAX(idusuario)+1) idmax FROM usuario), "
                . "'" . $data['nomusuario'] . "','" . $data['correousu'] . "','" . $data['passwordusu'] . "','" . $data['usuariomodificacion'] . "', '" . $data['fechamod'] . "',1)";
        $this->db->query($cmd);
        return TRUE;
    }
    
    public function consultar_usuario(){
        
        $cmd = "SELECT * FROM usuario u  
                INNER JOIN solicitud s ON(u.idsolicitud=s.idsolicitud) 
                WHERE s.estatus=1 ORDER BY s.idsolicitud DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function cuenta($idusuario) {
        $cmd="select * from usuario where idusuario='$idusuario'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function editar_usuario($idusuario,$data) {
        $this->db->where('idusuario', $idusuario);
        $this->db->update('usuario', $data);
        return TRUE;
    }
    
    //

}
