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
<h1 class="text-center btn-success">Modificación de Productos</h1>
<div class="row conteiner-fluid justify-content-around">
        <div class="col-sm-3">
        
        </div>
        <div class="col-sm-6">
            <center>
                <form action="modiProductos" method="post">
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
            <div class="busqueda">
                <form action="modiProductos" method="post" class="form-search">
                <div class="input-group">
                    <input class="form-control form-text" id="buscar" name="buscar" maxlength="128" placeholder="Buscar" size="15" type="text" />
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary"><img src=" assets/iconos/buscar.png " while=22 height=22></button></span>
                </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-light table-hover table-sm table-responsive-lg text-center">
        <thead class="thead-light">
            <tr>
                <th>ImagenDB</th>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>stock</th>
                <th>Acción</th>
            </tr>
        </thead>
        <?php foreach($productos as $row){ ?>
            <?php if($row->categoria_id == $opt){ ?>
                <tbody>
                    <tr>
                        <td><img height="90px" src="data:imagen/jpg;base64,<?php echo base64_encode($row->Imagendb); ?>" /></td>
                        <td><?php echo $row->nombreCate; ?></td>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->descripcion; ?></td>                
                        <td>$ <?php echo $row->precio; ?></td>
                        <td><?php echo $row->stock; ?></td>
                        <td>
                        <a href="<?php echo base_url('modificacionProductos').$row->id_producto;?>" class="btn btn-success" type="button"><img src="assets/iconos/detalle.svg" while=25 height=25> Modificar </a>             
                        </td>
                    </tr>
                </tbody>
            <?php }?>
            <?php if($opt == 0){ ?>
                <?php $cadena = strtolower($row->descripcion);?>
                <?php if($bus == "" || preg_match("/$bus/i", $cadena) == true){ ?>
                <tbody>
                    <tr>
                        <td><img height="90px" src="data:imagen/jpg;base64,<?php echo base64_encode($row->Imagendb); ?>" /></td>
                        <td><?php echo $row->nombreCate; ?></td>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->descripcion; ?></td>                
                        <td>$ <?php echo $row->precio; ?></td>
                        <td><?php echo $row->stock; ?></td>
                        <td>
                        <a href="<?php echo base_url('modificacionProductos').$row->id_producto;?>" class="btn btn-success" type="button"><img src="assets/iconos/detalle.svg" while=25 height=25> Modificar </a>             
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            <?php }?>
        <?php }?>
    </table>    
