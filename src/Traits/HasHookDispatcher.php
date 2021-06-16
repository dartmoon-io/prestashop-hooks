<?php

namespace Dartmoon\Hooks\Traits;

use Dartmoon\Hooks\HookDispatcher;

trait HasHookDispatcher
{
    /**
     * Hook dispatcher
     */
    protected $hookDispatcher;

    /**
     * Init the hook dispatcher
     */
    protected function initHookDispatcher()
    {
        $this->hookDispatcher = new HookDispatcher();

        // Let's check if the module define the
        // hook property
        if (!isset($this->hooks)) {
            return;
        }

        // Register all hooks found
        foreach ($this->hooks as $hookClass) {
            $hook = new $hookClass($this, $this->context);
            $this->hookDispatcher->register($hook);
        }
    }

    /**
     * Return the hook dispatcher
     */
    protected function getHookDispatcher()
    {
        return $this->hookDispatcher;
    }

    /**
     * Dispatch hooks
     *
     * @param string $methodName
     * @param array $arguments
     */
    public function __call($methodName, array $arguments)
    {
        $hookName = preg_replace('~^hook~', '', $methodName);
        return $this->hookDispatcher->dispatch(
            $hookName,
            !empty($arguments[0]) ? $arguments[0] : []
        );
    }
}