<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;
use File;
use Alert;
use App\Models\Modulos;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $videos = Videos::paginate(9);
    $modulos = Modulos::all();
    return view('videos.listar_videos', compact('videos','modulos'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('videos/registar_video');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $videos = new Videos;
        $videos->link_video = $request->link_video;
        $videos->nome_video = $request->nome_video;
        $videos->descricao = $request->descricao;

        $videos->save();

        if($request->imagem){
            $imagem = $request->imagem;
            $extensaoimg = $imagem->getClientOriginalExtension();
            if($extensaoimg !='jpg' && $extensaoimg != 'jpg' && $extensaoimg != 'png'){
                return back()->with('Erro', 'imagem com formato inválido');
            }
        }

        $videos->save();

        if ($request->imagem) {
            File::move($imagem, public_path().'/imagens/imagem_video/'.$videos->id.'.'.$extensaoimg);
            $videos->imagem = '/imagens/imagem_video/'.$videos->id.'.'.$extensaoimg;

            $videos->save();
        }
        Alert::success('Cadastrado', 'Vídeo cadastrado com sucesso');

        return redirect('videos/listar_videos');

    }

    /**
     * Display the specified resource.
     */
    public function show1()
    {
        //
        return view('videos/visualizar_video');

    }
    public function show(string $id)
    {
        //
        $videos = Videos::find($id);
        return view('videos/visualizar_video', compact('videos'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $videos = Videos::find($id);
        return view('videos/editar_video', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $videos = Videos::find($id);
        $videos->link_video = $request->link_video;
        $videos->nome_video = $request->nome_video;
        $videos->descricao = $request->descricao;

        $videos->save();

        if($request->imagem){
            $imagem = $request->imagem;
            $extensaoimg = $imagem->getClientOriginalExtension();
            if($extensaoimg !='jpg' && $extensaoimg != 'jpg' && $extensaoimg != 'png'){
                return back()->with('Erro', 'imagem com formato inválido');
            }
        }

        $videos->save();

        if ($request->imagem) {
            File::move($imagem, public_path().'/imagens/imagem_video/'.$videos->id.'.'.$extensaoimg);
            $videos->imagem = '/imagens/imagem_video/'.$videos->id.'.'.$extensaoimg;

            $videos->save();
        }
        Alert::success('Actualizado', 'Vídeo Actualizado com sucesso');
        //return $banners;

        return redirect('videos/listar_videos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Videos::destroy($id);
        Alert::error('Eliminado', 'Vídeo Eliminado com sucesso');
        return redirect('/videos/listar_videos');
    }
}
