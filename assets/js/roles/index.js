$(document).ready(function() {
    var base_url = $('#base_url').val();

    $('.btn_edit').on('click', function() {
        var data = {
            'id': $(this).val()
        }
        var res = cargar_ajax.run_server_ajax("Roles/get_rol", data);
        $('#id').val(res[0].id_rol);
        $('#nombre').val(res[0].nombre_rol);
        $("#servicios").prop("checked", res[0].servicios == 1 ? true : false);
        $("#planes").prop("checked", res[0].planes == 1 ? true : false);
        $("#miembros").prop("checked", res[0].miembros == 1 ? true : false);
        $("#administracion").prop("checked", res[0].administracion == 1 ? true : false);
    })

    $('#btn_edit').on('click', function() {
        var data = {
            'id': $('#id').val(),
            'nombre': $('#nombre').val(),
            'servicios': $('#servicios').is(":checked"),
            'planes': $('#planes').is(":checked"),
            'miembros': $('#miembros').is(":checked"),
            'administracion': $('#administracion').is(":checked")
        }
        var res = cargar_ajax.run_server_ajax("Roles/save_rol", data);

        if (res == true) {
            Swal.fire({
                icon: 'success',
                title: 'Guardado Correctamente',
            }).then((result) => {
                if (result.value) {
                    window.location = base_url + "roles";
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
                var res = cargar_ajax.run_server_ajax("Roles/delete_rol", data);
                if (res == true) {
                    Swal.fire(
                        'Eliminado!',
                        'El Rol "' + nombre + '" ha sido eliminado.',
                        'success'
                    ).then((result) => {
                        window.location = base_url + "roles";
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

});