<?php
namespace Sergey\Framework\Contracts;

abstract class ComponentFactoryAbstract
{
    public function createComponent()
    {
        return $this->createConcreteComponent();
    }

    abstract protected function createConcreteComponent();
}