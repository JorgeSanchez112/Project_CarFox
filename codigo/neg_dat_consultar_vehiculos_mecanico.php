<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informe_vehiculos</title>
    <link rel="stylesheet" href="css/Style_consultas.css">
</head>
<body>
<?php include('header_mecanico.php');?>
    <main class="container-table">
    
    <?php class Vehiculos
    {

        public function consultar ()
        {
        include ("conexion.php");
        echo "<table class='table'>";

        $sql = "SELECT * FROM vehiculos";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        echo "<caption>Vehiculos</caption>";
        echo "<tbody>";
            echo "<tr class='table-header'>";
                echo "<th>Placa</th>";
                echo "<th>Marca</th>";
                echo "<th>Modelo</th>";
                echo "<th>Tipo</th>";
                echo "<th>Mecanico</th>";
                echo "<th>Doc propietario</th>";
                echo "<th>Actualizar</th>";
            echo "</tr>";
        while ($row=$result->fetch_assoc()):
            $id_vehiculo=stripslashes($row["id_vehiculo"]);
            $placa=stripslashes($row["placa"]);
            $marca=stripslashes($row["marca"]);
            $modelo=stripslashes($row["modelo"]);
            $tipo_de_vehiculo=stripslashes($row["tipo_de_vehiculo"]);
            $mecanico=stripslashes($row["mecanico"]);
            $doc_propietario=stripslashes($row["doc_propietario"]);

            echo "<tr>";
                echo "<td data-label='Placa'>$placa</td>";
                echo "<td data-label='Marca'>$marca</td>";
                echo "<td data-label='Modelo'>$modelo</td>";
                echo "<td data-label='Tipo'>$tipo_de_vehiculo</td>";
                echo "<td data-label='Mecanico'>$mecanico</td>";
                echo "<td data-label='Doc propietario'>$doc_propietario</td>";
                echo "<td data-label='Actualizar'>";
                    echo "<form method='POST' action='pres_neg_dat_actualizar_vehiculos_mecanico.php'>";
                    echo "<input type= 'hidden' name='id_vehiculo' Value='$id_vehiculo'>";
                    echo "<button  class='btn_table fa-solid fa-pen-to-square' type='submit' Value='Actualizar'></button>";
                    echo "</form>";
                echo "</td>";
               
            echo "</tr>";
        endwhile;

            echo" </tbody>";
        echo "</table>";

        }
    }

    $nuevo = new Vehiculos();
    $nuevo -> consultar();
        
    ?>      
        <a class="btn_bottom" href="pres_registro_vehiculos_mecanico.php">Nuevo vehiculo</a>
    </main>
</body>
</html>