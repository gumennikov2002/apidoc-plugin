<?php

namespace Gumennikov2002\ApiDoc\Classes\Pools;

use Gumennikov2002\ApiDoc\Classes\Interfaces\ConstructorInterface;
use Gumennikov2002\ApiDoc\Classes\Interfaces\PoolInterface;

class Pool implements PoolInterface
{
    protected array $pool = [];

    public function add(ConstructorInterface $constructor): void
    {
        $this->pool[] = $constructor->getResult();
    }

    public function addMultiple(ConstructorInterface ...$constructors): void
    {
        foreach ($constructors as $constructor) {
            $this->add($constructor);
        }
    }

    public function get(): array
    {
        return $this->pool;
    }
}
