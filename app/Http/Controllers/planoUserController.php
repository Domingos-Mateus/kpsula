<?php

namespace App\Http\Controllers;

use App\Models\Planos;
use App\Models\PlanosUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class planoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obter os planos de usuários, ordenados pelo id
        $usuario = Auth::user();

        $plano_usuarios = DB::table('planos_users')
            ->join('planos', 'planos.id', '=', 'planos_users.plano_id')
            ->join('users', 'users.id', '=', 'planos_users.user_id')
            ->select(
                'planos_users.*',
                'planos.nome_plano',
                'planos.preco',
                'planos.dias',
                'planos.descricao',
                'users.name'
            )
            ->orderBy('planos_users.id', 'asc') // Ordenar pelo id em ordem ascendente
            ->get();

        return view('plano_usuario/listar_plano_usuario', compact('plano_usuarios','usuario'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $usuario = Auth::user();
    $planos = Planos::all();
    $usuarios = User::whereDoesntHave('planos')->get();
    return view('plano_usuario/registar_plano_usuario', compact('planos', 'usuarios','usuario'));
}


    /**
     * Store a newly created resource in storage.
     */

        public function store(Request $request)
        {
            $plano_user = new PlanosUsers;

            $plano_user->plano_id = $request->plano_id;
            $plano_user->user_id = $request->user_id;

            // Obtenha o plano associado ao plano_id
            $plano = Planos::find($request->plano_id);

            // Verifique se o plano foi encontrado
            if ($plano) {
                // Calcule a data de expiração
                $data_hoje = Carbon::now();
                $data_expiracao = $data_hoje->copy()->addDays($plano->dias);

                // Defina a data de expiração no modelo
                $plano_user->data_expiracao = $data_expiracao;
            } else {
                // Plano não encontrado, pode lançar uma exceção ou tratar o erro de outra forma
                Alert::error('Erro', 'Plano não encontrado');
                return redirect()->back();
            }

            // Salve o modelo PlanosUsers no banco de dados
            $plano_user->save();

            // Exiba uma mensagem de sucesso
            Alert::success('Salvo', 'Plano salvo com sucesso');

            // Redirecione para a lista de planos do usuário
            return redirect('plano_usuario/listar_plano_usuario');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $plano_user = PlanosUsers::find($id);
        $planos = Planos::all();
        $usuarios = User::all();
        $usuario = Auth::user();

        return view('plano_usuario/editar_plano_usuario', compact('planos', 'usuarios','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $plano_user = PlanosUsers::find($id);
        $usuario = Auth::user();

        $planos = Planos::all();
        $usuarios = User::all();
        return view('plano_usuario/editar_plano_usuario', compact('planos', 'usuarios','plano_user','usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plano_user = PlanosUsers::find($id);

        $plano_user->plano_id = $request->plano_id;
        //$plano_user->user_id = $request->user_id;

        $plano = Planos::find($request->plano_id);

        // Verifique se o plano foi encontrado
        if ($plano) {
            // Calcule a nova data de expiração
            $data_hoje = Carbon::now();
            $data_expiracao = $data_hoje->copy()->addDays($plano->dias);

            // Defina a nova data de expiração no modelo
            $plano_user->data_expiracao = $data_expiracao;
        } else {
            // Plano não encontrado, pode lançar uma exceção ou tratar o erro de outra forma
            Alert::error('Erro', 'Plano não encontrado');
            return redirect()->back();
        }

        // Salve o modelo PlanosUsers no banco de dados
        $plano_user->save();

        // Exiba uma mensagem de sucesso
        Alert::success('Atualizado', 'Plano atualizado com sucesso');

        // Redirecione para a lista de planos do usuário
        return redirect('plano_usuario/listar_plano_usuario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PlanosUsers::destroy($id);
        Alert::error('Eliminado', 'Plano do usuário Eliminado com sucesso');
        return redirect('plano_usuario/listar_plano_usuario');
    }
}
