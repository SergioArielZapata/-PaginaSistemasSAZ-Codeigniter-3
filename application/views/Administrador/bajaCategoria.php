<hr class="featurette-divider">
<!DOCTYPE html>
<html lang="es">
<!--Cabecera general-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Categoría</title>
</head>
<h1 class="text-center btn-success">Baja de Categorías de Productos</h1>
<div class="container col-6 justify-content-md-center">
    <div class="card ">
        <div class="card-header text-center">
            <h2>Categoría</h2>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0 text-aling-center text-justify ">
            <h1 class="text-center btn-success">Solo Categorías SIN productos asociados </h1>
                <center>
                    <form action="baja_Categoria" method="post">
                        <select name="estado" class="form-select btn btn-success text-justify" aria-label="Default select example">
                            <?php $categorias= $this->productos_model->seleccionar_categoria();
                            foreach($categorias as $categoria)
                            {;?><option value =<?php echo $categoria->id;?>><?php echo $categoria->nombreCate;?></option>
                            <?php };?>
                        </select><br><br>
                        <input id="asociada" class="form-control" type="hidden" name="asociada" value="<?php echo $categoria->asociada;?>>">

                            <div class="form-group text-center">
                                <button type='submit' class='btn btn-success'><img src="assets/iconos/verificado.png" while=25 height=25> Borrar </button>
                                <a href="<?php echo base_url('indexAdmin')?>" class='btn btn-danger'><img src="assets/iconos/cancelar.png" while=25 height=25> Cancelar </a>
                            </div>
                    </form>
                </center>
            </blockquote>
        </div>
    </div>
</div>    