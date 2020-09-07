$(document).ready(function() {});

var base_url = $('#base_url').val();
$('#from_service').validate();
$('#from_service').submit(function(event) {
    event.preventDefault();

    var data = {
        'nombre': $('#nombre').val(),
        'descripcion': $('#descripcion').val(),
    };

    var res = cargar_ajax.run_server_ajax("services/save_services", data);

    if (res) {
        Swal.fire({
            icon: 'success',
            title: 'Guardado Correctamente',
        }).then((result) => {
            // if (result.value) {
            window.location = base_url + "servicios";
            // }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lo sentimos, hubo un error al guardar, intente de nuevo',
        })
    }

});