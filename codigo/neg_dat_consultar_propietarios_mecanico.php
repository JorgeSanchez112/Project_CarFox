<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informe_propietarios</title>
    <link rel="stylesheet" href="css/Style_consultas.css">
</head>
<body>
<?php include('header_mecanico.php');?>
    <main class="container-table">
    
    <?php class Propietarios
    {

        public function consultar ()
        {
        include ("conexion.php");
        echo "<table class='table'>";

        $sql = "SELECT * FROM propietarios";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        echo "<caption>Propietarios</caption>";
        echo "<tbody>";
            echo "<tr class='table-header'>";
                echo "<th>Doc propietario</th>";
                echo "<th>Nombres</th>";
                echo "<th>Apellidos</th>";
                echo "<th>Actualizar</th>";
                
            echo "</tr>";
        while ($row=$result->fetch_assoc()):
            $id_propietario=stripslashes($row["id_propietario"]);
            $doc_propietario=stripslashes($row["doc_propietario"]);
            $nombres=stripslashes($row["nombres"]);
            $apellidos=stripslashes($row["apellidos"]);

            echo "<tr>";
                echo "<td data-label='Doc propietario'>$doc_propietario</td>";
                echo "<td data-label='Nombres'>$nombres</td>";
                echo "<td data-label='Apellidos'>$apellidos</td>";
                echo "<td data-label='Actualizar'>";
                    echo "<form method='POST' action='pres_neg_dat_actualizar_propietarios_mecanico.php'>";
                    echo "<input type= 'hidden' name = 'id_propietario' Value='$id_propietario'>";
                    echo "<button  class='btn_table fa-solid fa-pen-to-square' type='submit' Value='Actualizar'></button>";
                    echo "</form>";
              
            echo "</tr>";
        endwhile;

            echo" </tbody>";
        echo "</table>";

        }
    }

    $nuevo = new Propietarios();
    $nuevo -> consultar();
        
    ?>      
        <a class="btn_bottom" href="pres_registro_propietarios_mecanico.php">Nuevo propietario</a>
    </main>
</body>
</html>