<?php

namespace App\Services\Facade;

use External\Bar\Exceptions\ServiceUnavailableException;
use External\Bar\Movies\MovieService;

class BarMovieFacade implements MovieInterface
{
     /**
     * @return string[]
     * @throws ServiceUnavailableException
     */
    public function getTitles(): array
    {
        $moviesToParse = (new MovieService())->getTitles();
        $titles = [];

        foreach ($moviesToParse['titles'] as $movie) {
            $titles[] = $movie['title'];
        }

        return $titles;
    }
}
