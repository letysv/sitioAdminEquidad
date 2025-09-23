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

@endsection

@section('js')

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

@endsection
