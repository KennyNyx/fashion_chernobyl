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

    <h1>EDITAR PRENDA: {{ $prenda->nombre }}</h1>
    <form action="{{ route('prendas.update', $prenda) }} " method="POST">

        <!-- OBLIGATORIO -->
        @csrf
        <!-- Indicar método para actualizar un registro -->
        @method('PUT')
        <input value="{{ $prenda->nombre }}" type="text" name="nombre" placeholder="Nombre" class="form-control">
        <br>
        <select name="categoria_id" class="form-control">
            <option value="">Seleccione una categoría</option>

            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ $prenda->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        <br>    
        <input value="{{ $prenda->color }}" type="text" name="color" placeholder="Color" class="form-control">
        <br>
        <input value="{{ $prenda->talla }}" type="text" name="talla" placeholder="Talla" class="form-control">
        <br>
        <input value="{{ $prenda->precio }}" type="number" name="precio" placeholder="Precio" class="form-control">
        <br>
        <input value="{{ $prenda->stock }}" type="number" name="stock" placeholder="Stock" class="form-control">
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