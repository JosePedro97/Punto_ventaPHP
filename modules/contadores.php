<?php
# incluir conexcion de la base de datos
   include_once("database/conexion.php");
#  Funcion para contadores
    function ContarRegistros($indicador){

        $NameTable = "";

        switch ($indicador) {
            case 'cli':
               $NameTable = "cliente";
            break;
            
            case 'ven':
               $NameTable = "";
            break;

            case 'mar':
               $NameTable = "marcas";
            break;

            case 'cat':
               $NameTable = "categorias";
            break;

            case 'art':
               $NameTable = "articulos";
            break;
        }

        $sql = "SELECT COUNT(*) as contar FROM ".$NameTable;
        $ObtenerNumeroRegistros = $_SERVER['CONEXION'] -> prepare($sql);
        $ObtenerNumeroRegistros->execute();
        $Contador = $ObtenerNumeroRegistros->fetch(PDO::FETCH_LAZY);
        
        echo $Contador['contar']; 
    }    

?>