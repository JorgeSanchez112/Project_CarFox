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
                <form method="POST" action="" >
                    <label for="">Placa</label>
                    <input type="text" placeholder="Ingresar placa del vehiculo">
                    <label for="">Descripcion de reparacion</label>
                    <input type="text" placeholder="Ingresar descripcion de reparacion">
                    <label for="">Codigo de repuesto</label>
                    <input type="text" placeholder="Ingresar codigo de repuesto usado">
                    <label for="">Fecha de entrada del vehiculo</label>
                    <input type="datetime-local">
                    <label for="">Fecha de salida del vehiculo</label>
                    <input type="datetime-local">
                    <label for="">Foto del vehiculo</label>
                    <input type="file">
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>