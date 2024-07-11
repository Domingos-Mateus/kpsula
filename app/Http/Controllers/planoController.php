<?php

namespace App\Http\Controllers;

use App\Models\Planos;
use Illuminate\Http\Request;
use Alert;
use App\Models\Banners;
use Illuminate\Support\Facades\Auth;

class planoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $planos = Planos::all();
        $usuario = Auth::user();

        return view('planos/listar_planos', compact('planos','usuario'));

    }
    public function indexAluno()
    {
        //
        $planos = Planos::all();
        $usuario = Auth::user();
        $banner = Banners::all();

        return view('alunos/planos/listar_planos', compact('planos','usuario','banner'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $usuario = Auth::user();
        return view('planos/registar_plano', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $planos = new Planos;
        $planos->nome_plano = $request->nome_plano;
        $planos->preco = $request->preco;
        $planos->dias = $request->dias;
        $planos->descricao = $request->descricao;

        $planos->save();
        Alert::success('Salvo', 'Plano salvo com sucesso');
        return redirect('planos/listar_planos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $planos = Planos::find($id);
        $usuario = Auth::user();
        return view('planos/visualizar_plano', compact('planos','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $planos = Planos::find($id);
        $usuario = Auth::user();
        return view('planos/editar_plano', compact('planos','usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $planos = Planos::find($id);
        $planos->nome_plano = $request->nome_plano;
        $planos->preco = $request->preco;
        $planos->dias = $request->dias;
        $planos->descricao = $request->descricao;

        $planos->save();

        Alert::success('Actualizado', 'Plano Actualizado com sucesso');
        return redirect('planos/listar_planos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Planos::destroy($id);
        Alert::error('Eliminado', 'Plano Eliminado com sucesso');
        return redirect('planos/listar_planos');
    }
}
