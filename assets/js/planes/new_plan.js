$(document).ready(function() {
    $('#titulos').hide();

    var id = $('#id_plan').val();
    if (id) { load_plan(id); }
});
var plans = [];

var base_url = $('#base_url').val();

$('#add_service').on('click', function() {
    service_id = $('#service').val();
    if (service_id == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lo sentimos, tiene que elegir algun servicio',
        })
    } else {

        service_name = $("#service option:selected").text();
        plans.push({ 'nombre_service': service_name, 'id': service_id });

        if (plans.length > 0) {
            $('#titulos').show();
        }

        $('#tbody').empty();
        fill_table();
    }
});

function fill_table() {
    plans.forEach(e => {
        $('#tbody').append(
            '<tr>' +
            '<td>' + e.nombre_service + '</td>' +
            '<td style = "text-align: center;>' +
            '<div class = "btn-group" >' +
            '<button type = "button" class = "btn btn-danger btn-remove btn_delete" value = "' + e.id + '"> <span class="fas fa-trash-alt"></span></button>' +
            '</div> ' +
            '</td> ' +
            '</tr>'
        );
    });

    $('.btn_delete').on('click', function() {
        $('#tbody').empty();
        $('#titulos').hide();
        id = $(this).val();
        index = plans.findIndex(x => x.Id === id);
        plans.splice(index, 1);
        if (plans.length > 0) {
            $('#titulos').show();
            fill_table();
        }
    });
}
$('#form_new_plan').validate();
$('#form_new_plan').submit(function(event) {
    event.preventDefault();
    if (plans.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lo sentimos, es necesario agregar al menos un servicio',
        })
    } else {
        var data = {
            'id': $('#id_plan').val(),
            'codigo': $('#codigo').val(),
            'nombre': $('#nombre').val(),
            'detalles': $('#detalles').val(),
            'dias': $('#dias').val(),
            'costo': $('#costo').val(),
            'status': $('#status').val(),
            'servicios': plans
        };

        var res = cargar_ajax.run_server_ajax("planes/save_planes", data);

        if (res) {
            Swal.fire({
                icon: 'success',
                title: 'Guardado Correctamente',
            }).then((result) => {
                // if (result.value) {
                window.location = base_url + "planes";
                // }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lo sentimos, hubo un error al guardar, intente de nuevo',
            })
        }
    }

});

function load_plan(id) {

    var res = cargar_ajax.run_server_ajax("planes/get_plan", { 'id': id });
    var plan = res.plan;
    var services = res.services;
    plans = services;
    $('#codigo').val(plan[0].codigo);
    $('#nombre').val(plan[0].nombre);
    $('#detalles').val(plan[0].detalles);
    $('#dias').val(plan[0].dias);
    $('#costo').val(plan[0].costo);
    $('#status').val(plan[0].status);

    $('#titulos').show();
    fill_table();


}