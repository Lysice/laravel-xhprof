<?php

namespace Lysice\LaravelXhProf\Services;

use Lysice\LaravelXhProf\Providers\XhProfProvider;

/**
 * Class XhProfService
 * @package Lysice\LaravelXhProf\Services
 *
 * @author Lysice <snowist@126.com>
 * @version 1.0.0
 */
class XhProfService
{
    /**
     * @var XhProfProvider
     */
    protected $provider;

    public function __construct()
    {
        if (!extension_loaded('xhprof')) {
            return;
        }

        if (!config('xhprof.enabled', false)) {
            return;
        }

        $this->provider = new XhProfProvider();
    }

    /**
     * Starting the profiler
     */
    public function enable()
    {
        if ($this->provider) {
            $this->provider->enable();
        }
    }

    /**
     * Disabling the profiler and saving data
     */
    public function disable()
    {
        if ($this->provider) {
            $this->provider->disable();
        }
    }
}