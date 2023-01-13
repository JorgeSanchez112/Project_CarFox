<?php
$db = new mysqli('localhost','root','','carfox');
$acentos = $db->query("SET NAMES 'utf8'");

if($db->connect_error > 0):
    die('Error de conexion [' . $db->connect_error.']');
endif;

?>