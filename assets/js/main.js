document.addEventListener('DOMContentLoaded', function () { 
    const modalEditarGasto = document.getElementById('modalEditarGasto');

    modalEditarGasto.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const descripcion = button.getAttribute('data-descripcion');
        const categoria = button.getAttribute('data-categoria'); // ← Asegúrate de que este valor es correcto
        const cantidad = button.getAttribute('data-cantidad');

        const modalIdInput = modalEditarGasto.querySelector('#id');
        const modalDescripcionInput = modalEditarGasto.querySelector('#descripcion');
        const modalCategoriaSelect = modalEditarGasto.querySelector('#categoria');
        const modalCantidadInput = modalEditarGasto.querySelector('#cantidad');

        modalIdInput.value = id;
        modalDescripcionInput.value = descripcion;
        modalCantidadInput.value = cantidad;

        // Verifica que las opciones existen antes de asignar el valor
        let optionExists = false;
        for (let option of modalCategoriaSelect.options) {
            if (option.value == categoria) {
                option.selected = true;
                optionExists = true;
                break;
            }
        }

        if (!optionExists) {
            modalCategoriaSelect.value = ""; // Opción por defecto si no se encuentra la categoría
        }
    });
});
