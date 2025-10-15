<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Biblioteca;
use App\Models\Categorias;
use App\Models\BibliotecaItems;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $libro = Biblioteca::all();
        $biblioteca = Biblioteca::with('categoria')->get();
        
        return view('biblioteca.index', compact('biblioteca'));
    }

    /**
 * Libro específica en json
 */
    public function apiBiblioteca($id)
    {
        $biblioteca = Biblioteca::with('items')->find($id);
        // $biblioteca = Biblioteca::with(['items', 'categoria:id,titulo'])->get();
        if ($biblioteca) {
            return response()->json($biblioteca);
        } else {
            return response()->json(['error' => 'Libro no encontrado'], 404);
        }
    }

    /**
     * Colección de libros con sus items en json
     */
    public function apiBibliotecas()
    {
        $bibliotecas = Biblioteca::with(['items','categoria:id,titulo'])->get();
        return response()->json($bibliotecas);
    }

    public function apiLibrosPorCategoria($categoriaId)
    {
        // Buscar por ID de categoría numérico
        $libros = Biblioteca::with(['items', 'categoria:id,titulo'])
            ->where('categoria_id', $categoriaId)
            ->where('activo', true)
            ->get();
        
        // Si no encuentra por ID numérico, buscar por nombre de categoría (slug)
        if ($libros->isEmpty()) {
            $categoria = Categorias::where('titulo', 'like', '%' . str_replace('-', ' ', $categoriaId) . '%')
                ->first();
            
            if ($categoria) {
                $libros = Biblioteca::with(['items', 'categoria:id,titulo'])
                    ->where('categoria_id', $categoria->id)
                    ->where('activo', true)
                    ->get();
            }
        }
        
        return response()->json($libros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all(); 
        
        return view('biblioteca.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Biblioteca();
        $libro->titulo = $request->input('titulo');
        $libro->categoria_id = $request->input('categoria_id'); 
        $libro->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $libro->save();
        return redirect()->route('biblioteca.edit', $libro->id)->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Biblioteca::findOrFail($id); // Encuentra el publicacion o devuelve 404
        $categorias = Categorias::all(); 
        $items = $libro->items(); // Assuming you have a relationship defined in the Avisos model
        $items = BibliotecaItems::where('biblioteca_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('biblioteca.edit', compact('libro','categorias','items'));
    }

    public function cambiarActivo(Request $request, $id)
    {
        $libro = Biblioteca::findOrFail($id);
        $libro->activo = $request->activo;
        $libro->save();

        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Biblioteca::find($id);
        $libro->titulo = $request->input('titulo');
        $libro->categoria_id = $request->input('categoria_id'); 
        $libro->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $libro->save();
        return redirect()->route('biblioteca.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
