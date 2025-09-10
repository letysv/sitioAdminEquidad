@extends('adminlte::page')
@section('title', 'Permisos - Inicio')
@section('content')
    <a class="btn btn-secondary mb-2" href="{{ route('permisos.create') }}">Crear permiso</a>

    <div class="card-body">
        <table class="table table-light table-hover table-small" id="permisosTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="text-left">Nombre del permiso</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td class="text-left align-middle">{{ $permiso->name }}</td>
                        <td width="10px">
                            <a class="btn btn-primary" href="{{ route('permisos.edit', $permiso) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection
@section('css')
    <link rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.css">
    
@endsection
@section('js')
    <script>
    $(document).ready(function() {
        var tabla = $('#permisosTable');
        var dt = tabla.DataTable({
            language: {
                "processing": 'Procesando...',
                "lengthMenu": 'Mostrar _MENU_ registros',
                "zeroRecords": 'No se encontraron resultados',
                "emptyTable": 'Ningún dato disponible en esta tabla',
                "info": 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                "infoEmpty": 'Mostrando registros del 0 al 0 de un total de 0 registros',
                "infoFiltered": '(filtrado de un total de _MAX_ registros)',
                "search": 'Buscar:',
                "paginate": {
                    "first": 'Primero',
                    "last": 'Último',
                    "next": 'Siguiente',
                    "previous": 'Anterior'
                },
            },
            processing: true,
            responsive: true,
            order: [
                [1, 'asc']
            ], // Ordenar por la primera columna de forma descendente
        });        

            // dt.columns.adjust().draw();
        });
    </script>
@endsection