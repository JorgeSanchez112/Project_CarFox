<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="css/Style_header.css">
        <link media="(min-width:1000px)" rel="stylesheet" href="css/Style_desktop.css">
        <link media="(min-width:465px)" rel="stylesheet" href="css/Style_tablet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/> 
    </head>
    <body>
        <?php include('neg_seguridad_mecanico.php'); ?>
        <header class="caja_menuAd1">
            <div class="menu-left">
                <input type="checkbox" name="" id="nav__checkbox" class="nav__checkbox">
                <section class="section__aside-mobile" id="aside-mobile">
                    <label for="nav__checkbox" class="nav__toggle">
                        <svg viewBox="0 0 448 512" width="100" title="bars">
                            <path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                        </svg>
                    </label>
                </section>

                <section class="section__aside" id="aside">
                    <article class="icons">
                        <h2>Mecanico</h2>
                        <label for="nav__checkbox">
                            <svg viewBox="0 0 384 512" width="100" title="times">
                                <path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
                            </svg>
                        </label>
                    </article>

                    <ul class="lista">
                        <li><a href="dashboard_mecanico.php"><i class="fas fa-home"></i>Inicio</a></li>
                        <li><a href="neg_dat_consultar_propietarios_mecanico.php"><i class="fa-solid fa-key"></i> Propietarios</a></li>
                        <li><a href="neg_dat_consultar_vehiculos_mecanico.php"><i class="fa-solid fa-car"></i> Vehiculos</a></li>
                        <li><a href="neg_dat_consultar_observaciones_mecanico.php"><i class="fa-solid fa-magnifying-glass-chart"></i> Observaciones</a></li>
                        <li><a href="neg_dat_consultar_repuestos_mecanico.php"><i class="fa-solid fa-hammer"></i> Repuestos</a></li>
                        <li><a href="neg_salir.php "><i class="fa-solid fa-right-to-bracket"></i> Cerrar sesión</a></li>
                    </ul>
                </section>
            </div>    
            <nav class="nav__user">
                <h2> Bienvenido señor/a <?= $_SESSION['nombre_usuario'] ?> </h2>
            <nav>
        </header>
    </body>
</html>