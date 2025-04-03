<?php 
include  '../controllers/config.php';

// Procesar formulario para agregar gasto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    if ($categoria == 0) {
        echo("Error: Debes seleccionar una categoría.");
        exit;
    }

    $resultado = $gastoController->agregarGasto($descripcion, $categoria, $cantidad);

    if ($resultado) {
        header("Location: ../index.php");
        exit;
    } else {
        die("Error al guardar el gasto.");
    }
}





?>
