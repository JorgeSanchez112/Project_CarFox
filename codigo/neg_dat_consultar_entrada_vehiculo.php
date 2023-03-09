<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informe_observaciones</title>
    <link rel="stylesheet" href="css/Style_consultas.css">
</head>
<body>
<?php include('header_administrador.php');?>
    <main class="container-table">
    
    <?php class Entrada_vehiculo
    {
 
        public function consultar ()
        {
        include ("conexion.php");
        echo "<table class='table'>";

        $sql = "SELECT * FROM entrada_vehiculo";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        echo "<caption>Entrada de vehiculos</caption>";
        echo "<tbody>";
            echo "<tr class='table-header'>";
                echo "<th>Placa</th>";
                echo "<th>Estado</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Fecha entrada</th>";
                echo "<th>Imagenes</th>";
                echo "<th>Actualizar</th>";
                echo "<th>Eliminar</th>";
            echo "</tr>";
        while ($row=$result->fetch_assoc()):
            $id_entradad=stripslashes($row["id_entrada"]);
            $estadod=stripslashes($row["estado"]);
            $descripcion_entradad=stripslashes($row["descripcion_entrada"]);
            $fecha_entradad=stripslashes($row["fecha_entrada"]);
            $nombreimagenentradad=stripslashes($row["imagenes_entrada"]);
            $placa=stripslashes($row["fk_vehiculo"]);
            $imagenreporteentradad=stripslashes($row["nombre_img_entrada"]);

            include ("destinobitacoras.php");
		    $imagen=$destino."/".$nombreimagenentradad;

            echo "<tr>";
                
                echo "<td data-label='Placa'>$placa</td>";
                echo "<td data-label='Estado'>$estadod</td>";
                echo "<td data-label='Descripcion'>$descripcion_entradad</td>";
                echo "<td data-label='Fecha Entrada'>$fecha_entradad</td>";
                echo "<td data-label='Imagenes'>";
                    echo "<figure>";
                        echo "<img src=$imagen alt='imagen'>";
                    echo "</figure>";
                echo "</td>";
                echo "<td data-label='Actualizar'>";
                    echo "<form name='shdhd' method='POST' action='pres_neg_dat_actualizar_entrada_vehiculo.php'>";
                    echo "<input type= 'hidden' name ='id_entrada' Value='$id_entradad'>";
                    echo "<button  class='btn_table fa-solid fa-pen-to-square' type='submit' Value='Actualizar'></button>";
                    echo "</form>";
                echo "</td>";
                echo "<td data-label='Eliminar'>";
                    echo "<form name='shdhd' method='POST' action='neg_dat_eliminar_entrada_vehiculo.php'>";
                    echo "<input type= 'hidden' class='barra' name = 'id_entrada' Value='$id_entradad'>";
                    echo "<button  class='btn_table fa-solid fa-trash' type='submit' Value='Eliminar'></button>";
                    echo "</form>";
                echo "</td>";
            echo "</tr>";
        endwhile;

            echo" </tbody>";
        echo "</table>";

        }
    }

    $nuevo = new Entrada_vehiculo();
    $nuevo -> consultar();
        
    ?>      
        <a class="btn_bottom" href="pres_registro_entrada_vehiculo.php">Nueva entrada de vehiculo</a>
    </main>
</body>
</html>