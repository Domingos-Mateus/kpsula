<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        $user = Auth::user();



        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if($user->status == 'admin')
                return redirect(RouteServiceProvider::HOME);
                else
                return redirect('aluno_index');
            }
        }

        return $next($request);
    }
}
