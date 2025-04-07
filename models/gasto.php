<?php
require_once __DIR__ . '/../db/db.php';

class Gasto
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function crearGasto($descripcion, $categoria, $cantidad)
    {
        $sql = "INSERT INTO gastos (descripcion, categoria, cantidad) VALUES (:descripcion, :categoria, :cantidad)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':cantidad', $cantidad);
        return $stmt->execute();
    }

    public function obtenerGastos()
    {
        //$query = "SELECT g.ID, g.Descripcion, g.Cantidad, c.nombre, g.Fecha FROM gastos g LEFT JOIN gastos_categorias c ON g.Categoria = c.id";

        $sql = "SELECT g.ID, g.Descripcion, g.Cantidad, g.Fecha, c.nombre, g.Categoria  
            FROM gastos g
            LEFT JOIN gastos_categorias c ON g.Categoria = c.ID
            ORDER BY g.fecha DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las categorías
    public function obtenerCategorias()
    {
        return $this->db->query("SELECT * FROM gastos_categorias")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerGastoPorId($id)
    {
        $sql = "SELECT * FROM gastos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarGasto($id, $descripcion, $categoria, $cantidad)
    {
        try {
            $sql = "UPDATE gastos SET Descripcion = :descripcion, Categoria = :categoria, Cantidad = :cantidad WHERE ID = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            } else {
                $error = $stmt->errorInfo();
                echo "Error al actualizar: " . $error[2];
                return false;
            }
        } catch (Exception $e) {
            echo "Exception al actualizar: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarGasto($id)
    {
        try {
            $sql = "DELETE FROM gastos WHERE ID = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerGastosPaginados($limite, $offset)
    {
        $sql = "SELECT g.ID, g.Descripcion, g.Cantidad, g.Fecha, c.nombre, g.Categoria  
            FROM gastos g
            LEFT JOIN gastos_categorias c ON g.Categoria = c.ID
            ORDER BY g.fecha DESC
            LIMIT :limite OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function contarTotalGastos()
    {
        $sql = "SELECT COUNT(*) as total FROM gastos";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
