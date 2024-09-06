<?php

namespace App\Services\Facade;

use External\Foo\Exceptions\ServiceUnavailableException;
use External\Foo\Movies\MovieService;

class FooMovieFacade implements MovieInterface
{
    /**
     * @return string[]
     * @throws ServiceUnavailableException
     */
    public function getTitles(): array
    {
        return (new MovieService())->getTitles();
    }
}
