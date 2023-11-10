<!-- LISTADO DE ARTICULOS -->
<?php 
    # incluir header
        include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
        include_once('funciones_articulos.php');
?>
        
<!-- CONTENIDO DE LA PAGINA -->
<div class="container pb-3">
    <!-- titulo -->
    <h4 class="pt-3">Listado de Artículos</h4>

    <!-- CONTENIDO -->
    <div class="card">

        <!-- boton para agregar nuevo registro -->
        <div class="card-header">
                <!-- boton agregar -->
                <a name="" id="" class="btn btn-success" href="formulario_articulos.php" role="button"><i class="bi bi-plus"></i> Agregar Registro</a>
                <!-- boton recargar -->
                <a name="" id="" class="btn btn-secondary" href="lista_articulos.php" role="button"><i class="bi bi-arrow-clockwise"></i> Recargar</a>
        </div>

        <!-- tabla de los registros -->
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table" id="myinfotable">
                    <thead>
                        <!-- encabezados -->
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
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
                                <td scope="row"><?php echo $data['art_id'] ?></td>
                                <td scope="row"><?php echo $data['cat_nombre'] ?></td>
                                <td scope="row"><?php echo $data['mar_nombre'] ?></td>
                                <td scope="row"><?php echo $data['art_descripcion'] ?></td>
                                <td scope="row"><?php echo "$".number_format($data['art_precio'], 2) ?></td>
                                
                                <!-- BOTONES DE ACCIONES -->
                                <td scope="row">
                                    <!-- Editar -->
                                    <a  class="btn btn-info" href="formulario_articulos.php?IdE=<?php echo $data['art_id']; ?>" role="button"><i class="bi bi-pencil-fill"></i> Editar</a>
                                    <!-- Borrar -->
                                    <a  class="btn btn-danger" href="javascript:borrar(<?php echo $data['art_id']; ?>,'articulos');" role="button"><i class="bi bi-x"></i> Borrar</a>
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