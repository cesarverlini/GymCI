var base_url = $('#base_url').val();

$('#btn_edit').on('click', function() {
    var data = {
        'id': $('#id').val(),
        'nombre': $('#nombre').val(),
        'descripcion': $('#descripcion').val()
    }
    var res = cargar_ajax.run_server_ajax("services/save_services", data);

    if (res == true) {
        Swal.fire({
            icon: 'success',
            title: 'Guardado Correctamente',
        }).then((result) => {
            if (result.value) {
                window.location = base_url + "servicios";
            }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lo sentimos, hubo un error al guardar, intente de nuevo',
        })
    }

})

$('.btn_edit').on('click', function() {
    var data = {
        'id': $(this).val()
    }
    var res = cargar_ajax.run_server_ajax("services/get_service", data);
    // console.log(res);
    $('#id').val(res[0].id);
    $('#nombre').val(res[0].nombre);
    $('#descripcion').val(res[0].descripcion);

})

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
            var res = cargar_ajax.run_server_ajax("services/delete_service", data);
            if (res == true) {
                Swal.fire(
                    'Eliminado!',
                    'El Rol "' + nombre + '" ha sido eliminado.',
                    'success'
                ).then((result) => {
                    window.location = base_url + "servicios";
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