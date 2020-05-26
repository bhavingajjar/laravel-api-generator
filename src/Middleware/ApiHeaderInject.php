<?php
namespace Bhavingajjar\LaravelApiGenerator\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class ApiHeaderInject
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if(config('laravel-api-generator.json_response')) {
            $response = $response->headers('Content-Type', 'application/json')
                ->header('Accept', 'application/json');
        }
        if(config('laravel-api-generator.allow_cross_origin')) {
            $response = $response->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
        return $response;
    }
}
