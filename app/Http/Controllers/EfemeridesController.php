<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Efemerides;
use App\Models\EfemeridesItems;

class EfemeridesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $efemerides = Efemerides::all();
        $efemerides = Efemerides::orderBy('fecha')->get();

        return view('efemerides.index', compact('efemerides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('efemerides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $efemeride = new Efemerides();
        $efemeride->nombre = $request->input('nombre');
        $efemeride->fecha = $request->input('fecha');
        $efemeride->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $efemeride->save();
        return redirect()->route('efemerides.edit', $efemeride->id)->with('success', 'Efemeride creada exitosamente.');
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
        $efemeride = Efemerides::findOrFail($id); // Encuentra el efemeride o devuelve 404
        $items = $efemeride->items(); // Assuming you have a relationship defined in the Avisos model
        $items = EfemeridesItems::where('efemeride_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('efemerides.edit', compact('efemeride','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $efemeride = Efemerides::find($id);
        $efemeride->nombre = $request->input('nombre');
        $efemeride->fecha = $request->input('fecha');
        $efemeride->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $efemeride->save();
        return redirect()->route('efemerides.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
