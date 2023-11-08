<?php
# incluir conexion a la base de datos
    include_once("../../database/conexion.php");

#listado de las marcas
    function Obtenerlistado(){
        $ListarMarcas =  $_SERVER['CONEXION'] -> prepare("SELECT * FROM marcas");
        $ListarMarcas->execute();
        $Listadomarcas = $ListarMarcas->fetchAll(PDO::FETCH_ASSOC);
        return($Listadomarcas);
    }

# agregar categoria
   if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "agregar"){
        if (isset($_POST['nombremarca']) && !empty($_POST['nombremarca']) && $_POST['nombremarca'] != "") {
            # Insertar a la base de datos
            $SentenciaAgregarcategoria = $_SERVER['CONEXION']-> prepare("INSERT INTO marcas (mar_id,mar_nombre) VALUES (NULL, :nombremarca)");
            $SentenciaAgregarcategoria->bindParam(":nombremarca",$_POST['nombremarca'],PDO::PARAM_STR);
            $SentenciaAgregarcategoria->execute();
            if(!$SentenciaAgregarcategoria){
                header("location:lista_marcas.php?ms=6");
            }else{
                header("location:lista_marcas.php?ms=1");
            }
        }else{
                header("location:formulario_marcas.php?ms=5");
        }
    }

# Borrar y listar
    if($_GET){
        switch ($_GET) {
            # Borrar
            case isset($_GET['IdB']) :
                # Borrar registro de la base de datos
                $SentenciaBorrarMarca = $_SERVER['CONEXION']->prepare("DELETE FROM marcas WHERE mar_id = :mar_id");
                $SentenciaBorrarMarca->bindParam(":mar_id",$_GET['IdB'],PDO::PARAM_INT);
                $SentenciaBorrarMarca->execute();
                if(!$SentenciaBorrarMarca){
                    echo "6";
                }else{
                    echo "3";
                }
            break;
            # listar
            case isset($_GET['IdE']) :
                # Listar datos de la base de datos
                $SentenciaListarMarca = $_SERVER['CONEXION']->prepare("SELECT * FROM marcas WHERE mar_id = :mar_id");
                $SentenciaListarMarca->bindParam(":mar_id",$_GET['IdE'],PDO::PARAM_INT);
                $SentenciaListarMarca->execute();
                $InformacionMarca = $SentenciaListarMarca->fetch(PDO::FETCH_LAZY);
                $accion = "editar";
            break;
        }
    }

# ejecutar editar
    if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "editar"){
        if (isset($_POST['nombremarca']) && !empty($_POST['nombremarca']) && $_POST['nombremarca'] != "" && isset($_POST['mar_id']) && !empty($_POST['mar_id']) && $_POST['mar_id'] != "") {
            # Actualizar datos de la base de datos
            $sentenciaUpdate = $conexion->prepare("UPDATE marcas SET mar_nombre = :mar_nombre WHERE mar_id = :mar_id");
            $sentenciaUpdate->bindParam(":mar_nombre",$_POST['nombremarca'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":mar_id",$_POST['mar_id'],PDO::PARAM_INT);
            $sentenciaUpdate->execute();
            if(!$sentenciaUpdate){
                header("location:lista_marcas.php?ms=6");
            }else{
                header("location:lista_marcas.php?ms=2");
            }
        }else{
            header("location:formulario_marcas.php?ms=5&IdE=".$_POST['mar_id']);
        }
    }