@extends('adminlte::page')
@section('title','Informes legislativos - Inicio')
@section('content')
    @can('informes.create')
        <a class="btn btn-secondary mb-2" href="{{route('informes.create')}}">Crear informe</a>
    @endcan
    <div class="card">
        <div class="card-body">
            <table class="table table-light table-hover table-small" id="informesTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-left">Titulo</th>
                        @can('informes.activate')
                        <th class="text-center">Activo</th>
                        @endcan
                        @can('informes.edit')
                        <th class="text-center">Acción</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informes as $informe)
                        <tr> 
                            <td class="text-center align-middle">{{ $informe->id }}</td>
                            <td class="text-left align-middle">{{ $informe->titulo }}</td>
                            @can('informes.activate')
                            <td class="text-center align-middle">
                                {{-- Checkbox para cambiar el estado activo de la nota --}}
                                <input class="cambiar-activo" type="checkbox" role="switch" id="cambiar-activo" data-id="{{ $informe->id }}" {{ $informe->activo ? 'checked' : '' }}>
                            </td>
                            @endcan
                            <td width="10px">
                                @can('informes.edit')
                                    <a class="btn btn-primary" href="{{ route('informes.edit', $informe->id) }}">Editar</a>
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
    <style>
        .cambiar-activo {
            transform: scale(1.5);
            cursor: pointer;
        }
    </style>
@endsection

@section('js')
    <script>
    $(document).ready(function() {
        var tabla = $('#informesTable');
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

        // Manejar cambio de checkbox
        $(document).on('change', '#cambiar-activo', function() {
            var checkbox = $(this);
            var informeId = checkbox.data('id');
            var isChecked = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '/informes/' + informeId + '/cambiaractivo',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    activo: isChecked
                },
                success: function(response) {
                    // Opcional: mostrar mensaje de éxito
                    // console.log('Estado actualizado correctamente');
                },
                error: function() {
                    // Revertir checkbox si hay error
                    checkbox.prop('checked', !checkbox.is(':checked'));
                    alert('Error al actualizar el estado');
                }
            });
        });

            // dt.columns.adjust().draw();
        });
    </script>
@endsection