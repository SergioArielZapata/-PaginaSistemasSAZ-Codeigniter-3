<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class consulta_model extends CI_Model {	
    //Modificacion al estado de la consulta
    public function actualizar_consulta($data,$id_consulta){
        $this->db->where('id_consulta',$id_consulta);
        $query = $this->db->update('consultas',$data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}