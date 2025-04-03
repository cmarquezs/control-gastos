<?php include  './controllers/config.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Gastos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>
</head>

<body class="container mt-4">
    <div class="container">
        <?php include __DIR__ . '/views/modalRegistroGasto.php'; ?>
        <?php include __DIR__ . '/views/modalEditarGasto.php'; ?>

        <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalGasto">
            Agregar Gasto
        </button> -->

        <h3>Listado de Gastos
            <a href="" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalGasto">
                Agregar Gasto
            </a>
        </h3>
        <hr>
        <?php include './views/tablaGastos.php'; ?>
    </div>
</body>

</html>