<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

    <h1>EDITAR CATEGORIA: {{ $categoria->nombre }}</h1>
    <form action="{{ route('categorias.update', $categoria) }} " method="POST">

        <!-- OBLIGATORIO -->
        @csrf
        <!-- Indicar método para actualizar un registro -->
        @method('PUT')
        <input value="{{ $categoria->nombre }}" type="text" name="nombre" placeholder="Nombre" class="form-control">
        <br>
        <input value="{{ $categoria->descripcion }}" type="text" name="descripcion" placeholder="Descripcion" class="form-control">
        <br>
       

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

    </form>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('prendas.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i> Regresar
        </a>
    </div>


    @endsection
</body>
</html>