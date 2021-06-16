<?php

namespace Dartmoon\Hooks;

use Dartmoon\Hooks\Contracts\Hook;
use Dartmoon\Hooks\Contracts\HookDispatcher as ContractsHookDispatcher;
use Exception;
use Module;

abstract class HookDispatcher implements ContractsHookDispatcher
{
    /**
     * Registered hooks
     */
    protected $hooks = [];

    /**
     * Register a new hook
     */
    public function registerHook(Hook $hook)
    {
        $this->hooks[$hook->getName()] = $hook;
    }

    /**
     * Install all hooks
     */
    public function getAvailableHooks()
    {   
        return array_keys($this->hooks);
    }

    /**
     * Dispacth the hook execution
     */
    public function dispatchHook($hookName, $params)
    {
        if (!isset($this->hooks[$hookName])) {
            throw new Exception();
        }

        return $this->hooks[$hookName]->execute($params);
    }
}