<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class carrito_controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('carrito_model');
		$this->load->model('productos_model');
        $this->load->library('cart');
	}
    //Agrega elemento al carrito
    public function agregarCarrito(){
        //$producto = $this->productos_model->ver_productosId($id_producto);
		$data = array(
            'id' => $this->input->post('id_producto'),
            'img' => $this->input->post('imagen'),
            'qty'     => 1,
            'price'   => $this->input->post('precio'),
            'name'    => $this->input->post('nombre'),
			'options' => array('stock' => $this->input->post('stock'),)
        );
        $this->cart->insert($data);
        //print_r($data);
        redirect('catalogoRegi');
	}	
	//Elimina elemento del carrito o el carrito entero
	public function quitar_carrito($rowid){
		$this->cart->remove($rowid);
		redirect('mostrar_carrito');
	}
	public function remove($rowid){
		$this->cart->remove($rowid);
		redirect('carrito');
	}	
	//Muestra los detalles de la venta y confirma(función guarda_compra())
	public function comprarCarrito(){
		$session_data = $this->session->userdata('usuario');
		$data['id_usuario'] = $session_data['id_usuario'];
		$total = $this->cart->total();		
		$venta = array(
			'fecha' 		=> date('Y-m-d'),
			'usuario_id' 	=> $data['id_usuario'],
			'total_venta'	=> $total
		);	
		$venta_id = $this->carrito_model->insert_venta($venta); //inserta en la tabla venta_cabecera		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$venta_detalle = array(
					'venta_id' 		=> $venta_id,
					'producto_id' 	=> $item['id'],
					'cantidad' 		=> $item['qty'],
					'precio_venta'	=> $item['price'],
					'total' 		=> $item['subtotal']
					);
            	$cust_id = $this->carrito_model->insert_venta_detalle($venta_detalle); //inserta en la tabla venta_detalle
            	//Descuenta del stock y lo guarda en la base de datos
            	$producto = $this->productos_model->edit_producto($item['id']);
            	foreach ($producto->result() as $row) 
				{
					$stock = $row->stock;
				}
            	$stock_edit = $stock - 	$item['qty'];

            	$stock_nuevo = array(
            		'stock'	=> $stock_edit
            		);
            	$modifica = $this->productos_model->actualizar_productos($stock_nuevo,$item['id']);
			endforeach;
		endif;	
		$final = $this->cart->destroy();
		echo  "<script>alert('La Compra fue realizada exitosamente!!! Muchas Gracias.')</script>";
		redirect('carrito');
	} //Actualiza Carrito
    public function actualizar_carrito(){
		$data = $this->input->post();
		$this->cart->update($data); 
		redirect('carrito','refresh');
	}//Borra los datos del carrito
	public function eliminarCarrito() {
		$this->cart->destroy();
		redirect('carrito');
	}
}