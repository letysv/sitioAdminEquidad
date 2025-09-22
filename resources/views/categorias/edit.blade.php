@extends('adminlte::page')
@section('title', 'Categorías - Actualizar')
@section('content')

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Categoría</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$categoria->titulo}}" required>
        </div>
        <div class="form-group" hidden>
            <input type="number" class="form-control" id="categoria_id" name="categoria_id" value="{{$categoria->id}}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar categoría</button>
        <a href="{{route('categorias.index')}}" class="btn btn-secondary">Cancelar</a>
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
