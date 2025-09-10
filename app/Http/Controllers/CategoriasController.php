<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categorias();
        $categoria->titulo = $request->input('titulo');
        $categoria->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $categoria->save();
        return redirect()->route('categorias.edit', $categoria->id)->with('success', 'Categoría creada exitosamente.');
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
        $categoria = Categorias::findOrFail($id); // Encuentra el publicacion o devuelve 404
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categorias::find($id);
        $categoria->titulo = $request->input('titulo');
        $categoria->apartado = $request->input('apartado');
        $categoria->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
