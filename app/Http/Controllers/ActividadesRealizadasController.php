<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;
use App\Models\ActividadesRealizadas;
use App\Models\ActividadesRealizadasItems;
use App\Models\Periodos;
use App\Models\Ejercicio;


class ActividadesRealizadasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = ActividadesRealizadas::all();
        return view('actividades.index', compact('actividades'));
    }

    /**
 * Actividad específica en json
 */
    public function apiActividad($id)
    {
        $actividad = ActividadesRealizadas::with('items')->find($id);
        if ($actividad) {
            return response()->json($actividad);
        } else {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }
    }

    /**
     * Colección de actividads con sus items en json
     */
    public function apiActividades()
    {
        $actividades = ActividadesRealizadas::with(['items','actividad:id,nombre'])->get();
        return response()->json($actividades);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventos = Eventos::all();
        // $periodos = Periodos::all();
        // $ejercicios = Ejercicio::all();
        
        return view('actividades.create', compact('eventos'));
        // return view('actividades.create', compact('periodos','ejercicios','actividades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actividad = new ActividadesRealizadas();
        $actividad->fecha = $request->input('fecha');
        $actividad->lugar = $request->input('lugar');
        $actividad->descripcion = $request->input('descripcion');
        // $actividad->ejercicio_id = $request->input('ejercicio_id'); 
        // $actividad->periodo_id = $request->input('periodo_id'); 
        $actividad->evento_id = $request->input('evento_id');
        $actividad->user_id = auth()->id(); // Assuming you want to associate the note with the authenticated user
        $actividad->save();
        return redirect()->route('actividades.edit', $actividad->id)->with('success', 'Actividad creada exitosamente.');
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
        $actividad = ActividadesRealizadas::findOrFail($id); // Encuentra la actividad o devuelve 404
        $eventos = Eventos::all();
        // $periodos = Periodos::all();
        // $ejercicios = Ejercicio::all();
        $items = $actividad->items(); // Assuming you have a relationship defined in the Avisos model
        $items = ActividadesRealizadasItems::where('actividad_id', $id)->get(); // Assuming you have a AvisosItems model for items related to the note
        return view('actividades.edit', compact('actividad','eventos','items'));
        // return view('actividades.edit', compact('actividad','periodos','ejercicios','actividades','items'));
    }

    public function cambiarActivo(Request $request, $id)
    {
        $actividad = ActividadesRealizadas::findOrFail($id);
        $actividad->activo = $request->activo;
        $actividad->save();

        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actividad = ActividadesRealizadas::find($id);
        $actividad->fecha = $request->input('fecha');
        $actividad->lugar = $request->input('lugar');
        $actividad->descripcion = $request->input('descripcion');
        // $actividad->ejercicio_id = $request->input('ejercicio_id'); 
        // $actividad->periodo_id = $request->input('periodo_id'); 
        $actividad->evento_id = $request->input('evento_id');
        $actividad->user_id = auth()->id(); // Assuming you want to
        $actividad->save();
        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
