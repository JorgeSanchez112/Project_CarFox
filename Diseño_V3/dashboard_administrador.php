<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/Style_dashboard.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main>
        <figure class="container__figure-principal">
            <picture>
                <source media="(min-width:1000px)" srcset="img/big/img_auto1_big.jpg">
                <source media="(min-width:700px)" srcset="img/half/img_auto1_medium.jpg">
                <img src="img/small/img_auto1_small.jpg" alt="Es un auto en un dia lluvioso">
            </picture>
        </figure>
        <section class="container">
            <article class="box box-1">
                <figure>
                    <picture>
                        <source media="(min-width:1000px)" srcset="img/big/img_repuesto_big.jpg">
                        <source media="(min-width:700px)" srcset="img/half/img_repuesto_medium.jpg">
                        <img src="img/small/img_repuesto_small.jpg" alt="">
                    </picture>
                </figure>
                <div>
                    <p>Repuesto</p>
                    <a href="pres_registro_repuestos.php">Registrar repuesto</a>
                </div>
            </article>
            <article class="box box-2">
                <figure>
                    <picture>
                        <source media="(min-width:1000px)" srcset="img/big/img_propietario_big.png">
                        <source media="(min-width:700px)" srcset="img/half/img_propietario_medium.png">
                        <img src="img/small/img_propietario_small.png" alt="">
                    </picture>
                </figure>
                <div>
                    <p>Propietario</p>
                    <a href="pres_registro_propietarios.php">Registrar propietario</a>
                </div>
            </article>
            <article class="box box-3">
                <figure>
                    <picture>
                        <source media="(min-width:1000px)" srcset="img/big/img_auto2_big.png">
                        <source media="(min-width:700px)" srcset="img/half/img_auto2_medium.png">
                        <img src="img/small/img_auto2_small.png" alt="">
                    </picture>
                </figure>
                <div>
                    <p>Vehiculo</p>
                    <a href="pres_registro_vehiculo.php">Registrar vehiculo</a>
                </div>
            </article>
            <article class="box box-4">
                <figure>
                    <picture>
                        <source media="(min-width:1000px)" srcset="img/big/img_empleado_big.jpg">
                        <source media="(min-width:700px)" srcset="img/half/img_empleado_medium.jpg">
                        <img src="img/small/img_empleado_small.jpg" alt="">
                    </picture>
                </figure>
                <div>
                    <p>Empleado</p>
                    <a href="pres_registro.php">Registrar empleado</a>
                </div>
            </article>
            <article class="box box-5">
                <figure>
                    <picture>
                        <source media="(min-width:1000px)" srcset="img/big/img_observaciones_big.jpg">
                        <source media="(min-width:700px)" srcset="img/half/img_observaciones_medium.jpg">
                        <img src="img/small/img_observaciones_small.jpg" alt="">
                    </picture>                    
                </figure>
                <div>
                    <p>Observacion</p>
                    <a href="pres_registo_observaciones.php">Registrar observacion</a>
                </div>
            </article>
            <article class="box box-6">
                <figure>
                    <picture>
                        <source media="(min-width:1000px)" srcset="img/big/img_historial__big.jpg">
                        <source media="(min-width:700px)" srcset="img/half/img_historial_medium.jpg">
                        <img src="img/small/img_historial_small.jpg" alt="">
                    </picture>
                </figure>
                <div>
                    <p>Historial</p>
                    <a href="pres_registro_historial.php">Registrar historial</a>
                </div>
            </article>
        </section>
    </main>
</body>
</html>