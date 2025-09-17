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
        $request->validate([
            'archivo'       => ['required','file','mimes:pdf','max:10240'],     // 10 MB
            'archivoImage'  => ['required','file','mimes:jpg,jpeg','max:8192'], // 8 MB
        ]);

        $rutaBase = 'biblioteca/';
        $timestamp = now()->format('Y-m-d_H-i-s');
        $baseName  = "biblioteca_{$request->biblioteca_id}-{$timestamp}";

        DB::beginTransaction();

        try {
            // PDF
            $pdfFile = $request->file('archivo');
            $pdfExt  = strtolower($pdfFile->getClientOriginalExtension()); // debe ser "pdf"
            $pdfName = "{$baseName}.{$pdfExt}";
            Storage::disk('public')->putFileAs($rutaBase, $pdfFile, $pdfName);

            // Imagen
            $imgFile = $request->file('archivoImage');
            $imgExt  = strtolower($imgFile->getClientOriginalExtension()); // jpg/jpeg
            $imgName = "{$baseName}.{$imgExt}";
            Storage::disk('public')->putFileAs($rutaBase, $imgFile, $imgName);

            $itemLibro = new BibliotecaItems();
            $itemLibro->archivo = $pdfName;
            $itemLibro->archivoImage = $imgName;
            $itemLibro->activo = 1;
            $itemLibro->biblioteca_id = $request->biblioteca_id;
            $itemLibro->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Archivos agregado correctamente.',
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
        $pdfName = BibliotecaItems::where('id', $id)->value('archivo');
        $imgName = BibliotecaItems::where('id', $id)->value('archivoImage');
        $itemLibro = BibliotecaItems::findOrFail($id);
        $rutaBase     = 'biblioteca';

        try {
            DB::beginTransaction();
            // Eliminar el archivo del storage si existe
            if ($pdfName && Storage::disk('public')->exists("{$rutaBase}/{$pdfName}")) {
                Storage::disk('public')->delete("{$rutaBase}/{$pdfName}");
            }
            if ($imgName && Storage::disk('public')->exists("{$rutaBase}/{$imgName}")) {
                Storage::disk('public')->delete("{$rutaBase}/{$imgName}");
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
