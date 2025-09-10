@extends('adminlte::page')
@section('title','Categorías - Inicio')
@section('content')
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Categoría</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar categoría</button>
        <a href="{{route('categorias.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
