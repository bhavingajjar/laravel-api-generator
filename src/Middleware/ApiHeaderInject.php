<?php

namespace Bhavingajjar\LaravelApiGenerator\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class ApiHeaderInject
{
    public function handle($request, Closure $next)
    {
        if (config('laravel-api-generator.json_response')) {
            $request->headers->add([
                'Accept'=>'application/json',
            ]);
        }
        if (config('laravel-api-generator.allow_cross_origin')) {
            $request->headers->add([
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            ]);
        }

        return $next($request);
    }
}
