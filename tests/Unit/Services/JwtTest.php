<?php

namespace Tests\Unit\Services;

use App\Services\Jwt;
use PHPUnit\Framework\TestCase;

class JwtTest extends TestCase
{
    public function test_success_jwt(): void
    {
        $jwt = new Jwt();
        $token = $jwt->generateSimpleJWTToken('FOO_1', 'FOO');

        $this->assertEquals(
            'eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6IkZPT18xIiwiY29udGV4dCI6IkZPTyIsImlhdCI6MTUxNjIzOTAyMn0.iRI3_03RH4QaJFFDa8GQNz4JiBMketUk9rAr8QSLacKnql3pUx6PR-AP_u0qD8AzHn90rnq40aCfA6CwPXKKsw',
            $token
        );
    }

    public function test_failure_jwt(): void
    {
        $jwt = new Jwt();
        $token = $jwt->generateSimpleJWTToken('FOO_2', 'FOO');

        $this->assertNotEquals(
            'eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6IkZPT18xIiwiY29udGV4dCI6IkZPTyIsImlhdCI6MTUxNjIzOTAyMn0.iRI3_03RH4QaJFFDa8GQNz4JiBMketUk9rAr8QSLacKnql3pUx6PR-AP_u0qD8AzHn90rnq40aCfA6CwPXKKsw',
            $token
        );
    }
}
