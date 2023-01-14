<?php

namespace Lysice\LaravelXhProf;


use Lysice\LaravelXhProf\Middleware\XhProfMiddleware;
use Lysice\LaravelXhProf\Services\XhProfService;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

/**
 * Class TidewaysServiceProvider
 * @package AlexBrin\LaravelTideways
 *
 * @author Alexander Gorenkov <g.a.androidjc2@ya.ru>
 * @version 1.0.0
 * @since 1.0.0
 */
class XhProfServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php',
            'xhprof'
        );

        $this->app->singleton(XhProfMiddleware::class);
        $this->app->singleton(XhProfService::class);

        if (config('xhprof.global_middleware', false)) {
            $this->extraMiddleware(XhProfMiddleware::class);
        }
    }

    public function extraMiddleware(string $className)
    {
        /** @var \Illuminate\Foundation\Http\Kernel $kernel */
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($className);
    }
}