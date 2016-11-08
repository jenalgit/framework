<?php

namespace Mage2\Framework\System\View\Facades;

use Illuminate\Support\Facades\Facade;

class AdminConfiguration extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Mage2\Framework\System\View\AdminConfiguration';
    }
}
