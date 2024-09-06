<?php

namespace App\Services\Facade;

use External\Baz\Auth\Authenticator;
use External\Baz\Auth\Responses\Success;

class BazLoginFacade implements Login
{
    public function login(string $login, string $password): bool
    {
        if ((new Authenticator())->auth($login, $password)::class === Success::class) {
             return true;
        }

        return false;
    }
}
