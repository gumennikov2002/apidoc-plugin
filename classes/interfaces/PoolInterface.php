<?php

namespace Gumennikov2002\ApiDoc\Classes\Interfaces;

interface PoolInterface
{
    /**
     * Add constructor to pool
     *
     * @param ConstructorInterface $constructor
     *
     * @return void
     */
    public function add(ConstructorInterface $constructor): void;

    /**
     * Get pool
     *
     * @return array
     */
    public function get(): array;
}
