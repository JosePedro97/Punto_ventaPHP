<!-- FORMULARIO CATEGORIAS -->
<?php
    # incluir header
        include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
        include_once('funciones_categorias.php');
?>
    <div class="container">
        <!-- titulo -->
        <h4 class="pt-3"><a href="lista_categorias.php">Listado de Categorías</a><?php if (isset($accion) && $accion == "editar") { ?>/Editar Categoría<?php }else{?>/Agregar Categoría <?php } ?></h4>

        <!-- Formulario de registro -->
        <div class="card">
            <form method="POST" id="formSubmit">
                <!-- campos -->
                <div class="card-body">
                    <div class="mb-3">

                        <!-- CATEGORIA -->
                        <label for="nombrecategoria" class="form-label">Nombre de la categoría</label>
                        <input type="text"
                        class="form-control" name="nombrecategoria" id="nombrecategoria" aria-describedby="helpId" placeholder="Nombre de la categoría" <?php if (isset($accion) && $accion == "editar") {
                        ?> value="<?php echo $InformacionCategoria['cat_nombre']; ?>" <?php }?>>

                        <!-- ACCION -->
                        <input type="hidden" name="accionFORM" id="accionFORM" value="<?php if (isset($accion) && $accion == "editar") {
                            echo "editar";
                        } else {
                            echo "agregar";
                        }
                        ?>">

                        <!-- INPUT ID PARA EDITAR -->
                        <?php if (isset($accion) && $accion == "editar") { ?>
                            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $InformacionCategoria['cat_id']; ?>">
                        <?php } ?>

                    </div>
                </div>
            </form>

            <!-- botones -->
            <div class="card-footer text-muted">
                <!-- boton editar / agregar -->
                <?php if (isset($accion) && $accion == "editar") { ?>
                    <button type="button" onclick="PreguntaClick('Editar');" class="btn btn-info"><i class="bi bi-pencil-fill"></i> Editar Registro</button>
                <?php  }else{ ?>
                    <button type="button" onclick="PreguntaClick('Agregar');" class="btn btn-success"><i class="bi bi-plus"></i> Agregar Registro</button>
                <?php } ?>
                <!-- boton cancelar -->
                <button type="button" onclick="cancelar('categorias');" class="btn btn-danger"><i class="bi bi-backspace"></i> Cancelar</button>
            </div>
        </div>
    </div>
<?php
 #incluir footer
    include_once('../../modules/templates/footer.php');
?>