<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prenda;
use App\Models\Categoria;
use Illuminate\Support\Facades\Http;

class PrendasController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Obtener información de la base de datos
        $prendas = Prenda::all();
        return view('prendas.index', compact('prendas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
      
        $categorias = Categoria::all();
        return view('prendas.create', compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        Prenda::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'color' => $request->color,
            'talla' => $request->talla,
            'precio' => $request->precio,
            'stock' => $request->stock
        ]);

        return redirect()->route('prendas.index')
            ->with('success', 'Prenda creada correctamente');
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
    public function edit(Prenda $prenda)
    {
        //
        $categorias = Categoria::all(); // 👈 traer todas
        return view('prendas.edit', compact('prenda', 'categorias'));
    }

    /**
     * Actualizar registro
     */
    public function update(Request $request, Prenda $prenda)
    {

        // Crear la validación para el formulario
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'color' => 'required',
            'talla' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);
        // Indicar actualización de todos los campos
        $prenda->update($request->all());

        // Redirigir al usuario al index y enviarle un mensaje
        return redirect()->route('prendas.index')
        ->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenda $prenda)
    {
        // Función para eliminar registro.
        $prenda -> delete();

        return redirect()->route('prendas.index')
        ->with('success', 'Prenda eliminada');
    }



public function home()
{
    // Obtener todos los productos
    $products = Http::get('https://api.escuelajs.co/api/v1/products')
        ->json();

    // Obtener categorías
    $categories = Http::get('https://api.escuelajs.co/api/v1/categories')
        ->json();

    return view('prendas.home', compact('products', 'categories'));
}
}
