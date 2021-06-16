<?php

namespace Dartmoon\Hooks;

use Context;
use Dartmoon\Hooks\Contracts\Hook;
use Module;

abstract class AbstractHook implements Hook
{
    /**
     * Name of the hook
     */
    protected $name = null;

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
     * Get the hook name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Execute the hook
     */
    abstract public function execute($params);
}