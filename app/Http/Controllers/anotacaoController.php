<?php

namespace App\Http\Controllers;

use App\Models\anotacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class anotacaoController extends Controller
{
    public function index($video_id)
    {
        $anotacoes = anotacoes::where('video_id', $video_id)
                             ->where('user_id', Auth::id())
                             ->get();

        return response()->json($anotacoes);
    }

    public function store(Request $request)
    {
        return 1;
        $request->validate([
            'video_id' => 'required|exists:videos,id',
            'descricao' => 'required|string',
        ]);

        $anotacao = anotacoes::create([
            'video_id' => $request->video_id,
            'user_id' => Auth::id(),
            'descricao' => $request->descricao,
        ]);

        return response()->json($anotacao);
    }

    public function destroy($id)
    {
        $anotacao = anotacoes::findOrFail($id);

        if ($anotacao->user_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $anotacao->delete();

        return response()->json(['success' => 'Anotação deletada com sucesso']);
    }
}
