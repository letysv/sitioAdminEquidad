@extends('adminlte::page')
@section('title', 'Usuarios - Actualizar')
@section('content')

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$usuario->name}}" required>
        </div>
        
        <div class="form-group">
            <label for="extension">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$usuario->email}}" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label>Asignar rol</label>
            @foreach ($roles as $rol)
                @if(!($rol->name == 'Adm-desarrollador' && auth()->user()->hasRole('Administrador')))
                    <div class="form-check">
                        <input type="radio" 
                            class="form-check-input" 
                            id="role_{{ $rol->id }}" 
                            name="role" 
                            value="{{ $rol->name }}"
                            {{ $usuario->hasRole($rol->name) ? 'checked' : '' }}>
                        <label class="form-check-label" for="role_{{ $rol->id }}">
                            {{ $rol->name }}
                        </label>
                    </div>
                @endif
            @endforeach
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
        <a href="{{route('usuarios.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection