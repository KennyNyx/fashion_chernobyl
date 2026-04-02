<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prenda;
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
        return view('prendas.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Usa el modelo para mandar la información a la BD
        Prenda::create([
            // <NombreFormulario => $request-><NombreBD>
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'color' => $request->color,
            'talla' => $request->talla,
            'precio' => $request->precio,
            'stock' => $request->stock
        ]);
        // Redireccionar al usuario al formulario
        return redirect()->route('prendas.index')
        ->with('success', 'Prenda registrada');
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
        return view('prendas.edit', compact('prenda'));
    }

    /**
     * Actualizar registro
     */
    public function update(Request $request, Prenda $prenda)
    {

        // Crear la validación para el formulario
        $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
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
}
