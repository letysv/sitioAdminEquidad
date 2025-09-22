<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informes;
use App\Models\InformesItems;
use App\Models\Periodos;
use App\Models\Ejercicio;


class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informes = Informes::all();

        return view('informes.index', compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodos = Periodos::all();
        $ejercicios = Ejercicio::all();

        return view('informes.create', compact('periodos','ejercicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $informe = new Informes();
        $informe->titulo = $request->input('titulo');
        $informe->ejercicio_id = $request->input('ejercicio_id'); 
        $informe->periodo_id = $request->input('periodo_id'); 
        $informe->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $informe->save();
        return redirect()->route('informes.edit', $informe->id)->with('success', 'Informe creada exitosamente.');
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
        $informe = Informes::findOrFail($id); // Encuentra el informe o devuelve 404
        $periodos = Periodos::all();
        $ejercicios = Ejercicio::all();
        $items = $informe->items(); // Assuming you have a relationship defined in the Avisos model
        $items = InformesItems::where('informe_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('informes.edit', compact('informe','periodos','ejercicios','items'));
    }

    public function cambiarActivo(Request $request, $id)
    {
        $informe = Informes::findOrFail($id);
        $informe->activo = $request->activo;
        $informe->save();

        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $informe = Informes::find($id);
        $informe->titulo = $request->input('titulo');
        $informe->ejercicio_id = $request->input('ejercicio_id'); 
        $informe->periodo_id = $request->input('periodo_id'); 
        $informe->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $informe->save();
        return redirect()->route('informes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
