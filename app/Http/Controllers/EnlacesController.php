<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enlaces;

class EnlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enlaces = Enlaces::all();

        return view('enlaces.index', compact('enlaces'));
    }

    /**
 * Enlace específica en json
 */
    public function apiEnlace($id)
    {
        $enlace = Enlaces::find($id);
        if ($enlace) {
            return response()->json($enlace);
        } else {
            return response()->json(['error' => 'Enlace no encontrada'], 404);
        }
    }

    /**
     * Colección de enlance con sus items en json
     */
    public function apiEnlaces()
    {
        $enlaces = Enlaces::all();
        return response()->json($enlaces);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('enlaces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enlace = new Enlaces();
        $enlace->titulo = $request->input('titulo');
        $enlace->descripcion = $request->input('descripcion');
        $enlace->link = $request->input('link');
        $enlace->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $enlace->save();
        return redirect()->route('enlaces.edit', $enlace->id)->with('success', 'Enlace creado exitosamente.');
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
        $enlace = Enlaces::findOrFail($id); // Encuentra el publicacion o devuelve 404
        return view('enlaces.edit', compact('enlace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enlace = Enlaces::find($id);
        $enlace->titulo = $request->input('titulo');
        $enlace->descripcion = $request->input('descripcion');
        $enlace->link = $request->input('link');
        $enlace->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $enlace->save();
        return redirect()->route('enlaces.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
