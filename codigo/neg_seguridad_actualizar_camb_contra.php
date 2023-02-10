<?php
session_start();

if($_SESSION['logueado']!="4" ):
    header("location:neg_salir.php");
endif;

?>