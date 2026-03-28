<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>

    @extends('layouts.app')
    @section('content')
<center><h1>Inicio de sesión</h1></center>
    <form action="{{ route('acceso.store') }}" method="POST">

        @csrf
        <input type="text" name="email" placeholder="Email" class="form-control"> 
        <br>      
        <input type="text" name="password" placeholder="Contraseña" class="form-control">
        <br>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('registro') }}" class="btn btn-outline-success">
             Crear cuenta
        </a>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('registroAdmin') }}" class="btn btn-outline-primary">
             Crear cuenta de administrador
        </a>

    </div>

    @endsection
</body>
</html>