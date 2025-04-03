<div class="modal " id="modalEditarGasto" tabindex="-1" aria-labelledby="modalEditarGastoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarGastoLabel">Editar Gasto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarGasto" method="POST" action="controllers/editarGasto.php">
                    <input type="hidden" name="id" id="id"> <!-- ID del gasto -->
                    <input type="hidden" name="action" value="editar"> <!-- Acción -->

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria['ID']; ?>"><?= $categoria['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Gasto</button>
                </form>

            </div>
        </div>
    </div>
</div>