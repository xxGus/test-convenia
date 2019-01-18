<?php

namespace App\Http\Middleware;

use App\Empresa;
use App\Fornecedor;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = Auth::id();
        if ($fornecedor = Fornecedor::find($request->route('id'))){

            if ($fornecedor->user_id == $user_id){
                return $next($request);
            }

        } elseif ($empresa = Empresa::find($request->route('id'))){
            if ($empresa->user_id == $user_id){
                return $next($request);
            }
        }
        return redirect('/home');
    }
}
