<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::orderBy('name','asc')->get(); 


        return view('permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permiso = new Permission();
        $permiso->name = $request->input('nombre');
        $permiso->save();
        return redirect()->route('permisos.index')->with('success', 'Permiso created successfully.');
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
        $permisos = Permission::find($id);
        
        return view('permisos.edit', compact('permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permisos = Permission::find($id);
        $permisos->name = $request->input('nombre');
        $permisos->save();
        
        return redirect()->route('permisos.index')->with('success', 'Permiso updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
