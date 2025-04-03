<?php
require_once __DIR__ . "/GastoController.php"; // La ruta correcta dentro de controllers/
require_once __DIR__ . "/../models/gasto.php"; // Subimos un nivel para acceder a models/

$gastoController = new GastoController();
$gastos = $gastoController->listarGastos();
$categorias = $gastoController->listarCategorias();
