<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class UsuarioVisitante extends CI_Controller {
    function __construct() {
		parent::__construct();
		$this->load->model('productos_model');
		$this->load->model('usuarios_model');
		$this->load->model('carrito_model');
		$this->load->model('consulta_model');
		$this->load->model('Administrador_model');
		$this->load->library('cart');
	}
	public function index()
	{
		$titulo = array('titulo' => 'Sistemas SAZ InforPOWER');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('index');	
		$this->load->view('partes/footer_view');
	}
	public function comercializacion()
	{
		$titulo = array('titulo' => 'Comercialización');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/comercializacion');
		$this->load->view('partes/footer_view');
	}
	public function comoComprar()
	{
		$titulo = array('titulo' => 'Comercialización - Como Comprar');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/comoComprar');
		$this->load->view('partes/footer_view');
	}
	public function envios()
	{
		$titulo = array('titulo' => 'Comercialización - Como Comprar');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/envios');
		$this->load->view('partes/footer_view');
	}
	public function formaPago()
	{
		$titulo = array('titulo' => 'Comercialización - Como Comprar');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/formaPago');
		$this->load->view('partes/footer_view');
	}
	public function qSomos()
	{
		$titulo = array('titulo' => 'Quienes Somos');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/quienesSomos');
		$this->load->view('partes/footer_view');
	}
	public function terminos()
	{
		$titulo = array('titulo' => 'Terminos y Uso');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/terminos');
		$this->load->view('partes/footer_view');
	}
	public function contacto()
	{
		$titulo = array('titulo' => 'Contacto');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/contacto');
		$this->load->view('partes/footer_view');
	}
	public function detalleProducto($id_producto)
	{
		$titulo = array('titulo' => 'Productos');
		$data = array('productos' => $this->productos_model->ver_productosId($id_producto));
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/detalleProducto',$data);
		$this->load->view('partes/footer_view');
	}
	public function actualizacion()
	{
		$titulo = array('titulo' => 'En Construcción');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/paginaError');
		$this->load->view('partes/footer_view');
	}
	public function catalogoVisi()
	{
		$titulo = array('titulo' => 'Productos');
		$data = array('productos' => $this->productos_model->ver_productos());
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/catalogoVisi',$data);
		$this->load->view('partes/footer_view');
	}
	public function agregausuario_view(){	
			
		$titulo = array('titulo' => 'Login y Registro');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/agregausuario_view');
		$this->load->view('partes/footer_view');
	}
	public function agregausuario_view2(){	
			
		$titulo = array('titulo' => 'Login y Registro');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('UsuarioVisitante/agregausuario_view2');
		$this->load->view('partes/footer_view');
	}
/*Fin de Funciones de Páginas*/

/*Funciones Varias*/
/*Inicio funcion de registro */
	public function registrar_usuario(){
		$this->form_validation->set_rules('nombre', 'Ingrese su nombre', 'required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_rules('apellido', 'Ingrese su Apellido', 'required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|is_unique[usuarios.correo]');
		$this->form_validation->set_message('valid_correo', 'El campo %s debe ser un correo válido');
		$this->form_validation->set_message('is_unique', 'cliente se encuentra registrado');
		$this->form_validation->set_rules('usuario', 'usuario', 'required|is_unique[usuarios.usuario]');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('is_unique', 'cliente se encuentra registrado');
		$this->form_validation->set_rules('pass', 'Contraseña invalida', 'trim|required|min_length[8]');
		$this->form_validation->set_message('min_length', 'El campo %s de contener como mínimo %d caracteres');
		//$this->form_validation->set_rules('passconf', 'Confirmar password', 'trim|required|matches[password]');
		//$this->form_validation->set_message('matches','Las contraseñas no coinciden');
		if ($this->form_validation->run() == FALSE){
			echo  "<script>alert('Faltan datos o los datos son incorrectos, intente registrarse nuevamente.')</script>";
			$this->agregausuario_view();
		}else{
			$this->insertar_usuario();
		}
	}
	public function insertar_usuario(){
		$data = array (
			'nombre'=> $this->input->post('nombre'),
			'apellido'=> $this->input->post('apellido'),
			'correo'=> $this->input->post('correo'),
			'usuario'=> $this->input->post('usuario'),
			'pass'=> base64_encode($this->input->post('pass')),
			'idPerfil' => 2,
			'estado' => 1
		);
		$correo = $this->input->post('correo');
		$pass = $this->input->post('pass');
		$this->usuarios_model->guardar_usuario($data);
		$usuario = $this->usuarios_model->buscar_usuario($correo,base64_encode($pass));
		$datos_cliente=array(
			'usuario_id' => $usuario->id_usuario,
		);
		$this->usuarios_model->guardar_cliente($datos_cliente);
		redirect('agregausuario_view2');
		}
/*Fin registro de usuario */	
/*Inicio para el login de usuarios */
	public function iniciar_sesion(){
		$this->form_validation->set_rules('correoLogin', 'Correo', 'trim|required');
		$this->form_validation->set_rules('passLogin', 'pass', 'trim|required|callback_verificar_password');
		$this->form_validation->set_message('required','El campo %s es obligatorio');
		$this->form_validation->set_message('verificar_password','El usuario o contraseña son incorrectos');

		if($this->form_validation->run() == FALSE){				
			$this->agregausuario_view();
		}else{			
			$this->usuario_logueado();
		}
	}
	function verificar_password($pass){
/*Verificar que el usuario exista*/
		$correo = $this->input->post('correoLogin');
		$pass = $this->input->post('passLogin');
		
		$usuario = $this->usuarios_model->buscar_usuario($correo,base64_encode($pass));

		if($usuario){
			$this->crear_sesion($usuario);
			return true;
		}else{
			$this->form_validation->set_message('verificar_pasword', 
			'Usuario y/o Contraseña incorrectos');
			return false;
		}
	}
	public function crear_sesion($usuario){
		$datos_usuario = array(
			'id_usuario' => $usuario->id_usuario,
			'nombre' => $usuario->nombre,
			'apellido' => $usuario->apellido,
			'correo' => $usuario->correo,
			'usuario_nombre'=>$usuario->usuario,
			'perfil' => $usuario->idPerfil,
			'estado' => $usuario->estado,
			'logueado' => TRUE				
		);
		$datos_cliente=array(
			'usuario_id' => $usuario->id_usuario,
		);
		$this->session->set_userdata('usuario',$datos_usuario);
	}
	public function usuario_logueado(){
		//se verifica el perfil del usuario para redireccionar a la pagina correspondiente
		$datos = $this->session->userdata('usuario');
		//var_dump($datos['nombre']);
		switch($datos['perfil']){
			case '1':
				redirect('indexAdmin');
				break;
			case '2':
				redirect('indexU');
				break;
		}
	}
/*Fin para el login de usuarios */
/*Cerrar Session */
	public function cerrar_sesion(){
		$this->session->sess_destroy();
		redirect('index');
	}
	public function insertar_consulta2(){
		$this->form_validation->set_rules('nombre', 'Debe ingresar un Mensaje', 'required');
		$this->form_validation->set_rules('correo', 'Debe ingresar un Mensaje', 'required');
		$this->form_validation->set_rules('mensaje', 'Debe ingresar un Mensaje', 'required');
		$this->form_validation->set_rules('fecha', 'Debe ingresar un Mensaje', 'required');
		$this->form_validation->set_message('required', ' %s *campo obligatorio');
		if($this->form_validation->run() == FALSE){
		  echo  "<script>alert('Faltan datos en el formulario, complete por favor.')</script>";
		  $this->contacto();
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
				$this->contacto();
				return true;
		}
	}
/*Fin de Funciones Varias*/
}