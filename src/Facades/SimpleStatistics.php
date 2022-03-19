<?php

namespace Fligno\SimpleStatistics\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleStatistics extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'simple-statistics';
    }
}
