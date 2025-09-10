<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblioteca;
use App\Models\BibliotecaItems;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libro = Biblioteca::all();


        return view('biblioteca.index', compact('libro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biblioteca.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Biblioteca();
        $libro->titulo = $request->input('titulo');
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
        $items = $libro->items(); // Assuming you have a relationship defined in the Avisos model
        $items = BibliotecaItems::where('bliblioteca_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('biblioteca.edit', compact('libro','items'));
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
