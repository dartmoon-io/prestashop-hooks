<?php

namespace Dartmoon\Hooks\Contracts;

use Module;

interface Hook
{
    public function __constrct(Module $module);

    /**
     * Get the hook name
     */
    public function getName();

    /**
     * Execute the hook
     */
    public function execute($params);
}