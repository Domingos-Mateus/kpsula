<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use Illuminate\Http\Request;
use Alert;


class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modulos = Modulos::all();
    return view('modulos/listar_modulos', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('modulos/registar_modulo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $modulos = new Modulos;
        $modulos->nome_modulo = $request->nome_modulo;
        $modulos->descricao = $request->descricao;

        $modulos->save();
        Alert::success('Cadastrado', 'módulo cadastrado com sucesso');
        return redirect('modulos/listar_modulos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modulos $id)
    {
        //
        $modulos = Modulos::find($id);
        return view('modulos/visualizar_modulo', compact('modulos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $modulos = Modulos::find($id);
        return view('modulos/editar_modulo', compact('modulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $modulos = Modulos::find($id);
        $modulos->nome_modulo = $request->nome_modulo;
        $modulos->descricao = $request->descricao;

        $modulos->save();
        Alert::success('Actualizado', 'módulo Actualizado com sucesso');

        return redirect('modulos/listar_modulos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Modulos::destroy($id);
        Alert::error('Eliminado', 'Plano Eliminado com sucesso');
        return redirect('/modulos/listar_modulos');
    }
}
