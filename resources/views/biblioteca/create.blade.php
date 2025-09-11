@extends('adminlte::page')
@section('title','Biblioteca - Crear')
@section('content')
    <form action="{{ route('biblioteca.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Seleccione una categoría:</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar libro</button>
        <a href="{{route('biblioteca.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
