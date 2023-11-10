<!-- PAGINA DE INICIO -->
<?php
    # incluir header
    include_once('modules/templates/header.php');

    # incluir contadores
    include_once('modules/contadores.php');
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
                
                <div class="card text-white CardContador col-3 mx-1" style="background-color: #5F9EA0;">
                  <div class="card-body row">
                    <div class="col-9">
                      <h2 class="card-title">0</h2>
                      <p class="card-text">Ventas realizadas</p>
                    </div>
                    <div class = "col-3">
                      <h1><i class="bi bi-bag"></i></h1>
                    </div>
                  </div>
                </div>

                <div class="card text-white CardContador col-3 mx-1" style="background-color:#6495ED;">
                  <div class="card-body row">
                    <div class="col-9">
                      <h2 class="card-title"><?php ContarRegistros('cli'); ?></h2>
                      <p class="card-text">Clientes registrados</p>
                    </div>
                    <div class = "col-3">
                      <h1><i class="bi bi-people"></i></h1>
                    </div>
                  </div>
                </div>

                <div class="card text-white CardContador col-3 mx-1" style="background-color:#DAA520;">
                  <div class="card-body row">
                    <div class="col-9">
                      <h2 class="card-title"><?php ContarRegistros('art'); ?></h2>
                      <p class="card-text">Artículos registrados</p>
                    </div>
                    <div class = "col-3">
                      <h1><i class="bi bi-box"></i></h1>
                    </div>
                  </div>
                </div>

            </div>

            <div class="card-body row">

              <div class="card text-white CardContador col-3 mx-1" style="background-color:#20B2AA;">
                  <div class="card-body row">
                    <div class="col-9">
                      <h2 class="card-title"><?php ContarRegistros('cat'); ?></h2>
                      <p class="card-text">Categorías registrados</p>
                    </div>
                    <div class = "col-3">
                      <h1><i class="bi bi-columns-gap"></i></h1>
                    </div>
                  </div>
              </div>

                <div class="card text-white CardContador col-3 mx-1" style="background-color:#F08080;">
                  <div class="card-body row">
                    <div class="col-9">
                      <h2 class="card-title"><?php ContarRegistros('mar'); ?></h2>
                      <p class="card-text">Marcas registrados</p>
                    </div>
                    <div class = "col-3">
                      <h1><i class="bi bi-tag"></i></h1>
                    </div>
                  </div>
                </div>
            </div>
            
        </div>
    </div>
<?php
 #incluir footer
 include_once('modules/templates/footer.php');
?>