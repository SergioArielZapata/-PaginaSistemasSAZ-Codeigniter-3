<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {
		
	//Alta
    public function guardar_productos($data){
		$this->db->insert('productos', $data);
		
	}
	public function ver_consultas(){
        $this->db->select('*');
        $this->db->from('consultas');
		//$this->db->from('categorias');
        $this->db->join('perfil', 'perfil.id = consultas.perfil_id');      
        $this->db->where('estado','1');
        $query = $this->db->get();
        return $query->result();               
    }
    public function ver_consultas2(){
        $this->db->select('*');
        $this->db->from('consultas');
		//$this->db->from('categorias');
        $this->db->join('perfil', 'perfil.id = consultas.perfil_id');      
        $this->db->where('estado','0');
        $query = $this->db->get();
        return $query->result();               
    }
}