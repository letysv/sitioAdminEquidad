@extends('adminlte::page')
@section('title','Enlaces - Inicio')
@section('content')
    @can('enlaces.create')
        <a class="btn btn-secondary mb-2" href="{{route('enlaces.create')}}">Crear enlace</a>
    @endcan
    <div class="card">
        <div class="card-body">
            <table class="table table-light table-hover table-small" id="enlacesTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-left">Titulo</th>
                        <th class="text-left">Link</th>
                        @can('enlaces.edit')
                        <th class="text-center">Acción</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enlaces as $enlace)
                        <tr> 
                            <td class="text-center align-middle">{{ $enlace->id }}</td>
                            <td class="text-left align-middle">{{ $enlace->titulo }}</td>
                            <td class="text-left align-middle">{{ $enlace->link }}</td>
                            <td width="10px">
                                @can('enlaces.edit')
                                    <a class="btn btn-primary" href="{{ route('enlaces.edit', $enlace->id) }}">Editar</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
@endsection

@section('css')
    <link rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.css">
@endsection

@section('js')
    <script>
    $(document).ready(function() {
        var tabla = $('#enlacesTable');
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