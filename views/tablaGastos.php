<table class="table table-striped table-hover text-center">
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
                <td><?= $gasto['Cantidad']; ?></td>
                <td><?= $gasto['Fecha']; ?></td>
                <td>
                    <!-- <a class="btn btn-warning" href="#?id=<?= $gasto['ID']; ?>"
                        data-bs-toggle="modal" data-bs-target="#modalEditarGasto">
                        Editar
                    </a> -->
                    <button class="btn btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditarGasto"
                        data-id="<?= $gasto['ID']; ?>"
                        data-descripcion="<?= $gasto['Descripcion']; ?>"
                        data-categoria="<?= $gasto['nombre']; ?>"
                        data-cantidad="<?= $gasto['Cantidad']; ?>">
                        Editar
                    </button>
                    <a class="btn btn-danger " href="#?id=<?= $gasto['ID']; ?>"
                        onclick="return confirm('¿Seguro que quieres eliminar este gasto?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>