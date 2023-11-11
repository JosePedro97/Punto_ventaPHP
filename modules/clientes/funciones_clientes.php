<?php
# incluir base de datos
    include_once("../../database/conexion.php");
    
# listar informacion tabla
    function Obtenerlistado(){
        $ListaClientes =  $_SERVER['CONEXION'] -> prepare("SELECT * FROM cliente");
        $ListaClientes->execute();
        $Listadoclientes = $ListaClientes->fetchAll(PDO::FETCH_ASSOC);
        return($Listadoclientes);
    }

# agregar
   if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "agregar"){
        if ( isset($_POST['nombre']) && !empty($_POST['nombre']) && $_POST['nombre'] != "" 
        &&  isset($_POST['ap_paterno']) && !empty($_POST['ap_paterno']) && $_POST['ap_paterno'] != ""
        &&  isset($_POST['ap_materno']) && !empty($_POST['ap_materno']) && $_POST['ap_materno'] != "") {
            # Insertar a la base de datos
            $SentenciaAgregarCliente = $_SERVER['CONEXION']-> prepare("INSERT INTO cliente (cli_id ,cli_nombre, cli_ap_paterno, cli_ap_materno) VALUES (NULL ,:cli_nombre, :cli_ap_paterno, :cli_ap_materno)");
            $SentenciaAgregarCliente->bindParam(":cli_nombre",$_POST['nombre'],PDO::PARAM_STR);
            $SentenciaAgregarCliente->bindParam(":cli_ap_paterno",$_POST['ap_paterno'],PDO::PARAM_STR);
            $SentenciaAgregarCliente->bindParam(":cli_ap_materno",$_POST['ap_materno'],PDO::PARAM_STR);
            $SentenciaAgregarCliente->execute();
            if(!$SentenciaAgregarCliente){
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

            header("Location:formulario_clientes.php?ms=5&camposRecuperados=".$camposRecuperados);
        }
    }

# Borrar y listar para editar
    if($_GET){
        switch ($_GET) {
            # Borrar
            case isset($_GET['IdB']) :
                # Borrar registro de la base de datos
                $SentenciaBorrarcliente = $_SERVER['CONEXION']->prepare("DELETE FROM cliente WHERE cli_id = :cli_id");
                $SentenciaBorrarcliente->bindParam(":cli_id",$_GET['IdB'],PDO::PARAM_INT);
                $SentenciaBorrarcliente->execute();
                if(!$SentenciaBorrarcliente){
                    echo "6";
                }else{
                    echo "3";
                }
            break;
            # listar
            case isset($_GET['IdE']) :
                # Listar datos de la base de datos
                $SentenciaListarcliente = $_SERVER['CONEXION']->prepare("SELECT * FROM cliente WHERE cli_id = :cli_id");
                $SentenciaListarcliente->bindParam(":cli_id",$_GET['IdE'],PDO::PARAM_INT);
                $SentenciaListarcliente->execute();
                $InformacionCliente = $SentenciaListarcliente->fetch(PDO::FETCH_LAZY);

                $accion = "editar";

            break;
        }
    }

# ejecutar editar
    if($_POST && isset($_POST['accionFORM']) && $_POST['accionFORM'] == "editar"){
        if (isset($_POST['nombre']) && !empty($_POST['nombre']) && $_POST['nombre'] != ""
        && isset($_POST['ap_paterno']) && !empty($_POST['ap_paterno']) && $_POST['ap_paterno'] != "" 
        && isset($_POST['ap_materno']) && !empty($_POST['ap_materno']) && $_POST['ap_materno'] != ""
        && isset($_POST['cli_id']) && !empty($_POST['cli_id']) && $_POST['cli_id'] != "") {
            # Actualizar datos de la base de datos
            $sentenciaUpdate = $conexion->prepare("UPDATE cliente SET cli_nombre = :cli_nombre, cli_ap_paterno = :cli_ap_paterno, cli_ap_materno = :cli_ap_materno WHERE cli_id = :cli_id");
            $sentenciaUpdate->bindParam(":cli_nombre",$_POST['nombre'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":cli_ap_paterno",$_POST['ap_paterno'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":cli_ap_materno",$_POST['ap_materno'],PDO::PARAM_STR);
            $sentenciaUpdate->bindParam(":cli_id",$_POST['cli_id'],PDO::PARAM_INT);
            $sentenciaUpdate->execute();
            if(!$sentenciaUpdate){
                header("location:lista_clientes.php?ms=6");
            }else{
                header("location:lista_clientes.php?ms=2");
            }
        }else{
            header("location:formulario_clientes.php?ms=5&IdE=".$_POST['cli_id']);
        }
    }