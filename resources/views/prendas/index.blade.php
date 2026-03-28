<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver prendas</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>Prendas</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('prendas.create') }}" class="btn btn-success me-3">
        <i class="fa-solid fa-plus"></i> Nueva prenda
        </a>
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf

            <button class="btn btn-danger me-3">Cerrar sesión</button>
        </form>
        @if(auth()->user()->is_admin)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary">
                Panel Admin
            </a>
        @endif
    </div>  

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>                
                <th>NOMBRE</th>
                <th>CATEGORIA</th>
                <th>COLOR</th>
                <th>TALLA</th>
                <th>PRECIO</th>
                <th>STOCK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prendas as $prenda)
                <tr>

                    <td>{{ $prenda->id }}</td>
                    <td>{{ $prenda->nombre }}</td>
                    <td>{{ $prenda->categoria }}</td>
                    <td>{{ $prenda->color }}</td>
                    <td>{{ $prenda->talla }}</td>
                    <td>{{ $prenda->stock }}</td>
                    <td>{{ $prenda->precio }}</td>
                    <td>
                        <a href="{{ route('prendas.edit', $prenda) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        
                        <form action="{{ route('prendas.destroy', $prenda) }}" method="POST" class="d-inline">
                            <!-- Uso obligatorio del metodo-->
                            @csrf
                            @method('DELETE')

                            <button 
                            class="btn btn-danger"
                            onclick="return confirm('¿Eliminar el registro?')">
                            <i class="fa-solid fa-trash"></i>
                            </button>

                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>