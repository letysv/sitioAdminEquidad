@extends('adminlte::page')
@section('title','Equipo - Crear')
@section('content')
    <form action="{{ route('equipo.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="puesto">Descripción del puesto</label>
            <input type="text" class="form-control" id="puesto" name="puesto" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="number" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="form-group">
            <label for="extension">Extensión</label>
            <input type="number" class="form-control" id="extension" name="extension">
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="text" class="form-control" id="correo" name="correo">
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar miembro</button>
        <a href="{{route('equipo.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
