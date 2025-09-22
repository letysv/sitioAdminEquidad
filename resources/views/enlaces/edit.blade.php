@extends('adminlte::page')
@section('title', 'Enlaces - Actualizar')
@section('content')

    <form action="{{ route('enlaces.update', $enlace->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$enlace->titulo}}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $enlace->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{$enlace->link}}" required>
        </div>
        <div class="form-group" hidden>
            <input type="number" class="form-control" id="enlace_id" name="enlace_id" value="{{$enlace->id}}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar enlace</button>
        <a href="{{route('enlaces.index')}}" class="btn btn-secondary">Cancelar</a>
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
