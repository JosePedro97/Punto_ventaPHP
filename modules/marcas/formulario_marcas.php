<!-- FORMULARIO MARCAS -->
<?php
    # url_base
    $url_base = "http://localhost/punto_venta/";
    
    # incluir header
    include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
    include_once('funciones_marcas.php');
?>
    <div class="container">
        <!-- titulo -->
        <h4 class="pt-3"><a href="lista_marcas.php">Listado de Marcas</a><?php if (isset($accion) && $accion == "editar") { ?>/Editar Marca<?php }else{?>/Agregar Marca <?php } ?></h4>

        <!-- Formulario de registro -->
        <div class="card">
            <form method="POST" id="formSubmit">
            <!-- campos -->
            <div class="card-body">
                <div class="mb-3">
                <label for="nombremarca" class="form-label">Nombre de la marca</label>
                <input type="text"
                class="form-control" name="nombremarca" id="nombremarca" aria-describedby="helpId" placeholder="Nombre de la marca" <?php if (isset($accion) && $accion == "editar") {
                 ?> value="<?php echo $InformacionMarca['mar_nombre']; ?>" <?php }?>>
                <input type="hidden" name="accionFORM" id="accionFORM" value="<?php if (isset($accion) && $accion == "editar") {
                    echo "editar";
                } else {
                    echo "agregar";
                }
                 ?>">
                </div>
                <?php if (isset($accion) && $accion == "editar") { ?>
                    <input type="hidden" name="mar_id" id="mar_id" value="<?php echo $InformacionMarca['mar_id']; ?>">
                <?php } ?>
            </div>
            </form>

            <!-- botones -->
            <div class="card-footer text-muted">
            <?php if (isset($accion) && $accion == "editar") { ?>
                <button type="button" onclick="PreguntaClick('Editar');" class="btn btn-info"><i class="bi bi-pencil-fill"></i> Editar Registro</button>
            <?php  }else{ ?>
                <button type="button" onclick="PreguntaClick('Agregar');" class="btn btn-success"><i class="bi bi-plus"></i> Agregar Registro</button>
            <?php } ?>

            <button type="button" onclick="cancelar('marcas');" class="btn btn-danger"><i class="bi bi-backspace"></i> Cancelar</button>

            </div>

            
        </div>
    </div>
<?php
 #incluir footer
 include_once('../../modules/templates/footer.php');
?>