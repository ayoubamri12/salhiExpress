<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DeliveryAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            logger('Authenticated user: ' . Auth::user()->id); // Log user ID
            if (Auth::user()->type === 'delivery') {
                return $next($request);
            }
        }
        logger('Not authenticated or not delivery user.');
        return redirect()->route('login');
    }
    
}
