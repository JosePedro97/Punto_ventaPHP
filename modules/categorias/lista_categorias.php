<!-- LISTADO DE CATEGORIAS -->
<?php 
    # incluir header
        include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
        include_once('funciones_categorias.php');
    ?>
        
<!-- CONTENIDO DE LA PAGINA -->
<div class="container pb-3">
    <!-- titulo -->
    <h4 class="pt-3">Listado de Categorías</h4>

    <!-- tabla -->
    <div class="card">

        <!-- boton para agregar nuevo registro -->
        <div class="card-header">
            <!-- boton agregar -->
            <a name="" id="" class="btn btn-success" href="formulario_categorias.php" role="button"><i class="bi bi-plus"></i> Agregar Registro</a>
            <!-- boton recargar -->
            <a name="" id="" class="btn btn-secondary" href="lista_categorias.php" role="button"><i class="bi bi-arrow-clockwise"></i> Recargar</a>
        </div>

        <!-- tabla de los registros -->
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table" id="myinfotable">
                    <thead>
                        <!-- encabezados -->
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre categoría</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ciclo para mostrar el contenido -->
                        <?php
                        $Listadocategorias = Obtenerlistado();
                        foreach($Listadocategorias as $data){
                        ?>
                            <tr class="">
                                <td scope="row"><?php echo $data['cat_id'] ?></td>
                                <td scope="row"><?php echo $data['cat_nombre'] ?></td>
                                
                                <!-- BOTONES DE ACCIONES -->
                                <td scope="row">
                                    <!-- editar -->
                                    <a  class="btn btn-info" href="formulario_categorias.php?IdE=<?php echo $data['cat_id']; ?>" role="button"><i class="bi bi-pencil-fill"></i> Editar</a>
                                    <!-- borrar -->
                                    <a  class="btn btn-danger" href="javascript:borrar(<?php echo $data['cat_id']; ?>,'categorias');" role="button"><i class="bi bi-x"></i> Borrar</a>
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