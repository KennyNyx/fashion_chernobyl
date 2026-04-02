<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8',
            'is_admin' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

        return redirect()->route('admin.index')
            ->with('success', 'Usuario registrado');
    }

    public function edit(User $admin) //nombre igual a la ruta
    {
        return view('admin.edit', ['usuario' => $admin]);
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'is_admin' => 'required',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->is_admin = $request->is_admin;

        // SOLO si escribe contraseña nueva
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.index')
            ->with('success', 'Actualización exitosa');
    }

    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Usuario eliminado');
    }
}