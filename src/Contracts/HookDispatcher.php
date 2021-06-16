<?php

namespace Dartmoon\Hooks\Contracts;

interface HookDispatcher
{
    /**
     * Register a new hook
     */
    public function register(Hook $hook);

    /**
     * Return installable hooks
     */
    public function getAvailableHooks();

    /**
     * Dispacth the hook execution
     */
    public function dispatch($hookName, array $params = []);
}