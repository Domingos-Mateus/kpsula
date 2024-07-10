<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Alert;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banners = Banners::all();
        $usuario = Auth::user();
        return view('banner/listar_banner', compact('usuario', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $usuario = Auth::user();
        return view('banner/cadastrar_banner', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    // Apaga todos os registros existentes na tabela de banners.
    Banners::truncate();

    // Cria e salva um novo registro de banner.
    $banner = new Banners();

    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');
        $extensaoimg = $imagem->getClientOriginalExtension();
        $path = '/imagens/banner/' . $banner->id . '.' . $extensaoimg;

        // Move o arquivo da imagem para a pasta pública após obter o ID do banner.
        $imagem->move(public_path() . '/imagens/banner', $banner->id . '.' . $extensaoimg);

        // Atualiza o registro do banner com o caminho da imagem.
        $banner->imagem = $path;
        $banner->save();
    }

    Alert::success('Cadastrado', 'Banner cadastrado com sucesso');

    // Redireciona para a listagem de banners após o sucesso da operação.
    return redirect('/listar_banner');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Encontra o banner pelo ID.
    $banner = Banners::find($id);

    // Pega o usuário autenticado.
    $usuario = Auth::user();

    // Retorna para a view com as variáveis necessárias.
    return view('banner/visualizar_banner', compact('banner', 'usuario'));
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
        //
    }
}
