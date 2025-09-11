@extends('adminlte::page')
@section('title','Roles - Crear')
@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de rol</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Asignar permisos</label>
            <div>
                <button type="button" id="selectAll" class="btn btn-sm btn-outline-primary mb-2">Seleccionar todos</button>
            </div>

            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox" 
                           class="form-check-input permission-checkbox" 
                           id="permission_{{ $permission->id }}" 
                           name="permissions[]" 
                           value="{{ $permission->id  }}" >
                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Guardar rol</button>
        <a href="{{route('roles.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>

    @section('js')
    <script>
        $(document).ready(function() {
            // Botón para seleccionar/deseleccionar todos
            $('#selectAll').click(function() {
                // Verificar si todos están seleccionados
                let allChecked = $('.permission-checkbox:checked').length === $('.permission-checkbox').length;
            
                // Seleccionar o deseleccionar todos
                $('.permission-checkbox').prop('checked', !allChecked);
            
                // Cambiar el texto del botón
                $(this).text(allChecked ? 'Seleccionar todos' : 'Deseleccionar todos');
            });
        
            // Opcional: Cambiar texto del botón si todos están seleccionados al cargar la página
            if ($('.permission-checkbox:checked').length === $('.permission-checkbox').length && $('.permission-checkbox').length > 0) {
                $('#selectAll').text('Deseleccionar todos');
            }
        });
    </script>
    @endsection
@endsection