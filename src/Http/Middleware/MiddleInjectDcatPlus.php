<?php

namespace Dcat\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MiddleInjectDcatPlus
{
    public function handle(Request $request, Closure $next)
    {

//        config(admin_setting()->toArray());

        return $next($request);
    }
}
