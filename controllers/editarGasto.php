<?php
include  '../controllers/config.php';
// require_once '../models/gasto.php';
// require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    //$gastoModel = new Gasto();
    $resultado = $gastoModel->actualizarGasto($id, $descripcion, $categoria, $cantidad);

    if ($resultado) {
        echo json_encode(["status" => "success", "message" => "Gasto actualizado correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al actualizar el gasto"]);
    }
}
