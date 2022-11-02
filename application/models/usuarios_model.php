<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {
		
	public function guardar_usuario($data){
		$this->db->insert('usuarios', $data);
	}
	public function guardar_cliente($data){
		$this->db->insert('clientes', $data);
	}
	public function buscar_usuario($usuario, $pass){
		/*$this->db->select('*');
		$this->db->from('usuarios');*/
		$this->db->where('correo', $usuario);
		$this->db->where('pass', $pass);
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}		
	}
	public function buscar_usuarioId($id_usuario){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id_usuario', $id_usuario);
		$this->db->join('clientes', 'clientes.usuario_id = usuarios.id_usuario');
		$query = $this->db->get();
		return $query->result();	
	}
	function buscar_usuarios($correo, $pass){
        $query = $this->db->get_where('usuarios', array('correo'=>$correo,'pass'=>$pass), 1);
        if($query->num_rows() == 1){
            return $query->result();
        }else{
            return false;}
    }
	public function guardar_consulta($data){
		$this->db->insert('consultas', $data);
		
	}
	public function actualizarDatos($usuario_id,$data){
		$this->db->where('usuario_id', $usuario_id);
		$query = $this->db->update('clientes',$data);
		if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	public function ver_usuarios(){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idPerfil','2');
		$this->db->where('estado','1');
		$this->db->join('perfil', 'perfil.id = usuarios.idPerfil');
		$this->db->join('clientes', 'clientes.usuario_id = usuarios.id_usuario');
		$query = $this->db->get();
		return $query->result();
	}
	public function ver_usuarios2(){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idPerfil','2');
		$this->db->where('estado','0');
		$this->db->join('perfil', 'perfil.id = usuarios.idPerfil');
		$this->db->join('clientes', 'clientes.usuario_id = usuarios.id_usuario');
		$query = $this->db->get();
		return $query->result();
	}
	//Modificacion por usuario
    public function actualizar_usuarios($data,$id_usuario){
        $this->db->where('id_usuario',$id_usuario);
        $query = $this->db->update('usuarios',$data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	//Modificacion por administrador
    public function actualizar_usuarios2($id_usuario,$data2){
        $this->db->where('id_usuario',$id_usuario);
        $query = $this->db->update('usuarios',$data2);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}