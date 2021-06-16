<?php

namespace Dartmoon\Hooks\Contracts;

use Module;

interface HookDispatcher
{
    /**
     * Register a new hook
     */
    public function registerHook(Hook $hook);

    /**
     * Return available hooks
     */
    public function getAvailableHooks();

    /**
     * Dispacth the hook execution
     */
    public function dispatchHook($hookName, $params);
}