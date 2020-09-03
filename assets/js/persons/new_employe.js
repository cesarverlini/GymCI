$(document).ready(function() {});
var base_url = $('#base_url').val();

function previewImage(event) {
    var reader = new FileReader();
    var imagen = document.getElementById('imagefield');

    reader.onload = function() {
        if (reader.readyState == 2) {
            imagen.src = reader.result;
        }
    }

    reader.readAsDataURL(event.target.files[0]);
}

$('#form_new_employee').submit(function(event) {
    event.preventDefault();

    var data = new FormData(document.getElementById('form_new_employee'));

    $.ajax({
        url: 'persons/save_employe',
        type: 'post',
        data: data,
        method: "post",
        processData: false,
        contentType: false,
        success: function(res) {
            if (res) {
                Swal.fire({
                    icon: 'success',
                    title: 'Guardado Correctamente',
                }).then((result) => {
                    // if (result.value) {
                    window.location = base_url + "empleados";
                    // }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Lo sentimos, hubo un error al guardar, intente de nuevo',
                })
            }
        },
    });
});