<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->input('nombre');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->assignRole($request->role);
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario created successfully.');
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
         $usuario = User::find($id);

        $roles = Role::all(); 
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::find($id);
        $usuario->name = $request->input('nombre');
        $usuario->email = $request->input('email');
        if ($request->filled('password')) {
           $usuario->password = bcrypt($request->input('password'));
        }
        $usuario->save();

        $usuario->syncRoles([$request->role]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
