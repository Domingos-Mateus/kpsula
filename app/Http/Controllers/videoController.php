<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;
use File;
use Alert;
use App\Models\Modulos;
use App\Models\Planos;
use Illuminate\Support\Facades\Auth;

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
    public function create($modulo_id)
{
    // Buscar o módulo pelo ID
    $modulo = Modulos::findOrFail($modulo_id);

    // Buscar todos os planos
    $planos = Planos::all();
    $usuario = Auth::user();

    // Retornar a view de criação de vídeo com o módulo e os planos
    return view('videos.create', compact('modulo', 'planos','usuario'));
}


    /**
     * Store a newly created resource in storage.
     */
    // Método para armazenar um novo vídeo
    public function store(Request $request)
{
    $request->validate([
        'nome_video' => 'required|string|max:255',
        'link_video' => 'required|string', // Aceitar qualquer string
        'descricao' => 'nullable|string|max:255',
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'modulo_id' => 'required|exists:modulos,id',
        'plano_id' => 'required|exists:planos,id', // Adiciona validação para plano_id
    ]);

    $video = new Videos();
    $video->nome_video = $request->nome_video;
    $video->link_video = $request->link_video;
    $video->descricao = $request->descricao;
    $video->modulo_id = $request->modulo_id;
    $video->plano_id = $request->plano_id; // Adiciona o campo plano_id

    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');
        $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
        $imagem->move(public_path('imagens/video_imagem'), $nomeImagem);
        $video->imagem = 'imagens/video_imagem/' . $nomeImagem;
    }

    $video->save();
    Alert::success('Cadastrado', 'Vídeo cadastrado com sucesso');

    return redirect()->route('modulos.show', $request->modulo_id)->with('success', 'Vídeo adicionado com sucesso.');
}

    /**
     * Display the specified resource.
     */
    public function show1()
    {
        //
        $usuario = Auth::user();

        return view('videos/visualizar_video');

    }
    public function show(string $id)
    {
        //
        $videos = Videos::find($id);
        return view('videos/visualizar_video', compact('videos','usuario'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $video = Videos::findOrFail($id);
        $usuario = Auth::user();

        return view('videos.edit', compact('video','usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Método para atualizar os dados do vídeo
    public function update(Request $request, $id)
    {
        $video = Videos::findOrFail($id);

        // Validação dos campos do formulário
        $request->validate([
            'nome_video' => 'required|string|max:255',
            'link_video' => 'required|string', // Permitir qualquer string
            'descricao' => 'nullable|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Atualizar os dados do vídeo
        $video->nome_video = $request->nome_video;
        $video->link_video = $request->link_video;
        $video->descricao = $request->descricao;

        // Processar a nova imagem, se fornecida
        if ($request->hasFile('imagem')) {
            // Deletar a imagem antiga, se existir
            if ($video->imagem) {
                $caminhoImagemAntiga = public_path($video->imagem);
                if (File::exists($caminhoImagemAntiga)) {
                    File::delete($caminhoImagemAntiga);
                }
            }

            // Salvar a nova imagem
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('imagens/video_imagem'), $nomeImagem);
            $video->imagem = 'imagens/video_imagem/' . $nomeImagem;
        }

        // Salvar as alterações no banco de dados
        $video->save();
        Alert::success('Atualizado', 'Vídeo Atualizado com sucesso');


        // Redirecionar de volta para a visualização do módulo com uma mensagem de sucesso
        return redirect()->route('modulos.show', $video->modulo_id)->with('success', 'Vídeo atualizado com sucesso.');
    }


    /**
     * Remove the specified resource from storage.
     */
     // Método para excluir um vídeo
     public function destroy($id)
     {
         $video = Videos::findOrFail($id);

         // Deletar a imagem associada, se existir
         if ($video->imagem) {
             $caminhoImagem = public_path($video->imagem);
             if (File::exists($caminhoImagem)) {
                 File::delete($caminhoImagem);
             }
         }

         // Deletar o vídeo do banco de dados
         $video->delete();

         // Redirecionar de volta para a visualização do módulo com uma mensagem de sucesso
         return redirect()->route('modulos.show', $video->modulo_id)->with('success', 'Vídeo deletado com sucesso.');
     }
}
