<?php
session_start();

if($_SESSION['logueado']!="1" ):
    header("location:neg_salir.php");
endif;

?>