<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicaciones;
use App\Models\PublicacionesItems;
use App\Models\Apartado;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicaciones::all();


        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
 * Publicacion específica en json
 */
    public function apiPublicacion($id)
    {
        $publicacion = Publicaciones::with('items')->find($id);
        if ($publicacion) {
            return response()->json($publicacion);
        } else {
            return response()->json(['error' => 'Publicación no encontrada'], 404);
        }
    }

    /**
     * Colección de publicaciones con sus items en json
     */
    public function apiPublicaciones()
    {
        $publicaciones = Publicaciones::with('items')->get();
        return response()->json($publicaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartados = Apartado::all();
        return view('publicaciones.create', compact('apartados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $publicacion = new Publicaciones();
        $publicacion->titulo = $request->input('titulo');
        $publicacion->apartado_id = $request->input('apartado_id');
        $publicacion->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $publicacion->save();
        return redirect()->route('publicaciones.edit', $publicacion->id)->with('success', 'Publicación creada exitosamente.');
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
        $publicacion = Publicaciones::findOrFail($id); // Encuentra el publicacion o devuelve 404
        $apartados = Apartado::all();
        $items = $publicacion->items(); // Assuming you have a relationship defined in the Avisos model
        $items = PublicacionesItems::where('publicacion_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('publicaciones.edit', compact('publicacion', 'apartados','items'));
    }

    public function cambiarActivo(Request $request, $id)
    {
        $publicacion = Publicaciones::findOrFail($id);
        $publicacion->activo = $request->activo;
        $publicacion->save();

        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publicacion = Publicaciones::find($id);
        $publicacion->titulo = $request->input('titulo');
        $publicacion->apartado_id = $request->input('apartado_id');
        $publicacion->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $publicacion->save();
        return redirect()->route('publicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
