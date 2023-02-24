<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de propietarios mecanico</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Propietarios</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_propietarios_mecanico.php">
                    <label for="documento">Documento del propietario</label>
                    <input type="number" id="documento" name="documento" placeholder="Ingresar numero de documento" oninput="maxLengthCheck(this)" maxlength ="10">
                    <label for="nombre" >Nombres de propietario</label>
                    <input type="text" id="nombre" name="nombres" placeholder="Ingresar nombre" required maxlength="45">
                    <label for="apellido">Apellidos de propietario</label>
                    <input type="text" id="apellido" name="apellidos" placeholder="Ingresar apellido" required maxlength="45">
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>
<script src="js/maxLengthNumber.js"></script>