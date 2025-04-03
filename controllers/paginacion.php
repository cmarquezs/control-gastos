<?php
// Definir la cantidad de registros por página
$limite = 7;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Obtener datos paginados
$gastos = $gastoController->listarGastosPaginados($paginaActual, $limite);
$totalGastos = $gastoController->contarTotalGastos();
$totalPaginas = ceil($totalGastos / $limite);
