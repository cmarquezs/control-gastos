<?php
include  '../controllers/config.php';
// require_once '../models/gasto.php';
// require_once '../db/db.php';

// Procesar formulario para agregar gasto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    if ($categoria == 0) {
        echo json_encode(["status" => "error", "message" => "Debes seleccionar una categoria"]);
        exit;
    }

    $resultado = $gastoController->agregarGasto($descripcion, $categoria, $cantidad);

    if ($resultado) {
        echo json_encode(["status" => "success", "message" => "Gasto registrado correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al registrar el gasto"]);
    }
}

// Procesar formulario para Editar gasto

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    $resultado = $gastoModel->actualizarGasto($id, $descripcion, $categoria, $cantidad);

    if ($resultado) {
        echo json_encode(["status" => "success", "message" => "Gasto actualizado correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al actualizar el gasto"]);
    }
}
