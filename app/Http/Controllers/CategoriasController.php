<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriasController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Obtener información de la base de datos
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('categorias.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Usa el modelo para mandar la información a la BD
        Categoria::create([
            // <NombreFormulario => $request-><NombreBD>
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);
        // Redireccionar al usuario al formulario
        return redirect()->route('categorias.index')
        ->with('success', 'Categoria registrada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Editar usuarios
     */
    public function edit(Categoria $categoria)
    {
        //
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualizar registro
     */
    public function update(Request $request, Categoria $categoria)
    {

        // Crear la validación para el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        // Indicar actualización de todos los campos
        $categoria->update($request->all());

        // Redirigir al usuario al index y enviarle un mensaje
        return redirect()->route('categorias.index')
        ->with('success', 'Actualización de categoria exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        // Función para eliminar registro.
        $categoria -> delete();

        return redirect()->route('categorias.index')
        ->with('success', 'Categoria eliminada');
    }
}
