@extends('adminlte::page')
@section('title', 'Equipo - Actualizar')
@section('content')

    <form action="{{ route('equipo.update', $equipo->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$equipo->nombre}}" required>
        </div>
        <div class="form-group">
            <label for="puesto">Descripción del puesto</label>
            <input type="text" class="form-control" id="puesto" name="puesto" value="{{$equipo->puesto}}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{$equipo->telefono}}">
        </div>
        <div class="form-group">
            <label for="extension">Extensión</label>
            <input type="number" class="form-control" id="extension" name="extension" value="{{$equipo->extension}}">
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="text" class="form-control" id="correo" name="correo" value="{{$equipo->correo}}">
        </div>
        <div class="form-group" hidden>
            <input type="number" class="form-control" id="equipo_id" name="equipo_id" value="{{$equipo->id}}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar miembro</button>
        <a href="{{route('equipo.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>

<div class="card p-3 mt-4">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card-body">
                @if($items->count()>0)
                <table class="table table-light table-hover table-small" id="itemsTable">
                    <thead>
                        <tr>
                            <th>Archivo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            {{-- <td class="align-middle">{{ $item->descripcion }}</td> --}}
                            <td class="align-middle">{{ $item->archivo }}</td>
                            <td>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('equipo.item.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn" data-form-id="delete-form-{{ $item->id }}">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-info">
                    No hay items asociados a este miembro. Puedes agregar nuevos items utilizando el formulario de carga de archivos.
                </div>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card p-3">
                <form class="frmItems" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="ctrl_archivo" class="form-label">Archivo</label>
                                <input type="file" class="form-control" id="ctrl_archivo" name="ctrl_archivo" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="agregarItemEquipo">Agregar Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<!-- <link rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.css"> -->
@endsection

@section('js')

<script>
    //codigo nuevo para eliminar items
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const formId = this.getAttribute('data-form-id');
            const form = document.getElementById(formId);
            const idItem = formId.split('-')[2];
            
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                
                if (result.value) {
                   console.log(result.value); // Verifica el ID del item
                   form.submit(); // Envía el formulario si el usuario confirma
                
                }
            });
        });
    });

</script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            timer: 3000
        });
    </script>
@endif

<script>
    
    $("#agregarItemEquipo").click(function(event) {
        event.preventDefault();
        // var validate = validar('frmDocumentos');

        var data = new FormData();
        var archivo = $('#ctrl_archivo')[0].files[0]; // Obtiene el archivo seleccionado
        if (archivo) {
            var nombreArchivo = archivo.name; // Obtiene el nombre del archivo
        }
        data.append('archivo', $('#ctrl_archivo')[0].files[0]);
        // data.append('descripcion', $("#nombre_item").val());
        data.append('equipo_id', $("#equipo_id").val());

        guardarArchivo(data, "{{route('equipo.item.create')}}");

    });
</script>

@endsection