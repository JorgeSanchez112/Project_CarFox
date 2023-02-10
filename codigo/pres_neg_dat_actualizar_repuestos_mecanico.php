<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de repuestos</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
    <?php
    class Repuestos
    {
        public function actualizar($id_repuesto)
        {
            include('conexion.php');
            $sql = "SELECT * FROM repuestos where id_repuesto='$id_repuesto'";
	        if(!$result = $db->query($sql)):
		        die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()):
                $id_repuesto=stripslashes($row["id_repuesto"]);
                $repuesto=stripslashes($row["repuesto"]);
                $descripcion=stripslashes($row["descripcion"]);
                $cod_repuesto=stripslashes($row["cod_repuesto"]);
                $entrada=stripslashes($row["entrada"]);
            endwhile;

            echo "<section class='container'>";
                echo "<article class='article__icon-triangle'> </article>";
                echo "<h2>REPUESTOS</h2>";
                echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_repuestos_mecanico.php'>";
                        echo "<input type='hidden' name='id_repuesto' value='$id_repuesto'>";
                        echo "<label for='repuesto'>Nombre del repuesto</label>";
                        echo "<input type='text' id='repuesto' name='repuesto' placeholder='Ingresar nombre de repuesto' value='$repuesto' required>";
                        echo "<label for='des_repuesto' >Descripcion del repuesto</label>";
                        echo "<input type='text' id='des_repuesto' name='descripcion' placeholder='Descripcion repuesto' value='$descripcion' required>";
                        echo "<label for='cod_repuesto'>Codigo del repuesto</label>";
                        echo "<input type='text' id='cod_repuesto' name='cod_repuesto' placeholder='Codigo repuesto' value='$cod_repuesto' required>";
                        echo "<label for='entrada'>Cantidad inicial del repuesto</label>";
                        echo "<input type='number' id='entrada' name='entrada' placeholder='Ingresar cantidad inicial' value='$entrada' required>";;
                        echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";
        }
    }
    $nuevo=new Repuestos();
    $nuevo -> actualizar($_POST["id_repuesto"]);

        
    ?>
    </main>
</body>
</html>