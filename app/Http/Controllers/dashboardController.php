<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use App\Models\Planos;
use App\Models\User;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if($user->status == 'aluno')
            return redirect('aluno_index');


        $usuario = Auth::user();
        $planos = Planos::count();
        $videos = Videos::count();
        $usuarios = User::count();
        $modulos = Modulos::count();

    //return $planos;

        return view('dashboard', compact('planos', 'videos', 'usuarios','modulos','usuario'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
