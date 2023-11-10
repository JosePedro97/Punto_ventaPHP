<?php
# incluir base de datos
    include_once("../../database/conexion.php");

#listar informacion tabla
    function Obtenerlistado(){
        $ListarCategorias =  $_SERVER['CONEXION'] -> prepare("SELECT * FROM categorias");
        $ListarCategorias->execute();
        $Listadocategorias = $ListarCategorias->fetchAll(PDO::FETCH_ASSOC);
        return($Listadocategorias);
    }

# agregar
   if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "agregar"){
        if (isset($_POST['nombrecategoria']) && !empty($_POST['nombrecategoria']) && $_POST['nombrecategoria'] != "") {
            # Insertar a la base de datos
            $SentenciaAgregarcategoria = $_SERVER['CONEXION']-> prepare("INSERT INTO categorias (cat_id,cat_nombre) VALUES (NULL, :nombrecategoria)");
            $SentenciaAgregarcategoria->bindParam(":nombrecategoria",$_POST['nombrecategoria'],PDO::PARAM_STR);
            $SentenciaAgregarcategoria->execute();
            if(!$SentenciaAgregarcategoria){
                header("location:lista_categorias.php?ms=6");
            }else{
                header("location:lista_categorias.php?ms=1");
            }
        }else{
                header("location:formulario_categorias.php?ms=5");
        }
    }

# Borrar y listar para editar
    if($_GET){
        switch ($_GET) {
            # Borrar
            case isset($_GET['IdB']) :
                # Borrar registro de la base de datos
                $SentenciaBorrarCategoria = $_SERVER['CONEXION']->prepare("DELETE FROM categorias WHERE cat_id = :cat_id");
                $SentenciaBorrarCategoria->bindParam(":cat_id",$_GET['IdB'],PDO::PARAM_INT);
                $SentenciaBorrarCategoria->execute();
                if(!$SentenciaBorrarCategoria){
                    echo "6";
                }else{
                    echo "3";
                }
            break;
            # listar
            case isset($_GET['IdE']) :
                # Listar datos de la base de datos
                $SentenciaListarCategoria = $_SERVER['CONEXION']->prepare("SELECT * FROM categorias WHERE cat_id = :cat_id");
                $SentenciaListarCategoria->bindParam(":cat_id",$_GET['IdE'],PDO::PARAM_INT);
                $SentenciaListarCategoria->execute();
                $InformacionCategoria = $SentenciaListarCategoria->fetch(PDO::FETCH_LAZY);
                $accion = "editar";
            break;
        }
    }

# ejecutar editar
    if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "editar"){
        if (isset($_POST['nombrecategoria']) && !empty($_POST['nombrecategoria']) && $_POST['nombrecategoria'] != "" && isset($_POST['cat_id']) && !empty($_POST['cat_id']) && $_POST['cat_id'] != "") {
            # Actualizar datos de la base de datos
            $sentenciaUpdate = $conexion->prepare("UPDATE categorias SET cat_nombre = :cat_nombre WHERE cat_id = :cat_id");
            $sentenciaUpdate->bindParam(":cat_nombre",$_POST['nombrecategoria'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":cat_id",$_POST['cat_id'],PDO::PARAM_INT);
            $sentenciaUpdate->execute();
            if(!$sentenciaUpdate){
                header("location:lista_categorias.php?ms=6");
            }else{
                header("location:lista_categorias.php?ms=2");
            }
        }else{
            header("location:formulario_categorias.php?ms=5&IdE=".$_POST['cat_id']);
        }
    }