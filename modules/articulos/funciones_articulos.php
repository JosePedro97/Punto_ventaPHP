<?php
# incluir conexion a la base de datos
    include_once("../../database/conexion.php");

#listado de las marcas
    function Obtenerlistado(){
        $ListaArticulos =  $_SERVER['CONEXION'] -> prepare("SELECT * FROM articulos AS art
        LEFT JOIN categorias AS cat ON art.cat_id = cat.cat_id
        LEFT JOIN marcas AS mar ON mar.mar_id = art.mar_id");
        $ListaArticulos->execute();
        $Listadoarticulos = $ListaArticulos->fetchAll(PDO::FETCH_ASSOC);
        return($Listadoarticulos);
    }

# agregar articulo
   if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "agregar"){
        if (  isset($_POST['categoria']) && !empty($_POST['categoria']) && $_POST['categoria'] != "0" 
        &&    isset($_POST['marca']) && !empty($_POST['marca']) && $_POST['marca'] != "0" 
        &&    isset($_POST['descripcionarticulo']) && !empty($_POST['descripcionarticulo']) && $_POST['descripcionarticulo'] != "" 
        &&    isset($_POST['precioarticulo']) && !empty($_POST['precioarticulo']) && $_POST['precioarticulo'] != "") {
            # Insertar a la base de datos
            $SentenciaAgregarArticulo = $_SERVER['CONEXION']-> prepare("INSERT INTO articulos (art_id ,cat_id, mar_id, art_descripcion, art_precio) VALUES (NULL ,:cat_id, :mar_id, :art_descripcion, :art_precio)");
            $SentenciaAgregarArticulo->bindParam(":cat_id",$_POST['categoria'],PDO::PARAM_INT);
            $SentenciaAgregarArticulo->bindParam(":mar_id",$_POST['marca'],PDO::PARAM_INT);
            $SentenciaAgregarArticulo->bindParam(":art_descripcion",$_POST['descripcionarticulo'],PDO::PARAM_STR);
            $SentenciaAgregarArticulo->bindParam(":art_precio",$_POST['precioarticulo'],PDO::PARAM_STR);
            $SentenciaAgregarArticulo->execute();
            if(!$SentenciaAgregarArticulo){
                header("location:lista_articulos.php?ms=6");
            }else{
                header("location:lista_articulos.php?ms=1");
            }
        }else{

            $camposRecuperados = [];
            foreach ($_POST as $key => $value) {
                $camposRecuperados[$key] = $value;
            }
            $camposRecuperados = serialize($camposRecuperados);
            $camposRecuperados = base64_encode($camposRecuperados);
            $camposRecuperados = urlencode($camposRecuperados);

            header("Location:formulario_articulos.php?ms=5&camposRecuperados=".$camposRecuperados);
        }
    }

# Borrar y listar
    if($_GET){
        switch ($_GET) {
            # Borrar
            case isset($_GET['IdB']) :
                # Borrar registro de la base de datos
                $SentenciaBorrararticulo = $_SERVER['CONEXION']->prepare("DELETE FROM articulos WHERE art_id = :art_id");
                $SentenciaBorrararticulo->bindParam(":art_id",$_GET['IdB'],PDO::PARAM_INT);
                $SentenciaBorrararticulo->execute();
                if(!$SentenciaBorrararticulo){
                    echo "6";
                }else{
                    echo "3";
                }
            break;
            # listar
            case isset($_GET['IdE']) :
                # Listar datos de la base de datos
                $SentenciaListarArticulo = $_SERVER['CONEXION']->prepare("SELECT * FROM articulos WHERE art_id = :art_id");
                $SentenciaListarArticulo->bindParam(":art_id",$_GET['IdE'],PDO::PARAM_INT);
                $SentenciaListarArticulo->execute();
                $InformacionArticulo = $SentenciaListarArticulo->fetch(PDO::FETCH_LAZY);
                $accion = "editar";
            break;
        }
    }

# ejecutar editar
    if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "editar"){
        if (  isset($_POST['categoria']) && !empty($_POST['categoria']) && $_POST['categoria'] != "0" 
        &&    isset($_POST['marca']) && !empty($_POST['marca']) && $_POST['marca'] != "0" 
        &&    isset($_POST['descripcionarticulo']) && !empty($_POST['descripcionarticulo']) && $_POST['descripcionarticulo'] != "" 
        &&    isset($_POST['precioarticulo']) && !empty($_POST['precioarticulo']) && $_POST['precioarticulo'] != "") {
            # Actualizar datos de la base de datos
            $sentenciaUpdate = $conexion->prepare("UPDATE articulos SET cat_id=:cat_id, mar_id=:mar_id, art_descripcion=:art_descripcion, art_precio=:art_precio WHERE art_id=:art_id");
            $sentenciaUpdate->bindParam(":cat_id",$_POST['categoria'],PDO::PARAM_INT);
            $sentenciaUpdate->bindParam(":mar_id",$_POST['marca'],PDO::PARAM_INT);
            $sentenciaUpdate->bindParam(":art_descripcion",$_POST['descripcionarticulo'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":art_precio",$_POST['precioarticulo'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":art_id",$_POST['art_id'],PDO::PARAM_INT);
            $sentenciaUpdate->execute();
            if(!$sentenciaUpdate){
                header("location:lista_articulos.php?ms=6");
            }else{
                header("location:lista_articulos.php?ms=2");
            }
        }else{
            header("location:formulario_articulos.php?ms=5&IdE=".$_POST['art_id']);
        }
    }