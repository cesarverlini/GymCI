var base_url = $('#base_url').val();

$('.btn_delete').on('click', function() {
    var data = {
        'id': $(this).val()
    }

    var nombre = $(this).attr("id");

    Swal.fire({
        title: '¿Estas seguro?',
        text: "No podrás revertir la eliminación",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'No, Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            var res = cargar_ajax.run_server_ajax("persons/delete_person", data);
            if (res == true) {
                Swal.fire(
                    'Eliminado!',
                    'El Rol "' + nombre + '" ha sido eliminado.',
                    'success'
                ).then((result) => {
                    window.location = base_url + "empleados";
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Lo sentimos, hubo un error al eliminar, intente de nuevo',
                })
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelado',
                'No se ha eliminado ningun registro',
                'error'
            )
        }
    })
})