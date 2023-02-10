<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_registro_admin.css">
</head>
<body>
    <header>
        <h1>Bienvenido señor administrador</h1>
    </header>

    <main>
        <form action="neg_dat_registro_administrador.php" method="POST">
            <label for="documento">Digitar su numero de documento</label>
            <input type="number" id="documento" name="documento" placeholder="Digitar numero de documento" require>
            <label for="nombre">Digitar sus nombres</label>
            <input type="text" id="nombre" name="nombre" placeholder="Digitar sus nombres" require>
            <label for="apellido">Digitar sus apellidos</label>
            <input type="text" id="apellido" name="apellido" placeholder="Digitar su apellido" require>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>