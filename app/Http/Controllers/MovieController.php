<?php

namespace App\Http\Controllers;

use App\Services\Facade\BarMovieFacade;
use App\Services\Facade\BazMovieFacade;
use App\Services\Facade\FooMovieFacade;
use App\Services\TitleGenerator;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    public function getTitles(
        TitleGenerator $titleGenerator
    ): JsonResponse
    {
        $movieServices = [
            BarMovieFacade::class,
            BazMovieFacade::class,
            FooMovieFacade::class
        ];

        $titles = $titleGenerator->generate($movieServices);

        return response()->json($titles);
    }
}
