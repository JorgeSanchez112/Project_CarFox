<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio contraseña</title>
    <link rel="stylesheet" href="css/Style_camb_contrasena.css">
</head>
<body>
<?php include('neg_seguridad_actualizar_camb_contra.php'); ?>
<main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Cambio de contraseña</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_actualizar_camb_contrasena.php">
                    <input type="hidden" name=documento>
                    <label for="contrasena">Digitar Nueva contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Ingresar Contraseña" required>
                    
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
    
</body>
</html>