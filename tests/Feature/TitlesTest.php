<?php

namespace Feature;

use App\Services\Facade\FooMovieFacade;
use App\Services\TitleGenerator;
use External\Foo\Exceptions\ServiceUnavailableException;
use External\Foo\Movies\MovieService;
use Mockery;
use Tests\TestCase;
use Mockery\MockInterface;

class TitlesTest extends TestCase
{
    public function test_successful_get_data()
    {
        $responseData = [
            "Star Wars: Episode IV - A New Hope",
            "The Devil and Miss Jones",
            "The Kentucky Fried Movie",
            "The Public Enemy",
            "Dog Day Afternoon",
            "Attack of the 50 Foot Woman",
            "The Fish That Saved Pittsburgh",
            "Army of Darkness"
        ];
        $response = $this->get('api/titles');

        $response->assertJson($responseData);
        $response->assertStatus(200);
    }
}
