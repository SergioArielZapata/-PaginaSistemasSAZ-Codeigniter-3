<hr class="featurette-divider">
<h1 class="text-center btn-success">Carrito de Compras</h1>
<div class="text ml-2" > 
	<?php  $cart_check = $this->cart->contents();
		// Si el carrito está vacio, mostrar el siguiente mensaje
		if (empty($cart_check)){?>
            <br>
			<h3 class="text-center" style='font-size:15;color:red'>Para agregar productos al carrito, haga click en -> <a href="<?php echo base_url('catalogoRegi')?>" class="btn btn-outline-danger btn-lg" type="button">Comprar</a></h3> 
		<?php }
    ?>    
</div>
<?php if($this->cart->contents()){?>
    <?php echo form_open('actualizarCarrito'); ?>
    <table class="table table-light table-hover table-sm table-responsive-lg text-center">
    <thead class="thead-light">
        <tr>
        <th scope="col">Item</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Cantidad</th>
        <th scope="col">SubTotal</th>
        <th scope="col">Accion</th>
        </tr>
    </thead>
        <tbody>
            <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $items['name']; ?></td>
                            <td><?php echo $this->cart->format_number($items['price']); ?></td>
                            <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '5', 'size' => '5', 'id' => 'cantidad', 'pattern' => '\d+')); ?></td>
                            <td>$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            <td>      
                                <a href="<?php echo base_url('eliminarUnidad/'.$items['rowid'])?>" class="btn" type="button">
                                    <i class="far fa-trash-alt">
                                    <img src="assets/iconos/eliminar.svg" while=25 height=25>
                                    </i>
                                </a>
                            </td>                        
                        </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                <td colspan="1"> </td>
            </tr> 
    </table> 
    <div class="text-center">
        <hh><?php echo form_submit('actualizarCarrito', '   Actualizar Carrito   ');?></hh>
                <img src="assets/iconos/pagar.svg" while=25 height=25>
    </div>
    <br>
    <div class=" text-center">    
        <a href="<?php echo base_url('vaciarCarrito')?>" class="btn btn-danger" type="button">
            <i class="far fa-trash-alt">
                <img src="assets/iconos/eliminar.svg" while=25 height=25>
            </i>
            Vaciar Carrito
        </a>
        <a href="<?php echo base_url('comprarCarrito').$items['id']?>" class="btn btn-success" type="button">
            <i class="fas fa-cash-register">
                <img src="assets/iconos/pagar.svg" while=25 height=25>
            </i>
            Realizar Compra
        </a>
        <a href="<?php echo base_url('catalogoRegi')?>" class="btn btn-secondary" type="button">
            <i class="fas fa-cash-register">
                <img src="assets/iconos/detalle.svg" while=25 height=25>
            </i>
            Seguir comprando
        </a>
    </div>
<?php }?>
<br>
<?php 
    if('cantidad' < 0){?>
        <script>
            var input = document.getElementById('cantidad');
            input.oninvalid = function(event) { event.target.setCustomValidity('La cantidad solo acepta números enteros '); }
        </script>
<?php    }?>