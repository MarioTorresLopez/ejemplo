<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bitacora_model
 *
 * @author CIDTAI-UTEQ
 */
class bitacora_model extends CI_Model {

    public function crear_observacion_bitacora($array) {

        $this->db->insert('bitacora', $array);
        return TRUE;
    }

    public function consultar_bitacoras($id) {
//        $cmd = "select idanalista,idinstitucion,nomusuario, comentario, consecutivo, fecha_hora from usuario inner join bitacora on usuario.idusuario=bitacora.idanalista";
        $cmd = "select institucion.idinstitucion as idinstitucion,bitacora.idanalista as idanalista,consecutivo, nomusuario as nomusuario, nombredocsol as documento,comentario, fecha_hora from institucion inner join bitacora using(idinstitucion) inner join usuario on (bitacora.idanalista=usuario.idusuario) inner join documentoxsolicitud on (bitacora.referencia_doc = documentoxsolicitud.iddocsol) where institucion.idinstitucion='$id' and idtipobitacora=1 order by fecha_hora desc";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_bitacoras_plantel($id) {
        $cmd = "select plantel.idplantel as idpla,
                bitacora.idanalista as idanalista,
                consecutivo, 
                 nomusuario as nomusuario, 
                nombredocsol as documento,
                comentario, fecha_hora 
                from plantel inner join bitacora on(plantel.idplantel=bitacora.idinstitucion) inner join usuario on (bitacora.idanalista=usuario.idusuario) 
                inner join documentoxsolicitud on (bitacora.referencia_doc = documentoxsolicitud.iddocsol) where plantel.idplantel='$id' and idtipobitacora=1;";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_bitacoras_all() {
        $cmd = "select idinstitucion as institucion, nomusuario as usuario, nombredocsol as documento,comentario, fecha_hora from institucion inner join bitacora using(idinstitucion) inner join usuario on (bitacora.idanalista=usuario.idusuario) inner join documentoxsolicitud on (bitacora.referencia_doc = documentoxsolicitud.iddocsol);";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_bitacora($id, $consecutivo) {
        $cmd = "SELECT idinstitucion,comentario,consecutivo,idtipobitacora FROM bitacora WHERE idinstitucion = '$id' AND consecutivo = '$consecutivo'";
//        $cmd = "SELECT idinstitucion,comentario,consecutivo,idtipobitacora FROM bitacora WHERE idinstitucion = 73 AND consecutivo = 4";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function editar_bitacora($id, $consecutivo, $comentario) {
        $cmd = "UPDATE bitacora SET comentario='$comentario' WHERE idinstitucion='$id' AND consecutivo = '$consecutivo'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function getConsecutivo($idinstitucion) {
        $cmd = "SELECT COUNT(*)+1 as consecutivo FROM bitacora WHERE idinstitucion = '$idinstitucion'";

        $query = $this->db->query($cmd);


        return $query->row()->consecutivo;
    }
    
    public function bitacora_doc($inst,$ref) {
        $cmd="select institucion.idinstitucion as idinstitucion,bitacora.idanalista as idanalista,consecutivo, nomusuario as nomusuario, nombredocsol as documento,comentario, fecha_hora from institucion inner join bitacora using(idinstitucion) inner join usuario on (bitacora.idanalista=usuario.idusuario) inner join documentoxsolicitud on (bitacora.referencia_doc = documentoxsolicitud.iddocsol) where institucion.idinstitucion='$inst' and idtipobitacora=0 and bitacora.referencia_doc='$ref' order by fecha_hora desc";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

}
