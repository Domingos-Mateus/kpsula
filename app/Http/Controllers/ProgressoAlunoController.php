<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use App\Models\ProgressoAluno;
use Illuminate\Http\Request;

class ProgressoAlunoController extends Controller
{
    //

    public function marcarComoConcluido($id)
    {
        $progressoAluno = ProgressoAluno::findOrFail($id);
        $progressoAluno->concluida = !$progressoAluno->concluida; // Alterna o status
        $progressoAluno->save();

        // Redireciona de volta para a página do aluno ou outra página apropriada
        return redirect()->back()->with('status', $progressoAluno->concluida ? 'Progresso marcado como concluído!' : 'Progresso desmarcado como concluído!');
    }

    public function showAnterior($moduloId, $videoId)
    {
        $modulo = Modulos::findOrFail($moduloId);
        $videos = $modulo->videos()->orderBy('posicao_video')->get();
        $currentVideoIndex = $videos->search(function ($video) use ($videoId) {
            return $video->id == $videoId;
        });

        if ($currentVideoIndex > 0) {
            $previousVideo = $videos[$currentVideoIndex - 1];
            return redirect()->route('video.show', [$previousVideo->id]);
        }

        return redirect()->back()->with('status', 'Não há vídeo anterior.');
    }

    public function showProximo($moduloId, $videoId)
{
    $modulo = Modulos::findOrFail($moduloId);
    $videos = $modulo->videos()->orderBy('posicao_video')->get();
    $currentVideoIndex = $videos->search(function ($video) use ($videoId) {
        return $video->id == $videoId;
    });

    if ($currentVideoIndex < $videos->count() - 1) {
        $nextVideo = $videos[$currentVideoIndex + 1];
        $url = route('video.show', [$nextVideo->id]);
        return redirect()->to($url);
    }

    return redirect()->back()->with('status', 'Não há próximo vídeo.');
}



}
