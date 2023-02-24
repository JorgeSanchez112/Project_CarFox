<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link rel="stylesheet" href="css/style_registro_admin.css">
</head>
<body>
    <h1>Bienvenido señor administrador</h1>

    <main>
        <section>
            <h2>Crear cuenta de usuario</h2>
            <form action="neg_dat_registro_administrador.php" method="POST">
                <label for="documento">Digitar su numero de documento</label>
                <input type="number" id="documento" name="documento" placeholder="Digitar numero de documento" maxlength="15">
                <label for="nombre">Digitar sus nombres</label>
                <input type="text" id="nombre" name="nombre" placeholder="Digitar sus nombres" maxlength="25">
                <label for="apellido">Digitar sus apellidos</label>
                <input type="text" id="apellido" name="apellido" placeholder="Digitar su apellido" maxlength="25">
                <div>
                    <input type="submit" value="Enviar">
                </div>
                
            </form>
        </section>
    </main>
</body>
</html>