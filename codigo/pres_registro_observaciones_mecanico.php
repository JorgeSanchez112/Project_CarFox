<?php
    include("conexion.php");
    
    $sql=("SELECT * FROM repuestos");
    if(!$result = $db->query($sql)):
        die('hay un error primera consulta!!! ['. $db->error.']');
    endif;

    $sql1=("SELECT * FROM vehiculos");
    if(!$result1 = $db->query($sql1)):
        die('hay un error primera consulta!!! ['. $db->error.']');
    endif;
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de observaciones</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>OBSERVACIONES</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_observaciones_mecanico.php" enctype="multipart/form-data">
                    <label for="placa">Placa</label>
                    <select id="placa" name="placa" class="select__codrepuesto-form" placeholder="Ingresar placa del vehiculo" required>
                        <option value="">Seleccionar placa</option>
                    <?php while($row = $result1-> fetch_assoc()): ?>
                       <?=$placad = stripslashes($row["placa"]); ?>
                        <option value=" <?=$placad?> "> <?=$placad?> </option>
                    <?php endwhile;  ?>
                    </select>
                    <label for="des_reparacion">Descripcion de reparacion</label>
                    <input type="text" id="des_reparacion" name="descripcion_reparacion" placeholder="Ingresar descripcion de reparacion" required>
                    <label for="cod_repuesto">Codigo de repuesto</label>
                    <select name="cod_repuesto" id="cod_repuesto" class="select__codrepuesto-form" required>
                        <option value="">Seleccionar repuesto</option>
                    <?php while($row = $result-> fetch_assoc()): ?>
                       <?=$codigo_repuesto = stripslashes($row["cod_repuesto"]); ?>
                        <option value=" <?=$codigo_repuesto?> "> <?=$codigo_repuesto?> </option>
                    <?php endwhile;  ?>
                    </select>
                    <input type="hidden" name="documento" placeholder="ingrese el documento" required>
                    <input type="hidden" name="fecha_salida" id="fecha_salida" required>
                    <label for="foto_vehiculo">Foto del vehiculo</label>
                    <input type="file" name="file" id="foto_vehiculo" required>
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>