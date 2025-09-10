$("#btnAgregarArchivo").click(function (event) {
    event.preventDefault();
    var validate = validar('frmDocumentos');
    if (validate) {
        var data = new FormData();
        var archivo = $('#ctrl_archivo')[0].files[0]; // Obtiene el archivo seleccionado
        if (archivo) {
            var nombreArchivo = archivo.name; // Obtiene el nombre del archivo
        }
        data.append('archivo', $('#ctrl_archivo')[0].files[0]);
        data.append('nombre', nombreArchivo);
        data.append('rfc', $("#rfc").val());
        data.append('proveedor_id', $("#proveedor_id").val());
        data.append('nombre_documento', $("#nombre_documento").val());
        data.append('documento_id', $("#nombre_documento option:selected").text());

        guardarArchivo(data, "{{ route('documentos.store') }}");
    } else {
        alertWarning('Por favor complete los campos obligatorios');
    }
});