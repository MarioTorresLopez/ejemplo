<?php

/*
 * Modelo del login_controller
 *
 * Modelo que contenga una consulta para validar datos recibidos desde el controlador
 * 
 * @since       1.0
 * @version     1.0
 * @link        NA ??
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/models/login_model.php
 */

class login_model extends CI_Model {

    public function consultar_usuario($username, $password) {

        /*$this->db->select('idusu');
        $this->db->where('correousu', $username);
        $this->db->where("passwordusu LIKE BINARY '".$password."'");*/
        $cmd = "SELECT idusuario, nomusuario, correousu, idsolicitud FROM usuario WHERE correousu LIKE '$username' AND passwordusu LIKE '$password' AND estatus = 1";
        $query = $this->db->query($cmd);

        return ($query->num_rows() === 1) ? $query->row() : NULL;
    }

    public function cargar_modulos($id) {
        
        /*
          $this->db->select('u.nomusu usua, r.nomrol, p.nomper, m.nommod');
          $this->db->from('usuario u');
          $this->db->join('rolusuario rxu', 'u.idusu=rxu.idusu');
          $this->db->join('roles r', 'rxu.idrol=r.idrol');
          $this->db->join('permisosmodulo pxm', 'pxm.idrol=r.idrol');
          $this->db->join('permiso p', 'pxm.idper=p.idper');
          $this->db->join('modulo m', 'm.idmod=pxm.idmod');
          $this->db->where('u.idusu', 1);

          $query = $this->db->get();
          if($query->num_rows() > 0 )
          {
          return $query->result();
          }
         */

        //INNER JOIN usuario u ON(rxu.idusu=u.idusu)

        /* $this->db->select('idusu');
          $this->db->where('correousu',$username);
          $query=$this->db->get('usuario',1)->row();
          return $query->value; */

        $sql = "SELECT  m.nommodulo modulo FROM usuario u
		INNER JOIN rolusuario rxu ON (u.idusu=rxu.idusuario)
		INNER JOIN rol r ON (rxu.idrol=r.idrol)
		INNER JOIN permisosmodulo pxm ON (pxm.idrol=r.idrol)
		INNER JOIN modulo m ON (m.idmodulo=pxm.idmodulo)
		WHERE u.idusu=$id
                GROUP BY m.nommodulo";

        $query = $this->db->query($sql);

        return $query->result();
    }
    //que pex
    public function cargar_rol($id){

      $sql = "SELECT r.idrol rol FROM usuario u
INNER JOIN rolusuario rxu ON (u.idusuario=rxu.idusuario)
INNER JOIN rol r ON (rxu.idrol=r.idrol)
WHERE u.idusuario=$id
GROUP BY r.idrol";

      $query = $this->db->query($sql);

      return $query->row();

    }
    
    public function cargar_modulos2($idrol){
        $cmd="select idmodulo from permisosmodulo where idrol = '$idrol' GROUP BY idmodulo";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
