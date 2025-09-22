@extends('adminlte::page')
@section('title','Enlaces - Crear')
@section('content')
    <form action="{{ route('enlaces.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" required>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar enlace</button>
        <a href="{{route('enlaces.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
