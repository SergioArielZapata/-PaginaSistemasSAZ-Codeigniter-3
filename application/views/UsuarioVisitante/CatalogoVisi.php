<?php  
$opt = 0;
$bus = "";
if(isset($_POST['buscar'])){
 $bus = $_POST['buscar'];
}
if(isset($_POST['estado']) ){
 $opt = $_POST['estado'];
}
?>
<hr class="featurette-divider">
<h1 class="text-center btn-success">Productos a la venta</h1>
<div class="row conteiner-fluid justify-content-around">
        <div class="col-sm-3">
   
        </div>
        <div class="col-sm-6">
            <center>
                <form action="catalogoVisi" method="post">
                    <select name= "estado" class="form-select btn btn-success text-justify" aria-label="Default select example" onchange="this.form.submit()">
                        <option value="0" selected>Seleccione una categoría</option>
                        <?php $categorias= $this->productos_model->seleccionar_categoria();
                        foreach($categorias as $categoria){;?>
                        <option value =<?php echo $categoria->id;?>><?php echo $categoria->nombreCate;?></option>
                        <?php };?>
                    </select>
                        <!-- <input type='submit' class='btn btn-success' name="catego" value="Ordenar"></div> -->
                </form>
            </center><br>
        </div>
        <div class="col-sm-3 text-right">
            <!-- <form action="catalogoVisi" method="post">
                <input class="form_busqueda" id="buscar" type="text" name="buscar" placeholder="Buscar...">
                <button type='submit' class='btn '><img src=" assets/iconos/buscar.png " while=22 height=22></button>
            </form> -->
        </div>
    </div>
            <div class="card-group">
                <?php foreach($productos as $producto){ ?>
                    <?php if($producto->categoria_id == $opt){ ?>
                    <div class="col-sm-3 container-fluid">
                        <div class="card">
                            <img src="data:imagen/jpg;base64,<?php echo base64_encode($producto->Imagendb); ?>" name="imagen" class="card-img-top" width = "100px" height = "375px">
                            <div class="card-body">
                                <!--ID_Producto-->
                                <input readonly type="hidden" name="id_producto" value="<?php echo $producto->id_producto;?>">
                                <h5 name="nombre" class="card-title"><?php echo $producto->nombre; ?></h5>
                                <h5 name="Stock" class="card-text">Stock: <?php echo $producto->stock; ?></h5>                           
                                <h5 name="precio" class="card-text">$ <?php echo $producto->precio; ?></h5>
                                <div>
                                    <a href="<?php echo base_url('detalleProducto').$producto->id_producto;?>" class="btn btn-primary" >ver producto</a>                     
                                </div>                
                            </div>
                        </div>
                        <br>
                    </div>                
                <?php }?>
                    <?php if($opt == 0){ ?>
                        <?php $cadena = strtolower($producto->descripcion);?>
                        <?php if($bus == "" || preg_match("/$bus/i", $cadena) == true){ ?>
                    <div class="col-sm-3 container-fluid">
                        <div class="card">
                        <img src="data:imagen/jpg;base64,<?php echo base64_encode($producto->Imagendb); ?>" name="imagen" class="card-img-top" width = "100px" height = "375px">
                            <div class="card-body">
                                <!--ID_Producto-->
                                <input readonly type="hidden" name="id_producto" value="<?php echo $producto->id_producto;?>">
                                <h5 name="nombre" class="card-title"><?php echo $producto->nombre; ?></h5>
                                <h5 name="Stock" class="card-text">Stock: <?php echo $producto->stock; ?></h5>                           
                                <h5 name="precio" class="card-text">$ <?php echo $producto->precio; ?></h5>
                                <div>
                                    <a href="<?php echo base_url('detalleProducto').$producto->id_producto;?>" class="btn btn-primary" >ver producto</a>
                                </div>                
                            </div>
                        </div>
                        <br>
                    </div>
                    <?php }?>                
                <?php }?>
            <?php }?>
        </div>  
    </div>