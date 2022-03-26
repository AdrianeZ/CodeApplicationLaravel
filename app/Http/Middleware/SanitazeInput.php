<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitazeInput
{

    // handle an incoming HTTP request
    public function handle(Request $request, Closure $next)
    {
        if ($request->has("codes")) {
            $request->merge(["codes" => str_replace(" ", '', $request->input("codes"))]);
        }
        return $next($request);
    }
}
