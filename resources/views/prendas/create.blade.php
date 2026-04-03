<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>REGISTRO DE PRENDAS</h1>
    <br>

    <form action="{{ route('prendas.store') }}" method="POST">

        @csrf

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-shirt"></i></span>
            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        </div>

        <div  class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-layer-group"></i></span>
            <select name="categoria_id" class="form-control" required>
                <option value="">Selecciona una categoría</option>

                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                @endforeach

            </select>
        </div>
         
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-brush"></i></span>
            <input type="text" name="color" placeholder="Color" class="form-control">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-ruler-vertical"></i></i></span>
            <input type="text" name="talla" placeholder="Talla" class="form-control">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="number" name="precio" placeholder="Precio" class="form-control">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-arrow-trend-up"></i></span>
            <input type="number" name="stock" placeholder="Stock" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

      <div class="d-flex justify-content-end mb-2">
      <div class="d-flex justify-content-end mb-2 me-3">
            <a href="{{ route('prendas.index') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-eye"></i> Ver prendas
            </a>
        </div>
        <div class="d-flex justify-content-end mb-2 me-3">
        <a href="{{ route('prendas.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i> Regresar
        </a>
    </div>
    </div>

    @endsection
</body>
</html>