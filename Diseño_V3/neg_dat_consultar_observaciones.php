<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informe_observaciones</title>
    <link rel="stylesheet" href="css/Style_consultas.css">
</head>
<body>
    <?php include('header_administrador.php'); ?>
    <main class="container-table">
        <table class="table">
            <caption>Observaciones</caption>
            <tbody>
                <tr class="table-header">
                    <th>Placa</th>
                    <th>Descripcion</th>
                    <th>Cod repuesto</th>
                    <th>Mecanico</th>
                    <th>Fecha entrada</th>
                    <th>Fecha salida</th>
                    <th>Imagenes</th>
                    <th>Generar salida</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <tr>
                    <td data-label="Placa">DTE312</td>
                    <td data-label="Descripcion">Al automovil se le realizo un cambio de bateria con herramientas mecanicas</td>
                    <td data-label="Cod repuesto">B-300</td>
                    <td data-label="Mecanico">1067219831</td>
                    <td data-label="Fecha entrada">2019-03-11 10:29:20</td>
                    <td data-label="Fecha salida">2019-03-12 10:30:01</td>
                    <td data-label="Imagenes">
                        <figure>
                            <img src="img/small/img_auto2_small.png" alt="auto2">
                        </figure>
                    </td>
                    <td data-label="Generar salida">
                        <button class="btn_table fa-solid fa-right-to-bracket"></button>
                    </td>
                    <td data-label="Actualizar">
                        <button class="btn_table fa-solid fa-pen-to-square"></button>
                    </td>
                    <td data-label="Eliminar">
                        <button class="btn_table fa-solid fa-trash"></button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Placa">DTE312</td>
                    <td data-label="Descripcion">Al automovil se le realizo un cambio de bateria con herramientas mecanicas</td>
                    <td data-label="Cod repuesto">B-300</td>
                    <td data-label="Mecanico">1067219831</td>
                    <td data-label="Fecha entrada">2019-03-11 10:29:20</td>
                    <td data-label="Fecha salida">2019-03-12 10:30:01</td>
                    <td data-label="Imagenes">
                        <figure>
                            <img src="img/small/img_auto1_small.jpg" alt="auto2">
                        </figure>
                    </td>
                    <td data-label="Generar salida">
                        <button>Salida</button>
                    </td>
                    <td data-label="Actualizar">
                        <button>Actualizar</button>
                    </td>
                    <td data-label="Eliminar">
                        <button>Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Placa">DTE312</td>
                    <td data-label="Descripcion">Al automovil se le realizo un cambio de bateria con herramientas mecanicas</td>
                    <td data-label="Cod repuesto">B-300</td>
                    <td data-label="Mecanico">1067219831</td>
                    <td data-label="Fecha entrada">2019-03-11 10:29:20</td>
                    <td data-label="Fecha salida">2019-03-12 10:30:01</td>
                    <td data-label="Imagenes">
                        <figure>
                            <img src="img/small/img_auto2_small.png" alt="auto2">
                        </figure>
                    </td>
                    <td data-label="Generar salida">
                        <button>Salida</button>
                    </td>
                    <td data-label="Actualizar">
                        <button>Actualizar</button>
                    </td>
                    <td data-label="Eliminar">
                        <button>Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <a class="btn_bottom" href="pres_registro_observaciones.php">Nueva observación</a>
    </main>
</body>
</html>