<?php

namespace App\Http\Controllers;

use App\Models\BibliotecaItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BibliotecaItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            // Se almacena el archivo
            $archivo_recibido = $request->file('archivo');
            $ruta = "biblioteca/";
            $extension = $archivo_recibido->getClientOriginalExtension();
            $nombreArchivo = "biblioteca_" . $request->biblioteca_id . '-' . now()->format('Y-m-d_H-i-s') . '.' . $extension;

            $path = Storage::disk('public')->putFileAs($ruta, $archivo_recibido, $nombreArchivo);

            // Se guarda el registro en la BD
            DB::beginTransaction();
            $itemLibro = new BibliotecaItems();
            $itemLibro->archivo = $nombreArchivo;
            $itemLibro->activo = 1;
            $itemLibro->biblioteca_id = $request->biblioteca_id;
            $itemLibro->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Archivo agregado correctamente.',
                'data' => [
                    'respuesta' => 1,
                    'redirect' => route('biblioteca.edit', ['id' => $request->biblioteca_id])
                ]
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejo de errores de la base de datos
            return redirect()->back()->withErrors(['error' => 'Error al guardar el registro: ' . $e->getMessage()]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $idPadre = BibliotecaItems::where('id', $id)->value('biblioteca_id');
        $archivo = BibliotecaItems::where('id', $id)->value('archivo');
        $itemLibro = BibliotecaItems::findOrFail($id);

        try {
            DB::beginTransaction();
            // Eliminar el archivo del storage si existe
            if ($archivo && Storage::disk('public')->exists('biblioteca/' . $archivo)) {
                Storage::disk('public')->delete('biblioteca/' . $archivo);
            }

            $itemLibro->delete();
            DB::commit();
            return redirect()->route('biblioteca.edit', ['id' => $idPadre])
                ->with('success', 'Item eliminado correctamente.');
                
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el registro: ' . $e->getMessage()
            ], 500);
        }       
    }
}
