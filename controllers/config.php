<?php
require_once "controllers/GastoController.php";
require_once "models/gasto.php";

$gastoController = new GastoController();
$gastos = $gastoController->listarGastos();
$categorias = $gastoController->listarCategorias();
