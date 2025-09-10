@extends('adminlte::page')
@section('title', 'Usuarios - Inicio')
@section('content')
    @can('usuarios.create')
        <a class="btn btn-secondary mb-2" href="{{ route('usuarios.create') }}">Crear usuario</a>
    @endcan
    <div class="card-body">
        <table class="table table-light table-hover table-small" id="usuariosTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    @can('usuarios.edit')
                    <th>Acción</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                {{-- Si el usuario tiene el rol 'Adm-desarrollador' y el usuario autenticado no es 'Adm-desarrollador', no mostrarlo--}}
                @if(!($usuario->hasRole('Adm-desarrollador') && auth()->user()->hasRole('Administrador')))
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->rol ? $usuario->rol->name : '' }}</td>
                        <td>{{ $usuario->email }}</td>
                        @can('usuarios.edit')
                        <td width="10px">
                            <a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
                        </td>
                        @endcan
                    </tr>
                    @endif
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
        var tabla = $('#usuariosTable');
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