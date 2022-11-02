<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
    function __construct(){
    parent:: __construct();
	$this->load->model('Administrador_model');
    $this->load->model('carrito_model');
    $this->load->model('usuarios_model');
    $this->load->model('consulta_model');
    $this->load->model('productos_model');
    }
	public function index()
	{
		$titulo = array('titulo' => 'Sistemas SAZ InforPOWER');
		$this->load->view('partes/header_view',$titulo);
		$this->load->view('partes/menu_view');
		$this->load->view('index');	
		$this->load->view('partes/footer_view');
	}
	
}