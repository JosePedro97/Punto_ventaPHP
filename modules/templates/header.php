<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS Libraries -->
        <!-- Bootstrap CSS v5.2.1 -->
        <link rel="stylesheet" href="<?php echo $url_base ?>libs/bootstrap/css/bootstrap.min.css">

        <!-- Bootstrap Icons -->
        <!-- <link rel="stylesheet" href="<?php echo $url_base ?>libs/bootstrap/css/bootstrap-icons.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- datatable boostrap -->
        <link rel="stylesheet" href="<?php echo $url_base ?>libs/bootstrap/css/dataTables.bootstrap5.min.css">
        
        <!-- custom css -->
        <link rel="stylesheet" href="<?php echo $url_base ?>libs/myCss.css">

        <!-- favico -->
        <link rel="ico" type="image/x-icon" href="<?php echo $url_base ?>resources/imgs/favicon.ico">
    <title>TiendaEsquina</title>
</head>
<body>

    <main class="container-fluid m-0 ps-0">

    <div class="row heightForRowPrincipal">
        <!-- Menu de navegacion -->
        <div class="col-3 pe-0">
            <ul id="navdiv2" class="nav bg-dark flex-column heightForsideNavbar">
                <!-- brand name -->
                <img src="<?php echo $url_base ?>resources/imgs/ico-store.png" alt="tienda-logo" width="20%" class="pt-2 mx-auto">
                <p class="navbar-brand mx-auto textColorForNav" href="#">La Tiendita de la Esquina</p>
                <!-- OPCIONES PARA VENTAS -->
                <p class="mx-auto mb-0 mt-3 textColorForNav">Ventas</p>
                <hr class="m-0 textColorForNav">
                <li class="nav-item MenuTextHover">
                    <a class="nav-link textColorForNav MenuTextHover" href="#"><i class="bi bi-bag-plus"></i> Nueva Venta</a>
                </li>
                <li class="nav-item MenuTextHover">
                    <a class="nav-link textColorForNav MenuTextHover" href="#"><i class="bi bi-list-task"></i> Listado de ventas</a>
                </li>
                <!-- OPCIONES PARA ARTICULOS -->
                <p class="mx-auto mb-0 mt-3 textColorForNav"> Articulos</p>
                <hr class="m-0 textColorForNav">
                <li class="nav-item MenuTextHover">
                    <a class="nav-link textColorForNav MenuTextHover" href="#"><i class="bi bi-box"></i> Articulos</a>
                </li>
                <li class="nav-item MenuTextHover">
                    <a class="nav-link textColorForNav MenuTextHover" href="<?php echo $url_base ?>modules/marcas/lista_marcas.php"><i class="bi bi-tag"></i> Marcas</a>
                </li>
                <li class="nav-item MenuTextHover">
                    <a class="nav-link textColorForNav MenuTextHover" href="<?php echo $url_base ?>modules/categorias/lista_categorias.php"><i class="bi bi-columns-gap"></i> Categorias</a>
                </li>
                <!-- opciones del usuario -->
                <hr class="m-0 textColorForNav">
            </ul>
        </div>
        
        <!-- inicio de contenido -->
        <div class="col-9 p-0">
              <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navJustify">
            <!-- reloj -->
            <h5 id="relojnumerico" class="textColorForNav pe-5" onload="cargarReloj()"></h5>
        </nav>