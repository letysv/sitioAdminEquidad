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
            <label for="apartado_id">Apartado</label>
            <select class="form-control" id="apartado_id" name="apartado_id" required>
                <option value="">Seleccione un apartado</option>
                @foreach($apartados as $apartado)
                    <option value="{{ $apartado->id }}">{{ $apartado->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar publicación</button>
        <a href="{{route('publicaciones.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
