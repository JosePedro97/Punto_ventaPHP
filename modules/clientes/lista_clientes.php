<!-- LISTADO DE CLIENTES -->
<?php 
    # incluir header
        include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
        include_once('funciones_clientes.php');
?>
        
<!-- CONTENIDO DE LA PAGINA -->
<div class="container pb-3">
    <!-- titulo -->
    <h4 class="pt-3">Listado de Clientes</h4>

    <!-- CONTENIDO -->
    <div class="card">

        <!-- boton para agregar nuevo registro -->
        <div class="card-header">
                <!-- boton agregar -->
                <a name="" id="" class="btn btn-success" href="formulario_clientes.php" role="button"><i class="bi bi-plus"></i> Agregar Registro</a>
                <!-- boton recargar -->
                <a name="" id="" class="btn btn-secondary" href="lista_clientes.php" role="button"><i class="bi bi-arrow-clockwise"></i> Recargar</a>
        </div>

        <!-- tabla de los registros -->
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table" id="myinfotable">
                    <thead>
                        <!-- encabezados -->
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ciclo para mostrar el contenido -->
                        <?php
                        $Listadoclientes = Obtenerlistado();
                        foreach($Listadoclientes as $data){
                        ?>
                            <tr class="">
                                <td scope="row"><?php echo $data['cli_id'] ?></td>
                                <td scope="row"><?php echo $data['cli_nombre'] ?></td>
                                <td scope="row"><?php echo $data['cli_ap_paterno'] ?></td>
                                <td scope="row"><?php echo $data['cli_ap_materno'] ?></td>
                                
                                <!-- BOTONES DE ACCIONES -->
                                <td scope="row">
                                    <!-- Editar -->
                                    <a  class="btn btn-info" href="formulario_clientes.php?IdE=<?php echo $data['cli_id']; ?>" role="button"><i class="bi bi-pencil-fill"></i> Editar</a>
                                    <!-- Borrar -->
                                    <a  class="btn btn-danger" href="javascript:borrar(<?php echo $data['cli_id']; ?>,'clientes');" role="button"><i class="bi bi-x"></i> Borrar</a>
                                </td>
                            </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    
</div>
<?php
 #incluir footer
    include_once('../../modules/templates/footer.php');
?>