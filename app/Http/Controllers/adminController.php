<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\permissions_roles;
use App\Models\RolesUsers;
use Illuminate\Support\Facades\DB;
use App\Models\Alunos;
use App\Models\Arquitetos;
use App\Models\Canais;
use App\Models\Certificados;
use App\Models\Classes;
use App\Models\Clientes;
use App\Models\Condutor;
use App\Models\Consultas;
use App\Models\Reprogramador;
use App\Models\Turmas;
use Carbon\Carbon;
use File;
use Mail;
use App\Mail\SendMail;
use Alert;

class adminController extends Controller
{
    public function login()
    {
            //
         return view('conteudos.admin.app_login');
    }

    public function inicio()
    {
            //
         return view('permission/app_permissions');
    }

     public function permissoes()
    {
        $usuario = Auth::user();

        $permissoes = Permission::all();

        // return $permissoes;
        return view('permission.app_permissions', compact('usuario', 'permissoes'));
    }

    public function meu_perfil(){

        $usuario = Auth::user();

        return view('permission.app_meu_perfil', compact('usuario'));

    }

    public function aceitar_termos()
    {
        $usuario = Auth::user();

        return view('conteudos.termos.app_aceitar_termos', compact('usuario'));
    }

    public function visualizar_termos()
    {
        $usuario = Auth::user();

        return view('conteudos.termos.app_visualizar_termos', compact('usuario'));
    }

    public function resposta_aceitar_termos($resposta){
        $user = User::find(Auth::id());
        $user->aceitou_termos = $resposta;
        $user->save();


        Alert::toast('Os Termos Foram Aceites Com Sucesso', 'success');
        return redirect('/dashboard');
    }

    public function actualizar_perfil(Request $request){

        $usuario = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $usuario = User::find($usuario->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        $usuario->save();


        $aluno = Alunos::where('usuario_id', $usuario->id)->first();
        $aluno->nome = $request->name;
        $aluno->email = $request->email;

        $aluno->save();

        // Verificando se a foto é válida
        if ($request->foto) {
            $foto = $request->foto;
            $extensaoI =  $foto->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'jpeg' && $extensaoI!= 'JPG' && $extensaoI!= 'PNG' && $extensaoI!= 'JPEG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }


         $usuario->save();
        // Guardar a foto na base de dados

         if ($request->foto) {
            File::move($foto, public_path().'/images/usuarios/imag_'.$usuario->id.'.'.$extensaoI);
            $usuario->foto = '/images/usuarios/imag_'.$usuario->id.'.'.$extensaoI;
            $usuario->save();
        }

        // redirecionar para a página inicial
        Alert::toast('usuario Registado Com Sucesso', 'success');

        return back();
    }

    public function dashboard()
    {
        $usuario = Auth::user();

        $total_usuarios = User::all()->count();

        return view('dashboard', compact('usuario'));

    }

    public function baixar_apostila(Request $request)
    {
        $tipo_apostila = $request->tipo_apostila;

        $usuario = Auth::user();

        $aluno = Alunos::where('usuario_id', $usuario->id)->first();

        return view('conteudos.apostilas.app_baixar_apostila', compact('usuario','aluno','tipo_apostila'));
    }

    public function enviar_email(){

        $usuario = Auth::user();

        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test email.'
        ];

        Mail::to('pauloagostinhocarlos.carlos@gmail.com')->send(new SendMail($testMailData));

        return back();
    }

    public function logout()
    {

        Session::flush();

        Auth::logout();

        return redirect('login');
    }


    public function roles_users(){
        $user = Auth::user();

        $roles = Role::all();
        $users = User::all();

        $roles_users = DB::table('roles_users')
        ->leftJoin('roles', 'roles.id', '=', 'roles_users.role_id')
        ->select('roles.id as role_id','roles.name as role_name','roles_users.*')
        ->distinct()
        ->get();

        // return $roles_users;
        return view('admin.app_roles_users', compact('roles','roles_users','users','user'));

    }
    public function permissions_roles(){
        $usuario = Auth::user();


        $role_id = 1;
        $roles = Role::all();
        $permissions = Permission::all();

        $permissions_roles = permissions_roles::where('role_id','=', 1)
        ->join('permissions', 'permissions.id', '=', 'permissions_roles.permission_id')
        ->select('permissions.*','permissions_roles.*')
        ->get();

        $selected = [];

        foreach ($permissions_roles as $option) {
            $selected[] = $option->name;
        }

        return view('admin.app_permissions_roles', compact('usuario','permissions_roles', 'role_id', 'roles', 'selected'));
    }

    public function permissions_roles_by_id($id){

        $usuario = Auth::user();

        $role_id = $id;
        $roles = Role::all();
        $permissions = Permission::all();

        $permissions_roles = permissions_roles::where('role_id','=', $role_id)
        ->join('permissions', 'permissions.id', '=', 'permissions_roles.permission_id')
        ->select('permissions.*','permissions_roles.*')
        ->get();

        $selected = [];

        foreach ($permissions_roles as $option) {
            $selected[] = $option->name;
        }

        return view('admin.app_permissions_roles', compact('usuario','permissions_roles', 'role_id', 'roles', 'selected'));
    }


    public function salvar_permissions_roles(Request $request)
    {
        // ================ PERMISSÃO PARA VISUALIZAR ========================
        if($request->visualizacao)
        {
            foreach ($request->visualizacao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%visualizar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->visualizacao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }
        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%visualizar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);

                    }
            }
        }


        // ================ PERMISSÃO PARA CADASTRAR ========================
        if($request->inclusao)
        {
            foreach ($request->inclusao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%registrar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->inclusao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }

        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%registrar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
            }
        }

        // // ================ PERMISSÃO PARA EDITAR ========================
        if($request->edicao)
        {
            foreach ($request->edicao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%editar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->edicao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }



        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%editar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);

                    }

            }
        }

        // // ================ PERMISSÃO PARA EXCLUIR ========================
        if($request->exclusao)
        {
            foreach ($request->exclusao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%eliminar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->exclusao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }



        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%eliminar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);

                    }

            }
        }

        Alert::toast('Alteração efetuada Com Sucesso', 'success');
        return back();
    }

    public function salvar_roles_users(Request $request)
    {
        //
        $roles = new RolesUsers();
        $roles->user_id = $request->user_id;
        $roles->role_id = $request->role_id;

        $roles->save();

        Alert::toast('Alteração efetuada Com Sucesso', 'success');
        return $roles;
    }

    public function actualizar_roles_users(Request $request)
    {
        //
        $user_id = RolesUsers::where('user_id', $request->user_id)->first();

        if($user_id){
            $roles = RolesUsers::find($user_id->id);
            $roles->user_id = $request->user_id;
            $roles->role_id = $request->role_id;

            $roles->save();

            return $roles;
        }
        else{

            $roles = new RolesUsers();
            $roles->user_id = $request->user_id;
            $roles->role_id = $request->role_id;

            $roles->save();

            return $roles;
        }

        Alert::toast('Alteração efetuada Com Sucesso', 'success');
        return back();
    }
}
