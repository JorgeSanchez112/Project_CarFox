<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de empleados</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Empleados</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_empleados.php">
                    <label for="documento">Numero de documento</label>
                    <input type="number" id="documento" name="documento" placeholder="Ingresar numero de documento" required min="1" max="15">
                    <label for="nombre" >Nombres</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresar nombre" required size="10" minlength="1" maxlength="45">
                    <label for="apellido">Apellidos</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingresar apellido" required size="10" minlength="1" maxlength="45">
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>