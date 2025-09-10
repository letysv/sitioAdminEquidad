<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $roles = Roles::all(); 


        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = new Roles();
        $roles->name = $request->input('nombre');
        $roles->save();

        if ($request->has('permissions')) {
            $roles->permissions()->sync($request->input('permissions'));
        }
        return redirect()->route('roles.index')->with('success', 'Rol created successfully.');
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
        $roles = Roles::find($id);
        $permissions = Permission::orderBy('name', 'asc')->get();
        
        return view('roles.edit', compact('roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = Roles::find($id);
        $roles->name = $request->input('nombre');
        $roles->permissions()->sync($request->input('permissions', []));
        $roles->save();
        
        return redirect()->route('roles.index')->with('success', 'Rol updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
