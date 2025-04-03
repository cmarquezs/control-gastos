<?php
include '../controllers/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($gastoController->borrarGasto($id)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
