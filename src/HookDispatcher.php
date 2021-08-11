<?php

namespace Dartmoon\Hooks;

use Dartmoon\Hooks\Contracts\HookDispatcher as ContractsHookDispatcher;
use Dartmoon\Hooks\Contracts\HookGroup;
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
    public function register(HookGroup $group)
    {
        $hooks = $group->getHooks();
        if (is_string($hooks)) {
            $hooks = [$hooks];
        }

        foreach ($hooks as $hook) {
            $this->hooks[$hook] = $group;
        }
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
        // Let's search the group in which the hook
        // belongs to and execute the method
        foreach ($this->hooks as $hookName => $group) {
            if (strtolower($hookName) == strtolower($name)) {
                return $group->{$name}($params);
            }
        }

        // No hook found, so let's return and exception
        throw new HookNotFoundException("Hook '{$hookName}' not found!");
    }
}