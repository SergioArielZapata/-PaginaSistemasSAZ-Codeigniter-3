<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class UsuarioRegistrado extends CI_Controller {
    function __construct(){
        parent:: __construct();
		$this->load->model('productos_model');
		$this->load->model('usuarios_model');
		$this->load->model('carrito_model');
		$this->load->model('consulta_model');
		$this->load->model('Administrador_model');
		$this->load->library('cart');
    }	
	public function comoComprarU()
	{
		$titulo = array('titulo' => 'Como Comprar');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/comoComprarU');
		$this->load->view('partes/footer_view');
	}
	public function envios()
	{
		$titulo = array('titulo' => 'Envios');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/envios');
		$this->load->view('partes/footer_view');
	}
	public function formaPago()
	{
		$titulo = array('titulo' => 'Comercialización - Forma de pago');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/formaPago');
		$this->load->view('partes/footer_view');
	}
	public function indexU()
	{
		$titulo = array('titulo' => 'Sistemas SAZ');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/index');	
		$this->load->view('partes/footer_view');
	}
	public function comercializacion()
	{
		$titulo = array('titulo' => 'Comercialización');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/comercializacion');
		$this->load->view('partes/footer_view');
	}
	public function qSomos()
	{
		$titulo = array('titulo' => 'Quienes Somos');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/quienesSomos');
		$this->load->view('partes/footer_view');
	}
	public function terminos()
	{
		$titulo = array('titulo' => 'Terminos y Uso');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/terminos');
		$this->load->view('partes/footer_view');
	}
	public function contacto()
	{
		$titulo = array('titulo' => 'Contacto');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/contactoU');
		$this->load->view('partes/footer_view');
	}
	public function consulta()
	{
		$titulo = array('titulo' => 'Consulta');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/consultaU',);
		$this->load->view('partes/footer_view');
	}
	public function catalogoRegi()
	{
		$titulo = array('titulo' => 'Productos');
		$data = array('productos' => $this->productos_model->ver_productos());
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/catalogoRegi',$data);
		$this->load->view('partes/footer_view');
	}
	public function misCompras()
	{
		$titulo = array('titulo' => 'Mis Compras');
		$usuario = $this->session->userdata('usuario');
		$compra['compra'] = $this->carrito_model->ver_compraUsuario($usuario['id_usuario']);
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/comprasRealizadas',$compra);
		$this->load->view('partes/footer_view');
	}
	public function miCuenta()
	{
		$usuario = $this->session->userdata('usuario');
		$adicional['adicional'] = $this->usuarios_model->buscar_usuarioId($usuario['id_usuario']);
		$titulo = array('titulo' => 'Modificación');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/cuenta',$adicional);
		$this->load->view('partes/footer_view');
	}
		public function factura($id_venta)
	{
		$compra['compra']=$this->carrito_model->ver_detalle($id_venta);
		$titulo = array('titulo' => 'Factura');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/factura',$compra);
		$this->load->view('partes/footer_view');
	}
		public function factu($id_venta)
	{
		$compra['compra']=$this->carrito_model->ver_detalle($id_venta);
		$this->load->view('UsuarioRegistrado/factura2',$compra);
	}
	public function carrito()
	{
		$titulo = array('titulo' => 'Carrito');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuUser_view');
		$this->load->view('UsuarioRegistrado/carrito');
		$this->load->view('partes/footer_view');
	}
/*Fin de Funciones de Página*/
/*Funciones Varias*/
	public function actualizarUsuario(){
		$this->form_validation->set_rules('direccion', 'Ingrese su direccion', 'required');
		$this->form_validation->set_rules('telefono', 'Ingrese su telefono', 'required|numeric');
		$this->form_validation->set_rules('codPostal', 'Ingrese su codigo postal', 'required|numeric');
		$this->form_validation->set_rules('ciudad', 'Ingrese su ciudad', 'required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('numeric', 'El campo %s debe ser un valor númerico');
		if ($this->form_validation->run() == FALSE){
			redirect('miCuenta');
		}else{
			$usuario_id = $this->input->post('id');
			$data = array(
				'direccion' => $this->input->post('direccion'),
				'telefono' => $this->input->post('telefono'),
				'codigo_postal' => $this->input->post('codPostal'),
				'ciudad' => $this->input->post('ciudad'),
			);
			$this->usuarios_model->actualizarDatos($usuario_id,$data);
			$data2 = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'correo' => $this->input->post('correo'),
				'usuario' => $this->input->post('usuario'),
				'pass' => base64_encode($this->input->post('pass')),
			);
			$this->usuarios_model->actualizar_usuarios2($usuario_id,$data2);
			echo  "<script>alert('Usuario actualizado exitosamente.')</script>";
			$this->miCuenta();
			return true;
		}	
	}
	/*Actualiza usuario propio*/
    public function insertar_consulta(){
    $this->form_validation->set_rules('nombre', 'Debe ingresar un Mensaje', 'required');
	$this->form_validation->set_rules('correo', 'Debe ingresar un Mensaje', 'required');
    $this->form_validation->set_rules('mensaje', 'Debe ingresar un Mensaje', 'required');
	$this->form_validation->set_rules('fecha', 'Debe ingresar un Mensaje', 'required');
	$this->form_validation->set_message('required', ' %s *campo obligatorio');
    if($this->form_validation->run() == FALSE){
	  echo  "<script>alert('Falta el mensaje.')</script>";
      $this->consulta();
    }else{
		$consulta = array(
			'usuario'=> $this->input->post('nombre'),
			'correo'=> $this->input->post('correo'),
			'perfil_id'=>$this->input->post('perfil_id'),
			'mensaje'=> $this->input->post('mensaje'),
			'fecha' => $this->input->post('fecha'),
			'estado' => 1
		);
			$this->usuarios_model->guardar_consulta($consulta);
			echo  "<script>alert('Consulta enviada exitosamente, le contestaremos a la brevedad.')</script>";			
			$this->consulta();
			return true;
    }
  }
/*Fin de Funciones Varias*/
}