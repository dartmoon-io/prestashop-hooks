<?php

namespace Dartmoon\Hooks;

use Dartmoon\Hooks\Contracts\Hook;
use Module;

abstract class AbstractHook implements Hook
{
    protected $name = null;
    protected $module = null;

    /**
     * Constructor
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
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