<!-- FORMULARIO ARTICULOS -->
<?php
    # url_base
    $url_base = "http://localhost/punto_venta/";
    
    # incluir header
    include_once('../../modules/templates/header.php');

    # incluir funciones de esta seccion
    include_once('funciones_articulos.php');

    # recuperar campos del formulario tras campo faltante
    if(isset($_GET['camposRecuperados'])){
        $camposRecuperadosF = "";
        $camposRecuperadosF = urldecode($_GET['camposRecuperados']);
        $camposRecuperadosF = base64_decode($camposRecuperadosF);
        $camposRecuperadosF = unserialize($camposRecuperadosF);

        //establecer valor para que lo mande al formato moneda
        if (isset($camposRecuperadosF['precioarticulo']) && !empty($camposRecuperadosF['precioarticulo'])){ 
            $FormatoMoneda = $camposRecuperadosF['precioarticulo'];
        }
    }
?>
    <div class="container">
        <!-- titulo -->
        <h4 class="pt-3"><a href="lista_articulos.php">Listado de Artículos</a><?php if (isset($accion) && $accion == "editar") { ?>/Editar Artículo<?php }else{?>/Agregar Artículo <?php } ?></h4>

        <!-- Formulario de registro -->
        <div class="card">
            <form method="POST" id="formSubmit">
            <!-- campos -->
            <div class="card-body">
                <div class="mb-3">
                <!-- CATEGORIA -->
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select form-select-sm" name="categoria" id="categoria">
                    <?php
                        if(isset($accion) && $accion == "editar" || isset($camposRecuperadosF) && !empty($camposRecuperadosF['categoria'])){
                            $CatId = 0;
                            if (isset($accion) && $accion == "editar") {
                                $CatId = (int)$InformacionArticulo['cat_id'];
                            } else if (isset($camposRecuperadosF) && !empty($camposRecuperadosF['categoria'])) {
                                $CatId = (int)$camposRecuperadosF['categoria'];
                            }
                            
                            $SentenciaNombreCategoria = $conexion->prepare("SELECT cat_nombre FROM categorias WHERE cat_id = :cat_id");
                            $SentenciaNombreCategoria->bindParam(":cat_id",$CatId,PDO::PARAM_INT);
                            $SentenciaNombreCategoria->execute();
                            $NombreCat = $SentenciaNombreCategoria->fetch(PDO::FETCH_LAZY);
                        }
                        if(isset($accion) && $accion == "editar"){ ?> 

                            <option value="<?php echo $InformacionArticulo['cat_id']; ?>" selected><?php echo $NombreCat['cat_nombre']; ?></option>

                        <?php }else if(isset($camposRecuperadosF) && !empty($camposRecuperadosF['categoria'])){ ?>
                            
                            <option value="<?php echo $camposRecuperadosF['categoria'];?>" selected><?php echo $NombreCat['cat_nombre']; ?></option>

                        <?php }else{ ?>

                            <option selected value = "0">Seleccione una categoría</option>
                            
                        <?php } ?>

                    <?php
                    $SentenciaSelectCategorias = $conexion->prepare("SELECT cat_id, cat_nombre FROM categorias");
                    $SentenciaSelectCategorias->execute();
                    $ListaCategorias = $SentenciaSelectCategorias->fetchAll(PDO::FETCH_ASSOC);
                        foreach($ListaCategorias as $data){
                            
                            if (isset($camposRecuperadosF) && !empty($camposRecuperadosF['categoria'])) {

                               if($data['cat_id'] != trim($camposRecuperadosF['categoria'])){
                                ?>
                                    <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_nombre']; ?></option>
                                <?php
                               }
                            }else if (isset($accion) && $accion == "editar" ){

                                 if($data['cat_id'] != $InformacionArticulo['cat_id']){
                                    ?>  
                                     <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_nombre']; ?></option>
                                    <?php
                                   }
                            }else{
                                ?>
                                    <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_nombre']; ?></option>
                                <?php } ?>    
                    <?php } ?>
                </select>

                <!-- MARCA -->
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select form-select-sm" name="marca" id="marca">
                    <?php
                        if(isset($accion) && $accion == "editar" || isset($camposRecuperadosF) && !empty($camposRecuperadosF['marca'])){
                            $MarId = 0;
                            if (isset($accion) && $accion == "editar") {
                                $MarId = (int)$InformacionArticulo['mar_id'];
                            } else if (isset($camposRecuperadosF) && !empty($camposRecuperadosF['marca'])) {
                                $MarId = (int)$camposRecuperadosF['marca'];
                            }
                            
                            $SentenciaNombreMarca = $conexion->prepare("SELECT mar_nombre FROM marcas WHERE mar_id = :mar_id");
                            $SentenciaNombreMarca->bindParam(":mar_id",$MarId,PDO::PARAM_INT);
                            $SentenciaNombreMarca->execute();
                            $NombreMar = $SentenciaNombreMarca->fetch(PDO::FETCH_LAZY);
                        }
                        if(isset($accion) && $accion == "editar"){ ?> 

                            <option value="<?php echo $InformacionArticulo['mar_id']; ?>" selected><?php echo $NombreMar['mar_nombre']; ?></option>

                        <?php }else if(isset($camposRecuperadosF) && !empty($camposRecuperadosF['marca'])){ ?>
                            
                            <option value="<?php echo $camposRecuperadosF['marca'];?>" selected><?php echo $NombreMar['mar_nombre']; ?></option>

                        <?php }else{ ?>

                            <option selected value = "0">Seleccione una Marca</option>
                            
                        <?php } ?>

                    <?php
                    $SentenciaSelectMarcas = $conexion->prepare("SELECT mar_id, mar_nombre FROM marcas");
                    $SentenciaSelectMarcas->execute();
                    $ListaMarcas = $SentenciaSelectMarcas->fetchAll(PDO::FETCH_ASSOC);
                        foreach($ListaMarcas as $data){
                            
                            if (isset($camposRecuperadosF) && !empty($camposRecuperadosF['marca'])) {

                               if($data['mar_id'] != trim($camposRecuperadosF['marca'])){
                                ?>
                                    <option value="<?php echo $data['mar_id']; ?>"><?php echo $data['mar_nombre']; ?></option>
                                <?php
                               }
                            }else if (isset($accion) && $accion == "editar" ){

                                 if($data['mar_id'] != $InformacionArticulo['mar_id']){
                                    ?>  
                                     <option value="<?php echo $data['mar_id']; ?>"><?php echo $data['mar_nombre']; ?></option>
                                    <?php
                                   }
                            }else{
                                ?>
                                    <option value="<?php echo $data['mar_id']; ?>"><?php echo $data['mar_nombre']; ?></option>
                                <?php } ?>    
                    <?php } ?>
                </select>
                
                <!-- DESCRIPCION -->
                <label for="descripcionarticulo" class="form-label">Descripción Artículo</label>
                <textarea class="form-control" name="descripcionarticulo" id="descripcionarticulo" rows="3" placeholder="Descripción..."><?php if (isset($accion) && $accion == "editar") {
                  echo $InformacionArticulo['art_descripcion']; } else if (isset($camposRecuperadosF) && !empty($camposRecuperadosF['descripcionarticulo'])){ echo $camposRecuperadosF['descripcionarticulo']; }?></textarea>

                <!-- PRECIO -->
                <label for="descripcionarticulo" class="form-label">Precio Artículo</label>
                <input type="number" onkeyup="FormatoMoneda(this.value)"
                class="form-control validarNumeros" name="precioarticulo" id="precioarticulo" aria-describedby="helpId" placeholder="Precio del articulo" <?php if (isset($accion) && $accion == "editar") {
                 ?> value="<?php echo $InformacionArticulo['art_precio']; ?>" <?php }else if(isset($camposRecuperadosF) && !empty($camposRecuperadosF['precioarticulo'])){?> value="<?php echo $camposRecuperadosF['precioarticulo']; ?>" <?php } ?> pattern="[0-9]">
                <br>
                <div class="row">
                    <div class="col-2">
                        <h6>Formato Moneda:</h6>
                    </div>
                    <div class="col-4">
                        <p id="MoneyFormat">
                            $0.00 
                        </p>
                    </div>
                </div>
                <!-- ACCION FORMULARIO -->
                <input type="hidden" name="accionFORM" id="accionFORM" value="<?php if (isset($accion) && $accion == "editar") {
                    echo "editar";
                } else {
                    echo "agregar";
                }
                 ?>">
                </div>
                <!-- ID MARCA(PARA EDITAR) -->
                <?php if (isset($accion) && $accion == "editar") { ?>
                    <input type="hidden" name="art_id" id="art_id" value="<?php echo $InformacionArticulo['art_id']; ?>">
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

            <button type="button" onclick="cancelar('articulos');" class="btn btn-danger"><i class="bi bi-backspace"></i> Cancelar</button>

            </div>

            
        </div>
    </div>
<?php
 #incluir footer
 include_once('../../modules/templates/footer.php');
?>