# Prestashop Hooks
PrestaShop hooks done right! Instead of polluting the main file of your module with all the hook definitions, with this package you can define them into their own class.

## Installation

1. Install the package
```bash
composer require dartmoon/prestashop-hooks
```

2. Add to the main class of your module the trait `HasHookDispatcher` and the `hooks` property

```php
use Dartmoon\Hooks\Traits\HasHookDispatcher;

class YourModule
{
    use HasHookDispatcher;

    /**
     * Hook classes
     */
    protected $hooks = [
        //
    ];

    // ...
}
```

3. Fix the class constructor by initializing the hook dispatcher

```php
public function __construct()
{
    //...

    // Let's init the hook dispatcher
    $this->initHookDispatcher();
}
```

4. Fix the `install` method to install the hooks

```php
public function install()
{
    if (
        parent::install()
        && $this->registerHook($this->getHookDispatcher()->getAvailableHooks())
    ) {
        //...

        return true;
    }

    return false;
}
```

## Usage

### Create the hook group class
Let's create the class. For the sake of the example suppose we are creating them inside the `src/Hooks` folder of your module.

File `src/Hooks/FrontAssetsHooks.php`

```php
<?php

namespace Dartmoon\MyModule\Hooks;

use Dartmoon\Hooks\AbstractHookGroup;

class FrontAssetsHooks extends AbstractHookGroup
{
    /**
     * Name of the hooks to register
     */
    protected $hooks = [
        'header',
        // You can register how many hooks you want
    ];

    public function header($params)
    {
        //...

        // $this->module is the instance of the module
        // $this->context is the instance of the current context
    }
}
```

### Register the hook group class
Put your classes inside the `hooks` property of the main class of your module.

```php
use Dartmoon\MyModule\Hooks\FrontAssetsHooks;

/**
 * Hook classes
 */
protected $hooks = [
    FrontAssetsHooks::class
];
```

### Reset the module
PrestaShop installs module hooks only at installation time, so you need to reset the module.

## License

This project is licensed under the MIT License - see the LICENSE.md file for details