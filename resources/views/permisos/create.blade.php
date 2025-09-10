@extends('adminlte::page')
@section('title','Permisos - Inicio')
@section('content')
    <form action="{{ route('permisos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del permiso</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar permiso</button>
        <a href="{{route('permisos.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection