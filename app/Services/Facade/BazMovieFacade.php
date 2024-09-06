<?php

namespace App\Services\Facade;

use External\Baz\Exceptions\ServiceUnavailableException;
use External\Baz\Movies\MovieService;

class BazMovieFacade implements MovieInterface
{
    /**
     * @return string[]
     * @throws ServiceUnavailableException
     */
    public function getTitles(): array
    {
        return (new MovieService())->getTitles()['titles'];
    }
}
