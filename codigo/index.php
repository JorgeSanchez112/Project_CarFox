<?php
  include('conexion.php');

  $sql = "SELECT * FROM usuarios";

  if(!$result = $db->query($sql)):
      die('Hay un error primera consulta!!! ['.$db->error.']');
  endif;

  while ($row=$result->fetch_assoc()):
    $id=stripslashes($row["id_usuario"]);    
  endwhile;

  if(empty($id)){
      header('location:pres_usuario_nuevo.php');
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style_index.css">
    <title>index-carfox</title>
  </head>
    <body>
      <main class="caja">
        <section class="c1">
          <h1>Carfox</h1>
        </section>

        <section class="c2">
          <form action="neg_dat_evaluar_sesion.php" method="post" class="form_ini">
            <input type="number" name="documento" placeholder="Indique el numero de documento" min="1" max="20" >
            <input type="password" name="contrasena" placeholder="Indique su contraseña" required size="10" minlength="1" maxlength="20">
            <input type="submit" class="btn" name="register" value="Iniciar Sesion"/>
            <p><a href="pres_camb_contrasena.php">¿Has olvidado la contraseña?</a></p>
          </form>
        </section>
      </main>
    </body>
</html>