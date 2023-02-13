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
    <?php include('header_administrador.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>OBSERVACIONES</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_observaciones.php" enctype="multipart/form-data">
                    <label for="placa">Placa</label>
                    <input type="text" id="placa" name="placa" placeholder="Ingresar placa del vehiculo" required size="10" minlength="1" maxlength="6">
                    <label for="des_reparacion">Descripcion de reparacion</label>
                    <input type="text" id="des_reparacion" name="descripcion_reparacion" placeholder="Ingresar descripcion de reparacion" required size="10" minlength="1" maxlength="45">
                    <label for="cod_repuesto">Codigo de repuesto</label>
                    <input type="text" id="cod_repuesto" name="cod_repuesto" placeholder="Ingresar codigo de repuesto usado" required size="10" minlength="1" maxlength="10">
                    <input type="hidden" name="documento" placeholder="ingrese el documento" required min="1" max="15">
                    <input type="hidden" name="fecha_salida" id="fecha_salida">
                    <label for="foto_vehiculo">Foto del vehiculo</label>
                    <input type="file" name="file" id="foto_vehiculo" required>
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>