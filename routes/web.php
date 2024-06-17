<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\navController;
use App\Http\Controllers\planoController;
use App\Http\Controllers\planoUserController;
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
Route::get('/usuarios/listar_usuarios', [usuarioController::class,'index']);

Route::get('/dashboard', [dashboardController::class,'index']);
Route::get('/layout/menu', [menuController::class,'index']);
Route::get('/layout/navbar', [navController::class,'index']);


//===================Rota Para Vídos=======================
Route::get('/videos/listar_videos', [videoController::class,'index']);
Route::get('/videos/registar_video', [videoController::class,'create']);
//Route::post('/salvar_video', [videoController::class,'store']);
Route::post('/videos/store', [VideoController::class, 'store'])->name('videos.store');

// Rota para exibir o formulário de edição de um vídeo
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');

// Rota para atualizar os dados de um vídeo
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');

// Rota para excluir um vídeo
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');

Route::get('/videos/visualizar_video/{id}', [videoController::class,'show']);
//Route::get('/videos/editar_video/{id}', [videoController::class,'edit']);
//Route::put('/update_video/{id}', [videoController::class,'update']);
//Route::get('/eliminar_video/{id}', [videoController::class,'destroy']);

Route::get('/videos/create/{modulo_id}', [VideoController::class, 'create'])->name('videos.create');

//==================Rota para Planos=====================
Route::get('/plano_usuario/listar_plano_usuario', [planoUserController::class,'index']);
Route::post('/salvar_plano_usuario', [planoUserController::class,'store']);
Route::get('/plano_usuario/registar_plano_usuario', [planoUserController::class,'create']);
Route::get('/plano_usuario/editar_plano_usuario/{id}', [planoUserController::class,'edit']);
Route::get('/plano_usuario/visualizar_plano_usuario/{id}', [planoUserController::class,'show']);
Route::put('/atualizar_plano_usuario/{id}', [planoUserController::class,'update']);
Route::get('/eliminar_plano_usuario/{id}', [planoUserController::class,'destroy']);

//==================Rota para Planos do Usuário=====================
Route::get('/planos/listar_planos', [planoController::class,'index']);
Route::post('/salvar_plano', [planoController::class,'store']);
Route::get('/planos/registar_plano', [planoController::class,'create']);
Route::get('/planos/editar_plano/{id}', [planoController::class,'edit']);
Route::get('/planos/visualizar_plano/{id}', [planoController::class,'show']);
Route::put('/atualizar_plano/{id}', [planoController::class,'update']);
Route::get('/eliminar_plano/{id}', [planoController::class,'destroy']);


//==================Rota para Modulos=====================
Route::get('/modulos/listar_modulos', [ModulosController::class, 'index'])->name('modulos.index');
//Route::get('/modulos/listar_modulos', [ModulosController::class,'index']);
Route::post('/salvar_modulo', [ModulosController::class,'store']);
Route::get('/modulos/registar_modulo', [ModulosController::class,'create']);
Route::get('/modulos/editar_modulo/{id}', [ModulosController::class,'edit']);
Route::get('/modulos/visualizar_modulo/{id}', [ModulosController::class,'show']);
Route::put('/atualizar_modulo/{id}', [ModulosController::class,'update']);
Route::get('/eliminar_modulo/{id}', [ModulosController::class,'destroy']);

Route::get('/modulos/{id}', [ModulosController::class, 'show'])->name('modulos.show');

//==================Rota para Permissões=====================
//Route::get('/permission/app_permissions', [adminController::class,'permissoes']);

Route::get('/roles_users','App\Http\Controllers\adminController@roles_users') ->name('roles');
Route::get('/permissions_roles','App\Http\Controllers\adminController@permissions_roles')->name('permissions');
Route::get('/permissions_roles_by_id/{id}','App\Http\Controllers\adminController@permissions_roles_by_id')->middleware('auth');
Route::post('/salvar_roles_users','App\Http\Controllers\adminController@salvar_roles_users')->middleware('auth');
Route::post('/actualizar_roles_users','App\Http\Controllers\adminController@actualizar_roles_users')->middleware('auth');
Route::post('/salvar_permissions_roles','App\Http\Controllers\adminController@salvar_permissions_roles')->middleware('auth');
//Route::get('/login', 'App\Http\Controllers\adminController@login')->middleware('auth');
Route::post('/criar_token_acesso', 'App\Http\Controllers\adminController@criar_token_acesso')->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios.listar_usuarios', function () {
    return view('usuarios/listar_usuarios');
});
/*
Route::get('/', function () {
    return view('index');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

/*
    Route::get('/dashboard', function () {
        return redirect('dashboard');
    })->name('dashboard');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
*/
});
