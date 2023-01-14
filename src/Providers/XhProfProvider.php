<?php

namespace Lysice\LaravelXhProf\Providers;


/**
 * Class XhProfProvider
 * @package Lysice\LaravelXhProf\Providers
 *
 * @author Lysice <snowist@126.com>
 * @version 1.0.0
 * @since 1.0.0
 */
class XhProfProvider
{
    /**
     * Starting the profiler
     */
    public function enable()
    {
        /** @noinspection PhpUndefinedFunctionInspection */
        /** @noinspection PhpUndefinedConstantInspection */
        xhprof_enable(config('xhprof.flags', XHPROF_FLAGS_CPU|XHPROF_FLAGS_MEMORY|XHPROF_FLAGS_NO_BUILTINS));
    }

    /**
     * Disabling the profiler and saving data
     */
    public function disable()
    {
        $data = xhprof_disable(); //关闭性能分析
        /** @noinspection PhpUndefinedFunctionInspection */
        $obj_xhprof_run = new \XHProfRuns_Default();
        $run_id         = $obj_xhprof_run->save_run($data, config('xhprof.name'));
    }
}