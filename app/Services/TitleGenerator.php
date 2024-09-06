<?php

namespace App\Services;

use External\Bar\Exceptions\ServiceUnavailableException;

class TitleGenerator
{
    private const MAX_CONNECTION_ATTEMPTS = 60;

    public function generate($movieServices): array
    {
        $titles = [];

        foreach ($movieServices as $movie) {
            $connectionAttempts = self::MAX_CONNECTION_ATTEMPTS;

            do {
                try {
                    $movieClass = new $movie();
                    $titles = array_merge($titles, $movieClass->getTitles());

                    break;
                } catch(ServiceUnavailableException $e) {
                    $connectionAttempts--;
                }
            } while($connectionAttempts > 0);
        }

        return $titles;
    }
}
