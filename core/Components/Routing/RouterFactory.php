<?php

namespace Sergey\Framework\Components\Routing;

use Sergey\Framework\Contracts\ComponentFactoryAbstract;

class RouterFactory extends ComponentFactoryAbstract
{

    protected function createConcreteComponent()
    {
        return new Router();
    }
}