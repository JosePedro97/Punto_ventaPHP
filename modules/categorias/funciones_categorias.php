<?php
include("../../database/conexion.php");

#listado de las categortias
    function Obtenerlistado(){
        $ListarCategorias =  $_SERVER['CONEXION'] -> prepare("SELECT * FROM categorias");
        $ListarCategorias->execute();
        $Listadocategorias = $ListarCategorias->fetchAll(PDO::FETCH_ASSOC);
        return($Listadocategorias);
    }

# agregar categoria
   if($_POST && isset($_POST['agregar'])){
        if (isset($_POST['nombrecategoria'])) {
            # Variables
            $nombrecategoria = "";
            $nombrecategoria = $_POST['nombrecategoria'];
    
            # Insertar a la base de datos
            $SentenciaAgregarPuesto = $_SERVER['CONEXION']-> prepare("INSERT INTO categorias (cat_id,cat_nombre) VALUES (NULL, :nombrecategoria)");
            $SentenciaAgregarPuesto->bindParam(":nombrecategoria",$nombrecategoria,PDO::PARAM_STR);
            $SentenciaAgregarPuesto->execute();
    
            # Redireccionar
            header("Location:lista_categorias.php");

        }
    }

# Borrar Categoria
    if($_GET){
        #Variables
        $IdBorrarcategoria = "";
        $IdBorrarcategoria = $_GET['IdB'];

        # Borrar registro de la base de datos
        $SentenciaBorrarCategoria = $_SERVER['CONEXION']->prepare("DELETE FROM categorias WHERE cat_id = :id");
        $SentenciaBorrarCategoria->bindParam(":id",$IdBorrarcategoria,PDO::PARAM_INT);
        $SentenciaBorrarCategoria->execute();
        return($SentenciaBorrarCategoria);
    }