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

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-layer-group"></i></span>
            <input type="text" name="categoria" placeholder="Categoria" class="form-control">
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
            <a href="{{ route('prendas.index') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-eye"></i> Ver Prendas
            </a>
        </div>

    @endsection
</body>
</html>