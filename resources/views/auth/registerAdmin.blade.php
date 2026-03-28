<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>REGISTRO</h1>
    <br>

    <form action="{{ route('registro.store') }}"method="POST">

        <!-- Obligatorio -->
        @csrf
        <input type="text" name="name" placeholder="Nombre" class="form-control">
        <br><br>
        <input type="email" name="email" placeholder="Email" class="form-control">
        <br><br>
        <input type="text" name="phone" placeholder="Teléfono" class="form-control">
        <br><br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
        <br><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control">
        <br>
          <div class="form-check">
            <input type="checkbox" name="is_admin" value="1">
            <label for="is_admin"> Es administrador </label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('acceso') }}" class="btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i> Regresar
        </a>
    </div>
     @endsection
</body>
</html>