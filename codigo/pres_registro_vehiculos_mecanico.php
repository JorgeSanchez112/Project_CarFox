<?php
    include("conexion.php");
    
    $sql=("SELECT * FROM propietarios");
    if(!$result = $db->query($sql)):
        die('hay un error primera consulta!!! ['. $db->error.']');
    endif;
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de vehiculos mecanico</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Vehiculos</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_vehiculo_mecanico.php">
                    <label for="placa">Placa del vehiculo</label>
                    <input type="text" id="placa" name="placa" placeholder="Ingresar placa del vehiculo" required>
                    <label for="marca" >Marca del vehiculo</label>
                    <input type="text" id="marca" name="marca" placeholder="Ingresar marca" required>
                    <label for="modelo">Modelo del vehiculo</label>
                    <input type="text" id="modelo" name="modelo" placeholder="Ingresar modelo" required>
                    <label for="tipo">Tipo de vehiculo</label>
                    <input type="text" id="tipo" name="tipo" placeholder="Ingresar tipo de vehiculo" required>
                    <input type="hidden" name="mecanico" placeholder="ingrese el documento" required>
                    <label for="estado">Estado del vehiculo</label>
                    <input type="text" id="estado" name="estado" placeholder="Ingresar estado del vehiculo" required>
                    <label for="descripcion">Descripcion de entrada del vehiculo</label>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion entrada vehiculo" required>
                    <label for="doc_propietario">Documento de propietario</label>
                    <select  id="doc_propietario" name="doc_propietario" class="select__codrepuesto-form" required>
                        <option value="">Seleccionar documento</option>
                    <?php while($row = $result-> fetch_assoc()): ?>
                       <?=$doc_propietariod = stripslashes($row["doc_propietario"]); ?>
                        <option value=" <?=$doc_propietariod?> "> <?=$doc_propietariod?> </option>
                    <?php endwhile;  ?>
                    </select>
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>