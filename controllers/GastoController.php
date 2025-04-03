<?php
require_once __DIR__ . '/../models/Gasto.php';
require_once __DIR__ . '/../db/db.php';

class GastoController {
    private $gastoModel;

    public function __construct() {
        $this->gastoModel = new Gasto();
    }

    public function listarGastos() {
        return $this->gastoModel->obtenerGastos();
    }

    public function listarCategorias() {
        return $this->gastoModel->obtenerCategorias();
    }

    public function agregarGasto($descripcion, $categoria, $cantidad) {
        return $this->gastoModel->crearGasto($descripcion, $categoria, $cantidad);
    }

    public function editarGasto($id, $descripcion, $categoria, $cantidad) {
        return $this->gastoModel->actualizarGasto($id, $descripcion, $categoria, $cantidad);
    }

    public function borrarGasto($id) {
        return $this->gastoModel->eliminarGasto($id);
    }
}

// $gastoController = new GastoController();

