@extends('adminlte::page')
@section('title', 'Roles - Inicio')
@section('content')
    <a class="btn btn-secondary mb-2" href="{{ route('roles.create') }}">Crear rol</a>

    <div class="card-body">
        <table class="table table-light table-hover table-small" id="rolesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de rol </th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->name }}</td>
                        <td width="10px">
                            <a class="btn btn-primary" href="{{ route('roles.edit', $rol) }}">Editar</a>
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
        var tabla = $('#rolesTable');
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
                [0, 'desc']
            ], // Ordenar por la primera columna de forma descendente
        });        

            // dt.columns.adjust().draw();
        });
    </script>
@endsection