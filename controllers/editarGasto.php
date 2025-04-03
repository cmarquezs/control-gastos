<?php 
include  '../controllers/config.php'; 

// Procesar formulario para editar gasto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] === 'editar') {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    if ($categoria == 0) {
        echo "Error: Debes seleccionar una categoría.";
        exit;
    }

    $resultado = $gastoController->editarGasto($id, $descripcion, $categoria, $cantidad);

    if ($resultado) {
        header("Location: ../index.php");
        exit;
    } else {
        die("Error al actualizar el gasto.");
    }
}