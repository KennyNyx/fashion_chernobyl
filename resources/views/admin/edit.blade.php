@extends('layouts.app')

@section('content')

<h1>Editar usuario: {{ $usuario->name }}</h1>

<form action="{{ route('admin.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input value="{{ $usuario->name }}" type="text" name="name" class="form-control">
    <br>

    <input value="{{ $usuario->email }}" type="email" name="email" class="form-control">
    <br>

    <input value="{{ $usuario->phone }}" type="text" name="phone" class="form-control">
    <br>

    <!-- NO mostrar contraseña -->
    <input type="password" name="password" class="form-control" placeholder="Nueva contraseña (opcional)">
    <br>

    <select name="is_admin" class="form-control">
        <option value="1" {{ $usuario->is_admin ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ !$usuario->is_admin ? 'selected' : '' }}>No</option>
    </select>
    <br>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<div class="d-flex justify-content-end mb-2">
        <a href="{{ route('admin.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i> Regresar
        </a>
    </div>

@endsection