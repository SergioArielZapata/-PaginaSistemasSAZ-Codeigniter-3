<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class carrito_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
    }
	public function insert_venta($data)
	{
		$this->db->insert('ventas_cabecera', $data);
		$id = $this->db->insert_id();
	//isset — Determina si una variable está definida y no es NULL
		return (isset($id)) ? $id : FALSE;
	}
	public function insert_venta_detalle($data)
	{
		$this->db->insert('ventas_detalle', $data);
	}
	 /* Retorna el stock del producto a comprar */
    function get_stock_producto($id){      
    	$this->db->select('stock');
    	$this->db->from('productos');
        $this->db->where('id_producto', $id);
    	$consulta = $this->db->get();
    	$resultado = $consulta->row();
        $query = $this->db->get_where('productos', array('id_producto' => $id));
        if($query->num_rows()>0) {
            return $resultado;
        } else {
            return FALSE;
        }        
    }
	public function ver_detalle($id){
        $this->db->select('*');
        $this->db->from('ventas_detalle');
		$this->db->where('venta_id', $id);
		$this->db->join('productos', 'ventas_detalle.producto_id = productos.id_producto');
		$this->db->join('ventas_cabecera', 'ventas_cabecera.id_ventas = ventas_detalle.venta_id');		
		$this->db->join('usuarios', 'ventas_cabecera.usuario_id = usuarios.id_usuario');
		$this->db->join('clientes', 'ventas_cabecera.usuario_id = clientes.usuario_id');
		$query = $this->db->get();
        return $query->result();               
    }
	public function ver_compraId($id){
		$this->db->join('productos', 'ventas_detalle.producto_id = productos.id_producto');
		$this->db->join('ventas_cabecera', 'ventas_cabecera.id_ventas = ventas_detalle.venta_id'); 
		$query = $this->db->get('ventas_detalle',$id);
        return $query->result();
	}
	public function ver_compra(){
		$this->db->select('*');
        $this->db->from('ventas_cabecera');
		$this->db->join('usuarios'      , 'ventas_cabecera.usuario_id = usuarios.id_usuario'); $query = $this->db->get();
		//$this->db->join('ventas_detalle', 'ventas_cabecera.id_ventas  = ventas_detalle.venta_id');
		//$this->db->join('productos', 'ventas_detalle.producto_id = productos.id_producto'); $query = $this->db->get();
		return $query->result();
	}
	public function ver_compraUsuario($id){
        $this->db->select('*');
        $this->db->from('ventas_cabecera');
		$this->db->where('usuario_id', $id);
		$this->db->join('usuarios', 'ventas_cabecera.usuario_id = usuarios.id_usuario');		
        $query = $this->db->get();
        return $query->result();               
    }
	public function cantidad_compra($id){
		$this->db->where('venta_id',$id);
		$query = $this->db->count_all('ventas_detalle');
        return intval($query);
	}
	public function cantidad_compra2($id){
		$this->db->where('venta_id',$id);
		$query = $this->db->count_all('ventas_cabecera');
        return intval($query);
	}
}