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
<main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Cambio de contraseña</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_evaluar_camb_contrasena.php">
                    <label for="documento">Digitar numero de documento</label>
                    <input type="number" id="documento" name="documentoc" placeholder="Ingresar documento" required>

                    <label for="pregunta">Seleccionar pregunta que se eligio</label>
                    <select name="pregunta" id="pregunta" class="select__cambcontra-form">
                        <option value="">Seleccionar pregunta</option>
                        <option value="nombre_mascota">Nombre de mascota</option>
                        <option value="raza_mascota">Raza de mascota</option>
                        <option value="nombre_pila">Nombre de pila</option>
                    </select>

                    <label for="respuesta">Digite la respuesta a la pregunta</label>
                    <input type="repuesta" id="respuesta" name="respuesta" placeholder="Ingresar respuesta" required>
                    
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
    
</body>
</html>