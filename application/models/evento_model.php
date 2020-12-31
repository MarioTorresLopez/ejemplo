<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model {

    /**
     * [__construct description]
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * [create_evento description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function crear_cita($data) {

//        $cmd = "INSERT INTO cita (idcita,idtipotramite,idusuario,idanalista,idestatuscita,observaciones,idsolicitud,fechaini,fechafin,horaini,horafin,fechacreacion) VALUES((SELECT (MAX(idcita)+1) idmax FROM cita), "
//                .  $data['idtipotramite'] . "," . $data['idusuario'] . ",".$data['idanalista']."," . $data['idestatuscita'] . ",'" . $data['observaciones'] . "','" . $data['idsolicitud'] . "','" . $data['fechaini'] . "','" . $data['fechafin'] . "','" . $data['horaini'] . "','" . $data['horafin'] . "','" . $data['fechacreacion'] . "')";
        
//        $cmd = "INSERT INTO cita (idtipotramite,idusuario,idanalista,idestatuscita,observaciones,idsolicitud,fechaini,fechafin,horaini,horafin,fechacreacion) VALUES("
//                .  $data['idtipotramite'] . "," . $data['idusuario'] . ",".$data['idanalista']."," . $data['idestatuscita'] . ",'" . $data['observaciones'] . "','" . $data['idsolicitud'] . "','" . $data['fechaini'] . "','" . $data['fechafin'] . "','" . $data['horaini'] . "','" . $data['horafin'] . "','" . $data['fechacreacion'] . "')";
//                .  $data['idtipotramite'] . "," . $data['idusuario'] . ",". $data["idanalista"].",'" . $data['idestatuscita'] . "','" . $data['observaciones'] . "','" . $data['idsolicitud'] . "','" . $data['fechaini'] . "','" . $data['fechafin'] . "','" . $data['horaini'] . "','" . $data['horafin'] . "','" . $data['fechacreacion'] . "')";
//        $this->db->query($cmd);
        $this->db->insert('cita', $data);
        return $this->db->insert_id();
//        return true;
    }

    public function get_id() {
        $cmd = "SELECT MAX(idcita) FROM cita";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function crear_cita_aspirante($data) {
        $this->db->insert('cita', $data);
        return $this->db->insert_id();
    }

    /**
     * [get_eventos description]
     * @param  [type] $usuario_id [description]
     * @return [type]             [description]
     */
    public function get_citas() {
        //$cmd="select * from cita";
        $cmd = "select cita.*, usuario.nomusuario,tipotramite.descripcion from cita,usuario,tipotramite where cita.idanalista=usuario.idusuario and tipotramite.idtipotramite = cita.idtipotramite";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function get_citas_analista($idanalista){
        $cmd = "select cita.*, usuario.nomusuario,tipotramite.descripcion from cita,usuario,tipotramite where cita.idanalista=usuario.idusuario and tipotramite.idtipotramite = cita.idtipotramite and idanalista='$idanalista'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

        public function get_citas_all() {
        //$cmd="select * from cita";
        $cmd = "select cita.*, usuario.nomusuario,tipotramite.descripcion from cita left join usuario on (cita.idanalista=usuario.idusuario) inner join tipotramite using(idtipotramite) ";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function get_analistas() {
        //$cmd="select * from cita";
        $cmd = "select rolusuario.*,usuario.correousu,usuario.nomusuario,usuario.estatus activoinactivo from rolusuario,usuario where rolusuario.idusuario=usuario.idusuario and rolusuario.idrol=2 and usuario.estatus=1";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    
    public function get_verificar($solicitud) {
        $cmd = "select * from cita where idsolicitud='$solicitud'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    /**
     * [get_evento description]
     * @param  [type] $evento_id [description]
     * @return [type]            [description]
     */
//    public function get_cita($evento_id) {
//        $this->db->where('idcita', $evento_id);
//
//        $query = $this->db->get('cita');
//
//        return ($query->num_rows() == 1) ? $query->row() : NULL;
//    }
    
    public function get_cita($evento_id){
        $cmd = "select cita.*,institucion.folio from cita,institucion where idcita='$evento_id' and cita.idsolicitud = institucion.idinstitucion";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function get_cita_editar($actual){
        $cmd = "select * from cita where cita.idsolicitud='$actual'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    /**
     * [update_evento description]
     * @param  [type] $evento_id [description]
     * @param  [type] $data      [description]
     * @return [type]            [description]
     */
    public function update_cita($evento_id, $data) {
        $this->db->where('idcita', $evento_id);
        $this->db->update('cita', $data);

        return TRUE;
    }

    /**
     * [delete_evento description]
     * @param  [type] $evento_id [description]
     * @return [type]            [description]
     */
    public function delete_evento($evento_id) {
        $this->db->where('evento_id', $evento_id);
        $this->db->delete('eventos');

        return TRUE;
    }

    /**
     * [get_event_users description]
     * @return [type] [description]
     */
    public function get_cita_aspirantes($extras = NULL, $current_usuario_id = 0) {
        $cmd = "SELECT DISTINCT usuarios.usuario_id, usuarios.email_auth, usuarios.nombre, usuarios.apellido1, usuarios.apellido2 FROM eventos JOIN usuarios USING(usuario_id) WHERE eventos.estatus_id = 3 AND usuarios.usuario_id <> '$current_usuario_id'";

        if (!is_null($extras)) {
            $cmd .= $extras;
        }

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

}

/* End of file evento_model.php */
/* Location: ./application/models/evento_model.php */
