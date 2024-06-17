<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = User::all();
        $usuario = Auth::user();
        return view('usuarios/listar_usuarios', compact('usuarios','usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $user = User::findOrFail($id);

    // Alterar o status do usuário
    $user->status = !$user->status; // Alterna entre ativo e inativo
    $user->save();

    // Alterar a senha do usuário
    $newPassword = 'nova_senha'; // Defina a nova senha aqui
    $user->password = Hash::make($newPassword);
    $user->save();

    return redirect()->back()->with('success', 'Status e senha do usuário atualizados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
