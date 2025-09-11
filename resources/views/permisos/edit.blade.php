@extends('adminlte::page')
@section('title', 'Permisos - Actualizar')
@section('content')

    <form action="{{ route('permisos.update', $permisos->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del permiso</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$permisos->name}}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar permiso</button>
        <a href="{{route('permisos.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection