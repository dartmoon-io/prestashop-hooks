<?php

namespace Dartmoon\Hooks\Contracts;

use Module;

interface HookDispatcher
{
    /**
     * Register a new hook
     */
    public function register(Hook $hook);

    /**
     * Install all hooks
     */
    public function install(Module $module);

    /**
     * Dispacth the hook execution
     */
    public function dispatch($hookName, $params);
}