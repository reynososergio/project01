<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase Outer_heaven. Representa al sitio en general.
 * @author Reynoso Sergio Ariel
 **/
 
class Outer_heaven extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function login_user($username,$password){
		$this->db->where('nombreDeUsuario',$username);
        $this->db->where('clave',$password);
        $query = $this->db->get('usuario');
        if($query->num_rows() == 1){
            return $query->row();
        }
        else{
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'index','refresh');
        }
    }
	
	public function addUser($dat){
		$datos = array(
				'dni' => $dat['reg_dni'],
				'nombre' => $dat['reg_nombre'],
				'apellido' => $dat['reg_apellido'],
				'correo_electronico' => $dat['reg_email'],
				'clave' => $dat['reg_clave'],
				'telefono' => $dat['reg_telefono'],
				'id_ciudad' => $dat['reg_ciudad'],
				'calle' => $dat['reg_calle'],
				'numero' => $dat['reg_numero'],
				'piso' => $dat['reg_piso'],
				'departamento' => $dat['reg_depto'],
				'nombreDeUsuario' => $dat['reg_usuario'],
				'tipo' => 'User',
				'estado' => 'activo'
		);
		$this->db->insert('usuario', $datos);
	}
	
	/**
	 * @param String $email
	 * @return Usuario si existe. Si no FALSE.
	**/
	public function getUsuario($email){
		$email = (String) $email;
		$consulta = $this->db->get_where('usuario', array('correo_electronico' => $email));
		return ($consulta->num_rows() == 1) ? $consulta->row() : false;
	}
	
	/**
	 * Valida que el dni no exista en la base de datos
	 * @return boolean
	**/
	public function dni_unico($dni){
		$dni = (Integer) $dni;
		$consulta = $this->db->get_where('usuario',array('dni' => $dni));
		return ($consulta->num_rows() == 0);
	}
	
	/**
	 * Valida que el email no exista en la base de datos
	 * @return boolean
	**/
	public function email_unico($email){
		$email = (String) $email;
		$consulta = $this->db->get_where('usuario',array('correo_electronico' => $email));
		return ($consulta->num_rows() == 0);
	}
	
	/**
	 * Valida que el usuario no exista en la base de datos
	 * @return boolean
	**/
	public function usuario_unico($usuario){
		$usuario = (String) $usuario;
		$consulta = $this->db->get_where('usuario',array('nombreDeUsuario' => $usuario));
		return ($consulta->num_rows() == 0);
	}
	
	/**
	 * @return Provincias
	**/
	public function getProvincias(){
		$consulta =$this->db->get('provincia');
		return $consulta->result();
	}
	
	public function getProvinciaUsuario($id){
		$query='select ciudad.id_provincia as idp
				from usuario inner join ciudad on (usuario.id_ciudad=ciudad.id)
				where usuario.id_usuario=$id';
		$this->db->where('id',$query);
        $consulta=$this->db->get('provincia');
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }
	
	public function getCiudades($idp){
		$this->db->order_by("nombre", "asc");
		$consulta =$this->db->get_where('ciudad',array('id_provincia' => $idp));
		return $consulta->result();
	}
	
	

}
