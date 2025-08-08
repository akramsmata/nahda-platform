<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserApproved
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->approval_status !== 'approved') {
            auth()->logout();
            return redirect()->route('login')->with('error','حسابك لم يتم تفعيله بعد.');
        }
        return $next($request);
    }
}
