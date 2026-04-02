<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Metodo para regresar vista del formulario
    public function registerForm(){
        return view('auth.register');
    }

    // Metodo para guardar la información en la BD
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',        
        ]);

        $user = User::create([
            'name' => $request -> name,            
            'email' => $request -> email,
            'phone' => $request -> phone,
            'password' =>  Hash::make($request -> password),      
        ]);

        // Iniciar sesión de forma automatica
        Auth::login($user);

        return redirect()->route('registro')
        ->with('success', 'Cuenta creada exitosamente');
    }

    //Metodo para regresar a la vista del formulario de registro para administradores
    public function registerAdmin(){
        return view('auth.registerAdmin');
    }

    //Metodo para guardar la información del nuevo usuario administrador en la BD
    public function registrodeAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',        
        ]);

        User::create([
            'name' => $request -> name,            
            'email' => $request -> email,
            'phone' => $request -> phone,
            'password' =>  Hash::make($request -> password),  
            'is_admin' => $request->has('is_admin'),    
        ]);

        return redirect()->route('admin-dashboard');
    }

    // Metodo para regresar vista de inicio de sesión
    public function loginForm(){
        return view('auth.login');
    }
    // Método para verificar el inicio de sesión
    public function login(Request $request){

    // VALIDACIÓN
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'El correo es obligatorio',
        'email.email' => 'El correo no es válido',
        'password.required' => 'La contraseña es obligatoria',
    ]);

    // LOGIN
    if(Auth::attempt($data)){
        $request->session()->regenerate();
        return redirect()->route('prendas.index')
            ->with('success', 'Bienvenido');
    }

    // ERROR DE LOGIN
    return back()->withErrors([
        'email' => 'Correo o contraseña incorrectos',
    ]);
}

    public function logout(Request $request){

    // Cierre de sesión
    Auth::logout();

    // Cierre de credenciales en sesiones
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/acceso');
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
