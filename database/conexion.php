<?php 
    #ARCHIVO PARA REALIZAR UNA CONEXCION CON LA BASE DE DATOS DEL PROYECTO

    //DATOS PARA ACCEDER A LA BASE DE DATOS
    $servidor = "localhost"; #nombre del servidor
    $baseDedatos = "punto_venta"; #nombre de la base de datos
    $usuario = "root"; #nombre del usuario para el gestor
    $contrasenia = ""; #contraseña para acceder a la base de datos

    //INICIAR CONEXION
    try {
        //variable para realizar la conexion por PDO
      $_SERVER['CONEXION'] = $conexion = new PDO("mysql:host=$servidor;dbname=$baseDedatos;",$usuario,$contrasenia);
    } catch (Exception $ex) {
        //IMPRIMIR EXCEPCIONES O ERRORES
        echo $ex -> getMessage();
    }
?>