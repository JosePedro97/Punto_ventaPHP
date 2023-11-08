<!-- LISTADO DE MARCAS -->
<?php 
    $url_base = "http://localhost/punto_venta/";
    # incluir header
    include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
    include_once('funciones_marcas.php');
    ?>
        
<!-- CONTENIDO DE LA PAGINA -->
    <div class="container pb-3">
        <!-- titulo -->
        <h4 class="pt-3">Listado de Marcas</h4>

              <!-- tabla -->
    <div class="card">

<!-- boton para agregar nuevo registro -->
<div class="card-header">
        <a name="" id="" class="btn btn-success" href="formulario_marcas.php" role="button"><i class="bi bi-plus"></i> Agregar Registro</a>
        <a name="" id="" class="btn btn-secondary" href="lista_marcas.php" role="button"><i class="bi bi-arrow-clockwise"></i> Recargar</a>
</div>

<!-- tabla de los registros -->
<div class="card-body">
    <div class="table-responsive-sm">
        <table class="table" id="myinfotable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Marca</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Listadomarcas = Obtenerlistado();
                foreach($Listadomarcas as $data){
                ?>
                    <tr class="">
                        <td scope="row"><?php echo $data['mar_id'] ?></td>
                        <td scope="row"><?php echo $data['mar_nombre'] ?></td>
                        
                        <!-- BOTONES DE ACCIONES -->
                        <td scope="row">
                            <a  class="btn btn-info" href="formulario_marcas.php?IdE=<?php echo $data['mar_id']; ?>" role="button"><i class="bi bi-pencil-fill"></i> Editar</a>
                            <a  class="btn btn-danger" href="javascript:borrar(<?php echo $data['mar_id']; ?>,'marcas');" role="button"><i class="bi bi-x"></i> Borrar</a>
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