@extends('adminlte::page')
@section('title','Actividades realizadas - Crear')
@section('content')
    <form action="{{ route('actividades.store') }}" method="POST">
        @csrf
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
        <div class="form-group">
            <label for="lugar">Lugar</label>
            <input type="text" class="form-control" id="lugar" name="lugar" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="evento_id">Actividad</label>
            <select class="form-control" id="evento_id" name="evento_id" required>
                <option value="">Seleccione una actividad</option>
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group">
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
        </div> --}}

        <button type="submit" class="btn btn-primary mr-3">Guardar actividad</button>
        <a href="{{route('actividades.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
