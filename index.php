<!-- PAGINA DE INICIO -->
<?php
    $url_base = "http://localhost/punto_venta/";
    
    # incluir header
    include_once('modules/templates/header.php');

    # incluir base de datos
    include_once('database/conexion.php');
?>
<!-- CONTENIDO DE LA PAGINA -->
    <div class="container pb-3">
        <div class="card mt-4">
            <div class="card-header" style="display: flex; justify-content: space-between;">
                <!-- titulo contadores -->
                <h4 class="card-title">Contadores</h4>
                <!-- boton recargar -->
                <a name="" id="" class="btn btn-secondary" href="index.php" role="button"><i class="bi bi-arrow-clockwise"></i> Recargar</a>
            </div>
            <div class="card-body row">
                
                <div class="card text-white bg-primary col-3 Contadorcard">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>

                <div class="card text-white bg-primary col-3 Contadorcard">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>

                <div class="card text-white bg-primary col-3 Contadorcard">
                  <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
<?php
 #incluir footer
 include_once('modules/templates/footer.php');
?>