<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\alunoIndexController;
use App\Http\Controllers\anotacaoController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\navController;
use App\Http\Controllers\planoController;
use App\Http\Controllers\planoUserController;
use App\Http\Controllers\ProgressoAlunoController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\videoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//================Rota para Usuários==========
Route::get('/usuarios/listar_usuarios', [usuarioController::class, 'index'])->middleware('auth');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');
Route::get('/aluno_index', [alunoIndexController::class, 'index'])->middleware('auth');
Route::get('/layout/menu', [menuController::class, 'index'])->middleware('auth');
Route::get('/layout/navbar', [navController::class, 'index'])->middleware('auth');


//===================Rota Para Vídos=======================
Route::get('/videos/listar_videos', [videoController::class, 'index'])->middleware('auth');
Route::get('/videos/registar_video', [videoController::class, 'create'])->middleware('auth');
//Route::post('/salvar_video', [videoController::class,'store'])->middleware('auth');
Route::post('/videos/store', [VideoController::class, 'store'])->name('videos.store')->middleware('auth');

Route::get('/videos/{id}', [videoController::class, 'show'])->name('alunos.videos.show')->middleware('auth');
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit')->middleware('auth');
// Rota para atualizar os dados de um vídeo
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update')->middleware('auth');
// Rota para excluir um vídeo
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy')->middleware('auth');
Route::get('/videos/visualizar_video/{id}', [videoController::class, 'show'])->middleware('auth');
Route::get('/videos/create/{modulo_id}', [VideoController::class, 'create'])->name('videos.create')->middleware('auth');


//============================Rota para Anotacoes======================
Route::get('/anotacoes/{video_id}', [anotacaoController::class, 'index']);
Route::post('/anotacoes', [anotacaoController::class, 'store']);
Route::delete('/anotacoes/{id}', [anotacaoController::class, 'destroy']);

//==================Rota para Planos para o usuário=====================
Route::get('/plano_usuario/listar_plano_usuario', [planoUserController::class, 'index'])->middleware('auth');
Route::post('/salvar_plano_usuario', [planoUserController::class, 'store'])->middleware('auth');
Route::post('/salvar_plano_usuario_aluno', [planoUserController::class, 'pagar'])->middleware('auth');
Route::get('/plano_usuario/registar_plano_usuario', [planoUserController::class, 'create'])->middleware('auth');
Route::get('/alunos/planos/assinar_plano_usuario', [planoUserController::class, 'assinarPlano'])->middleware('auth');
Route::get('/plano_usuario/editar_plano_usuario/{id}', [planoUserController::class, 'edit'])->middleware('auth');
Route::get('/alunos/planos/editar_plano_usuario/{id}', [planoUserController::class, 'editAluno'])->middleware('auth');
Route::get('/plano_usuario/visualizar_plano_usuario/{id}', [planoUserController::class, 'show'])->middleware('auth');
Route::get('/plano_usuario/plano_individual_user', [planoUserController::class, 'detalharPlano'])->middleware('auth');
Route::put('/atualizar_plano_usuario/{id}', [planoUserController::class, 'update'])->middleware('auth');
Route::put('/atualizar_plano_usuario_aluno/{id}', [planoUserController::class, 'updateAluno'])->middleware('auth');
Route::get('/eliminar_plano_usuario/{id}', [planoUserController::class, 'destroy'])->middleware('auth');

//==================Rota para Planos=====================
Route::get('/planos/listar_planos', [planoController::class, 'index'])->middleware('auth');
Route::get('/alunos/planos/listar_planos', [planoController::class, 'indexAluno'])->middleware('auth');
Route::post('/salvar_plano', [planoController::class, 'store'])->middleware('auth');
Route::get('/planos/registar_plano', [planoController::class, 'create'])->middleware('auth');
Route::get('/planos/editar_plano/{id}', [planoController::class, 'edit'])->middleware('auth');
Route::get('/planos/visualizar_plano/{id}', [planoController::class, 'show'])->middleware('auth');
Route::put('/atualizar_plano/{id}', [planoController::class, 'update'])->middleware('auth');
Route::get('/eliminar_plano/{id}', [planoController::class, 'destroy'])->middleware('auth');


//==================Rota para Modulos=====================
Route::get('/modulos/listar_modulos', [ModulosController::class, 'index'])->name('modulos.index')->middleware('auth');
Route::post('/salvar_modulo', [ModulosController::class, 'store'])->middleware('auth');
Route::get('/modulos/registar_modulo', [ModulosController::class, 'create'])->middleware('auth');
Route::get('/modulos/editar_modulo/{id}', [ModulosController::class, 'edit'])->middleware('auth');
Route::get('/modulos/visualizar_modulo/{id}', [ModulosController::class, 'show'])->middleware('auth');
Route::put('/atualizar_modulo/{id}', [ModulosController::class, 'update'])->middleware('auth');
Route::get('/eliminar_modulo/{id}', [ModulosController::class, 'destroy'])->middleware('auth');

Route::get('/modulos/{id}', [ModulosController::class, 'show'])->name('modulos.show')->middleware('auth');

//==================Rota para Alunos=====================
Route::get('/alunos/modulos/listar_modulo_aluno', [ModulosController::class, 'indexAluno'])->name('modulos.indexAluno')->middleware('auth');
Route::get('/alunos/modulos/visualizar_modulo_aluno1/{id_modulo}/{id_video}', [ModulosController::class, 'showAluno'])->middleware('auth')->name('video.show');
Route::get('concluir/{id}', [ProgressoAlunoController::class, 'marcarComoConcluido'])->middleware('auth')->name('progresso.toggle');

Route::get('modulos/{modulo}/videos/{video}/anterior', [ProgressoAlunoController::class, 'showAnterior'])->name('video.anterior');
Route::get('modulos/{modulo}/videos/{video}/proximo', [ProgressoAlunoController::class, 'showProximo'])->name('video.proximo');


Route::get('/videos/{id}', [videoController::class, 'show'])->name('videos.show')->middleware('auth');


//==================Rota para Permissões=====================

Route::get('/roles_users', 'App\Http\Controllers\adminController@roles_users')->name('roles')->middleware('auth');
Route::get('/permissions_roles', 'App\Http\Controllers\adminController@permissions_roles')->name('permissions')->middleware('auth');
Route::get('/permissions_roles_by_id/{id}', 'App\Http\Controllers\adminController@permissions_roles_by_id')->middleware('auth');
Route::post('/salvar_roles_users', 'App\Http\Controllers\adminController@salvar_roles_users')->middleware('auth');
Route::post('/actualizar_roles_users', 'App\Http\Controllers\adminController@actualizar_roles_users')->middleware('auth');
Route::post('/salvar_permissions_roles', 'App\Http\Controllers\adminController@salvar_permissions_roles')->middleware('auth');
Route::post('/criar_token_acesso', 'App\Http\Controllers\adminController@criar_token_acesso')->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios.listar_usuarios', function () {
    return view('usuarios/listar_usuarios')->middleware('auth');
})->middleware('auth');
/*
Route::get('/', function () {
    return view('index')->middleware('auth');
})->middleware('auth');
*/
Route::get('/login1', function () {
    return view('auth/login1');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    /*
    Route::get('/dashboard', function () {
        return redirect('dashboard')->middleware('auth');
    })->name('dashboard')->middleware('auth');


    Route::get('/dashboard', function () {
        return view('dashboard')->middleware('auth');
    })->name('dashboard')->middleware('auth');
*/
})->middleware('auth');
