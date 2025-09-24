@extends('adminlte::page')
@section('title','Notas - Crear')
@section('content')
    <form action="{{ route('notas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar nota</button>
        <a href="{{route('notas.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection