<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notas;
use App\Models\NotasItems;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Notas::all();
        return view('notas.index', compact('notas'));
    }

    /**
 * Nota específica en json
 */
    public function apiNota($id)
    {
        // $nota = Notas::find($id);
        $nota = Notas::with('items')->find($id);
        if ($nota) {
            return response()->json($nota);
        } else {
            return response()->json(['error' => 'Nota no encontrada'], 404);
        }
    }

    /**
     * Colección de notas con sus items en json
     */
    public function apiNotas()
    {
        $notas = Notas::with('items')->get();
        return response()->json($notas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nota = new Notas();
        $nota->fecha = $request->input('fecha');
        $nota->nombre = $request->input('nombre');
        $nota->descripcion = $request->input('descripcion');
        $nota->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $nota->save();
        return redirect()->route('notas.edit', $nota->id)->with('success', 'Nota creada exitosamente.');
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
        $nota = Notas::findOrFail($id); // Encuentra la nota o devuelve 404
        $items = $nota->items(); // Assuming you have a relationship defined in the Notas model
        $items = NotasItems::where('nota_id', $id)->get(); // Assuming you have a NotasItems model for items related to the note
    
        return view('notas.edit', compact('nota','items'));
    }

     public function cambiarActivo(Request $request, $id)
    {
        $nota = Notas::findOrFail($id);
        $nota->activo = $request->activo;
        $nota->save();

        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nota = Notas::find($id);
        $nota->fecha = $request->input('fecha');
        $nota->nombre = $request->input('nombre');
        $nota->descripcion = $request->input('descripcion');
        $nota->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $nota->save();
        return redirect()->route('notas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
