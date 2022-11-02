<hr class="featurette-divider">
<h1 class="text-center btn-success">Detalle del Producto Seleccionado</h1>
<section class="modificacion">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Producto N°: <?php echo $productos->id_producto?> - Categoria: <?php echo $productos->nombreCate?></h5>                
                <p class="card-text">
                    <div class="row">
                        <div class="col-4">
                            <img class="img w-100" src="data:imagen/jpg;base64,<?php echo base64_encode($productos->Imagendb); ?>">
                        </div>
                        <div class="col-8">
                            <form class="w-75 mx-auto" method="POST" action="<?php echo base_url('modificar').$productos->id_producto;?>" enctype="multipart/form-data">
                                <!--ID_Producto-->
                                <input type="hidden" name="id" value="<?php echo $productos->id_producto?>">

                                <!--Nombre-->
                                <div class="form-group">
                                    <h5 for="nombre" class="text-black font-weight-bold"><?php echo $productos->nombre?></h5>                                    
                                </div>                                
                                
                                <!--Descripcion-->
                                <div class="form-group">
                                    <p for="descripcion" class="text-black font-weight-bold"><?php echo $productos->descripcion?></p>                                    
                                </div>               
                                
                                <!--Precio-->
                                <div class="form-group">
                                    <h4 for="precio" class="text-black font-weight-bold">$ <?php echo $productos->precio?></4>
                                </div>                              

                                <!--Cantidad-->
                                <div class="form-group">
                                    <label for="cantidad" class="text-black font-weight-bold">Stock Actual: <?php echo $productos->stock?> unidades</label>
                                </div>
                                <span class="text-danger"><?php echo form_error('cantidad');?></span>
                                
                                <!--Boton-->
                                <div class="form-group py-2">
                                    <a href="<?php echo base_url('catalogoVisi')?>" class='btn btn-primary'>Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </p>
            </div>
        </div>        
    </div>    
</section>