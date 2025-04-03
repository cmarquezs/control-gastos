<?php
require_once __DIR__ . "/GastoController.php"; // La ruta correcta dentro de controllers/
require_once __DIR__ . "/../models/gasto.php"; // Subimos un nivel para acceder a models/

$gastoController = new GastoController();
$gastoModel = new Gasto();

// Obtener los gastos y las categorías desde los modelos para mostrarlos en la vista.
$gastos = $gastoController->listarGastos();
$categorias = $gastoController->listarCategorias();
