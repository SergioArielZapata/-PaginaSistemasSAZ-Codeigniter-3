<hr class="featurette-divider">
<?php $usuario = $this->session->userdata('usuario');?>
<div class="container col-6 justify-content-md-center">
    <div class="card ">
        <div class="card-header text-center">
            <h2>Consulta</h2>
        </div>
        <div class="card-body ">
            <blockquote class="blockquote mb-0 text-aling-center text-justify ">
                <form class="w-100 mx-auto" method="POST" action="<?php echo base_url('consulta');?>" enctype="multipart/form-data">
                    <!--ID_Cliente-->
                    <input readonly type="hidden" name="perfil_id" value="<?php echo $usuario['perfil'];?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" readonly type="text"  name="nombre" value="<?php echo $usuario['apellido'];?><?php echo ", ";?><?php echo $usuario['nombre'];?>">
                    </div>
                    <div class="form-group">
                        <label for="correo">Email</label>
                        <input id="correo" class="form-control" readonly type="text"  name="correo" value="<?php echo $usuario['correo'];?>">
                    </div>                                
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" class="form-control" type="text" name="mensaje" rows="4"></textarea>
                    </div>
                     <!--fecha-->
                     <input type="hidden" name="fecha" value="<?php echo date('Y-m-d')?>">
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type='submit' class='btn btn-success' name="consulta ">Enviar Consulta</button>
                        </div>
                    </div>
                                    
                </form>
            </blockquote>
        </div>
    </div>
</div>
                    