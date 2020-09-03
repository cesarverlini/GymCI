$(document).ready(function() {
    // $('#employee').select2();
    $('.error').hide();

});
var base_url = $('#base_url').val();
$('#form_new_user').validate({
    invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
            // var message = errors == 1 ?
            //     'You missed 1 field. It has been highlighted' :
            //     'You missed ' + errors + ' fields. They have been highlighted';
            // console.log(message);
            $('.error').show();
        } else {
            $('.error').hide();
        }
    }
});


$('#form_new_user').submit(function(event) {
    event.preventDefault();

    var data = {
        'id_employee': $('#employee').val(),
        'user': $('#user').val(),
        'password': $('#password').val(),
        'user_rol': $('#user_rol').val()
    };

    var res = cargar_ajax.run_server_ajax("users/save_user", data);
    if (res) {
        Swal.fire({
            icon: 'success',
            title: 'Guardado Correctamente',
        }).then((result) => {
            // if (result.value) {
            window.location = base_url + "usuarios";
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



$('#employee').autocomplete({
    source: function(req, res) {
        $.ajax({
            url: base_url + "users/autocomplete_employee",
            type: 'post',
            dataType: "json",
            data: {
                search: req.term
            },
            success: function(data) {
                // console.log(data);
                res($.map(data, function(value, key) {
                    return {
                        label: value.nombre + " " + value.apellido_paterno + " " + value.apellido_materno,
                        // value: key.correo,
                        // nombre: value.nombre_completo,
                        // telefono: value.telefono,
                        // id: value.id
                    };
                }));
            }
        });
    },
    select: function(event, selectedData) {
        $('#nombre,#correo,#telefono').attr('readonly', true);
        $('#nombre').val(selectedData.item.nombre);
        $('#id_cliente').val(selectedData.item.id);
        $('#correo').val(selectedData.item.label);
        $('#telefono').val(selectedData.item.telefono);

    }
});