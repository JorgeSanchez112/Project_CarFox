<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informe_empleados</title>
    <link rel="stylesheet" href="css/Style_consultas.css">
</head>
<body>
<?php include('header_administrador.php');?>
    <main class="container-table">
    
    <?php class Usuarios
    {

        public function consultar ()
        {
        include ("conexion.php");
        echo "<table class='table'>";

        $sql = "SELECT * FROM usuarios";
	    if(!$result = $db->query($sql)):
		    die('Hay un error primera consulta!!! ['.$db->error.']');
        endif;
        echo "<caption>Empleados</caption>";
        echo "<tbody>";
            echo "<tr class='table-header'>";
                echo "<th>Documento</th>";
                echo "<th>Nombres</th>";
                echo "<th>Apellidos</th>";
                echo "<th>Actualizar</th>";
                echo "<th>Eliminar</th>";
            echo "</tr>";
        while ($row=$result->fetch_assoc()):
            $id_usuario=stripslashes($row["id_usuario"]);
            $documento=stripslashes($row["documento"]);
            $nombres=stripslashes($row["nombres"]);
            $apellidos=stripslashes($row["apellidos"]);

            echo "<tr>";
                echo "<td data-label='Documento'>$documento</td>";
                echo "<td data-label='Nombres'>$nombres</td>";
                echo "<td data-label='Apellidos'>$apellidos</td>";
                echo "<td data-label='Actualizar'>";
                    echo "<form name='shdhd' method='POST' action='pres_neg_dat_actualizar_empleados.php'>";
                    echo "<input type= 'hidden' name = 'id_usuario' Value='$id_usuario'>";
                    echo "<button  class='btn_table fa-solid fa-pen-to-square' type='submit' Value='Actualizar'></button>";
                    echo "</form>";
                echo "</td>";
                echo "<td data-label='Eliminar'>";
                    echo "<form name='shdhd' method='POST' action='neg_dat_eliminar_empleados.php'>";
                    echo "<input type= 'hidden' class='barra' name = 'id_usuario' Value='$id_usuario'>";
                    echo "<button  class='btn_table fa-solid fa-trash' type='submit' Value='Eliminar'></button>";
                    echo "</form>";
                echo "</td>";
            echo "</tr>";
        endwhile;

            echo" </tbody>";
        echo "</table>";

        }
    }

    $nuevo = new Usuarios();
    $nuevo -> consultar();
        
    ?>      
        <a class="btn_bottom" href="pres_registro_empleados.php">Nuevo Empleado</a>
    </main>
</body>
</html>