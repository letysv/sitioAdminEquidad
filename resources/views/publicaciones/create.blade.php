@extends('adminlte::page')
@section('title','Publicaciones - Crear')
@section('content')
    <form action="{{ route('publicaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="apartado">Apartado:</label>
            <select class="form-control" id="apartado" name="apartado" required>
                <option value="">Seleccione un apartado:</option>
                <option value="1">Legislación sobre mujeres</option>
                <option value="2">Documentos CEIGyDH</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar publicación</button>
        <a href="{{route('publicaciones.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
