<?php

namespace App\Services\Facade;

interface MovieInterface
{
    /**
     * @return string[]
     */
    public function getTitles(): array;
}
