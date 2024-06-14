<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Students
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('student')->check()) {
            return redirect()->route('student.login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        return $next($request);
    }
}
