</div>
</div>
</main>
<footer>
    <!-- CONTENIDO DEL FOOTER -->
</footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="<?php echo $url_base?>libs/bootstrap/js/bootstrap.min.js"></script>

    <!-- popper -->
    <script src="<?php echo $url_base?>/libs/popper.min.js"></script>

    <!-- jquery -->
    <script src="<?php echo $url_base?>libs/jquery/jquery-3.7.0.js"></script>
    <script src="<?php echo $url_base?>libs/jquery/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url_base?>libs/jquery/dataTables.bootstrap5.min.js"></script>

    <!--Sweet Alert-->
    <script src="<?php echo $url_base?>libs/sweetalert2@11.js"></script>

    <!-- custom script -->
    <script src="<?php echo $url_base?>libs/myScripts.js"></script>

    <!-- lanzador de mensajes -->
    <?php if($_GET) { 
        if(isset($_GET['ms'])) {?>
        <script>mensajes(<?php  echo $_GET['ms'];  ?>);</script>
    <?php } } ?>
    
    <!-- lanzador del formato moneda -->
    <?php if(isset($FormatoMoneda) && !empty($FormatoMoneda)){?> 
        <script>FormatoMoneda(<?php echo $FormatoMoneda ?>);</script>
    <?php } ?>

    </body>
    </html>