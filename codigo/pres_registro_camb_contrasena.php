<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carfox</title>
    <link rel="stylesheet" href="css/Style_camb_contrasena.css">
</head>
<body>
<?php include('neg_seguridad_camb_contra.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Empleados</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_camb_contrasena.php">
                    <label for="contrasena">Digitar contraseña</label>
                    <input type="password" id="contrasena" name="contrasenac" placeholder="Ingresar contraseña" required>

                    <label for="pregunta">Seleccionar pregunta</label>
                    <select name="pregunta" id="pregunta" class="select__cambcontra-form">
                        <option value="">Seleccionar pregunta</option>
                        <option value="nombre_mascota">Nombre de mascota</option>
                        <option value="raza_mascota">Raza de mascota</option>
                        <option value="nombre_pila">Nombre de pila</option>
                    </select>

                    <label for="respuesta">Digite la respuesta a la pregunta</label>
                    <input type="repuesta" id="respuesta" name="respuesta" placeholder="Ingresar contraseña" required>
                    <input type="hidden" name="documento" required>
                    
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>