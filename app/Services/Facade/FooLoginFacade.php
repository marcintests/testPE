<?php

namespace App\Services\Facade;

use External\Foo\Auth\AuthWS;
use External\Foo\Exceptions\AuthenticationFailedException;

class FooLoginFacade implements Login
{
    public function login(string $login, string $password): bool
    {
        try {
            (new AuthWS())->Authenticate($login, $password);
        } catch (AuthenticationFailedException $e) {
            return false;
        }

        return true;
    }
}
