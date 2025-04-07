document.addEventListener('DOMContentLoaded', function () { 
    const modalEditarGasto = document.getElementById('modalEditarGasto');

    modalEditarGasto.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const descripcion = button.getAttribute('data-descripcion');
        const categoria = button.getAttribute('data-categoria');
        const cantidad = button.getAttribute('data-cantidad');

        const modalIdInput = modalEditarGasto.querySelector('#id');
        const modalDescripcionInput = modalEditarGasto.querySelector('#descripcion');
        const modalCategoriaSelect = modalEditarGasto.querySelector('#categoria');
        const modalCantidadInput = modalEditarGasto.querySelector('#cantidad');

        modalIdInput.value = id;
        modalDescripcionInput.value = descripcion;
        modalCantidadInput.value = cantidad;

        //console.log("ID Categoría seleccionada:", categoria);

        for (let option of modalCategoriaSelect.options) {
            if (option.value == categoria) {
                option.selected = true;
                break;
            }
        }
    });

    document.querySelectorAll('.eliminar-gasto').forEach(boton => {
        boton.addEventListener('click', function () {
            let idGasto = this.getAttribute('data-id');

            Swal.fire({
                title: '¿Estás seguro de eliminarlo?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`controllers/eliminarGasto.php?action=delete&id=${idGasto}`, {
                        method: 'GET',
                    })
                    .then(response => response.text())
                    .then(data => {
                        Swal.fire(
                            'Eliminado',
                            'El gasto ha sido eliminado.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    })
                    .catch(error => {
                        Swal.fire('Error', 'No se pudo eliminar el gasto.', 'error');
                    });
                }
            });
        });
        //console.log("main.js cargado correctamente");

    });

    document.querySelectorAll(".form-gasto").forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            let formData = new FormData(this);
            let actionUrl = this.getAttribute("action");

            fetch(actionUrl, {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    Swal.fire({
                        title: "¡Éxito!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: data.message,
                        icon: "error",
                        confirmButtonText: "Cerrar"
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: "Error",
                    text: "Hubo un problema con la solicitud",
                    icon: "error",
                    confirmButtonText: "Cerrar"
                });
            });
        });
    });
});
