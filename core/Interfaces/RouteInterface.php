<?php

namespace Sergey\Framework\Interfaces;

interface RouteInterface
{
    public function route (string $uri): callable;
}