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

$gastoController = new GastoController();

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

// Procesar formulario para editar gasto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
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
        var_dump($_POST);

        header("Location: ../index.php");
        exit;
    } else {
        die("Error al actualizar el gasto.");
    }
}


?>
