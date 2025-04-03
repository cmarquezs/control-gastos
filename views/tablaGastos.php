<?php include  './controllers/paginacion.php' ?>

<table class="table table-striped table-hover text-center align-middle">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gastos as $gasto): ?>
            <tr>
                <td><?= $gasto['Descripcion']; ?></td>
                <td><?= $gasto['nombre']; ?></td>
                <td><?= number_format($gasto['Cantidad']); ?></td>
                <td><?= $gasto['Fecha']; ?></td>
                <td>
                    <button class="btn btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditarGasto"
                        data-id="<?= $gasto['ID']; ?>"
                        data-descripcion="<?= $gasto['Descripcion']; ?>"
                        data-categoria="<?= $gasto['Categoria']; ?>"
                        data-cantidad="<?= $gasto['Cantidad']; ?>">
                        Editar
                    </button>
                    <!-- <a class="btn btn-danger" href="controllers/eliminarGasto.php?action=delete&id=<?= $gasto['ID']; ?>"
                        onclick="return confirm('¿Seguro que quieres eliminar este gasto?')">
                        Eliminar
                    </a> -->
                    <a class="btn btn-danger eliminar-gasto" data-id="<?= $gasto['ID']; ?>">
                        Eliminar
                    </a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Paginación -->
<?php include  'paginacionView.php' ?>
