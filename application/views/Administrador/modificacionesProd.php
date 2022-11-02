<hr class="featurette-divider">
<h1 class="text-center btn-success">Modificación de Productos</h1>
<section class="modificacion">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Modificar datos del producto</h5>                
                <p class="card-text">
                    <div class="row">
                        <div class="col-4">
                            <img  class="img w-100" src="data:image/jpg;base64,<?php echo base64_encode($productos->Imagendb); ?>" />
                        </div>
                        <div class="col-8">
                            <form class="w-75 mx-auto" method="POST" action="<?php echo base_url('modificar').$productos->id_producto;?>" enctype="multipart/form-data">
                                <!--ID_Producto-->
                                <input type="hidden" name="id" value="<?php echo $productos->id_producto?>">

                                <!--Nombre-->
                                <div class="form-group">
                                    <label for="nombre" class="text-black font-weight-bold">Nombre del Producto</label>
                                    <input id="nombre" class="form-control" type="text" value="<?php echo $productos->nombre?>" name="nombre"  autofocus="autofocus"  value="<?php echo set_value('nombre') ;?>">
                                </div>
                                <span class="text-danger"><?php echo form_error('nombre');?></span>
                                
                                <!--Descripcion-->
                                <div class="form-group">
                                    <label for="descripcion" class="text-black font-weight-bold">Descripcion del Producto</label>
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" value="<?php echo $productos->descripcion?>" autofocus="autofocus"  value="<?php echo set_value('descripcion') ;?>">
                                </div>
                                <span class="text-danger"><?php echo form_error('descripcion');?></span>                
                                
                                <!--Categoria-->
                                <div class="form-group">
                                    <label for="categoria" class="text-black font-weight-bold">Categoria del producto</label>
                                    <input type="hidden" name="categoria_id" value="<?php echo $productos->categoria_id?>">
                                    <input readonly id="categoria" class="form-control" type="text" name="categoria" value="<?php echo $productos->nombreCate?>" autofocus="autofocus"  value="<?php echo set_value('categoria') ;?>">
                                    <span class="text-danger"><?php echo form_error('categoria');?></span>
                                </div>
                                
                                <!--Precio-->
                                <div class="form-group">
                                    <label for="precio" class="text-black font-weight-bold">Precio del Producto</label>
                                    <input id="precio" class="form-control" type="text" name="precio" value="<?php echo $productos->precio?>" autofocus="autofocus"  value="<?php echo set_value('precio') ;?>">
                                </div>
                                <span class="text-danger"><?php echo form_error('precio');?></span>

                                <!--Cantidad-->
                                <div class="form-group">
                                    <label for="cantidad" class="text-black font-weight-bold">Cantidad de productos a ingresar</label>
                                    <input id="cantidad" class="form-control" type="text" name="cantidad" value="<?php echo $productos->stock?>" autofocus="autofocus"  value="<?php echo set_value('cantidada') ;?>">
                                </div>
                                <span class="text-danger"><?php echo form_error('cantidad');?></span>
                                <!--Imagen-->
                                <div class="form-group">
                                    <label for="imagen" class="text-black font-weight-bold">Subir una imagen (No mayor a 2 Mb)</label>
                                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                                </div>
                                <span class="text-danger"><?php echo form_error('imagen');?></span>
                                <!--Boton-->
                                <div class="form-group py-2">
                                    <button type='submit' class='btn btn-success'>Modificar</button>
                                    <a href="<?php echo base_url('modiProductos')?>" class='btn btn-danger'>Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div> 
                </p>
            </div>
        </div>        
    </div>    
</section>