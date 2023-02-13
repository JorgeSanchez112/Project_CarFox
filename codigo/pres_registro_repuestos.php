<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de repuestos</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
        <section class="container">
            <article class="article__icon-triangle"> </article>
            <h2>Repuestos</h2>
            <article class="article__container-form">
                <form method="POST" action="neg_dat_registro_repuestos.php">
                    <label for="repuesto">Nombre del repuesto</label>
                    <input type="text" id="repuesto" name="repuesto" placeholder="Ingresar nombre de repuesto" required size="10" minlength="1" maxlength="20">
                    <label for="des_repuesto" >Descripcion del repuesto</label>
                    <input type="text" id="des_repuesto" name="descripcion" placeholder="Descripcion repuesto" required  size="10" minlength="1" maxlength="45">
                    <label for="cod_repuesto">Codigo del repuesto</label>
                    <input type="text" id="cod_repuesto" name="cod_repuesto" placeholder="Codigo repuesto" required size="10" minlength="1" maxlength="10">
                    <label for="entrada">Cantidad inicial del repuesto</label>
                    <input type="number" id="entrada" name="entrada" placeholder="Ingresar cantidad inicial"  min="1" max="10">
                    <input type="hidden" name="salida" value="0" required>
                    <input class="input__btn-color" type="submit">
                </form>
            </article>
        </section>
    </main>
</body>
</html>