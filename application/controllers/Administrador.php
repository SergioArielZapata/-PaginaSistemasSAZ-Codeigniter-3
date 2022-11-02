<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Administrador extends CI_Controller {
  function __construct() {
	parent::__construct();
  $this->load->model('Administrador_model');
  $this->load->model('carrito_model');
  $this->load->model('usuarios_model');
  $this->load->model('consulta_model');
  $this->load->model('productos_model');
	}
  public function indexAdmin()
  {            
    $titulo = array('titulo' => 'Inicio');
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/indexAdmin');
    $this->load->view('partes/footerAdmin_view');
  }
  public function controlVentas(){  
    $data['ventas']=$this->carrito_model->ver_compra();           
    $titulo = array('titulo' => 'Control de Ventas');
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/controlVentas',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function listadoVentas(){  
    $data['ventas']=$this->carrito_model->ver_compra();           
    $this->load->view('Administrador/listadoVentas',$data);
  }
  public function listadoFecha(){  
    $data['ventas']=$this->carrito_model->ver_compra();           
    $this->load->view('Administrador/listadoFecha',$data);
  }
  public function ventasFechas(){
    $titulo = array('titulo' => 'Listado por fechas');  
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/ventasFechas');
    $this->load->view('partes/footerAdmin_view');
  }
  public function altaCategoria(){
    $titulo = array('titulo' => 'Alta de Categoría');  
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/altaCategoria');
    $this->load->view('partes/footerAdmin_view');
  }
  public function bajaCategoria(){
    $titulo = array('titulo' => 'Baja de Categoría');  
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/bajaCategoria');
    $this->load->view('partes/footerAdmin_view');
  }
  public function modiCategoria(){
    $titulo = array('titulo' => 'Modificación de Categoría');  
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/modiCategoria');
    $this->load->view('partes/footerAdmin_view');
  }
  public function consultas(){            
    $titulo = array('titulo' => 'Consultas de Usuarios');
    $data = array('consultas' => $this->Administrador_model->ver_consultas());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/consultas',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function consultas2(){            
    $titulo = array('titulo' => 'Consultas de Usuarios');
    $data = array('consultas' => $this->Administrador_model->ver_consultas2());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/consultas2',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function usuarios(){            
    $titulo = array('titulo' => 'Consultas de Usuarios');
    $data = array('usuarios' => $this->usuarios_model->ver_usuarios());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/usuarios',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function usuarios2()
  {            
    $titulo = array('titulo' => 'Consultas de Usuarios');
    $data = array('usuarios' => $this->usuarios_model->ver_usuarios2());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/usuarios2',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function detalleUsuarios($id_usuario)
  {
		$adicional['adicional']=$this->usuarios_model->buscar_usuarioId($id_usuario);
		$titulo = array('titulo' => 'Detalle de Compra');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuAdmin_view');
		$this->load->view('Nuevo/cuenta',$adicional);
		$this->load->view('partes/footerAdmin_view');
	}
  public function facturaAd($id_venta)
	{
		$compra['compra']=$this->carrito_model->ver_detalle($id_venta);
		$titulo = array('titulo' => 'Factura');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuAdmin_view');
		$this->load->view('Administrador/facturaAd',$compra);
		$this->load->view('partes/footerAdmin_view');
  }
  public function listaProductos()
  {            
    $titulo = array('titulo' => 'Productos');
    $data = array('productos' => $this->productos_model->ver_productosA());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/productos',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function altaProductos()
	{
		$titulo = array('titulo' => 'Altas de Productos');
    $categoria['categorias'] = $this->productos_model->seleccionar_categoria();
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuAdmin_view');
		$this->load->view('Administrador/altas',$categoria);
		$this->load->view('partes/footerAdmin_view');
	}
  public function bajaProductos()
  {            
    $titulo = array('titulo' => 'Baja de Productos');
    $data = array('productos' => $this->productos_model->ver_productosA());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/bajaproductos',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function modiProductos()
  {            
    $titulo = array('titulo' => 'Modificación de Productos');
    $data = array('productos' => $this->productos_model->ver_productosA());
    $this->load->view('partes/header_view',$titulo);
    $this->load->view('partes/menuAdmin_view');
    $this->load->view('Administrador/modiproductos',$data);
    $this->load->view('partes/footerAdmin_view');
  }
  public function modificacionProductos($id_producto)
	{    
		$titulo = array('titulo' => 'Modificaciones');
    $producto['productos'] = $this->productos_model->ver_productosId($id_producto);
    $producto['categorias'] = $this->productos_model->seleccionar_categoria();
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuAdmin_view');    
		$this->load->view('Administrador/modificacionesProd',$producto);
		$this->load->view('partes/footerAdmin_view');
	}
  public function productosBaja()
 {
   $titulo = array('titulo' => 'baja de Productos');
   $data = array('productos' => $this->productos_model->ver_bajaProductos());
   $this->load->view('partes/header_view',$titulo);
   $this->load->view('partes/menuAdmin_view');
   $this->load->view('Administrador/productoBaja',$data);
   $this->load->view('partes/footerAdmin_view');
 }
 public function modificacionUsu($id_usuario)
	{    
		$titulo = array('titulo' => 'Modificacion');
		$adicional['adicional'] = $this->usuarios_model->buscar_usuarioId($id_usuario);
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menuAdmin_view');    
		$this->load->view('Administrador/cuentaAd',$adicional);
		$this->load->view('partes/footerAdmin_view');
	}
/*Fin de Funciones de Página*/
/*Funciones Varias*/
  /*Actualiza usuario Administrador*/
  //+++++++++++++++++++++++++++++Actualiza Datos de Usuario++++++++++++++++++++++++++++++++
	public function actualizarUsuario2(){
		$this->form_validation->set_rules('direccion', 'Ingrese su direccion', 'required');
		$this->form_validation->set_rules('telefono', 'Ingrese su telefono', 'required|numeric');
		$this->form_validation->set_rules('codPostal', 'Ingrese su codigo postal', 'required|numeric');
		$this->form_validation->set_rules('ciudad', 'Ingrese su ciudad', 'required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('numeric', 'El campo %s debe ser un valor númerico');
		if ($this->form_validation->run() == FALSE){
			redirect('cuentaAd');
		}else{
			$this->actualizar2();
		}	
	}
  public function actualizar2(){
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
			redirect('usuarios');
	}
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //+++++++++++++++++++++++++++++++Baja Logica de Consulta+++++++++++++++++++++++++++++++++
  public function bajaConsulta($id_consulta){
		$consulta = array(
		  'estado' => 0
		);
		$this->consulta_model->actualizar_consulta($consulta,$id_consulta);  
		redirect('consultas');
	}
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++++++Alta de Productos++++++++++++++++++++++++++++++++++++
  public function registrar_producto(){
    $this->form_validation->set_rules('nombre', 'Ingrese nombre del producto', 'required');
    $this->form_validation->set_rules('descripcion', 'Ingrese una breve descripción', 'required');
    $this->form_validation->set_rules('categoria', 'Seleccione una categoria', 'required');    
    $this->form_validation->set_rules('precio', 'Ingrese el precio del producto', 'required|numeric');
    $this->form_validation->set_rules('cantidad', 'Ingrese el stock disponible', 'required|numeric');
    $this->form_validation->set_rules('imagen','imagen','callback_validar_imagen');
		$this->form_validation->set_message('validar_imagen','*Este campo es obligatorio');
    $this->form_validation->set_message('required', ' %s *campo obligatorio');
    $this->form_validation->set_message('numeric', 'El campo %s debe ser un valor númerico');
    if($this->form_validation->run() == FALSE){
      $this->altaProductos();
      echo  "<script>alert('Faltan Datos al Formulario, intentelo nuevamente.')</script>";
    }else{
      $this->agregar_producto();
      echo  "<script>alert('Producto dado de Alta Exitosamente!!!')</script>";
    }
  }
  public function agregar_producto(){
    $producto = array(
      'categoria_id'    => $this->input->post('categoria'),
      'nombre'          => $this->input->post('nombre'),
      'descripcion'     => $this->input->post('descripcion'),        
      'precio'          => $this->input->post('precio'),
      'stock'           => $this->input->post('cantidad'),
      'Imagendb'        => file_get_contents($_FILES['imagen']['tmp_name']),
      'estado'          => 1
    );
    $this->productos_model->guardar_productos($producto);
    $id = $_POST['categoria'];
    $asociada = array(
      'asociada'          => 1
    );
    $this->productos_model->modi_Cate($asociada,$id);
    $this->altaProductos();
    return true;
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++++++Alta de Categoria++++++++++++++++++++++++++++++++++++
  public function alta_Categoria(){
    $this->form_validation->set_rules('cate', 'Ingrese nombre del producto', 'required');
    $this->form_validation->set_message('required', ' %s *campo obligatorio');
    if($this->form_validation->run() == FALSE){
      $this->altaCategoria();
      echo  "<script>alert('No ingreso el nombre de la Categoría, intentelo nuevamente.')</script>";
    }else{
      $this->agregar_Categoria();
      echo  "<script>alert('La Categoría esta dada de ALTA exitosamente!!!')</script>";
    }
  }
  public function agregar_Categoria(){
    $catego = array(
      'nombreCate'    => $this->input->post('cate'),
      'asociada' => 0
    );
    $this->productos_model->guardar_Categoria($catego);
    unset($_POST["cate"]);
    $this->altaCategoria();
    return true;
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++++++Baja de Categoria++++++++++++++++++++++++++++++++++++
  public function baja_Categoria(){
    $id = array(
      'id'    => $this->input->post('estado'),
    );
    if($_POST["estado"] == 0 or $_POST["asociada"] == 1){
      echo  "<script>alert('La Categoría << Todas las Categorías >> No puede ser removida o Seleccionó una categoría Asociada a un producto, intentelo nuevamente.')</script>";
      unset($_POST["estado"]);
      $this->bajaCategoria();
    }else{
      $this->productos_model->quitar_Categoria($id);
      echo  "<script>alert('La Categoría fue dada de BAJA exitosamente!!!')</script>";
      unset($_POST["estado"]);
      $this->bajaCategoria();
    return true;
        }
    }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++Modificacion de Categoria++++++++++++++++++++++++++++++++
  public function modi_Categoria(){
    $this->form_validation->set_rules('cate', 'Ingrese nombre del producto', 'required');
    $this->form_validation->set_message('required', ' %s *campo obligatorio');
    if($this->form_validation->run() == FALSE or $_POST["id"] == 0){
      $this->modiCategoria();
      echo  "<script>alert('La Categoría << Todas las Categorías >> No puede ser Modificada o No ingreso el nombre de la Categoría a Modificar')</script>";
    }else{
      $cate = array(    
        'id'                =>$this->input->post('id'),
        'nombreCate'        =>$this->input->post('cate'),
      );
      $id = $_POST['id'];
      $this->productos_model->modi_Cate($cate,$id);
      echo  "<script>alert('La Categoría fue MODIFICADA exitosamente!!!')</script>";
      unset($_POST["id"]);
      unset($_POST["cate"]);
      $this->modiCategoria();
    return true;
    }
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++Modificacion de Producto+++++++++++++++++++++++++++++++++
  public function modificar($id_producto=null){
    $this->form_validation->set_rules('nombre', 'Ingrese nombre del producto', 'required');
    $this->form_validation->set_rules('descripcion', 'Ingrese una breve descripción', 'required');
    $this->form_validation->set_rules('categoria', 'Seleccione una categoria', 'required');    
    $this->form_validation->set_rules('precio', 'Ingrese el precio del producto', 'required|numeric');
    $this->form_validation->set_rules('cantidad', 'Ingrese el stock disponible', 'required|numeric');
    $this->form_validation->set_rules('imagen','imagen','callback_validar_imagen');
		$this->form_validation->set_message('validar_imagen','*Este campo es obligatorio');
    $this->form_validation->set_message('required', ' %s *campo obligatorio');
    $this->form_validation->set_message('numeric', 'El campo %s debe ser un valor númerico');
    if($this->form_validation->run() == FALSE){
      $this->modificacionProductos($id_producto);
    }else{
      $producto = array(    
        'categoria_id'  =>$this->input->post('categoria_id'),
        'nombre'        =>$this->input->post('nombre'),
        'descripcion'   => $this->input->post('descripcion'),        
        'precio'        => $this->input->post('precio'),
        'stock'         => $this->input->post('cantidad'),
        'Imagendb'      => file_get_contents($_FILES['imagen']['tmp_name']),
        'estado' => 1
      );
      $this->productos_model->actualizar_productos($producto,$id_producto);
      echo  "<script>alert('El producto fue MODIFICADO exitosamente!!!')</script>";
      $this->modiProductos();
    }  
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++++++Baja de Producto+++++++++++++++++++++++++++++++++++++
  public function bajaLogica($id_producto){
    $producto = array(
      'estado' => 0
    );
    $this->productos_model->actualizar_productos($producto,$id_producto);  
    redirect('bajaProductos');
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //+++++++++++++++++++++++++++++++Activacion de Producto++++++++++++++++++++++++++++++++++
  public function activacionLogica($id_producto){
    $producto = array(
      'estado' => 1
    );
    $this->productos_model->actualizar_productos($producto,$id_producto);  
    redirect('productosBaja');
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //++++++++++++++++++++++++++++++++Validacion de Imagen+++++++++++++++++++++++++++++++++++
  function validar_imagen() {
    $tipoArchivo=$_FILES['imagen']['type'];
    $tamañoArchivo=$_FILES['imagen']['size'];    
    $nombre_imagen=$_FILES['imagen']['name'];//elijo el nombre de la imagen
    if(empty($nombre_imagen) or (strstr($tipoArchivo,"jpeg")!="jpeg" and strstr($tipoArchivo,"jpg")!="jpg" and strstr($tipoArchivo,"png")!="png") or $tamañoArchivo>5000000) {
      return false;
    }else {
      return true;
    }   
 }
 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 //+++++++++++++++++++++++++++++++Baja Logica de Usuario++++++++++++++++++++++++++++++++++

  public function bajaUsuario($id_usuario){
    $usuario = array(
      'estado' => 0
    );
    $this->usuarios_model->actualizar_usuarios($usuario,$id_usuario);  
    redirect('usuarios');
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //+++++++++++++++++++++++++++++++Alta Logica de Usuario++++++++++++++++++++++++++++++++++
  public function altaUsuario($id_usuario){
    $usuario = array(
      'estado' => 1
    );
    $this->usuarios_model->actualizar_usuarios($usuario,$id_usuario);  
    redirect('usuarios2');
  }
  //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/*Fin de Funciones Varias*/
}