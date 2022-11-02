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
<h1 class="text-center btn-success">Listado General de Productos</h1>
    <div class="row conteiner-fluid justify-content-around">
        <div class="col-sm-3">
        
        </div>
        <div class="col-sm-6">
            <center>
                <form action="listaProductos" method="post">
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
            <!-- <div >
            <form action="listaProductos" method="post">
                <input class="form_busqueda" id="buscar" type="text" name="buscar" placeholder="Buscar...">
                <button type='submit' class='btn '><img src=" assets/iconos/buscar.png " while=22 height=22></button>
            </form>
            </div> -->
        </div>
    </div>
    <table class="table table-light table-hover table-sm table-responsive-lg text-center">
        <thead class="thead-light">
            <tr>
                <th>ImagenDB</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>stock</th>
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
                    </tr>
                </tbody>
            <?php }?>
            <?php if($opt == 0){ ?>
                            <!-- -------------------------------------------------------------------------------- -->
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
                        </tr>
                    </tbody>
                <?php }?>
            <?php }?>
        <?php }?>
    </table>    
