<?php

namespace Lysice\LaravelXhProf\Middleware;

use Lysice\LaravelXhProf\Services\XhProfService;
use Closure;

/**
 * Class XhProfMiddleware
 * @package Lysice\LaravelXhProf\Middleware
 *
 * @author Lysice <snowist@126.com>
 * @version 1.0.0
 * @since 1.0.0
 */
class XhProfMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app(XhProfService::class)->enable();
        return $next($request);
    }

    /**
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        app(XhProfService::class)->disable();
    }
}