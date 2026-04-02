<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver usuarios</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>Usuarios</h1>

    <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('admin.create') }}" class="btn btn-success me-3">
       <i class="fa-solid fa-plus"></i> Nuevo usuario
    </a>
    <form action="{{ route('cerrar') }}" method="POST">
        @csrf
        <button class="btn btn-danger me-3">Cerrar sesión</button>
    </form>

    </div>  

    @include('partials.alerts')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>                
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th>CONTRASEÑA</th>
                <th>ES ADMINISTRADOR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>

                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->phone }}</td>
                    <td>****************</td>
                   <td>{{ $usuario->is_admin ? 'Sí' : 'No' }}</td>
                    <td>
                    @if(auth()->id() != $usuario->id)
                        <!-- Puede editar a otros -->
                        <a href="{{ route('admin.edit', $usuario) }}">
                            <button class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>

                        <form action="{{ route('admin.destroy', $usuario) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button 
                                class="btn btn-danger"
                                onclick="return confirm('¿Eliminar el registro?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @else
                        <!-- Es el usuario actual -->
                        <span class="badge bg-secondary mb-2">No editable</span>
                    @endif
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
     <div class="d-flex justify-content-end mb-2 me-3">
        <a href="{{ route('prendas.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i> Regresar
        </a>
    </div>
    @endsection
</body>
</html>