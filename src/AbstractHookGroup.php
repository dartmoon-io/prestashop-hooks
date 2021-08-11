<?php

namespace Dartmoon\Hooks;

use Context;
use Dartmoon\Hooks\Contracts\HookGroup;
use Module;

abstract class AbstractHookGroup implements HookGroup
{
    /**
     * Name of the hooks that this group define
     */
    protected $hooks = null;

    /**
     * Module instance
     */
    protected $module = null;

    /**
     * Context instance
     */
    protected $context = null;

    /**
     * Constructor
     */
    public function __construct(Module $module, Context $context)
    {
        $this->module = $module;
        $this->context = $context;
    }

    /**
     * Get the hook names defined into this group
     */
    public function getHooks()
    {
        return $this->hooks;
    }
}