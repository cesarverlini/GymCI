$(document).ready(function() {});
var base_url = $('#base_url').val();

$('.btn_info').on('click', function() {
    id = $(this).val();
    var data = {
        'id': $(this).val()
    }
    var res = cargar_ajax.run_server_ajax("planes/get_plan", data);
    var plan = res.plan;
    var services = res.services;
    $('#lbl_codigo').text(plan[0].codigo);
    $('#lbl_nombre').text(plan[0].nombre);
    $('#lbl_descripcion').text(plan[0].detalles);
    $('#lbl_dias').text(plan[0].dias);
    $('#lbl_costo').text('$' + plan[0].costo);
    $('#lbl_estatus').text(plan[0].status);
    $('#ul_servicios').empty();
    services.forEach(e => {
        $('#ul_servicios').append(
            '<li>' + e.nombre_service + '</li>'
        );
    });

});

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
            var res = cargar_ajax.run_server_ajax("planes/delete_plan", data);
            if (res == true) {
                Swal.fire(
                    'Eliminado!',
                    'El Rol "' + nombre + '" ha sido eliminado.',
                    'success'
                ).then((result) => {
                    window.location = base_url + "planes";
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