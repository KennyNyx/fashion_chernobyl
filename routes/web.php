<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriasController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {

    // Generar rutas de todos los metodos del controlador
    Route::resource('prendas', PrendasController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('categorias', CategoriasController::class);
});


// Crear ruta para la vista de actualización de un registro
Route::get('/prendas/{id}/edit', [
    PrendasController::class, 'edit'
])->name('prendas.edit');

// Crear ruta para actualizar el registro
Route::get('prendas/{id}', [
    PrendasController::class, 'update'
])->name('prendas.update');

// Crear ruta para la vista de actualización de un registro
Route::get('/categorias/{id}/edit', [
    CategoriasController::class, 'edit'
])->name('categorias.edit');

// Crear ruta para actualizar el registro
Route::get('categorias/{id}', [
    CategoriasController::class, 'update'
])->name('categorias.update');

// Ruta para el formulario de registro
Route::get('/registro', [
    AuthController::class, 'registerform'
])->name('registro');

// Ruta para ejecutar el formulario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

// Ruta para manejar la vista del inicio de sesión
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

// Ruta para manejar los datos del inicio de sesión
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

// Ruta para cerrar sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    
   // Crear ruta para la vista de actualización de un registro
    Route::get('/admin/{id}/edit', [
        AdminController::class, 'edit'
    ])->name('admin.edit');

    // Crear ruta para actualizar el registro
    Route::get('admin/{id}', [
        AdminController::class, 'update'
    ])->name('admin.update');

});

Route::get('/productos', [PrendasController::class, 'home'])->name('productos');

