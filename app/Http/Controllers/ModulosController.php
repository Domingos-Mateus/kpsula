<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use Illuminate\Http\Request;
use Alert;
use App\Models\anotacoes;
use App\Models\Banners;
use App\Models\Planos;
use App\Models\PlanosUsers;
use App\Models\ProgressoAluno;
use App\Models\Videos;
use File;
use Illuminate\Support\Facades\Auth;

class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $usuario = Auth::user();


        // Consultar os módulos com base no termo de pesquisa e ordenar por nome_modulo
        $modulos = Modulos::query()
            ->where('nome_modulo', 'LIKE', "%{$searchTerm}%")
            ->orWhere('descricao', 'LIKE', "%{$searchTerm}%")
            ->orderBy('nome_modulo')
            ->paginate(20);

        // Retornar JSON se for uma requisição AJAX
        if ($request->ajax()) {
            return response()->json($modulos);
        }

        return view('modulos/listar_modulos', compact('modulos', 'usuario'));
    }

    public function indexAluno(Request $request)
    {
        $searchTerm = $request->input('search');
        $usuario = Auth::user();
        $banner = Banners::all();

        $plano_usuario = PlanosUsers::where('user_id', $usuario->id)->latest()->first();

        if (!$plano_usuario) {
            $usuario = Auth::user();
            $planos = Planos::all();
            return view('alunos/planos/assinar_plano_usuario', compact('planos', 'usuario', 'plano_usuario'));
        }


        // Consultar os módulos com base no termo de pesquisa e ordenar por nome_modulo
        $modulos = Modulos::query()
            ->where('nome_modulo', 'LIKE', "%{$searchTerm}%")
            ->orWhere('descricao', 'LIKE', "%{$searchTerm}%")
            ->orderBy('nome_modulo')
            ->paginate(20);

        // Retornar JSON se for uma requisição AJAX
        if ($request->ajax()) {
            return response()->json($modulos);
        }

        return view('alunos/modulos/listar_modulo_aluno', compact('modulos', 'usuario', 'plano_usuario','banner'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $planos = Planos::all();
        $usuario = Auth::user();

        return view('modulos/registar_modulo', compact('usuario', 'planos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar o pedido
        $request->validate([
            'nome_modulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'plano_id' => 'required|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Criar uma nova instância do modelo Modulos
        $modulos = new Modulos;
        $modulos->nome_modulo = $request->nome_modulo;
        $modulos->descricao = $request->descricao;
        $modulos->plano_id = $request->plano_id;

        // Verificar se o arquivo de imagem foi enviado
        if ($request->hasFile('foto_modulo')) {
            // Processar o novo arquivo
            $file = $request->file('foto_modulo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('imagens/imagem_modulo/'), $filename);
            $modulos->foto_modulo = '/imagens/imagem_modulo/' . $filename;
        }

        // Salvar o novo módulo
        $modulos->save();

        // Exibir mensagem de sucesso
        Alert::success('Cadastrado', 'Módulo cadastrado com sucesso');

        // Redirecionar para a lista de módulos
        return redirect('modulos/listar_modulos');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Auth::user();
        $modulos = Modulos::findOrFail($id);
        $primeiro_video = $modulos->videos()->first();
        $videos = $modulos->videos()->paginate(20);

        return view('modulos.visualizar_modulo', compact('modulos', 'videos', 'primeiro_video', 'usuario'));
    }



    public function showAluno($id_modulo, $id_video)
{
    $usuario = Auth::user();

    // Encontra o vídeo pelo ID
    $video = Videos::findOrFail($id_video);

    // Encontra o módulo pelo ID
    $modulo = Modulos::findOrFail($id_modulo);

    // Verifica se existe progresso para o vídeo e o usuário atual
    $progressoAluno = ProgressoAluno::where('video_id', $video->id)
        ->where('user_id', $usuario->id)
        ->first();

    // Caso não exista, cria um novo registro de progresso
    if (!$progressoAluno) {
        $progressoAluno = ProgressoAluno::create([
            'modulo_id' => $modulo->id,
            'video_id' => $video->id,
            'user_id' => $usuario->id,
            'avaliacao' => null,
            'concluida' => false,
        ]);
    }

    // Busca todos os vídeos do módulo
    $videos = $modulo->videos()->orderBy('posicao_video')->get();

    // O primeiro vídeo do módulo pode ser o vídeo atual ou o primeiro da lista
    $primeiro_video = $videos->first();

    // Busca todas as anotações para o vídeo e o usuário atual
    $anotacoes = Anotacoes::where('video_id', $video->id)
        ->where('user_id', Auth::id())
        ->get();

    return view('alunos/modulos/visualizar_modulo_aluno1', compact('modulo', 'videos', 'primeiro_video', 'usuario', 'progressoAluno', 'video', 'anotacoes'));
}





    public function concluirVideo($id)
    {
        return 1;
        $usuario = Auth::user();
        $video = Videos::findOrFail($id);
        return $video->concluida;

        // Atualizar o status do vídeo para 1
        $video->status = 1;
        $video->save();

        // Redirecionar de volta para a página do módulo com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Vídeo marcado como concluído com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $modulos = Modulos::find($id);
        $usuario = Auth::user();

        return view('modulos/editar_modulo', compact('modulos', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Encontrar o módulo pelo ID
        $modulos = Modulos::findOrFail($id);

        // Atualizar os campos básicos
        $modulos->nome_modulo = $request->nome_modulo;
        $modulos->descricao = $request->descricao;
        $modulos->plano_id = $request->plano_id;


        // Salvar as alterações iniciais
        $modulos->save();

        // Verificar se uma nova foto foi carregada
        if ($request->hasFile('foto_modulo')) {
            $foto_modulo = $request->file('foto_modulo');
            $extensaoimg = $foto_modulo->getClientOriginalExtension();

            // Verificar a extensão da imagem
            if (!in_array($extensaoimg, ['jpg', 'jpeg', 'png'])) {
                return back()->with('error', 'Formato inválido para foto_modulo. Apenas jpg, jpeg e png são permitidos.');
            }

            // Excluir a foto antiga se existir
            if ($modulos->foto_modulo) {
                $caminhoFotoAntiga = public_path($modulos->foto_modulo);
                if (File::exists($caminhoFotoAntiga)) {
                    File::delete($caminhoFotoAntiga);
                }
            }

            // Mover a nova foto para o diretório de imagens e atualizar o caminho no banco de dados
            $novoNomeFoto = $modulos->id . '.' . $extensaoimg;
            $caminhoFotoNovo = '/imagens/imagem_modulo/' . $novoNomeFoto;
            $foto_modulo->move(public_path('imagens/imagem_modulo'), $novoNomeFoto);

            $modulos->foto_modulo = $caminhoFotoNovo;
            $modulos->save();
        }

        // Mensagem de sucesso e redirecionamento
        Alert::success('Atualizado', 'Módulo atualizado com sucesso');
        return redirect('modulos/listar_modulos');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontrar o módulo pelo ID
        $modulos = Modulos::findOrFail($id);

        // Verificar se há uma imagem associada e deletar se existir
        if ($modulos->foto_modulo) {
            $caminhoFoto = public_path($modulos->foto_modulo);
            if (File::exists($caminhoFoto)) {
                File::delete($caminhoFoto);
            }
        }

        // Deletar o módulo do banco de dados
        $modulos->delete();

        // Mensagem de sucesso e redirecionamento
        Alert::success('Deletado', 'Módulo deletado com sucesso');
        return redirect('modulos/listar_modulos');
    }
}
