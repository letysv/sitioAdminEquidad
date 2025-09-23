<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\EquipoItems;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipo = Equipo::all();
        return view('equipo.index', compact('equipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipo = new Equipo();
        $equipo->nombre = $request->input('nombre');
        $equipo->puesto = $request->input('puesto');
        $equipo->telefono = $request->input('telefono');
        $equipo->extension = $request->input('extension');
        $equipo->correo = $request->input('correo');
        $equipo->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $equipo->save();
        return redirect()->route('equipo.edit', $equipo->id)->with('success', 'Se creó exitosamente.');
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
        $equipo = Equipo::findOrFail($id); // Encuentra el equipo o devuelve 404
        $items = $equipo->items(); // Assuming you have a relationship defined in the equipo model
        $items = EquipoItems::where('equipo_id', $id)->get(); // Assuming you have a equipo model for items related to the note
        return view('equipo.edit', compact('equipo','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipo = Equipo::find($id);
        $equipo->nombre = $request->input('nombre');
        $equipo->puesto = $request->input('puesto');
        $equipo->telefono = $request->input('telefono');
        $equipo->extension = $request->input('extension');
        $equipo->correo = $request->input('correo');
        $equipo->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $equipo->save();
        return redirect()->route('equipo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
