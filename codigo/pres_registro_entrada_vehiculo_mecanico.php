<?php
    include("conexion.php");
    
    $sql=("SELECT * FROM repuestos");
    if(!$result = $db->query($sql)):
        die('hay un error primera consulta!!! ['. $db->error.']');
    endif;

    $sql1=("SELECT * FROM vehiculos;");
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
    <title>Registro de entrada de vehiculo</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>ENTRADA DE VEHICULO</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_entrada_vehiculo_mecanico.php" enctype="multipart/form-data">
                    <label for="placa">Placa</label>
                    <select id="placa" name="fk_vehiculo" class="select__codrepuesto-form" placeholder="Ingresar placa del vehiculo" required>
                        <option value="">Seleccionar placa</option>
                    <?php while($row = $result1-> fetch_assoc()): ?>
                        <?=$placad = stripslashes($row["placa"]); ?>
                        <?=$ddescripcion = stripslashes($row["descripcion"]);?>
                        <option value="<?=$placad?>"> <?=$placad?> </option>
                    <?php endwhile;  ?>
                    </select>
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" placeholder="ingresar estado de vehiculo" required maxlength="15">
                    <label for="des_entrada">Descripcion de entrada</label>
                    <input type="text" id="des_entrada" name="descripcion_entrada" placeholder="Ingresar descripcion de entrada" required maxlength="70">
                    <label for="foto_vehiculo">Foto de entrada del vehiculo</label>
                    <input type="file" name="file[]" id="foto_vehiculo" multiple required>
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>