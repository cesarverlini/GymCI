$(document).ready(function() {});
var base_url = $('#base_url').val();


$('#btn_save').on('click', function() {
    event.preventDefault();
    var data = {
        'id': $('#id').val(),
        'nombre': $('#nombre').val(),
        'servicios': $('#servicios').is(":checked"),
        'planes': $('#planes').is(":checked"),
        'miembros': $('#miembros').is(":checked"),
        'administracion': $('#administracion').is(":checked")
    }

    var res = cargar_ajax.run_server_ajax("Roles/save_rol", data);

    if (res) {
        Swal.fire({
            icon: 'success',
            title: 'Guardado Correctamente',
        }).then((result) => {
            // if (result.value) {
            window.location = base_url + "roles";
            // }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lo sentimos, hubo un error al guardar, intente de nuevo',
        })
    }

})