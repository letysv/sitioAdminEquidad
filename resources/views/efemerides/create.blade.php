@extends('adminlte::page')
@section('title','Efemérides - Crear')
@section('content')
    <form action="{{ route('efemerides.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input
                type="date"
                class="form-control"
                id="fecha"
                name="fecha"
                value="{{ 'fecha', now()->format('Y-m-d') }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar efeméride</button>
        <a href="{{route('efemerides.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
