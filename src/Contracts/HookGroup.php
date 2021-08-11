<?php

namespace Dartmoon\Hooks\Contracts;

use Context;
use Module;

interface HookGroup
{
    public function __construct(Module $module, Context $context);

    /**
     * Get the hook names defined into this group
     */
    public function getHooks();
}