<?php

namespace Ribafs\HelloWorld;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ribafs\HelloWorld\Skeleton\SkeletonClass
 */
class HelloWorldFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hello-world';
    }
}
