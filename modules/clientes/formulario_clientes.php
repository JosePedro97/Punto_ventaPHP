<!-- FORMULARIO ARTICULOS -->
<?php
    # incluir header
        include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
        include_once('funciones_clientes.php');

    # recuperar campos del formulario tras campo faltante
        if(isset($_GET['camposRecuperados'])){
            $camposRecuperadosF = "";
            $camposRecuperadosF = urldecode($_GET['camposRecuperados']);
            $camposRecuperadosF = base64_decode($camposRecuperadosF);
            $camposRecuperadosF = unserialize($camposRecuperadosF);
        }
?>
    <div class="container">
        <!-- titulo -->
        <h4 class="pt-3"><a href="lista_clientes.php">Listado de Clientes</a><?php if (isset($accion) && $accion == "editar") { ?>/Editar Cliente<?php }else{?>/Agregar Cliente<?php } ?></h4>

        <!-- Formulario de registro -->
        <div class="card">
            <form method="POST" id="formSubmit">
                <!-- campos -->
                <div class="card-body">
                    <div class="mb-3">

                        <!-- NOMBRE(S) -->
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre(s)" <?php if (isset($accion) && $accion == "editar") { ?> value="<?php echo $InformacionCliente['cli_nombre']; ?>" <?php } else if(isset($camposRecuperadosF) && !empty($camposRecuperadosF['cli_nombre'])){ ?> value="<?php echo $camposRecuperadosF['cli_nombre']; ?>" <?php } ?>>

                        <!-- APELLIDO PATERNO -->
                        <label for="ap_paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="ap_paterno" id="ap_paterno" aria-describedby="helpId" placeholder="Apellido Paterno" <?php if (isset($accion) && $accion == "editar") { ?> value="<?php echo $InformacionCliente['cli_ap_paterno']; ?>" <?php } else if(isset($camposRecuperadosF) && !empty($camposRecuperadosF['cli_ap_paterno'])){ ?> value="<?php echo $camposRecuperadosF['cli_ap_paterno']; ?>" <?php } ?>>

                        <!-- APELLIDO MATERNO -->
                        <label for="ap_materno" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="ap_materno" id="ap_materno" aria-describedby="helpId" placeholder="Apellido Materno" <?php if (isset($accion) && $accion == "editar") { ?> value="<?php echo $InformacionCliente['cli_ap_materno']; ?>" <?php } else if(isset($camposRecuperadosF) && !empty($camposRecuperadosF['cli_ap_materno'])){ ?> value="<?php echo $camposRecuperadosF['cli_ap_materno']; ?>" <?php } ?>>
                        

                        <!-- ACCION FORMULARIO -->
                        <input type="hidden" name="accionFORM" id="accionFORM" value="<?php if (isset($accion) && $accion == "editar") {
                            echo "editar";
                        } else {
                            echo "agregar";
                        }
                        ?>">
                        
                        <!-- ID CLIENTE(PARA EDITAR) -->
                        <?php if (isset($accion) && $accion == "editar") { ?>
                            <input type="hidden" name="cli_id" id="cli_id" value="<?php echo $InformacionCliente['cli_id']; ?>">
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
                <button type="button" onclick="cancelar('clientes');" class="btn btn-danger"><i class="bi bi-backspace"></i> Cancelar</button>
            </div>
        </div>
    </div>
<?php
 #incluir footer
    include_once('../../modules/templates/footer.php');
?>