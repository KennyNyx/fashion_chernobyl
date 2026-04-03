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

    <center><h1>Categorias</h1></center>

    @include('partials.alerts')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>                
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>

                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline">
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
    <div class="d-flex justify-content-end mb-2">
     <div class="d-flex justify-content-end mb-2 me-3">
        <a href="{{ route('prendas.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i> Regresar
        </a>
        </div>
    </div>
   
    @endsection
</body>
</html>