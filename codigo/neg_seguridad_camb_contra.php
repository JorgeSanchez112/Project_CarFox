<?php
session_start();

if($_SESSION['logueado']!="3" ):
    header("location:neg_salir.php");
endif;

?>