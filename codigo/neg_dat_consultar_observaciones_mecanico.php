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
<?php include('header_mecanico.php');?>
    <main class="container-table">
    
    <?php class Observaciones
    {

        public function consultar ()
        {
        include ("conexion.php");
        echo "<table class='table'>";

        $sql = "SELECT * FROM observaciones WHERE documento='$_SESSION[usuario_actual]'";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        echo "<caption>Observaciones</caption>";
        echo "<tbody>";
            echo "<tr class='table-header'>";
                echo "<th>Placa</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Cod repuesto</th>";
                echo "<th>Mecanico</th>";
                echo "<th>Fecha entrada</th>";
                echo "<th>Fecha salida</th>";
                echo "<th>Imagenes</th>";
                echo "<th>Generar salida</th>";
                echo "<th>Generar reporte</th>";
                echo "<th>Actualizar</th>";
            echo "</tr>";
        while ($row=$result->fetch_assoc()):
            $id_observaciones=stripslashes($row["id_observaciones"]);
            $placa=stripslashes($row["fk_placa"]);
            $descripcion_reparacion=stripslashes($row["descripcion_reparacion"]);
            $cod_repuesto=stripslashes($row["cod_repuesto"]);
            $documento=stripslashes($row["documento"]);
            $fecha_entrada=stripslashes($row["fecha_entrada"]);
            $fecha_salida=stripslashes($row["fecha_salida"]);
            $nombreimagen=stripslashes($row["imagenes"]);
            $reported=stripslashes($row["reporte"]);
            $imagenreporte=stripslashes($row["nombre_img"]);

            include ("destinobitacoras.php");
		    $imagen=$destino."/".$nombreimagen;

            echo "<tr>";
                
                echo "<td data-label='Placa'>$placa</td>";
                echo "<td data-label='Descripcion'>$descripcion_reparacion</td>";
                echo "<td data-label='Cod repuesto'>$cod_repuesto</td>";
                echo "<td data-label='Mecanico'>$documento</td>";
                echo "<td data-label='Fecha entrada'>$fecha_entrada</td>";
                echo "<td data-label='Fecha salida'>$fecha_salida</td>";
                echo "<td data-label='Imagenes'>";
                    echo "<figure>";
                        echo "<img src=$imagen alt='imagen'>";
                    echo "</figure>";
                echo "</td>";
                if($reported == 0){
                    echo "<td data-label='Generar salida'>";
                        echo "<form name='shdhd' method='POST' action='neg_dat_registro_salida_observaciones_mecanico.php'>";
                        echo "<input type= 'hidden' class='barra' name = 'id_observaciones' Value='$id_observaciones'>";
                        echo "<button  class='btn_table fa-solid fa-right-to-bracket' id='salida' type='submit' Value='Salida' enabled></button>";
                        echo "</form>";
                    echo" </td>";
                    echo "<td data-label='Generar reporte'>";
                        echo "<form name='shdhd' method='POST' action='index1.php'>";
                        echo "<input type= 'hidden' class='barra' name = 'id_observaciones' Value='$id_observaciones'>";
                        echo "<button class='btn_table fa-solid fa-file' id='reporte' type='submit' Value='Reporte' disabled></button>";
                        echo "</form>";
                    echo" </td>";

                }elseif($reported == 1){
                    echo "<td data-label='Generar salida'>";
                        echo "<form name='shdhd' method='POST' action='neg_dat_registro_salida_observaciones_mecanico.php'>";
                        echo "<input type= 'hidden' class='barra' name = 'id_observaciones' Value='$id_observaciones'>";
                        echo "<button  class='btn_table fa-solid fa-right-to-bracket' id='salida' type='submit' Value='Salida' disabled></button>";
                        echo "</form>";
                    echo" </td>";
                    echo "<td data-label='Generar reporte'>";
                        echo "<form name='shdhd' method='POST' action='index1.php'>";
                        echo "<input type= 'hidden' class='barra' name = 'id_observaciones' Value='$id_observaciones'>";
                        echo "<input type= 'hidden' class='barra' name = 'placa' Value='$placa'>";
                        echo "<input type= 'hidden' class='barra' name = 'imagenreporte' Value='$imagenreporte'>";
                        echo "<button class='btn_table fa-solid fa-file' id='reporte' type='submit' Value='Reporte' enabled></button>";
                        echo "</form>";
                    echo" </td>";
                }
                echo "<td data-label='Actualizar'>";
                    echo "<form name='shdhd' method='POST' action='pres_neg_dat_actualizar_observaciones_mecanico.php'>";
                    echo "<input type= 'hidden' name = 'id_observaciones' Value='$id_observaciones'>";
                    echo "<button  class='btn_table fa-solid fa-pen-to-square' type='submit' Value='Actualizar'></button>";
                    echo "</form>";
            echo "</tr>";
        endwhile;

            echo" </tbody>";
        echo "</table>";

        }
    }

    $nuevo = new Observaciones();
    $nuevo -> consultar();
        
    ?>      
        <a class="btn_bottom" href="pres_registro_observaciones_mecanico.php">Nueva observación</a>
    </main>
</body>
</html>