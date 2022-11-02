<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']                = 'UsuarioVisitante';
$route['404_override']                      = '';
$route['translate_uri_dashes']              = TRUE;

/*Rutas para el usuario común */
$route['index']                             = 'UsuarioVisitante/index';
$route['agregausuario_view']                = 'UsuarioVisitante/agregausuario_view';
$route['agregausuario_view2']               = 'UsuarioVisitante/agregausuario_view2';
$route['registro']                          = 'UsuarioVisitante/registrar_usuario';
$route['login']                             = 'UsuarioVisitante/iniciar_sesion';
$route['cerrarSesion']                      = 'UsuarioVisitante/cerrar_sesion';
$route['consulta2']                         = 'UsuarioVisitante/insertar_consulta2';
$route['comercializacion']                  = 'UsuarioVisitante/comercializacion';
$route['quienesSomos']                      = 'UsuarioVisitante/qSomos';
$route['terminos']                          = 'UsuarioVisitante/terminos';
$route['contacto']                          = 'UsuarioVisitante/contacto';
$route['comoComprar']                       = 'UsuarioVisitante/comoComprar';
$route['envios']                            = 'UsuarioVisitante/envios';
$route['formaPago']                         = 'UsuarioVisitante/formaPago';
$route['detalleProducto(:num)']             = 'UsuarioVisitante/detalleProducto/$1';
$route['catalogoVisi']                      = 'UsuarioVisitante/catalogoVisi';

/*Rutas para el Administrador*/
$route['indexAdmin']                        = 'Administrador/indexAdmin';
$route['listaProductos']                    = 'Administrador/listaProductos';
$route['altaProductos']                     = 'Administrador/altaProductos';
$route['bajaProductos']                     = 'Administrador/bajaProductos';
$route['modiProductos']                     = 'Administrador/modiProductos';
$route['modificacionProductos(:num)']       = 'Administrador/modificacionProductos/$1';
$route['editarUsu(:num)']                   = 'Administrador/modificacionUsu/$1';
$route['productosBaja']                     = 'Administrador/productosBaja';
$route['controlVentas']                     = 'Administrador/controlVentas';
$route['consultas']                         = 'Administrador/consultas';
$route['consultas2']                        = 'Administrador/consultas2';
$route['usuarios']                          = 'Administrador/usuarios';
$route['usuarios2']                         = 'Administrador/usuarios2';
$route['detalleUsuarios(:num)']             = 'Administrador/detalleUsuarios/$1';
$route['detalleVentasU(:num)']              = 'Administrador/detalleVentasU/$1';
$route['facturaAd(:num)']                   = 'Administrador/facturaAd/$1';
$route['actualizar2']                       = 'Administrador/actualizar2/';
$route['bajaCon/(:num)']                    = 'Administrador/bajaConsulta/$1';
$route['alta']                              = 'Administrador/registrar_producto';
$route['modificar(:num)']                   = 'Administrador/modificar/$1';
$route['baja/(:num)']                       = 'Administrador/bajaLogica/$1';
$route['activar/(:num)']                    = 'Administrador/activacionLogica/$1';
$route['bajaUsu/(:num)']                    = 'Administrador/bajaUsuario/$1';
$route['altaUsu/(:num)']                    = 'Administrador/altaUsuario/$1';
$route['listadoVentas']                     = 'Administrador/listadoVentas';
$route['ventasFechas']                      = 'Administrador/ventasFechas';
$route['listadoFecha']                      = 'Administrador/listadoFecha';
$route['altaCategoria']                     = 'Administrador/altaCategoria';
$route['alta_Categoria']                    = 'Administrador/alta_Categoria';
$route['bajaCategoria']                     = 'Administrador/bajaCategoria';
$route['baja_Categoria']                    = 'Administrador/baja_Categoria';
$route['modiCategoria']                     = 'Administrador/modiCategoria';
$route['modi_Categoria']                    = 'Administrador/modi_Categoria';

/*Rutas para el usuario Registrado*/
$route['indexU']                            = 'UsuarioRegistrado/indexU';
$route['comercializacionU']                 = 'UsuarioRegistrado/comercializacion';
$route['quienesSomosU']                     = 'UsuarioRegistrado/qSomos';
$route['terminosU']                         = 'UsuarioRegistrado/terminos';
$route['contactoU']                         = 'UsuarioRegistrado/contacto';
$route['consultaU']                         = 'UsuarioRegistrado/consulta';
$route['comoComprarU']                      = 'UsuarioRegistrado/comoComprarU';
$route['enviosU']                           = 'UsuarioRegistrado/envios';
$route['formaPagoU']                        = 'UsuarioRegistrado/formaPago';
$route['carrito']                           = 'UsuarioRegistrado/carrito';
$route['catalogoRegi']                      = 'UsuarioRegistrado/catalogoRegi';
$route['misCompras']                        = 'UsuarioRegistrado/misCompras';
$route['miCuenta']                          = 'UsuarioRegistrado/miCuenta';
$route['actualizarUs']                      = 'UsuarioRegistrado/actualizarUsuario';
$route['factura(:num)']                     = 'UsuarioRegistrado/factura/$1';
$route['factu(:num)']                       = 'UsuarioRegistrado/factu/$1';
$route['consulta']                          = 'UsuarioRegistrado/insertar_consulta';

//Rutas para el Carrito
$route['agregarCarrito']                    = 'carrito_controller/agregarCarrito';
$route['actualizarCarrito']                 = 'carrito_controller/actualizar_carrito';
$route['eliminarUnidad/(:any)']             = 'carrito_controller/remove/$1';
$route['vaciarCarrito']                     = 'carrito_controller/eliminarCarrito';
$route['comprarCarrito(:num)']              = 'carrito_controller/comprarCarrito/$1';