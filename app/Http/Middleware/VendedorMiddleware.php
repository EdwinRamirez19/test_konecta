<?php

namespace App\Http\Middleware;

use Closure;

class VendedorMiddleware
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
        if ($request->user()->role == "Vendedor") {
            return $next($request);   
        }

        $response = [
            'code' => 3
        ];
        
        return response()->json($response, 200);
    }
}
