<!-- FORMULARIO CATEGORIAS -->
<?php
    $url_base = "http://localhost/punto_venta/";
    # incluir header
    include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
    include_once('funciones_categorias.php');
?>
    <div class="container">
        <!-- titulo -->
        <h4 class="pt-3"><a href="lista_categorias.php">Listado de Categorías</a> /Agregar Categorías</h4>

        <!-- Formulario de registro -->
        <div class="card">
            <form method="post" id="formSubmit" enctype="multipart/form-data">

            <!-- campos -->
            <div class="card-body">

            <div class="mb-3">
            <label for="nombredelpuesto" class="form-label">Nombre de la categoría</label>
            <input type="text"
            class="form-control" name="nombrecategoria" id="nombrecategoria" aria-describedby="helpId" placeholder="Nombre de la categoría">
            <input type="hidden" name="agregar" id="agregar" value="agregar">
            </div>

            </div>

            <!-- botones -->
            <div class="card-footer text-muted">

            <button onclick="GuardarCategoria()" type="button" class="btn btn-success"><i class="bi bi-plus"></i> Agregar Registro</button>
            <button type="button" onclick="Cancelar('categorias');" class="btn btn-danger"><i class="bi bi-backspace"></i> Cancelar</button>

            </div>

            </form>
        </div>
    </div>
<?php
 #incluir footer
 include_once('../../modules/templates/footer.php');
?>