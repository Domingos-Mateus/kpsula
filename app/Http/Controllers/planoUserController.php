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
use Illuminate\Support\Facades\Http;


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

        return view('plano_usuario/listar_plano_usuario', compact('plano_usuarios', 'usuario'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = Auth::user();
        $planos = Planos::all();
        $usuarios = User::whereDoesntHave('planos')->get();
        return view('plano_usuario/registar_plano_usuario', compact('planos', 'usuarios', 'usuario'));
    }

    public function assinarPlano()
    {
        $usuario = Auth::user();
        $planos = Planos::all();

        $planoUsuario = PlanosUsers::where('user_id',$usuario->id)
        ->join('planos','planos.id','planos_users.plano_id')
        ->select('planos_users.*','planos.nome_plano','planos.preco')
        ->latest()
        ->first()
        ;
        //return $usuario;

        // Verifica se o usuário logado possui pelo menos um plano
        if ($planoUsuario) {
            //return "Ja tem um plano";
            return view('alunos/planos/plano_individual_user', compact('planos', 'usuario', 'planoUsuario'));
        }

        return view('alunos/planos/assinar_plano_usuario', compact('planos', 'usuario'));
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
        Alert::success('Salvo', 'Plano salvo com sucesso');
        return redirect('plano_usuario/listar_plano_usuario');
    }


    public function pagar(Request $request)
{
    $plano_user = new PlanosUsers;

    $plano_user->plano_id = $request->plano_id;
    $plano_user->user_id = auth()->id();

    $plano = Planos::find($request->plano_id);

    if ($plano) {
        $data_hoje = Carbon::now();
        $data_expiracao = $data_hoje->copy()->addDays($plano->dias);

        $plano_user->data_expiracao = $data_expiracao;
    } else {
        Alert::error('Erro', 'Plano não encontrado');
        return redirect()->back();
    }

    $plano_user->save();

    return redirect('alunos/modulos/listar_modulo_aluno');
}




public function pagamentoTicto(Request $request) {
    // Obter as credenciais da API
    $client_id = '9cc83dfa-5f6b-4a3f-ba23-9671bc3b9eb8';
    $client_secret = 'zQzodv9FTKjoWyJgthH6zHxWbureAI8u4tOsWLcFQuBsTdMDz3RTsOVBMFdaWr2Oq';
    $grant_type = 'client_credentials';

    // Fazer a requisição para obter o token
    $response = Http::asForm()->post('https://glados.ticto.cloud/api/security/oauth/token', [
        'grant_type' => $grant_type,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'scope' => '*',
    ]);

    // Verificar se a requisição foi bem-sucedida
    if ($response->successful()) {
        // Obter o token de acesso da resposta
        $access_token = $response->json()['access_token'];

        // Armazenar o token na sessão
        session(['access_token' => $access_token]);

           // Recuperar o token da sessão
        $access_token = session('access_token');

        // Agora você pode usar o token para fazer outras requisições na API
        // Exemplo: Resumo de pedidos
        $orderSummaryResponse = Http::withToken($access_token)
            ->get('https://glados.ticto.cloud/api/v1/orders/summary');

        if ($orderSummaryResponse->successful()) {
            $orderSummary = $orderSummaryResponse->json();
            // Tratar os dados do resumo aqui
        } else {
            return response()->json(['error' => 'Erro ao obter o resumo de pedidos'], 500);
        }

        // Adicione a lógica adicional para processar o pagamento aqui
        // ...

        return response()->json(['access_token' => $access_token]);
    } else {
        // Em caso de falha na autenticação, retorne uma mensagem de erro
        return response()->json(['error' => 'Falha na autenticação'], 401);
    }
}

    public function sumaryTicto(Request $request) {
        // Obter as credenciais da API
        $client_id = '9cc83dfa-5f6b-4a3f-ba23-9671bc3b9eb8';
        $client_secret = 'zQzodv9FTKjoWyJgthH6zHxWbureAI8u4tOsWLcFQuBsTdMDz3RTsOVBMFdaWr2Oq';
        $grant_type = 'client_credentials';

        // Fazer a requisição para obter o token
        $authResponse = Http::asForm()->post('https://glados.ticto.cloud/api/security/oauth/token', [
            'grant_type' => $grant_type,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'scope' => '*',
        ]);

        // Verificar se a requisição foi bem-sucedida
        if ($authResponse->successful()) {
            // Obter o token de acesso da resposta
            $access_token = $authResponse->json()['access_token'];

            // Usar o token para obter o resumo dos pedidos
            $summaryResponse = Http::withToken($access_token)
                ->get('https://glados.ticto.cloud/api/v1/orders/summary');

            if ($summaryResponse->successful()) {
                // Obter os dados do resumo
                $summaryData = $summaryResponse->json();

                // Retornar os dados em formato JSON
                return response()->json([
                    'total' => $summaryData['total'],
                    'total_items' => $summaryData['total_items'],
                    'bump_total' => $summaryData['bump_total'],
                    'upsell_total' => $summaryData['upsell_total'],
                    'commission_sum' => $summaryData['commission_sum']
                ]);
            } else {
                // Retornar erro se a chamada para obter o resumo falhar
                return response()->json(['error' => 'Erro ao obter o resumo dos pedidos'], 500);
            }
        } else {
            // Em caso de falha na autenticação, retorne uma mensagem de erro
            return response()->json(['error' => 'Falha na autenticação'], 401);
        }
    }

        public function historyTicto(Request $request) {
            // Obter as credenciais da API
            $client_id = '9cc83dfa-5f6b-4a3f-ba23-9671bc3b9eb8';
            $client_secret = 'zQzodv9FTKjoWyJgthH6zHxWbureAI8u4tOsWLcFQuBsTdMDz3RTsOVBMFdaWr2Oq';
            $grant_type = 'client_credentials';

            // Fazer a requisição para obter o token
            $authResponse = Http::asForm()->post('https://glados.ticto.cloud/api/security/oauth/token', [
                'grant_type' => $grant_type,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'scope' => '*',
            ]);

            // Verificar se a requisição foi bem-sucedida
            if ($authResponse->successful()) {
                // Obter o token de acesso da resposta
                $access_token = $authResponse->json()['access_token'];

                // Usar o token para obter o histórico dos pedidos
                $page = $request->get('page', 1); // Obter o número da página, padrão é 1
                $historyResponse = Http::withToken($access_token)
                    ->get("https://glados.ticto.cloud/api/v1/orders/history?page={$page}");

                if ($historyResponse->successful()) {
                    // Obter os dados do histórico
                    $historyData = $historyResponse->json();

                    // Retornar os dados em formato JSON
                    return response()->json([
                        'data' => $historyData['data'],
                        'links' => $historyData['links'],
                        'meta' => $historyData['meta'],
                    ]);
                } else {
                    // Retornar erro se a chamada para obter o histórico falhar
                    return response()->json(['error' => 'Erro ao obter o histórico de pedidos'], 500);
                }
            } else {
                // Em caso de falha na autenticação, retorne uma mensagem de erro
                return response()->json(['error' => 'Falha na autenticação'], 401);
            }
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

        return view('plano_usuario/editar_plano_usuario', compact('planos', 'usuarios', 'usuario','plano_user'));
    }

    //Detalhar o plano que o aluno obteve
    public function detalharPlano()
    {
        //
        $usuario = Auth::user();
        $planos = Planos::all();

        // Verifica se o usuário logado possui pelo menos um plano
        if ($usuario->planos()->exists()) {
            // Redireciona para outra página com uma mensagem se o usuário já possui um plano
            $planoUsuario = $usuario->planos()->first();


            return view('plano_usuario/plano_individual_user', compact('planos', 'usuario', 'planoUsuario'));
        }

        $planoUsuario = $usuario->planos()->first();

        //return "Ainda não possui um plano";
        // return view('plano_usuario/registar_plano_usuario', compact('planos', 'usuario'));
        return view('plano_usuario/plano_individual_user', compact('planos', 'usuario', 'planoUsuario'));

        //return view('plano_usuario/assinar_plano_usuario', compact('planos', 'usuario'));
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
        return view('plano_usuario/editar_plano_usuario', compact('planos', 'usuarios', 'plano_user', 'usuario'));
    }

    public function editAluno(string $id)
{
    $plano_user = PlanosUsers::find($id);


    if (!$plano_user) {

        return redirect('/alunos/planos/editar_plano_usuario')->with('error', 'Plano de usuário não encontrado.');
    }

    $usuario = Auth::user();
    $planos = Planos::all();
    $usuarios = User::all();
    return view('alunos.planos.editar_plano_usuario', compact('planos', 'usuarios', 'plano_user', 'usuario'));
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

    public function updateAluno(Request $request, string $id)
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
        return redirect('alunos/modulos/listar_modulo_aluno');
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
