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

    <h1>REGISTRO DE CATEGORIAS</h1>
    <br>

    <form action="{{ route('categorias.store') }}" method="POST">

        @csrf

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-shirt"></i></span>
            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-layer-group"></i></span>
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

    <div class="d-flex justify-content-end mb-2">
      <div class="d-flex justify-content-end mb-2 me-3">
            <a href="{{ route('categorias.index') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-eye"></i> Ver categorias
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