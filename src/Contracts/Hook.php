<?php

namespace Dartmoon\Hooks\Contracts;

use Context;
use Module;

interface Hook
{
    public function __construct(Module $module, Context $context);

    /**
     * Get the hook name
     */
    public function getName();

    /**
     * Execute the hook
     */
    public function execute($params);
}