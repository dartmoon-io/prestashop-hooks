<?php

namespace Dartmoon\Hooks;

use Dartmoon\Hooks\Contracts\Hook;
use Dartmoon\Hooks\Contracts\HookDispatcher as ContractsHookDispatcher;
use Dartmoon\Hooks\Exceptions\HookNotFoundException;

class HookDispatcher implements ContractsHookDispatcher
{
    /**
     * Registered hooks
     */
    protected $hooks = [];

    /**
     * Register a new hook
     */
    public function register(Hook $hook)
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
    public function dispatch($name, array $params = [])
    {
        // Let's search the hook and execute it
        foreach ($this->hooks as $hookName => $hook) {
            if (strtolower($hookName) == strtolower($name)) {
                return $hook->execute($params);
            }
        }

        // No hook found, so let's return and exception
        throw new HookNotFoundException("Hook '{$hookName}' not found!");
    }
}