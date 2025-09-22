@extends('adminlte::page')
@section('title','Informes legislativos - Crear')
@section('content')
    <form action="{{ route('informes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="ejercicio_id">Año legislativo</label>
            <select class="form-control" id="ejercicio_id" name="ejercicio_id" required>
                <option value="">Seleccione una año legislativo</option>
                @foreach($ejercicios as $ejercicio)
                    <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="periodo_id">Periodo legislativo</label>
            <select class="form-control" id="periodo_id" name="periodo_id" required>
                <option value="">Seleccione una periodo legislativo</option>
                @foreach($periodos as $periodo)
                    <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mr-3">Guardar informe</button>
        <a href="{{route('informes.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
