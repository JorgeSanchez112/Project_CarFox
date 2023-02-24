<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informe_repuestos</title>
    <link rel="stylesheet" href="css/Style_consultas.css">
</head>
<body>
<?php include('header_mecanico.php');?>
    <main class="container-table">
    
    <?php class Repuestos
    {

        public function consultar ()
        {
        include ("conexion.php");
        echo "<table class='table'>";

        $sql = "SELECT * FROM repuestos";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        echo "<caption>Repuestos</caption>";
        echo "<tbody>";
            echo "<tr class='table-header'>";
                echo "<th>Repuesto</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Codigo repuesto</th>";
                echo "<th>Entrada</th>";
                echo "<th>Salida</th>";
                echo "<th>Restante</th>";
                echo "<th>Actualizar</th>";
                echo "</tr>";
        while ($row=$result->fetch_assoc()):
            $id_repuesto=stripslashes($row["id_repuesto"]);
            $repuesto=stripslashes($row["repuesto"]);
            $descripcion=stripslashes($row["descripcion"]);
            $cod_repuesto=stripslashes($row["cod_repuesto"]);
            $entrada=stripslashes($row["entrada"]);
            $salida=stripslashes($row["salida"]);

            $restante = $entrada - $salida;

            echo "<tr>";
                echo "<td data-label='Repuesto'>$repuesto</td>";
                echo "<td data-label='Descripcion'>$descripcion</td>";
                echo "<td data-label='Codigo repuesto'>$cod_repuesto</td>";
                echo "<td data-label='Entrada'>$entrada</td>";
                echo "<td data-label='Salida'>$salida</td>";
                echo "<td data-label='restante'>$restante</td>";
                echo "<td data-label='Actualizar'>";
                    echo "<form method='POST' action='pres_neg_dat_actualizar_repuestos_mecanico.php'>";
                    echo "<input type= 'hidden' name = 'id_repuesto' Value='$id_repuesto'>";
                    echo "<button  class='btn_table fa-solid fa-pen-to-square' type='submit' Value='Actualizar'></button>";
                    echo "</form>";
            
            echo "</tr>";
        endwhile;

            echo" </tbody>";
        echo "</table>";

        }
    }

    $nuevo = new Repuestos();
    $nuevo -> consultar();
        
    ?>      
        <a class="btn_bottom" href="pres_registro_repuestos_mecanico.php">Nuevo Repuesto</a>
    </main>
</body>
</html>