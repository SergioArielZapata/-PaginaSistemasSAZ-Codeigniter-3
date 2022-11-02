<hr class="featurette-divider">
<h1 class="text-center btn-success">Alta de Productos</h1>
<section class="alta">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingresar datos del producto</h5>
                <p class="card-text">
                    <form class="w-50 mx-auto" method="POST" action="<?php echo base_url('alta');?>" enctype="multipart/form-data">
                        <!--Nombre-->
                        <div class="form-group">
                            <label for="nombre" class="text-black font-weight-bold">Nombre del Producto</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre del producto" autofocus="autofocus"  value="<?php echo set_value('nombree') ;?>">
                        </div>
                        <span class="text-danger"><?php echo form_error('nombre');?></span>
                        
                        <!--Descripcion-->
                        <div class="form-group">
                            <label for="descripcion" class="text-black font-weight-bold">Descripcion del Producto</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Ingrese un breve descripción" autofocus="autofocus"  value="<?php echo set_value('descripcionn') ;?>">
                        </div>
                        <span class="text-danger"><?php echo form_error('descripcion');?></span>                
                        
                        <!--Categoria-->
                        <div class="form-group">
                            <label for="categoria" class="text-black font-weight-bold">Seleccione la categoria del producto</label>
                            <select class="form-control" name="categoria" id="categoria" value="<?php echo set_value('categoria');?>" aria-label="Default select">
                                <!-- <option value="0" selected>Selecciones una categoria</option> -->
                                <?php foreach($categorias as $categoria){;?>
                                    <option value=<?php echo $categoria->id;?>><?php echo $categoria->nombreCate;?></option>
                                    <?php };?>
                            </select>
                            <span class="text-danger"><?php echo form_error('categoria');?></span>
                        </div>
                        
                        <!--Precio-->
                        <div class="form-group">
                            <label for="precio" class="text-black font-weight-bold">Precio del Producto</label>
                            <input id="precio" class="form-control" type="text" name="precio" placeholder="Ingrese el precio del producto" autofocus="autofocus"  value="<?php echo set_value('precioo') ;?>">
                        </div>
                        <span class="text-danger"><?php echo form_error('precio');?></span>

                         <!--Cantidad-->
                         <div class="form-group">
                            <label for="cantidad" class="text-black font-weight-bold">Cantidad de productos a ingresar</label>
                            <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Ingrese el cantidad de nuevos productos" autofocus="autofocus"  value="<?php echo set_value('cantidada') ;?>">
                        </div>
                        <span class="text-danger"><?php echo form_error('cantidad');?></span>

                        <!--Imagen-->
                        <div class="form-group">
                            <label for="imagen" class="text-black font-weight-bold">Subir una imagen (No mayor a 2 Mb)</label>
                            <input id="imagen" class="form-control-file" type="file" name="imagen">
                        </div>
                        <span class="text-danger"><?php echo form_error('imagen');?></span>
                        
                        <!--Boton-->
                        <div class="form-group">
                            <button type='submit' class='btn btn-success'><img src="assets/iconos/verificado.png" while=25 height=25> Agregar</button>
                            <a href="<?php echo base_url('indexAdmin')?>" class='btn btn-danger'><img src="assets/iconos/cancelar.png" while=25 height=25> Cancelar</a>
                        </div>
                    </form>
                </p>
            </div>
        </div>        
    </div>    
</section>
