<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de observaciones</title>
    <link rel="stylesheet" href="css/Style_registros.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>OBSERVACIONES</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_observaciones.php" enctype="multipart/form-data">
                    <label for="placa">Placa</label>
                    <input type="text" id="placa" placeholder="Ingresar placa del vehiculo" required>
                    <label for="des_reparacion">Descripcion de reparacion</label>
                    <input type="text" id="des_reparacion" placeholder="Ingresar descripcion de reparacion" required>
                    <label for="cod_repuesto">Codigo de repuesto</label>
                    <input type="text" id="cod_repuesto" placeholder="Ingresar codigo de repuesto usado" required>
                    <label for="fecha_entrada">Fecha de entrada del vehiculo</label>
                    <input type="datetime-local" id="fecha_entrada" required>
                    <label for="fecha_salida">Fecha de salida del vehiculo</label>
                    <input type="datetime-local" id="fecha_salida" required>
                    <label for="foto_vehiculo">Foto del vehiculo</label>
                    <input type="file" id="foto_vehiculo" required>
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>