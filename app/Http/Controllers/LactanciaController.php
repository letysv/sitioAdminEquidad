<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lactancia;
use App\Models\LactanciaItems;

class LactanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lactancia = Lactancia::all();

        return view('lactancia.index', compact('lactancia'));
    }

     
    public function apiLactancia($id)
    {
        
       $lactancia = Lactancia::with('items')->find($id);
        if ($lactancia) {
            return response()->json($lactancia);
        } else {
            return response()->json(['error' => 'Efemeride no encontrada'], 404);
        }
    }
    
    public function apiLactancias()
    {
        $lactancias = Lactancia::with('items')->get();
        return response()->json($lactancias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('lactancia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $lactancia = Lactancia::findOrFail($id); // Encuentra el efemeride o devuelve 404
        $items = $lactancia->items(); // Assuming you have a relationship defined in the Avisos model
        $items = LactanciaItems::where('lactancia_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('lactancia.edit', compact('lactancia','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lactancia = Lactancia::find($id);
        $lactancia->descripcion = $request->input('descripcion');
        $lactancia->save();
        return redirect()->route('lactancia.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
