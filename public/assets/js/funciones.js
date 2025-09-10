function guardarArchivo(data, urlProceso) {
    console.log('=== Contenido de FormData ===');
    for (let [key, value] of data.entries()) {
        console.log(key + ':', value);
    }
    console.log(urlProceso);
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: urlProceso,
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
    }).done(function (response) {
        switch (response.data.respuesta) {
            case 0:
                alertError(response.message);
                break;
            case 1:
                alertSuccess(response.message);
                setTimeout(function () {
                    window.location.replace(response.data.redirect);
                }, 1500);
                break;
            default:

                alertError('Hubo un error al intentar guardar');
                break;
        }
    }).fail(function (response) {
        if (response.responseJSON != undefined) {
            alertError(response.responseJSON.message);
        } else {
            alertError('Error al enviar el archivo');
        }
        console.log(response);
    });
}

function validar(formId) {
    var isValid = true;
    $('#' + formId + ' [required]').each(function () {
        if ($(this).val() === '' || $(this).val() === '0') {
            isValid = false;
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
    return isValid;
}

function alertSuccess(mensaje = "Operación realizada con éxito") {
    Swal.fire({
        html: `
        <h4 class="mb-0">
        </h4>
        <p style="color: #4caf50">${mensaje}</p>
        `,
        confirmButtonColor: '#4caf50',
    });
}

function alertError(mensaje = "Ocurrió un error inesperado") {
    Swal.fire({
        html: `
        <h4 class="mb-0">Error</h4>
        <p style="color: #d33">${mensaje}</p>
        `,
        confirmButtonColor: '#d32f2f',
    });
}
function alertWarning(mensaje = "Aviso") {
    Swal.fire({
        html: `
        <h4 class="mb-0">Aviso</h4>
        <p style="color: #FFC107">${mensaje}</p>
        `,
        confirmButtonColor: '#FFC107',
    });
}