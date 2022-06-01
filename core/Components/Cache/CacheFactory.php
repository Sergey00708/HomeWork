<?php

namespace Sergey\Framework\Components\Cache;

use Sergey\Framework\Contracts\ComponentFactoryAbstract;

class CacheFactory extends ComponentFactoryAbstract
{

    protected function createConcreteComponent()
    {
        return new Cache();
    }
}