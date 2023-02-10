<?php
session_start();

if($_SESSION['logueado']!="2" ):
    header("location:neg_salir.php");
endif;

?>